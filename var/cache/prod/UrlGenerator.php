<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    'home' => [[], ['_controller' => 'App\\Controller\\PostController::index'], [], [['text', '/']], [], []],
    'post_index' => [[], ['_controller' => 'App\\Controller\\PostController::all'], [], [['text', '/post']], [], []],
    'post_new' => [[], ['_controller' => 'App\\Controller\\PostController::new'], [], [['text', '/post/new']], [], []],
    'post_show' => [['id'], ['_controller' => 'App\\Controller\\PostController::show'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/post']], [], []],
    'post_edit' => [['id'], ['_controller' => 'App\\Controller\\PostController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id'], ['text', '/post']], [], []],
    'post_delete' => [['id'], ['_controller' => 'App\\Controller\\PostController::delete'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/post']], [], []],
    'register' => [[], ['_controller' => 'App\\Controller\\RegistrationController::index'], [], [['text', '/register']], [], []],
    'app_login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], []],
    'app_logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/logout']], [], []],
    'user_index' => [[], ['_controller' => 'App\\Controller\\UserController::index'], [], [['text', '/user/']], [], []],
    'user_new' => [[], ['_controller' => 'App\\Controller\\UserController::new'], [], [['text', '/user/new']], [], []],
    'user_show' => [['id'], ['_controller' => 'App\\Controller\\UserController::show'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/user']], [], []],
    'user_edit' => [['id'], ['_controller' => 'App\\Controller\\UserController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id'], ['text', '/user']], [], []],
    'user_delete' => [['id'], ['_controller' => 'App\\Controller\\UserController::delete'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/user']], [], []],
];
