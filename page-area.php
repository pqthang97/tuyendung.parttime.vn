<?php
/*
 Template Name: Areas of Activity Page
 */

$categories = get_terms( array(
  'orderby' => 'ID',
  'taxonomy' => 'jobtemplate_category',
  'order'   => 'ASC',
  'hide_empty' => 0 
) );

$wp_session = WP_Session::get_instance();
if(isset($_GET['template'])) {
  $wp_session['job_template'] = intval($_GET['template']);
  ob_clean();
  wp_redirect(get_site_url() . '/hire_first');
  ?>
  <script>window.location='<?php echo get_site_url() . '/hire_first'; ?>'</script>
  <?php
  exit;
}
get_header();
include('header-menu.php');
?>
<div class="landing_areas_subheader">
    <div class="landing_wrapper">
        <ul class="landing_areas_subheader_list">
        <?php
        foreach($categories as $key => $category) {
          if($category->name === 'Uncategorized')
            continue;
          ?>
          <li class="landing_areas_subheader_element">
              <a href="#<?php echo str_replace('-', '_', $category->slug);?>" class="landing_areas_subheader_link js_scroll_link <?php if($key == 0) echo 'selected' ?>">
              <?php echo $category->name;?>
              </a>
          </li>
          <?php
        }
        ?>
          
        </ul>
    </div>
  </div>
  
  <?php
  
  foreach($categories as $keycategory => $category) {
    
    if($category->name == 'Uncategorized')
      continue;

      $color_start = get_field('color_start', $category);
      $icon = get_field('icon', $category);
    ?>
    <section class="landing_tilted_section for_area_of_activity <?php if($keycategory === 0) echo 'first'; else if($keycategory % 2 !== 0) echo 'untilted'; ?> ">
    <?php if($keycategory % 2 == 0) {
      ?>
      <div class="landing_tilted_content">
      <?php
    }
    ?>
    
        <div class="landing_wrapper">
          <div class="landing_area_of_activity_header">
              <a id="<?php echo str_replace('-', '_', $category->slug); ?>" class="landing_area_of_activity_anchor"></a>
              <span class="landing_area_of_activity_icon sprite <?php echo $icon; ?>"></span>
              <h2 class="landing_area_of_activity_header_title">
                <?php echo $category->name; ?>
              </h2>
              <p class="landing_area_of_activity_header_explanation for_<?php echo str_replace('-', '_', $category->slug); ?>" style="color: <?php echo $color_start; ?>">
                <?php echo $category->description; ?>
              </p>
          </div>
          <div class="landing_area_of_activity_wrapper">
          <?php
          
            $args = array(
              'posts_per_page'   => 5,
              'offset'           => 0,
              'tax_query' => array(
                array(
                  'taxonomy' => 'jobtemplate_category',
                  'field' => 'term_id',
                  'terms' => $category->term_id, // Where term_id of Term 1 is "1".
                  'include_children' => false
                )
                ),
              'post_type'        => 'job_template',
              'post_mime_type'   => '',
              'post_parent'      => '',
              'author'	   => '',
              'author_name'	   => '',
              'orderby' => 'ID',
      'order'   => 'ASC',
              'post_status'      => 'publish',
              'suppress_filters' => true 
            );
            $posts_array = get_posts( $args );
            
          ?>
              <ul class="landing_area_of_activity_list js_links_wrapper">
              <?php
                foreach($posts_array as $key => $post) {
                  
                  ?>
                  <li class="landing_area_of_activity_list_element">
                    <a href="#" class="landing_area_of_activity_list_link for_<?php echo str_replace('-', '_', $category->slug); ?> js_change_area_text <?php if($key === 0) echo 'selected'; ?>"
                      data-shows="area_<?php echo $key; ?>_<?php echo $category->term_id; ?>">
                    <span class="landing_area_of_activity_list_check hostelry"></span>
                    <?php echo $post->post_title; ?>
                    </a>
                </li>
                  <?php
                }
              ?>
                
              </ul>
              <div class="landing_area_of_activity_explanations js_area_explanations_wrapper">
              <?php
              foreach($posts_array as $key => $post) {
                ?>
                <div class="landing_area_of_activity_explanation_wrapper  <?php if($key === 0) echo 'selected'; ?>" data-area="area_<?php echo $key; ?>_<?php echo $category->term_id; ?>">
                    <h3 class="landing_area_of_activity_explanations_header">
                    <?php echo $post->post_title; ?>
                    </h3>
                    <div class="landing_area_of_activity_explanation for_hostelry">
                    <?php echo $post->post_content; ?><br />
                      <a class="landing_area_of_activity_explanation_button" href="#" onClick="window.location = '<?php echo get_site_url().'/areas-of-activity?template='.$post->ID; ?>'">Request <?php echo $post->post_title; ?></a>
                    </div>
                </div>
              <?php 
              }
              ?>
                
              <ul class="landing_areas_of_activity_buttons for_mobile narrow">
                <li class="landing_areas_of_activity_button narrow selected js_loop_mobile_area"></li>
                <li class="landing_areas_of_activity_button narrow js_loop_mobile_area"></li>
                <li class="landing_areas_of_activity_button narrow js_loop_mobile_area"></li>
                <li class="landing_areas_of_activity_button narrow js_loop_mobile_area"></li>
              </ul>
          </div>
        </div>
        <?php if($keycategory % 2 !== 0) {
      ?>
      </div>
      <?php
    }
    ?>
    
  </section>
    <?php
  }
  
  ?>
  <section class="landing_tilted_section for_area_of_activity untilted for_other">
            <div class="landing_wrapper">
               <div class="landing_area_of_activity_header">
                  <a id="others" class="landing_area_of_activity_anchor"></a>
                  <span class="landing_area_of_activity_icon sprite sprite_icon_more"></span>
                  <h2 class="landing_area_of_activity_header_title">
                     Và nhiều công việc khác...
                  </h2>
                  <p class="landing_area_of_activity_header_explanation for_more">
                     Chúng tôi luôn đáp ứng những gì bạn cần
                  </p>
               </div>
               <div class="landing_area_of_activity_wrapper">
                  <div class="landing_area_of_activity_explanations for_more">
                     <div class="landing_area_of_activity_explanation_wrapper selected" data-area="area_administrative_tc">
                        <h3 class="landing_area_of_activity_explanations_header">
                           Hãy liên lạc chúng tôi nếu bạn cần hỗ trợ tuyển dụng
                        </h3>
                        <div class="landing_area_of_activity_explanation for_more">
                           <p>
                              Chúng tôi là chuyên gia trong mảng tuyển dụng parttime, hãy liên lạc với chúng tôi để được tư vấn thêm về nhu cầu tuyển dụng của bạn.
                           </p>
                           <a href="mailto:support@parttime.vn" class="landing_area_of_activity_explanation_link">
                           support@parttime.vn
                           </a>
                           <br>
                           <a href="tel:+84938373899" class="landing_area_of_activity_explanation_link">
                           +84938373899
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
  <script>
    
    var LandingView = modulejs.require('MobileAreasView');
    new LandingView();

</script>
  <script type="text/javascript">
         $(function(){
            $('a[href*="#"]:not([href="#"])').click(function() {
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
                    || location.hostname == this.hostname) {

                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                       if (target.length) {
                         $('html,body').animate({
                             scrollTop: target.offset().top
                        }, 1000);
                        return false;
                    }
                }
            });
         });
      </script>
      <script type="text/javascript">
         var clearSelected = () => {
            $('.js_scroll_link').removeClass('selected');
         };

         $('document').ready(function(){
            $('.js_scroll_link').click(function(){
               clearSelected();
               $(this).addClass('selected');
            });
         });
      </script>
<?php get_footer(); ?>
<style>
  <?php
  
  foreach($categories as $keycategory => $category) {
    if($category->name == 'Uncategorized')
      continue;

    $color_start = get_field('color_start', $category);
    $color_end = get_field('color_end', $category);
    ?>
    
    .landing_area_of_activity_list_link.selected.for_<?php echo str_replace('-', '_', $category->slug); ?> { 
      background: linear-gradient(to right, <?php echo $color_start; ?> 0%, <?php echo $color_end; ?> 100%);
    }
    <?php
  }
  ?>
  </style>
