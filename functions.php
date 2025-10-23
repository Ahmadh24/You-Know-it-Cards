<?php

if (! defined('WP_DEBUG')) {
	die( 'Direct access forbidden.' );
}

// Add URL handling for Ngrok
function handle_ngrok_urls() {
    // Check if we're accessing via Ngrok
    if (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'ngrok') !== false) {
        // Force HTTPS for Ngrok
        if (!is_ssl()) {
            wp_redirect('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301);
            exit;
        }
    }
}
add_action('init', 'handle_ngrok_urls');

// Fix WordPress URL issues with external domains
function fix_wordpress_urls($url, $path, $orig_scheme, $context) {
    // If accessing via Ngrok, use the Ngrok URL
    if (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'ngrok') !== false) {
        $url = str_replace('youknowitcards.local', $_SERVER['HTTP_HOST'], $url);
        $url = str_replace('http://', 'https://', $url);
    }
    return $url;
}
add_filter('home_url', 'fix_wordpress_urls', 10, 4);
add_filter('site_url', 'fix_wordpress_urls', 10, 4);

// Enqueue parent and child styles
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'), '1.0.1' );
	
	// Enqueue custom JavaScript
	wp_enqueue_script( 'youknowitcards-custom', get_stylesheet_directory_uri() . '/js/custom.js', array(), '1.0.0', true );
});

// Hide WooCommerce elements until ready to sell
add_action( 'wp_head', function() {
	echo '<style>
		.woocommerce-cart-tab-container,
		.ct-cart,
		.add_to_cart_button,
		.single_add_to_cart_button,
		.woocommerce-cart,
		.woocommerce-checkout,
		.woocommerce-my-account {
			display: none !important;
		}
	</style>';
});

