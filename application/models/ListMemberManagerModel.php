<?php

/**
 * Model ListMemberManagerModel will be used to manage list members
 */
class ListMemberManagerModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /**
     * This function adds new member to specified list using MailGun API
     * @param $listAddress
     * @param $useraddress
     * @param $username
     * @param $description
     * @param $age
     * @return JSON
     */
    public function addingUsingAPI($listAddress,$useraddress,$username,$description,$age)
    {
        $client = new \GuzzleHttp\Client([
            'verify' => false,
        ]);
        $adapter = new \Http\Adapter\Guzzle6\Client($client);
        $mgClient = new \Mailgun\Mailgun(MAILGUN_APIKEY, $adapter);
        $varsarray=array('age' => $age);
        $varsarray=json_encode($varsarray);
        $result = $mgClient->post("lists/$listAddress/members", array(
            'address'     => $useraddress,
            'name'        => $username,
            'description' => $description,
            'subscribed'  => true,
            'vars'        => $varsarray
        ));
        return $result;
    }
    /**
     *This function gets all members in a list
     * @param $listAddress
     * @return JSON
     */
    public function getMembers($listAddress)
    {
        $client = new \GuzzleHttp\Client([
            'verify' => false,
        ]);
        $adapter = new \Http\Adapter\Guzzle6\Client($client);
        $mgClient = new \Mailgun\Mailgun(MAILGUN_APIKEY, $adapter);
        $result = $mgClient->get("lists/$listAddress/members/pages", array());
        return $result;
    }

    /**
     *This function deletes a particular member from a particular mailing list
     * @param $listAddress
     * @param $memberaddress
     * @return JSON
     */
    public function deleteMember($listAddress,$memberaddress)
    {
        $client = new \GuzzleHttp\Client([
            'verify' => false,
        ]);
        $adapter = new \Http\Adapter\Guzzle6\Client($client);
        $mgClient = new \Mailgun\Mailgun(MAILGUN_APIKEY, $adapter);
        $result = $mgClient->delete("lists/$listAddress/members/$memberaddress");
        return $result;
    }
    /**
     * This function edits a particular member of a particular mailing list
     * @param $listAddress
     * @param $useraddress
     * @param $subscribe
     * @param $username
     * @param $description
     * @param $age
     * @return JSON
     */
    public function editingMember($listAddress,$useraddress,$subscribe,$username,$description,$age)
    {
        $client = new \GuzzleHttp\Client([
            'verify' => false,
        ]);
        $adapter = new \Http\Adapter\Guzzle6\Client($client);
        $mgClient = new \Mailgun\Mailgun(MAILGUN_APIKEY, $adapter);
        $varsarray=array('age' => $age);
        $varsarray=json_encode($varsarray);
        $result = $mgClient->put("lists/$listAddress/members/$useraddress", array(
            'subscribed' => $subscribe,
            'name'       => $username,
            'description' => $description,
            'vars' => $varsarray
        ));

    }
}
?>