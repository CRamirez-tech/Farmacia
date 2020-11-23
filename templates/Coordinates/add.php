<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coordinate $coordinate
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Coordinates'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="coordinates form content">
            <?= $this->Form->create($coordinate) ?>
            <fieldset>
                <legend><?= __('Add Coordinate') ?></legend>
                <?php
                    echo $this->Form->control('latitude');
                    echo $this->Form->control('length');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
