<?php

use App\Http\Controllers\AllianceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\GuildController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PlayerController;
use App\Http\Resources\InventoryCollection;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
 
    return ['token' => $token->plainTextToken];
});


Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);



Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('alliances', AllianceController::class);
    Route::apiResource('guilds', GuildController::class);
    Route::apiResource('players', PlayerController::class);
    Route::apiResource('inventories', InventoryController::class);
    Route::apiResource('items',ItemController::class);
    Route::patch('/updateplayer', [PlayerController::class, 'update']);
    Route::get('/player', [PlayerController::class, 'show']);
    Route::post('/createplayer', [PlayerController::class, 'store']);
    Route::get('/guild', [GuildController::class, 'show']);
    Route::get('/inventory', [InventoryController::class, 'show']);
    Route::post('/createItem', [ItemController::class, 'store']);
});


