<?php
/**
 * BsSliderHelper
 *
 * @author   cake17
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.cake-websites.com
 *
 */
namespace Bootstrap\View\Helper;

use Cake\Error\NotFoundException;
use Cake\View\Helper;

class BsSliderHelper extends Helper {

/**
 * Default configuration options.
 *
 * Settings configured Configure class
 * take precedence over settings configured through Controller::$helpers property.
 */
	protected $_defaultConfig = [
		'assets' => [
			'jsNeeded' => 'Bootstrap.bootstrap/bootstrap-slider',
			'framework' => 'jquery',
			'css' => [
			],
			'js' => [
			],
			// default css and js will be printed if true
			'print_default_assets' => false,
			'default_assets' => [
				'css' => [
					'Bootstrap.bootstrap/bootstrap-slider',
				],
				'js' => [
					'Bootstrap.bootstrap/bootstrap-slider.default',
				],
			]
		]
	];

/**
 *
 * @var array $_authorizedJsLibs 
 */
	protected $_authorizedJsLibs = [
		'jquery'
	];

/**
 * __construct callback
 *
 * @param \Cake\View\View $view
 * @param type $settings
 * @throws LogicException
 */
	public function __construct(\Cake\View\View $View, array $config = []) {
		parent::__construct($View, $config);

		if (!$this->_isSupportedFramework($fw = $this->config('assets.framework'))) {
			throw new NotFoundException(sprintf(__d('bootstrap', 'Configured JavaScript framework "{0}" is not supported. Only "{1}" are valid options.', $fw, implode(', ', $this->_authorizedJsLibs))));
		}
	}

/**
 * Select element.
 */
	public function input($fieldName, array $options = []) {
		//$options['type'] = 'select';
		//$options['multiple'] = 'multiple';
		//// si un class existe non vide, on lui ajoute form-control
		//if (isset($options['class']) && !empty($options['class'])):
		//	$options['class'] .= ' form-control';
		//endif;
		//if (!isset($options['class']) || empty($options['class'])):
		//	$options['class'] = $this->_defaultConfig['input']['class'];
		//endif;
		//if (isset($options['css']) && !empty($options['css'])):
		//	$this->_defaultConfig['assets']['css'] = $options['css'];
		//	unset($options['css']);
		//endif;
		//if (isset($options['js']) && !empty($options['js'])):
		//	$this->_defaultConfig['assets']['js'] = $options['js'];
		//	unset($options['js']);
		//endif;
		//$this->_loadScripts();
		//return $this->_View->Form->input($fieldName, $options);
	}

/**
 * Loads all scripts needed
 *
 * @return void
 */
	protected function _loadScripts() {
		echo $this->_View->Html->script($this->config('assets.jsNeeded'), ['block' => true]);
		// print default if asked
		if ($this->config('assets.print_default_assets')):
			foreach ($this->config('default_assets.js') as $jsFile):
				echo $this->_View->Html->script($jsFile, ['block' => true]);
			endforeach;
			foreach ($this->config('default_assets.css') as $cssFile):
				echo $this->_View->Html->css($cssFile, ['block' => 'css']);
			endforeach;
		endif;
		//print assets if not empty
		$js = $this->config('assets.js');
		if (!empty($js)):
			foreach ($this->config('assets.js') as $jsFile):
				echo $this->_View->Html->script($jsFile, ['block' => true]);
			endforeach;
		endif;
		$css = $this->config('assets.css');
		if (!empty($css)):
			foreach ($this->config('assets.css') as $cssFile):
				echo $this->_View->Html->css($cssFile, ['block' => 'css']);
			endforeach;
		endif;
	}

/**
 * Test if a JS framework is supported by this helper.
 *
 * @param $val The 'framework' setting must use a supported framework.
 *
 * @return bool
 */
	public function _isSupportedFramework($val) {
		return in_array($val, $this->_authorizedJsLibs);
	}

}
