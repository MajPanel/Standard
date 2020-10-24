<?php


	namespace App\Services\MajPanel\Blog;

	use App\Services\MajPanel\AbstractApiService;
	use Doctrine\ORM\EntityManager;
	use App\Entity\Blog;

	class ServiceBlog extends AbstractApiService
	{

		public function __construct(EntityManager $em, $entityName)
		{
			$this->em    = $em;
			$this->model = $em->getRepository($entityName);
		}

		public function getModelBlog()
		{
			return $this->model;
		}

		public function getDataBlogId($id){
            return $this->findId($id);
        }

		public function getBlog($id,$field)
		{
			return $this->find($id,$field);
		}

		public function getAllBlog()
		{
			return $this->findAll();
		}

		public function getDataGridBlog($field,$querystring,$order='ASC',$offset=0,$limit=10)
		{
			return $this->getFilterGrid($field, $querystring,$order,$offset,$limit);
		}

		public function getSerachFieldBlog($field, $value,$order='ASC',$offset=0,$limit=10)
		{
			return $this->searchfield($field, $value,$order,$offset,$limit);
		}

		public function deleteBlog($id)
		{
			//return $this->find($id);
			return $this->delete($this->findObject($id));
		}

		public function editBlog($RestPutData)
		{
			return $this->editquery($RestPutData);
		}

		public function insertBlog(Blog $entity)
		{
			return $this->insertquery($entity);
		}


	}

