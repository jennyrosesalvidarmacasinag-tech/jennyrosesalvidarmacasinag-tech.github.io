<?php
session_start(); // 👈 CRITICAL: Start session FIRST

// Define page title
$page_title = "CCDI Senior High School - Grade 11 & 12 Excellence";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
* { 
    margin: 0; 
    padding: 0; 
    box-sizing: border-box; 
}

body { 
    font-family: "Poppins", sans-serif; 
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    color: #333; 
    overflow-x: hidden; 
    line-height: 1.6;
}

/* 🆕 FIXED: ENHANCED RESPONSIVE HEADER - SAME COLORS */
.header-wrapper {
    position: sticky;
    top: 0;
    z-index: 1000;
    background: transparent;
    backdrop-filter: blur(20px);
    box-shadow: 0 2px 20px rgba(0,0,0,0.1);
}

.header-container {
    width: 100%;
    max-width: none;
    margin: 0;
    display: flex;
    align-items: stretch;
    gap: 0;
    height: 100px;
}

/* 🆕 SAME COLOR SCHEME FOR TOPBAR & NAVBAR */
.topbar, .navbar {
    background: rgba(12, 78, 148, 0.98);
    backdrop-filter: blur(20px);
    color: white;
    flex: 1;
    height: 100px;
    display: flex;
    align-items: center;
    position: relative;
}

/* Topbar Content */
.topbar-content {
    display: flex;
    align-items: center;
    gap: 20px;
    width: 100%;
    padding: 0 30px;
    flex-wrap: nowrap;
}

