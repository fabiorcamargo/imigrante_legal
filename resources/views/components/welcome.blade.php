<div class="p-6 lg:p-8 bg-white border-b border-gray-200">

    <h1 class="mt-4 text-2xl font-medium text-gray-900">
        Seja bem vindo(a) ao {{env('APP_NAME')}}! 
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
        Nos próximos dias, vamos enviar informações importantes sobre o seu perfil profissional e liberar novos recursos para você ir interagindo com a plataforma.
    </p>
</div>

<div class=" bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <div>
        <div class="stat">
            <div class="stat-title">Total de Cadastros</div>
            <div class="stat-value">{{App\Models\Lead::all()->count()}}</div>
            <div class="stat-desc">21% more than last month</div>
        </div>
        
    </div>

    <div>
       
    </div>

    <div>
        
    </div>

    <div>
       
    </div>
</div>
