<?php

class MajistiW_Plugin_Main extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
    }

    public function getView()
    {
        return Zend_Controller_Action_HelperBroker
            ::getStaticHelper('viewRenderer')->view;
    }
}
