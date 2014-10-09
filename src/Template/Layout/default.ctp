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
	</body>
</html>
