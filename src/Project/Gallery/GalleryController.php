<?php
/**
 * Created by PhpStorm.
 * User: Paula
 * Date: 07/05/2019
 * Time: 10:00
 */

namespace Project\Gallery;

use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;


class GalleryController
{
    private $dao;

    public function __construct(ContainerInterface $container)
    {
        $this->dao = new GalleryDao($container['dbConnection']);
    }

    function getAll(Request $request, Response $response, array $args)
    {
        $image = $this->dao->getAll();
        return $response->withJson($image);
    }

    function getImageById(Request $request, Response $response, array $args)
    {
        $image = $this->dao->getById($args['id']);
        return $response->withJson($image);
    }

    function deleteImage(Request $request, Response $response, array $args)
    {
        $imageId = $args['id'];
        $this->dao->delete($imageId);
        return $response->withStatus(201);
    }

    function createImage(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $image = $this->dao->createImage($body);
        return $response->withJson($image);
    }

    function updateImage(Request $request, Response $response, array $args)
    {
        $imageId = $args['id'];
        $body = $request->getParsedBody();
        $image = $this->dao->updateImage($imageId, $body);
        return $response->withJson($image);
    }
}
