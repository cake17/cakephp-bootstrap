<?php
/**
 * BsHtmlHelper
 *
 * @author   cake17
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://cake17.github.io/
 *
 */
namespace Bootstrap\View\Helper;

use Cake\Utility\Hash;
use Cake\Utility\Inflector;
use Cake\View\Helper\HtmlHelper;
use Cake\View\View;

class BsHtmlHelper extends HtmlHelper
{
    /**
     * Helpers used for this helper
     *
     * @var array
     */
    public $helpers = ['Url'];

    /**
     * Default config for this class
     *
     * - JS et CSS
     *    => Si à true : la dernière version connue sera chargée
     *    => Si à false : non chargé
     *    => Si '1.10.1' : la version demandée sera chargée
     *
     * - responsive_viewport : ajoute une balise meta
     * <meta name="viewport" content="width=device-width, initial-scale=1">
     *
     * @var array
     */
    protected $_defaultConfig = [
        'templates' => [
            'responsive_viewport' => '<meta name="viewport" content="width=device-width, initial-scale=1">',
            'meta' => '<meta{{attrs}}/>',
            'metalink' => '<link href="{{url}}"{{attrs}}/>',
            'link' => '<a href="{{url}}"{{attrs}}>{{content}}</a>',
            'mailto' => '<a href="mailto:{{url}}"{{attrs}}>{{content}}</a>',
            'image' => '<img src="{{url}}"{{attrs}}/>',
            'tableheader' => '<th{{attrs}}>{{content}}</th>',
            'tableheaderrow' => '<tr{{attrs}}>{{content}}</tr>',
            'tablecell' => '<td{{attrs}}>{{content}}</td>',
            'tablerow' => '<tr{{attrs}}>{{content}}</tr>',
            'block' => '<div{{attrs}}>{{content}}</div>',
            'blockstart' => '<div{{attrs}}>',
            'blockend' => '</div>',
            'tag' => '<{{tag}}{{attrs}}>{{content}}</{{tag}}>',
            'tagstart' => '<{{tag}}{{attrs}}>',
            'tagend' => '</{{tag}}>',
            'tagselfclosing' => '<{{tag}}{{attrs}}/>',
            'para' => '<p{{attrs}}>{{content}}</p>',
            'parastart' => '<p{{attrs}}>',
            'css' => '<link rel="{{rel}}" href="{{url}}"{{attrs}}/>',
            'style' => '<style{{attrs}}>{{content}}</style>',
            'charset' => '<meta http-equiv="Content-Type" content="text/html; charset={{charset}}" />',
            'ul' => '<ul{{attrs}}>{{content}}</ul>',
            'ol' => '<ol{{attrs}}>{{content}}</ol>',
            'li' => '<li{{attrs}}>{{content}}</li>',
            'javascriptblock' => '<script{{attrs}}>{{content}}</script>',
            'javascriptstart' => '<script>',
            'javascriptlink' => '<script src="{{url}}"{{attrs}}></script>',
            'javascriptend' => '</script>',
            'icon' => '<span class="glyphicon glyphicon-{{attrs}}"{{content}}></span>',
            'label' => '<span class="label label-{{attrs}}">{{content}}</span>',
            'badge' => '<span class="badge">{{content}}</span>',
            'alert' => '<div class="alert alert-{{type}}" role="alert">{{content}}</div>',
            'button_alert' => '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>',
            'button' => '<button type="button" class="btn btn-{{attrs}}">{{content}}</button>',
            'navbar' => '<nav class="navbar navbar-{{navbarClass}} navbar-{{type}}" role="navigation"><div class="{{containerClass}}">{{content}}</div></nav>',
            //'progressBar' => '<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">{{percentage}}</div></div>'
            //'breadcrumb' => '',
            //'jumbotron' => '<div class="jumbotron"><h1>%s</h1><p>%s</p>%s</div></div>',
            //'page-header' => '<div class="page-header"><h1>%s<small>%s</small></h1></div>',
            //'container' => '<div class="container">',
            //'dropdown' => '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> %s <b class="caret"></b> </a><ul class="dropdown-menu">%s</ul></li>'
        ],
        'head' => [
            'js' => [
                'jquery' => true,
                'jquery-ui' => true,
                'bootstrap' => true,
                'foundation' => false,
            ],
            'css' => [
                'bootstrap' => true,
                'jquery-ui' => true,
                'foundation' => false,
            ],
            'responsive_viewport' => true,
            'my_bootstrap_css' => true,
        ],
        // ne pas changer en-dessous, ou alors uniquement 'last' lorqu'il y a des nouvelles versions disponibles
        'libs' => [
            'js' => [
                'jquery' => [
                    'url' => 'http://ajax.googleapis.com/ajax/libs/jquery/%s/jquery.min.js',
                    'last' => '2.1.3'
                ],
                'jquery-ui' => [
                    'url' => 'http://ajax.googleapis.com/ajax/libs/jqueryui/%s/jquery-ui.min.js',
                    'last' => '1.11.3'
                ],
                'bootstrap' => [
                    'url' => 'https://maxcdn.bootstrapcdn.com/bootstrap/%s/js/bootstrap.min.js',
                    'last' => '3.3.2'
                ],
                'foundation' => [
                    'url' => 'https://cdnjs.cloudflare.com/ajax/libs/foundation/%s/js/foundation.min.js',
                    'last' => '5.4.1'
                ]
            ],
            'css' => [
                'bootstrap' => [
                    'url' => 'https://maxcdn.bootstrapcdn.com/bootstrap/%s/css/bootstrap.min.css',
                    'last' => '3.3.2'
                ],
                'jquery-ui' => [
                    'url' => 'http://ajax.googleapis.com/ajax/libs/jqueryui/%s/themes/smoothness/jquery-ui.css',
                    'last' => '1.11.3'
                ],
                'foundation' => [
                    'url' => 'https://cdnjs.cloudflare.com/ajax/libs/foundation/%s/css/foundation.min.css',
                    'last' => '5.4.1'
                ]
            ]
        ],
        'footer' => [
            'type' => 'fixed-bottom',
            'description' => 'Description',
            'webcreateur' => 'WebCreateur',
            'url_webcreateur' => 'http://cake17.github.io/'
        ],
        'navbar' => [
            'containerClass' => 'container-fluid',
            'navbarClass' => 'default',
            'type' => 'fixed-top'
        ],
        'alert' => [
            'type' => 'success',
            'dismissable' => false
        ],
        // 'progressBar' => [
        //     'type' => 'basic',
        //     'striped' => false,
        //     'animated' => false,
        //     'min' => 0,
        //     'max' => 100,
        // ],
        'image' => [
            'responsive' => false
        ],
        'icon' => [
            'alt' => 'icon',
            'title' => ''
        ],
        'button' => [
            'type' => 'default',
        ],
        'label' => [
            'type' => 'default',
        ],
        // the following options of links are defined in construct
        'links' => [
        ],
        'linksActives' => [
        ],
        'linksPrincipal' => [
        ],
    ];

