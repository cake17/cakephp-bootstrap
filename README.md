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

**JS**

- Bootstrap Twitter v3.1.1 : with CDN netdna
- Jquery-ui v1.10.4 : with CDN google
- Jquery v2.1.0 : with CDN google
- textarea editor based on Twitter Bootstrap's wysihtml5 : wysihtml5-0.3.0.js, bootstrap-wysihtml5.js
=> To do so:
	- copy textarea.js or textarea_mini.js where you want to use it
	- Put the same id in textarea.js copied et in the form id that you want
	- Possible to change the type of highlight of code in textarea/stylesheets with one the css in css/bootstrap/highlight/
	- insert in the view echo $this->Html->script('NomPlugin.bootstrap/textarea.js');
- Multiselect for boostrap : bootstrap-multiselect.js and bootstrap-multiselect.default.js

**CSS**

- Twitter bootstrap css : with CDN
- Wysihtml5 css : bootstrap-wysihtml5.css and wysiwyg-color.css and css in folder highlight/
- Bootstrap multiselect : bootstrap-multiselect.css

**HELPERS**

- BootstrapMultiselect
  To implement a bootstrap multiselect

- BootstrapHtmlHelper

  Déclaration

		``$helpers = array(
			'Html' => array(
				'className' => 'CakeWSProjectManagement.BootstrapHtml',
			)
		);``

  Fonctions possibles:

		- icon($class, $options = [])
		- label($message, $options = [])
		- alert($message, $options = [])
		- badge($message, $options = [])
		- button($message, $options = [])
		- link($title, $url = null, array $options = [], $confirmMessage = false)
		- links($type, $options = [])
		- linksActives($actif, $id, $options = [])
		- linksPrincipal($principal, $id, $options = [])
		- collapse($formName = "accordeon", $actions = [])
		- pagination()

## License ##

cakephp-boostrap Plugin is licensed under the MIT license.
