<?php
session_start(); // 👈 CRITICAL: Start session FIRST

// Define page title
$page_title = "CCDI Senior High School - Grade 11 Requirements";
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

/* 🆕 PERFECT RESPONSIVE HEADER */
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

/* SAME COLOR SCHEME */
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

/* 🆕 REQUIREMENTS HERO SECTION */
.hero-section {
    background: linear-gradient(135deg, rgba(12, 78, 148, 0.95), rgba(0, 51, 102, 0.95));
    color: white;
    padding: 140px 20px 100px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="0.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    pointer-events: none;
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 800px;
    margin: 0 auto;
}

.hero-section h1 {
    font-size: clamp(2.5rem, 6vw, 4.5rem);
    font-weight: 800;
    margin-bottom: 25px;
    background: linear-gradient(135deg, #fff, #ffcc00);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-section p {
    font-size: 1.4rem;
    margin-bottom: 40px;
    opacity: 0.95;
}

.enroll-btn {
    background: linear-gradient(135deg, #ffcc00, #ff6b6b);
    color: #003366;
    padding: 20px 40px;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1.2rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 15px;
    box-shadow: 0 15px 40px rgba(255,204,0,0.4);
    transition: all 0.4s ease;
}

.enroll-btn:hover {
    transform: translateY(-5px);
    box-shadow: 0 25px 50px rgba(255,204,0,0.6);
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

/* REQUIREMENTS CARDS */
.steps-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
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
    font-size: 5rem;
    margin-bottom: 25px;
    display: block;
    text-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.feature-card h3 {
    font-size: 1.6rem;
    font-weight: 700;
    color: #003366;
    margin-bottom: 20px;
}

.feature-card p {
    color: #666;
    line-height: 1.7;
    font-size: 1.05rem;
}

/* ESC SECTION */
.esc-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-top: 60px;
}

/* CTA SECTION */
.cta-section {
    background: linear-gradient(135deg, #ff6b6b 0%, #ffcc00 50%, #003366 100%);
    color: white;
    text-align: center;
    padding: 120px 20px;
    position: relative;
    overflow: hidden;
}

.cta-section::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    33% { transform: translate(30px, -30px) rotate(120deg); }
    66% { transform: translate(-20px, 20px) rotate(240deg); }
}

.cta-content {
    position: relative;
    z-index: 2;
}

.cta-section h2 {
    font-size: clamp(2.5rem, 6vw, 4rem);
    font-weight: 800;
    margin-bottom: 25px;
}

.cta-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 40px;
}

.cta-btn {
    padding: 20px 35px;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1.1rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 12px;
    transition: all 0.4s ease;
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

.cta-primary {
    background: rgba(255,255,255,0.95);
    color: #003366;
}

.cta-secondary {
    background: rgba(255,255,255,0.2);
    color: white;
    border: 2px solid rgba(255,255,255,0.3);
    backdrop-filter: blur(10px);
}

.cta-btn:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.3);
}

/* 🆕 FOOTER STYLES */
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

/* RESPONSIVE */
@media (max-width: 1024px) {
    .header-container { height: auto; flex-direction: column; }
    .topbar { flex: none; width: 100%; height: 80px; padding: 0; }
    .topbar-content { padding: 0 25px; gap: 15px; }
    .topbar img { height: 60px; width: 60px; padding: 4px; }
    .topbar-info h1 { font-size: 1.2rem; }
    .navbar { flex: none; width: 100%; height: 70px; padding: 0; }
    .nav-container { padding: 0 25px; }
    .steps-grid, .esc-grid { grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); }
}

@media (max-width: 768px) {
    .header-container { height: auto; }
    .topbar { height: 75px; }
    .topbar-content { padding: 0 20px; gap: 12px; }
    .topbar img { height: 55px; width: 55px; }
    .topbar-info h1 { font-size: 1.1rem; }
    .topbar-info p { white-space: normal; }
    .navbar { height: 70px; }
    .nav-container { padding: 0 20px; }
    
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
    
    .nav-menu.active { left: 0; }
    .nav-menu li { width: 100%; margin-bottom: 10px; }
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
    
    .btn-search, .btn-apply { width: 100%; max-width: 280px; justify-content: center; }
    .mobile-menu-btn { 
        display: block; 
        position: absolute; 
        right: 20px; 
        top: 50%; 
        transform: translateY(-50%); 
        z-index: 1001;
    }
    
    .section { padding: 80px 15px; }
    .steps-grid, .esc-grid { grid-template-columns: 1fr; }
    .cta-buttons { flex-direction: column; align-items: center; }
    .footer-content { grid-template-columns: 1fr; gap: 30px; text-align: center; }
}

html { scroll-behavior: smooth; }

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.feature-card {
    animation: fadeInUp 0.8s ease forwards;
    opacity: 0;
}

