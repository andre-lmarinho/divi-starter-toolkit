# Divi Starter Toolkit

Use these CSS and JavaScript fixes with Divi, or use the PHP snippets with WordPress. You do not need a build step.

> **Looking for standalone UI components?** They have been extracted into their own repository: [ui-components-library](https://github.com/andre-lmarinho/ui-components-library)

## Start with a Divi fix

| Fix | Description |
|---|---|
| [Mobile Menu](divi-fixes/mobile-menu/) | Mobile menu styling and submenu toggles |
| [Theme Utilities](divi-fixes/theme-utilities/style.css) | Reusable layout, shadow, and CTA styles |
| [Contact Form](divi-fixes/contact-form/style.css) | Floating labels and input styling |

Add CSS through **Divi Theme Options > Custom CSS** or your child theme stylesheet.
Load JavaScript through your child theme after jQuery.
Remove the CSS or script from the same location to undo the change.

## WordPress snippets

| Snippet | Use it to |
|---|---|
| [WhatsApp autolink](wordpress/whatsapp-autolink.php) | Add page-aware WhatsApp links to Divi modules |
| [Mailto redirect](wordpress/mailto-redirect.php) | Redirect short paths to email links |
| [Disable comments](wordpress/disable-comments.php) | Hide and disable comment features |
| [Disable Divi Projects](wordpress/disable-divi-projects.php) | Unregister Divi's Projects post type and taxonomies |

See the [WordPress snippet guide](wordpress/README.md) for setup, required edits, and removal steps.

## Compatibility

This repository does not list tested WordPress, Divi, or PHP versions.
Test each change on a staging site before using it on a live site.

## Author and license

**André Marinho** — [andremarinho.me](https://andremarinho.me) · [MIT](LICENSE)
