WhiteOctoberTCPDFBundle
=======================

This bundle facilitates easy use of the TCPDF PDF generation library in
Symfony2 applications.

Installation
------------

### Step 1: Install the bundle in your project directory
Add the bundle to the "require" list in your composer.json file:

```
"require": {
    // ...
    "whiteoctober/tcpdf-bundle": "master"
}
```

Then use composer.phar to download and install the new dependency

``` bash
$ ./composer.phar update
```

### Step 2: Enable the bundle in app/AppKernel.php

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

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE

