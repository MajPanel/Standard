<?php
    /*
     * (c) MajPanel <https://github.com/MajPanel/>
     *
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

	namespace App\Command;
	use Symfony\Component\Console\Command\Command;
	use Symfony\Component\Console\Input\InputArgument;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use App\Services\MajPanel\GenerateService;
	use Psr\Container\ContainerInterface;
	use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

    /**
     * @author Majid Kazerooni <support@majpanel.com>
     */
	class MajPanelCommand extends Command
	{

		protected static $defaultName = 'majpanel';
		protected $container;
		protected $generateService;

		public function __construct(ContainerInterface $container,ParameterBagInterface $params)
		{
			parent::__construct();
			$this->container = $container;
			$this->generateService=new GenerateService($params);
		}

		protected function configure( )
		{
			$this->setDescription('Creates a new json file .')->setHelp('This command allows you to create a json file...');
			$this->addArgument('EntityName', InputArgument::REQUIRED, 'Import Entity Name ?');
			$this->addArgument('Command', InputArgument::OPTIONAL, 'Command?');
		}

		/*
		 *
		 */
		protected function execute(InputInterface $input, OutputInterface $output)
		{
			$entityName = trim($input->getArgument('EntityName'));
			$command = trim($input->getArgument('Command'));

			if( !is_file(dirname(__DIR__).'/Entity/'.$entityName.'.php') )
			{
				$output->writeln('<error>
				<<<  Entity "'.$input->getArgument('EntityName').'"" Not Found !  >>>
				</error>'); return false;
			}

			if( $this->CheckInputCommand( $command ) )
			{
				$output->writeln('<error>
				<<<  "'.$input->getArgument('Command').'" Not Found !  >>>
				</error>');
				return false;
			}

			$fieldDetail=array();
			if(  $command !== "installByConfig") {
				$em = $this->container->get('doctrine')->getManager();
				$result=$em->getClassMetadata("App\Entity\\".$entityName);
				$fieldDetail=$result->fieldMappings;
			}

//##########################################################################

			if( $command === 'reinstall' ) $this->generateService->removeYmlConfig($entityName);

//##########################################################################
			$result=$this->generateService->intiEntity($entityName,$fieldDetail);

			if( $result ){
				$output->writeln('<info>
				<<<  Yml Config  Complited    >>>
				</info>');
			}
			else {
				$output->writeln('<error>
				<<<  Error : Make Yml Config File
				'.$result.'
				>>>
				</error>');
			}
//##########################################################################

			if ( $command === 'delete'  ) {
				$this->generateService->deleteEntity($entityName);
				$this->generateService->RemoveMenuTemplate($entityName);
				$this->generateService->RemoveReactComponent($entityName);
				$output->writeln('<info>
				<<<  ALL FILES & DIR DELETED   >>>
				</info>');
			}
//##########################################################################

			if ( $command !== 'delete' ) {

				$result=$this->generateService->CreateApiFile($entityName);

				if( $result ){
					$output->writeln('<info>
				<<<  Make API Files Complited    >>>
				</info>');
				}
				else {
					$output->writeln('<error>
				<<<  Error : Make API Files
				'.$result.'
				>>>
				</error>');
				}


				$result=$this->generateService->CreateReactGridFile($entityName);

				if( $result ){
					$output->writeln('<info>
				<<<  Make REACT Files Complited    >>>
				</info>');
				}
				else {
					$output->writeln('<error>
				<<<  Error : Make REACT Files
				'.$result.'
				>>>
				</error>');
				}

				$result=$this->generateService->CreateRegisteFileReactComponent($entityName);

				if( $result ){
					$output->writeln('<info>
				<<<  Make Register Component  File Complited    >>>
				</info>');
				}
				else {
					$output->writeln('<error>
				<<<  Error : Make Register Component  File 
				'.$result.'
				>>>
				</error>');
				}

				$result=$this->generateService->CreateMenuTemplate($entityName);

				if( $result ){
					$output->writeln('<info>
				<<<  Make Template Component  File Complited    >>>
				</info>');
				}
				else {
					$output->writeln('<error>
				<<<  Error : Make Template Component  File 
				'.$result.'
				>>>
				</error>');
				}


				$output->writeln('<info>
				<<<  "'.$input->getArgument('Command').'" Complited Process   >>>
				</info>');

				return true;
			}

		}

		/*
		 *
		 */
		protected function is_json($str)
		{

			$result = json_decode($str);
			if (json_last_error() === JSON_ERROR_SYNTAX) {
				throw new \Exception("Error Check your file Json Type ");
			}

		}

		/*
 *
 */
		protected function CheckInputCommand($str)
		{
			switch ($str) {
				case "install":
					return false;
					break;
				case "delete":
					return false;
					break;
				case "reinstall":
					return false;
					break;
				case "installByConfig":
					return false;
					break;
				default:
					return true;
			}
		}

	}
