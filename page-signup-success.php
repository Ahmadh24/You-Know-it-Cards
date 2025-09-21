<?php
/**
 * Template Name: Signup Success
 * 
 * Success page after user signup
 */

get_header(); ?>

<div class="signup-success-page">
    <div class="container">
        <div class="success-content">
            <div class="success-icon">✅</div>
            <h1>Welcome to You Know It Cards!</h1>
            <p class="success-message">Your account has been created successfully. You're now part of our exclusive community!</p>
            
            <div class="what-happens-next">
                <h2>What Happens Next?</h2>
                <ul>
                    <li>📧 <strong>Welcome Email:</strong> Check your inbox for account details</li>
                    <li>🎯 <strong>Personalized Updates:</strong> Get news about your favorite card types</li>
                    <li>🏆 <strong>Event Access:</strong> Be the first to know about tournaments and trading sessions</li>
                    <li>💡 <strong>Trading Tips:</strong> Receive expert advice and collection strategies</li>
                    <li>🛍️ <strong>Exclusive Deals:</strong> Access to special promotions and new arrivals</li>
                </ul>
            </div>
            
            <div class="next-steps">
                <h2>Get Started</h2>
                <div class="action-buttons">
                    <a href="<?php echo home_url('/'); ?>" class="btn btn-primary">Explore Our Cards</a>
                    <a href="<?php echo home_url('/events/'); ?>" class="btn btn-secondary">View Events</a>
                    <a href="<?php echo home_url('/contact/'); ?>" class="btn btn-whatnot">Contact Us</a>
                </div>
            </div>
            
            <div class="help-section">
                <p>Need help? <a href="<?php echo home_url('/contact/'); ?>">Contact our team</a> or check your email for login instructions.</p>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
