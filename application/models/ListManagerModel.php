<?php

/**
 * Model ListManagerModel will be used to manage different lists
 */
class ListManagerModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /**
     * This function creates a mailing List Using MailGun API
     * @param $listname
     * @param $desc
     * @return JSON
     */
    public function createUsingAPI($listname,$desc)
    {
        $client = new \GuzzleHttp\Client([
            'verify' => false,
        ]);
        $adapter = new \Http\Adapter\Guzzle6\Client($client);
        $mgClient = new \Mailgun\Mailgun(MAILGUN_APIKEY, $adapter);
        $result = $mgClient->post("lists", array(
            'address'     => $listname,
            'description' => $desc
        ));
        return $result;
    }
    /**
     *This function gets the list of all mailing list
     * @return JSON
     */
    public function getList()
    {
        $client = new \GuzzleHttp\Client([
            'verify' => false,
        ]);
        $adapter = new \Http\Adapter\Guzzle6\Client($client);
        $mgClient = new \Mailgun\Mailgun(MAILGUN_APIKEY, $adapter);
        $result = $mgClient->get("lists/pages", array());
        return $result;
    }

    /**
     *This function deletes a particular mailing list
     * @param $listAddress
     * @return JSON
     */
    public function deleteList($listAddress)
    {
        $client = new \GuzzleHttp\Client([
            'verify' => false,
        ]);
        $adapter = new \Http\Adapter\Guzzle6\Client($client);
        $mgClient = new \Mailgun\Mailgun(MAILGUN_APIKEY, $adapter);
        $result = $mgClient->delete("lists/$listAddress");
        return $result;
    }

}
?>