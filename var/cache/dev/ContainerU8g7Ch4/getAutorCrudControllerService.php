<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'App\Controller\Admin\MajPanel\Api\Autor\AutorCrudController' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/ControllerTrait.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
include_once \dirname(__DIR__, 4).'/src/Controller/Admin/MajPanel/Api/Autor/AutorCrudController.php';
include_once \dirname(__DIR__, 4).'/src/Services/MajPanel/AdminFileService.php';

$this->services['App\\Controller\\Admin\\MajPanel\\Api\\Autor\\AutorCrudController'] = $instance = new \App\Controller\Admin\MajPanel\Api\Autor\AutorCrudController(($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger())), ($this->privates['App\\Services\\MajPanel\\AdminFileService'] ?? ($this->privates['App\\Services\\MajPanel\\AdminFileService'] = new \App\Services\MajPanel\AdminFileService())), ($this->services['App\\Services\\MajPanel\\ApiService'] ?? $this->load('getApiServiceService.php')));

$instance->setContainer(($this->privates['.service_locator.vdmMuyE'] ?? $this->load('get_ServiceLocator_VdmMuyEService.php'))->withContext('App\\Controller\\Admin\\MajPanel\\Api\\Autor\\AutorCrudController', $this));

return $instance;
