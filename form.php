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
  <p class="meta-options hcf_field">
    <label for="hcf_strain_type">Strain Type</label>
    <input id="hcf_strain_type" type="text" name="hcf_strain_type"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_strain_type', true)); ?>">
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

  <!-- // Terpene -->
  <p class="meta-options hcf_field">
    <label for="hcf_dom_terp">Dominate Terp </label>
    <input id="hcf_dom_terp" type="text" name="hcf_dom_terp"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_dom_terp', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_other_terp_1">Other Terp 1 </label>
    <input id="hcf_other_terp_1" type="text" name="hcf_other_terp_1"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_other_terp_1', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_other_terp_2">Other Terp 2 </label>
    <input id="hcf_other_terp_2" type="text" name="hcf_other_terp_2"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_other_terp_2', true)); ?>">
  </p>

  <!-- // Flavor -->
  <p class="meta-options hcf_field">
    <label for="hcf_flav_1">Flavor 1 </label>
    <input name="hcf_flav_1" id="hcf_flav_1" type="select" placeholder='Select an item' multiple=false options=[
      blueberry, cherry, coconut, grape,
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_flav_1', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_flav_2">Flavor 2 </label>
    <input id="hcf_flav_2" type="text" name="hcf_flav_2"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_flav_2', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_flav_3">Flavor 3 </label>
    <input id="hcf_flav_3" type="text" name="hcf_flav_3"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_flav_3', true)); ?>">
  </p>

  <!-- // Feel -->
  <p class="meta-options hcf_field">
    <label for="hcf_feel_1">Feel 1 </label>
    <input id="hcf_feel_1" type="text" name="hcf_feel_1"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_feel_1', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_feel_2">Feel 2 </label>
    <input id="hcf_feel_2" type="text" name="hcf_feel_2"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_feel_2', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_feel_3">Feel 3 </label>
    <input id="hcf_feel_3" type="text" name="hcf_feel_3"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_feel_3', true)); ?>">
  </p>

  <!-- // Help -->
  <p class="meta-options hcf_field">
    <label for="hcf_help_1">Help 1 </label>
    <input id="hcf_help_1" type="text" name="hcf_help_1"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_help_1', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_help_2">Help 2 </label>
    <input id="hcf_help_2" type="text" name="hcf_help_2"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_help_2', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_help_3">Help 3 </label>
    <input id="hcf_help_3" type="text" name="hcf_help_3"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_help_3', true)); ?>">
  </p>

  <!-- // Negative -->
  <p class="meta-options hcf_field">
    <label for="hcf_neg_1">Negative 1 </label>
    <input id="hcf_neg_1" type="text" name="hcf_neg_1"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_neg_1', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_neg_2">Negative 2 </label>
    <input id="hcf_neg_2" type="text" name="hcf_neg_2"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_neg_2', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_neg_3">Negative 3 </label>
    <input id="hcf_neg_3" type="text" name="hcf_neg_3"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_neg_3', true)); ?>">
  </p>

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

  <!-- // grow  -->
  <p class="meta-options hcf_field">
    <label for="hcf_grow_dif">Grow Dif </label>
    <input id="hcf_grow_dif" type="text" name="hcf_grow_dif"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_grow_dif', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_grow_avg_hight">Grow Avg Hight </label>
    <input id="hcf_grow_avg_hight" type="text" name="hcf_grow_avg_hight"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_grow_avg_hight', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_grow_avg_yeild">Grow Avg Yeild </label>
    <input id="hcf_grow_avg_yeild" type="text" name="hcf_grow_avg_yeild"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_grow_avg_yeild', true)); ?>">
  </p>
  <p class="meta-options hcf_field">
    <label for="hcf_grow_time">Grow Time </label>
    <input id="hcf_grow_time" type="text" name="hcf_grow_time"
      value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_grow_time', true)); ?>">

  </p>

</div>