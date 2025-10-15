<?php
/**
 * Single template for One Piece Cards
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
</style>

<div class="container">
    <?php while (have_posts()) : the_post(); ?>
        <article class="card-detail">
            <div class="card-detail-content">
                <!-- Card Image -->
                <div class="card-image-section">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="card-main-image">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Card Details Sidebar -->
                    <div class="card-details-sidebar">
                        <h1 class="card-title"><?php the_title(); ?></h1>
                        
                        <div class="card-meta-details">
                            <?php 
                            $rarity = get_post_meta(get_the_ID(), '_card_rarity', true);
                            $condition = get_post_meta(get_the_ID(), '_card_condition', true);
                            $year = get_post_meta(get_the_ID(), '_card_year', true);
                            ?>
                            
                            <?php if ($rarity) : ?>
                                <div class="meta-item">
                                    <span class="meta-label">Rarity:</span>
                                    <span class="meta-value rarity-badge"><?php echo esc_html($rarity); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($condition) : ?>
                                <div class="meta-item">
                                    <span class="meta-label">Condition:</span>
                                    <span class="meta-value condition-badge"><?php echo esc_html($condition); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($year) : ?>
                                <div class="meta-item">
                                    <span class="meta-label">Year:</span>
                                    <span class="meta-value"><?php echo esc_html($year); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="card-actions">
                            <a href="<?php echo get_post_type_archive_link('onepiece_cards'); ?>" class="btn btn-secondary">Back to Collection</a>
                            <a href="#contact" class="btn btn-primary">Inquire About This Card</a>
                        </div>
                    </div>
                </div>
                
                <!-- Card Description -->
                <div class="card-description">
                    <h2>Card Description</h2>
                    <div class="description-content">
                        <?php the_content(); ?>
                    </div>
                </div>
                
                <!-- Related Cards -->
                <div class="related-cards">
                    <h2>Related One Piece Cards</h2>
                    <div class="cards-grid onepiece-cards-grid">
                        <?php
                        $related_cards = get_posts(array(
                            'post_type' => 'onepiece_cards',
                            'posts_per_page' => 3,
                            'post__not_in' => array(get_the_ID()),
                            'meta_query' => array(
                                array(
                                    'key' => '_card_rarity',
                                    'value' => $rarity,
                                    'compare' => '='
                                )
                            )
                        ));
                        
                        if (empty($related_cards)) {
                            $related_cards = get_posts(array(
                                'post_type' => 'onepiece_cards',
                                'posts_per_page' => 3,
                                'post__not_in' => array(get_the_ID())
                            ));
                        }
                        
                        foreach ($related_cards as $card) {
                            setup_postdata($card);
                            ?>
                            <div class="card-item">
                                <?php if (has_post_thumbnail($card->ID)) : ?>
                                    <div class="card-image">
                                        <a href="<?php echo get_permalink($card->ID); ?>">
                                            <?php echo get_the_post_thumbnail($card->ID, 'medium'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="card-content">
                                    <h3><a href="<?php echo get_permalink($card->ID); ?>"><?php echo get_the_title($card->ID); ?></a></h3>
                                    <p><?php echo get_the_excerpt($card->ID); ?></p>
                                    
                                    <div class="card-meta">
                                        <?php 
                                        $card_rarity = get_post_meta($card->ID, '_card_rarity', true);
                                        $card_condition = get_post_meta($card->ID, '_card_condition', true);
                                        
                                        if ($card_rarity) echo '<span>' . esc_html($card_rarity) . '</span>';
                                        if ($card_condition) echo '<span>' . esc_html($card_condition) . '</span>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<style>
.card-detail {
    padding: 40px 0;
}

.card-detail-content {
    max-width: 1200px;
    margin: 0 auto;
}

.card-image-section {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    margin-bottom: 60px;
    align-items: start;
}

.card-main-image {
    background: var(--white);
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    overflow: hidden;
}

.card-main-image img {
    width: 100%;
    height: auto;
    display: block;
}

.card-details-sidebar {
    background: var(--white);
    padding: 30px;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    position: sticky;
    top: 20px;
}

.card-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--secondary-color);
    margin-bottom: 30px;
}

.card-meta-details {
    margin-bottom: 30px;
}

.meta-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #e1e5e9;
}

.meta-item:last-child {
    border-bottom: none;
}

.meta-label {
    font-weight: 600;
    color: var(--secondary-color);
}

.meta-value {
    color: #666;
}

.rarity-badge,
.condition-badge {
    background: var(--primary-color);
    color: var(--white);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
}

.condition-badge {
    background: var(--accent-color);
}

.card-actions {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.card-description {
    background: var(--white);
    padding: 40px;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    margin-bottom: 60px;
}

.card-description h2 {
    font-size: 1.8rem;
    font-weight: 600;
    color: var(--secondary-color);
    margin-bottom: 20px;
}

.description-content {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #666;
}

.related-cards {
    background: var(--light-bg);
    padding: 40px;
    border-radius: var(--border-radius);
}

.related-cards h2 {
    font-size: 1.8rem;
    font-weight: 600;
    color: var(--secondary-color);
    margin-bottom: 30px;
    text-align: center;
}

@media (max-width: 768px) {
    .card-image-section {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .card-details-sidebar {
        position: static;
    }
    
    .card-title {
        font-size: 1.5rem;
    }
    
    .card-description,
    .related-cards {
        padding: 30px 20px;
    }
    
    .meta-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
    }
}
</style>

<?php get_footer(); ?> 