.topbar img {
    height: 70px; 
    width: 70px; 
    border-radius: 50%; 
    background: linear-gradient(135deg, #fff, #f0f0f0);
    padding: 6px; 
    box-shadow: 0 6px 20px rgba(0,0,0,0.3); 
    border: 3px solid #ffcc00;
    flex-shrink: 0;
}

.topbar-info {
    flex: 1;
    min-width: 0;
}

.topbar-info h1 { 
    font-size: 1.3rem;
    color: #fff;
    font-weight: 700; 
    margin: 0 0 2px 0;
    line-height: 1.25;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.topbar-info p { 
    margin: 0; 
    font-size: 0.85rem;
    color: rgba(255,255,255,0.9);
    line-height: 1.3;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.topbar-tagline {
    font-size: 0.7rem;
    font-weight: 600;
    color: #ffcc00;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-top: 2px;
}

/* Navbar Content */
.nav-container {
    max-width: 1400px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 30px;
    width: 100%;
    height: 100%;
}

.nav-menu {
    display: flex;
    list-style: none;
    gap: 30px;
    align-items: center;
}

.nav-link {
    color: #fff !important;
    text-decoration: none;
    font-weight: 500;
    font-size: 0.95rem;
    padding: 10px 0;
    position: relative;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.nav-link:hover, .nav-link.active {
    color: #ffcc00 !important;
}

.nav-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 3px;
    background: linear-gradient(90deg, #ffcc00, #fff);
    transition: width 0.3s ease;
}

.nav-link:hover::after, .nav-link.active::after {
    width: 100%;
}

.action-buttons {
    display: flex;
    gap: 12px;
    align-items: center;
}

.btn-login, .btn-search, .btn-apply {
    padding: 8px 20px;
    border-radius: 25px;
    font-weight: 600;
    font-size: 0.85rem;
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 6px;
}

.btn-search {
    background: rgba(255,255,255,0.2);
    border: 2px solid rgba(255,255,255,0.3);
    color: #fff;
}

.btn-search:hover {
    background: rgba(255,255,255,0.3);
    border-color: #ffcc00;
    color: #ffcc00;
}

.btn-apply {
    background: linear-gradient(135deg, #ffcc00, #ff6b6b);
    color: #003366;
    box-shadow: 0 5px 15px rgba(255,204,0,0.4);
}

.btn-apply:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(255,204,0,0.6);
}

.mobile-menu-btn {
    display: none;
    background: rgba(255,255,255,0.2);
    border: 2px solid rgba(255,255,255,0.3);
    color: #fff;
    font-size: 1.2rem;
    padding: 8px;
    border-radius: 50%;
    cursor: pointer;
    backdrop-filter: blur(10px);
}

/* 🆕 ULTRA RESPONSIVE MOBILE MENU */
@media (max-width: 1024px) {
    .header-container {
        height: auto;
        flex-direction: column;
    }
    
    .topbar {
        flex: none;
        width: 100%;
        height: 80px;
        padding: 0;
    }
    
    .topbar-content {
        padding: 0 25px;
        gap: 15px;
    }
    
    .topbar img {
        height: 60px;
        width: 60px;
        padding: 4px;
    }
    
    .topbar-info h1 {
        font-size: 1.2rem;
    }
    
    .navbar {
        flex: none;
        width: 100%;
        height: 70px;
        padding: 0;
    }
    
    .nav-container {
        padding: 0 25px;
    }
    
    .nav-menu {
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .header-container {
        height: auto;
    }
    
    .topbar {
        height: 75px;
    }
    
    .topbar-content {
        padding: 0 20px;
        gap: 12px;
    }
    
    .topbar img {
        height: 55px;
        width: 55px;
    }
    
    .topbar-info h1 {
        font-size: 1.1rem;
    }
    
    .topbar-info p {
        font-size: 0.8rem;
        white-space: normal;
    }
    
    .navbar {
        height: 70px;
    }
    
    .nav-container {
        padding: 0 20px;
    }
    
    .nav-menu {
        position: fixed;
        top: 145px;
        left: -100%;
        width: 100%;
        height: calc(100vh - 145px);
        background: rgba(0,51,102,0.98);
        backdrop-filter: blur(20px);
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        padding: 40px 20px;
        gap: 0;
        transition: left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }
    
    .nav-menu.active {
        left: 0;
    }
    
    .nav-menu li {
        width: 100%;
        margin-bottom: 10px;
    }
    
    .nav-link {
        display: block;
        padding: 15px 20px;
        width: 100%;
        text-align: center;
        font-size: 1.1rem;
        border-radius: 12px;
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2);
    }
    
    .nav-link:hover, .nav-link.active {
        background: rgba(255,204,0,0.2);
        border-color: #ffcc00;
        transform: scale(1.02);
    }
    
    .action-buttons {
        flex-direction: column;
        gap: 12px;
        margin-top: 20px;
        width: 100%;
    }
    
    .btn-search, .btn-apply {
        width: 100%;
        max-width: 280px;
        justify-content: center;
    }
    
    .mobile-menu-btn {
        display: block;
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1001;
    }
}

@media (max-width: 480px) {
    .topbar {
        height: 70px;
    }
    
    .topbar-content {
        padding: 0 15px;
        gap: 10px;
    }
    
    .topbar img {
        height: 50px;
        width: 50px;
    }
    
    .topbar-info h1 {
        font-size: 1rem;
    }
    
    .topbar-info p {
        font-size: 0.75rem;
    }
    
    .navbar {
        height: 65px;
    }
    
    .nav-container {
        padding: 0 15px;
    }
    
    .nav-menu {
        top: 135px;
        padding: 30px 15px;
    }
}

/* VIDEO HERO */
.video-hero {
    position: relative;
    background: #000;
    overflow: hidden;
    min-height: 100vh;
    display: flex;
    align-items: flex-end;
    justify-content: flex-start;
    padding: 0 20px 80px 40px;
}

.video-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.hero-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 1;
}

.video-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 4, 33, 0.28);
    z-index: 2;
}

.hero-content {
    position: relative;
    z-index: 3;
    max-width: 600px;
    margin: 0;
    padding: 40px 0 20px;
    text-align: left;
    color: rgba(255, 255, 255, 0.95);
    text-shadow: 0 2px 10px rgba(0,0,0,0.7);
}

.hero-content p {
    font-size: 1.3rem;
    margin-bottom: 40px;
}

.enroll-btn {
    background: linear-gradient(135deg, #ffcc00, #ff6b6b);
    color: #003366;
    padding: 18px 35px;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1.1rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 10px 30px rgba(255,204,0,0.4);
    transition: all 0.4s ease;
}

.enroll-btn:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(255,204,0,0.6);
}

/* GENERAL SECTION STYLES */
.section { 
    padding: 100px 20px; 
    position: relative;
}

.container { 
    max-width: 1400px; 
    margin: 0 auto; 
    padding: 0 20px;
}

.section-title {
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 800;
    text-align: center;
    margin-bottom: 20px;
    background: linear-gradient(135deg, #003366, #0052cc);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.section-subtitle {
    font-size: 1.2rem;
    text-align: center;
    color: #666;
    max-width: 800px;
    margin: 0 auto 60px;
    font-weight: 400;
    line-height: 1.6;
}

/* FEATURES GRID */
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-top: 60px;
}

.feature-card {
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(20px);
    padding: 40px 30px;
    border-radius: 25px;
    text-align: center;
    box-shadow: 0 20px 60px rgba(0,0,0,0.1);
    border: 1px solid rgba(255,255,255,0.2);
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    position: relative;
    overflow: hidden;
}

.feature-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #ffcc00, #ff6b6b, #ffcc00);
    background-size: 200% 100%;
    animation: shimmer 3s infinite;
}

