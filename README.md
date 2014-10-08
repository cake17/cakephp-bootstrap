Bootstrap Twitter for CakePHP
=============================

## Plugin's Objective ##

This plugin adds functionnalities to use Twitter Bootstrap in CakePHP projects.

Versions:

- CakePHP 3.x
- Bootstrap Twitter 3.x

## Installation du plugin ##

Add the following require in composer.json. This will install the plugin into
plugins/Bootstrap:

```json
{
	"require": {
		"cake17/cakephp-bootstrap": "dev-master"
	}
}
```

Composer makes 2 operations for you that you can check:

- Enable the plugin in your config/bootstrap.php file:

	`Plugin::load('Bootstrap', ['routes' => false, 'bootstrap' => false]);`

- Add autoload in your composer.json

Then, add those following lines in your src/Controller/AppController.php file :

```php
class AppController extends Controller {
public $helpers = [
		'Form' => [
			'templates' => 'Bootstrap.bs_form.php',
			'className' => 'Bootstrap.BsForm',
		],
		'Html' => [
			'className' => 'Bootstrap.BsHtml'
		],
		'Paginator' => [
			'templates' => 'Bootstrap.bs_paginator.php'
		]
	];
}
```

## Installation du plugin ##

More info in the [github docs](http://cake17.github.io/cakephp-bootstrap)

## License ##

cakephp-boostrap Plugin is licensed under the MIT license.
