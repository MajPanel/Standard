<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'liform.add_schema_extension' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeExtensionInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractTypeExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/limenius/liform/src/Limenius/Liform/Form/Extension/AddLiformExtension.php';

return $this->services['liform.add_schema_extension'] = new \Limenius\Liform\Form\Extension\AddLiformExtension();