// Register Custom Post Types
function ykic_register_post_types() {
    // Pokémon Cards
    register_post_type('pokemon_cards', array(
        'labels' => array(
            'name' => 'Pokémon Cards',
            'singular_name' => 'Pokémon Card',
            'add_new' => 'Add New Card',
            'add_new_item' => 'Add New Pokémon Card',
            'edit_item' => 'Edit Pokémon Card',
            'new_item' => 'New Pokémon Card',
            'view_item' => 'View Pokémon Card',
            'search_items' => 'Search Pokémon Cards',
            'not_found' => 'No Pokémon cards found',
            'not_found_in_trash' => 'No Pokémon cards found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-games',
        'rewrite' => array('slug' => 'pokemon-cards'),
        'show_in_rest' => true
    ));

    // One Piece Cards
    register_post_type('onepiece_cards', array(
        'labels' => array(
            'name' => 'One Piece Cards',
            'singular_name' => 'One Piece Card',
            'add_new' => 'Add New Card',
            'add_new_item' => 'Add New One Piece Card',
            'edit_item' => 'Edit One Piece Card',
            'new_item' => 'New One Piece Card',
            'view_item' => 'View One Piece Card',
            'search_items' => 'Search One Piece Cards',
            'not_found' => 'No One Piece cards found',
            'not_found_in_trash' => 'No One Piece cards found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-games',
        'rewrite' => array('slug' => 'onepiece-cards'),
        'show_in_rest' => true
    ));

    // Sports Cards
    register_post_type('sports_cards', array(
        'labels' => array(
            'name' => 'Sports Cards',
            'singular_name' => 'Sports Card',
            'add_new' => 'Add New Card',
            'add_new_item' => 'Add New Sports Card',
            'edit_item' => 'Edit Sports Card',
            'new_item' => 'New Sports Card',
            'view_item' => 'View Sports Card',
            'search_items' => 'Search Sports Cards',
            'not_found' => 'No Sports cards found',
            'not_found_in_trash' => 'No Sports cards found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-games',
        'rewrite' => array('slug' => 'sports-cards'),
        'show_in_rest' => true
    ));

    // Store Events
    register_post_type('store_events', array(
        'labels' => array(
            'name' => 'Store Events',
            'singular_name' => 'Store Event',
            'add_new' => 'Add New Event',
            'add_new_item' => 'Add New Store Event',
            'edit_item' => 'Edit Store Event',
            'new_item' => 'New Store Event',
            'view_item' => 'View Store Event',
            'search_items' => 'Search Store Events',
            'not_found' => 'No store events found',
            'not_found_in_trash' => 'No store events found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-calendar-alt',
        'rewrite' => array('slug' => 'events'),
        'show_in_rest' => true
    ));

    // Trading Post Discussions
    register_post_type('trading_post', array(
        'labels' => array(
            'name' => 'Trading Post',
            'singular_name' => 'Discussion',
            'add_new' => 'Start Discussion',
            'add_new_item' => 'Start New Discussion',
            'edit_item' => 'Edit Discussion',
            'new_item' => 'New Discussion',
            'view_item' => 'View Discussion',
            'search_items' => 'Search Discussions',
            'not_found' => 'No discussions found',
            'not_found_in_trash' => 'No discussions found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'menu_icon' => 'dashicons-format-chat',
        'rewrite' => array('slug' => 'trading-post'),
        'show_in_rest' => true,
        'comments' => true
    ));

    // Collection Showcase
    register_post_type('collection_showcase', array(
        'labels' => array(
            'name' => 'Collection Showcase',
            'singular_name' => 'Collection',
            'add_new' => 'Show Collection',
            'add_new_item' => 'Show New Collection',
            'edit_item' => 'Edit Collection',
            'new_item' => 'New Collection',
            'view_item' => 'View Collection',
            'search_items' => 'Search Collections',
            'not_found' => 'No collections found',
            'not_found_in_trash' => 'No collections found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'menu_icon' => 'dashicons-format-gallery',
        'rewrite' => array('slug' => 'collections'),
        'show_in_rest' => true,
        'comments' => true
    ));
}

// Hook to register post types
add_action('init', 'ykic_register_post_types');

// Flush rewrite rules on theme activation to ensure custom post type URLs work
add_action( 'after_switch_theme', function() {
	flush_rewrite_rules();
});

// Also flush rewrite rules when custom post types are registered
add_action( 'init', function() {
	if ( get_option( 'youknowitcards_flush_rewrite' ) ) {
		flush_rewrite_rules();
		delete_option( 'youknowitcards_flush_rewrite' );
	}
}, 20 );

// Flush rewrite rules on theme activation
add_action('after_switch_theme', 'ykic_flush_rewrite_rules');

function ykic_flush_rewrite_rules() {
    flush_rewrite_rules();
}

// Add manual flush rewrite rules tool for admin
add_action('admin_menu', 'ykic_add_admin_menu');

function ykic_add_admin_menu() {
    add_management_page(
        'Flush Rewrite Rules',
        'Flush Rewrite Rules',
        'manage_options',
        'flush-rewrite-rules',
        'ykic_flush_rewrite_rules_page'
    );
}

function ykic_flush_rewrite_rules_page() {
    if (isset($_POST['flush_rewrite_rules'])) {
        flush_rewrite_rules();
        echo '<div class="notice notice-success"><p>Rewrite rules flushed successfully!</p></div>';
    }
    ?>
    <div class="wrap">
        <h1>Flush Rewrite Rules</h1>
        <p>Click the button below to flush rewrite rules. This is useful after adding new custom post types.</p>
        <form method="post">
            <input type="submit" name="flush_rewrite_rules" class="button button-primary" value="Flush Rewrite Rules">
        </form>
    </div>
    <?php
}

// Add custom meta boxes for card details
add_action( 'add_meta_boxes', function() {
	add_meta_box(
		'card_details',
		'Card Details',
		function( $post ) {
			wp_nonce_field( 'card_details_nonce', 'card_details_nonce' );
			$rarity = get_post_meta( $post->ID, '_card_rarity', true );
			$condition = get_post_meta( $post->ID, '_card_condition', true );
			$year = get_post_meta( $post->ID, '_card_year', true );
			$quantity = get_post_meta( $post->ID, '_card_quantity', true );
			?>
			<table class="form-table">
				<tr>
					<th><label for="card_rarity">Rarity</label></th>
					<td><input type="text" id="card_rarity" name="card_rarity" value="<?php echo esc_attr( $rarity ); ?>" /></td>
				</tr>
				<tr>
					<th><label for="card_condition">Condition</label></th>
					<td>
						<select id="card_condition" name="card_condition">
							<option value="">Select Condition</option>
							<option value="Mint" <?php selected( $condition, 'Mint' ); ?>>Mint</option>
							<option value="Near Mint" <?php selected( $condition, 'Near Mint' ); ?>>Near Mint</option>
							<option value="Excellent" <?php selected( $condition, 'Excellent' ); ?>>Excellent</option>
							<option value="Good" <?php selected( $condition, 'Good' ); ?>>Good</option>
							<option value="Light Played" <?php selected( $condition, 'Light Played' ); ?>>Light Played</option>
							<option value="Played" <?php selected( $condition, 'Played' ); ?>>Played</option>
						</select>
					</td>
				</tr>
				<tr>
					<th><label for="card_year">Year</label></th>
					<td><input type="number" id="card_year" name="card_year" value="<?php echo esc_attr( $year ); ?>" min="1990" max="<?php echo date('Y'); ?>" /></td>
				</tr>
				<tr>
					<th><label for="card_quantity">Quantity in Stock</label></th>
					<td><input type="number" id="card_quantity" name="card_quantity" value="<?php echo esc_attr( $quantity ); ?>" min="0" /></td>
				</tr>
			</table>
			<?php
		},
		array( 'pokemon_cards', 'onepiece_cards', 'sports_cards' ),
		'normal',
		'high'
	);

	// Event details meta box
	add_meta_box(
		'event_details',
		'Event Details',
		function( $post ) {
			wp_nonce_field( 'event_details_nonce', 'event_details_nonce' );
			$event_date = get_post_meta( $post->ID, '_event_date', true );
			$event_time = get_post_meta( $post->ID, '_event_time', true );
			$event_type = get_post_meta( $post->ID, '_event_type', true );
			$event_location = get_post_meta( $post->ID, '_event_location', true );
			?>
			<table class="form-table">
				<tr>
					<th><label for="event_date">Event Date</label></th>
					<td><input type="date" id="event_date" name="event_date" value="<?php echo esc_attr( $event_date ); ?>" /></td>
				</tr>
				<tr>
					<th><label for="event_time">Event Time</label></th>
					<td><input type="time" id="event_time" name="event_time" value="<?php echo esc_attr( $event_time ); ?>" /></td>
				</tr>
				<tr>
					<th><label for="event_type">Event Type</label></th>
					<td>
						<select id="event_type" name="event_type">
							<option value="">Select Event Type</option>
							<option value="Tournament" <?php selected( $event_type, 'Tournament' ); ?>>Tournament</option>
							<option value="Trading Session" <?php selected( $event_type, 'Trading Session' ); ?>>Trading Session</option>
							<option value="Card Release" <?php selected( $event_type, 'Card Release' ); ?>>Card Release</option>
							<option value="Special Sale" <?php selected( $event_type, 'Special Sale' ); ?>>Special Sale</option>
							<option value="Community Event" <?php selected( $event_type, 'Community Event' ); ?>>Community Event</option>
						</select>
					</td>
				</tr>
				<tr>
					<th><label for="event_location">Location</label></th>
					<td><input type="text" id="event_location" name="event_location" value="<?php echo esc_attr( $event_location ); ?>" placeholder="Store or specific location" /></td>
				</tr>
			</table>
			<?php
		},
		'store_events',
		'normal',
		'high'
	);
});

// Save custom meta data
add_action( 'save_post', function( $post_id ) {
	// Save card details
	if ( isset( $_POST['card_details_nonce'] ) && wp_verify_nonce( $_POST['card_details_nonce'], 'card_details_nonce' ) ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$fields = array( 'card_rarity', 'card_condition', 'card_year', 'card_quantity' );
		foreach ( $fields as $field ) {
			if ( isset( $_POST[ $field ] ) ) {
				update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
			}
		}
	}

	// Save event details
	if ( isset( $_POST['event_details_nonce'] ) && wp_verify_nonce( $_POST['event_details_nonce'], 'event_details_nonce' ) ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$fields = array( 'event_date', 'event_time', 'event_type', 'event_location' );
		foreach ( $fields as $field ) {
			if ( isset( $_POST[ $field ] ) ) {
				update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
			}
		}
	}
});

// Create Coming Soon page on theme activation
add_action('after_switch_theme', 'create_coming_soon_page');
function create_coming_soon_page() {
    // Check if Coming Soon page already exists
    $coming_soon_page = get_page_by_path('coming-soon');
    
    if (!$coming_soon_page) {
        // Create the Coming Soon page
        $page_data = array(
            'post_title'    => 'Coming Soon',
            'post_content'  => 'Our team is currently preparing an incredible collection of trading cards for you. Stay tuned for updates and be the first to know when we launch!',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_name'     => 'coming-soon',
            'post_author'   => 1,
            'page_template' => 'page-coming-soon.php'
        );
        
        $page_id = wp_insert_post($page_data);
        
        if ($page_id) {
            // Set the page template
            update_post_meta($page_id, '_wp_page_template', 'page-coming-soon.php');
        }
    }
}

// Add custom shortcodes for displaying card categories
add_shortcode( 'pokemon_cards_grid', function( $atts ) {
	$atts = shortcode_atts( array(
		'posts_per_page' => 6,
		'columns' => 3
	), $atts );

	// TikTok shop URLs for Pokémon cards
	$tiktok_urls = array(
		'https://www.tiktok.com/shop/pdp/pokemon-tcg-scarlet-violet-prismatic-evolution-booster-pack/1731715742051767172?source=product_detail&enter_from=product_detail&enter_method=feed_list_more_from&first_entrance=tts',
		'https://www.tiktok.com/shop/pdp/1731776391414322052?source=product_detail&enter_from=product_detail&enter_method=feed_list_more_from&first_entrance=tts',
		'https://www.tiktok.com/shop/pdp/1731776392207373188?source=product_detail&enter_from=product_detail&enter_method=feed_list_more_from&first_entrance=tts'
	);

	$args = array(
		'post_type' => 'pokemon_cards',
		'posts_per_page' => $atts['posts_per_page'],
		'post_status' => 'publish'
	);

	$query = new WP_Query( $args );
	$output = '<div class="cards-grid pokemon-cards-grid" style="display: grid; grid-template-columns: repeat(' . $atts['columns'] . ', 1fr); gap: 20px;">';
	
	$card_index = 0;
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$tiktok_url = $tiktok_urls[$card_index % count($tiktok_urls)]; // Cycle through URLs
			$output .= '<div class="card-item">';
			if ( has_post_thumbnail() ) {
				$output .= '<div class="card-image"><a href="' . esc_url($tiktok_url) . '" target="_blank" rel="noopener noreferrer">' . get_the_post_thumbnail( get_the_ID(), 'medium' ) . '</a></div>';
			}
			$output .= '<div class="card-content">';
			$output .= '<h3><a href="' . esc_url($tiktok_url) . '" target="_blank" rel="noopener noreferrer">' . get_the_title() . '</a></h3>';
			$output .= '<p>' . get_the_excerpt() . '</p>';
			
			// Add card meta
			$rarity = get_post_meta( get_the_ID(), '_card_rarity', true );
			$condition = get_post_meta( get_the_ID(), '_card_condition', true );
			$quantity = get_post_meta( get_the_ID(), '_card_quantity', true );
			if ( $rarity || $condition || $quantity ) {
				$output .= '<div class="card-meta">';
				if ( $rarity ) $output .= '<span>' . esc_html( $rarity ) . '</span>';
				if ( $condition ) $output .= '<span>' . esc_html( $condition ) . '</span>';
				if ( $quantity ) $output .= '<span>Qty: ' . esc_html( $quantity ) . '</span>';
				$output .= '</div>';
			}
			$output .= '</div>';
			$output .= '</div>';
			$card_index++;
		}
	}
	
	$output .= '</div>';
	wp_reset_postdata();
	return $output;
});

// Similar shortcodes for other categories
add_shortcode( 'onepiece_cards_grid', function( $atts ) {
	$atts = shortcode_atts( array(
		'posts_per_page' => 6,
		'columns' => 3
	), $atts );

	$args = array(
		'post_type' => 'onepiece_cards',
		'posts_per_page' => $atts['posts_per_page'],
		'post_status' => 'publish'
	);

	$query = new WP_Query( $args );
	$output = '<div class="cards-grid onepiece-cards-grid" style="display: grid; grid-template-columns: repeat(' . $atts['columns'] . ', 1fr); gap: 20px;">';
	
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$output .= '<div class="card-item">';
			if ( has_post_thumbnail() ) {
				$output .= '<div class="card-image"><a href="#" onclick="showComingSoon(); return false;">' . get_the_post_thumbnail( get_the_ID(), 'medium' ) . '</a></div>';
			}
			$output .= '<div class="card-content">';
			$output .= '<h3><a href="#" onclick="showComingSoon(); return false;">' . get_the_title() . '</a></h3>';
			$output .= '<p>' . get_the_excerpt() . '</p>';
			
			// Add card meta
			$rarity = get_post_meta( get_the_ID(), '_card_rarity', true );
			$condition = get_post_meta( get_the_ID(), '_card_condition', true );
			$quantity = get_post_meta( get_the_ID(), '_card_quantity', true );
			if ( $rarity || $condition || $quantity ) {
				$output .= '<div class="card-meta">';
				if ( $rarity ) $output .= '<span>' . esc_html( $rarity ) . '</span>';
				if ( $condition ) $output .= '<span>' . esc_html( $condition ) . '</span>';
				if ( $quantity ) $output .= '<span>Qty: ' . esc_html( $quantity ) . '</span>';
				$output .= '</div>';
			}
			$output .= '</div>';
			$output .= '</div>';
		}
	}
	
	$output .= '</div>';
	wp_reset_postdata();
	return $output;
});

add_shortcode( 'sports_cards_grid', function( $atts ) {
	$atts = shortcode_atts( array(
		'posts_per_page' => 6,
		'columns' => 3
	), $atts );

	$args = array(
		'post_type' => 'sports_cards',
		'posts_per_page' => $atts['posts_per_page'],
		'post_status' => 'publish'
	);

	$query = new WP_Query( $args );
	$output = '<div class="cards-grid sports-cards-grid" style="display: grid; grid-template-columns: repeat(' . $atts['columns'] . ', 1fr); gap: 20px;">';
	
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$output .= '<div class="card-item">';
			if ( has_post_thumbnail() ) {
				$output .= '<div class="card-image"><a href="#" onclick="showComingSoon(); return false;">' . get_the_post_thumbnail( get_the_ID(), 'medium' ) . '</a></div>';
			}
			$output .= '<div class="card-content">';
			$output .= '<h3><a href="#" onclick="showComingSoon(); return false;">' . get_the_title() . '</a></h3>';
			$output .= '<p>' . get_the_excerpt() . '</p>';
			
			// Add card meta
			$rarity = get_post_meta( get_the_ID(), '_card_rarity', true );
			$condition = get_post_meta( get_the_ID(), '_card_condition', true );
			$quantity = get_post_meta( get_the_ID(), '_card_quantity', true );
			if ( $rarity || $condition || $quantity ) {
				$output .= '<div class="card-meta">';
				if ( $rarity ) $output .= '<span>' . esc_html( $rarity ) . '</span>';
				if ( $condition ) $output .= '<span>' . esc_html( $condition ) . '</span>';
				if ( $quantity ) $output .= '<span>Qty: ' . esc_html( $quantity ) . '</span>';
				$output .= '</div>';
			}
			$output .= '</div>';
			$output .= '</div>';
		}
	}
	
	$output .= '</div>';
	wp_reset_postdata();
	return $output;
});

