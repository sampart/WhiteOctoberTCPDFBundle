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
        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, $configs);

        $container->setParameter('white_october_tcpdf.file', $config['file']);
        $container->setParameter('white_october_tcpdf.class', $config['class']);
        $container->setParameter('white_october_tcpdf.tcpdf', $config['tcpdf']);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}
