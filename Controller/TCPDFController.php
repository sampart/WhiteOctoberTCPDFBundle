<?php

namespace WhiteOctober\TCPDFBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;

use ReflectionClass;

use TCPDF;

class TCPDFController extends ContainerAware
{
    /**
     * Creates a new instance of TCPDF.
     * Any arguments passed here will be passed directly
     * to the TCPDF class as constructor arguments
     *
     * @return TCPDF
     */
    public function create()
    {
        $rc = new ReflectionClass('TCPDF');
        return $rc->newInstanceArgs(func_get_args());
    }
}
