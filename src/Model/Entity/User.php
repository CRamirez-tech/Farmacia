<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenDate $date_born
 * @property string $bill
 * @property string $password
 * @property int $rol_id
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Comment[] $comments
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'date_born' => true,
        'bill' => true,
        'password' => true,
        'rol_id' => true,
        'role' => true,
        'comments' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
