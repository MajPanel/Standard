<?php

    /*
     * (c) MajPanel <https://github.com/MajPanel/>
     *
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */


	namespace App\Services\MajPanel\Book;

	use App\Services\MajPanel\AbstractApiService;
	use Doctrine\ORM\EntityManager;
	use App\Entity\Book;

    /**
     * @author Majid Kazerooni <support@majpanel.com>
     */

	class ServiceBook extends AbstractApiService
	{

		public function __construct(EntityManager $em, $entityName)
		{
			$this->em    = $em;
			$this->model = $em->getRepository($entityName);
		}

		/**
		 * @return \Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository
		 */

		public function getModelBook()
		{
			return $this->model;
		}

		/**
		 * @param $id
		 *
		 * @return mixed|string
		 */

		public function getBookById($id)
		{
			return $this->findById($id);
		}

		/**
		 * @param $id
		 * @param $field
		 *
		 * @return array
		 */

		public function getBook($id,$field)
		{
			return $this->find($id,$field);
		}

		/**
		 * @return array
		 */

		public function getAllBook()
		{
			return $this->findAll();
		}

		/**
		 * @param           $field
		 * @param           $querystring
		 * @param   string  $order
		 * @param   int     $offset
		 * @param   int     $limit
		 *
		 * @return array
		 */
		public function getDataGridBook($field,$querystring,$order='ASC',$offset=0,$limit=10)
		{
			return $this->getFilterGrid($field, $querystring,$order,$offset,$limit);
		}

		/**
		 * @param           $field
		 * @param           $value
		 * @param   string  $operation
		 * @param   string  $order
		 * @param   int     $offset
		 * @param   int     $limit
		 *
		 * @return array|int|string
		 */
		public function getSerachFieldBook($field, $value,$operation='=',$order='ASC',$offset=0,$limit=10)
		{
			return $this->searchfield($field, $value,$operation,$order,$offset,$limit);
		}

		/**
		 * @param $id
		 *
		 * @return object|null
		 */

		public  function getObjectCmsCategory($id){
            return $this->findObject($id);
        }

		/**
		 * @param $id
		 *
		 * @throws \Doctrine\ORM\ORMException
		 * @throws \Doctrine\ORM\OptimisticLockException
		 */

		public function deleteBook($id)
		{
			return $this->delete($this->findObject($id));
		}

		/**
		 * @param $RestPutData
		 */

		public function editBook($RestPutData)
		{
			return $this->editquery($RestPutData);
		}

		/**
		 * @param   Book  $entity
		 *
		 * @throws \Doctrine\ORM\ORMException
		 * @throws \Doctrine\ORM\OptimisticLockException
		 */

		public function insertBook(Book $entity)
		{
			return $this->insertquery($entity);
		}


	}

