<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>iPortfolio Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
{{--    <!--assets/img/favicon.png--}}
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="{{asset('assets/img/profile-img.jpg')}}" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="{{route('student.profile')}}">{{$user->fname . ' '. $user->lname}}</a></h1>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About me</span></a></li>
          <li><a href="#semester-progress" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Semester progress</span></a></li>
          <li><a href="#all-progress" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>All progress</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in" style="text-align: center;">
      <h1>{{$user->fname . ' '. $user->lname}}</h1>
      <p>I'm <span class="typed" data-typed-items="dentist , creative ,persistence"></span></p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About me</h2>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="{{asset('assets/img/profile-img.jpg')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">

            <div class="row">
              <div class="col-lg-6">
                <ul>
                    <li><i class="bi bi-chevron-right"></i> <strong>Full name:</strong> <span>{{$user->fname . ' ' . $user->mname . ' ' . $user->lname}}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Mother name:</strong> <span>{{$user->mother_name}}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>{{$user->birth_date}}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Constraint:</strong> <span>{{$user->constraint}}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Address:</strong> <span>{{$user->address}}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>University id:</strong> <span>{{$user->student->university_id}}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{$user->student->email}}</span></li>
                </ul>
              </div>
                <div class="col-lg-6">
                <ul>

                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{calculateAge($user->birth_date)}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>National id:</strong> <span>{{$user->national_id}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birth location:</strong> <span>{{$user->birth_location}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Gender:</strong> <span>{{$user->gender}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{$user->phone}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Level:</strong> <span>{{getLevel($user->student->level)}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Semester:</strong> <span>{{getSemester($user->student->semester)}}</span></li>
                </ul>
              </div>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= semester-progress Section ======= -->
    <section id="semester-progress" class="facts">
      <div class="container">

        <div class="section-title">
          <h2 style="display: inline-block">Semester Progress</h2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <h4 style="display: inline-block">
                <a href="{{route('student.show.semester',['id'=>$user->id])}}">details</a>
            </h4>
           <p>The topics and the number of completed tasks in this semester.</p>
        </div>

        <div class="row no-gutters">

            @foreach($semesterUserSubjects as $subject=>$cnt)
          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
            <div class="count-box">
                <h3><strong>{{$subject}}</strong></h3>
                <span data-purecounter-start="0" data-purecounter-end="{{$cnt}}" data-purecounter-duration="1" class="purecounter"></span>
            </div>
          </div>
            @endforeach

        </div>
      </div>
    </section><!-- end semester-progress Section -->

      <!-- ======= all-progress Section ======= -->
      <section id="all-progress" class="facts">
          <div class="container">

              <div class="section-title">
                  <h2 style="display: inline-block;">All Progress </h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <h4 style="display: inline-block"><a href="">details</a></h4>
                  <p>The topics and the number of completed tasks yet.</p>
              </div>

              <div class="row no-gutters">

                  @foreach($allUserSubjects as $subject=>$cnt)
                      <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
                          <div class="count-box">
                              <h3><strong>{{$subject}}</strong></h3>
                              <span data-purecounter-start="0" data-purecounter-end="{{$cnt}}" data-purecounter-duration="1" class="purecounter"></span>
                          </div>
                      </div>
                  @endforeach

              </div>

          </div>
      </section><!-- ======= end all-progress Section ======= -->



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">

      <div class="credits">

        Powered by <br> <a href="#">M.K & abdullah</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/typed.js/typed.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
