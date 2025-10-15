<?php
/**
 * Archive template for Trading Post discussions
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

<div class="archive-trading-post">
    <div class="container">
        <header class="archive-header">
            <h1 class="archive-title">Trading Post</h1>
            <p class="archive-description">Join the discussion! Share trades, show off your latest pulls, and connect with fellow collectors.</p>
            <a href="<?php echo admin_url('post-new.php?post_type=trading_post'); ?>" class="btn btn-primary">Start New Discussion</a>
        </header>

        <?php if (have_posts()) : ?>
            <div class="trading-post-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="discussion-item">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="discussion-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="discussion-content">
                            <h2 class="discussion-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="discussion-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <div class="discussion-meta">
                                <span class="discussion-author">
                                    By <?php the_author(); ?>
                                </span>
                                <span class="discussion-date">
                                    <?php echo get_the_date('M j, Y'); ?>
                                </span>
                                <span class="discussion-comments">
                                    💬 <?php comments_number('0', '1', '%'); ?> comments
                                </span>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            // Pagination
            $pagination = paginate_links(array(
                'prev_text' => '← Previous',
                'next_text' => 'Next →',
                'type' => 'array'
            ));
            
            if ($pagination) : ?>
                <div class="pagination">
                    <?php echo implode('', $pagination); ?>
                </div>
            <?php endif; ?>

        <?php else : ?>
            <div class="no-discussions">
                <h2>No discussions yet</h2>
                <p>Be the first to start a discussion! Share your thoughts on trading, show off your latest cards, or ask for advice.</p>
                <a href="<?php echo admin_url('post-new.php?post_type=trading_post'); ?>" class="btn btn-primary">Start First Discussion</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
.archive-trading-post {
    padding: 60px 0;
    background: linear-gradient(135deg, var(--dark-purple) 0%, var(--medium-purple) 50%, var(--bright-purple) 100%);
    min-height: 100vh;
}

.archive-header {
    text-align: center;
    margin-bottom: 60px;
    padding: 40px 20px;
    background: linear-gradient(145deg, var(--card-bg) 0%, var(--medium-purple) 100%);
    border-radius: var(--border-radius);
    border: 2px solid var(--accent-color);
    box-shadow: var(--shadow), 0 0 20px rgba(0, 255, 255, 0.3);
}

.archive-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 20px;
    color: var(--white);
    text-shadow: 0 0 15px var(--accent-color);
}

.archive-description {
    font-size: 1.2rem;
    color: #cccccc;
    margin-bottom: 30px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.trading-post-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-bottom: 60px;
}

.discussion-item {
    background: linear-gradient(145deg, var(--card-bg) 0%, var(--medium-purple) 100%);
    border: 2px solid var(--accent-color);
    border-radius: var(--border-radius);
    overflow: hidden;
    transition: var(--transition);
    box-shadow: var(--shadow), 0 0 20px rgba(0, 255, 255, 0.3);
}

.discussion-item:hover {
    transform: translateY(-5px);
    border-color: var(--accent-color-2);
    box-shadow: var(--shadow), 0 0 30px rgba(255, 0, 255, 0.5);
}

.discussion-image {
    width: 100%;
    height: 200px;
    overflow: hidden;
}

.discussion-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
}

.discussion-item:hover .discussion-image img {
    transform: scale(1.05);
}

.discussion-content {
    padding: 25px;
}

.discussion-title {
    font-size: 1.4rem;
    margin-bottom: 15px;
}

.discussion-title a {
    color: var(--white);
    text-decoration: none;
    transition: var(--transition);
}

.discussion-title a:hover {
    color: var(--accent-color);
    text-shadow: 0 0 10px var(--accent-color);
}

.discussion-excerpt {
    color: #cccccc;
    margin-bottom: 20px;
    line-height: 1.6;
}

.discussion-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    font-size: 0.9rem;
    color: #999999;
}

.discussion-meta span {
    background: rgba(0, 255, 255, 0.1);
    padding: 5px 10px;
    border-radius: 15px;
    border: 1px solid var(--accent-color);
}

.no-discussions {
    text-align: center;
    padding: 80px 20px;
    background: linear-gradient(145deg, var(--card-bg) 0%, var(--medium-purple) 100%);
    border-radius: var(--border-radius);
    border: 2px solid var(--accent-color);
}

.no-discussions h2 {
    font-size: 2rem;
    color: var(--white);
    margin-bottom: 20px;
}

.no-discussions p {
    color: #cccccc;
    font-size: 1.1rem;
    margin-bottom: 30px;
}

.pagination {
    text-align: center;
    margin-top: 40px;
}

.pagination .page-numbers {
    display: inline-block;
    padding: 10px 15px;
    margin: 0 5px;
    background: var(--card-bg);
    color: var(--white);
    text-decoration: none;
    border-radius: var(--border-radius);
    border: 1px solid var(--accent-color);
    transition: var(--transition);
}

.pagination .page-numbers:hover,
.pagination .page-numbers.current {
    background: var(--accent-color);
    color: var(--dark-bg);
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .archive-title {
        font-size: 2.5rem;
    }
    
    .trading-post-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .discussion-content {
        padding: 20px;
    }
}
</style>

<?php get_footer(); ?> 