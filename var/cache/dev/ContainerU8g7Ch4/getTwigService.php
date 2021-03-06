<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'twig' shared service.

include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Environment.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Loader/LoaderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Loader/ExistsLoaderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Loader/SourceContextLoaderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Loader/FilesystemLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/twig-bundle/Loader/NativeFilesystemLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/ExtensionInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/AbstractExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Extension/CsrfExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Extension/LogoutUrlExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Extension/SecurityExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/ProfilerExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Extension/ProfilerExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Profiler/Profile.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Extension/TranslationExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Extension/AssetExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Extension/CodeExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Extension/RoutingExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Extension/YamlExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Extension/StopwatchExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Extension/HttpKernelExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Extension/HttpFoundationExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/http-foundation/UrlHelper.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Extension/FormExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/Twig/DoctrineExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/DebugExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/webpack-encore-bundle/src/Twig/EntryFilesTwigExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/limenius/react-renderer/src/Limenius/ReactRenderer/Twig/ReactRenderExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/limenius/react-renderer/src/Limenius/ReactRenderer/Renderer/AbstractReactRenderer.php';
include_once \dirname(__DIR__, 4).'/vendor/limenius/react-renderer/src/Limenius/ReactRenderer/Renderer/PhpExecJsReactRenderer.php';
include_once \dirname(__DIR__, 4).'/vendor/limenius/react-renderer/src/Limenius/ReactRenderer/Context/ContextProviderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/limenius/react-renderer/src/Limenius/ReactRenderer/Context/SymfonyContextProvider.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/AppVariable.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/RuntimeLoader/RuntimeLoaderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/RuntimeLoader/ContainerRuntimeLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/twig-bundle/DependencyInjection/Configurator/EnvironmentConfigurator.php';

$a = new \Symfony\Bundle\TwigBundle\Loader\NativeFilesystemLoader([], \dirname(__DIR__, 4));
$a->addPath((\dirname(__DIR__, 4).'/templates'));
$a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Resources/views'), 'Framework');
$a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Resources/views'), '!Framework');
$a->addPath((\dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/Resources/views'), 'Doctrine');
$a->addPath((\dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/Resources/views'), '!Doctrine');
$a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/security-bundle/Resources/views'), 'Security');
$a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/security-bundle/Resources/views'), '!Security');
$a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/twig-bundle/Resources/views'), 'Twig');
$a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/twig-bundle/Resources/views'), '!Twig');
$a->addPath((\dirname(__DIR__, 4).'/templates'));
$a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Resources/views/Form'));

$this->services['twig'] = $instance = new \Twig\Environment($a, ['debug' => true, 'strict_variables' => true, 'autoescape' => 'name', 'cache' => ($this->targetDir.''.'/twig'), 'charset' => 'UTF-8']);

$b = ($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true)));
$c = ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()));
$d = new \Limenius\ReactRenderer\Context\SymfonyContextProvider($c);

$e = new \Limenius\ReactRenderer\Renderer\PhpExecJsReactRenderer((\dirname(__DIR__, 4).'/src/Resources/webpack/server-bundle.js'), false, $d, ($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger())));
$e->setServerBundlePath((\dirname(__DIR__, 3).'/webpack/server-bundle.js'));
$f = new \Symfony\Bridge\Twig\AppVariable();
$f->setEnvironment('dev');
$f->setDebug(true);
if ($this->has('security.token_storage')) {
    $f->setTokenStorage(($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()));
}
if ($this->has('request_stack')) {
    $f->setRequestStack($c);
}

$instance->addExtension(new \Symfony\Bridge\Twig\Extension\CsrfExtension());
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\LogoutUrlExtension(($this->privates['security.logout_url_generator'] ?? $this->getSecurity_LogoutUrlGeneratorService())));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\SecurityExtension(($this->services['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService())));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\ProfilerExtension(new \Twig\Profiler\Profile(), $b));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\TranslationExtension(($this->services['translator'] ?? $this->load('getTranslatorService.php'))));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\AssetExtension(($this->privates['assets.packages'] ?? $this->load('getAssets_PackagesService.php'))));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\CodeExtension(($this->privates['debug.file_link_formatter'] ?? ($this->privates['debug.file_link_formatter'] = new \Symfony\Component\HttpKernel\Debug\FileLinkFormatter(NULL))), \dirname(__DIR__, 4), 'UTF-8'));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\RoutingExtension(($this->services['router'] ?? $this->getRouterService())));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\YamlExtension());
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\StopwatchExtension($b, true));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpKernelExtension());
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpFoundationExtension(new \Symfony\Component\HttpFoundation\UrlHelper($c, ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService()))));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\FormExtension());
$instance->addExtension(new \Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension());
$instance->addExtension(new \Twig\Extension\DebugExtension());
$instance->addExtension(new \Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'webpack_encore.entrypoint_lookup_collection' => ['privates', 'webpack_encore.entrypoint_lookup_collection', 'getWebpackEncore_EntrypointLookupCollectionService.php', true],
    'webpack_encore.tag_renderer' => ['privates', 'webpack_encore.tag_renderer', 'getWebpackEncore_TagRendererService.php', true],
], [
    'webpack_encore.entrypoint_lookup_collection' => '?',
    'webpack_encore.tag_renderer' => '?',
])));
$instance->addExtension(new \Limenius\ReactRenderer\Twig\ReactRenderExtension($e, $d, 'both', false));
$instance->addGlobal('app', $f);
$instance->addRuntimeLoader(new \Twig\RuntimeLoader\ContainerRuntimeLoader(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'Symfony\\Bridge\\Twig\\Extension\\CsrfRuntime' => ['privates', 'twig.runtime.security_csrf', 'getTwig_Runtime_SecurityCsrfService.php', true],
    'Symfony\\Bridge\\Twig\\Extension\\HttpKernelRuntime' => ['privates', 'twig.runtime.httpkernel', 'getTwig_Runtime_HttpkernelService.php', true],
    'Symfony\\Component\\Form\\FormRenderer' => ['privates', 'twig.form.renderer', 'getTwig_Form_RendererService.php', true],
], [
    'Symfony\\Bridge\\Twig\\Extension\\CsrfRuntime' => '?',
    'Symfony\\Bridge\\Twig\\Extension\\HttpKernelRuntime' => '?',
    'Symfony\\Component\\Form\\FormRenderer' => '?',
])));
(new \Symfony\Bundle\TwigBundle\DependencyInjection\Configurator\EnvironmentConfigurator('F j, Y H:i', '%d days', NULL, 0, '.', ','))->configure($instance);

return $instance;