    /**
     * Authorized types for each HTML element
     *
     * @var array $_types
     */
    protected $_types = [
        'alert' => ['success', 'info', 'warning', 'danger'],
        'label' => ['default', 'primary', 'success', 'info', 'warning', 'danger'],
        'button' => ['default', 'primary', 'success', 'info', 'warning', 'danger'],
        //'progressBar' => ['basic', 'success', 'info', 'warning', 'danger'],
        'image' => ['rounded', 'circle', 'thumbnail'],
        'error' => 'Error in BsHtml Helper : '
        //'button_sizes' => ['xs', 'lg', 'sm', ''],
    ];

    /**
     * Construct
     *
     * Merge defaultOptions for linksPrincipal, linksActives & links
     *
     * @param \Bootstrap\View\Helper\View $View View
     * @param array $config : array of options
     */
    public function __construct(View $View, array $config = [])
    {
        parent::__construct($View, $config);

        // put default options for links
        $defaultOptionsLinks = [
            "wrap" => [
                "class" => "btn-group"
            ],
            "view" => [
                "name" => __d('bootstrap', 'View'),
                "action" => "view",
                "class" => "btn btn-default btn-xs",
            ],
            "edit" => [
                "name" => $this->icon('pencil', ['title' => __d('bootstrap', 'Edit'), 'alt' => __d('bootstrap', 'Edit')]),
                "action" => "edit",
                "class" => "btn btn-default btn-xs",
            ],
            "delete" => [
                "name" => $this->icon('trash', ['title' => __d('bootstrap', 'Delete'), 'alt' => __d('bootstrap', 'delete')]),
                "action" => "delete",
                "class" => "btn btn-default btn-xs",
            ],
            "moveUp" => [
                "name" => $this->icon('arrow-up', ['title' => __d('bootstrap', 'Up'), 'alt' => __d('bootstrap', 'Up')]),
                "action" => "move_up",
                "class" => "btn btn-default btn-xs",
            ],
            "moveDown" => [
                "name" => $this->icon('arrow-down', ['title' => __d('bootstrap', 'Down'), 'alt' => __d('bootstrap', 'Down')]),
                "action" => "move_down",
                "class" => "btn btn-default btn-xs",
            ]
        ];
        $this->config('links', $defaultOptionsLinks);

        // put default options for links principal
        $defaultOptionsLinksPrincipal = [
            "wrap" => [
                "class" => "btn-group"
            ],
            "principal" => [
                "label" => "success",
                "name" => "Principal",
                'class' => 'btn btn-default btn-xs'
            ],
            "not_principal" => [
                "label" => "danger",
                "name" => "Not Principal",
                "btn_name" => __d('bootstrap', "Put as Principal"),
                "btn_icon" => 'check',
                'action' => 'put_principal',
                'class' => 'btn btn-default btn-xs'
            ]
        ];
        $this->config('linksPrincipal', $defaultOptionsLinksPrincipal);

        // put default options for links actives
        $defaultOptionsLinksActives = [
            "wrap" => [
                "class" => "btn-group"
            ],
            "active" => [
                "label" => "success",
                "name" => "Active",
                "btn_name" => __d('bootstrap', "Deactivate"),
                "btn_icon" => 'unchecked',
                'action' => 'desactivate',
                'class' => 'btn btn-default btn-xs'
            ],
            "desactive" => [
                "label" => "danger",
                "name" => "Not Active",
                "btn_name" => __d('bootstrap', "Activate"),
                "btn_icon" => 'check',
                'action' => 'activate',
                'class' => 'btn btn-default btn-xs'
            ]
        ];
        $this->config('linksActives', $defaultOptionsLinksActives);
    }

