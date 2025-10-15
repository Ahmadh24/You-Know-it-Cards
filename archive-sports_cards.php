<?php
/**
 * Archive template for Sports Cards
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
    <div class="archive-header">
        <h1 class="archive-title">Sports Cards</h1>
        <p class="archive-description">Explore our collection of Sports trading cards</p>
    </div>

    <?php if (have_posts()) : ?>
        <div class="cards-grid sports-cards-grid">
            <?php while (have_posts()) : the_post(); ?>
                <div class="card-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="card-image">
                            <a href="#" onclick="showComingSoon(); return false;">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <div class="card-content">
                        <h3><a href="#" onclick="showComingSoon(); return false;"><?php the_title(); ?></a></h3>
                        <p><?php the_excerpt(); ?></p>
                        
                        <div class="card-meta">
                            <?php 
                            $rarity = get_post_meta(get_the_ID(), '_card_rarity', true);
                            $condition = get_post_meta(get_the_ID(), '_card_condition', true);
                            $year = get_post_meta(get_the_ID(), '_card_year', true);
                            
                            if ($rarity) echo '<span class="rarity">' . esc_html($rarity) . '</span>';
                            if ($condition) echo '<span class="condition">' . esc_html($condition) . '</span>';
                            if ($year) echo '<span class="year">' . esc_html($year) . '</span>';
                            ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php
            echo paginate_links(array(
                'prev_text' => '&laquo; Previous',
                'next_text' => 'Next &raquo;',
                'type' => 'list'
            ));
            ?>
        </div>

    <?php else : ?>
        <div class="no-cards">
            <h2>No Sports Cards Found</h2>
            <p>Sorry, no Sports cards are available at the moment. Check back soon!</p>
        </div>
    <?php endif; ?>
</div>

<style>
.archive-header {
    text-align: center;
    margin: 60px 0 40px;
}

.archive-title {
    font-size: 3rem;
    font-weight: 700;
    color: var(--white);
    margin-bottom: 15px;
}

.archive-description {
    font-size: 1.2rem;
    color: #cccccc;
}

.cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin: 40px 0;
}

.card-item {
    background: var(--card-bg);
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: var(--transition);
    position: relative;
    border: 1px solid #333333;
}

.card-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
    border-color: var(--primary-color);
}

.card-image {
    position: relative;
    overflow: hidden;
    aspect-ratio: 3/4;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
}

.card-item:hover .card-image img {
    transform: scale(1.05);
}

.card-content {
    padding: 20px;
}

.card-item h3 {
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 10px;
    color: var(--white);
}

.card-item h3 a {
    color: var(--white);
    text-decoration: none;
}

.card-item h3 a:hover {
    color: var(--primary-color);
}

.card-item p {
    color: #cccccc;
    margin-bottom: 15px;
    line-height: 1.5;
}

.card-meta {
    display: flex;
    gap: 15px;
    font-size: 0.9rem;
    color: #999999;
}

.card-meta span {
    background: #333333;
    padding: 4px 8px;
    border-radius: 4px;
    color: var(--white);
}

.pagination {
    margin-top: 40px;
    text-align: center;
}

.pagination ul {
    display: inline-flex;
    list-style: none;
    padding: 0;
    margin: 0;
    gap: 10px;
}

.pagination li {
    margin: 0;
}

.pagination a,
.pagination span {
    display: inline-block;
    padding: 10px 15px;
    border-radius: var(--border-radius);
    text-decoration: none;
    background: var(--card-bg);
    color: var(--white);
    border: 2px solid #333333;
    transition: var(--transition);
}

.pagination a:hover,
.pagination .current {
    background: var(--primary-color);
    color: var(--white);
    border-color: var(--primary-color);
}

.no-cards {
    text-align: center;
    padding: 60px 20px;
}

.no-cards h2 {
    font-size: 2rem;
    color: var(--white);
    margin-bottom: 15px;
}

.no-cards p {
    color: #cccccc;
    margin-bottom: 30px;
}

@media (max-width: 768px) {
    .archive-title {
        font-size: 2rem;
    }
}
</style>

<?php get_footer(); ?> 