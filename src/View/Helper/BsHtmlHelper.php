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

class BsHtmlHelper extends HtmlHelper {

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
 *	=> Si à true : la dernière version connue sera chargée
 *	=> Si à false : non chargé
 *	=> Si '1.10.1' : la version demandée sera chargée
 *
 * - responsive_viewport : ajoute une balise meta <meta name="viewport" content="width=device-width, initial-scale=1">
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
			'button_alert' => '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span</button>',
			'button' => '<button type="button" class="btn btn-{{attrs}}">{{content}}</button>',
			'navbar' => '<nav class="navbar navbar-{{navbarClass}} navbar-{{type}}" role="navigation"><div class="{{containerClass}}">{{content}}</div></nav>'
			//'breadcrumb' => '',
			//'jumbotron' => '<div class="jumbotron"><h1>%s</h1><p>%s</p>%s</div></div>',
			//'page-header' => '<div class="page-header"><h1>%s<small>%s</small></h1></div>',
			//'container' => '<div class="container">',
			//'dropdown' => '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> %s <b class="caret"></b> </a><ul class="dropdown-menu">%s</ul></li>'
		],
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
		// ne pas changer en-dessous, ou alors uniquement 'last' lorqu'il y a des nouvelles versions disponibles
		'libs' => [
			'js' => [
				'jquery' => [
					'url' => 'http://ajax.googleapis.com/ajax/libs/jquery/%s/jquery.min.js',
					'last' => '2.1.1'
				],
				'jquery-ui' => [
					'url' => 'http://ajax.googleapis.com/ajax/libs/jqueryui/%s/jquery-ui.min.js',
					'last' => '1.11.1'
				],
				'bootstrap' => [
					'url' => 'https://maxcdn.bootstrapcdn.com/bootstrap/%s/js/bootstrap.min.js',
					'last' => '3.2.0'
				],
				'foundation' => [
					'url' => 'https://cdnjs.cloudflare.com/ajax/libs/foundation/%s/js/foundation.min.js',
					'last' => '5.4.1'
				]
			],
			'css' => [
				'bootstrap' => [
					'url' => 'https://maxcdn.bootstrapcdn.com/bootstrap/%s/css/bootstrap.min.css',
					'last' => '3.2.0'
				],
				'jquery-ui' => [
					'url' => 'http://ajax.googleapis.com/ajax/libs/jqueryui/%s/themes/smoothness/jquery-ui.css',
					'last' => '1.11.1'
				],
				'foundation' => [
					'url' => 'https://cdnjs.cloudflare.com/ajax/libs/foundation/%s/css/foundation.min.css',
					'last' => '5.4.1'
				]
			]
		],
		// the following options of links are defined in construct
		'links' => [
		],
		'linksActives' => [
		],
		'linksPrincipal' => [
		]
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
		'error' => 'Error in BsHtml Helper : '
		//'button_sizes' => ['xs', 'lg', 'sm', ''],
	];

