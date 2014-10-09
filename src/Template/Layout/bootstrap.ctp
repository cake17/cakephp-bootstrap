<?= $this->Html->docType(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?= $this->Html->charset() . "\n" ?>
		<title><?= $this->fetch('title') ?></title>
		<?= $this->Html->head() ?>

		<?php
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		?>
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
					<?= $this->Html->link($this->Html->image('favicon.png') . __(' Project Name'), ['/'], ['class' => 'navbar-brand', 'escape' => false]); ?>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><?= $this->Html->link(__("Nos Offres"), ['controller' => 'Pages', 'action' => 'offres']); ?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><?= $this->Html->link(__('Connexion'), ['plugin' => 'CakeWSUser', 'prefix' => false, 'controller' => 'Users', 'action' => 'login']); ?></li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="bootstrap-examples">
			<h2><?= __('Alerts'); ?></h2>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?= __('EXAMPLE'); ?></h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table  class="table table-condensed table-striped" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th><?= __('Results'); ?></th>
									<th><?= __('Code'); ?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= $this->Html->alert(__('This is an alert, "success" by default')); ?></td>
									<td><code>echo $this->Html->alert(__('This is an alert, "success" by default'))</code></td>
								</tr>
								<tr>
									<td><?= $this->Html->alert(__('This is an alert with option danger'), ['type' => 'danger']); ?></td>
									<td><code>echo $this->Html->alert(__('This is an alert with option danger'), ['type' => 'danger'])</code></td>
								</tr>
								<tr>
									<td><?= $this->Html->alert(__('This is an alert with option warning and dismissable'), ['type' => 'warning', 'dismissable' => true]); ?></td>
									<td><code>echo $this->Html->alert(__('This is an alert with option warning and dismissable'), ['type' => 'warning', 'dismissable' => true])</code></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<h2><?= __('Images & Icones'); ?></h2>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?= __('EXAMPLE'); ?></h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table  class="table table-condensed table-striped" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th><?= __('Results'); ?></th>
									<th><?= __('Code'); ?></th>
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

			<h2><?= __('Buttons, Labels & Badges'); ?></h2>
			<!--<h3><?= __('EXAMPLES of Buttons'); ?></h3>-->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?= __('Buttons'); ?></h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table  class="table table-condensed table-striped" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th><?= __('Results'); ?></th>
									<th><?= __('Code'); ?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php
									// print a button
									echo $this->Html->button(__('This is a button with default')) . "<br />";
									echo $this->Html->button(__('This is a button with option primary'), ['type' => 'primary']) . "<br />";
									echo $this->Html->button(__('This is a button with option danger and a class and id defined'), ['type' => 'danger', 'class' => 'my-class', 'id' => 'my-id']) . "<br />";
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
					<h3 class="panel-title"><?= __('Labels'); ?></h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table  class="table table-condensed table-striped" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th><?= __('Results'); ?></th>
									<th><?= __('Code'); ?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php
									// print a label
									echo $this->Html->label(__('This is a label with default'));
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
					<h3 class="panel-title"><?= __('Badges'); ?></h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table  class="table table-condensed table-striped" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th><?= __('Results'); ?></th>
									<th><?= __('Code'); ?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php
									// print a badge
									echo $this->Html->badge(__('This is a badge with default'));
									?></td>
								</tr>
								<tr>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<h3><?= __('Pagination'); ?></h3>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?= __('EXAMPLE'); ?></h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table  class="table table-condensed table-striped" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th><?= __('Results'); ?></th>
									<th><?= __('Code'); ?></th>
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

			<h2><?= __('Links'); ?></h2>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?= __('Link'); ?></h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table  class="table table-condensed table-striped" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th><?= __('Results'); ?></th>
									<th><?= __('Code'); ?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php
									// print a link
									echo $this->Html->link(__('My Link'), ['']) . "<br />";
									?></td>
									<td>echo $this->Html->link(__('My Link'), [''])</td>
								</tr>
								<tr>
									<td><?php
									// print a link
									echo $this->Html->link(__('My Link with active'), ['']) . "<br />";
									?></td>
									<td>echo $this->Html->link(__('My Link with active'), [''])</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?= __('Default & Tree'); ?></h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table  class="table table-condensed table-striped" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th><?= __('Results'); ?></th>
									<th><?= __('Code'); ?></th>
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
					<h3 class="panel-title"><?= __('Actif & Principal'); ?></h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table  class="table table-condensed table-striped" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th><?= __('Results'); ?></th>
									<th><?= __('Code'); ?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php
									// print links_actif
									echo $this->Html->links_actif(true, 'my-id') . "<br />";
									?></td>
									<td>echo $this->Html->links_actif(true, 'my-id')</td>
								</tr>
								<tr>
									<td><?php
									// print links_principal
									echo $this->Html->links_principal(true, 'my-id') . "<br />";
									?></td>
									<td>echo $this->Html->links_principal(true, 'my-id')</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<?php //Le Footer s'affiche ici ?>
		<?= $this->Html->footer(__('My Website Name'), ['type' => 'static-bottom']); ?>

		<?php //Les scripts avec ['block' => 'scriptBottom'] s'afficheront ici ?>
		<?= $this->fetch('scriptBottom'); ?>
	</body>
</html>
