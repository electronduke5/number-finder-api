<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CollectionItemController;

use Illuminate\Support\Facades\Route;


Route::apiResources([
    'users' => UserController::class,
    'users/{$id}' => UserController::class,

    'groups' => GroupController::class,
    'groups/{$id}' => GroupController::class,

    'collections' => CollectionController::class,
    'collections/{$id}' => CollectionController::class,

    'collection/items' => CollectionItemController::class,
    'collection/items/{$id}' => CollectionItemController::class,
]);
