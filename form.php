<div class="hcf_box">
  <style scoped>
    .hcf_box {
      display: grid;
      grid-template-columns: max-content 1fr;
      grid-row-gap: 10px;
      grid-column-gap: 20px;
    }

    .hcf_field {
      display: contents;
    }
  </style>

  <p class="meta-options hcf_field">
    <label for="hcf_aka">aka</label>
    <input id="hcf_aka" type="text" name="hcf_aka"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_aka', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_user_ratings">User Ratings <small>1-5</small></label>
    <input id="hcf_user_ratings" type="text" name="hcf_user_ratings"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_user_ratings', true)); ?>">
  </p>

  <!-- // THC  -->
  <p class="meta-options hcf_field">
    <label for="hcf_THC">THC</label>
    <input id="hcf_THC" type="number" name="hcf_THC"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_THC', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_CBD">CBD</label>
    <input id="hcf_CBD" type="number" name="hcf_CBD"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_CBD', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_CBG">CBG</label>
    <input id="hcf_CBG" type="number" name="hcf_CBG"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_CBG', true)); ?>">
  </p>

  <?php
  $field_names = [
    'hcf_strain_type',
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

  foreach ($field_names as $field_name) {
    $field_value = get_post_meta(get_the_ID(), $field_name, true);

    // Output the HTML for the input field
    ?>
    <p class="meta-options hcf_field">
      <label for="<?php echo $field_name; ?>"><?php echo ucfirst(str_replace('_', ' ', $field_name)); ?></label>
      <select id="<?php echo $field_name; ?>" name="<?php echo $field_name; ?>" class="select2">
        <?php
        // Output the default option
        $selected_none = ($field_value === '') ? 'selected' : '';
        echo '<option value="" ' . $selected_none . '>None</option>';

        // Output the options from the tags
        $tags = get_tags(array('hide_empty' => false));
        foreach ($tags as $tag) {
          $selected = ($tag->name == $field_value) ? 'selected' : '';
          echo "<option value='{$tag->name}' {$selected}>{$tag->name}</option>";
        }
        ?>
      </select>
    </p>
    <?php
  }

  ?>

  <!-- //hcf_seed_link  -->
  <p class="meta-options hcf_field">
    <label for="hcf_seed_link">Seed Link </label>
    <input id="hcf_seed_link" type="text" name="hcf_seed_link"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_seed_link', true)); ?>">
  </p>
  <!-- // Genetics -->
  <p class="meta-options hcf_field">
    <label for="hcf_parent_1">Parent 1 </label>
    <input id="hcf_parent_1" type="text" name="hcf_parent_1"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_parent_1', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_parent_2">Parent 2 </label>
    <input id="hcf_parent_2" type="text" name="hcf_parent_2"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_parent_1', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_child_1">Child 1 </label>
    <input id="hcf_child_1" type="text" name="hcf_child_1"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_parent_1', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_child_2">Child 2 </label>
    <input id="hcf_child_2" type="text" name="hcf_child_2"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_parent_1', true)); ?>">
  </p>

</div>