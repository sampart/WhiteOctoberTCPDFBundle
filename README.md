WhiteOctoberTCPDFBundle
=======================

This bundle facilitates easy use of the TCPDF PDF generation library in
Symfony2 applications.

Installation
------------

### Step 1: Add both the bundle and TCPDF to your `deps` file
```
[WhiteOctoberTCPDFBundle]
    git=http://github.com/WhiteOctoberTCPDFBundle.git
    target=/bundles/WhiteOctober/TCPDFBundle

[TCPDF]
    git=git://tcpdf.git.sourceforge.net/gitroot/tcpdf/tcpdf
    target=/tcpdf
```

Now run the vendors script to download the bundle and library:

``` bash
$ php bin/vendors install
```

### Step 2: Configure the autoloader

Add the `WhiteOctober` namespace to your autoloader:

``` php
<?php
// app/autoload.php

$loader->registerNamespaces(array(
    // ...
    'WhiteOctober' => __DIR__.'/../vendor/bundles',
));
```

### Step 3: Enable the bundle in the kernel

Add the bundle to the `registerBundles()` method in your kernel:

``` php
<?php
// app/AppKernel.php

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