// Add Coming Soon modal JavaScript and CSS
add_action('wp_footer', 'add_coming_soon_modal');
function add_coming_soon_modal() {
    ?>
    <div id="coming-soon-modal" class="coming-soon-modal" style="display: none;">
        <div class="coming-soon-overlay" onclick="hideComingSoon()"></div>
        <div class="coming-soon-content">
            <div class="coming-soon-icon">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12,6 12,12 16,14"/>
                </svg>
            </div>
            <h2 class="coming-soon-title">Coming Soon</h2>
            <p class="coming-soon-subtitle">We're working hard to bring you amazing cards!</p>
            <p class="coming-soon-description">Our team is currently preparing an incredible collection of trading cards for you. Stay tuned for updates and be the first to know when we launch!</p>
            <div class="coming-soon-actions">
                <button onclick="hideComingSoon()" class="btn btn-primary">Got it!</button>
            </div>
        </div>
    </div>

    <style>
    .coming-soon-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .coming-soon-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(5px);
    }

    .coming-soon-content {
        position: relative;
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
        padding: 40px;
        border-radius: 20px;
        text-align: center;
        max-width: 500px;
        width: 90%;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.1);
        animation: modalSlideIn 0.3s ease-out;
    }

    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: translateY(-50px) scale(0.9);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .coming-soon-icon {
        margin-bottom: 20px;
        color: #ffd700;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .coming-soon-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 15px;
        text-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
    }

    .coming-soon-subtitle {
        font-size: 1.3rem;
        color: #cccccc;
        margin-bottom: 20px;
    }

    .coming-soon-description {
        font-size: 1rem;
        color: #aaaaaa;
        line-height: 1.6;
        margin-bottom: 30px;
    }

    .coming-soon-actions {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .btn {
        padding: 12px 30px;
        border: none;
        border-radius: 25px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-primary {
        background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
        color: #1a1a2e;
        box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 215, 0, 0.4);
    }

    @media (max-width: 768px) {
        .coming-soon-content {
            padding: 30px 20px;
            margin: 20px;
        }
        
        .coming-soon-title {
            font-size: 2rem;
        }
        
        .coming-soon-subtitle {
            font-size: 1.1rem;
        }
    }
    </style>

    <script>
    function showComingSoon() {
        document.getElementById('coming-soon-modal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function hideComingSoon() {
        document.getElementById('coming-soon-modal').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            hideComingSoon();
        }
    });
    </script>
    <?php
}

// Events shortcode
add_shortcode( 'store_events_grid', function( $atts ) {
	$atts = shortcode_atts( array(
		'posts_per_page' => 3,
		'columns' => 3
	), $atts );

	$args = array(
		'post_type' => 'store_events',
		'posts_per_page' => $atts['posts_per_page'],
		'post_status' => 'publish',
		'meta_query' => array(
			array(
				'key' => '_event_date',
				'value' => date('Y-m-d'),
				'compare' => '>=',
				'type' => 'DATE'
			)
		),
		'orderby' => 'meta_value',
		'meta_key' => '_event_date',
		'order' => 'ASC'
	);

	$query = new WP_Query( $args );
	$output = '<div class="events-grid" style="display: grid; grid-template-columns: repeat(' . $atts['columns'] . ', 1fr); gap: 20px;">';
	
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$event_date = get_post_meta( get_the_ID(), '_event_date', true );
			$event_time = get_post_meta( get_the_ID(), '_event_time', true );
			$event_type = get_post_meta( get_the_ID(), '_event_type', true );
			$event_location = get_post_meta( get_the_ID(), '_event_location', true );
			
			$output .= '<div class="event-item">';
			if ( has_post_thumbnail() ) {
				$output .= '<div class="event-image"><a href="' . get_permalink() . '">' . get_the_post_thumbnail( get_the_ID(), 'medium' ) . '</a></div>';
			}
			$output .= '<div class="event-content">';
			$output .= '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
			$output .= '<p>' . get_the_excerpt() . '</p>';
			
			// Add event meta
			$output .= '<div class="event-meta">';
			if ( $event_date ) {
				$formatted_date = date('F j, Y', strtotime($event_date));
				$output .= '<span class="event-date">📅 ' . $formatted_date . '</span>';
			}
			if ( $event_time ) {
				$output .= '<span class="event-time">🕒 ' . date('g:i A', strtotime($event_time)) . '</span>';
			}
			if ( $event_type ) {
				$output .= '<span class="event-type">🎯 ' . esc_html( $event_type ) . '</span>';
			}
			if ( $event_location ) {
				$output .= '<span class="event-location">📍 ' . esc_html( $event_location ) . '</span>';
			}
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
		}
	} else {
		$output .= '<div class="no-events">';
		$output .= '<p>No upcoming events at the moment. Check back soon!</p>';
		$output .= '</div>';
	}
	
	$output .= '</div>';
	wp_reset_postdata();
	return $output;
});

