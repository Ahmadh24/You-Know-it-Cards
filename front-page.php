<?php
/**
 * Template Name: Homepage
 * 
 * This is the custom homepage template for YouKnowItCards
 */

get_header(); ?>

<style>
/* MOBILE BRICK BACKGROUND - INLINE CSS */
@media screen and (max-width: 768px) {
    html, body {
        background: url('https://youknowitcards.net/wp-content/uploads/2025/09/brickwall.png') center center scroll repeat !important;
        background-size: auto !important;
    }
}

/* LANDSCAPE MOBILE BRICK BACKGROUND */
@media screen and (max-height: 500px) and (orientation: landscape) {
    html, body {
        background: url('https://youknowitcards.net/wp-content/uploads/2025/09/brickwall.png') center center scroll repeat !important;
        background-size: auto !important;
    }

    /* Center content in landscape mode */
    .hero-section, .hero-content, .hero-title-section {
        text-align: center !important;
        justify-content: center !important;
    }

    .hero-main-title {
        text-align: center !important;
    }
}

/* MOBILE BUTTONS POSITIONING - FRONT PAGE ONLY */
@media screen and (max-width: 768px) {
    .hero-buttons {
        margin-top: -50px !important;
        margin-bottom: 30px !important;
        position: relative !important;
        z-index: 999 !important;
    }
    
    /* Make buttons pill-shaped on mobile */
    .hero-buttons .btn {
        border-radius: 100px !important;
        padding: 20px 40px !important;
        font-size: 18px !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        letter-spacing: 2px !important;
        min-height: 60px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }
    
    .hero-subtitle {
        margin-top: -350px !important;
        margin-bottom: 20px !important;
        transform: translateY(-150px) !important;
        position: relative !important;
        z-index: 1000 !important;
    }
    
    /* AGGRESSIVE: Disable ALL animations on mobile */
    .hero-buttons,
    .hero-buttons *,
    .hero-buttons .btn,
    .hero-buttons .btn *,
    .hero-buttons .btn-text,
    .hero-buttons .btn-icon {
        transition: none !important;
        animation: none !important;
        -webkit-transition: none !important;
        -moz-transition: none !important;
        -o-transition: none !important;
    }
    
    .hero-buttons:hover,
    .hero-buttons:active,
    .hero-buttons:focus,
    .hero-buttons .btn:hover,
    .hero-buttons .btn:active,
    .hero-buttons .btn:focus,
    .hero-buttons .btn-text:hover,
    .hero-buttons .btn-icon:hover {
        transition: none !important;
        animation: none !important;
        -webkit-transition: none !important;
        -moz-transition: none !important;
        -o-transition: none !important;
    }
    
}

/* NARROW PHONES: iPhone 15 Pro width and below – lower subtitle slightly */
@media screen and (max-width: 393px) { /* 393px logical width for iPhone 15 Pro */
    .hero-subtitle {
        margin-top: -300px !important; /* was -350px */
        transform: translateY(-110px) !important; /* reduce lift */
    }
}

/* LARGE TABLETS: iPad Pro 12.9" – unzoom brick by repeating with auto sizing */
@media screen and (min-width: 1024px) and (max-width: 1366px) and (orientation: portrait) {
    html, body {
        background: url('https://youknowitcards.net/wp-content/uploads/2025/09/brickwall.png') center top scroll repeat !important;
        background-size: auto !important; /* tile bricks to avoid zoom */
    }
}
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-banner">
        <div class="banner-background">
            
            <div class="floating-cards">
                <div class="floating-card card-1">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/charizard.webp" alt="Charizard Card" class="floating-card-img">
                </div>
                <div class="floating-card card-2">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pikachu.png" alt="Pikachu Card" class="floating-card-img">
                </div>
                <div class="floating-card card-3">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Squirtle Illustration.png" alt="Squirtle Card" class="floating-card-img">
                </div>
                <div class="floating-card card-4">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/HD-wallpaper-ivysaur-cartoon-dragon-turquoise-neon-lights-pokemon-detective-pikachu-ivysaur-pokemon-fan-art-ivysaur.jpg" alt="Ivysaur Card" class="floating-card-img">
                </div>
            </div>
            
            <!-- Title moved above banner -->
            <div class="hero-title-section">
                <div class="hero-main-title">
                    <img src="https://fontmeme.com/permalink/250921/b033d5c586e8a03855327fe34afa2be2.png" alt="You Know It Cards" class="pokemon-title-image">
                </div>
            </div>
            
            <div class="banner-particles">
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
            </div>
        </div>
    </div>
    
    </div>
    
    <!-- Content below banner -->
    <div class="hero-content-below-banner">
        <p class="hero-subtitle">Your premier destination for Pokémon, One Piece, and Sports cards</p>
        
        <div class="hero-buttons">
            <a href="#cards" class="btn btn-primary btn-glow">
                <span class="btn-text">Explore Cards</span>
                <span class="btn-icon">→</span>
            </a>
            <a href="#contact" class="btn btn-secondary btn-glow">
                <span class="btn-text">Visit Store</span>
                <span class="btn-icon">→</span>
            </a>
        </div>
    </div>
