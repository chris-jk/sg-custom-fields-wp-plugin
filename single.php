<?php get_header(); ?>

<? function svg()
// placeholder svg function
{
  echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="3 3 18 18" height="34" width="65">
                          <path
                            d="M11.9 7.7c.3 0 1 .2 1.3 1 .1.4.6.6.9.5.4-.1.6-.6.5-.9-.5-1.6-2-2-2.7-2-.4 0-.8.3-.8.8.1.3.4.6.8.6z">
                          </path>
                          <path
                            d="M18.9 12.4c-.6-.8-1.4-1.4-2.3-1.7-.1 0-.2-.1-.3-.1.1-.2.1-.3.2-.5.3-.9.3-2-.1-2.9-.3-.9-.9-1.7-1.7-2.3-.8-.6-1.8-.9-2.7-.9-1 0-2 .3-2.8.9-.8.6-1.4 1.4-1.7 2.3-.3.9-.3 1.9-.1 2.9 0 .2.1.3.2.5-.8.2-1.6.6-2.2 1.2-.9.9-1.4 2.1-1.4 3.4s.5 2.5 1.4 3.4S7.5 20 8.8 20c1.2 0 2.3-.4 3.1-1.2.5.5 1.1.8 1.8 1 .9.3 2 .3 2.9-.1.9-.3 1.7-.9 2.3-1.7.6-.8.9-1.8.9-2.8s-.3-2-.9-2.8zm-10-4.7c.2-.7.6-1.2 1.2-1.6s1.2-.6 1.9-.6 1.3.2 1.9.6 1 .9 1.2 1.6c.2.6.2 1.3 0 2-.1.3-.2.5-.3.8-.4 0-.7.1-1 .2-.7.2-1.3.5-1.8 1-.8-.7-1.7-1.1-2.7-1.2-.3-.3-.4-.6-.5-.8-.1-.7-.1-1.4.1-2zm2.1 9.8c-.6.6-1.4 1-2.3 1s-1.7-.3-2.3-1c-.6-.6-1-1.4-1-2.3 0-.9.3-1.7 1-2.3.6-.6 1.4-1 2.3-1s1.7.3 2.3 1c.6.6 1 1.4 1 2.3 0 .8-.4 1.7-1 2.3zm6.7-.5c-.4.5-.9 1-1.6 1.2-.6.2-1.3.2-2 0-.5-.1-.9-.4-1.3-.7.4-.7.7-1.5.7-2.4 0-.9-.2-1.7-.7-2.4.4-.3.8-.6 1.3-.7.6-.2 1.3-.2 2 0 .6.2 1.2.6 1.6 1.2.4.5.6 1.2.6 1.9s-.2 1.4-.6 1.9z">
                          </path>
                          <path
                            d="M16.9 14.2c-.4 0-.8.3-.8.8 0 .8-.3 1.1-.6 1.2-.3.2-.7.2-.9.1-.4-.2-.8 0-1 .4-.2.4 0 .8.4 1 .6.2 1.5.2 2.2-.2.8-.4 1.3-1.3 1.3-2.5.2-.5-.1-.8-.6-.8zm-6.5 0c-.4 0-.8.3-.8.8 0 .8-.3 1.1-.6 1.2-.3.2-.7.2-.9.1-.4-.2-.8 0-1 .4-.2.4 0 .8.4 1 .6.2 1.5.2 2.2-.2.8-.4 1.3-1.3 1.3-2.5.2-.5-.1-.8-.6-.8z">
                          </path>
                        </svg>
                        ';
}
;

$cats = get_the_category();
foreach ($cats as $cat) {
  if (strtolower($cat->name) == 'strains') {
    //                   echo 'is in strains cat';
    $isStrains = true;
  }
}

$postAuthor = get_the_author();
if (strtolower($postAuthor) == 'strain bot') {

  // 	echo 'authorIsStrainbot';
  $authorIsStrainbot = true;
}
?>