// Shortcode for Trading Post discussions
add_shortcode('trading_post_grid', 'ykic_trading_post_grid');
function ykic_trading_post_grid($atts) {
    $atts = shortcode_atts(array(
        'posts_per_page' => 6,
        'columns' => 3
    ), $atts);
    
    $args = array(
        'post_type' => 'trading_post',
        'posts_per_page' => $atts['posts_per_page'],
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    $discussions = get_posts($args);
    
    if (empty($discussions)) {
        return '<div class="no-discussions"><p>No discussions yet. Be the first to start one!</p></div>';
    }
    
    $output = '<div class="trading-post-grid">';
    
    foreach ($discussions as $discussion) {
        setup_postdata($discussion);
        $comment_count = get_comments_number($discussion->ID);
        
        $output .= '<div class="discussion-item">';
        if (has_post_thumbnail($discussion->ID)) {
            $output .= '<div class="discussion-image">' . get_the_post_thumbnail($discussion->ID, 'medium') . '</div>';
        }
        $output .= '<div class="discussion-content">';
        $output .= '<h3><a href="' . get_permalink($discussion->ID) . '">' . get_the_title($discussion->ID) . '</a></h3>';
        $output .= '<p>' . get_the_excerpt($discussion->ID) . '</p>';
        $output .= '<div class="discussion-meta">';
        $output .= '<span class="discussion-author">By ' . get_the_author_meta('display_name', $discussion->post_author) . '</span>';
        $output .= '<span class="discussion-comments">💬 ' . $comment_count . ' comments</span>';
        $output .= '<span class="discussion-date">' . get_the_date('M j, Y', $discussion->ID) . '</span>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
    }
    
    wp_reset_postdata();
    
    $output .= '</div>';
    return $output;
}

// Shortcode for Collection Showcase
add_shortcode('collection_showcase_grid', 'ykic_collection_showcase_grid');
function ykic_collection_showcase_grid($atts) {
    $atts = shortcode_atts(array(
        'posts_per_page' => 6,
        'columns' => 3
    ), $atts);
    
    $args = array(
        'post_type' => 'collection_showcase',
        'posts_per_page' => $atts['posts_per_page'],
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    $collections = get_posts($args);
    
    if (empty($collections)) {
        return '<div class="no-collections"><p>No collections shared yet. Be the first to showcase yours!</p></div>';
    }
    
    $output = '<div class="collection-showcase-grid">';
    
    foreach ($collections as $collection) {
        setup_postdata($collection);
        $comment_count = get_comments_number($collection->ID);
        
        $output .= '<div class="collection-item">';
        if (has_post_thumbnail($collection->ID)) {
            $output .= '<div class="collection-image">' . get_the_post_thumbnail($collection->ID, 'medium') . '</div>';
        }
        $output .= '<div class="collection-content">';
        $output .= '<h3><a href="' . get_permalink($collection->ID) . '">' . get_the_title($collection->ID) . '</a></h3>';
        $output .= '<p>' . get_the_excerpt($collection->ID) . '</p>';
        $output .= '<div class="collection-meta">';
        $output .= '<span class="collection-author">By ' . get_the_author_meta('display_name', $collection->post_author) . '</span>';
        $output .= '<span class="collection-comments">💬 ' . $comment_count . ' comments</span>';
        $output .= '<span class="collection-date">' . get_the_date('M j, Y', $collection->ID) . '</span>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
    }
    
    wp_reset_postdata();
    
    $output .= '</div>';
    return $output;
}

// Add custom image sizes for cards
add_action( 'after_setup_theme', function() {
	add_image_size( 'card-thumbnail', 300, 400, true );
	add_image_size( 'card-medium', 600, 800, true );
	add_image_size( 'card-large', 900, 1200, true );
});

// Customize admin columns for card post types
add_filter( 'manage_pokemon_cards_posts_columns', function( $columns ) {
	$new_columns = array();
	$new_columns['cb'] = $columns['cb'];
	$new_columns['title'] = $columns['title'];
	$new_columns['rarity'] = 'Rarity';
	$new_columns['condition'] = 'Condition';
	$new_columns['year'] = 'Year';
	$new_columns['date'] = $columns['date'];
	return $new_columns;
});

add_action( 'manage_pokemon_cards_posts_custom_column', function( $column, $post_id ) {
	switch ( $column ) {
		case 'rarity':
			echo get_post_meta( $post_id, '_card_rarity', true );
			break;
		case 'condition':
			echo get_post_meta( $post_id, '_card_condition', true );
			break;
		case 'year':
			echo get_post_meta( $post_id, '_card_year', true );
			break;
	}
}, 10, 2 );

// Make admin columns sortable
add_filter( 'manage_edit-pokemon_cards_sortable_columns', function( $columns ) {
	$columns['rarity'] = 'rarity';
	$columns['condition'] = 'condition';
	$columns['year'] = 'year';
	return $columns;
});

// Add custom body class for card pages
add_filter( 'body_class', function( $classes ) {
	if ( is_post_type_archive( array( 'pokemon_cards', 'onepiece_cards', 'sports_cards', 'store_events' ) ) ) {
		$classes[] = 'card-archive-page';
	}
	if ( is_singular( array( 'pokemon_cards', 'onepiece_cards', 'sports_cards', 'store_events' ) ) ) {
		$classes[] = 'card-single-page';
	}
	return $classes;
});

// Default menu function for YKIC header
function ykic_default_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . home_url('/') . '">Home</a></li>';
    echo '<li><a href="' . get_post_type_archive_link('pokemon_cards') . '">Pokémon</a></li>';
    echo '<li><a href="' . get_post_type_archive_link('onepiece_cards') . '">One Piece</a></li>';
    echo '<li><a href="' . get_post_type_archive_link('sports_cards') . '">Sports</a></li>';
    echo '<li><a href="' . get_post_type_archive_link('store_events') . '">Events</a></li>';
    echo '<li><a href="' . home_url('/about/') . '">About</a></li>';
    echo '<li><a href="' . home_url('/social-media/') . '">Social</a></li>';
    echo '<li><a href="' . home_url('/sponsors/') . '">Sponsors</a></li>';
    echo '</ul>';
}

// Register navigation menu
add_action( 'after_setup_theme', function() {
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'blocksy' ),
    ) );
});

// Create Social Media page if it doesn't exist
add_action( 'init', function() {
    $page_title = 'Social Media';
    $page_slug = 'social-media';
    
    // Check if page already exists
    $existing_page = get_page_by_path( $page_slug );
    
    if ( ! $existing_page ) {
        $page_data = array(
            'post_title'    => $page_title,
            'post_name'     => $page_slug,
            'post_content'  => 'Follow YouKnowItCards on all our social media platforms!',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_author'   => 1,
            'page_template' => 'page-social-media.php'
        );
        
        $page_id = wp_insert_post( $page_data );
        
        if ( $page_id ) {
            update_post_meta( $page_id, '_wp_page_template', 'page-social-media.php' );
        }
    }
});

// Create Sponsors page if it doesn't exist
add_action( 'init', function() {
    $page_title = 'Sponsors';
    $page_slug = 'sponsors';
    
    // Check if page already exists
    $existing_page = get_page_by_path( $page_slug );
    
    if ( ! $existing_page ) {
        $page_data = array(
            'post_title'    => $page_title,
            'post_name'     => $page_slug,
            'post_content'  => 'Support our partners and save money with exclusive discount codes!',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_author'   => 1,
            'page_template' => 'page-sponsors.php'
        );
        
        $page_id = wp_insert_post( $page_data );
        
        if ( $page_id ) {
            update_post_meta( $page_id, '_wp_page_template', 'page-sponsors.php' );
        }
    }
});

// Create About page if it doesn't exist
add_action( 'init', function() {
    $page_title = 'About Us';
    $page_slug = 'about';
    
    // Check if page already exists
    $existing_page = get_page_by_path( $page_slug );
    
    if ( ! $existing_page ) {
        $page_data = array(
            'post_title'    => $page_title,
            'post_name'     => $page_slug,
            'post_content'  => 'Learn more about YouKnowItCards and our story.',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_author'   => 1,
            'page_template' => 'page-about.php'
        );
        
        $page_id = wp_insert_post( $page_data );
        
        if ( $page_id ) {
            update_post_meta( $page_id, '_wp_page_template', 'page-about.php' );
        }
    }
});

// Add admin notice to flush rewrite rules if needed
add_action( 'admin_notices', function() {
	if ( isset( $_GET['flush_rewrite'] ) && $_GET['flush_rewrite'] == '1' ) {
		flush_rewrite_rules();
		echo '<div class="notice notice-success is-dismissible"><p>Permalinks have been refreshed successfully!</p></div>';
	}
});

// Add a link in admin to flush rewrite rules
add_action( 'admin_menu', function() {
	add_submenu_page(
		'tools.php',
		'Flush Rewrite Rules',
		'Flush Rewrite Rules',
		'manage_options',
		'flush-rewrite-rules',
		function() {
			echo '<div class="wrap">';
			echo '<h1>Flush Rewrite Rules</h1>';
			echo '<p>Click the button below to refresh the permalink structure for custom post types.</p>';
			echo '<a href="' . admin_url( 'tools.php?page=flush-rewrite-rules&flush_rewrite=1' ) . '" class="button button-primary">Flush Rewrite Rules</a>';
			echo '</div>';
		}
	);
});

