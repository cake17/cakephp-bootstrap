<?= $this->Html->docType(); ?>
<html>
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
