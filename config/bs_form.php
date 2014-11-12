<?php
/**
 * configs for form
 *
 * @author   cake17
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://cake17.github.io/
 *
 */
$config = [
	'button' => '<button{{attrs}} class="btn btn-default btn-md">{{text}}</button>',
	'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
	'checkboxFormGroup' => '{{label}}',
	'checkboxWrapper' => '<div class="checkbox">{{label}}</div>',
	'dateWidget' => '{{year}}{{month}}{{day}}{{hour}}{{minute}}{{second}}{{meridian}}',
	'error' => '<div class=""alert alert-danger">{{content}}</div>',
	'errorList' => '<ul>{{content}}</ul>',
	'errorItem' => '<li>{{text}}</li>',
	'file' => '<input type="file" name="{{name}}"{{attrs}}>',
	'fieldset' => '<fieldset>{{content}}</fieldset>',
	'formstart' => '<form{{attrs}} role="form">',
	'formend' => '</form>',
	'formGroup' => '{{label}}{{input}}',
	'hiddenblock' => '<div style="display:none;">{{content}}</div>',
	'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}>',
	'inputsubmit' => '<input type="{{type}}"{{attrs}}>',
	'inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>',
	'inputContainerError' => '<div class="form-group input {{type}}{{required}} has-error has-feedback">{{content}}{{error}}<span class="glyphicon glyphicon-remove form-control-feedback"></span></div>',
	'label' => '<label{{attrs}}>{{text}}</label>',
	'nestingLabel' => '{{hidden}}<label{{attrs}}>{{input}}{{text}}</label>',
	'legend' => '<legend>{{text}}</legend>',
	'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>',
	'optgroup' => '<optgroup label="{{label}}"{{attrs}}>{{content}}</optgroup>',
	'select' => '<select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select>',
	'selectMultiple' => '<select name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
	'radio' => '<input type="radio" name="{{name}}" value="{{value}}"{{attrs}}>',
	'radioWrapper' => '{{label}}',
	'textarea' => '<textarea class="form-control" name="{{name}}"{{attrs}}>{{value}}</textarea>',
	'submitContainer' => '<div class="submit">{{content}}</div>'
];