@keyframes shimmer {
    0%, 100% { background-position: 200% 0; }
    50% { background-position: 0 0; }
}

.feature-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 30px 80px rgba(0,0,0,0.2);
}

.feature-icon {
    font-size: 4rem;
    margin-bottom: 20px;
    display: block;
}

.feature-card h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #003366;
    margin-bottom: 15px;
}

.feature-card p {
    color: #666;
    line-height: 1.7;
    font-size: 1rem;
}

/* STRANDS GRID */
.strands-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
    gap: 40px;
    margin-top: 60px;
}

.strand-card {
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(20px);
    padding: 50px 40px;
    border-radius: 25px;
    text-align: center;
    box-shadow: 0 20px 60px rgba(0,0,0,0.1);
    border: 1px solid rgba(255,255,255,0.2);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.strand-card::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255,204,0,0.1), transparent);
    transform: rotate(45deg);
    transition: all 0.6s ease;
}

.strand-card:hover::before {
    animation: shine 0.8s ease-in-out;
}

@keyframes shine {
    0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
    100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
}

.strand-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 30px 80px rgba(0,51,102,0.2);
}

.strand-icon {
    font-size: 5rem;
    color: #ffcc00;
    margin-bottom: 25px;
    display: block;
    text-shadow: 0 5px 20px rgba(255,204,0,0.4);
}

.strand-card h3 {
    font-size: 2rem;
    font-weight: 800;
    color: #003366;
    margin-bottom: 30px;
    background: linear-gradient(135deg, #003366, #0052cc);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.strand-list {
    list-style: none;
    text-align: left;
}

.strand-list li {
    padding: 12px 0;
    font-size: 1.1rem;
    color: #555;
    position: relative;
    padding-left: 30px;
    border-bottom: 1px solid rgba(0,0,0,0.05);
}

.strand-list li:last-child {
    border-bottom: none;
}

.strand-list li::before {
    content: '▸';
    position: absolute;
    left: 0;
    color: #ffcc00;
    font-size: 1.2rem;
    font-weight: bold;
}

/* CONTACT SECTION */
.contact-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
}

.contact-hero {
    text-align: center;
    margin-bottom: 80px;
}

