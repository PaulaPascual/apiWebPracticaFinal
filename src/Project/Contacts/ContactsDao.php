<?php
/**
 * Created by PhpStorm.
 * User: Paula
 * Date: 14/05/2019
 * Time: 12:13
 */

namespace Project\Contacts;


use Project\Utils\ProjectDao;

class ContactsDao
{
    private $dbConnection;

    public function __construct(ProjectDao $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM CONTACTS";
        return $this->dbConnection->fetchAll($sql);
    }

    public function getById($id)
    {
        $sql =  "SELECT * FROM CONTACTS WHERE id = ?";
        return $this->dbConnection->fetch($sql, array($id));
    }

    public function createContact($contact)
    {
        $sql = "INSERT INTO CONTACTS (name, mail, data) VALUES (?, ?, ?)";
        $id = $this->dbConnection->insert($sql, array($contact['name'], $contact['mail'], $contact['data']));
        $contact = $this->getById($id);
        return $contact;
    }

}
