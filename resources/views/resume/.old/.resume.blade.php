@seoTitle(__('Criar Currículo'))

<x-layout>
    <x-slot:header>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Currículo') }}
        </h2>
        </x-slot>

<head>
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>iPortfolio Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('plugins/resume/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('plugins/resume/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('plugins/resume/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('plugins/resume/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('plugins/resume/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('plugins/resume/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('plugins/resume/css/style.css')}}" rel="stylesheet">


</head>
<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
  
    <!-- ======= Header ======= -->
    <header id="header">
      <div class="d-flex flex-column">
  
        <div class="profile">
          <img src="{{asset(Storage::url(Auth::user()->profile_photo_path))}}" alt="" class="img-fluid rounded-circle">
          <h1 class="text-light"><a href="index.html">{{$resume->name}}</a></h1>
          <div class="social-links mt-3 text-center">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
        </div>
  
        <nav id="navbar" class="nav-menu navbar">
          <ul>
            <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Início</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Dados Pessoais</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Experiência</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
          <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
          </ul>
        </nav><!-- .nav-menu -->
      </div>
    </header><!-- End Header -->
    <x-modal.galery_modal title="Exemplo" id='1' />
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="p-2 d-flex flex-column justify-content-center align-items-center">
      
      <div class="hero-container" data-aos="fade-in">
        <h1>{{$resume->nome}}</h1>
        <p>Você só vai vencer amanhã, se não desistir hoje!</p>
        {{--<p>I'm <span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer"></span></p>--}}
      </div>
    </section><!-- End Hero -->
  
    <main id="main">
  
      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container">
  
          <div class="section-title">
            <h2>Objetivo</h2>
            <p>{{ $resume->objetivo }}</p>
          </div>
  
          <div class="row">
            <div class="col-lg-4" data-aos="fade-right">
              <img src="{{asset(Storage::url(Auth::user()->image))}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
              <h3>
                {{$resume->name}}
              </h3>
              <br>
              <div class="row">
                <div class="col-lg-6">
                  <ul>
                    <li><i class="bi bi-chevron-right"></i> <strong>Nome:</strong> <span>{{$resume->nome}}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Data de Nascimento:</strong> <span>{{\Carbon\Carbon::parse($resume->nascimento)->format('d/m/Y')}}</span></li>
                    {{--<li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>www.example.com</span></li>--}}
                    <li><i class="bi bi-chevron-right"></i> <strong>Telefone:</strong> <span>{{ $resume->telefone }}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Cidade:</strong> <span>{{ App\Models\City::find($resume->cidade)->name }} - {{ App\Models\States::find($resume->uf)->abbr }} </span></li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul>
                    <li><i class="bi bi-chevron-right"></i> <strong>Idade:</strong> <span>{{ \Carbon\Carbon::parse($resume->nascimento)->age }}</span></li>
                    {{--<li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>Master</span></li>--}}
                    <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{ $resume->email }}</span></li>
                    {{--<li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>--}}
                  </ul>
                </div>
              </div>
              {{--<p>{{ $resume->objetivo }}</p>--}}
              
            </div>
          </div>
  
        </div>
      </section><!-- End About Section -->
  
      <!-- ======= Skills Section ======= -->
      <section id="skills" class="skills section-bg">
        <div class="container">
  
          <div class="section-title">
            <h2>Soft Skills</h2>
            {{--<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>--}}
          </div>
  
          <div class="row skills-content">
  
            <div class="col-lg-6" data-aos="fade-up">
              @foreach ($resume->skills as $skill)
                <div class="progress py-2">
                  <span class="skill">{{$skill}} <i class="val"></i></i></span>
                  <div class="progress-bar-wrap">
                    <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              @endforeach
  
            </div>
        </div>
      </section><!-- End Skills Section -->
  
      <!-- ======= Resume Section ======= -->
      <section id="resume" class="resume">
        <div class="container">
  
          <div class="section-title">
            <h2>Resume</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>
  
          <div class="row">
            <div class="col-lg-6" data-aos="fade-up">
              <h3 class="resume-title">Sumary</h3>
              <div class="resume-item pb-0">
                <h4>Alex Smith</h4>
                <p><em>Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and developing user-centered digital/print marketing material from initial concept to final, polished deliverable.</em></p>
                <ul>
                  <li>Portland par 127,Orlando, FL</li>
                  <li>(123) 456-7891</li>
                  <li>alice.barkley@example.com</li>
                </ul>
              </div>
  
              <h3 class="resume-title">Education</h3>
              <div class="resume-item">
                <h4>Master of Fine Arts &amp; Graphic Design</h4>
                <h5>2015 - 2016</h5>
                <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
                <p>Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit. Ea vero voluptatum qui ut dignissimos deleniti nerada porti sand markend</p>
              </div>
              <div class="resume-item">
                <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>
                <h5>2010 - 2014</h5>
                <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
                <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila</p>
              </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
              <h3 class="resume-title">Professional Experience</h3>
              <div class="resume-item">
                <h4>Senior graphic design specialist</h4>
                <h5>2019 - Present</h5>
                <p><em>Experion, New York, NY </em></p>
                <ul>
                  <li>Lead in the design, development, and implementation of the graphic, layout, and production communication materials</li>
                  <li>Delegate tasks to the 7 members of the design team and provide counsel on all aspects of the project. </li>
                  <li>Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the design</li>
                  <li>Oversee the efficient use of production project budgets ranging from $2,000 - $25,000</li>
                </ul>
              </div>
              <div class="resume-item">
                <h4>Graphic design specialist</h4>
                <h5>2017 - 2018</h5>
                <p><em>Stepping Stone Advertising, New York, NY</em></p>
                <ul>
                  <li>Developed numerous marketing programs (logos, brochures,infographics, presentations, and advertisements).</li>
                  <li>Managed up to 5 projects or tasks at a given time while under pressure</li>
                  <li>Recommended and consulted with clients on the most appropriate graphic design</li>
                  <li>Created 4+ design presentations and proposals a month for clients and account managers</li>
                </ul>
              </div>
            </div>
          </div>
  
        </div>
      </section>
      <!-- End Resume Section -->
        
  
       
  
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="container">
        <div class="copyright">
          &copy; <strong><span>{{env('APP_NAME')}}</span></strong>
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
          Crie o seu Perfil <a href="">Clique Aqui</a>
        </div>
      </div>
    </footer><!-- End  Footer -->
  
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
    <!-- Vendor JS Files -->
    <script src="{{asset('plugins/resume/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{asset('plugins/resume/aos/aos.js')}}"></script>
    <script src="{{asset('plugins/resume/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('plugins/resume/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('plugins/resume/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('plugins/resume/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('plugins/resume/typed.js/typed.umd.js')}}"></script>
    <script src="{{asset('plugins/resume/waypoints/noframework.waypoints.js')}}"></script>
    <script src="{{asset('plugins/resume/php-email-form/validate.js')}}"></script>
  
    <!-- Template Main JS File -->
    <script src="{{asset('plugins/resume/main.js')}}"></script>
  
  </body>

</x-layout>