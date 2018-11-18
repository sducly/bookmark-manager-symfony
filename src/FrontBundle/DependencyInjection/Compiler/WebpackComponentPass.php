<?php
/**
 * Created by PhpStorm.
 * User: acantepie
 * Date: 16/03/18
 * Time: 14:48
 */

namespace FrontBundle\DependencyInjection\Compiler;

use FrontBundle\Component\Webpack\Twig\WebpackTwigExtension;
use FrontBundle\DependencyInjection\Configuration;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

/**
 * Class FrontComponentPass
 */
class WebpackComponentPass implements CompilerPassInterface
{

    /**
     * You can modify the container here before it is dumped to PHP code.
     */
    public function process(ContainerBuilder $container)
    {
        $configs = $container->getExtensionConfig('front');
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $def = $container->getDefinition(WebpackTwigExtension::class);
        $def->addMethodCall('loadConfig', [$config["webpack"]]);
    }

    private function processConfiguration(ConfigurationInterface $configuration, array $configs)
    {
        $processor = new Processor();
        return $processor->processConfiguration($configuration, $configs);
    }

}