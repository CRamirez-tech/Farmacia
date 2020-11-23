<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pharmacy[]|\Cake\Collection\CollectionInterface $pharmacies
 */
?>
<div class="pharmacies index content">
    <?= $this->Html->link(__('New Pharmacy'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pharmacies') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('coordinate_id') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pharmacies as $pharmacy): ?>
                <tr>
                    <td><?= $this->Number->format($pharmacy->id) ?></td>
                    <td><?= h($pharmacy->name) ?></td>
                    <td><?= $pharmacy->has('coordinate') ? $this->Html->link($pharmacy->coordinate->id, ['controller' => 'Coordinates', 'action' => 'view', $pharmacy->coordinate->id]) : '' ?></td>
                    <td><?= h($pharmacy->address) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pharmacy->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pharmacy->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pharmacy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacy->id)]) ?>
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
