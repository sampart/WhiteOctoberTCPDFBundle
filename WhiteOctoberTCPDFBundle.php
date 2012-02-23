<?php

namespace WhiteOctober\TCPDFBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class WhiteOctoberTCPDFBundle extends Bundle
{
    /**
     * Ran on bundle boot, our TCPDF configuration constants
     * get defined here if required
     */
    public function boot()
    {
        // Define our TCPDF variables
        $config = $this->container->getParameter('white_october_tcpdf.tcpdf');

        // TCPDF needs some constants defining if our configuration
        // determines we should do so (default true)
        // Set tcpdf.k_tcpdf_external_config to false to use the TCPDF
        // core defaults
        if ($config['k_tcpdf_external_config'])
        {
            foreach ($config as $k => $v)
            {
                // All K_ constants are required
                if (preg_match("/^k_/i", $k))
                {
                    define(strtoupper($k), $this->container->getParameterBag()->resolveValue($v));
                }

                // and one special value which TCPDF will use if present
                if (strtolower($k) == "pdf_font_name_main")
                {
                    define(strtoupper($k), $v);
                }
            }
        }
    }
}
