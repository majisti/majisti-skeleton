<?php

namespace MajistiT\View\Helper;

/**
 * @desc Returns common headers for this application
 *
 * @author Steven Rosato
 */
class Headers extends \Zend_View_Helper_Abstract
{
    /**
     * @desc Returns the common headers for this application
     *
     * @return output
     */
    public function headers()
    {
        return $this;
    }

    public function prepare()
    {
        $view = $this->view;

        $view->headLink()->appendStylesheet(MA_URL . '/styles/common.css');
        $view->headLink()->appendStylesheet(MA_APP_BASEURL . '/styles/default/default.css');
    }

    public function toString()
    {
        $view = $this->view;

        /* headers */
        $headers = array();
        $headers[] = $view->headMeta()->toString();
        $headers[] = $view->headLink()->toString();
        $headers[] = $view->headStyle()->toString();
        $headers[] = trim($view->jQuery(), PHP_EOL);
        $headers[] = $view->headScript()->toString();
        $headers[] = $view->headTitle(MA_APP_NS);

        /* append PHP_EOL on non empty strings */
        $output = '';
        foreach ($headers as $header) {
            $output .= $header;

        	if( !empty($header) ) {
        	    $output .= str_repeat(PHP_EOL, 2);
        	}
        }

        return $output;
    }

    public function __toString()
    {
        return $this->toString();
    }
}
