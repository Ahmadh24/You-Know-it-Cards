<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    
    <style>
    /* COMPACT NAVIGATION STYLES */
    .nav-menu {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        list-style: none;
        margin: 0;
        padding: 0;
    }
    
    .nav-menu li a {
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
        padding: 8px 12px;
        border-radius: 8px;
        transition: all 0.3s ease;
        white-space: nowrap;
    }
    
    .nav-menu li a:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #ffd700;
    }
    
    /* MOBILE NAVIGATION */
    @media screen and (max-width: 768px) {
        .ct-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .site-branding {
            order: 1;
            flex: 1;
        }
        
        .main-navigation {
            order: 3;
            width: 100%;
            position: relative;
        }
        
        .header-signup {
            order: 2;
            flex: 0 0 auto;
        }
        
        .nav-menu {
            flex-direction: column;
            gap: 8px;
            width: 100%;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 0 0 15px 15px;
            z-index: 1000;
            display: none;
        }
        
        .nav-menu.active {
            display: flex;
        }
        
        .nav-menu li a {
            font-size: 0.85rem;
            padding: 10px 15px;
            text-align: center;
            display: block;
        }
    }
    
    /* TABLET NAVIGATION */
    @media screen and (max-width: 1024px) and (min-width: 769px) {
        .nav-menu {
            gap: 10px;
        }
        
        .nav-menu li a {
            font-size: 0.85rem;
            padding: 6px 10px;
        }
    }
    
    /* HAMBURGER MENU STYLES */
    .menu-toggle {
        background: none;
        border: none;
        color: #fff;
        font-size: 1.5rem;
        cursor: pointer;
        padding: 10px;
        display: none;
        width: 40px;
        height: 40px;
        position: relative;
        z-index: 1001;
        pointer-events: auto;
        touch-action: manipulation;
    }
    
    .menu-toggle-icon {
        display: block;
        width: 20px;
        height: 2px;
        background: #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        transition: all 0.3s ease;
    }
    
    .menu-toggle-icon::before,
    .menu-toggle-icon::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 2px;
        background: #fff;
        transition: all 0.3s ease;
    }
    
    .menu-toggle-icon::before {
        top: -6px;
    }
    
    .menu-toggle-icon::after {
        top: 6px;
    }
    
    .menu-toggle.active .menu-toggle-icon {
        background: transparent;
    }
    
    .menu-toggle.active .menu-toggle-icon::before {
        transform: rotate(45deg);
        top: 0;
    }
    
    .menu-toggle.active .menu-toggle-icon::after {
        transform: rotate(-45deg);
        top: 0;
    }
    
    @media screen and (max-width: 768px) {
        .menu-toggle {
            display: block;
        }
    }
    </style>
    
    <script>
    // Simple mobile menu toggle
    function toggleMobileMenu() {
        const navMenu = document.querySelector('.nav-menu');
        const menuToggle = document.querySelector('.menu-toggle');
        
        if (navMenu && menuToggle) {
            navMenu.classList.toggle('active');
            menuToggle.classList.toggle('active');
            
            const isActive = navMenu.classList.contains('active');
            menuToggle.setAttribute('aria-expanded', isActive);
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Mobile menu script loaded');
        
        const menuToggle = document.querySelector('.menu-toggle');
        const navMenu = document.querySelector('.nav-menu');
        
        console.log('Menu toggle found:', menuToggle);
        console.log('Nav menu found:', navMenu);
        
        if (menuToggle && navMenu) {
            // Multiple event listeners for better compatibility
            menuToggle.addEventListener('click', toggleMobileMenu);
            menuToggle.addEventListener('touchstart', toggleMobileMenu);
            
            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!menuToggle.contains(event.target) && !navMenu.contains(event.target)) {
                    navMenu.classList.remove('active');
                    menuToggle.classList.remove('active');
                    menuToggle.setAttribute('aria-expanded', 'false');
                }
            });
            
            // Close menu when clicking on a link
            navMenu.addEventListener('click', function(event) {
                if (event.target.tagName === 'A') {
                    navMenu.classList.remove('active');
                    menuToggle.classList.remove('active');
                    menuToggle.setAttribute('aria-expanded', 'false');
                }
            });
        } else {
            console.log('Menu elements not found');
        }
    });
    </script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="ct-header">
            <div class="ct-container">
                <div class="site-branding">
                    <a href="<?php echo home_url('/'); ?>" class="site-logo">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ykic-poke-ball-logo.png" alt="You Know It Cards" class="header-logo">
                    </a>
                </div>
                
                <nav id="site-navigation" class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="menu-toggle-icon"></span>
                    </button>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'nav-menu',
                        'container'      => false,
                        'fallback_cb'    => 'ykic_default_menu'
                    ));
                    ?>
                </nav>
                
                <div class="header-signup">
                    <a href="<?php echo home_url('/signup/'); ?>" class="signup-header-btn">Sign Up</a>
                </div>
            </div>
        </div>
    </header>

    <div id="content" class="site-content"> 