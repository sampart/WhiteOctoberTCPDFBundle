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

### Step 2: Enable the bundle in the kernel

Add the bundle to the `registerBundles()` method in your kernel:

In Symfony < 4:

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

In Symfony 4:

```php
// config/bundles.php
return [
    // ...
    WhiteOctober\TCPDFBundle\WhiteOctoberTCPDFBundle::class => ['all' => true],
    // ...
];
```

(This project is not yet configured with Symfony Flex, so this change to `config/bundles.php` won't be done automatically.)

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

Contributing
-------------

We welcome contributions to this project, including pull requests and issues (and discussions on existing issues).

If you'd like to contribute code but aren't sure what, the [issues list](https://github.com/whiteoctober/WhiteOctoberTCPDFBundle/issues) is a good place to start.
If you're a first-time code contributor, you may find Github's guide to [forking projects](https://guides.github.com/activities/forking/) helpful.

All contributors (whether contributing code, involved in issue discussions, or involved in any other way) must abide by our [code of conduct](https://github.com/whiteoctober/open-source-code-of-conduct/blob/master/code_of_conduct.md).