</section>



<!-- Categories Section -->
<section id="cards" class="category-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Our Card Collections</h2>
            <p class="section-subtitle">Discover amazing cards from your favorite franchises and sports</p>
        </div>
    </div>
</section>

<!-- Category card sections removed (have dedicated pages) -->

<!-- Events section removed (separate Events page exists) -->

<!-- Community Section -->
<section class="community-section">
    <div class="section-header">
        <h2 class="section-title">Trading Tips</h2>
        <p class="section-subtitle">Expert advice on building collections, spotting fakes, and mastering the art of trading cards</p>
    </div>
    
    <div class="trading-tips-content">
        <div class="tip-card">
            <div class="tip-icon">💡</div>
            <h3>How to Spot Fake Cards</h3>
            <p>Always check the card's texture, printing quality, and holographic elements. Real cards have crisp, clear printing and authentic holographic patterns. Fake cards often have blurry text and poor holographic quality.</p>
        </div>
        
        <div class="tip-card">
            <div class="tip-icon">🏆</div>
            <h3>Building Your Collection</h3>
            <p>Start with cards you love, not just what's valuable. A collection built on passion will always be more rewarding than one built purely for investment. Focus on completing sets and finding rare variations.</p>
        </div>
        
        <div class="tip-card">
            <div class="tip-icon">💰</div>
            <h3>Trading Strategies</h3>
            <p>When trading, always research current market values. Don't rush into trades - take time to understand what you're giving up and what you're getting. Remember, a good trade benefits both parties.</p>
        </div>
    </div>
</section>

<!-- Social media sections moved to dedicated Social Media page -->

<!-- About section moved to dedicated About page -->

<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="contact-content">
        <div class="contact-info">
            <h2>Visit Our Store</h2>
            
            <div class="contact-item">
                <div class="contact-icon">
                    📍
                </div>
                <div class="contact-details">
                    <h3>Address</h3>
                    <p>19 Foster Road<br>Staten Island, NY 10309</p>
                </div>
            </div>
            
            <div class="contact-item">
                <div class="contact-icon">
                    📞
                </div>
                <div class="contact-details">
                    <h3>Phone</h3>
                    <p>(347) 215-2131</p>
                </div>
            </div>
            
            <div class="contact-item">
                <div class="contact-icon">
                    📧
                </div>
                <div class="contact-details">
                    <h3>Email</h3>
                    <p>info@youknowitcards.com</p>
                </div>
            </div>
            
            <div class="contact-item">
                <div class="contact-icon">
                    🕒
                </div>
                <div class="contact-details">
                    <h3>Hours</h3>
                    <p>Monday: 12–7 PM<br>Tuesday: 12–7 PM<br>Wednesday: 12–7 PM<br>Thursday: 12–7 PM<br>Friday: 12–8 PM<br>Saturday: 12–7 PM<br>Sunday: 12–4 PM</p>
                </div>
            </div>
        </div>
        
        <div class="contact-form">
            <h3>Get in Touch</h3>
            <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="contact-form-submit">
                <input type="hidden" name="action" value="ykic_contact_form">
                <input type="hidden" name="ykic_nonce" value="<?php echo wp_create_nonce('ykic_contact_nonce'); ?>">
                
                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject">
                </div>
                
                <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>
</section>

<?php get_footer(); ?> 