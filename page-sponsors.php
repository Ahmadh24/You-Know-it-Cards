<?php
/**
 * Template Name: Sponsors
 * 
 * Sponsors page for YouKnowItCards
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

/* SPONSORS PAGE STYLES */
.sponsors-page {
    padding: 60px 0;
    min-height: 100vh;
}

.sponsors-header {
    text-align: center;
    margin-bottom: 60px;
}

.sponsors-header h1 {
    font-size: 3rem;
    color: #fff;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.sponsors-header p {
    font-size: 1.2rem;
    color: #ccc;
    max-width: 600px;
    margin: 0 auto;
}

.sponsors-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.sponsor-card {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 25px 20px;
    text-align: center;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    text-decoration: none;
    color: #fff;
    display: block;
    position: relative;
    z-index: 10;
    aspect-ratio: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.sponsor-card:hover {
    transform: translateY(-10px);
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
}

.sponsor-logo {
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    overflow: hidden;
}

.sponsor-logo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.sponsor-card h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #fff;
}

.sponsor-card p {
    font-size: 1rem;
    color: #ccc;
    margin-bottom: 20px;
    line-height: 1.6;
}

.sponsor-discount {
    background: linear-gradient(45deg, #ffd700, #ffed4e);
    color: #333;
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: bold;
    font-size: 1.1rem;
    margin-bottom: 15px;
    display: inline-block;
}

.sponsor-code {
    font-size: 1rem;
    font-weight: 600;
    color: #ffd700;
    background: rgba(255, 215, 0, 0.1);
    padding: 8px 16px;
    border-radius: 15px;
    border: 1px solid rgba(255, 215, 0, 0.3);
}

.featured-sponsor {
    border: 2px solid #ffd700;
    background: rgba(255, 215, 0, 0.1);
}

.featured-badge {
    position: absolute;
    top: -10px;
    right: -10px;
    background: linear-gradient(45deg, #ffd700, #ffed4e);
    color: #333;
    padding: 5px 15px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: bold;
    transform: rotate(15deg);
}

/* RESPONSIVE DESIGN */
@media screen and (max-width: 768px) {
    .sponsors-page {
        padding: 40px 0 !important;
    }
    
    .sponsors-header {
        margin-bottom: 40px !important;
        padding: 0 20px !important;
    }
    
    .sponsors-header h1 {
        font-size: 2.5rem !important;
        margin-bottom: 15px !important;
    }
    
    .sponsors-header p {
        font-size: 1rem !important;
        padding: 0 20px !important;
        margin: 0 auto !important;
    }
    
    .sponsors-grid {
        display: grid !important;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)) !important;
        gap: 15px !important;
        padding: 0 15px !important;
        max-width: 100% !important;
        margin: 0 auto !important;
    }
    
    .sponsor-card {
        padding: 20px 15px !important;
        width: 100% !important;
        max-width: 100% !important;
        margin: 0 !important;
        display: flex !important;
        aspect-ratio: 1 !important;
        flex-direction: column !important;
        justify-content: center !important;
    }
    
    .sponsor-logo {
        width: 60px !important;
        height: 60px !important;
        margin: 0 auto 20px !important;
    }
    
    .sponsor-card h3 {
        font-size: 1.3rem !important;
        margin-bottom: 15px !important;
    }
    
    .sponsor-card p {
        font-size: 0.9rem !important;
        margin-bottom: 20px !important;
    }
}

@media screen and (max-width: 480px) {
    .sponsors-header h1 {
        font-size: 2rem !important;
    }
    
    .sponsor-card {
        padding: 15px 10px !important;
    }
    
    .sponsors-grid {
        padding: 0 10px !important;
        gap: 10px !important;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)) !important;
    }
    
    .sponsor-logo {
        width: 50px !important;
        height: 50px !important;
        margin: 0 auto 15px !important;
    }
    
    .sponsor-card h3 {
        font-size: 1.1rem !important;
        margin-bottom: 10px !important;
    }
    
    .sponsor-card p {
        font-size: 0.8rem !important;
        margin-bottom: 15px !important;
    }
}
</style>

<div class="sponsors-page">
    <div class="sponsors-header">
        <h1>Our Sponsors</h1>
        <p>Support our partners and save money with exclusive discount codes!</p>
    </div>
    
    <div class="sponsors-grid">
        <?php
        // Query for sponsors
        $sponsors_query = new WP_Query(array(
            'post_type' => 'sponsors',
            'posts_per_page' => -1,
            'meta_key' => '_sponsor_featured',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        ));
        
        if ($sponsors_query->have_posts()) :
            while ($sponsors_query->have_posts()) : $sponsors_query->the_post();
                $website_url = get_post_meta(get_the_ID(), '_sponsor_website_url', true);
                $discount_code = get_post_meta(get_the_ID(), '_sponsor_discount_code', true);
                $discount_percentage = get_post_meta(get_the_ID(), '_sponsor_discount_percentage', true);
                $description = get_post_meta(get_the_ID(), '_sponsor_description', true);
                $featured = get_post_meta(get_the_ID(), '_sponsor_featured', true);
                
                $card_class = $featured ? 'sponsor-card featured-sponsor' : 'sponsor-card';
                ?>
                <a href="<?php echo esc_url($website_url); ?>" class="<?php echo $card_class; ?>" target="_blank">
                    <?php if ($featured) : ?>
                        <div class="featured-badge">FEATURED</div>
                    <?php endif; ?>
                    
                    <div class="sponsor-logo">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium'); ?>
                        <?php else : ?>
                            <div style="font-size: 2rem;">🏪</div>
                        <?php endif; ?>
                    </div>
                    
                    <h3><?php the_title(); ?></h3>
                    
                    <?php if ($description) : ?>
                        <p><?php echo esc_html($description); ?></p>
                    <?php endif; ?>
                    
                    <?php if ($discount_percentage) : ?>
                        <div class="sponsor-discount"><?php echo esc_html($discount_percentage); ?>% OFF</div>
                    <?php endif; ?>
                    
                    <?php if ($discount_code) : ?>
                        <div class="sponsor-code">Code: <?php echo esc_html($discount_code); ?></div>
                    <?php endif; ?>
                </a>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            ?>
            <div style="grid-column: 1 / -1; text-align: center; color: #ccc; font-size: 1.2rem;">
                <p>No sponsors available yet. Check back soon!</p>
            </div>
            <?php
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
