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
        background: url('https://youknowitcards.net/wp-content/uploads/2025/09/brickwall.png') center center fixed no-repeat !important;
        background-size: cover !important;
        /* min-height: 100vh !important; */
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

<!-- Pokémon Cards Section -->
<section class="category-section">
    <div class="section-header">
        <h2 class="section-title">Pokémon Cards</h2>
        <p class="section-subtitle">Collect the rarest and most powerful Pokémon cards</p>
    </div>
    <?php echo do_shortcode('[pokemon_cards_grid posts_per_page="6" columns="3"]'); ?>
</section>

<!-- One Piece Cards Section -->
<section class="category-section">
    <div class="section-header">
        <h2 class="section-title">One Piece Cards</h2>
        <p class="section-subtitle">Join the adventure with One Piece trading cards</p>
    </div>
    <?php echo do_shortcode('[onepiece_cards_grid posts_per_page="6" columns="3"]'); ?>
</section>

<!-- Sports Cards Section -->
<section class="category-section">
    <div class="section-header">
        <h2 class="section-title">Sports Cards</h2>
        <p class="section-subtitle">From baseball legends to basketball stars, find your favorite sports cards</p>
    </div>
    <?php echo do_shortcode('[sports_cards_grid posts_per_page="6" columns="3"]'); ?>
</section>

<!-- Events Section -->
<section class="events-section">
    <div class="section-header">
        <h2 class="section-title">Upcoming Events</h2>
        <p class="section-subtitle">Join us for tournaments, trading sessions, and special events</p>
    </div>
    <?php echo do_shortcode('[store_events_grid posts_per_page="3" columns="3"]'); ?>
</section>

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

<!-- Whatnot Shopping Section -->
<section class="whatnot-section">
    <div class="section-header">
        <h2 class="section-title">Shop Live on Whatnot</h2>
        <p class="section-subtitle">Join our live auctions, card openings, and exclusive deals on Whatnot</p>
    </div>
    
    <div class="whatnot-content">
        <div class="whatnot-card">
            <div class="whatnot-icon">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/whatnot-logo.png" alt="Whatnot Logo">
            </div>
            <h3>Live Shopping Experience</h3>
            <p>Join our live auctions, watch box openings, and get exclusive deals on Pokémon, One Piece, and Sports cards!</p>
            <a href="https://www.whatnot.com/user/youknowitcards/shop" class="btn btn-whatnot" target="_blank">Shop Now</a>
        </div>
    </div>
</section>

<!-- Social Media Section -->
<section class="social-media-section">
    <div class="section-header">
        <h2 class="section-title">Follow YouKnowItCards</h2>
        <p class="section-subtitle">Stay connected with us on social media for the latest cards, updates, and community content</p>
    </div>
    
    <div class="social-media-grid">
        <a href="https://www.instagram.com/youknowitcards/" class="social-card instagram" target="_blank">
            <div class="social-icon">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
            </div>
            <h3>Instagram</h3>
            <p>Daily card showcases, behind-the-scenes, and community highlights</p>
            <span class="social-handle">@youknowitcards</span>
        </a>
        
        <a href="https://www.tiktok.com/@youknowitcards" class="social-card tiktok" target="_blank">
            <div class="social-icon">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                </svg>
            </div>
            <h3>TikTok</h3>
            <p>Quick card reveals, trading tips, and viral card content</p>
            <span class="social-handle">@youknowitcards</span>
        </a>
        
        <a href="https://www.youtube.com/@YouKnowItCards" class="social-card youtube" target="_blank">
            <div class="social-icon">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                </svg>
            </div>
            <h3>YouTube</h3>
            <p>In-depth card reviews, box openings, and trading guides</p>
            <span class="social-handle">@youknowitcards</span>
        </a>
    </div>
</section>

        <!-- About Section -->
        <section class="about-section">
            <div class="about-content">
                <div class="about-text">
                    <h2>About YouKnowItCards</h2>
                    <p>Your premier destination for trading cards and collectibles. We specialize in Pokémon, One Piece, and Sports cards, offering a wide selection of rare and popular items for collectors and enthusiasts.</p>
                    <p>Visit our store to explore our collection, trade with fellow collectors, or get expert advice on building your collection.</p>
                </div>
                <div class="about-image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/store-front.jpg" alt="YouKnowItCards Store Front">
                </div>
            </div>
        </section>

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