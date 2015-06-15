<?php
namespace Users\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class RegisterForm extends Form
{
	public function __construct($name = null)
	{
		$button = new Element\Button('submit');
		$button->setLabel('Submit')
			->setValue('submit');

		parent::__construct('Register');
		$this->setAttribute('method','post');
		$this->setAttribute('enctype','multipart/form-data');

		//Full Name Field
		$this->add(array(
			'name' => 'name',
			'attribute' => array(
				'type' => 'text',
			),
			'options' => array(
				'label' => 'Full Name',
			),
		));

		//email field
		$this->add(array(
			'name' => 'email',
			'attribute' => array(
				'type' => 'email',
			),
			'options' => array(
				'label' => 'Email',
			),
			'attributes' => array(
				'required'=> 'required',
			),
			'filters' => array(
				array('name' => 'StringTrim'),
			),
			'validators' => array(
				array(
					'name'=>'EmailAddress',
					'options' => array(
						'messages'=>array(
							\Zend\Validator\EmailAddress::INVALID_FORMAT => 'Email Address format is invalid'
						)
					)
				),
			),
		));

		//password field
		$this->add(array(
			'name' => 'password',
			'attribute' => array(
				'type' => 'password',
			),
			'options' => array(
				'label' => 'Password',
			),
		));

		//confirm field
		$this->add(array(
			'name' => 'confirm_password',
			'attribute' => array(
				'type' => 'password',
			),
			'options' => array(
				'label' 	 => 'Confirm Password',
			),
		));

		$this->add($button);


	}
}