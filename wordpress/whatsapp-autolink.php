<?php
/**
 * Generate dynamic WhatsApp links with Divi integration.
 *
 * Purpose: Builds wa.me links with context-aware messages (per page or custom) and
 * allows Divi modules (like Buttons) to use simple tokens (#wa:auto or #wa:<msg>)
 * that are replaced dynamically on the frontend — keeping the admin clean and editable.
 * Usage context: Load via a child theme, a lightweight utility plugin, or Code Snippets.
 * Author: André Marinho — andremarinho.me
 *
 * @package DST_Whatsapp_Autolink
 */

if (!function_exists('dst_str_starts_with')) {
  function dst_str_starts_with(string $haystack, string $needle): bool {
    return $needle !== '' && strncmp($haystack, $needle, strlen($needle)) === 0;
  }
}

function dst_build_whatsapp_link(string $raw_number, ?string $message = null): string {
  $digits = preg_replace('/\D+/', '', $raw_number);
  if (!dst_str_starts_with($digits, '55')) {
    $digits = '55' . $digits;
  }

  $base = 'https://wa.me/' . $digits;

  if (empty($message)) {
    return $base;
  }

  return $base . '?text=' . rawurlencode($message);
}

function dst_get_default_whatsapp_message_for_page(): string {
  if (!function_exists('get_queried_object')) {
    return 'Hello! I need help.';
  }

  $current = get_queried_object();
  $title   = is_object($current) && !empty($current->post_title) ? $current->post_title : get_bloginfo('name');
  $url     = function_exists('get_permalink') ? get_permalink() : home_url('/');

  // Replace the example slugs and messages with the ones your project uses.
  $messages_by_slug = [
    'example-page'     => 'Hello! I found your page and would like to learn how your access solutions can help.',
    'example-solution' => 'Hello! Please send me more information about your entry automation services.',
  ];

  $slug = is_object($current) && !empty($current->post_name) ? $current->post_name : '';

  if ($slug && isset($messages_by_slug[$slug])) {
    return $messages_by_slug[$slug];
  }

  // Update the placeholder below with the real client name when adapting this snippet.
  return sprintf(
    'Hello! I visited %s via %s and would like to learn more about the solutions you provide.',
    wp_strip_all_tags($title),
    $url
  );
}

function dst_get_whatsapp_url(?string $override_message = null): string {
  $number  = '555-555-0100'; // replace with your WhatsApp number before publishing
  $message = $override_message ?? dst_get_default_whatsapp_message_for_page();
  return dst_build_whatsapp_link($number, $message);
}

add_shortcode('dst_whatsapp_url', function($atts): string {
  $atts = shortcode_atts(['msg' => ''], $atts, 'dst_whatsapp_url');
  return esc_url(dst_get_whatsapp_url($atts['msg']));
});

function dst_is_divi_builder_request(): bool {
  if (isset($_GET['et_fb']) && $_GET['et_fb'] == '1') return true;
  if (defined('ET_BUILDER_PLUGIN_ACTIVE') && function_exists('et_core_is_fb_enabled')) {
    if (et_core_is_fb_enabled()) return true;
  }
  if (isset($_GET['builder']) && $_GET['builder'] === 'true') return true;
  return false;
}

add_action('wp', function () {
  if (is_admin() || dst_is_divi_builder_request()) {
    return;
  }

  add_filter('et_pb_module_shortcode_attributes', function(array $props, array $atts, string $slug) {
    $url_fields = ['url','button_url','link_url','image_link_url'];

    foreach ($url_fields as $field) {
      if (empty($props[$field])) continue;
      $raw = trim($props[$field]);

      if (strpos($raw, '[') !== false && strpos($raw, ']') !== false) {
        $maybe = do_shortcode($raw);
        if (!empty($maybe)) {
          $props[$field] = esc_url_raw($maybe);
          continue;
        }
      }

      if (preg_match('~#wa:(.*)$~u', $raw, $m)) {
        $marker = trim($m[1]);
        if ($marker === 'auto' || $marker === '') {
          $props[$field] = esc_url_raw(dst_get_whatsapp_url());
        } else {
          $msg = urldecode($marker);
          $props[$field] = esc_url_raw(dst_get_whatsapp_url($msg));
        }
        continue;
      }

      $parsed = wp_parse_url($raw);
      if (!empty($parsed['query'])) {
        parse_str($parsed['query'], $q);
        if (isset($q['dst-wa']) && $q['dst-wa'] === 'auto') {
          $props[$field] = esc_url_raw(dst_get_whatsapp_url());
          continue;
        }
        if (isset($q['dst-wa-msg']) && $q['dst-wa-msg'] !== '') {
          $props[$field] = esc_url_raw(dst_get_whatsapp_url($q['dst-wa-msg']));
          continue;
        }
      }
    }

    return $props;
  }, 10, 3);
});