.contact-hero h2 {
    font-size: clamp(2.5rem, 6vw, 4rem);
    font-weight: 800;
    background: linear-gradient(135deg, #003366, #0052cc);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 20px;
}

.contact-hero p {
    font-size: 1.3rem;
    color: #666;
    max-width: 600px;
    margin: 0 auto;
}

.contact-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

.contact-card, .map-card {
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    padding: 40px 30px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.1);
    border: 1px solid rgba(255,255,255,0.2);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.contact-card:hover, .map-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 30px 80px rgba(0,0,0,0.2);
}

.contact-icon {
    font-size: 4rem;
    margin-bottom: 25px;
    display: block;
    text-shadow: 0 5px 20px rgba(0,0,0,0.2);
}

.contact-card h3 {
    font-size: 1.6rem;
    font-weight: 700;
    color: #003366;
    margin-bottom: 20px;
}

.contact-card p {
    color: #666;
    line-height: 1.7;
    margin-bottom: 25px;
    font-size: 1rem;
}

.contact-link {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, #ffcc00, #ff6b6b);
    color: #003366;
    padding: 15px 25px;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    font-size: 1rem;
    transition: all 0.3s ease;
    box-shadow: 0 10px 30px rgba(255,204,0,0.4);
}

.contact-link:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(255,204,0,0.6);
    color: #003366;
}

.map-header {
    margin-bottom: 25px;
}

.map-header h3 {
    font-size: 1.6rem;
    font-weight: 700;
    color: #003366;
    display: flex;
    align-items: center;
    gap: 12px;
}

.map-container {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

.map-container iframe {
    width: 100%;
    height: 300px;
    border: none;
    display: block;
}

/* FOOTER */
footer {
    background: linear-gradient(135deg, rgba(0,51,102,0.98), rgba(0,86,179,0.98));
    color: white;
    margin-top: 100px;
}

.footer-content {
    max-width: 1400px;
    margin: 0 auto;
    padding: 60px 20px 40px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
}

.footer-section h3 {
    font-size: 1.3rem;
    font-weight: 700;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 12px;
    color: #ffcc00;
}

.footer-section p {
    margin-bottom: 15px;
    color: rgba(255,255,255,0.9);
    line-height: 1.6;
}

.footer-section a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: color 0.3s ease;
    display: block;
    margin-bottom: 10px;
}

.footer-section a:hover {
    color: #ffcc00;
}

.social-links {
    display: flex;
    gap: 15px;
    margin-top: 20px;
}

.social-links a {
    width: 50px;
    height: 50px;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.social-links a:hover {
    background: #ffcc00;
    color: #003366;
    transform: translateY(-3px) scale(1.1);
}

.footer-bottom {
    background: rgba(0,0,0,0.2);
    text-align: center;
    padding: 20px;
    border-top: 1px solid rgba(255,255,255,0.1);
}

.footer-bottom p {
    margin: 0;
    font-size: 0.9rem;
    color: rgba(255,255,255,0.8);
}

/* RESPONSIVE ADJUSTMENTS */
@media (max-width: 1024px) {
    .section { padding: 80px 20px; }
    .features-grid { grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px; }
    .strands-grid { grid-template-columns: 1fr; gap: 30px; }
    .contact-grid { grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); }
}

@media (max-width: 768px) {
    .section { padding: 60px 15px; }
    .container { padding: 0 15px; }
    .features-grid { grid-template-columns: 1fr; gap: 20px; }
    .feature-card { padding: 30px 25px; }
    .strand-card { padding: 40px 30px; }
    .strand-icon { font-size: 4rem; }
    .contact-grid { grid-template-columns: 1fr; gap: 25px; }
    .contact-card, .map-card { padding: 30px 25px; }
    .footer-content { grid-template-columns: 1fr; gap: 30px; text-align: center; }
}

@media (max-width: 480px) {
    .section { padding: 50px 15px; }
    .feature-card, .strand-card, .contact-card, .map-card { padding: 25px 20px; }
    .section-title { font-size: 2rem; }
    .section-subtitle { font-size: 1.1rem; }
    .map-container iframe { height: 250px; }
}

