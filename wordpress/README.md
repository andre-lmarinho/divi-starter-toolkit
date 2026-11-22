# WordPress Utility Snippets

These PHP snippets change WordPress behavior. Test them on a staging site first.

## Install or remove a snippet

Choose one install location:

- **Child theme:** Paste the code after `<?php` into `functions.php`.
- **Code Snippets:** Add the snippet body without the opening `<?php` tag, then activate it.
- **Utility plugin:** Paste the code after `<?php` into the plugin's PHP file.

To remove a snippet, delete the pasted code from `functions.php` or the plugin. In Code Snippets, deactivate and then delete it.
The snippet files do not erase saved content.

## Snippets

### [whatsapp-autolink.php](whatsapp-autolink.php)

Adds the `[dst_whatsapp_url]` shortcode and supports `#wa:auto` and `#wa:<message>` in Divi module URL fields.
Replace `555-555-0100` with the WhatsApp number before activation.
The code adds Brazil's `55` country prefix when the number does not start with `55`.

### [mailto-redirect.php](mailto-redirect.php)

Redirects paths such as `/mailto-contact` to `mailto:` links.
Edit the `$redirects` array with the correct paths and email addresses before activation.

### [disable-comments.php](disable-comments.php)

Disables comment and trackback features in the admin and on the front end.
It hides existing comments but does not delete them.

### [disable-divi-projects.php](disable-divi-projects.php)

Unregisters Divi's Projects post type and its taxonomies.
It does not delete project content.