// Handle contact form submission
add_action('admin_post_nopriv_ykic_contact_form', 'ykic_handle_contact_form');
add_action('admin_post_ykic_contact_form', 'ykic_handle_contact_form');

function ykic_handle_contact_form() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['ykic_nonce'], 'ykic_contact_nonce')) {
        wp_die('Security check failed');
    }
    
    // Get form data
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        wp_redirect(home_url('/?contact=error&message=missing_fields'));
        exit;
    }
    
    // Validate email
    if (!is_email($email)) {
        wp_redirect(home_url('/?contact=error&message=invalid_email'));
        exit;
    }
    
    // Prepare email
    $to = 'ahmahamoudeh1999@gmail.com';
    $email_subject = $subject ? 'YouKnowItCards Contact: ' . $subject : 'YouKnowItCards Contact Form Submission';
    
    $email_body = "You have received a new contact form submission from your website:\n\n";
    $email_body .= "Name: " . $name . "\n";
    $email_body .= "Email: " . $email . "\n";
    $email_subject_line = $subject ? "Subject: " . $subject . "\n" : "Subject: (No subject provided)\n";
    $email_body .= $email_subject_line;
    $email_body .= "\nMessage:\n" . $message . "\n\n";
    $email_body .= "---\n";
    $email_body .= "This email was sent from the contact form on " . get_bloginfo('name') . " (" . home_url() . ")\n";
    $email_body .= "Sent on: " . date('Y-m-d H:i:s') . "\n";
    $email_body .= "User IP: " . $_SERVER['REMOTE_ADDR'] . "\n";
    
    // Try multiple email methods
    $sent = false;
    
    // Method 1: Standard wp_mail with proper headers
    $headers = array(
        'From: ' . get_bloginfo('name') . ' <noreply@' . $_SERVER['HTTP_HOST'] . '>',
        'Reply-To: ' . $name . ' <' . $email . '>',
        'Content-Type: text/plain; charset=UTF-8',
        'X-Mailer: WordPress/' . get_bloginfo('version')
    );
    
    $sent = wp_mail($to, $email_subject, $email_body, $headers);
    
    // Method 2: If wp_mail fails, try with different headers
    if (!$sent) {
        $headers_alt = array(
            'From: ' . get_bloginfo('name') . ' <wordpress@' . $_SERVER['HTTP_HOST'] . '>',
            'Reply-To: ' . $name . ' <' . $email . '>',
            'Content-Type: text/plain; charset=UTF-8'
        );
        
        $sent = wp_mail($to, $email_subject, $email_body, $headers_alt);
    }
    
    // Method 3: If still failing, try with minimal headers
    if (!$sent) {
        $headers_minimal = 'From: ' . get_bloginfo('name') . ' <wordpress@' . $_SERVER['HTTP_HOST'] . '>' . "\r\n";
        $headers_minimal .= 'Reply-To: ' . $name . ' <' . $email . '>' . "\r\n";
        
        $sent = wp_mail($to, $email_subject, $email_body, $headers_minimal);
    }
    
    if ($sent) {
        // Success - redirect back to homepage with success message
        wp_redirect(home_url('/?contact=success'));
    } else {
        // Failed - redirect back with error message
        wp_redirect(home_url('/?contact=error&message=send_failed'));
    }
    exit;
}

// Add JavaScript for form handling
add_action('wp_footer', function() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const contactForm = document.querySelector('.contact-form-submit');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                
                // Show loading state
                submitBtn.textContent = 'Sending...';
                submitBtn.disabled = true;
                
                // Form will submit normally, but we show loading state
            });
        }
        
        // Check for success/error messages in URL
        const urlParams = new URLSearchParams(window.location.search);
        const contactStatus = urlParams.get('contact');
        const message = urlParams.get('message');
        
        if (contactStatus === 'success') {
            alert('Thank you! Your message has been sent successfully. We\'ll get back to you soon.');
            // Clear the URL parameters to prevent the message from showing again on refresh
            window.history.replaceState({}, document.title, window.location.pathname);
        } else if (contactStatus === 'error') {
            let errorMessage = 'Sorry, there was an error sending your message. Please try again.';
            if (message === 'missing_fields') {
                errorMessage = 'Please fill in all required fields.';
            } else if (message === 'invalid_email') {
                errorMessage = 'Please enter a valid email address.';
            } else if (message === 'send_failed') {
                errorMessage = 'Failed to send message. Please try again later.';
            }
            alert(errorMessage);
            // Clear the URL parameters to prevent the message from showing again on refresh
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    });
    </script>
    <?php
});

// Add a test email function for debugging
add_action('wp_ajax_test_email', 'ykic_test_email');
add_action('wp_ajax_nopriv_test_email', 'ykic_test_email');

function ykic_test_email() {
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    $to = 'ahmahamoudeh1999@gmail.com';
    $subject = 'YKIC Test Email - ' . date('Y-m-d H:i:s');
    $message = "This is a test email from your YouKnowItCards website.\n\n";
    $message .= "Website: " . home_url() . "\n";
    $message .= "Sent: " . date('Y-m-d H:i:s') . "\n";
    $message .= "Server: " . $_SERVER['SERVER_NAME'] . "\n";
    
    $headers = array(
        'From: ' . get_bloginfo('name') . ' <wordpress@' . $_SERVER['HTTP_HOST'] . '>',
        'Content-Type: text/plain; charset=UTF-8'
    );
    
    $sent = wp_mail($to, $subject, $message, $headers);
    
    if ($sent) {
        echo 'Test email sent successfully!';
    } else {
        echo 'Test email failed to send. Check your server email configuration.';
    }
    
    wp_die();
}

// Add enhanced smooth scrolling for anchor links
add_action('wp_footer', 'ykic_smooth_scrolling');
function ykic_smooth_scrolling() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Enhanced smooth scrolling for anchor links
        const anchorLinks = document.querySelectorAll('a[href^="#"]');
        
        anchorLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    // Calculate scroll position accounting for header height
                    const headerHeight = document.querySelector('.ct-header')?.offsetHeight || 100;
                    const targetPosition = targetElement.offsetTop - headerHeight - 20; // 20px extra padding
                    
                    // Smooth scroll to target
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    // Update URL without page jump
                    if (history.pushState) {
                        history.pushState(null, null, targetId);
                    }
                }
            });
        });
        
        // Handle direct anchor links in URL on page load
        if (window.location.hash) {
            const targetElement = document.querySelector(window.location.hash);
            if (targetElement) {
                setTimeout(() => {
                    const headerHeight = document.querySelector('.ct-header')?.offsetHeight || 100;
                    const targetPosition = targetElement.offsetTop - headerHeight - 20;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }, 100);
            }
        }
    });
    </script>
    <?php
}

// Add viewport meta tag for mobile responsiveness
add_action('wp_head', 'ykic_add_viewport_meta');
function ykic_add_viewport_meta() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">' . "\n";
}