/**
 * Construct
 *
 * Merge defaultOptions for linksPrincipal, linksActives
 * @param \Bootstrap\View\Helper\View $View
 * @param array $config
 */
	public function __construct(\Cake\View\View $View, array $config = array()) {
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
 *		LAYOUTS
 ************************************/

/**
 * Element to include in all layouts head
 * Contains all includes for useful librairies when activate in $_options
 * - Bootstrap twitter
 * - jquery
 * - jquery-ui
 *
 * @param array $options
 * @return string
 */
	public function head($type = 'default', array $options = []) {
		$this->_defaultConfig = Hash::merge($this->_defaultConfig, $options);
		// versions choisie
		$myJsVersion = '';
		$myCssVersion = '';
		// chemins vers librairie
		$myJsUrl = '';
		$myCssUrl = '';
		$html = '';
		// on ajoute au block script les librairies souhaitées
		foreach ($this->config('js') as $jsLib => $jsVersion) {
			// si à true, on utilise la dernière version de js connue, sinon la version demandée, et sinon rien
			if ($jsVersion === true) {
				$myJsVersion = $this->config('libs.js')[$jsLib]['last'];
			} elseif (preg_match('#^[0-9]+\.[0-9]+\.[0-9]$#', $jsVersion) === 1) {
				$myJsVersion = $jsVersion;
			} else {
				// afficher une info/notice/erreur pour dire que la version n'est pas correcte
			}
			if ($jsVersion !== false) {
				if (isset($myJsVersion) && !empty($myJsVersion)) {
					$myJsUrl = sprintf($this->config('libs.js.' . $jsLib . '.url'), $myJsVersion);
					$html .= $this->script($myJsUrl, ['block' => 'scriptBottom']) . "\n\t\t";
				} elseif (isset($myJsVersion) && empty($myJsVersion)) {
					$html .= $this->script($this->config('libs.js.' . $jsLib . '.url'), ['block' => 'scriptBottom']) . "\n";
				}
			}
		}
		// on ajoute au block css les librairies souhaitées
		foreach ($this->config('css') as $cssLib => $cssVersion) {
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
		if ($this->config('responsive_viewport')) {
			$html .= $this->config('templates.responsive_viewport') . "\n\t\t";
		}
		// on met le css du Plugin
		if ($this->config('my_bootstrap_css')) {
			$html .= $this->css('my_bootstrap');
		}
		return $html;
	}

/**
 * Print a footer
 *
 * @param string $title : title of the site
 * @param string $type
 * => either 'fixed-bottom'
 * => default to fixed-bottom
 * @param array $options
 * - Description
 * - webcreateur
 * - url_webcreateur
 * @return $html
 */
	public function footer($title, array $options = []) {
		$html = '';
		$defaultOptions = [
			'type' => 'fixed-bottom', 
			'description' => 'Description',
			'webcreateur' => 'WebCreateur',
			'url_webcreateur' => 'http://cake17.github.io/'
		];
		$options = Hash::merge($defaultOptions, $options);
		if (isset($options['type']) && !empty($options['type'])):
			$html .= $options['type'];
		endif;
		if (isset($options['description']) && !empty($options['description'])):
			$html .= ' - ' . $options['description'] . ' ';
		endif;
		if (isset($options['webcreateur']) && !empty($options['webcreateur']) && isset($options['url_webcreateur']) && !empty($options['url_webcreateur'])):
			$html .= $this->link($this->image('logos/cake-websites.png', [
					"alt" => __d('bootstrap', "Site crée par " . $options['webcreateur'])
				]),
				$options['url_webcreateur'], [
					'escape' => false,
					'target'=>'_blank'
				]
			);
		endif;
		return $this->navbar($html, $options['type']);
	}

/**
 * Print a navbar
 *
 * @param string $content
 * @param array $options
 * => type
 *	either 'fixed-top', 'fixed-bottom' or 'static-top'
 *	default to fixed-top
 * => containerClass
 *	either 'container' or anything else
 *	default to container
 * => navbarClass
 *	either 'default' or 'inverse'
 *	default to default
 * 
 * @return string
 */
	public function navbar($content, array $options = []) {
		$defaultOptions = [
			'containerClass' => 'container-fluid',
			'navbarClass' => 'default',
			'type' => 'fixed-top'
		];
		$options = Hash::merge($defaultOptions, $options);
		return $this->formatTemplate('navbar', [
			'type' => $options['type'],
			'content' => $content,
			'containerClass' => $options['containerClass'],
			'navbarClass' => $options['navbarClass']
		]);
	}

/************************************
 *		OTHERS
 ************************************/

/**
 * Print alert elements
 *
 * @param string $message
 * @param array $options
 * - type
 * => either 'success', 'info', 'warning', 'danger' (see $_types)
 * => default to success
 * - dismissable
 * => true and the alert is dismissable
 * @return string
 */
	public function alert($message, array $options = []) {
		$defaultOptions = [
			'type' => 'success',
			'dismissable' => false
		];
		$options = array_merge($defaultOptions, $options);

		if (in_array($options['type'], $this->_types['alert'])):
			$classAlert = $options['type'];
			if (isset ($options['dismissable']) && $options['dismissable'] === true) {
				$classAlert .=  ' alert-dismissable';
				$message .= $this->config('templates.button_alert');
			}
			return $this->formatTemplate('alert', [
				'type' => $classAlert,
				'content' => $message
			]);
		endif;
		return $this->alert(__d('bootstrap', $this->_types['error'] . 'Alert should be one of the following : ' . implode(', ', $this->_types['alert'])), ['type' => 'danger']);
	}

/**
 * Picture responsive
 *
 * Extends from HtmlHelper:image()
 *
 * @param string $path Path to the image file, relative to the app/webroot/img/ directory.
 * @param array $options Array of HTML attributes. See above for special options.
 * @return string End tag header
 */
	public function image($path, array $options = []) {
		if (isset($options['class'])) {
			$options['class'] = 'img-responsive ' . $options['class'];
		} else {
			$options['class'] = 'img-responsive';
		}
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
	public function icon($class, $options = []) {
		$default = [
			'alt' => 'icon',
			'title' => ''
		];
		$options = array_merge($default, $options);
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
 * @param string $message
 * @param array $options
 * - type
 *	=> either 'default', 'primary', 'success', 'info', 'warning' or 'danger' (see $_types)
 *	=> default to default
 * - class : add a class
 * - id : add an id
 * @return string
 */
	public function button($message, $options = []) {
		$default = [
			'type' => 'default',
		];
		$options = array_merge($default, $options);
		if (in_array($options['type'], $this->_types['button'])) {
			$attrs = $options['type'];
			if (isset($options['class']) && !empty($options['class'])):
				$attrs .= " " . $options['class'];
			endif;
			if (isset($options['id']) && !empty($options['id'])):
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
 * @param string $message
 * @param array $options
 * => either default, primary, success, info, warning, danger
 * => default to 'default'
 * @return string
 */
	public function label($message, $options = []) {
		$default = [
			'type' => 'default',
		];
		$options = array_merge($default, $options);
		if (in_array($options['type'], $this->_types['label'])) {
			$classLabel = $options['type'];
			if (isset($options['class']) && !empty($options['class'])):
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
 * @param string $message
 * @return string
 */
	public function badge($message) {
		return $this->formatTemplate('badge', [
			'content' => $message,
		]);
	}

/**
 * Print a pagination
 *
 * @return string
 */
	public function pagination() {
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
 *		LINKS
 ************************************/

/**
 * Print a link
 * - override HtmlHelper link method
 * - Permits to put an icon in a link
 * - add a class 'activation' if the link matches the current page
 *
 * @param string $title
 * @param string $url
 * @param array $options
 * @param bolean $confirmMessage
 * @return parent::link
 */
	public function link($title, $url = null, array $options = []) {
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
		if (!isset($url['lang']) && is_array($url) && isset($lang) && !empty($lang)):
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
	'view' => ['id' => '', 'title' => '', 'alt' => ''),
	'edit' => ['id' => '', 'title' => '', 'alt' => ''),
	'delete' => ['id' => '', 'title' => '', 'alt' => '')
));
 *
 * @param string $type
 * - default: print view, edit and delete links
 * - tree: print view, edit, up, down and delete links
 * - mix: custom values
 * @param array $options
 *
 * @retrun string
 */
	public function links($type, array $options = []) {
		$options = Hash::merge($this->config('links'), $options);
		// parse elements of url routes to fix eventual issues
		$options = $this->parseUrlElements($options);

		$cheminView = ['plugin' => $options['plugin'], 'prefix' => $options['prefix'], 'controller' => $options['controller'], 'action' => $options['view']['action'], $options['id']];
		$cheminEdit = ['plugin' => $options['plugin'], 'prefix' => $options['prefix'], 'controller' => $options['controller'], 'action' => $options['edit']['action'], $options['id']];
		$cheminDelete = ['plugin' => $options['plugin'], 'prefix' => $options['prefix'], 'controller' => $options['controller'], 'action' => $options['delete']['action'], $options['id']];
		$cheminMoveUp = ['plugin' => $options['plugin'], 'prefix' => $options['prefix'], 'controller' => $options['controller'], 'action' => $options['moveUp']['action'], $options['id']];
		$cheminMoveDown = ['plugin' => $options['plugin'], 'prefix' => $options['prefix'], 'controller' => $options['controller'], 'action' => $options['moveDown']['action'], $options['id']];

		$linkView = $this->link($options['view']['name'], $cheminView, ['class' => $options['view']['class']]);
		$linkEdit = $this->link($options['edit']['name'], $cheminEdit, ['escape' => false, 'class' => $options['edit']['class']]);
		$linkDelete = $this->_View->Form->postLink($options['delete']['name'],
			$cheminDelete,
			['escape' => false, 'class' => $options['delete']['class'], 'confirm' => __d('bootstrap','Are you sure you want to delete # {0}?', $options['id'])]
		);
		$linkMoveUp = $this->_View->Form->postLink($options['moveUp']['name'],
			$cheminMoveUp,
			['escape' => false, 'class' => $options['moveUp']['class'], 'confirm' => __d('bootstrap','Are you sure you want to up # {0}?', $options['id'])]
		);
		$linkMoveDown = $this->_View->Form->postLink($options['moveDown']['name'],
			$cheminMoveDown,
			['escape' => false, 'class' => $options['moveDown']['class'], 'confirm' => __d('bootstrap','Are you sure you want to down # {0}?', $options['id'])]
		);
		$html = ' <div class="' . $options['wrap']['class'] . '">';
		if ($type === 'default') {
			if (isset($options['actions']) && is_array($options['actions'])) {
				foreach ($options['actions'] as $action):
					$html .= ${'link' . ucfirst($action)};
				endforeach;
			} else {
				$html .= $linkView . $linkEdit . $linkDelete;
			}
		} elseif ($type === 'tree') {
			$html .= $linkView . $linkEdit . $linkMoveUp . $linkMoveDown . $linkDelete;
		}
		elseif ($type === 'mix') {
			if (isset ($options['view'])) {
				$html .= $linkView;
			}
			if (isset ($options['edit'])) {
				$html .= $linkEdit;
			}
			if (isset ($options['delete'])) {
				$html .= $linkDelete;
			}
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
 * @param string $actif
 * @param int $id
 * @param array $options
 * @return string
 */
	public function linksActives($actif, $id, array $options = []) {
		$options = Hash::merge($this->config('linksActives'), $options);

		// parse elements of url routes to fix eventual issues
		$options = $this->parseUrlElements($options);

		$html = ' <div class="' . $options['wrap']['class'] . '">';
		if ($actif) {
			$html .= $this->button($options['active']['name'], ['type' => $options['active']['label'], 'class' => 'btn-xs']) . " ";
			$html .= $this->_View->Form->postLink($this->icon($options['active']['btn_icon']) . $options['active']['btn_name'],
				['plugin' => $options['plugin'], 'prefix' => $options['prefix'], 'controller' => $options['controller'], 'action' => $options['active']['action'], $id],
				['escape' => false, 'class' => $options['active']['class'], 'confirm' => __d('bootstrap', 'Are you sure you want to {0} # {1}?', $options['active']['action'], $id)]
			);
		} else {
			$html .= $this->button($options['desactive']['name'], ['type' => $options['desactive']['label'], 'class' => 'btn-xs']) . " ";
			$html .= $this->_View->Form->postLink($this->icon($options['desactive']['btn_icon']) . $options['desactive']['btn_name'],
				['plugin' => $options['plugin'], 'prefix' => $options['prefix'], 'controller' => $options['controller'], 'action' => $options['desactive']['action'], $id],
				['escape' => false, 'class' => $options['desactive']['class'], 'confirm' => __d('bootstrap','Are you sure you want to {0} # {1}?', $options['desactive']['action'], $id)]
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
 * @param string $principal
 * @param int $id
 * @param array $options
 * @return string
 */
	public function linksPrincipal($principal, $id, array $options = []) {
		$options = Hash::merge($this->config('linksPrincipal'), $options);

		// parse elements of url routes to fix eventual issues
		$options = $this->parseUrlElements($options);

		$html = ' <div class="' . $options['wrap']['class'] . '">';
		if ($principal) {
			$html .= $this->button($options['principal']['name'], ['type' => $options['principal']['label'], 'class' => $options['principal']['class']]) . " ";
		} else {
			$html .= $this->button($options['not_principal']['name'], ['type' => $options['not_principal']['label'], 'class' => 'btn-xs']) . " ";
			$html .= $this->_View->Form->postLink($this->icon($options['not_principal']['btn_icon']) . $options['not_principal']['btn_name'],
				['plugin' => $options['plugin'], 'prefix' => $options['prefix'], 'controller' => $options['controller'], 'action' => $options['not_principal']['action'], $id],
				['escape' => false, 'class' => $options['not_principal']['class'], 'confirm' => __d('bootstrap','Are you sure you want to put as principal # {0}?', $id)]
			);
		}
		$html .= '</div>';
		return $html;
	}

/**
 * Parse Url Elements of Route
 * Used in all links methods
 *
 * @param array $options
 * @return array
 */
	public function parseUrlElements(array $options = []) {
		if (isset ($this->_View->request->params['controller']) && !empty ($this->_View->request->params['controller']) && (!isset ($options['controller']) || empty ($options['controller']))):
			$options['controller'] = $this->_View->request->params['controller'];
		endif;
		if (isset ($this->_View->request->params['plugin']) && !empty ($this->_View->request->params['plugin']) && (!isset ($options['plugin']) || empty ($options['plugin']))) {
			$options['plugin'] = $this->_View->request->params['plugin'];
		} else {
			$options['plugin'] = null;
		}
		if (isset ($this->_View->request->params['prefix']) && !empty ($this->_View->request->params['prefix']) && (!isset ($options['prefix']) || empty ($options['prefix']))) {
			$options['prefix'] = $this->_View->request->params['prefix'];
		} else {
			$options['prefix'] = null;
		}
		$this->config($options);
		return $options;
	}

}