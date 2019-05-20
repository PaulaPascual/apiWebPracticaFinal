<?php
/**
 * Created by PhpStorm.
 * User: Paula
 * Date: 05/03/2019
 * Time: 10:12
 */
namespace Project\Users;

class User
{
    public $id;
    public $password;
    public function __construct($id, $password)
    {
        $this->id = $id;
        $this->password = $password;
    }
}
