# Divi Starter Toolkit

A collection of Divi theme fixes and WordPress utility snippets. Built for WordPress sites running the Divi theme — no build step required.

> **Looking for standalone UI components?** They have been extracted into their own repository: [ui-components-library](https://github.com/andre-lmarinho/ui-components-library)

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
