<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Client\RequestException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class MauticForm implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $data;
    public $lead;
    public function __construct($data, $lead)
    {
        $this->data = $data;
        $this->lead = $lead;

        
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        

        

        try {

            $response = Http::post('https://imi.meusestudosead.com.br/form/submit?formId=1', $this->data);

            // Obtenha o corpo da resposta como uma string
            $responseBody = $response->getBody()->getContents();

            // Verifique o status da resposta
            if ($response->getStatusCode() === 200) {
                // A solicitação foi bem-sucedida
                // Faça algo com os dados
                $this->lead->Mautic()->create([
                    'body' => '{"body": "enviado"}',
                    'status' => $response->getStatusCode()
                ]);
            } else {
                // Lidar com erros de resposta HTTP
                $this->lead->Mautic()->create([
                    'body' => '{"body": "não enviado"}',
                    'status' => $response->getStatusCode()
                ]);
                echo 'Erro na solicitação: ' . $response->getStatusCode();
            }
        } catch (RequestException $e) {
            // Captura exceções do Guzzle
            if ($e->hasResponse()) {
                // Se houver uma resposta HTTP no erro, você pode acessá-la
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $errorBody = $response->getBody()->getContents();
                // Faça o que quiser com a resposta de erro
                echo "Erro na solicitação: Status $statusCode, Response: $errorBody";

                $this->lead->Mautic()->create([
                    'body' => '{"body": "não enviado"}',
                    'status' => $response->getStatusCode()
                ]);
            } else {
                // Lidar com outros tipos de erros (por exemplo, problemas de rede)
                echo "Erro na solicitação: " . $e->getMessage();

                $this->lead->Mautic()->create([
                    'body' => '{"body": "não enviado"}',
                    'status' => $response->getStatusCode()
                ]);

            }
        }
    }
}
