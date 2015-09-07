<?php
/**
 * HeadbarHelper
 *
 * @author  cake17
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link    http://www.cake-websites.com
 */
namespace Bootstrap\View\Helper;

use Cake\Core\App;
use Cake\View\Helper;

class HeadbarHelper extends Helper
{
    /**
     *
     * @var array $_defaultConfig : default options for helper
     */
    protected $_defaultConfig = [
        // default home link
        'homeLink' => '/',
        'wantsDefaultLinks' => false
    ];

    /**
     * Affiche la headbar
     *
     * @param  array  $options : Options
     * @return $html : menu en html
     */
    public function add(array $options = [])
    {
        $this->config($options);
        return $this->_View->element('Bootstrap.layouts/headbar', $this->config());
    }
}
