<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'App\Controller\SecurityController' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/ControllerTrait.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
include_once \dirname(__DIR__, 4).'/src/Controller/SecurityController.php';

$this->services['App\\Controller\\SecurityController'] = $instance = new \App\Controller\SecurityController();

$instance->setContainer(($this->privates['.service_locator.vdmMuyE'] ?? $this->load('get_ServiceLocator_VdmMuyEService.php'))->withContext('App\\Controller\\SecurityController', $this));

return $instance;
