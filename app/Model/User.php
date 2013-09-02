<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property Comment $Comment
 * @property Writing $Writing
 */
class User extends AppModel {
    public $displayField = 'username';

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
        'admin' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'username' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'password' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
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
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Comment' => array(
            'className' => 'Comment',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Writing' => array(
            'className' => 'Writing',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
		'Book'
    );

    public function beforeSave($options = array()) {
        if (isset($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        return true;
    }

}