    /************************************
     *        LAYOUTS
     ************************************/

    /**
     * Element to include in all layouts head
     * Contains all includes for useful librairies when activate in $_options
     * - Bootstrap twitter
     * - jquery
     * - jquery-ui
     *
     * @param string $type : type for head
     * @param array $options : options
     * @return string
     */
    public function head($type = 'default', array $options = [])
    {
        $options = Hash::merge($this->config('head'), $options);
        // versions choisie
        $myJsVersion = '';
        $myCssVersion = '';
        // chemins vers librairie
        $myJsUrl = '';
        $myCssUrl = '';
        $html = '';
        // on ajoute au block script les librairies souhaitées
        foreach ($this->config('head.js') as $jsLib => $jsVersion) {
            // si à true, on utilise la dernière version de js connue, sinon la version demandée, et sinon rien
            if ($jsVersion === true) {
                $myJsVersion = $this->config('libs.js.' . $jsLib . '.last');
            } elseif (preg_match('#^[0-9]+\.[0-9]+\.[0-9]$#', $jsVersion) === 1) {
                $myJsVersion = $jsVersion;
            } else {
                // afficher une info/notice/erreur pour dire que la version n'est pas correcte
            }
            if ($jsVersion !== false) {
                if (isset($myJsVersion) && !empty($myJsVersion)) {
                    $myJsUrl = sprintf($this->config('libs.js.' . $jsLib . '.url'), $myJsVersion);
                    $html .= $this->script($myJsUrl) . "\n\t\t";
                } elseif (isset($myJsVersion) && empty($myJsVersion)) {
                    $html .= $this->script($this->config('libs.js.' . $jsLib . '.url')) . "\n";
                }
            }
        }
        // on ajoute au block css les librairies souhaitées
        foreach ($this->config('head.css') as $cssLib => $cssVersion) {
            // si à true, on utilise la dernière version de js connue, sinon la version demandée, et sinon rien
            if ($cssVersion) {
                $myCssVersion = $this->config('libs.css.' . $cssLib . '.last');
            } elseif (preg_match('#^[0-9]+\.[0-9]+\.[0-9]$#', $cssVersion)) {
                $myCssVersion = $cssVersion;
            } else {
                // afficher une info/notice/erreur pour dire que la version n'est pas correcte
            }
            if ($cssVersion !== false) {
                if (isset($myCssVersion) && !empty($myCssVersion)) {
                    $myCssUrl = sprintf($this->config('libs.css.' . $cssLib . '.url'), $myCssVersion);
                    $html .= $this->css($myCssUrl) . "\n\t\t";
                } elseif (isset($myCssVersion) && empty($myCssVersion)) {
                    $html .= $this->css($this->config('libs.css.' . $cssLib . '.url')) . "\n\t";
                }
            }
        }
        // on met en responsive si responsive_viewport à true
        if ($this->config('head.responsive_viewport')) {
            $html .= $this->config('templates.responsive_viewport') . "\n\t\t";
        }
        // on met le css du Plugin
        if ($this->config('head.my_bootstrap_css')) {
            $html .= $this->css('Bootstrap.my_bootstrap');
        }
        return $html;
    }

