<?php
/**
 * Template Name: Signup Page
 * 
 * Custom signup page for YouKnowItCards
 */

get_header(); ?>

<style>
/* MOBILE BRICK BACKGROUND - INLINE CSS */
@media screen and (max-width: 768px) {
    html, body, .site, .ct-main, .signup-page {
        background: url('https://youknowitcards.net/wp-content/uploads/2025/09/brickwall.png') center center scroll repeat !important;
        background-size: auto !important;
        min-height: 100vh !important;
    }
    
    /* Force all containers to be transparent */
    .container, .signup-form-container, .signup-form {
        background: transparent !important;
    }
}

/* LANDSCAPE MOBILE BRICK BACKGROUND */
@media screen and (max-height: 500px) and (orientation: landscape) {
    html, body, .site, .ct-main, .signup-page {
        background: url('https://youknowitcards.net/wp-content/uploads/2025/09/brickwall.png') center center scroll repeat !important;
        background-size: auto !important;
        min-height: 100vh !important;
    }
    
    /* Force all containers to be transparent */
    .container, .signup-form-container, .signup-form {
        background: transparent !important;
    }
}
</style>

<div class="signup-page">
    <div class="container">
        <div class="signup-header">
            <h1>Join You Know It Cards</h1>
            <p>Get exclusive access to new products, events, and trading tips!</p>
        </div>

        <div class="signup-form-container">
            <form id="user-signup-form" class="signup-form" method="post" action="">
                <?php wp_nonce_field('user_signup_nonce', 'signup_nonce'); ?>
                
                <div class="form-group">
                    <label for="user_email">Email Address *</label>
                    <input type="email" id="user_email" name="user_email" required>
                </div>

                <div class="form-group">
                    <label for="user_name">Full Name</label>
                    <input type="text" id="user_name" name="user_name">
                </div>

                <div class="form-group">
                    <label for="user_phone">Phone Number</label>
                    <input type="tel" id="user_phone" name="user_phone">
                </div>

                <div class="form-group">
                    <label for="card_preferences">Card Preferences</label>
                    <select id="card_preferences" name="card_preferences">
                        <option value="">Select your preference</option>
                        <option value="pokemon">Pokémon Cards</option>
                        <option value="onepiece">One Piece Cards</option>
                        <option value="sports">Sports Cards</option>
                        <option value="all">All Types</option>
                    </select>
                </div>

                <div class="form-group checkbox-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="email_updates" required>
                        <span class="checkmark"></span>
                        I agree to receive email updates about new products, events, and trading tips *
                    </label>
                </div>

                <div class="form-group checkbox-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="terms_agreement" required>
                        <span class="checkmark"></span>
                        I agree to the <a href="/terms" target="_blank">Terms & Conditions</a> and <a href="/privacy" target="_blank">Privacy Policy</a> *
                    </label>
                </div>

                <div class="form-group">
                    <button type="submit" class="signup-submit-btn">Create Account</button>
                </div>

                <div class="signup-footer">
                    <p>Already have an account? <a href="/login">Sign In</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<?php get_footer(); ?>
