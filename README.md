WhiteOctoberTCPDFBundle
=======================

This bundle facilitates easy use of the TCPDF PDF generation library in
Symfony2 applications.

Installation
------------

### Step 1: Setup Bundle and dependencies
```
composer require whiteoctober/tcpdf-bundle
```

### Step 2: Configure the autoloader

Add the `WhiteOctober` namespace to your autoloader:

``` php
// app/autoload.php
<?php
// ...
$loader->add('WhiteOctober', __DIR__.'/../vendor/bundles');
```

### Step 3: Enable the bundle in the kernel

Add the bundle to the `registerBundles()` method in your kernel:

``` php
// app/AppKernel.php
<?php

public function registerBundles()
{
    $bundles = array(
        // ...
        new WhiteOctober\TCPDFBundle\WhiteOctoberTCPDFBundle(),
    );
}
```

Using TCPDF
-----------

You can obtain the `white_october.tcpdf` service from the container,
and then create a new TCPDF object via the service:

``` php
$pdfObj = $container->get("white_october.tcpdf")->create();
```

From hereon in, you are using a TCPDF object to work with as normal.

Using a custom class
--------------------

If you want to use your own custom TCPDF-based class, you can use
the `class` parameter in your configuration eg in `config.yml`:

``` yaml
white_october_tcpdf:
    class: 'Acme\MyBundle\MyTCPDFClass'
```

The class must extend from the `TCPDF` class; an exception will be
thrown if this is not the case.

Troubleshooting
--------------------
If you get an error like ```'TCPDF ERROR: Can't open image file: /tmp/jpg_i6Sogv'``` please 
check if there is a ```tcpdf``` folder in your ```app/cache/YOUR_ENV/``` folder, instead 
TCPDF try to write to ```sys_get_temp_dir()```.

Please note that the folder will be deleted on an ```app/console cache:clear```.


License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE

