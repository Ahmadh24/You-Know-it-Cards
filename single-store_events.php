<?php
/**
 * Template for displaying individual store events
 */

get_header(); ?>

<style>
/* BRICK BACKGROUND - ALL SCREEN SIZES */
html, body, .site, .ct-main, .event-single-page, .container, .archive-header, .event-single, .event-header, .event-content, .event-meta-header, .event-meta-item, .event-description, .event-details, .event-actions, .event-sidebar, .event-gallery, .event-related, .event-footer, .ct-page-header, .ct-container, .entry-content, .wp-block-group, [data-overlay], [data-overlay]::before, .has-background-gradient, .has-background-gradient::before, .section-header, .card-item, .event-item, .tip-card, .trading-tips-content, .social-media-section, .ct-footer, footer, .footer-content, .main-navigation, .nav-menu, .widget-area, .sidebar, .widget, .widget-title, .widget-content, .main-content, .content-area, .wp-block-column, .wp-block-row, .wp-block-buttons, .wp-block-button, .wp-block-image, .wp-block-gallery, .wp-block-cover, .wp-block-media-text {
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

/* Target footer area specifically */
.ct-footer, footer, .footer-content, .footer-widgets, .footer-widget, .footer-widget-title, .footer-widget-content, .footer-column, .footer-row, .footer-container, .footer-wrapper, .footer-main, .footer-top, .footer-bottom, .footer-left, .footer-right, .footer-center, .footer-full, .footer-sticky, .footer-fixed, .footer-absolute, .footer-relative, .footer-static, .footer-transparent, .footer-opaque, .footer-solid, .footer-gradient, .footer-image-bg, .footer-video-bg, .footer-parallax, .footer-scroll, .footer-hover, .footer-active, .footer-focus, .footer-selected, .footer-current, .footer-parent, .footer-child, .footer-sibling, .footer-ancestor, .footer-descendant, .footer-first, .footer-last, .footer-only, .footer-empty, .footer-not, .footer-has, .footer-without, .footer-before, .footer-after, .footer-first-child, .footer-last-child, .footer-only-child, .footer-nth-child, .footer-nth-last-child, .footer-nth-of-type, .footer-nth-last-of-type, .footer-first-of-type, .footer-last-of-type, .footer-only-of-type, .footer-target, .footer-enabled, .footer-disabled, .footer-checked, .footer-indeterminate, .footer-valid, .footer-invalid, .footer-required, .footer-optional, .footer-read-only, .footer-read-write, .footer-in-range, .footer-out-of-range, .footer-placeholder-shown, .footer-default, .footer-visited, .footer-link {
    background: url('https://youknowitcards.net/wp-content/uploads/2025/09/brickwall.png') center center scroll repeat !important;
    background-size: auto !important;
    background-color: transparent !important;
}
</style>

<div class="event-single-page">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article class="event-single">
                <header class="event-header">
                    <h1 class="event-title"><?php the_title(); ?></h1>
                    
                    <?php
                    $event_date = get_post_meta(get_the_ID(), '_event_date', true);
                    $event_time = get_post_meta(get_the_ID(), '_event_time', true);
                    $event_type = get_post_meta(get_the_ID(), '_event_type', true);
                    $event_location = get_post_meta(get_the_ID(), '_event_location', true);
                    ?>
                    
                    <div class="event-meta-header">
                        <?php if ($event_date): ?>
                            <div class="event-meta-item">
                                <span class="meta-icon">📅</span>
                                <span class="meta-label">Date:</span>
                                <span class="meta-value"><?php echo date('F j, Y', strtotime($event_date)); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($event_time): ?>
                            <div class="event-meta-item">
                                <span class="meta-icon">🕒</span>
                                <span class="meta-label">Time:</span>
                                <span class="meta-value"><?php echo date('g:i A', strtotime($event_time)); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($event_type): ?>
                            <div class="event-meta-item">
                                <span class="meta-icon">🎯</span>
                                <span class="meta-label">Type:</span>
                                <span class="meta-value"><?php echo esc_html($event_type); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($event_location): ?>
                            <div class="event-meta-item">
                                <span class="meta-icon">📍</span>
                                <span class="meta-label">Location:</span>
                                <span class="meta-value"><?php echo esc_html($event_location); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </header>

                <div class="event-content-wrapper">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="event-image">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="event-description">
                        <h2>Event Details</h2>
                        <div class="event-content">
                            <?php 
                            // Get the featured image ID and its description
                            $featured_image_id = get_post_thumbnail_id();
                            $image_description = '';
                            
                            if ($featured_image_id) {
                                $image_description = get_post_field('post_content', $featured_image_id);
                            }
                            
                            // Try multiple methods to get content
                            $post_id = get_the_ID();
                            $raw_content = get_post_field('post_content', $post_id);
                            $filtered_content = get_the_content();
                            $excerpt = get_the_excerpt();
                            
                            // Get post object directly
                            $post = get_post($post_id);
                            
                            // Display the image description as the main event description
                            if (!empty(trim($image_description))) {
                                echo '<div class="event-full-content">';
                                echo '<p class="event-description-text">' . esc_html($image_description) . '</p>';
                                echo '</div>';
                            } elseif (!empty(trim($post->post_content))) {
                                // If there's content in post object, display it
                                echo '<div class="event-full-content">';
                                echo apply_filters('the_content', $post->post_content);
                                echo '</div>';
                            } elseif (!empty(trim($raw_content))) {
                                // If there's raw content, display it
                                echo '<div class="event-full-content">';
                                the_content();
                                echo '</div>';
                            } elseif (!empty(trim($filtered_content))) {
                                // If there's filtered content, display it
                                echo '<div class="event-full-content">';
                                echo $filtered_content;
                                echo '</div>';
                            } elseif (!empty($excerpt)) {
                                // If there's only an excerpt, display it as the description
                                echo '<p class="event-description-text">' . esc_html($excerpt) . '</p>';
                            } else {
                                // Fallback if nothing is found
                                echo '<p>No description available for this event.</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class="event-actions">
                    <a href="<?php echo get_post_type_archive_link('store_events'); ?>" class="btn btn-secondary">← Back to Events</a>
                    <a href="#contact" class="btn btn-primary">Contact Us</a>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</div>

<style>
.event-single-page {
    padding: 40px 0;
    min-height: 100vh;
}

.event-single {
    max-width: 800px;
    margin: 0 auto;
    background: var(--card-bg);
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    border: 1px solid #333333;
}

.event-header {
    padding: 40px;
    background: linear-gradient(135deg, var(--medium-purple), var(--bright-purple));
    color: white;
    border-bottom: 3px solid var(--primary-color);
}

.event-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 20px;
    color: white;
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

.event-meta-header {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
}

.event-meta-item {
    display: flex;
    align-items: center;
    gap: 10px;
    background: rgba(255, 255, 255, 0.1);
    padding: 15px;
    border-radius: var(--border-radius);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    min-height: 60px;
}

.meta-icon {
    font-size: 1.2rem;
    flex-shrink: 0;
}

.meta-label {
    font-weight: 600;
    color: rgba(255, 255, 255, 0.8);
    flex-shrink: 0;
}

.meta-value {
    font-weight: 700;
    color: white;
    word-wrap: break-word;
    overflow-wrap: break-word;
}

.event-content-wrapper {
    padding: 40px;
}

.event-image {
    margin-bottom: 30px;
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow);
}

.event-image img {
    width: 100%;
    height: auto;
    display: block;
}

.event-description h2 {
    font-size: 1.8rem;
    font-weight: 600;
    margin-bottom: 20px;
    color: var(--white);
    border-bottom: 2px solid var(--primary-color);
    padding-bottom: 10px;
}

.event-description {
    color: #cccccc;
    line-height: 1.7;
    font-size: 1.1rem;
}

.event-content {
    margin-top: 20px;
}

.event-description-text {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #cccccc;
    margin-bottom: 20px;
    padding: 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: var(--border-radius);
    border-left: 4px solid var(--primary-color);
}

.event-content p {
    margin-bottom: 15px;
    color: #cccccc;
    line-height: 1.7;
}

.event-content ul,
.event-content ol {
    margin-bottom: 15px;
    padding-left: 20px;
}

.event-content li {
    margin-bottom: 8px;
    color: #cccccc;
}

.event-content h3,
.event-content h4,
.event-content h5,
.event-content h6 {
    color: var(--white);
    margin-top: 25px;
    margin-bottom: 15px;
    font-weight: 600;
}

.event-content blockquote {
    border-left: 4px solid var(--primary-color);
    padding-left: 20px;
    margin: 20px 0;
    font-style: italic;
    color: #bbbbbb;
}

.event-content a {
    color: var(--accent-color);
    text-decoration: none;
    border-bottom: 1px solid var(--accent-color);
}

.event-content a:hover {
    color: var(--primary-color);
    border-bottom-color: var(--primary-color);
}

.event-actions {
    padding: 30px 40px;
    background: linear-gradient(135deg, var(--dark-purple), var(--medium-purple));
    display: flex;
    gap: 15px;
    justify-content: center;
    border-top: 1px solid #333333;
}

.btn {
    display: inline-block;
    padding: 12px 24px;
    border-radius: var(--border-radius);
    text-decoration: none;
    font-weight: 600;
    transition: var(--transition);
    border: none;
    cursor: pointer;
    font-size: 1rem;
}

.btn-primary {
    background: var(--primary-color);
    color: var(--dark-bg);
    font-weight: 700;
}

.btn-primary:hover {
    background: #ffed4e;
    transform: translateY(-2px);
    box-shadow: var(--neon-glow);
    color: var(--dark-bg);
}

.btn-secondary {
    background: transparent;
    color: var(--white);
    border: 2px solid var(--accent-color);
}

.btn-secondary:hover {
    background: var(--accent-color);
    color: var(--dark-bg);
    transform: translateY(-2px);
    box-shadow: var(--neon-glow-blue);
}

@media (max-width: 768px) {
    .event-header {
        padding: 30px 20px;
    }
    
    .event-title {
        font-size: 2rem;
    }
    
    .event-meta-header {
        grid-template-columns: 1fr;
    }
    
    .event-content-wrapper {
        padding: 30px 20px;
    }
    
    .event-actions {
        padding: 20px;
        flex-direction: column;
    }
}
</style>

<?php get_footer(); ?> 