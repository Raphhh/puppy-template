# Puppy template module

[![Latest Stable Version](https://poser.pugx.org/raphhh/puppy-template/v/stable.svg)](https://packagist.org/packages/raphhh/puppy-template)
[![Build Status](https://travis-ci.org/Raphhh/puppy-template.png)](https://travis-ci.org/Raphhh/puppy-template)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/Raphhh/puppy-template/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Raphhh/puppy-template/)
[![Code Coverage](https://scrutinizer-ci.com/g/Raphhh/puppy-template/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Raphhh/puppy-template/)
[![Total Downloads](https://poser.pugx.org/raphhh/puppy-template/downloads.svg)](https://packagist.org/packages/raphhh/puppy-template)
[![Reference Status](https://www.versioneye.com/php/raphhh:puppy-template/reference_badge.svg?style=flat)](https://www.versioneye.com/php/raphhh:puppy-template/references)
[![License](https://poser.pugx.org/raphhh/puppy-template/license.svg)](https://packagist.org/packages/raphhh/puppy-template)

Template module for Puppy framework.

See [Puppy framework](https://github.com/Raphhh/puppy) for more information.

## Installation

```
$ composer require raphhh/puppy-template
```

## Documentation

Service for Twig_Environment. See [Twig](http://twig.sensiolabs.org/) for more information.

Note that the services are accessible in twig templates with the global variable "services".

Twig has also a filter "link". This filter prepends the config "baseUrl" to a link.

```twig
<a href="{{ my/page|link }}">click here</a>
```

## Config options

 - 'template.directory.main' => path to the directory of the template files.
 - 'template.directory.cache' => path to the directory of the cache of the template files.
 - 'template.debug' => indicates if the debug mode is enable in the template.
 - 'baseUrl' => gives the base url to apply for the twig filter "link".
