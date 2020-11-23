<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coordinate[]|\Cake\Collection\CollectionInterface $coordinates
 */
?>
<div class="coordinates index content">
    <?= $this->Html->link(__('New Coordinate'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Coordinates') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('latitude') ?></th>
                    <th><?= $this->Paginator->sort('length') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($coordinates as $coordinate): ?>
                <tr>
                    <td><?= $this->Number->format($coordinate->id) ?></td>
                    <td><?= $this->Number->format($coordinate->latitude) ?></td>
                    <td><?= $this->Number->format($coordinate->length) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $coordinate->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $coordinate->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $coordinate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coordinate->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
