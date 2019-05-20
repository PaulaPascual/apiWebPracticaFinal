<?php
/**
 * Created by PhpStorm.
 * User: Paula
 * Date: 14/05/2019
 * Time: 12:13
 */

namespace Project\Contacts;

use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class ContactsController
{
    private $dao;

    public function __construct(ContainerInterface $container)
    {
        $this->dao = new ContactsDao($container['dbConnection']);
    }

    function getAll(Request $request, Response $response, array $args)
    {
        $users = $this->dao->getAll();
        return $response->withJson($users);
    }

    function getContactById(Request $request, Response $response, array $args)
    {
        $user = $this->dao->getById($args['id']);
        return $response->withJson($user);
    }

    function createContact(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $user = $this->dao->createContact($body);
        return $response->withJson($user);
    }

}
