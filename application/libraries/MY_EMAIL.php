<?php
/**
 * Created by PhpStorm.
 * User: Kunal
 * Date: 8/12/2016
 * Time: 8:13 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_EMAIL extends CI_Email {

    public function __construct($config = array())
    {
        if (count($config) > 0)
        {
            $this->initialize($config);
        }
        else
        {
            $this->_smtp_auth = ($this->smtp_user == '' AND $this->smtp_pass == '') ? FALSE : TRUE;
            $this->_safe_mode = ((boolean)@ini_get("safe_mode") === FALSE) ? FALSE : TRUE;
        }

        log_message('debug', "Email Class Initialized");
    }

    // this will allow us to add headers whenever we need them
    public function set_header($header, $value)
    {
        $this->_headers[$header] = $value;
    }
}