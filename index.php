<?php
session_start();
include "config/database.php";

/*
=========================================================
SMART FARMING DEVELOPMENT CENTRE (SFDC)
TVETMARA
Landing Page
Version 3.0
PART 1
=========================================================
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Smart Farming Development Centre | TVETMARA</title>

<meta name="description"
content="Smart Farming Development Centre - IoT Smart Agriculture Monitoring System">

<meta name="keywords"
content="Smart Farming, IoT, Agriculture, TVETMARA, Hydroponic">

<meta name="author"
content="TVETMARA">

<link rel="icon"
href="assets/images/logo.png">

<!-- Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
rel="stylesheet">

<!-- Font Awesome -->

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<!-- Google Font -->

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
rel="stylesheet">

<!-- AOS -->

<link href="https://unpkg.com/aos@2.3.4/dist/aos.css"
rel="stylesheet">

<!-- CSS -->

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body>

<!-- ========================================= -->
<!-- PRELOADER -->
<!-- ========================================= -->

<div id="preloader">

<div class="loader">

<div class="loader-ring"></div>

<img
src="assets/images/logo.png"
alt="SFDC Logo"
class="loader-logo">

<h2>SMART FARMING</h2>

<p>Loading Smart Dashboard...</p>

</div>

</div>

<!-- ========================================= -->
<!-- NAVBAR -->
<!-- ========================================= -->

<nav class="navbar navbar-expand-lg fixed-top glass-nav">

<div class="container">

<a class="navbar-brand"
href="index.php">

<img
src="assets/images/logo.png"
alt="Logo">

<span>SFDC</span>

</a>

<button
class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#navbarNav">

<i class="fas fa-bars text-white"></i>

</button>

<div
class="collapse navbar-collapse"
id="navbarNav">

<ul class="navbar-nav ms-auto">

<li class="nav-item">

<a href="#home"
class="nav-link active">

Home

</a>

</li>

<li class="nav-item">

<a href="#about"
class="nav-link">

About

</a>

</li>

<li class="nav-item">

<a href="#dashboard"
class="nav-link">

Dashboard

</a>

</li>

<li class="nav-item">

<a href="#feature"
class="nav-link">

Features

</a>

</li>

<li class="nav-item">

<a href="#booking"
class="nav-link">

Booking

</a>

</li>

<li class="nav-item">

<a href="#feedback"
class="nav-link">

Feedback

</a>

</li>

<li class="nav-item">

<a href="#contact"
class="nav-link">

Contact

</a>

</li>

</ul>

<div class="ms-lg-4">

<a href="login.php"
class="btn btn-login">

<i class="fas fa-user"></i>

Login

</a>

</div>

</div>

</div>

</nav>

<!-- ========================================= -->
<!-- HERO -->
<!-- ========================================= -->

<section
class="hero"
id="home">

<video
autoplay
muted
loop
playsinline
poster="assets/images/farm.jpg"
class="hero-video">

<source
src="assets/video/farm.mp4"
type="video/mp4">

</video>

<div class="hero-overlay"></div>

<div id="particles-js"></div>

<div class="container">

<div class="row align-items-center min-vh-100">

<div class="col-lg-7">

<div data-aos="fade-right">

<h5 class="hero-tag">

TVETMARA LIVING LAB

</h5>

<h1 class="hero-title">

SMART FARMING

<br>

DEVELOPMENT

<br>

CENTRE

</h1>

<h2 class="hero-subtitle">

<span id="typing"></span>

</h2>

<p class="hero-description">

Smart Farming Development Centre is an intelligent IoT platform for monitoring crops, hydroponic farming, environmental sensors, harvesting records and smart agriculture management.

</p>

<div class="hero-button">

<a
href="#dashboard"
class="btn btn-primary-custom">

<i class="fas fa-chart-line"></i>

Explore Dashboard

</a>

<a
href="#booking"
class="btn btn-outline-custom">

<i class="fas fa-calendar-check"></i>

Book Harvest

</a>

</div>

</div>

</div>

<div class="col-lg-5 text-center">

<div data-aos="zoom-in">

<div class="hero-logo-circle">

<img
src="assets/images/logo.png"
alt="Logo"
class="hero-logo">

</div>

<div class="status-box">

<div class="status-item">

<span class="green-dot"></span>

System Online

</div>

<div class="status-item">

<i class="fas fa-cloud"></i>

Cloud Connected

</div>

<div class="status-item">

<i class="fas fa-wifi"></i>

IoT Connected

</div>

<div class="status-item">

<i class="fas fa-database"></i>

Database Active

</div>

</div>

</div>

</div>

</div>

</div>

<div class="scroll-down">

<span></span>

</div>

</section>

<!-- ========================================= -->
<!-- LIVE COUNTER -->
<!-- ========================================= -->

<section class="live-counter">

<div class="container">

<div class="row g-4">

<div class="col-lg-3 col-md-6">

<div class="counter-card">

<i class="fas fa-seedling"></i>

<h2
class="counter"
data-target="116">

0

</h2>

<p>Harvest (KG)</p>

</div>

</div>

<div class="col-lg-3 col-md-6">

<div class="counter-card">

<i class="fas fa-money-bill-wave"></i>

<h2
class="counter"
data-target="911">

0

</h2>

<p>Revenue (RM)</p>

</div>

</div>

<div class="col-lg-3 col-md-6">

<div class="counter-card">

<i class="fas fa-users"></i>

<h2
class="counter"
data-target="245">

0

</h2>

<p>Customers</p>

</div>

</div>

<div class="col-lg-3 col-md-6">

<div class="counter-card">

<i class="fas fa-microchip"></i>

<h2
class="counter"
data-target="24">

0

</h2>

<p>IoT Devices</p>

</div>

</div>

</div>

</div>

</section>

<!-- ================================================= -->
<!-- ABOUT SFDC -->
<!-- ================================================= -->

<section id="about" class="section-padding">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6" data-aos="fade-right">

<img src="assets/images/about.png"
     class="img-fluid rounded-4 shadow-lg"
     alt="Smart Farming">

</div>

<div class="col-lg-6" data-aos="fade-left">

<h6 class="section-tag">
ABOUT US
</h6>

<h2 class="section-title">
Smart Farming Development Centre
</h2>

<p class="section-text">

Smart Farming Development Centre (SFDC) merupakan platform pertanian pintar
berasaskan Internet of Things (IoT) yang dibangunkan bagi membantu pemantauan
tanaman secara masa nyata.

Sistem ini membolehkan pengguna melihat suhu, kelembapan, kelembapan tanah,
paras air serta analisis hasil tuaian melalui dashboard interaktif.

</p>

<div class="row mt-4">

<div class="col-6 mb-3">

<div class="about-card">

<i class="fas fa-leaf"></i>

<h5>Hydroponic</h5>

<p>Modern farming technology.</p>

</div>

</div>

<div class="col-6 mb-3">

<div class="about-card">

<i class="fas fa-cloud"></i>

<h5>Cloud Database</h5>

<p>Realtime monitoring.</p>

</div>

</div>

<div class="col-6">

<div class="about-card">

<i class="fas fa-wifi"></i>

<h5>IoT Sensor</h5>

<p>24 Hours Monitoring.</p>

</div>

</div>

<div class="col-6">

<div class="about-card">

<i class="fas fa-chart-line"></i>

<h5>Analytics</h5>

<p>Smart dashboard report.</p>

</div>

</div>

</div>

</div>

</div>

</div>

</section>

<!-- ================================================= -->
<!-- DASHBOARD PREVIEW -->
<!-- ================================================= -->

<section id="dashboard" class="dashboard-preview">

<div class="container">

<div class="text-center mb-5">

<h6 class="section-tag">
LIVE DASHBOARD
</h6>

<h2 class="section-title">
Real-Time IoT Monitoring
</h2>

<p>
Live monitoring of environmental sensors.
</p>

</div>

<div class="row g-4">

<div class="col-lg-3 col-md-6">

<div class="sensor-card">

<i class="fas fa-temperature-high sensor-icon text-danger"></i>

<h4>Temperature</h4>

<h2 id="temperatureValue">
28°C
</h2>

<span class="badge bg-success">
LIVE
</span>

</div>

</div>

<div class="col-lg-3 col-md-6">

<div class="sensor-card">

<i class="fas fa-tint sensor-icon text-primary"></i>

<h4>Humidity</h4>

<h2 id="humidityValue">
78%
</h2>

<span class="badge bg-success">
LIVE
</span>

</div>

</div>

<div class="col-lg-3 col-md-6">

<div class="sensor-card">

<i class="fas fa-seedling sensor-icon text-success"></i>

<h4>Soil Moisture</h4>

<h2 id="soilValue">
65%
</h2>

<span class="badge bg-success">
LIVE
</span>

</div>

</div>

<div class="col-lg-3 col-md-6">

<div class="sensor-card">

<i class="fas fa-sun sensor-icon text-warning"></i>

<h4>Light</h4>

<h2 id="lightValue">
860 Lux
</h2>

<span class="badge bg-success">
LIVE
</span>

</div>

</div>

</div>

</div>

</section>

<!-- ================================================= -->
<!-- WEATHER -->
<!-- ================================================= -->

<section class="weather-section">

<div class="container">

<div class="row justify-content-center">

<div class="col-lg-5">

<div class="weather-card text-center">

<div id="weatherIcon"
style="font-size:60px;">
☀️
</div>

<h3 id="weatherTemp">
30°C
</h3>

<h5 id="weatherCity">
Kuala Lumpur
</h5>

<p id="weatherStatus">
Sunny
</p>

</div>

</div>

<div class="col-lg-7">

<div class="glass-card">

<h4 class="mb-4">

<i class="fas fa-chart-area"></i>

Today's Statistics

</h4>

<div class="row">

<div class="col-6 mb-4">

<h3 id="harvestCounter">

116 KG

</h3>

<p>Total Harvest</p>

</div>

<div class="col-6 mb-4">

<h3>

RM 911

</h3>

<p>Total Revenue</p>

</div>

<div class="col-6">

<h3>

245

</h3>

<p>Visitors</p>

</div>

<div class="col-6">

<h3>

24

</h3>

<p>Connected IoT</p>

</div>

</div>

</div>

</div>

</div>

</div>

</section>

<!-- ================================================= -->
<!-- QUICK FEATURES -->
<!-- ================================================= -->

<section class="feature-highlight">

<div class="container">

<div class="row text-center g-4">

<div class="col-lg-3 col-md-6">

<div class="feature-box">

<i class="fas fa-camera"></i>

<h5>Live Camera</h5>

<p>Monitor greenhouse anytime.</p>

</div>

</div>

<div class="col-lg-3 col-md-6">

<div class="feature-box">

<i class="fas fa-water"></i>

<h5>Water Tank</h5>

<p>Automatic level monitoring.</p>

</div>

</div>

<div class="col-lg-3 col-md-6">

<div class="feature-box">

<i class="fas fa-cloud-upload-alt"></i>

<h5>Cloud Sync</h5>

<p>Data stored securely online.</p>

</div>

</div>

<div class="col-lg-3 col-md-6">

<div class="feature-box">

<i class="fas fa-mobile-alt"></i>

<h5>Mobile Friendly</h5>

<p>Accessible from any device.</p>

</div>

</div>

</div>

</div>

</section>

<!-- ================================================= -->
<!-- ================================================= -->
<!-- SMART FARMING FEATURES -->
<!-- ================================================= -->

<section id="feature" class="section-padding bg-light">

<div class="container">

<div class="text-center mb-5">

<h6 class="section-tag">
OUR FEATURES
</h6>

<h2 class="section-title">
Smart Farming Technology
</h2>

<p class="section-text">
Advanced technologies to improve productivity and sustainability.
</p>

</div>

<div class="row g-4">

<div class="col-lg-4 col-md-6">

<div class="feature-card">

<i class="fas fa-seedling feature-icon text-success"></i>

<h4>Hydroponic Farming</h4>

<p>
Efficient hydroponic cultivation with automated monitoring.
</p>

</div>

</div>

<div class="col-lg-4 col-md-6">

<div class="feature-card">

<i class="fas fa-temperature-high feature-icon text-danger"></i>

<h4>Temperature Monitoring</h4>

<p>
Realtime temperature monitoring using IoT sensors.
</p>

</div>

</div>

<div class="col-lg-4 col-md-6">

<div class="feature-card">

<i class="fas fa-tint feature-icon text-primary"></i>

<h4>Water Management</h4>

<p>
Automatic irrigation and water tank monitoring.
</p>

</div>

</div>

<div class="col-lg-4 col-md-6">

<div class="feature-card">

<i class="fas fa-chart-line feature-icon text-warning"></i>

<h4>Data Analytics</h4>

<p>
Visual dashboard with harvest and performance analytics.
</p>

</div>

</div>

<div class="col-lg-4 col-md-6">

<div class="feature-card">

<i class="fas fa-cloud feature-icon text-info"></i>

<h4>Cloud Integration</h4>

<p>
Store and access farming data securely from anywhere.
</p>

</div>

</div>

<div class="col-lg-4 col-md-6">

<div class="feature-card">

<i class="fas fa-mobile-screen feature-icon text-secondary"></i>

<h4>Mobile Access</h4>

<p>
Responsive dashboard for desktop, tablet and smartphone.
</p>

</div>

</div>

</div>

</div>

</section>

<!-- ================================================= -->
<!-- SERVICES -->
<!-- ================================================= -->

<section class="services-section">

<div class="container">

<div class="text-center mb-5">

<h6 class="section-tag">
OUR SERVICES
</h6>

<h2 class="section-title">
What We Provide
</h2>

</div>

<div class="row g-4">

<div class="col-lg-3 col-md-6">

<div class="service-card">

<i class="fas fa-leaf"></i>

<h5>Crop Monitoring</h5>

<p>Monitor crop growth using IoT technology.</p>

</div>

</div>

<div class="col-lg-3 col-md-6">

<div class="service-card">

<i class="fas fa-water"></i>

<h5>Smart Irrigation</h5>

<p>Automatic watering system based on soil moisture.</p>

</div>

</div>

<div class="col-lg-3 col-md-6">

<div class="service-card">

<i class="fas fa-camera"></i>

<h5>Live Camera</h5>

<p>View greenhouse conditions remotely.</p>

</div>

</div>

<div class="col-lg-3 col-md-6">

<div class="service-card">

<i class="fas fa-file-lines"></i>

<h5>Reporting</h5>

<p>Generate harvest and farming reports instantly.</p>

</div>

</div>

</div>

</div>

</section>

<!-- ================================================= -->
<!-- GALLERY -->
<!-- ================================================= -->

<section class="gallery-section">

<div class="container">

<div class="text-center mb-5">

<h6 class="section-tag">
PHOTO GALLERY
</h6>

<h2 class="section-title">
Smart Farming Activities
</h2>

</div>

<div class="row g-4">

<div class="col-lg-4">

<div class="gallery-item">

<img src="assets/images/gallery1.jpg"
     class="img-fluid rounded-4"
     alt="Gallery 1">

</div>

</div>

<div class="col-lg-4">

<div class="gallery-item">

<img src="assets/images/gallery2.jpg"
     class="img-fluid rounded-4"
     alt="Gallery 2">

</div>

</div>

<div class="col-lg-4">

<div class="gallery-item">

<img src="assets/images/gallery3.jpg"
     class="img-fluid rounded-4"
     alt="Gallery 3">

</div>

</div>

<div class="col-lg-4">

<div class="gallery-item">

<img src="assets/images/gallery4.jpg"
     class="img-fluid rounded-4"
     alt="Gallery 4">

</div>

</div>

<div class="col-lg-4">

<div class="gallery-item">

<img src="assets/images/gallery5.jpg"
     class="img-fluid rounded-4"
     alt="Gallery 5">

</div>

</div>

<div class="col-lg-4">

<div class="gallery-item">

<img src="assets/images/gallery6.jpg"
     class="img-fluid rounded-4"
     alt="Gallery 6">

</div>

</div>

</div>

</div>

</section>

<!-- ================================================= -->
<!-- VIDEO SHOWCASE -->
<!-- ================================================= -->

<section class="video-section">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6">

<h6 class="section-tag">
VIDEO PRESENTATION
</h6>

<h2 class="section-title">
Discover Smart Farming Innovation
</h2>

<p class="section-text">

Watch how Smart Farming Development Centre utilises
IoT sensors, cloud computing and modern farming
techniques to improve agricultural productivity.

</p>

<a href="#booking"
class="btn btn-primary-custom">

Book a Visit

</a>

</div>

<div class="col-lg-6">

<div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-lg">

<iframe
src="https://www.youtube.com/embed/dQw4w9WgXcQ"
title="Smart Farming Video"
allowfullscreen>
</iframe>

</div>

</div>

</div>

</div>

</section>

<!-- ================================================= -->
<!-- CALL TO ACTION -->
<!-- ================================================= -->

<section class="cta-section">

<div class="container">

<div class="cta-box text-center">

<h2>

Ready to Experience Smart Farming?

</h2>

<p>

Explore our dashboard, monitor IoT sensors,
and discover the future of agriculture.

</p>

<div class="mt-4">

<a href="dashboard.php"
class="btn btn-primary-custom me-3">

<i class="fas fa-chart-line"></i>

Open Dashboard

</a>

<a href="#booking"
class="btn btn-outline-custom">

<i class="fas fa-calendar-check"></i>

Book Harvest

</a>

</div>

</div>

</div>

</section>

<!-- ================================================= -->
<!-- ================================================= -->
<!-- BOOKING -->
<!-- ================================================= -->

<section id="booking" class="booking-section section-padding">

<div class="container">

<div class="text-center mb-5">

<h6 class="section-tag">
BOOKING
</h6>

<h2 class="section-title">
Harvest Booking Form
</h2>

<p class="section-text">

Book your visit or harvest session through the form below.

</p>

</div>

<div class="row">

<div class="col-lg-7">

<div class="glass-card p-4">

<form action="booking_process.php" method="POST">

<div class="row">

<div class="col-md-6 mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
placeholder="Enter your name"
required>

</div>

<div class="col-md-6 mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
placeholder="Enter your email"
required>

</div>

<div class="col-md-6 mb-3">

<label>Phone Number</label>

<input
type="text"
name="phone"
class="form-control"
placeholder="0123456789">

</div>

<div class="col-md-6 mb-3">

<label>Booking Date</label>

<input
type="date"
name="booking_date"
class="form-control"
required>

</div>

<div class="col-12 mb-3">

<label>Purpose</label>

<select
class="form-select"
name="purpose">

<option>Harvest Visit</option>
<option>Educational Visit</option>
<option>Research</option>
<option>Training</option>

</select>

</div>

<div class="col-12 mb-3">

<label>Remarks</label>

<textarea
class="form-control"
rows="5"
name="remarks"
placeholder="Write your message..."></textarea>

</div>

<div class="col-12">

<button
class="btn btn-primary-custom">

<i class="fas fa-paper-plane"></i>

Submit Booking

</button>

</div>

</div>

</form>

</div>

</div>

<div class="col-lg-5">

<div class="glass-card p-4 h-100">

<h4 class="mb-4">

<i class="fas fa-calendar-check"></i>

Booking Information

</h4>

<ul class="list-group list-group-flush">

<li class="list-group-item">

Monday - Friday

</li>

<li class="list-group-item">

8:00 AM - 5:00 PM

</li>

<li class="list-group-item">

Maximum 30 Visitors

</li>

<li class="list-group-item">

Advance Booking Required

</li>

<li class="list-group-item">

Confirmation by Email

</li>

</ul>

</div>

</div>

</div>

</div>

</section>

<!-- ================================================= -->
<!-- HARVEST SCHEDULE -->
<!-- ================================================= -->

<section class="schedule-section">

<div class="container">

<div class="text-center mb-5">

<h6 class="section-tag">

HARVEST SCHEDULE

</h6>

<h2 class="section-title">

Upcoming Activities

</h2>

</div>

<div class="row g-4">

<div class="col-lg-4">

<div class="schedule-card">

<h4>July 2026</h4>

<p>

Harvest Tomato

</p>

<span class="badge bg-success">

Available

</span>

</div>

</div>

<div class="col-lg-4">

<div class="schedule-card">

<h4>August 2026</h4>

<p>

Hydroponic Lettuce

</p>

<span class="badge bg-warning">

Limited

</span>

</div>

</div>

<div class="col-lg-4">

<div class="schedule-card">

<h4>September 2026</h4>

<p>

Chili Harvest

</p>

<span class="badge bg-primary">

Open

</span>

</div>

</div>

</div>

</div>

</section>

<!-- ================================================= -->
<!-- FAQ -->
<!-- ================================================= -->

<section class="faq-section section-padding">

<div class="container">

<div class="text-center mb-5">

<h6 class="section-tag">

FAQ

</h6>

<h2 class="section-title">

Frequently Asked Questions

</h2>

</div>

<div class="accordion" id="faqAccordion">

<div class="accordion-item">

<h2 class="accordion-header">

<button
class="accordion-button"
data-bs-toggle="collapse"
data-bs-target="#faq1">

What is Smart Farming?

</button>

</h2>

<div
id="faq1"
class="accordion-collapse collapse show"
data-bs-parent="#faqAccordion">

<div class="accordion-body">

Smart Farming uses IoT technologies to monitor crops in real time.

</div>

</div>

</div>

<div class="accordion-item">

<h2 class="accordion-header">

<button
class="accordion-button collapsed"
data-bs-toggle="collapse"
data-bs-target="#faq2">

Can students visit the farm?

</button>

</h2>

<div
id="faq2"
class="accordion-collapse collapse"
data-bs-parent="#faqAccordion">

<div class="accordion-body">

Yes. Educational visits are welcome with advance booking.

</div>

</div>

</div>

<div class="accordion-item">

<h2 class="accordion-header">

<button
class="accordion-button collapsed"
data-bs-toggle="collapse"
data-bs-target="#faq3">

Is the dashboard available online?

</button>

</h2>

<div
id="faq3"
class="accordion-collapse collapse"
data-bs-parent="#faqAccordion">

<div class="accordion-body">

Yes. The dashboard can be accessed securely through the web.

</div>

</div>

</div>

</div>

</div>

</section>

<!-- ================================================= -->
<!-- FEEDBACK -->
<!-- ================================================= -->

<section id="feedback" class="feedback-section">

<div class="container">

<div class="text-center mb-5">

<h6 class="section-tag">

TESTIMONIAL

</h6>

<h2 class="section-title">

Visitor Feedback

</h2>

</div>

<div class="row g-4">

<div class="col-lg-4">

<div class="testimonial-card">

<div class="stars">

★★★★★

</div>

<p>

"Very informative and interactive learning experience."

</p>

<h5>

Student

</h5>

</div>

</div>

<div class="col-lg-4">

<div class="testimonial-card">

<div class="stars">

★★★★★

</div>

<p>

"Excellent dashboard and IoT monitoring system."

</p>

<h5>

Lecturer

</h5>

</div>

</div>

<div class="col-lg-4">

<div class="testimonial-card">

<div class="stars">

★★★★★

</div>

<p>

"The future of agriculture starts here."

</p>

<h5>

Industry Partner

</h5>

</div>

</div>

</div>

</div>

</section>

<!-- ================================================= -->
<!-- ACHIEVEMENT -->
<!-- ================================================= -->

<section class="achievement-section">

<div class="container">

<div class="row text-center">

<div class="col-lg-3 col-md-6">

<h2 class="counter" data-target="100">

0

</h2>

<p>

Projects Completed

</p>

</div>

<div class="col-lg-3 col-md-6">

<h2 class="counter" data-target="250">

0

</h2>

<p>

Visitors

</p>

</div>

<div class="col-lg-3 col-md-6">

<h2 class="counter" data-target="20">

0

</h2>

<p>

IoT Sensors

</p>

</div>

<div class="col-lg-3 col-md-6">

<h2 class="counter" data-target="5">

0

</h2>

<p>

Awards

</p>

</div>

</div>

</div>

</section>

<!-- ================================================= -->
<!-- CALL TO ACTION -->
<!-- ================================================= -->

<section class="cta-section">

<div class="container">

<div class="cta-box text-center">

<h2>

Join Our Smart Farming Journey

</h2>

<p>

Experience modern agriculture through IoT technology, real-time monitoring and data analytics.

</p>

<a
href="login.php"
class="btn btn-primary-custom">

Login Dashboard

</a>

</div>

</div>

</section>

<!-- ================================================= -->
<!-- ================================================= -->
<!-- CONTACT -->
<!-- ================================================= -->

<section id="contact" class="contact-section section-padding">

<div class="container">

<div class="text-center mb-5">

<h6 class="section-tag">
CONTACT US
</h6>

<h2 class="section-title">
Get In Touch
</h2>

<p class="section-text">
Have questions? Contact us anytime.
</p>

</div>

<div class="row g-4">

<div class="col-lg-5">

<div class="glass-card p-4 h-100">

<h4 class="mb-4">
Contact Information
</h4>

<div class="contact-item mb-4">

<i class="fas fa-map-marker-alt"></i>

<div>

<h6>Location</h6>

<p>
Smart Farming Development Centre<br>
TVETMARA
</p>

</div>

</div>

<div class="contact-item mb-4">

<i class="fas fa-phone"></i>

<div>

<h6>Phone</h6>

<p>
+60 12-345 6789
</p>

</div>

</div>

<div class="contact-item mb-4">

<i class="fas fa-envelope"></i>

<div>

<h6>Email</h6>

<p>
smartfarming@tvetmara.edu.my
</p>

</div>

</div>

<div class="contact-item">

<i class="fas fa-clock"></i>

<div>

<h6>Office Hour</h6>

<p>

Monday - Friday

<br>

8:00 AM - 5:00 PM

</p>

</div>

</div>

</div>

</div>

<div class="col-lg-7">

<div class="glass-card p-4">

<form>

<div class="row">

<div class="col-md-6 mb-3">

<input
type="text"
class="form-control"
placeholder="Full Name"
required>

</div>

<div class="col-md-6 mb-3">

<input
type="email"
class="form-control"
placeholder="Email"
required>

</div>

<div class="col-12 mb-3">

<input
type="text"
class="form-control"
placeholder="Subject">

</div>

<div class="col-12 mb-3">

<textarea
rows="6"
class="form-control"
placeholder="Your Message"></textarea>

</div>

<div class="col-12">

<button
class="btn btn-primary-custom"
type="submit">

<i class="fas fa-paper-plane"></i>

Send Message

</button>

</div>

</div>

</form>

</div>

</div>

</div>

</div>

</section>

<!-- ================================================= -->
<!-- GOOGLE MAP -->
<!-- ================================================= -->

<section class="map-section">

<div class="container-fluid p-0">

<div class="ratio ratio-21x9">

<iframe

src="https://www.google.com/maps?q=TVETMARA&output=embed"

loading="lazy"

allowfullscreen>

</iframe>

</div>

</div>

</section>

<!-- ================================================= -->
<!-- FOOTER -->
<!-- ================================================= -->

<footer class="footer">

<div class="container">

<div class="row">

<div class="col-lg-4">

<img
src="assets/images/logo.png"
width="80"
alt="Logo">

<h4 class="mt-3">

Smart Farming Development Centre

</h4>

<p>

Empowering agriculture through IoT,
automation and smart technology.

</p>

</div>

<div class="col-lg-2">

<h5>

Quick Links

</h5>

<ul class="footer-links">

<li><a href="#home">Home</a></li>

<li><a href="#about">About</a></li>

<li><a href="#dashboard">Dashboard</a></li>

<li><a href="#booking">Booking</a></li>

</ul>

</div>

<div class="col-lg-3">

<h5>

Services

</h5>

<ul class="footer-links">

<li>IoT Monitoring</li>

<li>Hydroponic</li>

<li>Cloud Dashboard</li>

<li>Analytics</li>

</ul>

</div>

<div class="col-lg-3">

<h5>

Follow Us

</h5>

<div class="social-links">

<a href="#"><i class="fab fa-facebook-f"></i></a>

<a href="#"><i class="fab fa-instagram"></i></a>

<a href="#"><i class="fab fa-youtube"></i></a>

<a href="#"><i class="fab fa-linkedin"></i></a>

<a href="#"><i class="fab fa-tiktok"></i></a>

</div>

</div>

</div>

<hr>

<div class="text-center">

<p>

© <?php echo date("Y"); ?>

Smart Farming Development Centre (SFDC)

TVETMARA

All Rights Reserved.

</p>

</div>

</div>

</footer>

<!-- ================================================= -->
<!-- SCROLL TOP -->
<!-- ================================================= -->

<button id="scrollTop">

<i class="fas fa-arrow-up"></i>

</button>

<!-- ================================================= -->
<!-- JAVASCRIPT -->
<!-- ================================================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script src="https://cdn.jsdelivr.net/npm/typed.js@2.1.0/dist/typed.umd.js"></script>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

<script src="assets/js/script.js"></script>

<script>

AOS.init({

duration:1000,

once:true

});

new Typed("#typing",{

strings:[

"Modern Smart Farming Platform",

"Real-Time IoT Monitoring",

"Hydroponic Management System",

"TVETMARA Living Lab"

],

typeSpeed:50,

backSpeed:30,

backDelay:1800,

loop:true

});

if(typeof particlesJS!=="undefined"){

particlesJS("particles-js",{

particles:{

number:{value:80},

color:{value:"#00d084"},

shape:{type:"circle"},

opacity:{value:0.5},

size:{value:3},

line_linked:{

enable:true,

distance:150,

color:"#00d084",

opacity:0.3

},

move:{

enable:true,

speed:2

}

},

interactivity:{

events:{

onhover:{enable:true,mode:"repulse"},

onclick:{enable:true,mode:"push"}

}

},

retina_detect:true

});

}

</script>

</body>

</html>