    /**
     * Print a footer
     *
     * @param string $title : Title of the site.
     * @param array $options Options.
     * - Description
     * - webcreateur
     * - url_webcreateur
     * - type
     *    => either 'fixed-bottom'
     *    => default to fixed-bottom
     * @return $html
     */
    public function footer($title, array $options = [])
    {
        $options = Hash::merge($this->config('footer'), $options);
        $html = '';

        if (isset($options['type']) && !empty($options['type'])) {
            $html .= $options['type'];
        }
        if (isset($options['description']) && !empty($options['description'])) {
            $html .= ' - ' . $options['description'] . ' ';
        }
        if (isset($options['webcreateur']) && !empty($options['webcreateur']) && isset($options['url_webcreateur']) && !empty($options['url_webcreateur'])) {
            $html .= $this->link(
                $this->image('logos/cake-websites.png', [
                    "alt" => __d('bootstrap', "Site crée par {0}", $options['webcreateur'])
                ]),
                $options['url_webcreateur'],
                [
                    'escape' => false,
                    'target' => '_blank'
                ]
            );
        }
        return $this->navbar($html, $options);
    }

    /**
     * Print a navbar
     *
     * @param string $content : html content for nabar.
     * @param array $options Options.
     * => type
     *    either 'fixed-top', 'fixed-bottom' or 'static-top'
     *    default to fixed-top
     * => containerClass
     *    either 'container' or anything else
     *    default to container
     * => navbarClass
     *    either 'default' or 'inverse'
     *    default to default
     * @return string
     */
    public function navbar($content, array $options = [])
    {
        $options = Hash::merge($this->config('navbar'), $options);

        return $this->formatTemplate('navbar', [
            'type' => $options['type'],
            'content' => $content,
            'containerClass' => $options['containerClass'],
            'navbarClass' => $options['navbarClass']
        ]);
    }

    /************************************
     *        OTHERS
     ************************************/

    /**
     * Print alert elements.
     *
     * @param string $message : Message to output.
     * @param array $options Options.
     * - type
     *    => either 'success', 'info', 'warning', 'danger' (see $_types)
     *    => default to success
     * - dismissable
     *    => true and the alert is dismissable
     * @return string
     */
    public function alert($message, array $options = [])
    {
        $options = Hash::merge($this->config('alert'), $options);

        if (in_array($options['type'], $this->_types['alert'])) :
            $classAlert = $options['type'];
            if (isset($options['dismissable']) && $options['dismissable'] === true) {
                $classAlert .= ' alert-dismissable';
                $message .= $this->config('templates.button_alert');
            }
            return $this->formatTemplate('alert', [
                'type' => $classAlert,
                'content' => $message
            ]);
        endif;
        return $this->alert(__d('bootstrap', '{0} Alert should be one of the following : {1}', $this->_types['error'], implode(', ', $this->_types['alert'])), ['type' => 'danger']);
    }

