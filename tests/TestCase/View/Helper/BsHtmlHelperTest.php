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

/**
 * testHead method
 *
 * @return void
 */
	public function testHead() {
		// default
		$results = $this->BsHtml->head();
		$this->assertContains('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', $results);
		$this->assertContains('http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css', $results);
		$this->assertContains('width=device-width, initial-scale=1', $results);
		$this->assertContains('/css/my_bootstrap.css', $results);
	}

/**
 * testFooter method
 *
 * @return void
 */
	public function testFooter() {
		// default
		$results = $this->BsHtml->footer();
		$this->assertContains('Description', $results);
		$this->assertContains('webcreateur', $results);
		$this->assertContains('width=device-width, initial-scale=1', $results);
		$this->assertContains('url_webcreateur', $results);
	}

/**
 * testNavbar method
 *
 * @return void
 */
	public function testNavbar() {
		// default
		$results = $this->BsHtml->navbar();
		$this->assertContains('container-fluid', $results);
		$this->assertContains('default', $results);
		$this->assertContains('fixed-top', $results);
	}

/**
 * testAlert method
 *
 * @return void
 */
	public function testAlert() {
		// default
		$results = $this->BsHtml->alert();
		$this->assertContains('success', $results);
		$this->assertContains('dismissable', $results);
	}

/**
 * testImage method
 *
 * @return void
 */
	public function testImage() {
		// default
		$results = $this->BsHtml->image();
		$this->assertContains('img-responsive', $results);
	}

/**
 * testIcon method
 *
 * @return void
 */
	public function testIcon() {
		// default
		$results = $this->BsHtml->icon();
		$this->assertContains('icon', $results);
	}

/**
 * testButton method
 *
 * @return void
 */
	public function testButton() {
		// default
		$results = $this->BsHtml->button();
		$this->assertContains('default', $results);

		// add an incorrect type
		$results = $this->BsHtml->button('Message', ['type' => 'fff']);
		$this->assertContains('Button should be one of the following : ', $results);
	}

/**
 * testLabel method
 *
 * @return void
 */
	public function testLabel() {
		// default
		$results = $this->BsHtml->label();
		$this->assertContains('default', $results);

		// add an incorrect type
		$results = $this->BsHtml->label('Message', ['type' => 'fff']);
		$this->assertContains('Label should be one of the following : ', $results);
	}

/**
 * testBadge method
 *
 * @return void
 */
	public function testBadge() {
		// default
		$results = $this->BsHtml->badge();
		$this->assertContains('class="badge"', $results);
	}

/**
 * testPagination method
 *
 * @return void
 */
	public function testPagination() {
		// default
		$results = $this->BsHtml->pagination();
		$this->assertContains('text-center', $results);
		$this->assertContains('<ul class="pagination">', $results);
	}

/**
 * testLink method
 *
 * @return void
 */
	public function testLink() {
		// default
		$results = $this->BsHtml->link('Title', ['controller' => 'Users']);
		$this->assertContains('Title', $results);
	}

/**
 * testLinks method
 *
 * @return void
 */
	public function testLinks() {
		// default
		$results = $this->BsHtml->links('default');
		$this->assertContains('View', $results);
		$this->assertContains('Edit', $results);
		$this->assertContains('Delete', $results);
	}

/**
 * testLinksActives method
 *
 * @return void
 */
	public function testLinksActives() {
		// for a link that is to true
		$results = $this->BsHtml->linksActives(true, 1);
		$this->assertContains('Active', $results);
		$this->assertContains('Deactivate', $results);
		// for a link that is to false
		$results = $this->BsHtml->linksActives(false, 1);
		$this->assertContains('Not Active', $results);
		$this->assertContains('Activate', $results);
	}

/**
 * testLinksPrincipal method
 *
 * @return void
 */
	public function testLinksPrincipal() {
		// for a link that is to true
		$results = $this->BsHtml->linksPrincipal(true, 1);
		$this->assertContains('danger', $results);
		$this->assertContains('Principal', $results);
		// for a link that is to false
		$results = $this->BsHtml->linksPrincipal(false, 1);
		$this->assertContains('Not Principal', $results);
		$this->assertContains('Put as Principal', $results);
	}

}
