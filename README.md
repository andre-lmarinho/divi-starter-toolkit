# Divi Starter Toolkit

A collection of drop-in UI components, Divi theme fixes, and WordPress utility snippets. Built for WordPress sites running the Divi theme — no build step required.

## Components

| Component | Description | Tech |
|---|---|---|
| [Logo Carousel](components/logo-carousel/) | Infinite scrolling logo carousel with hover pause | Vanilla JS + CSS |
| [Feature Carousel](components/feature-carousel/) | Pointer-driven feature preview with synced imagery | Vanilla JS + CSS |
| [Card Hover Effect](components/card-hover-effect/) | Pointer-tracking card translation animation | Vanilla JS + CSS |
| [Content Toggle](components/content-toggle/) | Tab-like interface for showing/hiding content blocks | jQuery + CSS |
| [Chip Navigation](components/chip-navigation/) | Horizontal chip bar with scroll-sync and keyboard nav | Vanilla JS + CSS |

## Divi Fixes

| Fix | Description |
|---|---|
| [Mobile Menu](divi-fixes/mobile-menu/) | Enhanced mobile menu with submenu toggles and CTA styling |
| [Theme Utilities](divi-fixes/theme-utilities/) | Global CSS utilities (shadows, dividers, layout helpers) |
| [Contact Form](divi-fixes/contact-form/) | Floating-label input styling for Divi contact forms |

## WordPress Utilities

| Snippet | Description |
|---|---|
| [disable-comments.php](wordpress/disable-comments.php) | Completely disables the WordPress comment system |
| [disable-divi-projects.php](wordpress/disable-divi-projects.php) | Removes Divi's default "Projects" post type |
| [mailto-redirect.php](wordpress/mailto-redirect.php) | Clean URL slugs that 302-redirect to mailto: links |
| [whatsapp-autolink.php](wordpress/whatsapp-autolink.php) | Dynamic WhatsApp links with Divi token integration |

## Quick Start

1. Pick a component folder.
2. Copy the CSS into **Divi Theme Options > Custom CSS** (or your child theme).
3. Copy the JS into a **Code Module** or enqueue it in your child theme.
4. Add the required HTML classes to your Divi modules.

Each component folder contains its own documentation.

## Requirements

- WordPress 6.0+
- Divi Theme 4.x+
- No build tools needed — all code is production-ready

## Author

**André Marinho** — [andremarinho.me](https://andremarinho.me)

## License

[MIT](LICENSE)
