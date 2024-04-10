<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\FacebookApi;
use App\Http\Controllers\UfController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/uf', [UfController::class, 'get'])->name('get_uf');
Route::get('/uf/{state_id}', [UfController::class, 'name'])->name('get_uf_name');
Route::get('/uf/{state_id}/region', [UfController::class, 'region'])->name('get_uf_region');
Route::get('/cities/all', [CityController::class, 'all'])->name('get_cities_all');
Route::get('/cities/{city}', [CityController::class, 'get'])->name('get_cities');

Route::get('/fb_test/{email}/{phone}', [FacebookApi::class, 'lead'])->name('fb_test');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/test', function (Request $request) {

    $content = $request->getContent();

    // Caminho para o arquivo de texto onde você quer salvar os dados
    $filePath = storage_path('app/webhook-data.txt');

    // Salva o conteúdo no arquivo de texto
    file_put_contents($filePath, $content);

    // Retorna uma resposta de sucesso
    return response()->json(['message' => 'Dados salvos com sucesso!']);
    //Mail::to(auth()->user()->email)->send(new welcome_mail(auth()->user()));
    //new welcome_mail(auth()->user());
});
