<?php

namespace WhiteOctober\TCPDFBundle\Controller;

use ReflectionClass;

use \TCPDF;

class TCPDFController
{
    protected $className;

    /**
     * Class constructor
     *
     * @param string $className The class name to use. Default is TCPDF. Must be based on TCPDF
     */
    public function __construct($className)
    {
        $this->setClassName($className);
    }

    /**
     * Creates a new instance of TCPDF/the class name to use as supplied
     * Any arguments passed here will be passed directly
     * to the TCPDF class as constructor arguments
     *
     * @return TCPDF
     */
    public function create()
    {
        $rc = new ReflectionClass($this->className);
        return $rc->newInstanceArgs(func_get_args());
    }

    /**
     * Sets the class name to use for instantiation
     *
     * @param $className
     * @throws \LogicException if the class is not, or does not inherit from, TCPDF
     */
    public function setClassName($className)
    {
        $rc = new ReflectionClass($className);
        if (!$rc->isSubclassOf('TCPDF') && $rc->getName() != 'TCPDF')
        {
            throw new \LogicException("Class '{$className}' must inherit from TCPDF");
        }
        $this->className = $className;
    }
}
