<?php

use App\Http\Controllers\EmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('send-email', [ EmailController::class, 'sendEmail' ]);