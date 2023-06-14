<?php
/**
 * Plugin Name: sg Custom Field
 * Plugin URI: https://docs.metabox.io
 * Description: plugin for strain guide custom fields.
 * Version: 1.0
 * Author: ya boy cash
 * Author URI: https://docs.metabox.io
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
  include plugin_dir_path(__FILE__) . './form.php';
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
    'hcf_user_ratings',
    'hcf_strain_type',
    'hcf_THC',
    'hcf_CBG',
    'hcf_CBD',
    'hcf_dom_terp',
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
  ];
  foreach ($fields as $field) {
    if (array_key_exists($field, $_POST)) {
      update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
    }
  }
}
add_action('save_post', 'hcf_save_meta_box');