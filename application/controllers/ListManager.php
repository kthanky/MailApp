<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '../vendor/autoload.php';

/**
 * Controller ListManager is called for URL /listmanager/
 * It can handle GET,POST,DELETE Request
 */
class ListManager extends REST_Controller {


    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('ListManagerModel');
    }

    /**
     * This method is called when post request is sent on /listmanager/createlist
     * It calls the model ListManagerModel
     * It takes in 3 post parameters namely listname,description
     */
    public function createList_post()
    {
        $listname=$this->post('listname').MAILGUN_DOMAIN;
        $desc=$this->post('description');
        $result=$this->ListManagerModel->createUsingAPI($listname,$desc);
        $this->response($result);
    }
    /**
     * This method is called when get request is sent on /listmanager/getlist
     * It calls ListManagerModel
     */
    public function getList_get()
    {
        $result=$this->ListManagerModel->getList();
        $this->response($result);
    }
    /**
     * This method is called when delete request is sent on /listmanager/removelist
     * It calls ListManagerModel
     */
    public function removeList_delete()
    {
        $listAddress=$this->input->get_request_header('listName').MAILGUN_DOMAIN;
        $result=$this->ListManagerModel->deleteList($listAddress);
        $this->response($result);
    }
}