    /**
     * Picture responsive
     *
     * Extends from HtmlHelper:image()
     *
     * @param string $path Path to the image file, relative to the app/webroot/img/ directory.
     * @param array $options Array of HTML attributes. See above for special options.
     *    => 'responsive' : add a class 'img-responsive' if true, default to false
     *    => 'type' => rounded, circle, thumbnail
     * @return string End tag header
     */
    public function image($path, array $options = [])
    {
        $options = Hash::merge($this->config('image'), $options);

        if ($options['responsive']) :
            if (isset($options['class'])) {
                $options['class'] = 'img-responsive ' . $options['class'];
            }
            $options['class'] = 'img-responsive';
        endif;
        if (isset($options['type']) && in_array($options['type'], $this->_types['image'])) :
            $options['class'] .= ' img-' . $options['type'];
        endif;
        return parent::image($path, $options);
    }

    /**
     * Print a glyphicon from bootstrap
     * http://getbootstrap.com/components/#glyphicons to see all available glyphicons
     *
     * @param string $class : should be one of the glyphicons available
     * @param array $options : title and alt
     * @return mix string|bolean
     */
    public function icon($class, array $options = [])
    {
        $options = Hash::merge($this->config('icon'), $options);

        $htmlOptions = " title=\"" . $options['title'] . "\"";
        if (is_string($class)) {
            return $this->formatTemplate('icon', [
                'attrs' => $class,
                'content' => $htmlOptions
            ]);
        }
        return false;
    }

    /**
     * Print a button
     *
     * @param string $message Message to output.
     * @param array $options Options.
     * - type
     *    => either 'default', 'primary', 'success', 'info', 'warning' or 'danger' (see $_types)
     *    => default to default
     * - class : add a class
     * - id : add an id
     * @return string
     */
    public function button($message, array $options = [])
    {
        $options = Hash::merge($this->config('button'), $options);

        if (in_array($options['type'], $this->_types['button'])) {
            $attrs = $options['type'];
            if (isset($options['class']) && !empty($options['class'])) :
                $attrs .= " " . $options['class'];
            endif;
            if (isset($options['id']) && !empty($options['id'])) :
                $attrs .= '" id="' . $options['id'] . '"';
            endif;
            return $this->formatTemplate('button', [
                'attrs' => $attrs,
                'content' => $message
            ]);
        }
        return $this->alert(__d('bootstrap', '{0}Button should be one of the following : {1}', $this->_types['error'], implode(', ', $this->_types['button'])), ['type' => 'danger']);
    }

    /**
     * Print a label
     *
     * @param string $message : Message to output.
     * @param array $options Options.
     * => either default, primary, success, info, warning, danger
     * => default to 'default'
     * @return string
     */
    public function label($message, array $options = [])
    {
        $options = Hash::merge($this->config('label'), $options);

        if (in_array($options['type'], $this->_types['label'])) {
            $classLabel = $options['type'];
            if (isset($options['class']) && !empty($options['class'])) :
                $classLabel .= " " . $options['class'];
            endif;
            return $this->formatTemplate('label', [
                'attrs' => $classLabel,
                'content' => $message
            ]);
        }
        return $this->alert(__d('bootstrap', '{0}Label should be one of the following : {1}', $this->_types['error'], implode(', ', $this->_types['label'])), ['type' => 'danger']);
    }

    /**
     * Print a badge
     *
     * @param string $message Message to output.
     * @return string
     */
    public function badge($message)
    {
        return $this->formatTemplate('badge', [
            'content' => $message,
        ]);
    }

    /**
     * Print a progressBar
     *
     * @param string $percentage : Percentage.
     * @param array $options Options.
     * - label
     * - type
     *
     * @return string
     */
    // public function progressBar($percentage, array $options = [])
    // {
    //     $options = Hash::merge($this->config('progressBar'), $options);
    //     debug($options);
    //     if (in_array($options['type'], $this->_types['progressBar'])) {
    //         $classProgressBar = '';
    //         if (isset($options['type']) && !empty($options['type']) && $options['type'] !== 'basic') :
    //             $classProgressBar .= " progress-bar-" . $options['type'];
    //         endif;
    //         $label = '';
    //         if (isset($options['label']) && !empty($options['label'])) :
    //             $label .= $options['label'];
    //         endif;
    //         return $this->formatTemplate('progressBar', [
    //             // 'attrs' => $classProgressBar,
    //             'percentage' => $percentage,
    //             // 'label' => $label,
    //             // 'min' => $options['min'],
    //             // 'max' => $options['max']
    //         ]);
    //     }
    //     return $this->alert(__d('bootstrap', '{0}progressBar should be one of the following : {1}', $this->_types['error'], implode(', ', $this->_types['progressBar'])), ['type' => 'danger']);
    // }

