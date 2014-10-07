<?php
/**
 * BsHtmlHelperTest
 * 
 * @author   cake17
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://cake17.github.io/
 *
 */
namespace Bootstrap\Test\TestCase\View\Helper;

use Bootstrap\View\Helper\BsHtmlHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * Bootstrap\View\Helper\BsHtmlHelper Test Case
 */
class BsHtmlHelperTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$view = new View();
		$this->BsHtml = new BsHtmlHelper($view);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BsHtml);

		parent::tearDown();
	}

}
