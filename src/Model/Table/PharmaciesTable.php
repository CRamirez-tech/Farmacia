<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pharmacies Model
 *
 * @property \App\Model\Table\CoordinatesTable&\Cake\ORM\Association\BelongsTo $Coordinates
 * @property \App\Model\Table\CommentsTable&\Cake\ORM\Association\HasMany $Comments
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $Products
 *
 * @method \App\Model\Entity\Pharmacy newEmptyEntity()
 * @method \App\Model\Entity\Pharmacy newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Pharmacy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pharmacy get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pharmacy findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Pharmacy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pharmacy[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pharmacy|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pharmacy saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pharmacy[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pharmacy[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pharmacy[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pharmacy[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PharmaciesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('pharmacies');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Coordinates', [
            'foreignKey' => 'coordinate_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'pharmacy_id',
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'pharmacy_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 20)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('address')
            ->maxLength('address', 30)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['coordinate_id'], 'Coordinates'), ['errorField' => 'coordinate_id']);

        return $rules;
    }
}