    /**
     * Print a pagination
     *
     * @return string
     */
    public function pagination()
    {
        // <p>
        //    echo $this->Paginator->counter([
        //    'format' => __d('bootstrap','Page numéro {:page}/{:pages}, {:current} enregistrements affichés sur un total de {:count} , enregistrements affichés du numéro {:start} au numéro {:end}')
        //    ));
        // </p>
        $pagination = '
        <div class="text-center">
            <ul class="pagination">' .
                $this->_View->Paginator->prev('< ' . __d('bootstrap', 'Précédent'), [], null, ['class' => 'prev disabled']) .
                $this->_View->Paginator->numbers(['separator' => '', 'first' => 5, 'last' => 5, 'modulus' => 10]) .
                $this->_View->Paginator->next(__d('bootstrap', 'Suivant') . ' >', [], null, ['class' => 'next disabled']) . '
            </ul>
        </div>';
        return $pagination;
    }

    /************************************
     *        LINKS
     ************************************/

    /**
     * Print a link
     * - override HtmlHelper link method
     * - Permits to put an icon in a link
     * - add a class 'activation' if the link matches the current page
     *
     * @param string $title : title of link
     * @param string $url : url
     * @param array $options : options for link
     * @return parent::link
     */
    public function link($title, $url = null, array $options = [])
    {
        $default = ['icon' => null, 'escape' => true];
        $options = array_merge($default, (array)$options);
        if ($options['icon']) {
            if ($options['escape']) {
                $title = h($title);
            }
            $title = $this->bs_icon($options['icon']) . ' ' . $title;
            $options['escape'] = false;
            unset($options['icon']);
        }
        $lang = $this->_View->request->query('lang');
        if (!isset($url['lang']) && is_array($url) && isset($lang) && !empty($lang)) :
            $url['lang'] = $lang;
        endif;
        // we add class = activation to a link that matches the current page
        if ($url !== null) {
            $urlRouter = $this->Url->build($url);
        }
        //debug($urlRouter);
        if ($this->_View->request->here === $urlRouter) {
            if (!empty($options['class'])) {
                $mixClasses = [
                    $options['class'],
                    'activation'
                ];
                $options['class'] = implode(' ', $mixClasses);
            } else {
                $options['class'] = 'activation';
            }
        }
        return parent::link($title, $url, $options);
    }

