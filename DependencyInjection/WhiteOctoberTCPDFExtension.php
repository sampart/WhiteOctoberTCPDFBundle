<?php

namespace WhiteOctober\TCPDFBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension,
    Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\DependencyInjection\Definition,
    Symfony\Component\DependencyInjection\Loader\XmlFileLoader,
    Symfony\Component\Config\Definition\Processor,
    Symfony\Component\Config\FileLocator;

use WhiteOctober\TCPDFBundle\DependencyInjection\Configuration;

class WhiteOctoberTCPDFExtension extends Extension
{
    /**
     * Load our configuration
     *
     * @param array $configs
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     * @return void
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        //$loader->load('services.xml');

        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, $configs);

        // TCPDF needs these constants defining
        foreach ($config as $k => $v)
        {
            define(strtoupper($k), $container->getParameterBag()->resolveValue($v));
        }

        // and the final one so that TCPDF uses our config and not the .php file one
        define('K_TCPDF_EXTERNAL_CONFIG', true);
    }
}
