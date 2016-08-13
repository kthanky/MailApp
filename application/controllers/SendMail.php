<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '../vendor/autoload.php';

/**
 * Controller SendMail is called for URL /sendmail/
 */
class SendMail extends REST_Controller {


    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('SendingMailModel');
    }

    /**
     * This method is called when post request is sent on /sendmail/sending
     * It calls the model SendingMailModel
     * It takes in 3 post parameters namely emailto,subject,mailbody
     */
    public function sending_post()
    {
        $emailto=$this->post('emailto');
        $subject=$this->post('subject');
        $mailbody=$this->post('mailbody');
        $result=$this->SendingMailModel->sendUsingSMTP($emailto,$subject,$mailbody);
        $response_arr=array();
        $response_arr['message']=$result;
        $response_arr['status_code']=200;
        $this->response($response_arr);

    }
}
