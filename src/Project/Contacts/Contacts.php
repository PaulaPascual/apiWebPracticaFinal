<?php
/**
 * Created by PhpStorm.
 * User: Paula
 * Date: 14/05/2019
 * Time: 12:12
 */

namespace Project\Contacts;


class Contacts
{
    public $id;
    public $name;
    public $mail;
    public $data;
    public function __construct($id, $name, $mail, $data)
    {
        $this->id = $id;
        $this->name = $name;
        $this->mail = $mail;
        $this->data = $data;
    }
}

