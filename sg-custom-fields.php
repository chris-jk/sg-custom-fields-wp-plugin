<?php
/**
 * Plugin Name: SG Custom Fields
 * Description: Plugin for strain guide custom fields.
 * Version: 1.0
 * Author: ya boy cash
 * License: GPL2
 */

/**
 * Register meta boxes.
 */
function hcf_register_meta_boxes()
{
  add_meta_box('hcf-1', __('Strain Guide Custom Field', 'hcf'), 'hcf_display_callback', 'post');
}
add_action('add_meta_boxes', 'hcf_register_meta_boxes');

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function hcf_display_callback($post)
{
  include plugin_dir_path(__FILE__) . '/form.php';
  // echo "Strain Guide Custom Field";
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function hcf_save_meta_box($post_id)
{
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
    return;
  if ($parent_id = wp_is_post_revision($post_id)) {
    $post_id = $parent_id;
  }

  $fields = [
    'hcf_aka',
    'hcf_star_ratings',
    'hcf_ratings_amount',
    'hcf_strain_type',
    'hcf_THC',
    'hcf_CBD',
    'hcf_CBG',
    'hcf_CBN',
    'hcf_dominate_terp',
    'hcf_other_terp_1',
    'hcf_other_terp_2',
    'hcf_flav_1',
    'hcf_flav_2',
    'hcf_flav_3',
    'hcf_feel_1',
    'hcf_feel_2',
    'hcf_feel_3',
    'hcf_help_1',
    'hcf_help_2',
    'hcf_help_3',
    'hcf_neg_1',
    'hcf_neg_2',
    'hcf_neg_3',
    'hcf_seed_link',
    'hcf_parent_1',
    'hcf_parent_2',
    'hcf_child_1',
    'hcf_child_2',
    'hcf_grow_dif',
    'hcf_grow_avg_hight',
    'hcf_grow_avg_yeild',
    'hcf_grow_time',
    'hcf_grow_notes'
  ];

  // Add the field names for which you want to save the selected to categories
  $category_fields = [
    'hcf_dominate_terp',
    'hcf_other_terp_1',
    'hcf_other_terp_2',
    'hcf_flav_1',
    'hcf_flav_2',
    'hcf_flav_3',
    'hcf_feel_1',
    'hcf_feel_2',
    'hcf_feel_3',
    'hcf_help_1',
    'hcf_help_2',
    'hcf_help_3',
    'hcf_neg_1',
    'hcf_neg_2',
    'hcf_neg_3',
    'hcf_grow_dif',
    'hcf_grow_avg_hight',
    'hcf_grow_avg_yeild',
    'hcf_grow_time',
  ];

  // Array to store the selected categories
  $selected_categories = [];

  foreach ($fields as $field) {
    if (isset($_POST[$field])) {
      // upercase the field value first word
      $field_value = sanitize_text_field($_POST[$field]);

      // Save the field value as post meta
      update_post_meta($post_id, $field, $field_value);

      // If the field is in the category_fields array, add it to the selected categories
      if (in_array($field, $category_fields)) {
        $selected_categories[] = ucwords($field_value);
      }
    }
  }

  // Clear the existing categories
//   wp_set_post_terms($post_id, [], 'category');

  // Set the selected categories as post categories
  if (!empty($selected_categories)) {
    wp_set_post_terms($post_id, $selected_categories, 'category', true);
  }
}
add_action('save_post', 'hcf_save_meta_box');