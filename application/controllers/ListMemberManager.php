<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '../vendor/autoload.php';

/**
 * Controller ListManager is called for URL /listmanager/
 * It can handle GET,POST,DELETE,PUT Request
 */
class ListMemberManager extends REST_Controller {


    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('ListMemberManagerModel');
    }

    /**
     * This method is called when post request is sent on /listmembermanager/addmember
     * It calls the model ListManagerModel
     * It takes in 5 post parameters namely listname,useraddress,username,desc,age
     */
    public function addMember_post()
    {
        $listAddress=$this->post('listname').MAILGUN_DOMAIN;
        $useraddress=$this->post('useraddress');
        $username=$this->post('username');
        $description=$this->post('desc');
        $age=$this->post('age');
        $result=$this->ListMemberManagerModel->addingUsingAPI($listAddress,$useraddress,$username,$description,$age);
        $this->response($result);
    }
    /**
     * This method is called when get request is sent on /listmembermanager/getmembers
     * It calls ListMemberManagerModel
     */
    public function getMembers_get()
    {
        $listAddress=$this->get('listname').MAILGUN_DOMAIN;
        $result=$this->ListMemberManagerModel->getMembers($listAddress);
        $this->response($result);
    }
    /**
     * This method is called when delete request is sent on /listmembermanager/removemember
     * It calls ListMemberManagerModel
     */
    public function removeMember_delete()
    {
        $listAddress=$this->input->get_request_header('listname').MAILGUN_DOMAIN;
        $memberaddress=$this->input->get_request_header('useraddress');
        $result=$this->ListMemberManagerModel->deleteMember($listAddress,$memberaddress);
        $this->response($result);
    }
    /**
     * This method is called when put request is sent on /listmembermanager/editmember
     * It calls ListMemberManagerModel
     */
    public function editMember_put()
    {
        $data = json_decode(file_get_contents("php://input"));
        $listAddress=$data->listname.MAILGUN_DOMAIN;
        $useraddress=$data->useraddress;
        $username=$data->username;
        $description=$data->desc;
        $age=$data->age;
        $subscribe=$data->subscribe;
        $result=$this->ListMemberManagerModel->editingMember($listAddress,$useraddress,$subscribe,$username,$description,$age);
        $this->response($result);
    }
}
