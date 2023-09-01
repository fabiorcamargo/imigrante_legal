<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class WhatsAppAutomationTest extends DuskTestCase
{
    public function testWhatsAppAutomation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://web.whatsapp.com')
                ->waitFor('.qrcode', 30) // Aguarda o código QR ser escaneado
                ->click('.qrcode'); // Clique no código QR para iniciar a sessão

            // Adicione código adicional aqui para interagir com o WhatsApp Web
        });
    }
}
