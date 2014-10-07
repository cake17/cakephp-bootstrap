<?php
/**
 * BsFormHelperTest
 * 
 * @author   cake17
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://cake17.github.io/
 *
 */
namespace Bootstrap\Test\TestCase\View\Helper;

use Bootstrap\View\Helper\BsFormHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * Bootstrap\View\Helper\BsFormHelper Test Case
 */
class BsFormHelperTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$view = new View();
		$this->BsForm = new BsFormHelper($view);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BsForm);

		parent::tearDown();
	}

}
