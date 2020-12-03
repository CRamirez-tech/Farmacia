<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pharmacy $pharmacy
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Pharmacies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pharmacies form content">
            <?= $this->Form->create($pharmacy) ?>
            <fieldset>
                <legend><?= __('Add Pharmacy') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('location_id', ['options' => $locations]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('address');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
