<?php

namespace Qipsius\TCPDFBundle\DependencyInjection;

use Exception;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;

class QipsiusTCPDFExtension extends Extension
{
    /**
     * Load our configuration
     *
     * @param array            $configs
     * @param ContainerBuilder $container
     * @return void
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $processor     = new Processor();
        $configuration = new Configuration();
        $config        = $processor->processConfiguration($configuration, $configs);

        $container->setParameter('qipsius_tcpdf.file', $config['file']);
        $container->setParameter('qipsius_tcpdf.class', $config['class']);
        $container->setParameter('qipsius_tcpdf.tcpdf', $config['tcpdf']);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
    }
}
