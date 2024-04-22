<?php

namespace App\Routes;

require_once __DIR__ . '/../../bootstrap/bootstrap.php';

use App\Controllers\ContactController;

//var_dump($_SERVER);

$cacheContactController = new ContactController();

$contact_name = "";
$contact_number = 0;
$contact_id = -1;

$routes = [
    '/' => $cacheContactController->main(),
    '/create' => $cacheContactController->create(),
    '/store' => $cacheContactController->store($contact_name, $contact_number),
    '/delete' => $cacheContactController->delete($contact_id)
];

$uri = str_replace('/backend/Routes/web.php', '', $_SERVER['REQUEST_URI']);
$routes[$uri];