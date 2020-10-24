<?php


	namespace App\Services\MajPanel;
	use Doctrine\ORM\EntityManager;
    use League\Uri\Components\DataPath;
	use phpDocumentor\Reflection\Types\True_;
	use Symfony\Component\Filesystem\Filesystem;
	use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
	use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
    use Symfony\Component\HttpFoundation\File\Exception\FileException;
    use Symfony\Component\HttpFoundation\File\File;
    use Symfony\Component\Yaml\Parser;


	class GenerateService
	{
		private $appRoot;
		private $filesystem;
		private $tempfile;
		protected $em;
		protected $entityName;
		private $yamlConfig;
		private $yamlMajPanel;
		private $entityProperty;

		/**
		 * @var \Doctrine\ORM\EntityRepository
		 */

		public function __construct(ParameterBagInterface $params)
		{
			$this->params = $params;
			$this->appRoot=$this->params->get('kernel.project_dir');
			$this->tempfile=sys_get_temp_dir().'/temp.data';
			$this->filesystem = new Filesystem();

		}


		public function rootProject(){
			return $this->appRoot;
		}

		/**
		 * @param          $entityName
		 * @param   array  $entityProperty
		 *
		 * @return bool|\Exception
		 */
		public function intiEntity($entityName,array $entityProperty){

			try {

				$this->entityProperty=$entityProperty;
				$configPath=$this->appRoot."/config/MajPanel/$entityName.yaml";
				if(!$this->filesystem->exists($configPath)) $this->MakeYaml($entityName,$this->appRoot,$configPath);
				$yaml = new Parser();
				$this->yamlConfig  = $yaml->parse( file_get_contents($configPath ) );
				$this->yamlMajPanel  = $yaml->parse( file_get_contents($this->appRoot."/config/MajPanel/Config.yaml" ) );
				$this->MakeDir();
				return true;

			} catch (\Exception $e) {
				return $e;
			}

		}

		/**
		 * @param   string  $entityName
		 * @param   string  $baseUrl
		 * @param   string  $configPath
		 */
        private function MakeYaml(string $entityName,string $baseUrl,string $configPath){
	        $fileContent=file_get_contents($baseUrl."/Structure/Config/yaml.tmp") ;
	        $fileContent=str_replace('{EntityPascalCase}',$entityName,$fileContent);

	        $fileContent=str_replace('{Column}',$this->createColumn(),$fileContent);
	        $fileContent=str_replace('{GridQueryColumn}',$this->createGridQueryColumn(),$fileContent);
	        $fileContent=str_replace('{EntityProperty}',$this->createEntityProperty(),$fileContent);

	        $this->filesystem->dumpFile($this->tempfile, $fileContent);
	        $this->filesystem->copy($this->tempfile, $configPath, true);
        }

		/**
		 * @param   $path
		 *
		 * @return string
		 */
        private function convertRootPath( $path) :string {
			return str_replace('%kernel.project_dir%',$this->appRoot,$path);
			}

		public function MakeDir(){
			foreach($this->yamlConfig['path']['dir'] as $path){
				$pathTemp=$this->convertRootPath($path);
				if(!$this->filesystem->exists( $pathTemp ) )
				$this->filesystem->mkdir($pathTemp, 0700);
			}
		}

//===========================================================================

		/**
		 * @param   string  $entityName
		 *
		 * @return bool|\Exception
		 */
		public function CreateApiFile(string $entityName)
		{

			try {
				foreach($this->yamlConfig['path']['fileTempApi'] as $key => $path){
					$fileContent=file_get_contents($this->convertRootPath($path['source']) );
					$fileContent=str_replace('{EntityPascalCase}',$entityName,$fileContent);
					$fileContent=str_replace('{EntityCamelCase}',strtolower($entityName),$fileContent);
					$fileContent=str_replace('{StringFormApiValidate}',$this->StringFormApiValidate(),$fileContent);
					$fileContent=str_replace('{StringFormApiSetter}',$this->StringFormApiSetter(),$fileContent);
					$fileContent=str_replace('{SetFiledGrid}',$this->StringGridQueryColumn($this->yamlConfig['SetFiledGrid']),$fileContent);
					$fileContent=str_replace('{SetFiledDetail}',$this->StringGridQueryColumn($this->yamlConfig['SetFiledDetail']),$fileContent);
					$fileContent=str_replace('{SetFiledEdit}',$this->StringGridQueryColumn($this->yamlConfig['SetFiledEdit']),$fileContent);
					$fileContent=str_replace('{SetFiledInsert}',$this->StringGridQueryColumn($this->yamlConfig['SetFiledInsert']),$fileContent);

					$this->filesystem->dumpFile($this->tempfile, $fileContent);
					$this->filesystem->copy($this->tempfile, $this->convertRootPath($path['target']), true);
				}
				return true;
			} catch (\Exception $e) {
				return $e;
			}


		}

		/**
		 * @return string
		 */
		public  function StringFormApiValidate(){
			$stringResult='';
			foreach ($this->yamlConfig['Entity'] as $filedName => $filedProperty){
				if( $filedName === 'id' ) continue;
                if (strpos($this->yamlConfig['SetFiledInsert'], $filedName) === false)  continue;
                $stringResult.=" '$filedName' => [new Assert\NotBlank()]
				, ";
			}
			return rtrim($stringResult, ", ");
		}

		/**
		 * @param   string  $stringFileds
		 *
		 * @return string
		 */
	    public function StringGridQueryColumn(string $stringFileds){

		     $fileds=explode(',',$stringFileds);
		    $stringResult='';
		     foreach ($fileds  as $filed) {
			     $stringResult .=$this->yamlConfig['Entity'][$filed]['query'].',';
		     }
		    return rtrim($stringResult, ", ");
	    }

		/**
		 * @return string
		 */
	    public  function StringFormApiSetter(){
			$stringResult='$objectEntity
			';
			foreach ($this->yamlConfig['Entity'] as $filedName => $filedProperty){
				if($filedName==='id') continue;
                if (strpos($this->yamlConfig['SetFiledInsert'], $filedName) === false)  continue;

                $stringResult.='->'.$filedProperty['setter'].'('.$filedProperty['class'].') 
				';
			}
			return $stringResult.';';
		}


//===================================================================================

		/**
		 * @return string
		 */
		public function createColumn(){
			$stringResult='';
			foreach ($this->entityProperty as $key => $filedproperty) {
				$stringResult.="$key : '".$filedproperty['fieldName']."',";
			}
			return rtrim($stringResult, ", ");
		}


		/**
		 * @return string
		 */
		public function createGridQueryColumn(){
			$stringResult='';
			foreach ($this->entityProperty as $filedproperty) {
				$stringResult.=$filedproperty['fieldName'].',';
			}
			return rtrim($stringResult, ", ");
		}

		/**
		 * @return string
		 */
		public function createEntityProperty(){

			$stringResult='';
			foreach ($this->entityProperty as $key => $filedproperty) {

				$stringResult.=" $key : { ";
				$nameSetterColumn=ucfirst ($filedproperty['fieldName']);

				if ( strrpos($filedproperty['fieldName'], "_") !== 0) {
					$TempArray=explode('_',$filedproperty['fieldName']);
					$nameSetterColumn='';
					foreach($TempArray as $NameColumn){
						$nameSetterColumn.=	ucfirst ($NameColumn);
					}
				}

				$fieldName='tabel.'.$filedproperty['fieldName'];
				$className='$requestData[\''.$filedproperty['fieldName'].'\']';

				if($filedproperty['type'] === 'date')
				{
					$fieldName=" DATE_FORMAT(tabel.".$filedproperty['fieldName'].",'%Y.%m.%d') as ".$filedproperty['fieldName'];
					$className='new \\\DateTime($requestData[\''.$filedproperty['fieldName'].'\'])';

				}

                if($filedproperty['type'] === 'datetime')
                {
                    $fieldName=" DATE_FORMAT(tabel.".$filedproperty['fieldName'].",'%Y.%m.%d %H:%i') as ".$filedproperty['fieldName'];
                    $className='new \\\DateTime($requestData[\''.$filedproperty['fieldName'].'\'])';

                }



				$stringResult.=' header : "'.$nameSetterColumn.'" , setter : "set'.$nameSetterColumn.'" , type : "'.$filedproperty['type'].'" , query : "'.$fieldName.'" , class : "'.$className.'"  ';

				$stringResult.='} ,';
			}

			return rtrim($stringResult, ", ");

		}
//===================================================================================

		/**
		 * @param $entityName
		 *
		 * @return bool|\Exception
		 */
		public function CreateReactGridFile($entityName)
		{
			try {
				foreach($this->yamlConfig['path']['fileTempGrid'] as $key => $path){
					$fileContent=file_get_contents($this->convertRootPath($path['source']) );
					$fileContent=str_replace('{EntityPascalCase}',$entityName,$fileContent);
					$fileContent=str_replace('{EntityCamelCase}',strtolower($entityName),$fileContent);
					$fileContent=str_replace('{ReactValidateFieldsEdit}',$this->createReactValidateFieldsEdit(),$fileContent);
					$fileContent=str_replace('{ReactValidateFieldsInsert}',$this->createReactValidateFieldsInsert(),$fileContent);
					$fileContent=str_replace('{ReactConfigGridTabel}',$this->createReactConfigGridTabel(),$fileContent);
					$fileContent=str_replace('{ReactDetailDataController}',$this->createReactDetailDataController(),$fileContent);
					$fileContent=str_replace('{ReactDefaultValuesInsert}',$this->createReactDefaultValuesInsert(),$fileContent);
					$fileContent=str_replace('{ReactInsertDataController}',$this->createReactInsertDataController(),$fileContent);
					$fileContent=str_replace('{ReactDefaultValuesEdit}',$this->createReactDefaultValuesEdit(),$fileContent);
					$fileContent=str_replace('{ReactEditDataController}',$this->createReactEditDataController(),$fileContent);

					$this->filesystem->dumpFile($this->tempfile, $fileContent);
					$this->filesystem->copy($this->tempfile, $this->convertRootPath($path['target']), true);
				}
				return true;
			} catch (\Exception $e) {
				return $e;
			}

		}


		/**
		 * @return string
		 */
		public  function createReactValidateFieldsEdit(){
			$stringResult='';
			foreach ($this->yamlConfig['Entity'] as $filedName => $filedProperty) {
                if (strpos($this->yamlConfig['SetFiledEdit'], $filedName) === false)  continue;

                $stringResult.='
				"'.$filedName.'" :
					{
				';
				$stringResult.='required: "'.$filedProperty['header'].' required" 
					} ,';
			}
			return rtrim($stringResult, ", ");
		}

		/**
		 * @return string
		 */
		public  function createReactValidateFieldsInsert(){
			$stringResult='';
			foreach ($this->yamlConfig['Entity'] as $filedName => $filedProperty) {
				if( $filedName === 'id') continue;
				$stringResult.='
				"'.$filedName.'" :
					{
				';
				$stringResult.='required: "'.$filedProperty['header'].' required" 
					} ,';
			}
			return rtrim($stringResult, ", ");
		}

		/**
		 * @return string
		 */
		public  function createReactConfigGridTabel(){
			$stringResult='';
			foreach ($this->yamlConfig['Entity'] as $filedName => $filedProperty) {

				$stringResult.="
				{ name: '".$filedName."' , title: '".$filedName."' } ,";
			}
			return rtrim($stringResult, ", ");
		}

		/**
		 * @return string
		 */
		public function createReactDetailDataController(){
			$stringResult='';
			foreach ($this->yamlConfig['Entity'] as $filedName => $filedProperty) {

				$stringResult.='
					<div className="form-group row">
						<label > '.$filedProperty['header'].' :  </label> 
						<small className="form-text font-weight-normal text-danger" > {rowData.'.$filedName.'} </small>
					</div>
				';

			}
			return $stringResult;
		}

		/**
		 * @return string
		 */
		public function createReactDefaultValuesInsert(){
			$stringResult='		';
			foreach ($this->yamlConfig['Entity'] as $filedName => $filedProperty) {

				$stringResult.= $filedName ." : '',
				";

			}
			return $stringResult;
		}

		/**
		 * @return string
		 */
		public function createReactInsertDataController(){
			$stringResult='		';
			foreach ($this->yamlConfig['Entity'] as $filedName => $filedProperty) {
				if( $filedName === 'id') continue;
                if (strpos($this->yamlConfig['SetFiledInsert'], $filedName) === false)  continue;
                    $stringResult.='
				<div className="form-group">
					<label >'.$filedProperty['header'].'</label>
					<input type="text" className="form-control"
					       name="'.$filedName.'"
					       placeholder="Enter '.ucfirst ($filedName).'" ref={register(ConfigInsertForm.ValidateFields.'.$filedName.')} />
						{errors.'.$filedName.' && <small className="form-text  text-danger" >{errors.'.$filedName.'.message}</small>}
				</div>
';

			}
			return $stringResult;

		}

		/**
		 * @return string
		 */
		public function createReactDefaultValuesEdit(){
			$stringResult='		    ';
			foreach ($this->yamlConfig['Entity'] as $filedName => $filedProperty) {
                if (strpos($this->yamlConfig['SetFiledEdit'], $filedName) === false)  continue;

				$stringResult.=$filedName.' : rowData.'.$filedName.',
				';

			}
			return $stringResult;
		}

		/**
		 * @return string
		 */
		public function createReactEditDataController(){
			$stringResult='		';
			foreach ($this->yamlConfig['Entity'] as $filedName => $filedProperty) {
				if( $filedName === 'id') continue;
                if (strpos($this->yamlConfig['SetFiledEdit'], $filedName) === false)  continue;

                $stringResult.='
				<div className="form-group">
					<label >'.$filedProperty['header'].'</label>
					<input type="text" className="form-control"
					       name="'.$filedName.'"
					       placeholder="Enter '.ucfirst ($filedName).'" ref={register(ConfigEditForm.ValidateFields.'.$filedName.')} />
						{errors.'.$filedName.' && <small className="form-text  text-danger" >{errors.'.$filedName.'.message}</small>}
				</div>
';

			}
			return $stringResult;

		}

//===================================================================================

		/**
		 * @param   string  $entityName
		 *
		 * @return bool
		 */
		public function CreateRegisteFileReactComponent(string $entityName){


				$fileContent=file($this->convertRootPath($this->yamlMajPanel['fileRegisterComponent'])) ;
				if (!in_array('//'.$entityName."\n", $fileContent)) {
					$this->filesystem->appendToFile($this->convertRootPath($this->yamlMajPanel['fileRegisterComponent']), "\n//$entityName\nimport \"./MajPanel/Grid/$entityName/Startup/registration\";");
				}
				return true;

		}
//===================================================================================

		/**
		 * @param   string  $entityName
		 *
		 * @return bool
		 */
		public function CreateMenuTemplate(string $entityName){

			$fileContent=file($this->convertRootPath($this->yamlMajPanel['fileTwigComponent'])) ;
			$trimmed_array=array_map('trim',$fileContent);

			$content = '
			
			{#'.$entityName.'#}
			<a href="{{ path(\'admin_majpanel_grid_'.strtolower($entityName).'_home\') }}">{#'.$entityName.'#}
			    <div class="c-menu-item__title">{#'.$entityName.'#}
			        <span><i class="fa fa-angle-right ">{#'.$entityName.'#}
			            </i> '.$entityName.' </span>{#'.$entityName.'#}
			    </div>{#'.$entityName.'#}
			</a>{#'.$entityName.'#}';

			if (!in_array('{#'.$entityName.'#}', $trimmed_array)) {
				$this->filesystem->appendToFile($this->convertRootPath($this->yamlMajPanel['fileTwigComponent']), $content);
			}
			return true;
		}

//===================================================================================

		/**
		 * @param   string  $entityName
		 */
		public function removeYmlConfig(string $entityName)
		{
			$this->filesystem->remove($this->appRoot."/config/MajPanel/$entityName.yaml");
		}
//==================================================================================

		/**
		 * @param   string  $entityName
		 */
		public function deleteEntity(string $entityName)
		{

			foreach($this->yamlConfig['path']['dirDelete'] as $path){
				$this->filesystem->remove($this->convertRootPath($path));
			}
			$this->removeYmlConfig($entityName);
		}
//==================================================================================

		/**
		 * @param   string  $entityName
		 *
		 * @return bool
		 */
		public function RemoveMenuTemplate(string $entityName){

			$fileContent=file($this->convertRootPath($this->yamlMajPanel['fileTwigComponent'])) ;

			$temp_content='';
			foreach ($fileContent as $line) {
				if( strpos($line,"{#$entityName#}") ) continue ;
				$temp_content.=$line;
			}

			$this->filesystem->dumpFile($this->tempfile, $temp_content);
			$this->filesystem->copy($this->tempfile, $this->convertRootPath($this->yamlMajPanel['fileTwigComponent']), true);
			return true;
		}
//==================================================================================

		/**
		 * @param   string  $entityName
		 *
		 * @return bool
		 */
		public function RemoveReactComponent(string $entityName){

			$fileContent=file($this->convertRootPath($this->yamlMajPanel['fileRegisterComponent'])) ;

			$temp_content='';
			foreach ($fileContent as $line) {
				if( strpos($line,"$entityName") ) continue ;
				$temp_content.=$line;
			}

			$this->filesystem->dumpFile($this->tempfile, $temp_content);
			$this->filesystem->copy($this->tempfile, $this->convertRootPath($this->yamlMajPanel['fileRegisterComponent']), true);
			return true;
		}
//==================================================================================
		public function getPropertyEntity($entity)
		{
			$data=$this->em->getClassMetadata($entity);
			return $data->fieldMappings;
		}


	}
