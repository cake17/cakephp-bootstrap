<?php
/**
 * form template for bake
 *
 * @author   cake17
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://cake17.github.io/
 *
 */
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    });
?>
<div class="container">
    <div class="row">
        <div class="actions col-xs-12 col-md-12 col-lg-3">
            <h3><?= "<?= __('Actions') ?>"; ?></h3>
                <ul class="list-group">
                    <li class="list-group-item"><?= "<?= \$this->Html->link(__('New " . $singularHumanName . "'), ['action' => 'add']) ?>"; ?></li>
<?php if (strpos($action, 'add') === false): ?>
                    <li class="list-group-item"><?= "<?= \$this->Form->postLink(__('Delete'), ['action' => 'delete', \${$singularVar}->{$primaryKey[0]}], ['confirm' => __('Are you sure you want to delete # %s?', \${$singularVar}->{$primaryKey[0]})]) ?>" ?></li>
<?php endif; ?>
                    <li class="list-group-item"><?= "<?= \$this->Html->link(__('List " . $pluralHumanName . "'), ['action' => 'index']) ?>" ?></li>
<?php
$done = [];
foreach ($associations as $type => $data) {
    foreach ($data as $alias => $details) {
        if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
            echo "\t\t\t\t<li class=\"list-group-item\"><?= \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), ['controller' => '{$details['controller']}', 'action' => 'index']) ?> </li>\n";
            echo "\t\t\t\t<li class=\"list-group-item\"><?= \$this->Html->link(__('New " . Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) . "'), ['controller' => '{$details['controller']}', 'action' => 'add']) ?> </li>\n";
            $done[] = $details['controller'];
        }
    }
}
?>
                </ul>
        </div>
        <div class="<?= $pluralVar ?> index col-xs-12 col-md-12 col-lg-9">
            <?= "<?= \$this->Form->create(\${$singularVar}) ?>\n" ?>
            <fieldset>
                <legend><?= sprintf("<?= __('%s %s') ?>", Inflector::humanize($action), $singularHumanName) ?></legend>
<?php
                echo "\t<?php\n";
                foreach ($fields as $field) {
                    if (in_array($field, $primaryKey)) {
                        continue;
                    }
                    if (isset($keyFields[$field])) {
                        echo "\t\techo \$this->Form->input('{$field}', ['options' => \${$keyFields[$field]}]);\n";
                        continue;
                    }
                    if (!in_array($field, ['created', 'modified', 'updated'])) {
                        echo "\t\techo \$this->Form->input('{$field}');\n";
                    }
                }
                if (!empty($associations['BelongsToMany'])) {
                    foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
                        echo "\t\techo \$this->Form->input('{$assocData['property']}._ids', ['options' => \${$assocData['variable']}]);\n";
                    }
                }
                echo "\t?>\n";
?>
            </fieldset>
<?php
            echo "<?= \$this->Form->button(__('Submit')) ?>\n";
            echo "<?= \$this->Form->end() ?>\n";
?>
        </div>
    </div>
</div>
