<?php
/**
 * configs for paginator
 * 
 * @author   cake17
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://cake17.github.io/
 *
 */
$config = [
	'nextActive' => '<li class="next"><a rel="next" href="{{url}}">{{text}}</a></li>',
	'nextDisabled' => '<li class="next disabled"><a href="">{{text}}</a></li>',
	'prevActive' => '<li class="prev"><a rel="prev" href="{{url}}">{{text}}</a></li>',
	'prevDisabled' => '<li class="prev disabled"><a href="">{{text}}</a></li>',
	'counterRange' => '{{start}} - {{end}} of {{count}}',
	'counterPages' => '{{page}} of {{pages}}',
	'first' => '<li class="first"><a href="{{url}}">{{text}}</a></li>',
	'last' => '<li class="last"><a href="{{url}}">{{text}}</a></li>',
	'number' => '<li><a href="{{url}}">{{text}}</a></li>',
	'current' => '<li class="active"><a href="">{{text}}</a></li>',
	'ellipsis' => '<li class="ellipsis">...</li>',
	'sort' => '<a href="{{url}}">{{text}}</a>',
	'sortAsc' => '<a class="asc" href="{{url}}">{{text}}</a>',
	'sortDesc' => '<a class="desc" href="{{url}}">{{text}}</a>',
	'sortAscLocked' => '<a class="asc locked" href="{{url}}">{{text}}</a>',
	'sortDescLocked' => '<a class="desc locked" href="{{url}}">{{text}}</a>',
];
