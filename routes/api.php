<?php

use App\Http\Controllers\Api\HizmetlerController;
use App\Http\Controllers\Api\ReferanslarController;
use App\Http\Controllers\Api\SubelerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IlceController;
use App\Http\Controllers\Api\IlController;
use App\Http\Controllers\Api\IletisimController;
use App\Http\Controllers\Api\UyelerController;
use App\Http\Controllers\Api\UrunlerController;
use App\Http\Controllers\Api\SiparislerController;
use App\Http\Controllers\Api\SiparisDetayController;
use App\Http\Controllers\Api\OdemelerController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/uye/login',[UyelerController::class,'login']);
Route::post('/uye/avatar',[UyelerController::class,'avatar']);
Route::post('/uye/forget',[UyelerController::class,'forget']);
Route::get('/kategoriler',[UrunlerController::class,'kategoriler']);
Route::post('/siparisdetay',[SiparisDetayController::class,'guncelle']);

Route::apiResource('/il',IlController::class);
Route::apiResource('/ilce',IlceController::class);
Route::apiResource('/iletisim',IletisimController::class);
Route::apiResource('/uyeler',UyelerController::class);
Route::apiResource('/subeler',SubelerController::class);
Route::apiResource('/hizmetler',HizmetlerController::class);
Route::apiResource('/referanslar',ReferanslarController::class);
Route::apiResource('/urunler',UrunlerController::class);
Route::apiResource('/siparisler',SiparislerController::class);
Route::apiResource('/siparisdetay',SiparisDetayController::class);
Route::apiResource('/odemeler',OdemelerController::class);
