<?php
/**
 * HtmlHelperTest
 *
 * @author   cake17
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://cake17.github.io/
 *
 */
namespace Bootstrap\Test\TestCase\View\Helper;

use Bootstrap\View\Helper\HtmlHelper;
use Cake\Routing\Router;
use Cake\TestSuite\TestCase;
// use Cake\View\Helper\HtmlHelper;
use Cake\View\View;

/**
 * Bootstrap\View\Helper\HtmlHelper Test Case
 */
class HtmlHelperTest extends TestCase
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
        $this->Html = new HtmlHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Html);

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
        // /$results = $this->Html->head();
        // $jqueryUiCss = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css";
        // $bootstrapCss = "https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css";
        // $this->assertContains($bootstrapCss, $results);
        // $this->assertContains($jqueryUiCss, $results);
        // $this->assertContains('width=device-width, initial-scale=1', $results);
        // $this->assertContains('/css/my_bootstrap.css', $results);
    }

    /**
     * testFooter method
     *
     * @return void
     */
    public function testFooter()
    {
        // default
        // $results = $this->Html->footer('My title');
        // $this->assertContains('Description', $results);
        // $this->assertContains('WebCreateur', $results);
    }

    /**
     * testNavbar method
     *
     * @return void
     */
    public function testNavbar()
    {
        // default
        $results = $this->Html->navbar("Info inside navbar");
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
        $results = $this->Html->alert('Message alert');
        $this->assertContains('success', $results);
        // dismissable
        $results = $this->Html->alert('Message alert', ['type' => 'info', 'dismissable' => true]);
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
        //$results = $this->Html->image(WEBROOT . '');
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
        $results = $this->Html->icon('search');
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
        $results = $this->Html->button('Message button');
        $this->assertContains('default', $results);

        // add an incorrect type
        $results = $this->Html->button('Message', ['type' => 'fff']);
        $this->assertContains('Button should be one of the following : ', $results);
    }

    /**
     * testLabel method
     *
     * @return void
     */
    // public function testLabel()
    // {
    //     // default
    //     $results = $this->Html->label('Message label');
    //     $this->assertContains('default', $results);
    //
    //     // add an incorrect type
    //     $results = $this->Html->label('Message', ['type' => 'fff']);
    //     $this->assertContains('Label should be one of the following : ', $results);
    // }

    /**
     * testBadge method
     *
     * @return void
     */
    // public function testBadge()
    // {
    //     // default
    //     $results = $this->Html->badge('Message label');
    //     $this->assertContains('class="badge"', $results);
    // }

    /**
     * testPagination method
     *
     * @return void
     */
    public function testPagination()
    {
        // default
        //$results = $this->Html->pagination();
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
        $results = $this->Html->link('Title', ['controller' => 'Users']);
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
        $results = $this->Html->links('default', ['controller' => 'Users', 'id' => 1]);
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
        $results = $this->Html->linksActives(true, 1, ['controller' => 'Users']);
        $this->assertContains('Active', $results);
        $this->assertContains('Deactivate', $results);
        // for a link that is to false
        $results = $this->Html->linksActives(false, 1, ['controller' => 'Users']);
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
        $results = $this->Html->linksPrincipal(true, 1, ['controller' => 'Users']);
        $this->assertContains($expected, $results);
        $this->assertContains('Principal', $results);
        // for a link that is to false
        $results = $this->Html->linksPrincipal(false, 1, ['controller' => 'Users']);
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
        $results = $this->Html->collapse('CollapseNameBox', []);
        $this->assertContains('<div class="panel-group" id="CollapseNameBox"></div', $results);
    }
}
