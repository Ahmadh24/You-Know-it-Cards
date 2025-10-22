<?php
/**
 * Template Name: Social Media
 * 
 * Social Media page for YouKnowItCards
 */

get_header(); ?>

<style>
/* REMOVE ALL BRICK BACKGROUNDS - ULTRA AGGRESSIVE - CACHE BUST: 2025-01-22-15:30 */
html, body, .site, .ct-main, .ct-container, .ct-content, .entry-content, .wp-block-group, [data-overlay] {
    background: none !important;
    background-color: transparent !important;
    background-image: none !important;
}

/* MOBILE - FORCE NO BACKGROUND */
@media screen and (max-width: 768px) {
    html, body, .site, .ct-main, .ct-container, .ct-content, .entry-content, .wp-block-group, [data-overlay] {
        background: none !important;
        background-color: transparent !important;
        background-image: none !important;
    }
}

/* LANDSCAPE - FORCE NO BACKGROUND */
@media screen and (max-height: 500px) and (orientation: landscape) {
    html, body, .site, .ct-main, .ct-container, .ct-content, .entry-content, .wp-block-group, [data-overlay] {
        background: none !important;
        background-color: transparent !important;
        background-image: none !important;
    }
}

/* SOCIAL MEDIA PAGE STYLES */
.social-media-page {
    padding: 60px 0;
    min-height: 100vh;
}

.social-media-header {
    text-align: center;
    margin-bottom: 60px;
}

.social-media-header h1 {
    font-size: 3rem;
    color: #fff;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.social-media-header p {
    font-size: 1.2rem;
    color: #ccc;
    max-width: 600px;
    margin: 0 auto;
}

.social-media-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.social-card {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 40px 30px;
    text-align: center;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    text-decoration: none;
    color: #fff;
    display: block;
}

.social-card:hover {
    transform: translateY(-10px);
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
}

.social-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
}

.social-icon svg {
    width: 40px;
    height: 40px;
}

.social-card h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #fff;
}

.social-card p {
    font-size: 1rem;
    color: #ccc;
    margin-bottom: 20px;
    line-height: 1.6;
}

.social-handle {
    font-size: 1.1rem;
    font-weight: 600;
    color: #ffd700;
}

/* Platform-specific colors */
.social-card.instagram:hover {
    background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
}

.social-card.tiktok:hover {
    background: linear-gradient(45deg, #000000, #ff0050);
}

.social-card.youtube:hover {
    background: linear-gradient(45deg, #ff0000, #ff4444);
}

.social-card.whatnot:hover {
    background: linear-gradient(45deg, #ffd700, #ffed4e);
}

/* RESPONSIVE DESIGN - ULTRA AGGRESSIVE */
@media screen and (max-width: 768px) {
    .social-media-page {
        padding: 40px 0 !important;
        display: block !important;
        visibility: visible !important;
        opacity: 1 !important;
    }
    
    .social-media-header {
        margin-bottom: 40px !important;
        padding: 0 20px !important;
        display: block !important;
        visibility: visible !important;
    }
    
    .social-media-header h1 {
        font-size: 2.5rem !important;
        margin-bottom: 15px !important;
        display: block !important;
        visibility: visible !important;
    }
    
    .social-media-header p {
        font-size: 1rem !important;
        padding: 0 20px !important;
        margin: 0 auto !important;
        display: block !important;
        visibility: visible !important;
    }
    
    .social-media-grid {
        display: flex !important;
        flex-direction: column !important;
        grid-template-columns: none !important;
        gap: 20px !important;
        padding: 0 15px !important;
        max-width: 100% !important;
        margin: 0 auto !important;
        visibility: visible !important;
        opacity: 1 !important;
        height: auto !important;
        min-height: auto !important;
    }
    
    .social-card {
        padding: 30px 20px !important;
        width: 100% !important;
        max-width: 100% !important;
        margin: 0 auto 20px !important;
        display: block !important;
        visibility: visible !important;
        opacity: 1 !important;
        position: relative !important;
        z-index: 1 !important;
        background: rgba(255, 255, 255, 0.1) !important;
        border-radius: 20px !important;
        text-align: center !important;
        color: #fff !important;
        text-decoration: none !important;
    }
    
    .social-icon {
        width: 60px !important;
        height: 60px !important;
        margin: 0 auto 20px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        visibility: visible !important;
    }
    
    .social-icon svg {
        width: 30px !important;
        height: 30px !important;
        visibility: visible !important;
    }
    
    .social-card h3 {
        font-size: 1.3rem !important;
        margin-bottom: 15px !important;
        color: #fff !important;
        visibility: visible !important;
    }
    
    .social-card p {
        font-size: 0.9rem !important;
        margin-bottom: 20px !important;
        color: #ccc !important;
        visibility: visible !important;
    }
    
    .social-handle {
        font-size: 1rem !important;
        color: #ffd700 !important;
        visibility: visible !important;
    }
}

@media screen and (max-width: 480px) {
    .social-media-header h1 {
        font-size: 2rem !important;
    }
    
    .social-media-header p {
        font-size: 0.9rem !important;
        padding: 0 15px !important;
    }
    
    .social-card {
        padding: 25px 15px !important;
    }
    
    .social-media-grid {
        padding: 0 10px !important;
        gap: 15px !important;
    }
}
</style>

<div class="social-media-page">
    <div class="social-media-header">
        <h1>Follow YouKnowItCards</h1>
        <p>Stay connected with us on social media for the latest cards, updates, and community content</p>
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
        
        <a href="https://www.whatnot.com/user/youknowitcards/shop" class="social-card whatnot" target="_blank">
            <div class="social-icon">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                </svg>
            </div>
            <h3>Whatnot</h3>
            <p>Live auctions, card openings, and exclusive deals</p>
            <span class="social-handle">@youknowitcards</span>
        </a>
    </div>
</div>

<?php get_footer(); ?>
