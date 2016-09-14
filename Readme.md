#Mailing List Management ReST API
*   This ReST API deals with providing endpoints for Mailgun API
*   The Backend ReST API is done using Codeigniter Framework PHP.
*   The Documentation for [Mailgun API](https://documentation.mailgun.com)
*   The Documentation for [Codeigniter Framework](http://www.codeigniter.com/user_guide/)
*   Those who wish you to use the API will need to add there MailGun API Details in Config/Constants.php file

    ##How To Use It
    #####There are 3 main functions namely
    *       Sending Mail(application/controllers/SendMail)
    *       Management of Different Lists(application/controllers/ListManager)
    *       Management of Members in Lists(application/controllers/ListMemberManager)
    
    
        ##Sending Mail
            This controller calls the model SendingMailModel
        *   POST Request-The endpoint for sending mail is  sendmail/sending( params-emailto,subject,mailbody)
        
        ##Management of List
            This controller calls the model ListManagerModel
        *   GET Request- The endpoint for getting all requests is listmanager/getlist
        *   POST Request- The endpoint for adding a new list is listmanager/createlist( params-listname,description)
        *   DELETE Request- The endpoint for removing a list is listmanager/removelist( params-listname)
        
        ##Management of Members of List
            This contoller calls the model ListMemberManagerModel
        *   GET Request- The endpoint for getting all members of a list is listmembermanager/getmembers( params-listname)
        *   POST Request- The endpoint for adding a new member to a particular list is listmembermanager/addmember  (params-listname,useraddress,username,description,age)
        *   PUT Request- The endpoint for editing a particular member of a particular list is listmembermanager/editmember(params-listname,useraddress,subscribe,username,description,age)
        *   DELETE Request- The endpoint for deleting a particular member of a particular list is listmembermanager/deletemember( params-listname,useraddress)
