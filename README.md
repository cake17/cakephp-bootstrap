Bootstrap Twitter for CakePHP
=============================

[![Build Status](https://api.travis-ci.org/cake17/cakephp-bootstrap.png?branch=master)](https://travis-ci.org/cake17/cakephp-bootstrap)
[![Latest Stable Version](https://poser.pugx.org/cake17/cakephp-bootstrap/v/stable.png)](https://packagist.org/packages/cake17/cakephp-bootstrap)
[![License](https://poser.pugx.org/cake17/cakephp-bootstrap/license.png)](https://packagist.org/packages/cake17/cakephp-bootstrap)
[![Total Downloads](https://poser.pugx.org/cake17/cakephp-bootstrap/d/total.png)](https://packagist.org/packages/cake17/cakephp-bootstrap)

This plugin is still under development...

## Plugin's Objective ##

This plugin adds functionnalities to use Twitter Bootstrap in CakePHP projects.

## Requirements ##

- PHP >= 5.4.16
- [CakePHP 3.x](http://book.cakephp.org/3.0/en/index.html)

## Installation ##

_[Using [Composer](http://getcomposer.org/)]_

Add the plugin to your project's `composer.json` - something like this:

```javascript
{
    "require": {
        "cake17/cakephp-bootstrap": "dev-master"
    }
}
```

Because this plugin has the type `cakephp-plugin` set in it's own `composer.json`, composer knows to install it inside your `/plugins` directory, rather than in the usual vendors file. It is recommended that you add `/plugins/Bootstrap` to your .gitignore file. (Why? [read this](http://getcomposer.org/doc/faqs/should-i-commit-the-dependencies-in-my-vendor-directory.md).)

## Usage of plugin ##

Enable the plugin in your config/bootstrap.php file:

    Plugin::load('Bootstrap', ['routes' => false, 'bootstrap' => false]);

More info in the [github docs](http://cake17.github.io/cakephp-bootstrap)

## What's inside ? ##

**JS**

- Bootstrap Twitter v3.1.1 : with CDN netdna
- Jquery-ui v1.10.4 : with CDN google
- Jquery v2.1.0 : with CDN google
- textarea editor based on Twitter Bootstrap's wysihtml5 : wysihtml5-0.3.0.js, bootstrap-wysihtml5.js
=> To do so:
    - copy textarea.js or textarea_mini.js where you want to use it
    - Put the same id in textarea.js copied and in the form id that you want
    - Possible to change the type of highlight of code in textarea/stylesheets with one the css in css/bootstrap/highlight/
    - insert in the view echo $this->Html->script('NomPlugin.bootstrap/textarea.js');
- Multiselect for boostrap : bootstrap-multiselect.js and bootstrap-multiselect.default.js

**CSS**

- Twitter bootstrap css : with CDN
- Wysihtml5 css : bootstrap-wysihtml5.css and wysiwyg-color.css and css in folder `highlight/`
- Bootstrap multiselect : bootstrap-multiselect.css

**HELPERS**

- BootstrapMultiselect
  To implement a bootstrap multiselect

- BootstrapHtmlHelper
  Available functions:

        - icon($class, array $options = [])
        - label($message, array $options = [])
        - alert($message, array $options = [])
        - badge($message, array $options = [])
        - button($message, array $options = [])
        - link($title, $url = null, array $options = [])
        - links($type, $options = [])
        - linksActives($actif, $id, $options = [])
        - linksPrincipal($principal, $id, $options = [])
        - collapse($formName = "accordeon", $actions = [])
        - pagination()

- BootstrapFormHelper

**Bake Templates**

- form
- index
- view

## Support & Contribution ##

For support and feature request, please contact me through Github issues

Please feel free to contribute to the plugin with new issues, requests, unit tests and code fixes or new features. If you want to contribute some code,
create a feature branch, and send us your pull request.
Unit tests for new features and issues detected are mandatory to keep quality high.

## License ##

Copyright (c) [2014] [cake17]

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