    /**
     * To print links
     * Ex : echo $this->Html->links('default', [
     *        'view' => ['id' => '', 'title' => '', 'alt' => ''),
     *        'edit' => ['id' => '', 'title' => '', 'alt' => ''),
     *        'delete' => ['id' => '', 'title' => '', 'alt' => '')
     *    ));
     *
     * @param string $type Type.
     * - default: print view, edit and delete links
     * - tree: print view, edit, up, down and delete links
     * - mix: custom values. example : ed => output links edit and delete
     * @param array $options : options for links
     *
     * @return string
     */
    public function links($type, array $options = [])
    {
        $options = Hash::merge($this->config('links'), $options);
        // parse elements of url routes to fix eventual issues
        $options = $this->_parseUrlElements($options);

        $cheminView = ['plugin' => $options['plugin'], 'prefix' => $options['prefix'], 'controller' => $options['controller'], 'action' => $options['view']['action'], $options['id']];
        $cheminEdit = ['plugin' => $options['plugin'], 'prefix' => $options['prefix'], 'controller' => $options['controller'], 'action' => $options['edit']['action'], $options['id']];
        $cheminDelete = ['plugin' => $options['plugin'], 'prefix' => $options['prefix'], 'controller' => $options['controller'], 'action' => $options['delete']['action'], $options['id']];
        $cheminMoveUp = ['plugin' => $options['plugin'], 'prefix' => $options['prefix'], 'controller' => $options['controller'], 'action' => $options['moveUp']['action'], $options['id']];
        $cheminMoveDown = ['plugin' => $options['plugin'], 'prefix' => $options['prefix'], 'controller' => $options['controller'], 'action' => $options['moveDown']['action'], $options['id']];

        $linkView = $this->link($options['view']['name'], $cheminView, ['class' => $options['view']['class']]);
        $linkEdit = $this->link($options['edit']['name'], $cheminEdit, ['escape' => false, 'class' => $options['edit']['class']]);
        $linkDelete = $this->_View->Form->postLink(
            $options['delete']['name'],
            $cheminDelete,
            ['escape' => false, 'class' => $options['delete']['class'], 'confirm' => __d('bootstrap', 'Are you sure you want to delete # {0}?', $options['id'])]
        );
        $linkMoveUp = $this->_View->Form->postLink(
            $options['moveUp']['name'],
            $cheminMoveUp,
            ['escape' => false, 'class' => $options['moveUp']['class'], 'confirm' => __d('bootstrap', 'Are you sure you want to up # {0}?', $options['id'])]
        );
        $linkMoveDown = $this->_View->Form->postLink(
            $options['moveDown']['name'],
            $cheminMoveDown,
            ['escape' => false, 'class' => $options['moveDown']['class'], 'confirm' => __d('bootstrap', 'Are you sure you want to down # {0}?', $options['id'])]
        );
        $html = ' <div class="' . $options['wrap']['class'] . '">';
        switch ($type) {
            case 'default':
                if (isset($options['actions']) && is_array($options['actions'])) {
                    foreach ($options['actions'] as $action) :
                        $html .= ${'link' . ucfirst($action)};
                    endforeach;
                } else {
                    $html .= $linkView . $linkEdit . $linkDelete;
                }
                break;
            case 'tree':
                $html .= $linkView . $linkEdit . $linkMoveUp . $linkMoveDown . $linkDelete;
                break;
            case 'ed':
                $html .= $linkEdit;
                $html .= $linkDelete;
                break;
            case 'vd':
                $html .= $linkView;
                $html .= $linkDelete;
                break;
            case 've':
                $html .= $linkView;
                $html .= $linkEdit;
                break;
            case 'e':
                $html .= $linkEdit;
                break;
            case 'v':
                $html .= $linkEdit;
                break;
            case 'd':
                $html .= $linkEdit;
                break;
        }
        $html .= '</div>';
        //debug($html);
        return $html;
    }

    /**
     * To print 2 things
     * - A label showing the status (active or not) of the object
     * - Links to activate or not objets regardless their case
     *
     * @param bool $actif : true or false
     * @param int $id : id of entity
     * @param array $options : options
     * @return string
     */
    public function linksActives($actif, $id, array $options = [])
    {
        $options = Hash::merge($this->config('linksActives'), $options);

        // parse elements of url routes to fix eventual issues
        $options = $this->_parseUrlElements($options);

        $html = ' <div class="' . $options['wrap']['class'] . '">';
        if ($actif) {
            $html .= $this->button($options['active']['name'], ['type' => $options['active']['label'], 'class' => 'btn-xs']) . " ";
            $html .= $this->_View->Form->postLink(
                $this->icon($options['active']['btn_icon']) . $options['active']['btn_name'],
                ['plugin' => $options['plugin'], 'prefix' => $options['prefix'], 'controller' => $options['controller'], 'action' => $options['active']['action'], $id],
                ['escape' => false, 'class' => $options['active']['class'], 'confirm' => __d('bootstrap', 'Are you sure you want to {0} # {1}?', $options['active']['action'], $id)]
            );
        } else {
            $html .= $this->button($options['desactive']['name'], ['type' => $options['desactive']['label'], 'class' => 'btn-xs']) . " ";
            $html .= $this->_View->Form->postLink(
                $this->icon($options['desactive']['btn_icon']) . $options['desactive']['btn_name'],
                ['plugin' => $options['plugin'], 'prefix' => $options['prefix'], 'controller' => $options['controller'], 'action' => $options['desactive']['action'], $id],
                ['escape' => false, 'class' => $options['desactive']['class'], 'confirm' => __d('bootstrap', 'Are you sure you want to {0} # {1}?', $options['desactive']['action'], $id)]
            );
        }
        $html .= '</div>';
        return $html;
    }