/* SMOOTH SCROLLING & ANIMATIONS */
html {
    scroll-behavior: smooth;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.feature-card, .strand-card, .contact-card {
    animation: fadeInUp 0.8s ease forwards;
    opacity: 0;
}

.feature-card:nth-child(1) { animation-delay: 0.1s; }
.feature-card:nth-child(2) { animation-delay: 0.2s; }
.feature-card:nth-child(3) { animation-delay: 0.3s; }
.feature-card:nth-child(4) { animation-delay: 0.4s; }
.feature-card:nth-child(5) { animation-delay: 0.5s; }
.feature-card:nth-child(6) { animation-delay: 0.6s; }
.feature-card:nth-child(7) { animation-delay: 0.7s; }
.feature-card:nth-child(8) { animation-delay: 0.8s; }
    </style>
</head>
<body>
    <!-- 🆕 PERFECTLY RESPONSIVE HEADER -->
    <div class="header-wrapper">
        <div class="header-container">
            <!-- TOPBAR - SAME COLOR AS NAVBAR -->
            <div class="topbar">
                <div class="topbar-content">
                    <img src="logo.jpg" alt="CCDI Senior High School Logo">
                    <div class="topbar-info">
                        <h1>Computer Communication Development Institute</h1>
                        <div class="topbar-tagline">Young Man Think Big! Aspire, Succeed...</div>
                    </div>
                </div>
            </div>

            <!-- NAVBAR - SAME COLOR AS TOPBAR -->
            <nav class="navbar">
                <div class="nav-container">
                    <ul class="nav-menu" id="navMenu">
                        <li><a href="#home" class="nav-link active">Home</a></li>
                        <li><a href="#features" class="nav-link">Why CCDI?</a></li>
                        <li><a href="#strands" class="nav-link">Strands</a></li>
                        <li><a href="requirements.php" class="nav-link">Requirements</a></li>
                        <li><a href="enroll.php" class="nav-link">Enroll</a></li>
                        <li><a href="#contact" class="nav-link">Contact</a></li>
                    </ul>
                    
                    <button class="mobile-menu-btn" id="mobileMenuBtn">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </nav>
        </div>
    </div>

    <!-- HERO SECTION -->
    <section id="home" class="hero-section video-hero">
        <div class="video-container">
            <video autoplay muted loop playsinline class="hero-video">
                <source src="vid.mp4" type="video/mp4">        
            </video>
            <div class="video-overlay"></div>
        </div>
        
        <div class="hero-content">
            <p>“Shape your future with CCDI’s Senior High School programs – your gateway to top universities and careers!”</p>
            <a href="enroll.php" class="enroll-btn">
                <i class="fas fa-rocket"></i> Start Your SHS Journey
            </a>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section id="features" class="section">
        <div class="container">
            <h2 class="section-title">Why Choose CCDI Senior High?</h2>
            <p class="section-subtitle">DepEd-accredited programs with 98% college admission rate, industry partnerships, and amazing student benefits</p>
            
            <div class="features-grid">
                <div class="feature-card card">
                    <div class="feature-icon">📚</div>
                    <h3>DepEd Accredited</h3>
                    <p>Fully recognized Senior High School programs meeting national standards for college admission.</p>
                </div>
                <div class="feature-card card">
                    <div class="feature-icon">🎯</div>
                    <h3>98% Pass Rate</h3>
                    <p>Proven track record of academic excellence and successful university placements.</p>
                </div>
                <div class="feature-card card">
                    <div class="feature-icon">🏆</div>
                    <h3>College Ready</h3>
                    <p>Prepare for UPCAT, DLSUCET, and all major university entrance exams.</p>
                </div>
                <div class="feature-card card">
                    <div class="feature-icon">💼</div>
                    <h3>Industry Partners</h3>
                    <p>Direct pathways to jobs and internships with our corporate partners.</p>
                </div>
                <div class="feature-card card">
                    <div class="feature-icon">🌟</div>
                    <h3>Small Classes</h3>
                    <p>Personalized attention with 1:20 teacher-student ratio for maximum learning.</p>
                </div>
                <div class="feature-card card">
                    <div class="feature-icon">🎁</div>
                    <h3>Zero Tuition Fees</h3>
                    <p>Senior High School Voucher Program accepted - No tuition & miscellaneous fees!</p>
                </div>
                <div class="feature-card card">
                    <div class="feature-icon">👕</div>
                    <h3>Free Uniforms</h3>
                    <p>Free school uniform, P.E. uniform, school I.D, and Wi-Fi access included.</p>
                </div>
                <div class="feature-card card">
                    <div class="feature-icon">💰</div>
                    <h3>₱1,500 Cash Assistance</h3>
                    <p>Receive ₱1,500 educational assistance upon enrollment.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- STRANDS SECTION -->
    <section id="strands" class="section" style="background: linear-gradient(135deg, #f8f9ff 0%, #e8f0ff 100%);">
        <div class="container">
            <h2 class="section-title"><i class="fas fa-school"></i> Senior High School Programs</h2>
            <p class="section-subtitle">Choose from our DepEd-approved Academic and TVL strands designed for college and career success!</p>
            
            <div class="strands-grid">
                <div class="strand-card card">
                    <i class="fas fa-book strand-icon"></i>
                    <h3>Academic Track</h3>
                    <ul class="strand-list">
                        <li><strong>Accountancy, Business and Management (ABM)</strong></li>
                        <li>Humanities and Social Sciences (HUMSS)</li>
                        <li>General Academic Strand (GAS)</li>
                        <li>Science, Technology, Engineering and Mathematics (STEM)</li>
                    </ul>
                </div>

                <div class="strand-card card">
                    <i class="fas fa-laptop-code strand-icon"></i>
                    <h3>Technical-Vocational Livelihood (TVL)</h3>
                    <ul class="strand-list">
                        <li><strong>Information Communication Technology (ICT)</strong></li>
                        <li>.Net Technology NCIII</li>
                        <li>Java Programming NCIII</li>
                        <li>Computer System Servicing NCII</li>
                        <li>Medical Transcription NCII</li>
                        <li>Computer Animation NCII</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 🆕 MODERN CONTACT SECTION -->
    <section id="contact" class="section">
        <div class="contact-container">
            <div class="contact-hero">
                <h2><i class="fas fa-headset"></i> Get In Touch</h2>
                <p>Ready for Grade 11? We're here to help you start your journey to success!</p>
            </div>

            <div class="contact-grid">
                <div class="contact-card">
                    <i class="fas fa-phone contact-icon" style="color: #28a745;"></i>
                    <h3>Call / WhatsApp</h3>
                    <p><strong>📱 Globe:</strong> 0917-XXX-XXXX<br>
                       <strong>📶 Smart:</strong> 0998-XXX-XXXX<br>
                       <strong>🕒 Hours:</strong> Mon-Sat 8AM-6PM</p>
                    <a href="tel:09171234567" class="contact-link">
                        <i class="fas fa-phone"></i> Call Now
                    </a>
                </div>

                <div class="contact-card">
                    <i class="fas fa-map-marker-alt contact-icon" style="color: #ff6b6b;"></i>
                    <h3>Visit Us</h3>
                    <p><strong>CCDI Senior High School</strong><br>
                       Sikatuna St., Old Albay<br>
                       Legazpi City, Albay 4500</p>
                    <a href="https://maps.google.com/?q=Sikatuna+St.,+Old+Albay,+Legazpi+City" target="_blank" class="contact-link">
                        <i class="fas fa-directions"></i> Get Directions
                    </a>
                </div>

                <div class="contact-card">
                    <i class="fas fa-envelope contact-icon" style="color: #ffd93d;"></i>
                    <h3>Email Us</h3>
                    <p>Have questions about our programs?<br>
                       Our admissions team responds within 24 hours!</p>
                    <a href="mailto:shs@ccdicollege.edu.ph" class="contact-link">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </a>
                </div>

                <div class="map-card">
                    <div class="map-header">
                        <h3><i class="fas fa-map"></i> Find Our Campus</h3>
                    </div>
                    <div class="map-container">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15658.123456789!2d123.732999!3d13.139999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a5f8b8b8b8b8b8%3A0x1234567890abcdef!2sSikatuna%20St%2C%20Old%20Albay%2C%20Legazpi%20City!5e0!3m2!1sen!2sph!4v1700000000000!5m2!1sen!2sph" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 🆕 PROFESSIONAL FOOTER -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3><i class="fas fa-school"></i> CCDI Senior High School</h3>
                <p>DepEd-accredited programs preparing Grade 11 & 12 students for top universities and successful careers.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3><i class="fas fa-book"></i> Quick Links</h3>
                <p><a href="user.php">Home</a></p>
                <p><a href="requirements.php">Requirements</a></p>
                <p><a href="enroll.php">Enroll Now</a></p>
                <p><a href="#">Strands Offered</a></p>
            </div>
            
            <div class="footer-section">
                <h3><i class="fas fa-info-circle"></i> Programs</h3>
                <p><a href="#">ABM Strand</a></p>
                <p><a href="#">STEM Strand</a></p>
                <p><a href="#">ICT - TVL</a></p>
                <p><a href="#">Zero Tuition</a></p>
            </div>
            
            <div class="footer-section">
                <h3><i class="fas fa-clock"></i> Contact Info</h3>
                <p>Sikatuna St., Old Albay<br>Legazpi City, Albay 4500</p>
                <p>📱 0917-XXX-XXXX | 0998-XXX-XXXX</p>
                <p>✉️ shs@ccdicollege.edu.ph</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2025 CCDI Senior High School. All rights reserved. | DepEd Accredited</p>
        </div>
    </footer>

    <script>
        // 🆕 ENHANCED MOBILE MENU JAVASCRIPT
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navMenu = document.getElementById('navMenu');
        const menuIcon = mobileMenuBtn?.querySelector('i');
        
        if (mobileMenuBtn && navMenu && menuIcon) {
            mobileMenuBtn.addEventListener('click', () => {
                navMenu.classList.toggle('active');
                menuIcon.classList.toggle('fa-bars');
                menuIcon.classList.toggle('fa-times');
                
                // Prevent body scroll when menu is open
                document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
            });

            // Close menu when clicking on nav links
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', () => {
                    navMenu.classList.remove('active');
                    menuIcon.classList.remove('fa-times');
                    menuIcon.classList.add('fa-bars');
                    document.body.style.overflow = '';
                });
            });
        }

        // Close menu on outside click
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 768 && navMenu?.classList.contains('active')) {
                if (!e.target.closest('.navbar')) {
                    navMenu.classList.remove('active');
                    menuIcon?.classList.remove('fa-times');
                    menuIcon?.classList.add('fa-bars');
                    document.body.style.overflow = '';
                }
            }
        });

        // Close mobile menu on window resize to desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                navMenu?.classList.remove('active');
                menuIcon?.classList.remove('fa-times');
                menuIcon?.classList.add('fa-bars');
                document.body.style.overflow = '';
            }
        });

        // Search Button
        document.querySelector('.btn-search')?.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            alert('🔍 Search feature coming soon!\nSearch for programs, strands, requirements, and more.');
        });

        // Smooth Scrolling & Active Nav
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'start' 
                    });
                }
            });
        });

        window.addEventListener('scroll', () => {
            let current = '';
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link');
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (scrollY >= sectionTop - 200) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}` || 
                    (link.getAttribute('href') === '#home' && current === 'home') ||
                    (link.getAttribute('href') === '#home' && current === '')) {
                    link.classList.add('active');
                }
            });
        });

        // Animate cards on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.feature-card, .strand-card, .contact-card').forEach(card => {
            observer.observe(card);
        });
    </script>
</body>
</html>