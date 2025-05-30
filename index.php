<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<div style='position: absolute; top: 10px; left: 10px;'>Welcome, $username!</div>";
} else {
    echo "<div style='position: absolute; top: 10px; left: 10px;'>You are not logged in!</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cyber Roots CTF</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  
</head>
<body>
 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <!-- Brand links to home/index page -->
    <a class="navbar-brand" href="index.html">CyberRootsCTF.com</a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <!-- Dropdown toggle set to '#' so clicking it doesn't navigate away -->
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            Explore
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="index.php">Home Page</a>
            </li>
            <li>
              <a class="dropdown-item" href="CTF.html">CTF Page</a>
            </li>
            <li>
              <a class="dropdown-item" href="Resources Page.html">Resource Page</a>
            </li>
            <li>
              <a class="dropdown-item" href="About us.html">About Us</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<style>
    /* Base Styles */
    body {
      font-family: 'Montserrat', sans-serif;
      background: linear-gradient(135deg, #ffffff, #d2b48c);
      color: #333;
      margin: 0;
      padding: 0;
    }

    /* Hero Section */
    .hero-section {
      background: linear-gradient(135deg, #004d99, #0066cc);
      color: #fff;
      padding: 80px 20px;
      text-align: center;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      margin: 40px auto;
      max-width: 1200px;
    }
    .hero-section h1 {
      font-size: 3rem;
      font-weight: 700;
      letter-spacing: 1px;
      margin-bottom: 20px;
    }
    .hero-section p {
      font-size: 1.25rem;
    }

    /* Carousel Section */
    .carousel-section {
      margin: 40px auto;
      max-width: 1200px;
    }
    .carousel-img {
      width: 100%;
      height: auto;
      border-radius: 8px;
    }

    /* Mission Section */
    .mission-section {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 40px 20px;
      margin: 40px auto;
      max-width: 1200px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .mission-section h2 {
      font-weight: 700;
      margin-bottom: 20px;
    }

    /* Card Section */
    .card {
      border: none;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .card img {
      object-fit: cover;
      height: 200px;
    }
    .card-title {
      color: #8B4513;
      font-weight: 700;
    }
    .card-body {
      background: #fff;
    }

    /* Accordion (FAQs) */
    .accordion-item {
      border: 1px solid #ddd;
      border-radius: 8px;
      overflow: hidden;
      margin-bottom: 15px;
    }
    .accordion-button {
      background-color: #8B4513;
      color: #fff;
      font-weight: 700;
    }
    .accordion-button:not(.collapsed) {
      background-color: #A0522D;
      color: #fff;
    }
    .accordion-body {
      background: #fff;
      color: #333;
    }

    /* Footer */
    footer {
  background: #ffffff;
  color: #333;
  text-align: center;
  padding: 20px;
  margin-top: 40px;
  border-top: 1px solid #d2b48c;
}
footer img {
  width: 24px;
  margin: 0 5px;
  vertical-align: middle;
}
  
</style>

 <!-- Carousel Section -->
 <section class="carousel-section container">
  <div id="cyberCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="Images/Picture7.png" class="d-block carousel-img" alt="CyberSecurity 1">
      </div>
      <div class="carousel-item">
        <img src="Images/Picture9.jpg" class="d-block carousel-img" alt="CyberSecurity 2">
      </div>
      <div class="carousel-item">
        <img src="Images/Picture4.png" class="d-block carousel-img" alt="CyberSecurity 3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#cyberCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#cyberCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>

<!-- Mission Section -->
<section class="mission-section text-center">
  <div class="container">
    <h2 class="mb-4">Our Mission</h2>
    <p>At Cyber Roots, we empower individuals and organizations to defend against cyber threats through education, CTF challenges, and a strong community of security professionals.</p>
  </div>
</section>

<!-- Card Section -->
<div class="container mt-5">
  <div class="row text-center g-4">
    <div class="col-md-4">
      <div class="card">
        <img src="Images/card2.jpg" class="card-img-top" alt="History">
        <div class="card-body">
          <h5 class="card-title">History</h5>
          <p class="card-text">Learn about the origins and growth of Cyber Roots.</p>
          <a href="https://www.w3schools.com/cybersecurity/" class="btn btn-primary">Learn More</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="Images/Card1.2.png" class="card-img-top" alt="Community">
        <div class="card-body">
          <h5 class="card-title">Community</h5>
          <p class="card-text">Join our community to learn and share cybersecurity knowledge.</p>
          <a href="Login.html" class="btn btn-primary">Join Now</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="Images/carrd3.jpg" class="card-img-top" alt="Events">
        <div class="card-body">
          <h5 class="card-title">Events</h5>
          <p class="card-text">Participate in upcoming events to challenge your skills.</p>
          <a href="https://nrf.go.ke/hackathon/#:~:text=A%20hackathon%20is%20an%20event,focus%20on%20innovation%20and%20creativity." class="btn btn-primary">View Events</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Accordion Section (FAQs) -->
<div class="container mt-5">
  <h2 class="text-center mb-4">FAQs</h2>
  <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          What is a CTF?
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show"
        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          A CTF is a cybersecurity competition where participants solve security-related challenges.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          How to participate?
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse"
        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Sign up through our platform and join any open CTF competition.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          What skills are needed?
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse"
        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Basic knowledge of cybersecurity, problem-solving, and critical thinking skills are beneficial.
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer with Social Media Icons -->
<footer class="text-center py-3 mt-5">
  <p>&copy; 2024 Cyber Roots CTF. All rights reserved.</p>
  <a href="https://facebook.com" class="me-2">
    <img src="Images/Facebook.jpg" alt="Facebook">
  </a>
  <a href="https://instagram.com" class="me-2">
    <img src="Images/Insta.jpg" alt="Instagram">
  </a>
</footer>

<!-- Bootstrap 5 JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>