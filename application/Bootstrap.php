<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function init()
    {
        define('LOCALHOST', "127.0.0.1");
        define('ADMIN_EMAIL', "skachkov@guns.ru");
        define('SHELL_PATH', "/home/vlad/nsc2010/public/shell/");
    }
    protected function _initAutoload()
    {
        Zend_Controller_Action_HelperBroker::addPrefix("Custom_Action_Helper");
        Zend_Controller_Action_HelperBroker::addPath(APPLICATION_PATH."/../library/Custom/Action", 'Validate_Helper');

        // Add autoloader empty namespace
        $autoLoader = Zend_Loader_Autoloader::getInstance();
        $autoLoader->registerNamespace('NSC_');
        $resourceLoader = new Zend_Loader_Autoloader_Resource(array
            ('basePath' => APPLICATION_PATH."/modules/company",
             'namespace' => 'company_',
             'resourceTypes' => array(
                 'form' => array(
                     'path' => 'forms/',
                     'namespace' => 'Form_'
                 ),
                 'model' => array(
                     'path' => 'models/',
                     'namespace' => 'Model_'
                 )
             )
        ));
        // Return it so that it can be stored by the bootstrap
        return $autoLoader;
    }

    /**
     * @author Andriy Ilnytskyi 05.11.2010
     *
     * Add header DocType to the app.
     */
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
        $view->addHelperPath(APPLICATION_PATH."/../library/Custom/View/Helper/", 'Custom_View_Helper');

        // Set encrypt key to crypt password
        // TODO decide place where it should set in right way.
        Zend_Registry::set('key_str', 'Nsc2oooH41');
    }




}

