<?php

App::uses('AppModel', 'Model');

/**
 * Category Model
 *
 * @property Writing $Writing
 */
class Category extends AppModel {

	public $displayField = 'Category';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'Writing' => array(
			'className' => 'Writing',
			'foreignKey' => 'category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
