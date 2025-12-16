<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PropertiesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
		$this->addBehavior('Timestamp');
        $this->hasMany('PropertyPhotos', [
            'dependent' => true
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        return $validator
            ->notEmptyString('title')
            ->numeric('price');
    }
}
