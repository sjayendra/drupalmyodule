<?php

namespace Drupal\rmodule\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\RedirectResponse;  


class rmodule_ex3_Form extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'rmodule_ex3_Form';
  }

  /**
   * {@inheritdoc}
   */
public function buildForm(array $form, FormStateInterface $form_state) {
   
	$form['ex_text'] = array(
		'#type' => 'textfield',
		'#title' => t('Example Textfield'),
		'#default_value' => 'some text',
	);	
	
	$form['form_item'] = array(
		'#type' => 'textfield',
		'#title' => t('My Form Item'),
		'#prefix' => '<a name="my_form_item"></a>', // Add markup before form item
	);
	
	$form['group1'] = array(
		'#type' => 'fieldset',
		'#title' => t('Your Name'),
		'#collapsible' => FALSE,
		'#collapsed' => FALSE,  
	);
	
	$form['group1']['first_name'] = array(
		'#type' => 'textfield',
		'#title' => t('First Name'),
	);

	$form['group1']['last_name'] = array(
		'#type' => 'textfield',
		'#title' => t('Last Name'),
	);
	
	$form['my_button'] = array(
		'#type' => 'submit',
		'#value' => t('Perform Action'),
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
	//$form_state->setRedirect('/drupal2/ex2');
	
	$dest_url = "/ex2";
	$url = Url::fromUri('internal:' . $dest_url );
	//$form_state->setRedirectUrl( $url );
	
	// query string
	$path_param = [
		'abc' => '113',
		'xyz' => 'abc',
	];
	
	$params['query'] = [
            'abc' => 'xyz',
        ];
	// use below if you have to redirect on your known url
	//$url = Url::fromUserInput($path, ['query' => $path_param]);
	#$form_state->setRedirectUrl($url,['query' => $path_param]);  //working
	//$form_state->setRedirectUrl($url,array('query' => array('abc' => 'me2222345')));  //testing
	
	//$url = Url::fromRoute('/drupal2/ex2');
    //$query = [
	//	'query' => [
//		'abc' => 'abc',
//		'xys'      => 'xyz',
//	],
// ];
  
  
  $query = [
		'abc' => 'abc',
		'xyz'      => 'xyz',
	];
  
  $path = $url->setOption('query', $query);
  $path = $path->toString();

  $response = new RedirectResponse($path);
  $response->send();
	
	
	
	
	
	 

}
}
