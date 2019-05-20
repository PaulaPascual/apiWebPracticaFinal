<?php
/**
 * Created by PhpStorm.
 * User: Paula
 * Date: 07/05/2019
 * Time: 10:00
 */

namespace Project\Gallery;

use DateTime;
use Firebase\JWT\JWT;
use Project\Utils\ProjectDao;


class GalleryDao
{
    private $dbConnection;

    public function __construct(ProjectDao $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM GALLERY";
        return $this->dbConnection->fetchAll($sql);
    }

    public function getById($id)
    {
        $sql =  "SELECT * FROM GALLERY WHERE id = ?";
        return $this->dbConnection->fetch($sql, array($id));
    }

    public function delete($id){
        $sql = "DELETE FROM GALLERY WHERE id = ?";
        $this->dbConnection->execute($sql, array($id));
    }

    public function createImage($image)
    {
        $sql = "INSERT INTO GALLERY (image, tittle, size, description) VALUES (?, ?, ?, ?)";
        $id = $this->dbConnection->insert($sql, array($image['image'], $image['tittle'], $image['size'],$image['description'] ));
        $image = $this->getById($id);
        return $image;
    }

    public function updateImage($imageId, $image)
    {
        $sql = "UPDATE GALLERY SET tittle=?, size=?, description=? WHERE id = ? ";
        $this->dbConnection->execute($sql, array($image['tittle'], $image['size'],$image['description'], $imageId)); //tiene que tener el mismo orden que lo de arriba
        return $this->getById($imageId);
    }
}
