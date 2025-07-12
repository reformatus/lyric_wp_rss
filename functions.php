<?php
function customize_category_rss_feed($for_comments) {
  // Don't run on comment feeds
  if ($for_comments) {
    return;
  }

  $post_id = get_the_ID();

  // Add the featured image URL in a custom tag
  if (has_post_thumbnail($post_id)) {
    $image_url = get_the_post_thumbnail_url($post_id, 'full');
    if ($image_url) {
      // Use esc_url() for security
      echo '<featured_image>' . esc_url($image_url) . '</featured_image>';
    }
  }

  // Add a custom field named 'field_button_link'
  $field_button_link = get_post_meta($post_id, 'button_link', true);
  if (!empty($field_button_link)) {
    // Use esc_html() for security
    echo '<button_link>' . esc_html($field_button_link) . '</button_link>';
  }

  // Add a custom field named 'field_button_icon'
  $field_button_icon = get_post_meta($post_id, 'button_icon', true);
  if (!empty($field_button_icon)) {
    echo '<button_icon>' . esc_html($field_button_icon) . '</button_icon>';
  }
  
  // Add a custom field named 'field_button_fa_icon'
  $field_button_fa_icon = get_post_meta($post_id, 'button_fa_icon', true);
  if (!empty($field_button_icon)) {
    echo '<button_fa_icon>' . esc_html($field_button_fa_icon) . '</button_fa_icon>';
  }
}

add_action('rss2_item', 'customize_category_rss_feed');