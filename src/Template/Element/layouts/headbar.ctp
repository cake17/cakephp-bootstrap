<?php $this->start('headbar'); ?>
  <?= $this->fetch('headbar') ?>
  <ol class="breadcrumb">

    <?php $defaultLinks = []; ?>
    <?php if (isset($wantsDefaultLinks) && is_bool($wantsDefaultLinks) && $wantsDefaultLinks): ?>
        <?php switch ($this->request->action) {
          case 'edit':
            $defaultLinks = [
                $this->Html->link('Back', ['action' => 'index'])
            ];
            break;

          case 'view':
            $defaultLinks = [
                $this->Html->link('Back', ['action' => 'index']),
                $this->Html->link('Edit', ['action' => 'edit', $id]),
            ];
            break;

          case 'add':
            $defaultLinks = [
                $this->Html->link('Back', ['action' => 'index']),
            ];
            break;

          case 'index':
            $defaultLinks = [
                $this->Html->link('Add', ['action' => 'add']),
            ];
            break;

          default:
            break;
        } ?>
    <?php endif; ?>

    <?php if ((isset($links) && !empty($links) && is_array($links)) || (isset($defaultLinks) && !empty($defaultLinks) && is_array($defaultLinks))): ?>
    <li>
      <div class="btn-group btn-group-xs">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Actions <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">

          <?php if (isset($defaultLinks) && !empty($defaultLinks) && is_array($defaultLinks)): ?>
          <?php foreach ($defaultLinks as $link): ?>
          <li><?= $link ?></li>
          <?php endforeach ?>
          <?php endif; ?>

          <?php if (isset($links) && !empty($links) && is_array($links)): ?>
          <?php foreach ($links as $link): ?>
          <li><?= $link ?></li>
          <?php endforeach ?>
          <?php endif; ?>

        </ul>
      </div>
    </li>
    <?php endif; ?>

    <?php if (isset($breadcrumb) && !empty($breadcrumb) && is_array($breadcrumb)): ?>

      <?php if (isset($home) && !empty($home) && is_bool($home)): ?>
        <?= '<li>' . $homeLink . '</li>' ?>
      <?php endif; ?>

      <?php foreach ($breadcrumb as $li): ?>
        <?= $li ?>
      <?php endforeach ?>

    <?php endif; ?>
  </ol>
<?php $this->end(); ?>
