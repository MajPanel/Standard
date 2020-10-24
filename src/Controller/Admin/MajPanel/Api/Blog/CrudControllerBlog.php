<?php

    /*
     * (c) MajPanel <https://github.com/MajPanel/>
     *
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */
	namespace App\Controller\Admin\MajPanel\Api\Blog;


	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use Symfony\Component\HttpFoundation\JsonResponse;
	use Symfony\Component\Routing\Annotation\Route;
	use Symfony\Component\HttpFoundation\Request;
	use Psr\Log\LoggerInterface;
	use App\Form\MajPanel\Blog\EditFormValidateBlog;
	use App\Form\MajPanel\Blog\InsertFormValidateBlog;
	use App\Services\MajPanel\AdminFileService;
        use App\Services\MajPanel\ApiService;
	use App\Entity\Blog;
	use App\Services\MajPanel\Blog\ServiceBlog;
	
    /**
     * @author Majid Kazerooni <support@majpanel.com>
     */
	class CrudControllerBlog extends AbstractController
	{
		private $limit = 30;
		private $offset;
		private $filter;
		private $sort;
		private $logger;
		private $adminFileService;
        private $apiService;
		/**
		 * SelectController constructor.
		 */
		public function __construct(LoggerInterface $logger,AdminFileService $adminFileService,ApiService $apiService)
		{
			$this->logger = $logger;
			$this->adminFileService=$adminFileService;
            $this->apiService=$apiService;
		}


        /**
         * @Route("majpanel/api/blog/datagrid/", name="majpanel_api_blog_getall_grid" ,  methods={"GET","HEAD"})
         * @param   Request  $request
         *
         * @return JsonResponse
         */

		public function getAllDataGrid(Request $request)
		{

            try {
                $this->limit=$request->query->get('limit');
                $this->offset=$request->query->get('offset');
                $this->filter=$request->query->get('filter');
                $this->sort=$request->query->get('sort');

                $objectServiceBlog     = new ServiceBlog($this->getDoctrine()->getManager(),
                    Blog::class);
                $result=$objectServiceBlog->getDataGridBlog($this->setfieldQuery('grid'),$this->filter,$this->sort,$this->offset,$this->limit);
                return $this->apiService->response($result);

            } catch (\Exception $e) {
                return $this->apiService->respondValidationError($e->getMessage());
            }

		}

        /**
         * @Route("majpanel/api/blog/getalldata/", name="majpanel_api_blog_getall" ,  methods={"GET","HEAD"})
         * @param   Request  $request
         *
         * @return JsonResponse
         */
		public function getAllData(Request $request)
		{

            try {
                $this->limit=$request->query->get('limit');
                $this->offset=$request->query->get('offset');
                $this->filter=$request->query->get('filter');
                $objectServiceBlog     = new ServiceBlog($this->getDoctrine()->getManager(),
                    Blog::class);
                return $this->apiService->response( $objectServiceBlog->getAllBlog() );

            } catch (\Exception $e) {
                return $this->apiService->respondValidationError( $e->getMessage() );
            }


		}

		/**
		 * @Route("majpanel/api/blog/getid/{type}/{id}/", name="majpanel_api_blog_getid" ,  methods={"GET","HEAD"})
		 */
		public function getId($type,$id)
		{
            try {

                $objectServiceBlog = new ServiceBlog( $this->getDoctrine()->getManager(), Blog::class);
                return $this->apiService->response( $objectServiceBlog->getBlog($id,$this->setfieldQuery( $type ) ) );

            } catch (\Exception $e) {

                return $this->apiService->respondValidationError( $e->getMessage() );

            }
		}

		/**
		 * @Route("majpanel/api/blog/search/{field}/{value}", name="majpanel_api_blog_search_field" ,  methods={"GET","HEAD"})
		 */
		public function doSearch($field,$value)
		{
            try {
                $objectServiceBlog     = new ServiceBlog($this->getDoctrine()->getManager(),
                    Blog::class);
                return $this->apiService->response( $objectServiceBlog->getSerachFieldBlog( $field , $value ) );

            } catch (\Exception $e) {

                return $this->apiService->respondValidationError( $e->getMessage() );

            }
		}

		/**
		 * @Route("majpanel/api/blog/del/", name="majpanel_api_blog_del_fields" ,  methods={"DELETE","HEAD"})
		 */
		public function doDelete(Request $request)
		{
            try {

                $objectServiceBlog  = new ServiceBlog($this->getDoctrine()->getManager(),
                    Blog::class);
                if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {

                    $data = json_decode($request->getContent(), true);
                    $request->request->replace(is_array($data) ? $data : array());

                    foreach ($data['itemsSelect'] as $id) {
                        $result = $objectServiceBlog->deleteBlog($id);
                        $this->adminFileService->removeFile([
                            $this->getParameter('upload_real_path') . 'Blog/'. $id
                        ]);
                    }
                } else 	throw new \Exception(' Content-Type / json  Error ');

                return $this->apiService->respondWithSuccess('Success')	;

            } catch (\Exception $e) {

                return $this->apiService->respondValidationError( $e->getMessage() );

            }

		}

		/**
		 * @Route("majpanel/api/blog/update/", name="majpanel_api_blog_update_field" ,  methods={"PUT","HEAD"})
		 */
		public function doUpdate(Request $request)
		{
            try {

                $ObjectBlog=new Blog();
                $objectServiceBlog = new ServiceBlog($this->getDoctrine()->getManager(),
                    Blog::class);

                if ( 0 === strpos($request->headers->get('Content-Type'), 'application/json') ) {
                    $RestPutData = json_decode($request->getContent(), true);
                    $RestPutData=$RestPutData['data'];
                } else 	throw new \Exception(' Content-Type / json  Error ');


                $datavalidate=new EditFormValidateBlog( $RestPutData );
                $validationData=$datavalidate->validateCheck();

                if(empty($validationData['Error'])) {

                    $RestPutData['modified_at']=$this->dateTostring();
                    $objectServiceBlog->editBlog( $RestPutData );
                    return $this->apiService->respondWithSuccess('Success')	;

                } else 	throw new \Exception('Validate Error' );

            } catch (\Exception $e) {

                return $this->apiService->respondValidationError( $validationData['Error'] );

            }

		}

		/**
		 * @Route("majpanel/api/blog/insert/", name="majpanel_api_blog_insert_field" ,  methods={"POST","HEAD"})
		 */
		public function doInsert(Request $request)
		{
            try {

                $ObjectBlog=new Blog();
                $objectServiceBlog = new ServiceBlog($this->getDoctrine()->getManager(),
                    Blog::class);

                if (0 === strpos($request->headers->get('Content-Type') , 'application/json') ) {

                    $RestPostData = json_decode($request->getContent(), true);
                    $RestPostData=$RestPostData['data'];

                } else 	throw new \Exception(' Content-Type / json  Error ');

                $datavalidate=new InsertFormValidateBlog($RestPostData);
                $validationData=$datavalidate->validateCheck();

                if(empty($validationData['Error'])) {

                    $objectServiceBlog->insertBlog($this->setEntity($ObjectBlog,$RestPostData));
                    $this->adminFileService->makeDir($this->getParameter('upload_real_path').'Blog/'.$ObjectBlog->getId().'/');

                    return $this->apiService->respondWithSuccess('Success',['id'=>$ObjectBlog->getId()])	;

                } else 	throw new \Exception( 'Validate Error' );

            } catch (\Exception $e) {

                return $this->apiService->respondValidationError($validationData['Error'] );

            }

		}

		/**
		 * @Route("majpanel/api/blog/upload/", name="majpanel_api_blog_upload" ,  methods={"POST","HEAD"})
		 */
		public function doUpload(Request $request)
		{
			try {
			$files = $request->files->all();
			$dataPost=$request->request->all();

			foreach ($files as $file)
			{
				$fileName=$dataPost['id'].'_'.$file->getClientOriginalName();
				$this->adminFileService->upload($this->getParameter('upload_real_path').'Blog/'.$dataPost['id'].'/', $file, $fileName);
			}
				return $this->apiService->respondWithSuccess('Success')	;
			} catch (\Exception $e) {

				return $this->apiService->respondValidationError( $e->getMessage() );

			}
		}

		/**
		 * @Route("majpanel/api/blog/getfiles/{id}", name="majpanel_api_blog_getfiles" ,  methods={"GET","HEAD"})
		 */
		public function getFileDir($id)
		{
			try {
				$pathDir=$this->getParameter('upload_real_path').'Blog/'.$id.'/';
				$dirName=$this->getParameter('upload_path').'Blog/'.$id;
				return $this->apiService->response( $this->adminFileService->getDirFiles( $pathDir,$dirName ) );
			}
			catch (\Exception $e) {
				return $this->apiService->respondValidationError( $e->getMessage() );

			}
		}

		/**
		 * @Route("majpanel/api/blog/delfile/", name="majpanel_api_blog_delfile" ,  methods={"POST","HEAD"})
		 */
		public function getDelFile(Request $request)
		{
			try {
				$dataPost=$request->request->all();
				$this->adminFileService->removeFile($this->getParameter('rootApp').'/public/'.$dataPost['path']);
				return $this->apiService->respondWithSuccess('Success')	;
			}  catch (\Exception $e) {
				return $this->apiService->respondValidationError( $e->getMessage() );
			}

		}



        /**
         * @param $type
         * @return string
         */

		private function setfieldQuery($type){

			switch ($type) {
				case "edit":
					return "tabel.id,tabel.header,tabel.content,tabel.active";
					break;
				case "detail":
					return "tabel.id,tabel.header,tabel.content, DATE_FORMAT(tabel.created_at,'%Y.%m.%d %H:%i') as created_at, DATE_FORMAT(tabel.modified_at,'%Y.%m.%d %H:%i') as modified_at,tabel.active";
					break;
				case "grid":
                    return "tabel.id,tabel.header,tabel.content, DATE_FORMAT(tabel.created_at,'%Y.%m.%d %H:%i') as created_at, DATE_FORMAT(tabel.modified_at,'%Y.%m.%d %H:%i') as modified_at,tabel.active";
                    break;
			}
		}


        /**
         * @param Autour $objectEntity
         * @param array $requestData
         * @return Autour
         * @throws \Exception\
         */
		private function setEntity(Blog $objectEntity,array $requestData)
		{

			$objectEntity
			    ->setHeader($requestData['header'])
				->setContent($requestData['content'])
                ->setCreatedAt(new \DateTime())
				->setActive($requestData['active'])
				;

			return $objectEntity;

		}

		private function dateTostring( $dateSet='' ){
            $date = new \DateTime($dateSet);
            return $date->format('Y-m-d H:i:s');
        }

	}
