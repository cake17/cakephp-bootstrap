<?= $this->Html->docType(); ?>
<html>

    <head>

        <?= $this->Html->charset() . "\n" ?>
        <title><?= $this->fetch('title') ?></title>
        <?= $this->Html->head() ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>

    </head>

    <body>

        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>

    </body>

</html>