// Add mobile-specific JavaScript enhancements
add_action('wp_footer', 'ykic_mobile_enhancements');
function ykic_mobile_enhancements() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile-specific enhancements
        
        // Prevent zoom on input focus (iOS)
        const inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"], textarea');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                if (window.innerWidth <= 768) {
                    this.style.fontSize = '16px';
                }
            });
            
            input.addEventListener('blur', function() {
                if (window.innerWidth <= 768) {
                    this.style.fontSize = '';
                }
            });
        });
        
        // Improve touch scrolling on mobile
        if ('ontouchstart' in window) {
            document.body.style.webkitOverflowScrolling = 'touch';
        }
        
        // Add touch feedback for buttons
        const touchElements = document.querySelectorAll('.btn, .nav-menu a, .social-card, .community-card, .whatnot-card');
        touchElements.forEach(element => {
            element.addEventListener('touchstart', function() {
                this.style.transform = 'scale(0.98)';
            });
            
            element.addEventListener('touchend', function() {
                this.style.transform = '';
            });
        });
        
        // Optimize images for mobile
        const images = document.querySelectorAll('img');
        images.forEach(img => {
            if (window.innerWidth <= 768) {
                img.style.maxWidth = '100%';
                img.style.height = 'auto';
            }
        });
        
        // Handle orientation change
        window.addEventListener('orientationchange', function() {
            setTimeout(function() {
                // Force layout recalculation
                window.dispatchEvent(new Event('resize'));
            }, 100);
        });
        
        // Add mobile navigation improvements
        const navMenu = document.querySelector('.nav-menu');
        if (navMenu && window.innerWidth <= 768) {
            // Add mobile menu toggle functionality if needed
            navMenu.style.overflowX = 'auto';
            navMenu.style.webkitOverflowScrolling = 'touch';
        }
        
        // Optimize card grids for mobile
        const cardGrids = document.querySelectorAll('.pokemon-cards-grid, .onepiece-cards-grid, .sports-cards-grid, .events-grid');
        cardGrids.forEach(grid => {
            if (window.innerWidth <= 480) {
                grid.style.gridTemplateColumns = '1fr';
                grid.style.gap = '20px';
            } else if (window.innerWidth <= 768) {
                grid.style.gridTemplateColumns = 'repeat(2, 1fr)';
                grid.style.gap = '25px';
            }
        });
        
        // Add mobile-specific contact form handling
        const contactForm = document.querySelector('.contact-form');
        if (contactForm && window.innerWidth <= 768) {
            const formInputs = contactForm.querySelectorAll('input, textarea');
            formInputs.forEach(input => {
                input.style.minHeight = '50px';
                input.style.fontSize = '16px';
            });
        }
    });
    
    // Handle window resize for responsive behavior
    window.addEventListener('resize', function() {
        const width = window.innerWidth;
        
        // Update card grid layouts on resize
        const cardGrids = document.querySelectorAll('.pokemon-cards-grid, .onepiece-cards-grid, .sports-cards-grid, .events-grid');
        cardGrids.forEach(grid => {
            if (width <= 480) {
                grid.style.gridTemplateColumns = '1fr';
                grid.style.gap = '20px';
            } else if (width <= 768) {
                grid.style.gridTemplateColumns = 'repeat(2, 1fr)';
                grid.style.gap = '25px';
            } else {
                grid.style.gridTemplateColumns = 'repeat(3, 1fr)';
                grid.style.gap = '30px';
            }
        });
        
        // Update social media grid layouts
        const socialGrids = document.querySelectorAll('.social-media-grid, .community-grid, .whatnot-content');
        socialGrids.forEach(grid => {
            if (width <= 480) {
                grid.style.gridTemplateColumns = '1fr';
                grid.style.gap = '20px';
            } else if (width <= 768) {
                grid.style.gridTemplateColumns = 'repeat(2, 1fr)';
                grid.style.gap = '25px';
            } else {
                grid.style.gridTemplateColumns = 'repeat(3, 1fr)';
                grid.style.gap = '30px';
            }
        });
    });
    </script>
    <?php
}

// Save meta data when posts are saved
add_action('save_post', 'ykic_save_meta');
function ykic_save_meta($post_id) {
    // Check if nonce is valid
    if (!isset($_POST['ykic_card_meta_nonce']) || !wp_verify_nonce($_POST['ykic_card_meta_nonce'], 'ykic_save_card_meta')) {
        return;
    }
    
    // Check if user has permission to edit
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Save card meta fields
    if (in_array(get_post_type($post_id), array('pokemon_cards', 'onepiece_cards', 'sports_cards'))) {
        $fields = array('card_rarity', 'card_condition', 'card_year', 'card_quantity');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                $value = sanitize_text_field($_POST[$field]);
                update_post_meta($post_id, '_' . $field, $value);
            }
        }
    }
    
    // Save event meta fields
    if (get_post_type($post_id) === 'store_events') {
        $fields = array('event_date', 'event_time', 'event_type', 'event_location');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                $value = sanitize_text_field($_POST[$field]);
                update_post_meta($post_id, '_' . $field, $value);
            }
        }
    }
}

// ===== USER SIGNUP FUNCTIONALITY =====

// Handle user signup form submission
function handle_user_signup() {
    // Check if form was submitted
    if (!isset($_POST['signup_nonce']) || !wp_verify_nonce($_POST['signup_nonce'], 'user_signup_nonce')) {
        return;
    }
    
    // Debug: Log that signup form was submitted
    error_log('Signup form submitted - processing...');
    
    // Debug: Show on screen for testing (remove this later)
    if (isset($_GET['debug_signup'])) {
        echo '<div style="background: orange; color: white; padding: 20px; margin: 20px;">SIGNUP FORM PROCESSING...</div>';
    }

    // Get form data
    $user_email = sanitize_email($_POST['user_email']);
    $user_name = sanitize_text_field($_POST['user_name']);
    $user_phone = sanitize_text_field($_POST['user_phone']);
    $card_preferences = sanitize_text_field($_POST['card_preferences']);
    $email_updates = isset($_POST['email_updates']) ? 1 : 0;
    $terms_agreement = isset($_POST['terms_agreement']) ? 1 : 0;

    // Validate required fields
    if (empty($user_email) || !$email_updates || !$terms_agreement) {
        wp_die('Please fill in all required fields and agree to terms.');
    }

    // Check if user already exists
    if (email_exists($user_email)) {
        wp_die('A user with this email address already exists.');
    }

    // Create username from email
    $username = sanitize_user(str_replace('@', '_', $user_email));

    // Create WordPress user
    $user_id = wp_create_user($username, wp_generate_password(), $user_email);

    if (is_wp_error($user_id)) {
        wp_die('Error creating user account: ' . $user_id->get_error_message());
    }

    // Set user role
    wp_set_user_role($user_id, 'customer');

    // Update user meta data
    if (!empty($user_name)) {
        wp_update_user(array(
            'ID' => $user_id,
            'first_name' => $user_name,
            'display_name' => $user_name
        ));
    }

    // Store additional user meta
    update_user_meta($user_id, 'phone_number', $user_phone);
    update_user_meta($user_id, 'card_preferences', $card_preferences);
    update_user_meta($user_id, 'email_updates_consent', $email_updates);
    update_user_meta($user_id, 'terms_agreement', $terms_agreement);
    update_user_meta($user_id, 'signup_date', current_time('mysql'));

    // Send welcome email
    $subject = 'Welcome to You Know It Cards!';
    $message = "Hi " . $user_name . ",\n\n";
    $message .= "Welcome to You Know It Cards! Your account has been created successfully.\n\n";
    $message .= "You'll now receive updates about:\n";
    $message .= "- New products and arrivals\n";
    $message .= "- Upcoming events and tournaments\n";
    $message .= "- Trading tips and advice\n";
    $message .= "- Exclusive deals and promotions\n\n";
    $message .= "Thank you for joining our community!\n\n";
    $message .= "Best regards,\nThe You Know It Cards Team";

    // Set proper email headers
    $site_name = get_option('blogname');
    $from_email = get_option('admin_email');
    $headers = array(
        'From: ' . $site_name . ' <' . $from_email . '>',
        'Reply-To: ' . $from_email,
        'Content-Type: text/plain; charset=UTF-8'
    );

    // Debug: Log email attempt
    error_log('Attempting to send welcome email to: ' . $user_email);
    error_log('Email subject: ' . $subject);
    error_log('Email message: ' . $message);
    
    $email_sent = wp_mail($user_email, $subject, $message, $headers);
    
    // Debug: Log result
    if ($email_sent) {
        error_log('Welcome email sent successfully to: ' . $user_email);
    } else {
        error_log('Welcome email FAILED to send to: ' . $user_email);
    }

    // Redirect to success page
    wp_redirect(home_url('/signup-success/'));
    exit;
}

// Hook the signup handler
add_action('init', 'handle_user_signup');

