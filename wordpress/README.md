# WordPress Utility Snippets

Standalone PHP snippets for WordPress. Load via a child theme's `functions.php`, a lightweight utility plugin, or [Code Snippets](https://wordpress.org/plugins/code-snippets/).

## Snippets

### disable-comments.php
Completely removes the WordPress comment system: admin screens, menu items, support in post types, and the frontend comment form.

### disable-divi-projects.php
Unregisters Divi's built-in "Projects" post type and its taxonomies.

### mailto-redirect.php
Creates clean URL slugs (e.g., `/mailto-contact`) that 302-redirect to `mailto:` links. Edit the `$redirects` array with your actual email addresses before use.

### whatsapp-autolink.php
Builds dynamic `wa.me` links with context-aware messages. Supports:
- `[dst_whatsapp_url]` shortcode
- `#wa:auto` and `#wa:<message>` tokens in Divi module URL fields
- Per-page default messages based on the current page title

**Setup:** Replace the placeholder phone number (`555-555-0100`) with your actual WhatsApp number.
