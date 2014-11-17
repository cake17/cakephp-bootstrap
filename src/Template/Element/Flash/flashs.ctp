<?= $this->Flash->render() ?>
<?= $this->Flash->render('success', [
        'element' => 'Bootstrap.Flash/success'
]) ?>
<?= $this->Flash->render('error', [
        'element' => 'Bootstrap.Flash/error'
]) ?>
<?= $this->Flash->render('info', [
        'element' => 'Bootstrap.Flash/info'
]) ?>
<?= $this->Flash->render('warning', [
        'element' => 'Bootstrap.Flash/warning'
]) ?>
