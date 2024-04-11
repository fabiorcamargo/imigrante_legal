<?php

use App\Http\Controllers\CodePremiumController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyJobController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\FacebookApi;
use App\Http\Controllers\GetImageResume;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\Site_ConfigController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTrainingController;
use App\Http\Controllers\WorksController;
use App\Mail\welcome_mail;
use App\Models\Company;
use App\Models\CompanyJob;
use App\Models\ConfigSite;
use App\Models\States;
use App\Models\User;
use App\Models\UserCourse;
use App\Models\UserResume;
use App\Models\UserWork;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use ProtoneMedia\Splade\Facades\Toast;
use Spatie\Permission\Models\Role;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Str;
use ProtoneMedia\Splade\Facades\SEO;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['splade'])->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {


        $states = States::pluck('title', 'id');

        $config_site = json_decode(ConfigSite::find(1)->body);

        //dd(json_encode($states));
        return view('welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'states' => $states,
            'config_site' => $config_site
        ]);
    })->name('welcome');

    Route::resource('country', CompanyController::class);
    //Route::get('/empresas', [CompanyController::class, 'index'])->name('empresas.index');

    Route::resource('post', CompanyJobController::class);

    Route::resource('lead', LeadController::class);

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {

            //$user = User::find(1);
            //dd((string)Str::uuid());

            //auth()->user()->givePermissionTo('admin');
            $resume = auth()->user()->resume()->first();
            return view('dashboard', ['resume' => $resume]);
        })->name('dashboard');

        //Rotas com base nos Models
        Route::resource('cursos', CursosController::class);

        Route::resource('empregos', WorksController::class);

        Route::resource('resume', ResumeController::class);

        Route::resource('formacao', UserTrainingController::class);

        Route::resource('site_config', Site_ConfigController::class);


        Route::get('/curriculo', [ResumeController::class, 'first'])->name('curriculo');


        //Rotas comuns
        Route::get('/code/create', [CodePremiumController::class, 'create'])->name('code.create');
        Route::post('/code/store', [CodePremiumController::class, 'store'])->name('code.store');
        Route::get('/code', function () {
            return view('user.code');
        })->name('code.show');

        Route::get('user/list', [UserController::class, 'list']);





        Route::get('/pdf/{username}', function ($username) {


            if (isset(UserResume::where('username', $username)->first()->id)) {
                $resume = UserResume::where('username', $username)->first();
                $user = $resume->getuser()->first();
                $works = UserWork::where('user_id', $resume->user_id)->get();
                $courses = UserCourse::where('user_id', $resume->user_id)->get();
                $pdf = Pdf::loadView('pdf.invoice', compact('resume', 'user', 'works', 'courses'))

                    ->setPaper('a4', 'portrait')
                    ->setOptions([

                        'enable_remote' => true,
                        'isRemoteEnabled' => true,
                        'dpi' => '120'
                    ]);

                return $pdf->stream('invoice.pdf');
            } else {
                Toast::title('Ops!')
                    ->message('Esse currículo não foi localizado')
                    ->warning()
                    ->leftTop()
                    ->backdrop()
                    ->autoDismiss(5);
                return back();
            }
        })->name('curriculo.pdf');
    });

    Route::get('/premium', function () {
        return view('auth.premium');
    })->name('premium');
    Route::post('/code/verify', [CodePremiumController::class, 'verify'])->name('code.verify');

    Route::get('/curriculo/{username}', function ($username) {

        if (isset(UserResume::where('username', $username)->first()->id)) {
            $resume = UserResume::where('username', $username)->first();
            $user = $resume->getuser()->first();
            $works = UserWork::where('user_id', $resume->user_id)->get();
            $courses = UserCourse::where('user_id', $resume->user_id)->get();
            return view('resume.show.index', ['user' => $user, 'resume' => $resume, 'works' => $works, 'courses' => $courses]);
        } else {
            Toast::title('Ops!')
                ->message('Esse currículo não foi localizado')
                ->warning()
                ->leftTop()
                ->backdrop()
                ->autoDismiss(5);
            return back();
        }
    })->name('curriculo.show');


    Route::get('/sitemap', function () {
        $sitemap = Sitemap::create()
            ->add(Url::create('/'));

        $counties = Company::all();
        foreach ($counties as $country) {
            $sitemap->add(Url::create('country/' . $country->id));
        }

        $posts = CompanyJob::all();
        foreach ($posts as $post) {
            $sitemap->add(Url::create('post/' . $post->id));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        return 'criado com sucesso';
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

    Route::view('/privacidade', 'privacity');
});
