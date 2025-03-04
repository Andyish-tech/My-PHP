<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern City Library</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
        
        /* Layout */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header */
        header {
            background-color: #ffffff;
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c3e50;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .nav-links {
            display: flex;
            gap: 1rem;
        }
        .nav-links a {
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .nav-links a:hover {
            background-color: #e0e0e0;
        }
        
        /* Hero Section */
        .hero {
            background-image: url(SRC/DALL·E\ 2025-01-13\ 09.55.47\ -\ A\ minimalist\ design\ of\ a\ black\ book\ with\ a\ clean\ and\ modern\ style\,\ placed\ against\ a\ white\ background.\ The\ book\ should\ have\ a\ sleek\ cover\ with\ no\ text\,.webp);
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            color: white;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        .cta-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: #3498db;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            font-size: 1.1rem;
            transition: background-color 0.3s;
        }
        .cta-button:hover {
            background-color: #2980b9;
        }
        
        /* Features Section */
        .features {
            padding: 4rem 0;
            background-color: #f9f9f9;
        }
        .features h2 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
        }
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        .feature {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s;
        }
        .feature:hover {
            transform: translateY(-5px);
        }
        .feature-icon {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
            color: #3498db;
        }
        .feature h3 {
            margin-bottom: 1rem;
        }
        
        /* Testimonials Section */
        .testimonials {
            padding: 4rem 0;
            background-color: #ffffff;
        }
        .testimonials h2 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
        }
        .testimonial-carousel {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
            position: relative;
        }
        .testimonial {
            display: none;
            padding: 2rem;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .testimonial.active {
            display: block;
        }
        .testimonial img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 1rem;
        }
        .testimonial p {
            font-style: italic;
            margin-bottom: 1rem;
            position: relative;
            padding: 0 2rem;
        }
        .testimonial p::before,
        .testimonial p::after {
            content: '"';
            font-size: 3rem;
            color: #3498db;
            position: absolute;
            top: -1rem;
        }
        .testimonial p::before {
            left: 0;
        }
        .testimonial p::after {
            right: 0;
            transform: rotate(180deg);
        }
        .testimonial-name {
            font-weight: bold;
        }
        
        /* Footer */
        footer {
            background-color: #2c3e50;
            color: white;
            padding: 3rem 0;
        }
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }
        .footer-section h3 {
            margin-bottom: 1rem;
        }
        .social-links {
            display: flex;
            gap: 1rem;
        }
        .social-links a {
            color: white;
            font-size: 1.5rem;
        }
        .newsletter-form {
            display: flex;
            gap: 0.5rem;
        }
        .newsletter-form input[type="email"] {
            flex-grow: 1;
            padding: 0.5rem;
        }
        .newsletter-form button {
            padding: 0.5rem 1rem;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            .hero h1 {
                font-size: 2rem;
            }
            .hero p {
                font-size: 1rem;
            }
            .feature-grid {
                grid-template-columns: 1fr;
            }
            .footer-content {
                grid-template-columns: 1fr;
            }
            .newsletter-form {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav class="container">
            <div class="logo">
                <i data-lucide="book-open"></i>
                Modern City Library
            </div>
            <div class="nav-links">
                <a href="index.php"><i data-lucide="home"></i> Home</a>
                <a href="Books.php"><i data-lucide="book"></i> Books</a>
                <a href="login.php"><i data-lucide="log-in"></i> Login</a>
                <a href="register.php"><i data-lucide="user-plus"></i> Register</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Welcome to Our Library</h1>
                <p>Discover a world of knowledge and imagination</p>
                <a href="Books.php" class="cta-button">
                    Explore Now
                    <i data-lucide="arrow-right"></i>
                </a>
            </div>
        </section>

        <section class="features">
            <div class="container">
                <h2>Our Features</h2>
                <div class="feature-grid">
                    <div class="feature">
                        <i data-lucide="book" class="feature-icon"></i>
                        <h3>Wide Selection of Books</h3>
                        <p>Explore our vast collection of books across various genres.</p>
                    </div>
                    <div class="feature">
                        <i data-lucide="globe" class="feature-icon"></i>
                        <h3>Online Access</h3>
                        <p>Access our digital library anytime, anywhere.</p>
                    </div>
                    <div class="feature">
                        <i data-lucide="calendar" class="feature-icon"></i>
                        <h3>Community Events</h3>
                        <p>Join our book clubs, workshops, and author meet-ups.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="testimonials">
            <div class="container">
                <h2>What Our Members Say</h2>
                <div class="testimonial-carousel">
                    <div class="testimonial active">
                        <img src="SRC/openart-image_2Q3GRxgS_1736756232730_raw.jpg" alt="John Doe">
                        <p>"The library has transformed my reading habits. I love the wide selection and the helpful staff!"</p>
                        <span class="testimonial-name">GISUBIZO James</span>
                    </div>
                    <div class="testimonial">
                        <img src="SRC/openart-image_mU1RCiRv_1736756233090_raw.jpg" alt="Jane Smith">
                        <p>"The online access feature is a game-changer. I can read my favorite books anytime, anywhere!"</p>
                        <span class="testimonial-name">KWIZERA David</span>
                    </div>
                    <div class="testimonial">
                        <img src="SRC/openart-image_vnUdn5qY_1736756233020_raw.jpg" alt="Mike Johnson">
                        <p>"The community events have helped me connect with fellow book lovers. It's more than just a library!"</p>
                        <span class="testimonial-name">RUKIZANGABO Armand Benjamin</span>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container footer-content">
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p><i data-lucide="map-pin"></i> Kigali, Kicukiro, Kanombe</p>
                <p><i data-lucide="phone"></i> +250 781 087 919</p>
                <p><i data-lucide="mail"></i> info@moderncitylibrary.com</p>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i data-lucide="facebook"></i></a>
                    <a href="#" aria-label="Twitter"><i data-lucide="twitter"></i></a>
                    <a href="#" aria-label="Instagram"><i data-lucide="instagram"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Subscribe to Our Newsletter</h3>
                <form class="newsletter-form">
                    <input type="email" placeholder="Enter your email" required>
                    <button type="submit">
                        <i data-lucide="send"></i>
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </footer>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Simple testimonial carousel
        const testimonials = document.querySelectorAll('.testimonial');
        let currentTestimonial = 0;

        function showNextTestimonial() {
            testimonials[currentTestimonial].classList.remove('active');
            currentTestimonial = (currentTestimonial + 1) % testimonials.length;
            testimonials[currentTestimonial].classList.add('active');
        }

        setInterval(showNextTestimonial, 5000); // Change testimonial every 5 seconds
    </script>
</body>
</html>