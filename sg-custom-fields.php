<?php
/**
 * Plugin Name: SG Custom Fields and REST API
 * Description: plugin for strain guide custom fields.
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

  // Custom fields
  $fields = [
    'hcf_aka',
    'hcf_star_ratings',
    'hcf_ratings_amount',
    'hcf_strain_type',
    'hcf_THC',
    'hcf_CBG',
    'hcf_CBD',
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
  ];
}
// Array to store the selected categories
$selected_categories = [];

foreach ($fields as $field) {
  if (isset($_POST[$field])) {
    $field_value = sanitize_text_field($_POST[$field]);

    // Save the field value as post meta
    update_post_meta($post_id, $field, $field_value);

    // If the field is in the category_fields array, add it to the selected categories
    if (in_array($field, $category_fields)) {
      $selected_categories[] = $field_value;
    }
  }
}

// Clear the existing categories
wp_set_post_terms($post_id, [], 'category');

// Set the selected categories as post categories
if (!empty($selected_categories)) {
  wp_set_post_terms($post_id, $selected_categories, 'category');
}


/**
 * Register custom fields with REST API.
 */
function hcf_register_rest_fields()
{
  $fields = [
    'hcf_aka',
    'hcf_star_ratings',
    'hcf_ratings_amount',
    'hcf_strain_type',
    'hcf_THC',
    'hcf_CBG',
    'hcf_CBD',
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

  foreach ($fields as $field) {
    register_rest_field(
      'post',
      $field,
      [
        'get_callback' => 'hcf_get_rest_field',
        'update_callback' => 'hcf_update_rest_field',
        'schema' => null,
      ]
    );
  }
}
add_action('rest_api_init', 'hcf_register_rest_fields');

/**
 * Get custom field value for REST API.
 *
 * @param array $object Details of current REST API request.
 * @param string $field_name Field name.
 * @param WP_REST_Request $request Current REST API request.
 * @return mixed
 */
function hcf_get_rest_field($object, $field_name, $request)
{
  return get_post_meta($object['id'], $field_name, true);
}

/**
 * Update custom field value through REST API.
 *
 * @param mixed $value New value of the field.
 * @param object $object The object from the response.
 * @param string $field_name Name of the field.
 * @return bool|int
 */
function hcf_update_rest_field($value, $object, $field_name)
{
  return update_post_meta($object->ID, $field_name, sanitize_text_field($value));
}