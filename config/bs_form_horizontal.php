<?php
/**
 * configs for horizontal form
 *
 * @author   cake17
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://cake17.github.io/
 *
 */
$config = [
	'button' => '<div class="form-group"><div class="col-sm-offset-2 col-sm-10"><button{{attrs}} class="btn btn-default btn-md">{{text}}</button></div></div>',
	'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
	'checkboxFormGroup' => '{{label}}',
	'checkboxWrapper' => '<div class="checkbox">{{label}}</div>',
	'dateWidget' => '{{year}}{{month}}{{day}}{{hour}}{{minute}}{{second}}{{meridian}}',
	'error' => '<div class="error-message">{{content}}</div>',
	'errorList' => '<ul>{{content}}</ul>',
	'errorItem' => '<li>{{text}}</li>',
	'file' => '<input type="file" name="{{name}}"{{attrs}}>',
	'fieldset' => '<fieldset>{{content}}</fieldset>',
	'formstart' => '<form{{attrs}} class="form-horizontal" role="form">',
	'formend' => '</form>',
	'formGroup' => '{{label}}{{input}}',
	'hiddenblock' => '<div style="display:none;">{{content}}</div>',
	'input' => '<div class="col-sm-10"><input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}></div>',
	'inputsubmit' => '<input type="{{type}}"{{attrs}}>',
	'inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>',
	'inputContainerError' => '<div class="form-group input {{type}}{{required}} has-error has-feedback">{{content}}{{error}}<span class="glyphicon glyphicon-remove form-control-feedback"></span></div>',
	'label' => '<label{{attrs}} class="col-sm-2 control-label">{{text}}</label>',
	'nestingLabel' => '{{hidden}}<label{{attrs}}>{{input}}{{text}}</label>',
	'legend' => '<legend>{{text}}</legend>',
	'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>',
	'optgroup' => '<optgroup label="{{label}}"{{attrs}}>{{content}}</optgroup>',
	'select' => '<div class="col-sm-10"><select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select></div>',
	'selectMultiple' => '<select name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
	'radio' => '<div class="col-sm-10"><input type="radio" name="{{name}}" value="{{value}}"{{attrs}}></div>',
	'radioWrapper' => '{{label}}',
	'textarea' => '<div class="col-sm-10"><textarea class="form-control" name="{{name}}"{{attrs}}>{{value}}</textarea></div>',
	'submitContainer' => '<div class="col-sm-offset-2 col-sm-10 submit">{{content}}</div>'
];
