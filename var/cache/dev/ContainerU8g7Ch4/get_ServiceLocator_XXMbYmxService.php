<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.XXMbYmx' shared service.

return $this->privates['.service_locator.XXMbYmx'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'token' => ['privates', '.errored..service_locator.XXMbYmx.Symfony\\Component\\Security\\Core\\Authentication\\Token\\TokenInterface', NULL, 'Cannot autowire service ".service_locator.XXMbYmx": it references interface "Symfony\\Component\\Security\\Core\\Authentication\\Token\\TokenInterface" but no such service exists. Did you create a class that implements this interface?'],
], [
    'token' => 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\TokenInterface',
]);