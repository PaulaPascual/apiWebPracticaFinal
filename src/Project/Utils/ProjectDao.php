<?php
/**
 * Created by PhpStorm.
 * User: Paula
 * Date: 19/03/2019
 * Time: 9:17
 */
namespace Project\Utils;

interface ProjectDao
{
    public function fetchAll($sql, $params = null);
    public function fetch($sql, $params = null);
    public function execute($sql, $params = null);
    public function insert($sql, $params = null);
}
