<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class FacebookApi extends Controller
{

    protected $token;
    protected $fbId;
    protected $data;
    protected $eventId;
    protected $user_data;
    protected $time;

    protected $email;
    protected $phone;

    public function __construct()
    {
        $this->token = env('FB_TOKEN');
        $this->fbId = env('FB_ID');
        //$this->eventId = (string)Str::uuid();
        $this->time = time();
    }


    public function pre()
    {
        $request = Request::capture();
        
        if($request->cookie('_fbc') !== null){
          $fbc = $request->cookie('_fbc');
        }else if($request->input('fbclid') !== null){
          $fbclid = $request->input('fbclid');
          $fbc = "fb.2.$this->time.$fbclid";
        }else{
          $fbc='';
        }

        $userData = [
            'client_ip_address' => request()->ip(),
            'client_user_agent' => request()->header('User-Agent')
        ];

        if($this->email !== null){
            $userData['em'] = [hash('sha256', $this->email)];
        }
        if($this->phone !== null){
            $userData['ph'] = [hash('sha256', $this->phone)];
        }
        

        // Adiciona _fbp se estiver disponível
        if (isset($_COOKIE['_fbp'])) {
            $userData['fbp'] = $_COOKIE['_fbp'];
            $userData['fbc'] = $fbc;

        }

        $this->user_data = '"user_data": ' . json_encode($userData) . ',';

        return $this->user_data;

    }


    public function fbScript(){
        $event = (string)json_decode($this->data)->data[0]->event_name;

        $script = "fbq('track', '".$event."',". json_encode(json_decode($this->data)->data[0]) .", {'eventID': '".$this->eventId."'})";

        return str_replace('event_name', 'event', $script);
    }

    public function send()
    {
        try {
            $response = Http::withToken($this->token)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->post("https://graph.facebook.com/v18.0/{$this->fbId}/events", json_decode($this->data));

                
            if ($response->successful()) {
                $content = $response->json();

                //dd($content);

                return $content;
            } else {
                $error_message = isset($response->json()['error']['message']) ? $response->json()['error']['message'] : 'Erro desconhecido';
                throw new \Exception($error_message . ' (' . $response->status() . ')');
            }
        } catch (\Exception $e) {
            //dd($e->getMessage());
        }
    }

    public function lead2($dados){

        $this->data = '{
            "data": [
                {
                    "event_name": "Lead",
                    "event_time": '.$dados['time'].',
                    "action_source": "website",
                    "event_source_url": "'.$dados['url'].'",
                    "event_id": "'.$dados['fbid'].'",
                    "user_data": {
                        "em": [
                            "'.$dados['email'].'"
                        ],
                        "ph": [
                            "'.$dados['phone'].'"
                        ],
                        "client_ip_address": "'.$dados['ip'].'",
                        "client_user_agent": "'.$dados['agent'].'",
                        "fbc": "'.$dados['fbc'].'",
                        "fbp": "'.$dados['fbp'].'"
                    }
                }
                ] ' . (env('FB_API_TEST') == true ? ',"test_event_code": "'. env('FB_TESTCODE') . '"' : '') . '
        }';

        //dd($this->data);
        $return = $this->send();

        return $return;
    
    }
    
    
    public function lead(Request $request, $email, $phone){

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
                $api_url = 'https://graph.facebook.com/v18.0/'. env('FB_ID') .'/events';
                
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
