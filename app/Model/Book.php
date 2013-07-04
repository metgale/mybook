<?php

App::uses('AppModel', 'Model');

/**
 * Book Model
 *
 * @property User $User
 * @property Category $Category
 * @property Writing $Writing
 */
class Book extends AppModel {

	public $displayField = 'title';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'image' => array(
			'extension' => array(
				'rule' => array(
					'extension', array(
						'jpg',
						'jpeg',
						'bmp',
						'gif',
						'png',
						'jpg'
					)
				),
				'message' => 'File extension is not supported',
				'on' => 'create'
			),
			'mime' => array(
				'rule' => array('mime', array(
						'image/jpeg',
						'image/pjpeg',
						'image/bmp',
						'image/x-ms-bmp',
						'image/gif',
						'image/png'
					)),
				'on' => 'create'
			),
			'size' => array(
				'rule' => array('size', 2097152),
				'on' => 'create'
			)
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			//'message' => 'Your custom message here',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			//'message' => 'Your custom message here',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'category_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			//'message' => 'Your custom message here',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
	public $actsAs = array(
		'Attach.Upload' => array(
			'image' => array(
				'dir' => 'webroot{DS}img{DS}covers',
				'thumbs' => array(
					'thumb' => array(
						'w' => 85,
						'h' => 100,
						'crop' => true,
					),
				),
				'large' => array(
					'w' => 200,
					'h' => 160,
					'crop' => true,
				),
			),
		)
	);



	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'Writing' => array(
			'className' => 'Writing',
			'foreignKey' => 'book_id',
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
