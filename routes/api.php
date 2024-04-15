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

Route::post('/form_send', function (Request $request) {

    $data = json_decode($request->getContent(), true);

    //dd($data['mautic.form_on_submit'][0]['submission']['results']);
    // Acesse o email

    $dados = [];
    if (isset($data['mautic.form_on_submit'])) {
        $dados['agent'] = $data['mautic.form_on_submit'][0]['submission']['results']['agent'];
        $dados['fbid'] = $data['mautic.form_on_submit'][0]['submission']['trackingId'];
        $dados['email'] = hash('sha256', $data['mautic.form_on_submit'][0]['submission']['results']['email']);
        $dados['phone'] = $data['mautic.form_on_submit'][0]['submission']['results']['telefone1'];
        $dados['fbp'] = $data['mautic.form_on_submit'][0]['submission']['results']['fbp'];
        $dados['fbc'] = $data['mautic.form_on_submit'][0]['submission']['results']['fbc'];
        $dados['cidade'] = hash('sha256', strtolower(str_replace(' ', '', iconv('UTF-8', 'ASCII//TRANSLIT', $data['mautic.form_on_submit'][0]['submission']['results']['cidade']))));
        $dados['estado'] = hash('sha256', strtolower(str_replace(' ', '', iconv('UTF-8', 'ASCII//TRANSLIT', $data['mautic.form_on_submit'][0]['submission']['results']['estado']))));
        $dados['ip'] = $data['mautic.form_on_submit'][0]['submission']['ipAddress']['ipAddress'];
        $dados['url'] = $data['mautic.form_on_submit'][0]['submission']['referer'];
        $dados['time'] = strtotime($data['mautic.form_on_submit'][0]['submission']['dateSubmitted']);
        $dados['country'] = hash('sha256', 'br');
        $dados['phone'] = hash('sha256', "55" .   preg_replace('/[^A-Za-z0-9]/', '', $dados['phone']));




        $fb = new FacebookApi;
        $response = $fb->lead2($dados);
    } else {
        $response = 'Dados Externos ' . json_encode($data);
    }


    return $response;
    //Mail::to(auth()->user()->email)->send(new welcome_mail(auth()->user()));
    //new welcome_mail(auth()->user());
});
