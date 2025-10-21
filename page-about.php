<?php
/**
 * Template Name: About Us
 * 
 * About Us page for YouKnowItCards
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
}

/* ABOUT PAGE STYLES */
.about-page {
    padding: 60px 0;
    min-height: 100vh;
}

.about-header {
    text-align: center;
    margin-bottom: 60px;
}

.about-header h1 {
    font-size: 3rem;
    color: #fff;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.about-header p {
    font-size: 1.2rem;
    color: #ccc;
    max-width: 600px;
    margin: 0 auto;
}

.about-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.about-text {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 40px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.about-text h2 {
    font-size: 2.5rem;
    color: #fff;
    margin-bottom: 30px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.about-text p {
    font-size: 1.1rem;
    color: #ccc;
    line-height: 1.8;
    margin-bottom: 20px;
}

.about-image {
    text-align: center;
}

.about-image img {
    max-width: 100%;
    height: auto;
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    transition: transform 0.3s ease;
}

.about-image img:hover {
    transform: scale(1.05);
}

.store-info {
    margin-top: 60px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 40px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.store-info h3 {
    font-size: 2rem;
    color: #fff;
    margin-bottom: 30px;
    text-align: center;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
}

.info-item {
    text-align: center;
    padding: 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.info-item h4 {
    font-size: 1.3rem;
    color: #ffd700;
    margin-bottom: 15px;
}

.info-item p {
    color: #ccc;
    line-height: 1.6;
}

/* RESPONSIVE DESIGN */
@media screen and (max-width: 768px) {
    .about-page {
        padding: 40px 0;
    }
    
    .about-header h1 {
        font-size: 2.5rem;
    }
    
    .about-header p {
        font-size: 1rem;
        padding: 0 20px;
    }
    
    .about-content {
        grid-template-columns: 1fr;
        gap: 40px;
        padding: 0 15px;
    }
    
    .about-text {
        padding: 30px 20px;
    }
    
    .about-text h2 {
        font-size: 2rem;
    }
    
    .about-text p {
        font-size: 1rem;
    }
    
    .store-info {
        margin-top: 40px;
        padding: 30px 20px;
    }
    
    .store-info h3 {
        font-size: 1.5rem;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .info-item {
        padding: 15px;
    }
    
    .info-item h4 {
        font-size: 1.1rem;
    }
}

@media screen and (max-width: 480px) {
    .about-header h1 {
        font-size: 2rem;
    }
    
    .about-text {
        padding: 25px 15px;
    }
    
    .about-text h2 {
        font-size: 1.8rem;
    }
    
    .store-info {
        padding: 25px 15px;
    }
    
    .store-info h3 {
        font-size: 1.3rem;
    }
}
</style>

<div class="about-page">
    <div class="about-header">
        <h1>About YouKnowItCards</h1>
        <p>Your premier destination for trading cards and collectibles</p>
    </div>
    
    <div class="about-content">
        <div class="about-text">
            <h2>Our Story</h2>
            <p>YouKnowItCards is your premier destination for trading cards and collectibles. We specialize in Pokémon, One Piece, and Sports cards, offering a wide selection of rare and popular items for collectors and enthusiasts.</p>
            <p>Founded in 2022, we've built a community of passionate collectors who share our love for trading cards. Our store is more than just a place to buy cards – it's a hub where collectors come together to trade, learn, and discover new treasures.</p>
            <p>Visit our store to explore our collection, trade with fellow collectors, or get expert advice on building your collection. We're always buying, selling, and trading!</p>
        </div>
        
        <div class="about-image">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/store-front.jpg" alt="YouKnowItCards Store Front">
        </div>
    </div>
    
    <div class="store-info">
        <h3>Store Information</h3>
        <div class="info-grid">
            <div class="info-item">
                <h4>📍 Location</h4>
                <p>19 Foster Road<br>Staten Island, NY 10309</p>
            </div>
            
            <div class="info-item">
                <h4>📞 Contact</h4>
                <p>(347) 215-2131<br>info@youknowitcards.com</p>
            </div>
            
            <div class="info-item">
                <h4>🕒 Hours</h4>
                <p>Mon-Thu: 12–7 PM<br>Fri: 12–8 PM<br>Sat: 12–7 PM<br>Sun: 12–4 PM</p>
            </div>
            
            <div class="info-item">
                <h4>🏆 Services</h4>
                <p>Card Trading<br>Collection Appraisals<br>Tournament Hosting<br>Expert Advice</p>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
