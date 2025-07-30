<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhookController;

Route::post('/midtrans/webhook', [WebhookController::class, 'handle']);
