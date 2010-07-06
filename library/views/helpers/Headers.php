<?php

/**
 * @desc Returns common headers for this application
 *
 * @author Steven Rosato
 */
class MajistiT_View_Helper_Headers extends Zend_View_Helper_Abstract
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

        $view->headLink()->appendStylesheet(MAJ_STYLES . '/common-classes.css');
        $view->headLink()->appendStylesheet(APP_STYLES . '/default/default.css');
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
        $headers[] = $view->headTitle(APPLICATION_NAME);

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
