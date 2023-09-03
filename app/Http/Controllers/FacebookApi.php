<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class FacebookApi extends Controller
{
    
    
    public function lead(Request $request, $email, $phone){
    
        //dd($request->ip(), $request->header('User-Agent'));

        $url = request()->url();
        $ip = $request->ip();
        $agent = $request->header('User-Agent');

        $em =  hash('sha256', $email);
        $ph = hash('sha256', $phone);
        $eid = (string)Str::uuid();
        $time = now();

        //dd($em, $ph);
                // Configurações da API do Facebook
                $app_id = 'SEU_APP_ID';
                $app_secret = 'SEU_APP_SECRET';
                $access_token = env('FACEBOOK_API_TOKEN');

                // Endpoint da API do Facebook para eventos
                $api_url = 'https://graph.facebook.com/v15.0/167867373000120/events';
                
                // Dados do evento que você deseja enviar
                $event_data = [
                        [
                            "event_name"=> "Lead",
                            "event_time"=> "$time",
                            "action_source"=> "website",
                            "event_source_url"=> "$url",
                            "event_id"=> "$eid",
                            "user_data"=> [
                                "em"=> "$em",
                                "ph"=> "$ph",
                                "client_ip_address"=> "45.160.182.141",
                                "client_user_agent"=> "teste"
                            ], 
                        ], 
                    ];

                // Montar os cabeçalhos da solicitação
                $headers = [
                    'Content-Type' => 'application/json',
                ];

                // Configurar os parâmetros da solicitação POST
                $params = [
                    'access_token' => $access_token,
                    'data' => json_encode($event_data),
                    //'test_event_code' => 'TEST7840'
                ];

                // Fazer a solicitação POST usando o Laravel HTTP Client
                $response = Http::withHeaders($headers)
                    ->post($api_url, $params);

                // Verificar a resposta da API do Facebook
                if ($response->successful()) {
                    // Sucesso - evento enviado com sucesso
                    $response_data = $response->json();
                    // Processar a resposta, se necessário
                    // ...

                    
                    return "fbq('track', 'Lead', {
                        'event_name': 'Lead',
                        'event_time': '$time',
                        'action_source': 'website',
                        'event_source_url': '$url',
                        'user_data':
                        {
                            'em':
                            [
                                '$em'
                            ],
                            'ph':
                            [
                                '$ph'
                            ],
                           
                            'client_ip_address': '$ip',
                            'client_user_agent': '$agent'
                        },
                    },{'eventID': '$eid'}
                )";

                

                    
                } else {
                    // Erro - algo deu errado
                    $error_message = $response->body();
                    // Lidar com o erro, se necessário
                    // ...
                    return $error_message;
                }

    }
}
