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
use Cake\Routing\Router;
use Cake\TestSuite\TestCase;
use Cake\View\Helper\HtmlHelper;
use Cake\View\View;

/**
 * Bootstrap\View\Helper\BsHtmlHelper Test Case
 */
class BsHtmlHelperTest extends TestCase
{
    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->BsHtml = new BsHtmlHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BsHtml);

        parent::tearDown();
    }

    /**
     * testHead method
     *
     * @return void
     */
    public function testHead()
    {
        // default
        $results = $this->BsHtml->head();
        $jqueryUiCss = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css";
        $bootstrapCss = "https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css";
        $this->assertContains($bootstrapCss, $results);
        $this->assertContains($jqueryUiCss, $results);
        $this->assertContains('width=device-width, initial-scale=1', $results);
        $this->assertContains('/css/my_bootstrap.css', $results);
    }

    /**
     * testFooter method
     *
     * @return void
     */
    public function testFooter()
    {
        // default
        $results = $this->BsHtml->footer('My title');
        $this->assertContains('Description', $results);
        $this->assertContains('WebCreateur', $results);
    }

    /**
     * testNavbar method
     *
     * @return void
     */
    public function testNavbar()
    {
        // default
        $results = $this->BsHtml->navbar("Info inside navbar");
        $this->assertContains('container-fluid', $results);
        $this->assertContains('default', $results);
        $this->assertContains('fixed-top', $results);
    }

    /**
     * testAlert method
     *
     * @return void
     */
    public function testAlert()
    {
        // default
        $results = $this->BsHtml->alert('Message alert');
        $this->assertContains('success', $results);
        // dismissable
        $results = $this->BsHtml->alert('Message alert', ['type' => 'info', 'dismissable' => true]);
        $this->assertContains('info', $results);
        $this->assertContains('dismissable', $results);
    }

    /**
     * testImage method
     *
     * @return void
     */
    public function testImage()
    {
        // default
        //$results = $this->BsHtml->image(WEBROOT . '');
        //$this->assertContains('img-responsive', $results);
    }

    /**
     * testIcon method
     *
     * @return void
     */
    public function testIcon()
    {
        // default
        $results = $this->BsHtml->icon('search');
        $this->assertContains('icon', $results);
    }

    /**
     * testButton method
     *
     * @return void
     */
    public function testButton()
    {
        // default
        $results = $this->BsHtml->button('Message button');
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
    public function testLabel()
    {
        // default
        $results = $this->BsHtml->label('Message label');
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
    public function testBadge()
    {
        // default
        $results = $this->BsHtml->badge('Message label');
        $this->assertContains('class="badge"', $results);
    }

    /**
     * testPagination method
     *
     * @return void
     */
    public function testPagination()
    {
        // default
        //$results = $this->BsHtml->pagination();
        //$this->assertContains('text-center', $results);
        //$this->assertContains('<ul class="pagination">', $results);
    }

    /**
     * testLink method
     *
     * @return void
     */
    public function testLink()
    {
        Router::connect('/:controller/:action/*');
        // default
        $results = $this->BsHtml->link('Title', ['controller' => 'Users']);
        $this->assertContains('Title', $results);
    }

    /**
     * testLinks method
     *
     * @return void
     */
    public function testLinks()
    {
        Router::connect('/:controller/:action/*');
        // default
        $results = $this->BsHtml->links('default', ['controller' => 'Users', 'id' => 1]);
        $this->assertContains('View', $results);
        $this->assertContains('Edit', $results);
        $this->assertContains('Delete', $results);
    }

    /**
     * testLinksActives method
     *
     * @return void
     */
    public function testLinksActives()
    {
        Router::connect('/:controller/:action/*');
        // for a link that is to true
        $results = $this->BsHtml->linksActives(true, 1, ['controller' => 'Users']);
        $this->assertContains('Active', $results);
        $this->assertContains('Deactivate', $results);
        // for a link that is to false
        $results = $this->BsHtml->linksActives(false, 1, ['controller' => 'Users']);
        $this->assertContains('Not Active', $results);
        $this->assertContains('Activate', $results);
    }

    /**
     * testLinksPrincipal method
     *
     * @return void
     */
    public function testLinksPrincipal()
    {
        Router::connect('/:controller/:action/*');
        // for a link that is to true
        $expected = '<div class="btn-group"><button type="button" class="btn btn-success btn btn-default btn-xs">Principal</button> </div>';
        $results = $this->BsHtml->linksPrincipal(true, 1, ['controller' => 'Users']);
        $this->assertContains($expected, $results);
        $this->assertContains('Principal', $results);
        // for a link that is to false
        $results = $this->BsHtml->linksPrincipal(false, 1, ['controller' => 'Users']);
        $this->assertContains('Not Principal', $results);
        $this->assertContains('Put as Principal', $results);
    }

    /**
     * testCollapse method
     *
     * @return void
     */
    public function testCollapse()
    {
        // default
        $results = $this->BsHtml->collapse('CollapseNameBox', []);
        $this->assertContains('<div class="panel-group" id="CollapseNameBox"></div', $results);
    }
}
