Bootstrap Twitter for CakePHP
=============================

[![Build Status](https://api.travis-ci.org/cake17/cakephp-bootstrap.png?branch=master)](https://travis-ci.org/cake17/cakephp-bootstrap)
[![Latest Stable Version](https://poser.pugx.org/cake17/cakephp-bootstrap/v/stable.png)](https://packagist.org/packages/cake17/cakephp-bootstrap)
[![License](https://poser.pugx.org/cake17/cakephp-bootstrap/license.png)](https://packagist.org/packages/cake17/cakephp-bootstrap)
[![Total Downloads](https://poser.pugx.org/cake17/cakephp-bootstrap/d/total.png)](https://packagist.org/packages/cake17/cakephp-bootstrap)

## Plugin's Objective ##

This plugin adds functionnalities to use Twitter Bootstrap in CakePHP projects.

Versions:

- [CakePHP 3.x](http://book.cakephp.org/3.0/en/index.html)
- [Bootstrap Twitter 3.2.x](http://getbootstrap.com)

## Installation of plugin ##

- Add the following require in composer.json. This will install the plugin into
plugins/Bootstrap:

```json
{
	"require": {
		"cake17/cakephp-bootstrap": "dev-master"
	}
}
```

- Enable the plugin in your config/bootstrap.php file:

	`Plugin::load('Bootstrap', ['routes' => false, 'bootstrap' => false]);`

## Usage of plugin ##

More info in the [github docs](http://cake17.github.io/cakephp-bootstrap)

## License ##

cakephp-boostrap Plugin is licensed under the MIT license.
