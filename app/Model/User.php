<?php

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel{

	public $name = 'User';

	public function beforeSave($options = array()){
		if(isset($this->data[$this->alias]['password'])){
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
		}
		return true;
	}

	public $validate = array(
		'first_name' => array(
			'alphaNmeric' => array(
				'rule' => 'alphaNumeric',
				'required' => true,
				'message' => 'letters and numbers only'
			),
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'please enter your first name'
			)
		),
		'last_name' => array(
			'alphaNmeric' => array(
				'rule' => 'alphaNumeric',
				'required' => true,
				'message' => 'letters and numbers only'
			),
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'please enter your last name'
			)
		),
		'email' => array(
			'email' => array(
				'rule' => 'email',
				'required' => true,
				'message' => 'please enter an email address'
			),
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'please enter an email address'
			)
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'please enter a password'
			)
		),
		'confirm_password' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'please enter a password'
			),
			'matchPasswords' => array(
				'rule' => array('identicalFieldValues', 'password'),
				'message' => 'your passwords do not match'
			)
		)
	);

   /*
	* custom Validation - match field values
	*/
	function identicalFieldValues( $field = array(), $compare_field = null ){
		foreach($field as $key => $value){
			$v1 = $value;
			$v2 = $this->data[$this->name][$compare_field];
			if($v1 !== $v2){
				return FALSE;
			} else {
				continue;
			}
		}
		return TRUE;
	}
}