<?php

    /*
     * (c) MajPanel <https://github.com/MajPanel/>
     *
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */


	namespace App\Controller\Admin\MajPanel\Api\Book;


	use phpDocumentor\Reflection\Types\Integer;
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use Symfony\Component\HttpFoundation\JsonResponse;
	use Symfony\Component\Routing\Annotation\Route;
	use Symfony\Component\HttpFoundation\Request;
	use Psr\Log\LoggerInterface;
	use App\Form\MajPanel\Book\EditFormValidateBook;
	use App\Form\MajPanel\Book\InsertFormValidateBook;
	use App\Services\MajPanel\AdminFileService;
	use App\Services\MajPanel\ApiService;

	use App\Entity\Book;
	use App\Services\MajPanel\Book\ServiceBook;

    /**
     * @author Majid Kazerooni <support@majpanel.com>
     */

	class BookCrudController extends AbstractController
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
		 * @Route("majpanel/api/book/datagrid/", name="majpanel_api_book_getall_grid" ,  methods={"GET","HEAD"})
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

			    $objectServiceBook     = new ServiceBook($this->getDoctrine()->getManager(),
				Book::class);
				$result=$objectServiceBook->getDataGridBook($this->setfieldQuery('grid'),$this->filter,$this->sort,$this->offset,$this->limit);
				return $this->apiService->response($result);

				} catch (\Exception $e) {
				return $this->apiService->respondValidationError($e->getMessage());
				}
		}

		/**
		 * @Route("majpanel/api/book/getalldata/", name="majpanel_api_book_getall" ,  methods={"GET","HEAD"})
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
				$objectServiceBook     = new ServiceBook($this->getDoctrine()->getManager(),
					Book::class);
				return $this->apiService->response( $objectServiceBook->getAllBook() );

				} catch (\Exception $e) {
				return $this->apiService->respondValidationError( $e->getMessage() );
				}

		}

		/**
		 * @Route("majpanel/api/book/getid/{type}/{id}/", name="majpanel_api_book_getid" ,  methods={"GET","HEAD"})
		 *
		 * @return JsonResponse
		 */

		public function getId( $type, $id)
		{
			try {

				$objectServiceBook = new ServiceBook( $this->getDoctrine()->getManager(), Book::class);
				return $this->apiService->response( $objectServiceBook->getBook($id,$this->setfieldQuery( $type ) ) );

				} catch (\Exception $e) {

				return $this->apiService->respondValidationError( $e->getMessage() );

				}
		}

		/**
         * @Route("majpanel/api/book/get/{id}/", name="majpanel_api_book_get" ,  methods={"GET","HEAD"})
		 * @param   Integer  $id
		 *
		 * @return JsonResponse
		 */

        public function getById(Integer $id)
        {
	        try {

		        $objectServiceBook  = new ServiceBook($this->getDoctrine()->getManager(),
			        Book::class);
		        $EntityObject=$objectServiceBook->getBookById($id);
		        return $this->apiService->response($EntityObject);

	             } catch (\Exception $e) {

		        return $this->apiService->respondValidationError( $e->getMessage() );

	             }
        }

		/**
		 * @Route("majpanel/api/book/search/{field}/{value}", name="majpanel_api_book_search_field" ,  methods={"GET","HEAD"})
		 * @param $field
		 * @param $value
		 *
		 * @return JsonResponse
		 */

		public function doSearch( $field , $value )
		{
			try {
				$objectServiceBook     = new ServiceBook($this->getDoctrine()->getManager(),
					Book::class);
				return $this->apiService->response( $objectServiceBook->getSerachFieldBook( $field , $value ) );

				} catch (\Exception $e) {

				return $this->apiService->respondValidationError( $e->getMessage() );

				}
		}

		/**
		 * @Route("majpanel/api/book/del/", name="majpanel_api_book_del_fields" ,  methods={"DELETE","HEAD"})
		 * @param   Request  $request
		 *
		 * @return JsonResponse
		 */

		public function doDelete(Request $request)
		{
			try {

				$objectServiceBook  = new ServiceBook($this->getDoctrine()->getManager(),
					Book::class);
				if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {

					$data = json_decode($request->getContent(), true);
					$request->request->replace(is_array($data) ? $data : array());

					foreach ($data['itemsSelect'] as $id) {
						$result = $objectServiceBook->deleteBook($id);
						$this->adminFileService->removeFile([
							$this->getParameter('upload_real_path') . 'Book/'. $id
						]);
					}
				} else 	throw new \Exception(' Content-Type / json  Error ');

				return $this->apiService->respondWithSuccess('Success')	;

			} catch (\Exception $e) {

				return $this->apiService->respondValidationError( $e->getMessage() );

			}

		}

		/**
		 * @Route("majpanel/api/book/update/", name="majpanel_api_book_update_field" ,  methods={"PUT","HEAD"})
		 * @param   Request  $request
		 *
		 * @return JsonResponse
		 */

		public function doUpdate(Request $request)
		{
			try {

				$ObjectBook=new Book();
				$objectServiceBook = new ServiceBook($this->getDoctrine()->getManager(),
					Book::class);

				if ( 0 === strpos($request->headers->get('Content-Type'), 'application/json') ) {
					$RestPutData = json_decode($request->getContent(), true);
					$RestPutData=$RestPutData['data'];
				} else 	throw new \Exception(' Content-Type / json  Error ');


				$datavalidate=new EditFormValidateBook( $RestPutData );
				$validationData=$datavalidate->validateCheck();

				if(empty($validationData['Error'])) {

					$objectServiceBook->editBook( $RestPutData );
					return $this->apiService->respondWithSuccess('Success')	;

				} else 	throw new \Exception( 'Validate Error' );

				} catch (\Exception $e) {

				return $this->apiService->respondValidationError( $validationData['Error'] );

				}
		}

		/**
		 * @Route("majpanel/api/book/insert/", name="majpanel_api_book_insert_field" ,  methods={"POST","HEAD"})
		 * @param   Request  $request
		 *
		 * @return JsonResponse
		 */
		public function doInsert(Request $request)
		{
			try {

				$ObjectBook=new Book();
				$objectServiceBook = new ServiceBook($this->getDoctrine()->getManager(),
					Book::class);

				if (0 === strpos($request->headers->get('Content-Type') , 'application/json') ) {

					$RestPostData = json_decode($request->getContent(), true);
					$RestPostData=$RestPostData['data'];

				} else 	throw new \Exception(' Content-Type / json  Error ');

				$datavalidate=new InsertFormValidateBook($RestPostData);
				$validationData=$datavalidate->validateCheck();

				if(empty($validationData['Error'])) {

					$objectServiceBook->insertBook($this->setEntity($ObjectBook,$RestPostData));
					$this->adminFileService->makeDir($this->getParameter('upload_real_path').'Book/'.$ObjectBook->getId().'/');

					return $this->apiService->respondWithSuccess('Success')	;

				} else 	throw new \Exception( 'Validate Error' );

				} catch (\Exception $e) {

					return $this->apiService->respondValidationError( $validationData['Error'] );

				}
		}

		/**
		 * @Route("majpanel/api/book/upload/", name="majpanel_api_book_upload" ,  methods={"POST","HEAD"})
		 * @param   Request  $request
		 *
		 * @return JsonResponse
		 */

		public function doUpload( Request $request )
		{
			try {
				$files = $request->files->all();
				$dataPost=$request->request->all();

				foreach ($files as $file)
				{
					$fileName=$dataPost['id'].'_'.$file->getClientOriginalName();
					$this->adminFileService->upload($this->getParameter('upload_real_path').'Book/'.$dataPost['id'].'/', $file, $fileName);
				}
				return $this->apiService->respondWithSuccess('Success')	;

				} catch (\Exception $e) {

				return $this->apiService->respondValidationError( $e->getMessage() );

				}
		}

		/**
		 * @Route("majpanel/api/book/getfiles/{id}", name="majpanel_api_book_getfiles" ,  methods={"GET","HEAD"})
		 * @param   Integer  $id
		 *
		 * @return JsonResponse
		 */

		public function getFileDir( $id )
		{
			try {
				$pathDir=$this->getParameter('upload_real_path').'Book/'.$id.'/';
				$dirName=$this->getParameter('upload_path').'Book/'.$id;

				return $this->apiService->response( $this->adminFileService->getDirFiles( $pathDir,$dirName ) );

				}
			catch (\Exception $e) {
				return $this->apiService->respondValidationError( $e->getMessage() );

			}
		}

		/**
		 * @Route("majpanel/api/book/delfile/", name="majpanel_api_book_delfile" ,  methods={"POST","HEAD"})
		 * @param   Request  $request
		 * @return JsonResponse
		 */

		public function getDelFile(Request $request)
		{
			try {

				$dataPost = $request->request->all();
				$this->adminFileService->removeFile($this->getParameter('rootApp')
					. '/public/' . $dataPost['path']);

				return $this->apiService->respondWithSuccess('Success')	;

			} catch (\Exception $e) {
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
					return "tabel.id,tabel.name,tabel.autor,tabel.publisher";
					break;
				case "detail":
					return "tabel.id,tabel.name,tabel.autor,tabel.publisher";
					break;
				case "grid":
                    return "tabel.id,tabel.name,tabel.autor,tabel.publisher";
                    break;
			}
		}


		/**
		 * @param   Book   $objectEntity
		 * @param   array  $requestData
		 *
		 * @return Book
		 */

		private function setEntity(Book $objectEntity,array $requestData)
		{

			$objectEntity
			->setName($requestData['name']) 
				->setAutor($requestData['autor']) 
				->setPublisher($requestData['publisher']) 
				;

			return $objectEntity;

		}

	}