<div class="content">

  <?php while (have_posts()):
    the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <div class="blog-card-outer">
        <div class="blog-card group">

          <?php if (has_post_format(array('audio', 'gallery', 'video'))): ?>

            <div class="blog-card-format">
              <div class="entry-media">
                <?php if (get_post_format()) {
                  get_template_part('inc/post-formats');
                } ?>
              </div>

              <h1 class="blog-card-title-single">
                <?php the_title(); ?>
              </h1>
            </div>

          <?php else: ?>

            <div class="blog-card-inner"
              style="background-image:url('<?php the_post_thumbnail_url('cardstyle-large'); ?>');">

              <?php if (has_post_format('video') && !is_sticky())
                echo '<span class="thumb-icon"><i class="fas fa-play"></i></span>'; ?>
              <?php if (has_post_format('audio') && !is_sticky())
                echo '<span class="thumb-icon"><i class="fas fa-volume-up"></i></span>'; ?>
              <?php if (is_sticky())
                echo '<span class="thumb-icon"><i class="fas fa-star"></i></span>'; ?>

              <div class="blog-card-inner-inner">
                <h1 class="blog-card-title">
                  <?php the_title(); ?>
                </h1>
              </div>

            </div>

          <?php endif; ?>
          <div class="blog-card-bottom-outer">
            <div class="blog-card-bottom">
              <?php if (!$isStrains): ?>
                <div class="blog-card-author">
                  <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_avatar(get_the_author_meta('user_email'), '64'); ?></a>
                </div>
              <?php endif; ?>
              <ul class="blog-card-meta group">
                <?php if (!$isStrains): ?>
                  <li class="blog-card-date"><i class="far fa-calendar"></i>
                    <?php the_time(get_option('date_format')); ?>
                  </li>
                  <li class="blog-card-byline"><i class="far fa-user"></i>
                    <?php the_author_posts_link(); ?>
                  </li>
                <?php endif; ?>
                <li class="blog-card-byline"><i class="far fa-folder"></i>
                  <?php the_category(' / '); ?>
                </li>
                <?php if (comments_open() && (get_theme_mod('comment-count', 'on') == 'on')): ?>
                  <li class="blog-card-comments"><i class="far fa-comment"></i><a href="<?php comments_link(); ?>"><?php comments_number('0', '1', '%'); ?></a></li>
                <?php endif; ?>
              </ul>

              <div class="entry-content">
                <div class="entry themeform">
                  <?php if (!$isStrains): ?>

                    <?php the_content(); ?>
                  <?php elseif ($authorIsStrainbot): ?>
                    <?php the_content(); ?>
                  <? else: ?>
                    <!-- IF  ------------  STRAINS  ------------   END -->
                    <h3>
                      <?php the_title(); ?> aka:
                      <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_aka', true)); ?>
                    </h3>

                    <table>
                      <tbody>
                        <tr>
                          <td>
                            <strong>User Ratings:</strong>
                          </td>
                          <td>
                            <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_user_ratings', true)); ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <strong>Strain Type: </strong>
                          </td>
                          <td>
                            <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_strain_type', true)); ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                    <table>
                      <tbody>
                        <tr>
                          <?php if (esc_attr(get_post_meta(get_the_ID(), 'hcf_THC', true))): ?>
                            <td>
                              <strong><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="none"
                                  viewBox="0 0 18 18" height="20" width="20">
                                  <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.523 9.648L9.648 3.773 3.773 9.648l5.875 5.875 5.875-5.875zM9.648.944L.945 9.648l8.703 8.704 8.704-8.704L9.648.944z"
                                    fill="#38C7AE"></path>
                                </svg> THC: </strong>
                            </td>
                          <?php endif; ?>
                          <?php if (esc_attr(get_post_meta(get_the_ID(), 'hcf_CBG', true))): ?>
                            <td>
                              <strong>
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 19 15" fill="none"
                                  height="20" width="20">
                                  <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.907 15L19 .75H.813L9.907 15zm0-3.718L15.35 2.75H4.462l5.445 8.532z" fill="#38C7AE">
                                  </path>
                                </svg> CBG: </strong>
                            </td>
                          <?php endif; ?>
                          <?php if (esc_attr(get_post_meta(get_the_ID(), 'hcf_CBD', true))): ?>
                            <td>
                              <strong><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 16 17"
                                  fill="none" height="20" width="20">
                                  <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.73 4.044a6.039 6.039 0 108.54 8.54 6.039 6.039 0 00-8.54-8.54zm9.927-1.387A8 8 0 102.343 13.97 8 8 0 0013.657 2.657z"
                                    fill="#38C7AE"></path>
                                </svg> CBD: </strong>
                            </td>
                          <?php endif; ?>
                        </tr>
                        <tr>
                          <?php if (esc_attr(get_post_meta(get_the_ID(), 'hcf_THC', true))): ?>
                            <td>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_THC', true)); ?> %
                            </td>
                          <?php endif; ?>
                          <?php if (esc_attr(get_post_meta(get_the_ID(), 'hcf_CBG', true))): ?>
                            <td>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_CBG', true)); ?> %
                            </td>
                          <?php endif; ?>
                          <?php if (esc_attr(get_post_meta(get_the_ID(), 'hcf_CBD', true))): ?>
                            <td>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_CBD', true)); ?> %

                            </td>
                          <?php endif; ?>
                        </tr>
                      </tbody>
                    </table>

                    <h2>
                      <?php the_title(); ?> Terpene Profile
                    </h2>
                    <strong>Dominate Terp </strong>
                    <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_dom_terp', true)); ?>

                    </br>
                    <strong>Other Terps </strong>
                    <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_other_terp_1', true)); ?>

                    <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_other_terp_2', true)); ?>

                    </br>
                    <h2>
                      <?php the_title(); ?> info
                    </h2>
                    <?php the_content(); ?>
                    </br>
                    <h2>
                      <?php the_title(); ?> Flavors
                    </h2>
                    <table>
                      <tbody>
                        <tr>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_flav_1', true))): ?>
                            <td>
                              <? svg() ?>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_flav_1', true)); ?>
                            </td>
                          <? endif; ?>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_flav_2', true))): ?>
                            <td>
                              <? svg() ?>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_flav_2', true)); ?>
                            </td>
                          <? endif; ?>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_flav_3', true))): ?>
                            <td>
                              <? svg() ?>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_flav_3', true)); ?>
                            </td>
                          <? endif; ?>
                        </tr>
                      </tbody>
                    </table>

                    <h2>
                      <?php the_title(); ?> Feelings
                    </h2>
                    <table>
                      <tbody>
                        <tr>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_feel_1', true))): ?>
                            <td>
                              <? svg() ?>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_feel_1', true)); ?>
                            </td>
                          <? endif; ?>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_feel_2', true))): ?>
                            <td>
                              <? svg() ?>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_feel_2', true)); ?>
                            </td>
                          <? endif; ?>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_feel_3', true))): ?>
                            <td>
                              <? svg() ?>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_feel_3', true)); ?>
                            </td>
                          <? endif; ?>
                        </tr>
                      </tbody>
                    </table>

                    <h2>
                      <?php the_title(); ?> May help with
                    </h2>

                    <table>
                      <tbody>
                        <tr>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_help_1', true))): ?>
                            <td>
                              <? svg() ?>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_help_1', true)); ?>
                            </td>
                          <? endif; ?>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_help_2', true))): ?>
                            <td>
                              <? svg() ?>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_help_2', true)); ?>
                            </td>
                          <? endif; ?>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_help_3', true))): ?>
                            <td>
                              <? svg() ?>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_help_3', true)); ?>
                            </td>
                          <? endif; ?>
                        </tr>
                      </tbody>
                    </table>

                    <h2>
                      <?php the_title(); ?> Possible Negatives
                    </h2>

                    <table>
                      <tbody>
                        <tr>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_neg_1', true))): ?>
                            <td>
                              <? svg() ?>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_neg_1', true)); ?>
                            </td>
                          <? endif; ?>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_neg_2', true))): ?>
                            <td>
                              <? svg() ?>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_neg_2', true)); ?>
                            </td>
                          <? endif; ?>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_neg_3', true))): ?>
                            <td>
                              <? svg() ?>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_neg_3', true)); ?>
                            </td>
                          <? endif; ?>
                        </tr>
                      </tbody>
                    </table>

                    <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_seed_link', true))): ?>
                      <strong>Seed link </strong>
                      <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_seed_link', true)); ?>
                    <?php endif; ?>

                    <h2>
                      <?php the_title(); ?> Genetics
                    </h2>

                    <table>
                      <tbody>
                        <tr>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_parent_1', true))): ?>
                            <td><strong>Parents</strong></td>
                            <td>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_parent_1', true)); ?>
                            </td>
                          <? endif; ?>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_parent_2', true))): ?>
                            <td>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_parent_2', true)); ?>
                            </td>
                          <? endif; ?>
                        </tr>
                        <tr>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_child_1', true))): ?>
                            <td><strong>Children</strong></td>
                            <td>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_child_1', true)); ?>
                            </td>
                          <? endif; ?>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_child_2', true))): ?>
                            <td>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_child_2', true)); ?>
                            </td>
                          <? endif; ?>
                        </tr>
                      </tbody>
                    </table>


                    <h2>
                      <?php the_title(); ?> Grow info
                    </h2>


                    <table>
                      <tbody>
                        <tr>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_grow_dif', true))): ?>
                            <td><strong>Grow Difficulty</strong></td>
                            <td>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_grow_dif', true)); ?>
                            </td>
                          <? endif; ?>
                        </tr>
                        <tr>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_grow_avg_hight', true))): ?>
                            <td><strong>Average Height</strong></td>
                            <td>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_grow_avg_hight', true)); ?>
                            </td>
                          <? endif; ?>
                        </tr>
                        <tr>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_grow_avg_yeild', true))): ?>
                            <td><strong>Average Yield</strong></td>
                            <td>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_grow_avg_yeild', true)); ?>
                            </td>
                          <? endif; ?>
                        </tr>
                        <tr>
                          <? if (esc_attr(get_post_meta(get_the_ID(), 'hcf_grow_time', true))): ?>
                            <td><strong>Flowering Time</strong></td>
                            <td>
                              <?php echo esc_attr(get_post_meta(get_the_ID(), 'hcf_grow_time', true)); ?>
                            </td>
                          <? endif; ?>
                        </tr>
                      </tbody>
                    </table>
                  <? endif; ?>
                  <!-- IF  ------------  STRAINS  ------------   END -->
                  <?php wp_link_pages(array('before' => '<div class="post-pages">' . esc_html__('Pages:', 'cardstyle'), 'after' => '</div>')); ?>
                  <div class="clear"></div>
                </div>
                <!--/.entry-->
              </div>

              <div class="entry-footer group">

                <?php the_tags('<p class="post-tags"><span>' . esc_html__('Tags:', 'cardstyle') . '</span> ', '', '</p>'); ?>

                <div class="clear"></div>

                <?php if ((get_theme_mod('author-bio', 'on') == 'on') && get_the_author_meta('description')): ?>
                  <div class="author-bio">
                    <div class="bio-avatar">
                      <?php echo get_avatar(get_the_author_meta('user_email'), '128'); ?>
                    </div>
                    <p class="bio-name">
                      <?php the_author_meta('display_name'); ?>
                    </p>
                    <p class="bio-desc">
                      <?php the_author_meta('description'); ?>
                    </p>
                    <div class="clear"></div>
                  </div>
                <?php endif; ?>

                <?php do_action('alx_ext_sharrre'); ?>

                <?php if (get_theme_mod('post-nav', 'sidebar') == 'content') {
                  get_template_part('inc/post-nav');
                } ?>

                <?php if (get_theme_mod('related-posts', 'categories') != 'disable') {
                  get_template_part('inc/related-posts');
                } ?>

                <?php if (comments_open() || get_comments_number()):
                  comments_template('/comments.php', true);
                endif; ?>

              </div>

            </div>
          </div>

        </div>
      </div>

    </article>
    <!--/.post-->

  <?php endwhile; ?>

</div>
<!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>