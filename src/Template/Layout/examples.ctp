<?= $this->Html->docType(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?= $this->Html->charset() . "\n" ?>
        <title><?= $this->fetch('title') ?></title>
        <?= $this->Html->head() ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?= $this->Html->link($this->Html->image('favicon.png') . __d('bootstrap', ' Project Name'), ['/'], ['class' => 'navbar-brand', 'escape' => false]); ?>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><?= $this->Html->link(__d('bootstrap', "Nos Offres"), ['controller' => 'Pages', 'action' => 'offres']); ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><?= $this->Html->link(__d('bootstrap', 'Connexion'), ['plugin' => 'Users', 'prefix' => false, 'controller' => 'Users', 'action' => 'login']); ?></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="bootstrap-examples">
            <h2><?= __d('bootstrap', 'Alerts'); ?></h2>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __d('bootstrap', 'EXAMPLE'); ?></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table  class="table table-condensed table-striped" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?= __d('bootstrap', 'Results'); ?></th>
                                    <th><?= __d('bootstrap', 'Code'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $this->Html->alert(__d('bootstrap', 'This is an alert, "success" by default')); ?></td>
                                    <td><code>echo $this->Html->alert(__d('bootstrap', 'This is an alert, "success" by default'))</code></td>
                                </tr>
                                <tr>
                                    <td><?= $this->Html->alert(__d('bootstrap', 'This is an alert with option danger'), ['type' => 'danger']); ?></td>
                                    <td><code>echo $this->Html->alert(__d('bootstrap', 'This is an alert with option danger'), ['type' => 'danger'])</code></td>
                                </tr>
                                <tr>
                                    <td><?= $this->Html->alert(__d('bootstrap', 'This is an alert with option warning and dismissable'), ['type' => 'warning', 'dismissable' => true]); ?></td>
                                    <td><code>echo $this->Html->alert(__d('bootstrap', 'This is an alert with option warning and dismissable'), ['type' => 'warning', 'dismissable' => true])</code></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <h2><?= __d('bootstrap', 'Images & Icones'); ?></h2>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __d('bootstrap', 'EXAMPLE'); ?></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table  class="table table-condensed table-striped" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?= __d('bootstrap', 'Results'); ?></th>
                                    <th><?= __d('bootstrap', 'Code'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $this->Html->image('Bootstrap.logo.png') ?></td>
                                    <td><code>echo $this->Html->image('Bootstrap.logo.png')</code></td>
                                </tr>
                                <tr>
                                    <td><?= $this->Html->icon('euro') ?><?= $this->Html->icon('search') ?></td>
                                    <td><code>echo $this->Html->icon('euro');<br />echo $this->Html->icon('search');</code></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <h2><?= __d('bootstrap', 'Buttons, Labels & Badges'); ?></h2>
            <!--<h3><?= __d('bootstrap', 'EXAMPLES of Buttons'); ?></h3>-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __d('bootstrap', 'Buttons'); ?></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table  class="table table-condensed table-striped" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?= __d('bootstrap', 'Results'); ?></th>
                                    <th><?= __d('bootstrap', 'Code'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php
                                    // print a button
                                    echo $this->Html->button(__d('bootstrap', 'This is a button with default')) . "<br />";
                                    echo $this->Html->button(__d('bootstrap', 'This is a button with option primary'), ['type' => 'primary']) . "<br />";
                                    echo $this->Html->button(__d('bootstrap', 'This is a button with option danger and a class and id defined'), ['type' => 'danger', 'class' => 'my-class', 'id' => 'my-id']) . "<br />";
                                    ?></td>
                                </tr>
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __d('bootstrap', 'Labels'); ?></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table  class="table table-condensed table-striped" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?= __d('bootstrap', 'Results'); ?></th>
                                    <th><?= __d('bootstrap', 'Code'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php
                                    // print a label
                                    echo $this->Html->label(__d('bootstrap', 'This is a label with default'));
                                    ?></td>
                                </tr>
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __d('bootstrap', 'Badges'); ?></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table  class="table table-condensed table-striped" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?= __d('bootstrap', 'Results'); ?></th>
                                    <th><?= __d('bootstrap', 'Code'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php
                                    // print a badge
                                    echo $this->Html->badge(__d('bootstrap', 'This is a badge with default'));
                                    ?></td>
                                </tr>
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <h3><?= __d('bootstrap', 'Pagination'); ?></h3>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __d('bootstrap', 'EXAMPLE'); ?></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table  class="table table-condensed table-striped" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?= __d('bootstrap', 'Results'); ?></th>
                                    <th><?= __d('bootstrap', 'Code'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php
                                    // print a pagination
                                    echo $this->Html->pagination();
                                    ?></td>
                                    <td>echo $this->Html->pagination();</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <h2><?= __d('bootstrap', 'Links'); ?></h2>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __d('bootstrap', 'Link'); ?></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table  class="table table-condensed table-striped" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?= __d('bootstrap', 'Results'); ?></th>
                                    <th><?= __d('bootstrap', 'Code'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php
                                    // print a link
                                    echo $this->Html->link(__d('bootstrap', 'My Link'), ['']) . "<br />";
                                    ?></td>
                                    <td>echo $this->Html->link(__d('bootstrap', 'My Link'), [''])</td>
                                </tr>
                                <tr>
                                    <td><?php
                                    // print a link
                                    echo $this->Html->link(__d('bootstrap', 'My Link with active'), ['']) . "<br />";
                                    ?></td>
                                    <td>echo $this->Html->link(__d('bootstrap', 'My Link with active'), [''])</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __d('bootstrap', 'Default & Tree'); ?></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table  class="table table-condensed table-striped" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?= __d('bootstrap', 'Results'); ?></th>
                                    <th><?= __d('bootstrap', 'Code'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $this->Html->links('default', ['id' => 1]) ?></td>
                                    <td>echo $this->Html->links('default', ['id' => 1]);</td>
                                </tr>
                                <tr>
                                    <td><?= $this->Html->links('tree', ['id' => 1]) ?></td>
                                    <td>echo $this->Html->links('tree', ['id' => 1])</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __d('bootstrap', 'Actif & Principal'); ?></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table  class="table table-condensed table-striped" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?= __d('bootstrap', 'Results'); ?></th>
                                    <th><?= __d('bootstrap', 'Code'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php
                                    // print linksActives
                                    echo $this->Html->linksActives(true, 'my-id') . "<br />";
                                    ?></td>
                                    <td>echo $this->Html->linksActives(true, 'my-id')</td>
                                </tr>
                                <tr>
                                    <td><?php
                                    // print linksPrincipal
                                    echo $this->Html->linksPrincipal(true, 'my-id') . "<br />";
                                    ?></td>
                                    <td>echo $this->Html->linksPrincipal(true, 'my-id')</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php //Le Footer s'affiche ici ?>
        <?= $this->Html->footer(__d('bootstrap', 'My Website Name'), ['type' => 'static-bottom']); ?>

        <?php //Les scripts avec ['block' => 'scriptBottom'] s'afficheront ici ?>
        <?= $this->fetch('scriptBottom'); ?>
    </body>
</html>