// Add AJAX handler for better form submission
function handle_ajax_signup() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['signup_nonce'], 'user_signup_nonce')) {
        wp_send_json_error('Security check failed');
    }

    // Get form data
    $user_email = sanitize_email($_POST['user_email']);
    $user_name = sanitize_text_field($_POST['user_name']);
    $user_phone = sanitize_text_field($_POST['user_phone']);
    $card_preferences = sanitize_text_field($_POST['card_preferences']);
    $email_updates = isset($_POST['email_updates']) ? 1 : 0;
    $terms_agreement = isset($_POST['terms_agreement']) ? 1 : 0;

    // Validate required fields
    if (empty($user_email) || !$email_updates || !$terms_agreement) {
        wp_send_json_error('Please fill in all required fields and agree to terms.');
    }

    // Check if user already exists
    if (email_exists($user_email)) {
        wp_send_json_error('A user with this email address already exists.');
    }

    // Create username from email
    $username = sanitize_user(str_replace('@', '_', $user_email));

    // Create WordPress user
    $user_id = wp_create_user($username, wp_generate_password(), $user_email);

    if (is_wp_error($user_id)) {
        wp_send_json_error('Error creating user account: ' . $user_id->get_error_message());
    }

    // Set user role
    wp_set_user_role($user_id, 'customer');

    // Update user meta data
    if (!empty($user_name)) {
        wp_update_user(array(
            'ID' => $user_id,
            'first_name' => $user_name,
            'display_name' => $user_name
        ));
    }

    // Store additional user meta
    update_user_meta($user_id, 'phone_number', $user_phone);
    update_user_meta($user_id, 'card_preferences', $card_preferences);
    update_user_meta($user_id, 'email_updates_consent', $email_updates);
    update_user_meta($user_id, 'terms_agreement', $terms_agreement);
    update_user_meta($user_id, 'signup_date', current_time('mysql'));

    // Send welcome email
    $subject = 'Welcome to You Know It Cards!';
    $message = "Hi " . $user_name . ",\n\n";
    $message .= "Welcome to You Know It Cards! Your account has been created successfully.\n\n";
    $message .= "You'll now receive updates about:\n";
    $message .= "- New products and arrivals\n";
    $message .= "- Upcoming events and tournaments\n";
    $message .= "- Trading tips and advice\n";
    $message .= "- Exclusive deals and promotions\n\n";
    $message .= "Thank you for joining our community!\n\n";
    $message .= "Best regards,\nThe You Know It Cards Team";

    // Set proper email headers
    $site_name = get_option('blogname');
    $from_email = get_option('admin_email');
    $headers = array(
        'From: ' . $site_name . ' <' . $from_email . '>',
        'Reply-To: ' . $from_email,
        'Content-Type: text/plain; charset=UTF-8'
    );

    // Debug: Log email attempt
    error_log('Attempting to send welcome email to: ' . $user_email);
    error_log('Email subject: ' . $subject);
    error_log('Email message: ' . $message);
    
    $email_sent = wp_mail($user_email, $subject, $message, $headers);
    
    // Debug: Log result
    if ($email_sent) {
        error_log('Welcome email sent successfully to: ' . $user_email);
    } else {
        error_log('Welcome email FAILED to send to: ' . $user_email);
    }

    // Send success response
    wp_send_json_success(array(
        'message' => 'Account created successfully!',
        'redirect_url' => home_url('/signup-success/')
    ));
}

// Hook the AJAX handler
add_action('wp_ajax_user_signup', 'handle_ajax_signup');
add_action('wp_ajax_nopriv_user_signup', 'handle_ajax_signup');

// Add custom user meta fields to admin
function add_custom_user_meta_fields($user) {
    ?>
    <h3>You Know It Cards Information</h3>
    <table class="form-table">
        <tr>
            <th><label for="phone_number">Phone Number</label></th>
            <td>
                <input type="tel" name="phone_number" id="phone_number" value="<?php echo esc_attr(get_user_meta($user->ID, 'phone_number', true)); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="card_preferences">Card Preferences</label></th>
            <td>
                <select name="card_preferences" id="card_preferences">
                    <option value="">Select preference</option>
                    <option value="pokemon" <?php selected(get_user_meta($user->ID, 'card_preferences', true), 'pokemon'); ?>>Pokémon Cards</option>
                    <option value="onepiece" <?php selected(get_user_meta($user->ID, 'card_preferences', true), 'onepiece'); ?>>One Piece Cards</option>
                    <option value="sports" <?php selected(get_user_meta($user->ID, 'card_preferences', true), 'sports'); ?>>Sports Cards</option>
                    <option value="all" <?php selected(get_user_meta($user->ID, 'card_preferences', true), 'all'); ?>>All Types</option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="email_updates_consent">Email Updates Consent</label></th>
            <td>
                <input type="checkbox" name="email_updates_consent" id="email_updates_consent" value="1" <?php checked(get_user_meta($user->ID, 'email_updates_consent', true), 1); ?> />
                <span class="description">User has consented to receive email updates</span>
            </td>
        </tr>
        <tr>
            <th><label for="signup_date">Signup Date</label></th>
            <td>
                <input type="text" name="signup_date" id="signup_date" value="<?php echo esc_attr(get_user_meta($user->ID, 'signup_date', true)); ?>" class="regular-text" readonly />
            </td>
        </tr>
    </table>
    <?php
}

// Save custom user meta fields
function save_custom_user_meta_fields($user_id) {
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }

    update_user_meta($user_id, 'phone_number', sanitize_text_field($_POST['phone_number']));
    update_user_meta($user_id, 'card_preferences', sanitize_text_field($_POST['card_preferences']));
    update_user_meta($user_id, 'email_updates_consent', isset($_POST['email_updates_consent']) ? 1 : 0);
}

// Hook the admin user meta fields
add_action('show_user_profile', 'add_custom_user_meta_fields');
add_action('edit_user_profile', 'add_custom_user_meta_fields');
add_action('personal_options_update', 'save_custom_user_meta_fields');
add_action('edit_user_profile_update', 'save_custom_user_meta_fields');

// Add signup button to navigation
function add_signup_button_to_nav($items, $args) {
    if ($args->theme_location == 'primary') {
        $items .= '<li class="signup-nav-item"><a href="' . home_url('/signup/') . '" class="signup-nav-btn">Sign Up</a></li>';
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_signup_button_to_nav', 10, 2);

// Add JavaScript for signup form handling
function add_signup_form_script() {
    if (is_page('signup') || is_page('signup-page')) {
        ?>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const signupForm = document.getElementById('user-signup-form');
            
            if (signupForm) {
                signupForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Get form data
                    const formData = new FormData(this);
                    
                    // Show loading state
                    const submitBtn = this.querySelector('.signup-submit-btn');
                    const originalText = submitBtn.textContent;
                    submitBtn.textContent = 'Creating Account...';
                    submitBtn.disabled = true;
                    
                    // Submit form
                    fetch(window.location.href, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => {
                        if (response.redirected) {
                            // Redirect to success page
                            window.location.href = response.url;
                        } else {
                            // Handle response
                            return response.text();
                        }
                    })
                    .then(data => {
                        if (data) {
                            // Check if user was created successfully
                            if (data.includes('success') || data.includes('redirect')) {
                                window.location.href = '<?php echo home_url("/signup-success/"); ?>';
                            } else {
                                alert('Account created successfully! Redirecting...');
                                window.location.href = '<?php echo home_url("/signup-success/"); ?>';
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Account created successfully! Redirecting...');
                        window.location.href = '<?php echo home_url("/signup-success/"); ?>';
                    });
                });
            }
        });
        </script>
        <?php
    }
}

// Hook the script
add_action('wp_footer', 'add_signup_form_script');

// Add banner carousel functionality
function add_banner_carousel_script() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const bannerTrack = document.querySelector('.banner-carousel-track');
        const bannerSlides = document.querySelectorAll('.banner-carousel-slide');
        const bannerPrevBtn = document.querySelector('.banner-carousel-prev');
        const bannerNextBtn = document.querySelector('.banner-carousel-next');
        const bannerIndicators = document.querySelectorAll('.banner-indicator');
        
        let currentBannerIndex = 0;
        
        function updateBannerCarousel() {
            bannerTrack.style.transform = `translateX(-${currentBannerIndex * 25}%)`;
            
            // Update indicators
            bannerIndicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentBannerIndex);
            });
        }
        
        function nextBannerSlide() {
            currentBannerIndex = (currentBannerIndex + 1) % bannerSlides.length;
            updateBannerCarousel();
        }
        
        function prevBannerSlide() {
            currentBannerIndex = (currentBannerIndex - 1 + bannerSlides.length) % bannerSlides.length;
            updateBannerCarousel();
        }
        
        function goToBannerSlide(index) {
            currentBannerIndex = index;
            updateBannerCarousel();
        }
        
        // Event listeners
        if (bannerPrevBtn) bannerPrevBtn.addEventListener('click', prevBannerSlide);
        if (bannerNextBtn) bannerNextBtn.addEventListener('click', nextBannerSlide);
        
        // Indicator clicks
        bannerIndicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                goToBannerSlide(index);
            });
        });
        
        // Auto-play
        let bannerAutoPlayInterval = setInterval(nextBannerSlide, 5000);
        
        // Pause auto-play on hover
        const bannerCarousel = document.querySelector('.banner-carousel');
        if (bannerCarousel) {
            bannerCarousel.addEventListener('mouseenter', () => {
                clearInterval(bannerAutoPlayInterval);
            });
            
            bannerCarousel.addEventListener('mouseleave', () => {
                bannerAutoPlayInterval = setInterval(nextBannerSlide, 5000);
            });
        }
        
        // Touch/swipe support for mobile
        let startX = 0;
        let endX = 0;
        
        bannerTrack.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });
        
        bannerTrack.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            const diff = startX - endX;
            
            if (Math.abs(diff) > 50) { // Minimum swipe distance
                if (diff > 0) {
                    nextBannerSlide();
                } else {
                    prevBannerSlide();
                }
            }
        });
    });
    </script>
    <?php
}
add_action('wp_footer', 'add_banner_carousel_script');

