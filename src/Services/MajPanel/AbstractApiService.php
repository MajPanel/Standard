<?php


	namespace App\Services\MajPanel;

	use Doctrine\Common\Collections\Criteria;
	use Doctrine\DBAL\LockMode;
	use Doctrine\ORM\EntityManager;
	use Doctrine\ORM\Query;
	use Doctrine\ORM\EntityManagerInterface;
	use phpDocumentor\Reflection\Types\Integer;

	abstract class AbstractApiService
	{
		/**
		 * @var \Doctrine\ORM\EntityRepository
		 */

		protected $model;
		protected $em;
		protected $entityName;

		/**
		 * @param   EntityManager  $em
		 * @param                  $entityName
		 */

		protected function __construct(EntityManager $em, $entityName)
		{
			$this->entityName   = $entityName;
			$this->em    = $em;
			$this->model = $em->getRepository($this->entityName);
		}

		/**
		 * @return EntityManager
		 */

		protected function entityManager()
		{
			return $this->em;
		}

		/**
		 * @return array
		 */

		protected function findAll()
		{
            return $this->model->findAll();
		}

        /**
         * @param $id
         * @param int $lockMode
         * @param null $lockVersion
         * @return null|object
         */

        protected function findId($id, $lockMode = LockMode::NONE, $lockVersion = null)
        {
            return $this->model->find($id, $lockMode, $lockVersion);
        }

		/**
		 * @param   array  $criteria
		 * @param   array  $orderBy
		 * @param   null   $limit
		 * @param   null   $offset
		 *
		 * @return array
		 */

		protected function findBy(
			array $criteria,
			array $orderBy = null,
			$limit = null,
			$offset = null
		) {
			return $this->model->findBy($criteria, $orderBy, $limit, $offset);
		}

		/**
		 * @param $id
		 *
		 * @return mixed|string
		 */

		protected function findById($id)
		{
			$query = $this->model->createQueryBuilder('tabel')
				->where('tabel.id = :id')
				->setParameter('id', $id);
			$result=$query->getQuery()->getArrayResult();

			return reset($result);
		}

		/**
		 * @param   Criteria  $criteria
		 *
		 * @return \Doctrine\Common\Collections\Collection
		 */

		protected function matching(Criteria $criteria)
		{
			return $this->model->matching($criteria);
		}

		/**
		 * /**
		 * @param         $id
		 * @param   int   $lockMode
		 * @param   null  $lockVersion
		 *
		 * @return array
		 */

		protected function find($id,$field):array {
			$query = $this->model->createQueryBuilder('tabel');
			$query->select($field)->where('tabel.id = :id')
				->setParameter('id', $id);
			$result=$query->getQuery()->getArrayResult();
			return reset($result);

		}

		/**
		 * @param         $id
		 * @param   int   $lockMode
		 * @param   null  $lockVersion
		 *
		 * @return object|null
		 */

		protected function findObject(
			$id,
			$lockMode = LockMode::NONE,
			$lockVersion = null
		) {
			return $this->model->find($id, $lockMode, $lockVersion);
		}

		/**
		 * @param   array  $criteria
		 * @param   array  $orderBy
		 *
		 * @return null|object
		 */

		protected function findOneBy(array $criteria, array $orderBy = null)
		{
			return $this->model->findOneBy($criteria, $orderBy);
		}

		/**
		 * @param $id
		 *
		 * @return bool|\Doctrine\Common\Proxy\Proxy|object|null
		 * @throws \Doctrine\ORM\ORMException
		 */

		protected function getReferenceObject($id)
		{
			return $this->em->getReference($this->model->getClassName(), $id);
		}

		/**
		 * @param $object
		 *
		 * @throws \Doctrine\ORM\ORMException
		 * @throws \Doctrine\ORM\OptimisticLockException
		 */

		protected function delete($object)
		{
			$this->em->remove($object);
			$this->em->flush();
		}

		/**
		 * @param   string   $field
		 * @param   string   $querystring
		 * @param   string   $order
		 * @param   string  $offset
		 * @param   string  $limit
		 *
		 * @return array
		 */
		protected function getFilterGrid(
			string $field,
			string $querystring,
			string $order,
			string $offset,
			string $limit
		): array {


			$query = $this->model->createQueryBuilder('tabel');
			$query->select('COUNT(tabel.id) as count');
			$orX = $this->makeWhere($query, $querystring);
			$query->add('where', $orX);
			$totalCount = $query->getQuery()->execute();

			$sortItem = $this->makeSort( $order );
			$query->select($field)
				->addOrderBy(" tabel." . $sortItem['sortfield'],
					$sortItem['sorttype'])
				->setFirstResult($offset)
				->setMaxResults($limit);

			$resul =$query->getQuery()->getArrayResult();
			return ['data' => $resul, 'totalCount' => $totalCount[0]['count']];

		}

		/**
		 * @param $RestPutData
		 */

		protected  function editquery( $RestPutData ){

			$query = $this->model->createQueryBuilder('tabel')
				->update($this->entityName);
			$query=$this->makeUpdateQuery($query,$RestPutData);
			$endquery=$query->where('tabel.id = :id')
				->setParameter('id', $RestPutData['id'])
				->getQuery()->execute();
		}

		/**
		 * @param $field
		 * @param $value
		 */

        protected  function deleteQuery($field, $value){

            $query = $this->model->createQueryBuilder('tabel')
                ->delete($this->entityName)
                ->where(" tabel.$field = '$value'")
                ->getQuery()->execute();
            //die($query->getDQL());

        }

		/**
		 * @param $entity
		 *
		 * @throws \Doctrine\ORM\ORMException
		 * @throws \Doctrine\ORM\OptimisticLockException
		 */

		protected  function insertquery($entity){
			$this->em->persist($entity);
			$this->em->flush();
		}


		/**
		 * @param $query
		 * @param $RestPutData
		 *
		 * @return mixed
		 */

		private function makeUpdateQuery($query,$RestPutData){
			foreach($RestPutData as $key =>$value)
			{
				if( $key === 'id' ) continue;
				$query->set("tabel.$key", ":$key")->setParameter("$key", "$value");
			}

			return $query;
		}

		/**
		 * @param $field
		 * @param $value
		 * @param $operation
		 * @param $order
		 * @param $offset
		 * @param $limit
		 *
		 * @return array|int|string
		 */

		protected function searchfield($field, $value,$operation,$order, $offset, $limit)
		{
			$query = $this->model->createQueryBuilder('tabel')
				->where(" tabel.$field  $operation :value ")
				->setParameter("value",  $value )
				->addOrderBy(" tabel.$field ", $order)
				->setFirstResult($offset)
				->setMaxResults($limit)
				->getQuery();

			return $query->getArrayResult();
		}

		/**
		 * @param   string  $querystring
		 *
		 * @return array
		 */

		protected function makeFilter(string $querystring): array
		{
			return array();
		}

		/**
		 * @param   string  $sortstring
		 *
		 * @return array
		 */

		private function makeSort(string $sortstring): array
		{
			if ($sortstring !== "") {
				$Items_array=explode(',',substr($sortstring, 1, -1));
				return [
					'sortfield' => $Items_array[0],
					'sorttype'  => $Items_array[1]
				];
			} else {
				return ['sortfield' => 'id', 'sorttype' => 'asc'];
			}
		}

		/**
		 * @param $queryBuilder
		 * @param $whereString
		 *
		 * @return mixed
		 */

		private function makeWhere($queryBuilder, $whereString)
		{
			if ($whereString !== "") {
				//$orX = $queryBuilder->expr()->orX();
				$orX         = $queryBuilder->expr()->andX();
				$whereString=str_replace('[','',$whereString);
				$whereString=str_replace(']','',$whereString);
				$ItemFilters = explode(',"and",', $whereString);

				foreach ($ItemFilters as $ItemFilter) {
					$Items_array=explode(',',$ItemFilter);
					//var_dump($Items_array);
					$orX->add("tabel." . $Items_array[0] .$this->setCondition($Items_array[1],$Items_array[2]) ) ;
				}

				return $orX;
			} else {
				return '';
			}
		}

		/**
		 * @param   string  $condition
		 * @param   string  $value
		 *
		 * @return string
		 */

		private function setCondition(string $condition,string $value):string
		{
			$value=trim($value);
			$condition=trim($condition);
			switch ($condition) {
				case "contains":
					return " LIKE '%$value%' ";
					break;
				case "notContains":
					return "  NOT LIKE '$value' ";
					break;
				case "startsWith":
					return " LIKE '$value%' ";
					break;
				case "endsWith":
					return " LIKE '%$value' ";
					break;
				case "equal":
					return " = '$value' ";
					break;
				case "notEqual":
					return " != '$value' ";
					break;
				default:
					return " = '$value' ";
			}

		}


	}
