<?php
/**
 * index template for bake
 * 
 * @author   cake17
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://cake17.github.io/
 *
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

	echo "\t\t\t\t\t\t\t<td><?= \$this->Html->links('default', ['id' => {$pk}]) ?>\n</td>\n";
echo "\t\t\t\t\t\t</tr>\n";

echo "\t\t\t\t\t<?php endforeach; ?>\n";
?>
					</tbody>
				</table>
<?php
	echo "\t\t\t\t<?= \$this->Html->pagination() ?>\n";
?>
			</div>
		</div>
	</div>
</div>
