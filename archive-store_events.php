<?php
/**
 * Template for displaying the store events archive page
 */

get_header(); ?>

<style>
/* MOBILE BRICK BACKGROUND - INLINE CSS */
@media screen and (max-width: 768px) {
    html, body, .site, .ct-main, .events-archive-page, .container, .archive-header, .event-single, .event-header, .event-content, .event-meta-header, .event-meta-item, .event-description, .event-details, .event-actions, .event-sidebar, .event-gallery, .event-related, .event-footer, .ct-page-header, .ct-container, .entry-content, .wp-block-group, [data-overlay], [data-overlay]::before, .has-background-gradient, .has-background-gradient::before, .section-header, .card-item, .event-item, .tip-card, .trading-tips-content, .social-media-section, .ct-footer, footer, .footer-content, .main-navigation, .nav-menu, .widget-area, .sidebar, .widget, .widget-title, .widget-content, .main-content, .content-area, .wp-block-column, .wp-block-row, .wp-block-buttons, .wp-block-button, .wp-block-image, .wp-block-gallery, .wp-block-cover, .wp-block-media-text {
        background: url('https://youknowitcards.net/wp-content/uploads/2025/09/brickwall.png') center center scroll repeat !important;
        background-size: auto !important;
        background-color: transparent !important;
    }
    
    /* Target header area specifically */
    .site-header, .header, .header-logo, .site-branding, .ct-header, .ct-header-row, .ct-header-column, .ct-header-widget, .ct-header-social, .ct-header-search, .ct-header-cart, .ct-header-button, .ct-header-text, .ct-header-image, .ct-header-video, .ct-header-slider, .ct-header-banner, .ct-header-overlay, .ct-header-background, .ct-header-content, .ct-header-inner, .ct-header-container, .ct-header-wrapper, .ct-header-main, .ct-header-top, .ct-header-bottom, .ct-header-left, .ct-header-right, .ct-header-center, .ct-header-full, .ct-header-sticky, .ct-header-fixed, .ct-header-absolute, .ct-header-relative, .ct-header-static, .ct-header-transparent, .ct-header-opaque, .ct-header-solid, .ct-header-gradient, .ct-header-image-bg, .ct-header-video-bg, .ct-header-parallax, .ct-header-scroll, .ct-header-hover, .ct-header-active, .ct-header-focus, .ct-header-selected, .ct-header-current, .ct-header-parent, .ct-header-child, .ct-header-sibling, .ct-header-ancestor, .ct-header-descendant, .ct-header-first, .ct-header-last, .ct-header-only, .ct-header-empty, .ct-header-not, .ct-header-has, .ct-header-without, .ct-header-before, .ct-header-after, .ct-header-first-child, .ct-header-last-child, .ct-header-only-child, .ct-header-nth-child, .ct-header-nth-last-child, .ct-header-nth-of-type, .ct-header-nth-last-of-type, .ct-header-first-of-type, .ct-header-last-of-type, .ct-header-only-of-type, .ct-header-target, .ct-header-enabled, .ct-header-disabled, .ct-header-checked, .ct-header-indeterminate, .ct-header-valid, .ct-header-invalid, .ct-header-required, .ct-header-optional, .ct-header-read-only, .ct-header-read-write, .ct-header-in-range, .ct-header-out-of-range, .ct-header-placeholder-shown, .ct-header-default, .ct-header-visited, .ct-header-link {
        background: url('https://youknowitcards.net/wp-content/uploads/2025/09/brickwall.png') center center scroll repeat !important;
        background-size: auto !important;
        background-color: transparent !important;
    }
}

/* LANDSCAPE MOBILE BRICK BACKGROUND */
@media screen and (max-height: 500px) and (orientation: landscape) {
    html, body, .site, .ct-main, .events-archive-page, .container, .archive-header, .event-single, .event-header, .event-content, .event-meta-header, .event-meta-item, .event-description, .event-details, .event-actions, .event-sidebar, .event-gallery, .event-related, .event-footer, .ct-page-header, .ct-container, .entry-content, .wp-block-group, [data-overlay], [data-overlay]::before, .has-background-gradient, .has-background-gradient::before, .section-header, .card-item, .event-item, .tip-card, .trading-tips-content, .social-media-section, .ct-footer, footer, .footer-content, .main-navigation, .nav-menu, .widget-area, .sidebar, .widget, .widget-title, .widget-content, .main-content, .content-area, .wp-block-column, .wp-block-row, .wp-block-buttons, .wp-block-button, .wp-block-image, .wp-block-gallery, .wp-block-cover, .wp-block-media-text {
        background: url('https://youknowitcards.net/wp-content/uploads/2025/09/brickwall.png') center center scroll repeat !important;
        background-size: auto !important;
        background-color: transparent !important;
    }
}
</style>