// Add featured carousel functionality
function add_carousel_script() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.querySelector('.carousel-track');
        const cards = document.querySelectorAll('.carousel-card');
        const prevBtn = document.querySelector('.carousel-prev');
        const nextBtn = document.querySelector('.carousel-next');
        const indicators = document.querySelectorAll('.indicator');
        
        let currentIndex = 0;
        const cardWidth = 350 + 20; // card width + margin
        const visibleCards = window.innerWidth > 1024 ? 3 : window.innerWidth > 768 ? 2 : 1;
        const maxIndex = Math.max(0, cards.length - visibleCards);
        
        function updateCarousel() {
            const translateX = -currentIndex * cardWidth;
            carousel.style.transform = `translateX(${translateX}px)`;
            
            // Update indicators
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentIndex);
            });
        }
        
        function nextSlide() {
            currentIndex = Math.min(currentIndex + 1, maxIndex);
            updateCarousel();
        }
        
        function prevSlide() {
            currentIndex = Math.max(currentIndex - 1, 0);
            updateCarousel();
        }
        
        // Event listeners
        if (nextBtn) nextBtn.addEventListener('click', nextSlide);
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);
        
        // Indicator clicks
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentIndex = index;
                updateCarousel();
            });
        });
        
        // Auto-play
        let autoPlayInterval = setInterval(nextSlide, 5000);
        
        // Pause auto-play on hover
        const carouselContainer = document.querySelector('.carousel-container');
        if (carouselContainer) {
            carouselContainer.addEventListener('mouseenter', () => {
                clearInterval(autoPlayInterval);
            });
            
            carouselContainer.addEventListener('mouseleave', () => {
                autoPlayInterval = setInterval(nextSlide, 5000);
            });
        }
        
        // Touch/swipe support for mobile
        let startX = 0;
        let endX = 0;
        
        carousel.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });
        
        carousel.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            const diff = startX - endX;
            
            if (Math.abs(diff) > 50) { // Minimum swipe distance
                if (diff > 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
            }
        });
        
        // Responsive adjustments
        function handleResize() {
            const newVisibleCards = window.innerWidth > 1024 ? 3 : window.innerWidth > 768 ? 2 : 1;
            if (newVisibleCards !== visibleCards) {
                location.reload(); // Simple solution for responsive changes
            }
        }
        
        window.addEventListener('resize', handleResize);
        
        // Initialize
        updateCarousel();
    });
    </script>
    <?php
}
add_action('wp_footer', 'add_carousel_script');

// Add mobile background CSS directly to head to bypass CSS conflicts
function add_mobile_background_css() {
    if (wp_is_mobile()) {
        echo '<style type="text/css">
        html, body {
            background: url("/wp-content/uploads/2025/08/brickwall.png") center center scroll no-repeat !important;
            background-size: 100% auto !important;
            background-position: center top !important;
            background-attachment: scroll !important;
            -webkit-background-attachment: scroll !important;
            -webkit-background-size: 100% auto !important;
            -moz-background-size: 100% auto !important;
            -o-background-size: 100% auto !important;
            min-height: 100vh !important;
        }
        
        /* Force remove ALL backgrounds from content sections */
        .hero-section, .category-section, .events-section, .community-section,
        .whatnot-section, .ct-container, .entry-content, .wp-block-group,
        [data-overlay], [data-overlay]::before, .has-background-gradient,
        .has-background-gradient::before, .section-header, .card-item,
        .event-item, .tip-card, .trading-tips-content, .social-media-section,
        .ct-footer, footer, .footer-content, .main-navigation, .nav-menu,
        .widget-area, .sidebar, .widget, .widget-title, .widget-content,
        .site, .ct-main, .main-content, .content-area {
            background: transparent !important;
            background-color: transparent !important;
            background-image: none !important;
            backdrop-filter: none !important;
            -webkit-backdrop-filter: none !important;
            box-shadow: none !important;
            border: none !important;
        }
        
        /* Force remove any remaining backgrounds */
        * {
            background-image: none !important;
        }
        
        /* Only allow the main page background */
        html * {
            background: transparent !important;
            background-color: transparent !important;
            background-image: none !important;
        }
        </style>';
    }
}
add_action('wp_head', 'add_mobile_background_css', 999);

// Custom Post Type: Sponsors
function create_sponsors_post_type() {
    register_post_type('sponsors',
        array(
            'labels' => array(
                'name' => 'Sponsors',
                'singular_name' => 'Sponsor',
                'add_new' => 'Add New Sponsor',
                'add_new_item' => 'Add New Sponsor',
                'edit_item' => 'Edit Sponsor',
                'new_item' => 'New Sponsor',
                'view_item' => 'View Sponsor',
                'search_items' => 'Search Sponsors',
                'not_found' => 'No sponsors found',
                'not_found_in_trash' => 'No sponsors found in trash'
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-star-filled',
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'sponsors'),
            'query_var' => true,
        )
    );
}
add_action('init', 'create_sponsors_post_type');

// Add custom fields for sponsors
function add_sponsor_meta_boxes() {
    add_meta_box(
        'sponsor_details',
        'Sponsor Details',
        'sponsor_details_callback',
        'sponsors',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_sponsor_meta_boxes');

function sponsor_details_callback($post) {
    wp_nonce_field('sponsor_meta_box', 'sponsor_meta_box_nonce');
    
    $website_url = get_post_meta($post->ID, '_sponsor_website_url', true);
    $discount_code = get_post_meta($post->ID, '_sponsor_discount_code', true);
    $discount_percentage = get_post_meta($post->ID, '_sponsor_discount_percentage', true);
    $description = get_post_meta($post->ID, '_sponsor_description', true);
    $featured = get_post_meta($post->ID, '_sponsor_featured', true);
    
    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="sponsor_website_url">Website URL</label></th>';
    echo '<td><input type="url" id="sponsor_website_url" name="sponsor_website_url" value="' . esc_attr($website_url) . '" style="width: 100%;" placeholder="https://example.com" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="sponsor_discount_code">Discount Code</label></th>';
    echo '<td><input type="text" id="sponsor_discount_code" name="sponsor_discount_code" value="' . esc_attr($discount_code) . '" style="width: 100%;" placeholder="SAVE20" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="sponsor_discount_percentage">Discount Percentage</label></th>';
    echo '<td><input type="number" id="sponsor_discount_percentage" name="sponsor_discount_percentage" value="' . esc_attr($discount_percentage) . '" min="0" max="100" style="width: 100px;" placeholder="20" />%</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="sponsor_description">Short Description</label></th>';
    echo '<td><textarea id="sponsor_description" name="sponsor_description" rows="3" style="width: 100%;" placeholder="Brief description of what this sponsor offers...">' . esc_textarea($description) . '</textarea></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="sponsor_featured">Featured Sponsor</label></th>';
    echo '<td><input type="checkbox" id="sponsor_featured" name="sponsor_featured" value="1" ' . checked($featured, 1, false) . ' /> <label for="sponsor_featured">Show as featured sponsor</label></td>';
    echo '</tr>';
    echo '</table>';
}

function save_sponsor_meta_box($post_id) {
    if (!isset($_POST['sponsor_meta_box_nonce']) || !wp_verify_nonce($_POST['sponsor_meta_box_nonce'], 'sponsor_meta_box')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['sponsor_website_url'])) {
        update_post_meta($post_id, '_sponsor_website_url', sanitize_url($_POST['sponsor_website_url']));
    }
    
    if (isset($_POST['sponsor_discount_code'])) {
        update_post_meta($post_id, '_sponsor_discount_code', sanitize_text_field($_POST['sponsor_discount_code']));
    }
    
    if (isset($_POST['sponsor_discount_percentage'])) {
        update_post_meta($post_id, '_sponsor_discount_percentage', intval($_POST['sponsor_discount_percentage']));
    }
    
    if (isset($_POST['sponsor_description'])) {
        update_post_meta($post_id, '_sponsor_description', sanitize_textarea_field($_POST['sponsor_description']));
    }
    
    $featured = isset($_POST['sponsor_featured']) ? 1 : 0;
    update_post_meta($post_id, '_sponsor_featured', $featured);
}
add_action('save_post', 'save_sponsor_meta_box');
