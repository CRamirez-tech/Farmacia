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
            <?= $this->Html->link(__('Edit Pharmacy'), ['action' => 'edit', $pharmacy->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pharmacy'), ['action' => 'delete', $pharmacy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacy->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pharmacies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pharmacy'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pharmacies view content">
            <h3><?= h($pharmacy->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($pharmacy->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Location') ?></th>
                    <td><?= $pharmacy->has('location') ? $this->Html->link($pharmacy->location->id, ['controller' => 'Locations', 'action' => 'view', $pharmacy->location->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $pharmacy->has('user') ? $this->Html->link($pharmacy->user->name, ['controller' => 'Users', 'action' => 'view', $pharmacy->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($pharmacy->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pharmacy->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Comments') ?></h4>
                <?php if (!empty($pharmacy->comments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Comentario') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('State') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Pharmacy Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pharmacy->comments as $comments) : ?>
                        <tr>
                            <td><?= h($comments->id) ?></td>
                            <td><?= h($comments->Comentario) ?></td>
                            <td><?= h($comments->date) ?></td>
                            <td><?= h($comments->state) ?></td>
                            <td><?= h($comments->user_id) ?></td>
                            <td><?= h($comments->pharmacy_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comments->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comments->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Products') ?></h4>
                <?php if (!empty($pharmacy->products)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Pharmacy Id') ?></th>
                            <th><?= __('Mark') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Due Date') ?></th>
                            <th><?= __('Presentation') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pharmacy->products as $products) : ?>
                        <tr>
                            <td><?= h($products->id) ?></td>
                            <td><?= h($products->name) ?></td>
                            <td><?= h($products->price) ?></td>
                            <td><?= h($products->amount) ?></td>
                            <td><?= h($products->pharmacy_id) ?></td>
                            <td><?= h($products->mark) ?></td>
                            <td><?= h($products->Type) ?></td>
                            <td><?= h($products->due_date) ?></td>
                            <td><?= h($products->presentation) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
