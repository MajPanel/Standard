<?php


	namespace App\Services\MajPanel;
	use Symfony\Component\Finder\Finder;
	use Symfony\Component\Filesystem\Filesystem;
	use Symfony\Component\HttpFoundation\File\Exception\FileException;

	class AdminFileService
	{

		private $fileSyastem;
		private $fileFinder;

		/**
		 * AdminFileService constructor.
		 */
		public function __construct()
		{
			$this->fileSyastem=new  Filesystem();
			$this->fileFinder=new  Finder();
		}

		/**
		 * @param   string  $path
		 */
        public function makeDir(string $path)
        {
            $this->fileSyastem->mkdir($path, 0766);
        }

		/**
		 * @param   string  $uploadDir
		 * @param           $file
		 * @param   string  $filename
		 */
		public function upload( string $uploadDir, $file,string $filename)
		{
			try {

				$file->move($uploadDir, $filename);

			} catch (FileException $e){

				throw new FileException('Failed to upload file'. $e->getMessage());
			}
		}

		/**
		 * @param   string  $pathDir
		 * @param   string  $dirName
		 *
		 * @return array
		 */
		public function getDirFiles(string $pathDir,string $dirName){
			$fileProperty=[];
			$this->fileFinder->files()->in($pathDir);

			foreach ($this->fileFinder as $file) {
				$fileProperty[]=[
					'file_path'=>$dirName.'/'.$file->getFilename(),
					'file_extention' =>$file->getExtension()  ,
					'filename'=>$file->getFilename() ,
					'size' =>$file->getSize()
				];
			}
			return $fileProperty;

		}

		/**
		 * @param $path
		 */

		public function removeFile( $path) {
			$this->fileSyastem->remove($path);
		}

	}
