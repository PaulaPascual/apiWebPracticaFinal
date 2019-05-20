<?php

use Project\Users\UsersController;
use Project\Gallery\GalleryController;
use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$authentication = $app->getContainer()->get('authentication');


$app->get('/gallery', GalleryController::class.':getAll');
$app->post('/admi', GalleryController::class . ':createImage');
$app->get('/gallery/{id}', GalleryController::class . ':getImageById');
$app->delete('/gallery/{id}',GalleryController::class . ':deleteImage');
$app->put('/gallery/{id}', GalleryController::class . ':updateImage');

$app->post('/login', UsersController::class . ':loginUser');

$app->post('/contact', \Project\Contacts\ContactsController::class.':createContact');

