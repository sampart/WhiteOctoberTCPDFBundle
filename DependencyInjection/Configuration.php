<?php

namespace Qipsius\TCPDFBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

class Configuration implements ConfigurationInterface
{
    /**
     * Builds our configuration
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('qipsius_tcpdf');

        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            $rootNode = $treeBuilder->root('qipsius_tcpdf');
        }

        $rootNode
            ->children()
                ->scalarNode('file')->defaultValue('%kernel.project_dir%/vendor/tecnickcom/tcpdf/tcpdf.php')->end()
                ->scalarNode('class')->defaultValue('TCPDF')->end()
            ->end()
        ;

        $this->addTCPDFConfig($rootNode);

        return $treeBuilder;
    }

    /**
     * Adds the core TCPDF configuration
     *
     * @param $rootNode
     */
    protected function addTCPDFConfig(ArrayNodeDefinition $rootNode): void
    {
        $rootNode
            ->children()
                ->arrayNode('tcpdf')
                    ->addDefaultsIfNotSet()
                    ->children()

                        // Core configuration values
                        // These get defined when the TCPDF bundle is booted
                        ->scalarNode('k_path_url')->defaultValue('%kernel.project_dir%/vendor/tecnickcom/tcpdf/')->end()
                        ->scalarNode('k_path_main')->defaultValue('%kernel.project_dir%/vendor/tecnickcom/tcpdf/')->end()
                        ->scalarNode('k_path_fonts')->defaultValue('%kernel.project_dir%/vendor/tecnickcom/tcpdf/fonts/')->end()
                        ->scalarNode('k_path_cache')->defaultValue('%kernel.cache_dir%/tcpdf')->end()
                        ->scalarNode('k_path_url_cache')->defaultValue('%kernel.cache_dir%/tcpdf')->end()
                        ->scalarNode('k_path_images')->defaultValue('%kernel.project_dir%/vendor/tecnickcom/tcpdf/examples/images/')->end()
                        ->scalarNode('k_blank_image')->defaultValue('%kernel.project_dir%/vendor/tecnickcom/tcpdf/examples/images/_blank.png')->end()
                        ->scalarNode('k_cell_height_ratio')->defaultValue(1.25)->end()
                        ->scalarNode('k_title_magnification')->defaultValue(1.3)->end()
                        ->scalarNode('k_small_ratio')->defaultValue(2/3)->end()
                        ->scalarNode('k_thai_topchars')->defaultTrue()->end()
                        ->scalarNode('k_tcpdf_calls_in_html')->defaultFalse()->end()
                        ->scalarNode('k_tcpdf_external_config')->defaultTrue()->end()
                        ->scalarNode('k_tcpdf_throw_exception_error')->defaultTrue()->end()

                        // Optional nice-to-have values
                        ->scalarNode('head_magnification')->defaultValue(1.1)->end()
                        ->scalarNode('pdf_page_format')->defaultValue('A4')->end()
                        ->scalarNode('pdf_page_orientation')->defaultValue('P')->end()
                        ->scalarNode('pdf_creator')->defaultValue('TCPDF')->end()
                        ->scalarNode('pdf_author')->defaultValue('TCPDF')->end()
                        ->scalarNode('pdf_header_title')->defaultValue('')->end()
                        ->scalarNode('pdf_header_string')->defaultValue('')->end()
                        ->scalarNode('pdf_header_logo')->defaultValue('')->end()
                        ->scalarNode('pdf_header_logo_width')->defaultValue('')->end()
                        ->scalarNode('pdf_unit')->defaultValue('mm')->end()
                        ->scalarNode('pdf_margin_header')->defaultValue(5)->end()
                        ->scalarNode('pdf_margin_footer')->defaultValue(10)->end()
                        ->scalarNode('pdf_margin_top')->defaultValue(27)->end()
                        ->scalarNode('pdf_margin_bottom')->defaultValue(25)->end()
                        ->scalarNode('pdf_margin_left')->defaultValue(15)->end()
                        ->scalarNode('pdf_margin_right')->defaultValue(15)->end()
                        ->scalarNode('pdf_font_name_main')->defaultValue('helvetica')->end()
                        ->scalarNode('pdf_font_size_main')->defaultValue(10)->end()
                        ->scalarNode('pdf_font_name_data')->defaultValue('helvetica')->end()
                        ->scalarNode('pdf_font_size_data')->defaultValue(8)->end()
                        ->scalarNode('pdf_font_monospaced')->defaultValue('courier')->end()
                        ->scalarNode('pdf_image_scale_ratio')->defaultValue(1.25)->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
