<?php
namespace Bootstrap\Test\TestCase\View\Helper;

use Bootstrap\View\Helper\BsFormHelper;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * Bootstrap\View\Helper\BsformHelper Test Case
 */
class BsFormHelperTest extends TestCase
{
    /**
     * Fixtures to be used
     *
     * @var array
     */
    public $fixtures = ['core.articles', 'core.comments'];

    /**
     * Do not load the fixtures by default
     *
     * @var bool
     */
    public $autoFixtures = false;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $view = new View();
        $this->BsForm = new BsFormHelper($view);
        $this->article = [
            'schema' => [
                'id' => ['type' => 'integer'],
                'author_id' => ['type' => 'integer', 'null' => true],
                'title' => ['type' => 'string', 'null' => true],
                'body' => 'text',
                'published' => ['type' => 'string', 'length' => 1, 'default' => 'N'],
                '_constraints' => ['primary' => ['type' => 'primary', 'columns' => ['id']]]
            ],
            'required' => [
                'author_id' => true,
                'title' => true,
            ]
        ];
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        parent::tearDown();
        unset($this->BsForm, $this->Controller, $this->View);
        TableRegistry::clear();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test BsFormDefaultCreate setup
     *
     * @return void
     */
    public function testBsFormDefaultCreate()
    {
        $encoding = strtolower(Configure::read('App.encoding'));
        $result = $this->BsForm->create(false);
        $expected = [
            'form' => [
                'method' => 'post', 'action' => '/',
                'accept-charset' => $encoding,
            ],
            'div' => ['style' => 'display:none;'],
            'input' => ['type' => 'hidden', 'name' => '_method', 'value' => 'POST'],
            '/div'
        ];
        $this->assertHtml($expected, $result);
    }

    /**
     * Test BsFormDefaultCreate setup
     *
     * @return void
     */
    public function testBsFormDefaultFloats()
    {
        $this->article['schema'] = [
            'foo' => [
                'type' => 'float',
                'null' => false,
                'default' => null,
                'length' => 10
            ]
        ];

        $this->BsForm->create($this->article);
        $result = $this->BsForm->input('foo');
        $expected = [
            'div' => ['class' => 'input number'],
            'label' => ['for' => 'foo'],
            'Foo',
            '/label',
            ['input' => [
                'type' => 'number',
                'name' => 'foo',
                'id' => 'foo',
                'step' => 'any'
            ]],
            '/div'
        ];
        $expected = "";
        // $this->assertEquals($expected, $result);
    }
}
