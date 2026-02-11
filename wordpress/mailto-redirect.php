<?php
/**
 * Redirects clean email endpoints to mailto links.
 *
 * Purpose: Exposes slugs that 302-redirect to mailto:, removing mailto from the frontend.
 * Usage context: Load in a child theme, a small utility plugin, or via Code Snippets.
 * Author: André Marinho — andremarinho.me
 *
 * @package DST_Mailto_Redirect
 */

add_action('template_redirect', function() {
  // Replace the placeholder mailto targets with the actual addresses for each client before publishing.
  $redirects = [
    'mailto-support' => 'mailto:support@example.com',
    'mailto-privacy' => 'mailto:privacy@example.com',
    'mailto-contact' => 'mailto:contact@example.com',
    'mailto-hr'      => 'mailto:hr@example.com',
  ];

  $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

  if (isset($redirects[$path])) {
    wp_redirect($redirects[$path], 302);
    exit;
  }
});