    /**
     * To print 2 things
     * - A label showing the status (principal or not) of the object
     * - Links to change the status in principal if status is in non principal
     *
     * @param bool $principal : true or false
     * @param int $id : id of entity
     * @param array $options : options
     * @return string
     */
    public function linksPrincipal($principal, $id, array $options = [])
    {
        $options = Hash::merge($this->config('linksPrincipal'), $options);

        // parse elements of url routes to fix eventual issues
        $options = $this->_parseUrlElements($options);

        $html = ' <div class="' . $options['wrap']['class'] . '">';
        if ($principal) {
            $html .= $this->button(
                $options['principal']['name'],
                [
                    'type' => $options['principal']['label'],
                    'class' => $options['principal']['class']
                ]
            ) . " ";
        } else {
            $html .= $this->button(
                $options['not_principal']['name'],
                [
                    'type' => $options['not_principal']['label'],
                    'class' => 'btn-xs'
                ]
            ) . " ";
            $html .= $this->_View->Form->postLink(
                $this->icon(
                    $options['not_principal']['btn_icon']
                ) . $options['not_principal']['btn_name'],
                ['plugin' => $options['plugin'], 'prefix' => $options['prefix'], 'controller' => $options['controller'], 'action' => $options['not_principal']['action'], $id],
                ['escape' => false, 'class' => $options['not_principal']['class'], 'confirm' => __d('bootstrap', 'Are you sure you want to put as principal # {0}?', $id)]
            );
        }
        $html .= '</div>';
        return $html;
    }

    /**
     * To print a modal
     *
     * @return string $html
     */
    public function modal()
    {
        return $this->_View->element('Bootstrap.BsHtml/modal');
    }
    /**
     * To print a collapse box
     *
     * @param string $formName : default accordeon.
     * @param array $actions : all links to add to the collapse.
     * @return string : html of collapse box
     */
    public function collapse($formName = "accordeon", array $actions = [], array $options = [])
    {
        $type = $type = ' panel-default';
        if (isset($options['type']) && !$options['type']) {
            $type = '';
        }
        $html = '<div class="panel-group" id="' . $formName . '">';
        foreach ($actions as $name => $links) :
            $html .= '<div class="panel' . $type . '">';
            $html .= '<div class="panel-heading">';
            $html .= '<h1 class="panel-title">';
            $html .= '<a class="accordion-toggle" data-toggle="collapse" data-parent="#' . $formName . '" href="#' . $name . '">';
            $html .= $links['titleMenu'];
            $html .= "</a>";
            $html .= "</h1>";
            $html .= "</div>";
            $html .= '<div id="' . $name . '" class="panel-collapse collapse';
            if (isset($links['open']) && $links['open'] === 'in') {
                $html .= " " . $links['open'];
            }
            $html .= '">';
            $html .= '<div class="panel-body">';
            if (isset($links['links']) && !empty($links['links'])) {
                $html .= '<ul class="nav nav-pills nav-stacked">';
                foreach ($links as $title => $values) :
                    if ($title === 'links') :
                        foreach ($values as $link) :
                            // On cherche si dans le lien il y a la valeur class=activation
                            $liActive = "";
                            if (strpos($link, 'class="activation"') !== false) {
                                $liActive = ' class="active"';
                            }
                            $html .= "<li" . $liActive . ">" . $link . "</li>";
                        endforeach;
                    endif;
                endforeach;
                $html .= "</ul>";
            }
            if (isset($links['content']) && !empty($links['content'])) {
                $html .= $links['content'];
            }
            $html .= "</div>";
            $html .= "</div>";
            $html .= "</div>";
        endforeach;
        $html .= "</div>";
        return $html;
    }

    /**
     * Parse Url Elements of Route
     * Used in all links methods
     *
     * @param array $options : options with controller, plugin, ...
     * @return array
     */
    protected function _parseUrlElements(array $options = [])
    {
        $prefix = null;
        $plugin = null;

        if (isset($this->_View->request->params['controller']) && !empty($this->_View->request->params['controller']) && (!isset($options['controller']) || empty($options['controller']))) :
            $options['controller'] = $this->_View->request->params['controller'];
        endif;

        if (isset($options['plugin'])) {
            $plugin = $options['plugin'];
        } elseif (isset($this->_View->request->params['plugin'])) {
            $plugin = $this->_View->request->params['plugin'];
        } else {
            $plugin = null;
        }
        $options['plugin'] = $plugin;

        if (isset($options['prefix'])) {
            $prefix = $options['prefix'];
        } elseif (isset($this->_View->request->params['prefix'])) {
            $prefix = $this->_View->request->params['prefix'];
        } else {
            $prefix = null;
        }
        $options['prefix'] = $prefix;

        $this->config($options);
        return $options;
    }
}
