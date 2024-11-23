<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>MENTORS</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">



<body class="index-page">

  





  <main class="main">

    
   


     <!-- Mentors Section -->
     <section id="Mentors" class="Mentors section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Mentors</h2>
        <p>"Meet our dedicated mentors—experienced professionals committed to guiding you every step of the way. They bring valuable insights, industry expertise, and personalized advice to help you reach your full potential with EduTech."</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>John Ngor</h4>
                <span>Career Development</span>
                <p>Experience: 10+ years in career consulting, specializing in personal branding and interview skills.</p>
                 <p>Program Focus: Helps students craft professional resumes, ace interviews, and build a strong online presence.</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""> <i class="bi bi-linkedin"></i> </a>
                </div>
                <br>
               <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#first">book an appointment</button>
              </div>
            </div>
            <!-- The Modal -->
<div class="modal" id="first">
  <div class="modal-dialog">
b    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Book a session here</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div col-sm-6>
              <form action="" method="post">
                <input type="text" name="name" placeholder="Enter your full name" class="form-control" required="">
                <br>
                <input type="email" name="email" placeholder="your email address" class="form-control" required="">
                <br>
                <input type="tel" name="phone" placeholder="your phone number" class="form-control" required="">
                <br>
                <input type="datetime-local" name="date" class="form-control"  required="">
                <br>
                <input type="text" name="interest" class="form-control" placeholder="Your area of interest">
                <br>
                <input type="submit" name="submit" class="btn btn-primary">
            

              </form>
              <?php
if (isset($_POST['submit'])) {
    $a = $_POST['name'];
    $b = $_POST['email'];
    $c = $_POST['phone'];
    $d = $_POST['date'];
    $e = $_POST['interest'];

    // Establish database connection
    $con = mysqli_connect("sql301.infinityfree.com", "if0_37766648", "0yVYU6zbOgG9V0", "if0_37766648");

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // SQL query to insert data
    $sq = "INSERT INTO `mentor1`(`id`, `name`, `email`, `phone`, `date`, `interest`) VALUES ('', '$a', '$b', '$c', '$d','$e')";

    // Execute query and provide feedback
    if (mysqli_query($con, $sq)) {
        echo "<script>
                alert('You have successfully booked an appointment!');
                window.location.href = 'mentors.php'; // Redirect to mentors.php
              </script>";
    } else {
        echo "<script>
                alert('Error: " . mysqli_error($con) . "');
                window.location.href = 'your_form_page.php'; // Replace with your form page URL
              </script>";
    }

    // Close the database connection
    mysqli_close($con);
}
?>


            </div>

          </div>

        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Chol Daniel</h4>
                <span>Technical Skills Development</span>
                <p>Experience: Over 12 years in software development, particularly in web and mobile applications.</p>
                 <p> Program Focus: Provides hands-on guidance on coding projects, debugging, and mastering new programming languages.</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""> <i class="bi bi-linkedin"></i> </a>
                </div>
                <br>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#first">book an appointment</button>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Panchol Deng</h4>
                <span>Startup Advisor & Entrepreneur</span>
                <p>Experience: Founded 3 successful startups in the tech and e-commerce space.</p>
                  <p>Program Focus: Teaches students the basics of launching a business, from ideation to funding and scaling.</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""> <i class="bi bi-linkedin"></i> </a>
                </div>
                <br>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#first">book an appointment</button>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Nhial Majok</h4>
                <span>Leadership & Personal Development Trainer</span>
                <p>Experience: 15 years in leadership development programs for corporates and educational institutions.</p>
                 <p> Program Focus: Coaches students on leadership qualities, effective decision-making, and personal growth strategies.</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""> <i class="bi bi-linkedin"></i> </a>
                </div>
                <br>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#first">book an appointment</button>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- /Mentors Section -->




    <div class="copyright">
      <div class="container text-center">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Edw</strong> <span>All Rights Reserved</span></p>
        <div class="credits">
          
          Designed by Kanisa Rebecca
        </div>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>