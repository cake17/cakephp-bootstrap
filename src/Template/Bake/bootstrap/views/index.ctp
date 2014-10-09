<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         1.2.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Inflector;

$fields = collection($fields)
	->filter(function($field) use ($schema) {
		return !in_array($schema->columnType($field), ['binary', 'text']);
	})
	->take(7);
?>
<div class="container">
	<div class="row">
		<div class="actions col-xs-12 col-md-12 col-lg-3">
			<h3><?= "<?= __('Actions') ?>"; ?></h3>
				<ul class="list-group">
					<li class="list-group-item"><?= "<?= \$this->Html->link(__('New " . $singularHumanName . "'), ['action' => 'add']) ?>"; ?></li>
<?php
	$done = [];
	foreach ($associations as $type => $data) {
		foreach ($data as $alias => $details) {
			if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
				echo "\t\t<li class=\"list-group-item\"><?= \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), ['controller' => '{$details['controller']}', 'action' => 'index']) ?> </li>\n";
				echo "\t\t<li class=\"list-group-item\"><?= \$this->Html->link(__('New " . Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) . "'), ['controller' => '{$details['controller']}', 'action' => 'add']) ?> </li>\n";
				$done[] = $details['controller'];
			}
		}
	}
?>
				</ul>
		</div>
		<div class="<?= $pluralVar ?> index col-xs-12 col-md-12 col-lg-9">
			<div class="table-responsive">
				<table class="table table-condensed" cellpadding="0" cellspacing="0">
					<thead>
						<tr>
<?php foreach ($fields as $field): ?>
							<th><?= "<?= \$this->Paginator->sort('{$field}') ?>"; ?></th>
<?php endforeach; ?>
							<th class="actions"><?= "<?= __('Actions') ?>"; ?></th>
						</tr>
					</thead>
					<tbody>
					<?php
echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
echo "\t\t\t\t\t\t<tr>\n";
	foreach ($fields as $field) {
		$isKey = false;
		if (!empty($associations['BelongsTo'])) {
			foreach ($associations['BelongsTo'] as $alias => $details) {
				if ($field === $details['foreignKey']) {
					$isKey = true;
					echo "\t\t\t\t\t\t\t<td>\n\t\t\t\t<?= \${$singularVar}->has('{$details['property']}') ? \$this->Html->link(\${$singularVar}->{$details['property']}->{$details['displayField']}, ['controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}->{$details['property']}->{$details['primaryKey'][0]}]) : '' ?>\n\t\t\t</td>\n";
					break;
				}
			}
		}
		if ($isKey !== true) {
			if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
				echo "\t\t\t\t\t\t\t<td><?= h(\${$singularVar}->{$field}) ?></td>\n";
			} else {
				echo "\t\t\t\t\t\t\t<td><?= \$this->Number->format(\${$singularVar}->{$field}) ?></td>\n";
			}
		}
	}

	$pk = "\${$singularVar}->{$primaryKey[0]}";

	echo "\t\t\t\t\t\t\t<td class=\"actions\"><div class=\"btn-group btn-group-xs\">\n";
	echo "\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-default\"><?= \$this->Html->link(__('View'), ['action' => 'view', {$pk}]) ?></button>\n";
	echo "\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-default\"><?= \$this->Html->link(__('Edit'), ['action' => 'edit', {$pk}]) ?></button>\n";
	echo "\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-default\"><?= \$this->Form->postLink(__('Delete'), ['action' => 'delete', {$pk}], ['confirm' => __('Are you sure you want to delete # {0}?', {$pk})]) ?></button>\n";
	echo "\t\t\t\t\t\t\t</div></td>\n";
echo "\t\t\t\t\t\t</tr>\n";

echo "\t\t\t\t\t<?php endforeach; ?>\n";
?>
					</tbody>
				</table>
				<ul class="pagination">
<?php
	echo "\t\t\t\t<?php\n";
	echo "\t\t\t\t\techo \$this->Paginator->prev('< ' . __('previous'));\n";
	echo "\t\t\t\t\techo \$this->Paginator->numbers();\n";
	echo "\t\t\t\t\techo \$this->Paginator->next(__('next') . ' >');\n";
	echo "\t\t\t\t?>\n";
?>
				</ul>
			</div>
		</div>
	</div>
</div>
