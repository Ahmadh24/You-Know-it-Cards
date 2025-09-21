<?php
/**
 * Template Name: Test Email Page
 * 
 * This is a custom page template for testing email functionality
 */

// Only allow admin access
if (!current_user_can('manage_options')) {
    wp_die('Access denied. You must be logged in as an administrator to view this page.');
}

get_header(); ?>

<div class="test-email-page">
    <div class="container">
        <div class="test-email-content">
            <h1>Email Test Page</h1>
            
            <div class="info-section">
                <h3>Server Information:</h3>
                <p><strong>Website URL:</strong> <?php echo home_url(); ?></p>
                <p><strong>Server Name:</strong> <?php echo $_SERVER['SERVER_NAME']; ?></p>
                <p><strong>PHP Version:</strong> <?php echo phpversion(); ?></p>
                <p><strong>WordPress Version:</strong> <?php echo get_bloginfo('version'); ?></p>
            </div>
            
            <div class="test-section">
                <h3>Test Email Function:</h3>
                <p>Click the button below to send a test email to ahmahamoudeh1999@gmail.com</p>
                <button id="test-email-btn" class="test-btn">Send Test Email</button>
                <div id="test-result" class="test-result"></div>
            </div>
            
            <div class="manual-section">
                <h3>Manual Email Test:</h3>
                <p>You can also test the contact form on the homepage:</p>
                <a href="<?php echo home_url(); ?>" class="homepage-link">Go to Homepage</a>
            </div>
            
            <div class="troubleshooting-section">
                <h3>Troubleshooting Tips:</h3>
                <ul>
                    <li>Check your spam/junk folder</li>
                    <li>Make sure your hosting provider allows outgoing emails</li>
                    <li>Some local development environments don't send emails</li>
                    <li>Consider using an SMTP plugin for better email delivery</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
.test-email-page {
    background: var(--dark-bg);
    min-height: 100vh;
    padding: 50px 0;
}

.test-email-content {
    max-width: 800px;
    margin: 0 auto;
    padding: 30px;
    background: var(--card-bg);
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    border: 1px solid #333333;
}

.test-email-content h1 {
    color: var(--white);
    text-align: center;
    margin-bottom: 30px;
    font-size: 2.5rem;
}

.info-section,
.test-section,
.manual-section,
.troubleshooting-section {
    margin: 25px 0;
    padding: 20px;
    background: #333333;
    border-radius: 8px;
    border: 1px solid #444444;
}

.info-section h3,
.test-section h3,
.manual-section h3,
.troubleshooting-section h3 {
    color: var(--primary-color);
    margin-bottom: 15px;
    font-size: 1.3rem;
}

.info-section p,
.test-section p,
.manual-section p {
    color: #cccccc;
    margin: 8px 0;
    line-height: 1.5;
}

.test-btn {
    background: var(--primary-color);
    color: var(--white);
    padding: 12px 25px;
    border: none;
    border-radius: var(--border-radius);
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    transition: var(--transition);
    margin: 10px 0;
}

.test-btn:hover:not(:disabled) {
    background: #e55a2b;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

.test-btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

.test-result {
    margin-top: 15px;
    padding: 12px;
    border-radius: 6px;
    display: none;
    font-weight: 600;
}

.test-result.success {
    background: #27ae60;
    color: white;
    display: block;
}

.test-result.error {
    background: #e74c3c;
    color: white;
    display: block;
}

.homepage-link {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    transition: var(--transition);
}

.homepage-link:hover {
    color: #e55a2b;
    text-decoration: underline;
}

.troubleshooting-section ul {
    color: #cccccc;
    line-height: 1.6;
}

.troubleshooting-section li {
    margin: 8px 0;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const testBtn = document.getElementById('test-email-btn');
    const resultDiv = document.getElementById('test-result');
    
    if (testBtn) {
        testBtn.addEventListener('click', function() {
            this.disabled = true;
            this.textContent = 'Sending...';
            
            // Clear previous results
            resultDiv.className = 'test-result';
            resultDiv.style.display = 'none';
            
            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=test_email'
            })
            .then(response => response.text())
            .then(data => {
                resultDiv.style.display = 'block';
                
                if (data.includes('successfully')) {
                    resultDiv.className = 'test-result success';
                    resultDiv.textContent = '✅ ' + data;
                } else {
                    resultDiv.className = 'test-result error';
                    resultDiv.textContent = '❌ ' + data;
                }
            })
            .catch(error => {
                resultDiv.style.display = 'block';
                resultDiv.className = 'test-result error';
                resultDiv.textContent = '❌ Error: ' + error.message;
            })
            .finally(() => {
                testBtn.disabled = false;
                testBtn.textContent = 'Send Test Email';
            });
        });
    }
});
</script>

<?php get_footer(); ?> 