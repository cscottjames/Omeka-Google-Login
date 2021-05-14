<?php

class GoogleLoginPlugin extends Omeka_Plugin_AbstractPlugin {

    protected $_hooks = array(
		'config_form',
        'config'
	);

    protected $_filters = array(
        'login_form',
        'login_adapter'
    );

    protected $_options = array(
		'client-id' => ""
    );

    public function hookConfigForm()
	{
		require dirname(__FILE__) . '/config_form.php';
	}

    public function hookConfig()
	{
		set_option('client-id', $_POST['client-id']);
	}

    public function filterLoginForm($form) {
        queue_js_file('scripts','../../../plugins/GoogleLogin');
        echo "<style>.abcRioButton {margin: 0 auto} #forgotpassword {display:none}</style>";
        $newForm = new Omeka_Form();
        $newForm->setMethod('post');
        $newForm->setAttrib('id', 'login-form');
        $newForm->addElement('hidden', 'username');
        $newForm->addElement('hidden', 'password');
        $newForm->addElement('hidden', 'clientid', array('value' => get_option('client-id')));
        return $newForm;
    }

    public function filterLoginAdapter($adapter, $args) {       
        $form = $args['login_form'];
        $adapter->setCredentialColumn('email');
        $adapter->setCredentialTreatment('active = 1');
        return $adapter
        ->setIdentity($form->getValue('username'))
        ->setCredential($form->getValue('password'));
    }

}