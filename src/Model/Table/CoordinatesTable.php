<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Coordinates Model
 *
 * @property \App\Model\Table\PharmaciesTable&\Cake\ORM\Association\HasMany $Pharmacies
 *
 * @method \App\Model\Entity\Coordinate newEmptyEntity()
 * @method \App\Model\Entity\Coordinate newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Coordinate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Coordinate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Coordinate findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Coordinate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Coordinate[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Coordinate|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Coordinate saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Coordinate[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Coordinate[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Coordinate[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Coordinate[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CoordinatesTable extends Table
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

        $this->setTable('coordinates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Pharmacies', [
            'foreignKey' => 'coordinate_id',
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
            ->numeric('latitude')
            ->requirePresence('latitude', 'create')
            ->notEmptyString('latitude');

        $validator
            ->numeric('length')
            ->requirePresence('length', 'create')
            ->notEmptyString('length');

        return $validator;
    }
}
