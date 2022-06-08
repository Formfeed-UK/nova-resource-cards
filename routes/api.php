<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Formfeed\ResourceCards\Http\Controllers\CardController;

Route::get('/{resource}/cards', CardController::class);