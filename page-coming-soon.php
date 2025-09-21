<?php
/**
 * Coming Soon Page Template
 */

get_header(); ?>

<div class="container">
    <div class="coming-soon-content">
        <div class="coming-soon-icon">
            <svg width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <polyline points="12,6 12,12 16,14"/>
            </svg>
        </div>
        
        <h1 class="coming-soon-title">Coming Soon</h1>
        <p class="coming-soon-subtitle">We're working hard to bring you amazing cards!</p>
        
        <div class="coming-soon-description">
            <p>Our team is currently preparing an incredible collection of trading cards for you. Stay tuned for updates and be the first to know when we launch!</p>
        </div>
        
        <div class="coming-soon-actions">
            <a href="<?php echo home_url(); ?>" class="btn btn-primary">Back to Home</a>
            <a href="#contact" class="btn btn-secondary">Get Notified</a>
        </div>
        
        <div class="coming-soon-features">
            <h3>What to Expect:</h3>
            <ul>
                <li>✨ Premium card collections</li>
                <li>🎯 Rare and exclusive finds</li>
                <li>🚀 Fast and secure shipping</li>
                <li>💎 Authenticity guaranteed</li>
            </ul>
        </div>
    </div>
</div>

<style>
.coming-soon-content {
    text-align: center;
    padding: 80px 20px;
    max-width: 600px;
    margin: 0 auto;
}

.coming-soon-icon {
    margin-bottom: 30px;
    color: var(--primary-color);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

.coming-soon-title {
    font-size: 4rem;
    font-weight: 700;
    color: var(--white);
    margin-bottom: 20px;
    text-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
}

.coming-soon-subtitle {
    font-size: 1.5rem;
    color: #cccccc;
    margin-bottom: 30px;
}

.coming-soon-description {
    margin-bottom: 40px;
}

.coming-soon-description p {
    font-size: 1.1rem;
    color: #aaaaaa;
    line-height: 1.6;
}

.coming-soon-actions {
    display: flex;
    gap: 20px;
    justify-content: center;
    margin-bottom: 50px;
    flex-wrap: wrap;
}

.coming-soon-features {
    background: rgba(255, 255, 255, 0.05);
    padding: 30px;
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
}

.coming-soon-features h3 {
    font-size: 1.5rem;
    color: var(--white);
    margin-bottom: 20px;
}

.coming-soon-features ul {
    list-style: none;
    padding: 0;
    margin: 0;
    text-align: left;
}

.coming-soon-features li {
    font-size: 1.1rem;
    color: #cccccc;
    margin-bottom: 10px;
    padding-left: 20px;
    position: relative;
}

.coming-soon-features li:before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 8px;
    height: 8px;
    background: var(--primary-color);
    border-radius: 50%;
}

@media (max-width: 768px) {
    .coming-soon-title {
        font-size: 3rem;
    }
    
    .coming-soon-subtitle {
        font-size: 1.2rem;
    }
    
    .coming-soon-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .coming-soon-features {
        padding: 20px;
    }
}
</style>

<?php get_footer(); ?>
