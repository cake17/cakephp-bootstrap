Bootstrap Twitter for CakePHP
=============================

## Plugin's Objective ##

This plugin adds functionnalities to use Twitter Bootstrap in CakePHP projects.

Versions:

- CakePHP 3.x
- Bootstrap Twitter 3.x

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

- Add autoload in your composer.json

## Usage of plugin ##

More info in the [github docs](http://cake17.github.io/cakephp-bootstrap)

## License ##

cakephp-boostrap Plugin is licensed under the MIT license.