<div class="events-archive-page">
    <div class="container">
        <header class="archive-header">
            <h1 class="archive-title">Store Events</h1>
            <p class="archive-description">Join us for tournaments, trading sessions, and special events</p>
        </header>

        <?php if (have_posts()) : ?>
            <div class="events-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    $event_date = get_post_meta(get_the_ID(), '_event_date', true);
                    $event_time = get_post_meta(get_the_ID(), '_event_time', true);
                    $event_type = get_post_meta(get_the_ID(), '_event_type', true);
                    $event_location = get_post_meta(get_the_ID(), '_event_location', true);
                    ?>
                    
                    <article class="event-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="event-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="event-content">
                            <h2 class="event-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="event-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <div class="event-meta">
                                <?php if ($event_date) : ?>
                                    <span class="event-date">📅 <?php echo date('F j, Y', strtotime($event_date)); ?></span>
                                <?php endif; ?>
                                
                                <?php if ($event_time) : ?>
                                    <span class="event-time">🕒 <?php echo date('g:i A', strtotime($event_time)); ?></span>
                                <?php endif; ?>
                                
                                <?php if ($event_type) : ?>
                                    <span class="event-type">🎯 <?php echo esc_html($event_type); ?></span>
                                <?php endif; ?>
                                
                                <?php if ($event_location) : ?>
                                    <span class="event-location">📍 <?php echo esc_html($event_location); ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="event-link">Read More →</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => '← Previous',
                'next_text' => 'Next →',
            ));
            ?>
            
        <?php else : ?>
            <div class="no-events">
                <h2>No Events Found</h2>
                <p>There are no upcoming events at the moment. Check back soon for new tournaments and events!</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
.events-archive-page {
    padding: 40px 0;
    min-height: 100vh;
}

.archive-header {
    text-align: center;
    margin-bottom: 60px;
    padding: 40px 20px;
}

.archive-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 15px;
    color: var(--white);
}

.archive-description {
    font-size: 1.2rem;
    color: #cccccc;
    max-width: 600px;
    margin: 0 auto;
}

.events-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.event-card {
    background: var(--card-bg);
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: var(--transition);
    border: 1px solid #333333;
    border-top: 4px solid var(--primary-color);
}

.event-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
    border-color: var(--primary-color);
}

.event-image {
    position: relative;
    overflow: hidden;
    max-height: 250px;
}

.event-image img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: var(--transition);
}

.event-card:hover .event-image img {
    transform: scale(1.05);
}

.event-content {
    padding: 25px;
    display: flex;
    flex-direction: column;
    min-height: 200px;
}

.event-title {
    font-size: 1.4rem;
    font-weight: 600;
    margin-bottom: 15px;
    line-height: 1.3;
}

.event-title a {
    color: var(--white);
    text-decoration: none;
    display: block;
}

.event-title a:hover {
    color: var(--primary-color);
}

.event-excerpt {
    color: #cccccc;
    line-height: 1.6;
    margin-bottom: 20px;
    flex-grow: 1;
}

.event-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 20px;
}

.event-meta span {
    background: #333333;
    padding: 6px 12px;
    border-radius: 4px;
    color: var(--white);
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    gap: 5px;
}

.event-date {
    color: var(--primary-color) !important;
    font-weight: 600;
}

.event-time {
    color: var(--accent-color) !important;
}

.event-type {
    color: #3498db !important;
}

.event-location {
    color: #9b59b6 !important;
}

.event-link {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    font-size: 1rem;
    transition: var(--transition);
    align-self: flex-start;
}

.event-link:hover {
    color: var(--accent-color);
    transform: translateX(5px);
}

.no-events {
    text-align: center;
    padding: 60px 20px;
    background: var(--card-bg);
    border-radius: var(--border-radius);
    border: 1px solid #333333;
    max-width: 600px;
    margin: 0 auto;
}

.no-events h2 {
    font-size: 2rem;
    font-weight: 600;
    margin-bottom: 15px;
    color: var(--white);
}

.no-events p {
    color: #cccccc;
    font-size: 1.1rem;
    line-height: 1.6;
}

/* Pagination */
.wp-pagenavi {
    text-align: center;
    margin-top: 40px;
    padding: 0 20px;
}

.wp-pagenavi a,
.wp-pagenavi span {
    display: inline-block;
    padding: 10px 15px;
    margin: 0 5px;
    background: var(--card-bg);
    color: var(--white);
    text-decoration: none;
    border-radius: var(--border-radius);
    border: 1px solid #333333;
    transition: var(--transition);
}

.wp-pagenavi a:hover {
    background: var(--primary-color);
    border-color: var(--primary-color);
}

.wp-pagenavi .current {
    background: var(--primary-color);
    border-color: var(--primary-color);
}

@media (max-width: 768px) {
    .archive-title {
        font-size: 2.5rem;
    }
    
    .events-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .event-content {
        padding: 20px;
    }
    
    .event-title {
        font-size: 1.3rem;
    }
}
</style>

<?php get_footer(); ?> 