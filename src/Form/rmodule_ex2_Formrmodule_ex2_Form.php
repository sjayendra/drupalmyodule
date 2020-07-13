<?php

namespace Drupal\rmodule\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;


class rmodule_ex2_Form extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'rmodule_ex1_Form';
  }

  /**
   * {@inheritdoc}
   */
public function buildForm(array $form, FormStateInterface $form_state) {
   
	$form['ex_text'] = array(
		'#type' => 'textfield',
		'#title' => t('Example Textfield2'),
		'#default_value' => 'some text222',
	);	
	
	$form['form_item'] = array(
		'#type' => 'textfield',
		'#title' => t('My Form Item22'),
		'#prefix' => '<a name="my_form_item"></a>', // Add markup before form item
	);
	
	$form['group1'] = array(
		'#type' => 'fieldset',
		'#title' => t('Your Name2'),
		'#collapsible' => FALSE,
		'#collapsed' => FALSE,  
	);
	
	$form['group1']['first_name'] = array(
		'#type' => 'textfield',
		'#title' => t('First Name2'),
	);

	$form['group1']['last_name'] = array(
		'#type' => 'textfield',
		'#title' => t('Last Name'),
	);
	
	$form['my_button'] = array(
		'#type' => 'submit',
		'#value' => t('Perform Action2'),
	);
  
  
  return $form;
}

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form,  FormStateInterface $form_state) {
    
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form,  FormStateInterface $form_state) {
    // Submission covered in later recipe, required to satisfy interface
	 $form_state->setRedirect('\Drupal\rmodule\Form\rmodule_ex1_Form');
 return;
  }
}
