<?php
/**
 * Created by PhpStorm.
 * User: Paula
 * Date: 07/05/2019
 * Time: 10:00
 */

namespace Project\Gallery;


class Gallery
{
    public $id;
    public $image;
    public $tittle;
    public $size;
    public $description;
    public function __construct($id, $image, $tittle, $size, $description)
    {
        $this->id = $id;
        $this->image = $image;
        $this->tittle = $tittle;
        $this->size=$size;
        $this->description=$description;
    }
}
