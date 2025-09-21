<?php
/**
 * Custom footer template for YouKnowItCards
 */
?>

<footer class="site-footer">
    <div class="footer-content">
        <div class="footer-sections">
            <div class="footer-section">
                <h3>YouKnowItCards</h3>
                <p>Your premier destination for Pokémon, One Piece, and Sports trading cards. We specialize in rare and popular cards for collectors and enthusiasts.</p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
                    <li><a href="<?php echo get_post_type_archive_link('pokemon_cards'); ?>">Pokémon Cards</a></li>
                    <li><a href="<?php echo get_post_type_archive_link('onepiece_cards'); ?>">One Piece Cards</a></li>
                    <li><a href="<?php echo get_post_type_archive_link('sports_cards'); ?>">Sports Cards</a></li>
                    <li><a href="<?php echo get_post_type_archive_link('store_events'); ?>">Events</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Store Info</h3>
                <ul>
                    <li><a href="#contact">Contact Us</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#events">Upcoming Events</a></li>
                    <li><a href="#trading">Trading Sessions</a></li>
                    <li><a href="#tournaments">Tournaments</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Contact Info</h3>
                <div class="contact-info">
                    <p><i class="fas fa-map-marker-alt"></i> 19 Foster Road<br>Staten Island, NY 10309</p>
                    <p><i class="fas fa-phone"></i> (347) 215-2131</p>
                    <p><i class="fas fa-envelope"></i> info@youknowitcards.com</p>
                    <p><i class="fas fa-clock"></i> Mon: 12–7 PM<br>Tue: 12–7 PM<br>Wed: 12–7 PM<br>Thu: 12–7 PM<br>Fri: 12–8 PM<br>Sat: 12–7 PM<br>Sun: 12–4 PM</p>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <p>&copy; <?php echo date('Y'); ?> YouKnowItCards. All rights reserved.</p>
                <p>EST. 2022 • ALWAYS BUYING, SELLING, TRADING</p>
            </div>
        </div>
    </div>
</footer>

<style>
.site-footer {
    background: var(--secondary-color);
    color: var(--white);
    padding: 0;
    margin-top: 0;
}

.footer-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.footer-sections {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
    padding: 60px 0 40px 0;
}

.footer-section h3 {
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 20px;
    color: var(--white);
    border-bottom: 2px solid var(--primary-color);
    padding-bottom: 10px;
}

.footer-section p {
    color: #cccccc;
    line-height: 1.6;
    margin-bottom: 20px;
}

.footer-section ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section ul li a {
    color: #cccccc;
    text-decoration: none;
    transition: var(--transition);
}

.footer-section ul li a:hover {
    color: var(--primary-color);
}

.social-links {
    display: flex;
    gap: 15px;
}

.social-links a {
    display: inline-block;
    width: 40px;
    height: 40px;
    background: var(--primary-color);
    color: var(--white);
    text-align: center;
    line-height: 40px;
    border-radius: 50%;
    text-decoration: none;
    transition: var(--transition);
}

.social-links a:hover {
    background: var(--accent-color);
    transform: translateY(-2px);
}

.contact-info p {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 15px;
    color: #cccccc;
    line-height: 1.5;
}

.contact-info i {
    color: var(--primary-color);
    margin-top: 3px;
    min-width: 16px;
}

.footer-bottom {
    border-top: 1px solid #444444;
    padding: 20px 0;
    text-align: center;
}

.footer-bottom-content p {
    margin: 5px 0;
    color: #999999;
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .footer-sections {
        grid-template-columns: 1fr;
        gap: 30px;
        padding: 40px 0 30px 0;
    }
    
    .footer-section h3 {
        font-size: 1.2rem;
    }
    
    .social-links {
        justify-content: center;
    }
}
</style>

<?php wp_footer(); ?>
</body>
</html> 