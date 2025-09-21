# YouKnowItCards - WordPress Child Theme

A custom WordPress child theme for the YouKnowItCards trading card shop, built on the Blocksy theme framework.

## Features

### 🎴 Custom Post Types
- **Pokémon Cards** - For Pokémon trading cards
- **One Piece Cards** - For One Piece trading cards  
- **Sports Cards** - For sports trading cards
- **Accessories** - For card accessories and supplies

### 🎨 Modern Design
- Responsive grid layouts
- Mobile-friendly design
- Smooth animations and transitions
- Custom color scheme optimized for trading cards
- Professional typography

### 🔧 Functionality
- WooCommerce elements hidden (ready for future e-commerce)
- Custom meta fields for card details (rarity, condition, year)
- Filterable card archives
- Contact form integration
- SEO-optimized structure

## Setup Instructions

### 1. Theme Installation
1. Ensure the parent Blocksy theme is installed and activated
2. This child theme should already be installed in your LocalWP environment
3. Activate the "Blocksy Child" theme in WordPress Admin → Appearance → Themes

### 2. Create Your Homepage
1. Go to **Pages → Add New**
2. Create a new page titled "Home"
3. In the Page Attributes section, select "Homepage" template
4. Publish the page
5. Go to **Settings → Reading**
6. Set "Your homepage displays" to "A static page"
7. Select your "Home" page as the homepage

### 3. Add Card Content
1. **Pokémon Cards**: Go to **Pokémon Cards → Add New**
2. **One Piece Cards**: Go to **One Piece Cards → Add New**
3. **Sports Cards**: Go to **Sports Cards → Add New**
4. **Accessories**: Go to **Accessories → Add New**

For each card, you can add:
- **Title**: Card name
- **Featured Image**: Card image (recommended size: 600x800px)
- **Content**: Card description
- **Card Details** (meta box):
  - **Rarity**: Common, Uncommon, Rare, Ultra Rare, Secret Rare
  - **Condition**: Mint, Near Mint, Excellent, Good, Light Played, Played
  - **Year**: Card release year

### 4. Customize Contact Information
Edit the `front-page.php` file to update:
- Store address
- Phone number
- Email address
- Business hours

### 5. Set Up Contact Form (Optional)
If using WPForms:
1. Create a contact form in WPForms
2. Note the form ID
3. Update the shortcode in `front-page.php` (replace `[wpforms id="1"]` with your actual form ID)

## File Structure

```
blocksy-child/
├── style.css              # Main stylesheet
├── functions.php          # Theme functions and customizations
├── front-page.php         # Homepage template
├── archive-pokemon_cards.php  # Pokémon cards archive
├── single-pokemon_cards.php   # Individual Pokémon card page
├── js/
│   └── custom.js          # Custom JavaScript
└── README.md              # This file
```

## Customization Options

### Colors
The theme uses CSS custom properties for easy color customization. Edit these in `style.css`:

```css
:root {
    --primary-color: #ff6b35;      /* Main brand color */
    --secondary-color: #2c3e50;    /* Dark text color */
    --accent-color: #f39c12;       /* Accent color */
    --text-color: #2c3e50;         /* Body text color */
    --light-bg: #f8f9fa;           /* Light background */
    --white: #ffffff;              /* White */
}
```

### Shortcodes
Use these shortcodes to display card grids anywhere:

- `[pokemon_cards_grid posts_per_page="6" columns="3"]`
- `[onepiece_cards_grid posts_per_page="6" columns="3"]`
- `[sports_cards_grid posts_per_page="6" columns="3"]`
- `[accessories_grid posts_per_page="6" columns="3"]`

### Adding New Card Categories
To add a new card category:

1. Add the post type registration in `functions.php`
2. Create archive and single templates
3. Add shortcode function
4. Update the homepage template

## Mobile Responsiveness

The theme is fully responsive with breakpoints at:
- **Desktop**: 1200px and above
- **Tablet**: 768px - 1199px
- **Mobile**: Below 768px

## Performance Features

- Optimized image sizes for cards
- Lazy loading for images
- Minified CSS and JavaScript
- Efficient database queries
- Caching-friendly structure

## SEO Features

- Semantic HTML structure
- Optimized heading hierarchy
- Meta descriptions for cards
- Clean URLs for card archives
- Schema markup ready

## Future E-commerce Integration

When ready to sell online:

1. Remove the WooCommerce hiding CSS from `functions.php`
2. Convert card post types to WooCommerce products
3. Add pricing fields to card meta
4. Set up payment processing
5. Configure shipping options

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Internet Explorer 11+

## Support

For theme support or customization requests, contact your developer.

## Changelog

### Version 1.0.0
- Initial release
- Custom post types for all card categories
- Responsive homepage design
- Archive and single page templates
- Contact form integration
- Mobile-optimized layout

---

**YouKnowItCards** - Your premier destination for trading cards! 🃏 