.feature-card:nth-child(1) { animation-delay: 0.1s; }
.feature-card:nth-child(2) { animation-delay: 0.2s; }
.feature-card:nth-child(3) { animation-delay: 0.3s; }
.feature-card:nth-child(4) { animation-delay: 0.4s; }
.feature-card:nth-child(5) { animation-delay: 0.5s; }
    </style>
</head>
<body>

    <!-- 🆕 MODERN RESPONSIVE HEADER -->
    <div class="header-wrapper">
        <div class="header-container">
            <div class="topbar">
                <div class="topbar-content">
                    <img src="logo.jpg" alt="CCDI Senior High School Logo">
                    <div class="topbar-info">
                        <h1>CCDI Senior High School</h1>
                        <div class="topbar-tagline">Young Man Think Big! Aspire, Succeed...</div>
                    </div>
                </div>
            </div>

             <!-- NAVBAR - SAME COLOR AS TOPBAR -->
            <nav class="navbar">
                <div class="nav-container">
                    <ul class="nav-menu" id="navMenu">
                        <li><a href="user.php" class="nav-link active">Home</a></li>
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
    

    <!-- 🆕 REQUIREMENTS HERO -->
    <section class="hero-section">
        <div class="hero-content">
            <h1><i class="fas fa-clipboard-check"></i> Grade 11 Enrollment</h1>
            <p>✅ Simple 5-step process<br>📄 Complete documents in 10 minutes!<br>🎓 ESC Graduates: Direct Entry Available!</p>
            <a href="#requirements" class="enroll-btn">
                <i class="fas fa-arrow-down"></i> View All Requirements
            </a>
        </div>
    </section>

    <!-- STANDARD REQUIREMENTS -->
    <section id="requirements" class="section">
        <div class="container">
            <h2 class="section-title"><i class="fas fa-list-check"></i> Standard Requirements</h2>
            <p class="section-subtitle">Junior High School Graduates • Bring <strong>original + 2 photocopies</strong> of each document</p>
            
            <div class="steps-grid">
                <div class="feature-card">
                    <div class="feature-icon">📄</div>
                    <h3>Form 138 / Report Card</h3>
                    <p><strong>Latest Grade 10 card</strong><br>Complete Grades 1-10 academic records required</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🎖️</div>
                    <h3>Good Moral Certificate</h3>
                    <p><strong>From current Junior High School</strong><br>Certifies good character & behavior</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🆔</div>
                    <h3>Birth Certificate</h3>
                    <p><strong>PSA/NSO Birth Certificate</strong><br>1 original + 2 photocopies</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📸</div>
                    <h3>ID Pictures</h3>
                    <p><strong>4 pcs 2x2 pictures</strong><br><strong>4 pcs 1x1 pictures</strong><br>Recent, white background</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🏘️</div>
                    <h3>Barangay Clearance</h3>
                    <p><strong>Recent clearance</strong><br>From your barangay of residence</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ESC GRADUATES -->
    <section class="section" style="background: linear-gradient(135deg, #f8f9ff 0%, #e8f0ff 100%);">
        <div class="container">
            <h2 class="section-title">🎓 ESC Graduates - Direct Entry</h2>
            <p class="section-subtitle">Alternative Learning System completers can enroll Grade 11 directly!</p>
            
            <div class="esc-grid">
                <div class="feature-card">
                    <div class="feature-icon" style="color: #28a745; font-size: 6rem;">✅</div>
                    <h3>TESDA NC II/III + ESC</h3>
                    <p>Any TESDA National Certificate<br><strong>ESC Form 2B</strong> from ALS Provider</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📋</div>
                    <h3>Same Additional Docs</h3>
                    <p>✅ 2x2 & 1x1 Photos<br>✅ Birth Certificate<br>✅ Barangay Clearance</p>
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

    <!-- 🆕 ENHANCED JAVASCRIPT -->
    <script>
        // Mobile menu functionality
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navMenu = document.getElementById('navMenu');
        const menuIcon = mobileMenuBtn?.querySelector('i');
        
        if (mobileMenuBtn && navMenu && menuIcon) {
            mobileMenuBtn.addEventListener('click', () => {
                navMenu.classList.toggle('active');
                menuIcon.classList.toggle('fa-bars');
                menuIcon.classList.toggle('fa-times');
                document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
            });

            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', () => {
                    navMenu.classList.remove('active');
                    menuIcon.classList.remove('fa-times');
                    menuIcon.classList.add('fa-bars');
                    document.body.style.overflow = '';
                });
            });
        }

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
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

        document.querySelectorAll('.feature-card').forEach(card => {
            observer.observe(card);
        });

        // Search functionality
        document.querySelector('.btn-search')?.addEventListener('click', function(e) {
            e.preventDefault();
            alert('🔍 Search Requirements, Strands, or Programs!\n\nRequirements page active.');
        });
    </script>

</body>
</html>