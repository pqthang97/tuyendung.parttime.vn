<?php
/*
 Template Name: Hire Completed Page
 */

$wp_session = WP_Session::get_instance();
if(!isset($wp_session['job_template']) || $wp_session['job_template'] == 0)
  wp_redirect(get_site_url());
$wp_session['job_template'] = 0;
get_header();
?>
<div class="landing_main_wrapper">
         <div class="landing_header for_scrolling for_areas">
            <div class="landing_wrapper">
               <a href="/" class="landing_mobile_menu_icon js_show_mobile_menu"></a>
               <a class="landing_logo" href="/">
               Parttime.vn
               </a>
               <ul class="landing_menu">
                  <li class="landing_menu_element">
                     <a class="landing_menu_link" href="/areas-of-activity">Mẫu vị trí tuyển dụng</a>
                  </li>
                  <li class="landing_menu_element">
                     <a class="landing_menu_link with_dropdown js_contact_link">Liên lạc</a>
                     <div class="contact_popup js_contact_popup">
                        <div class="contact_popup_item">
                           <span class="contact_popup_item_heading">
                           Email:
                           </span>
                           <span class="contact_popup_item_content">
                           <a href="">support@parttime.vn</a>
                           </span>
                        </div>
                        <div class="contact_popup_item">
                           <span class="contact_popup_item_heading">
                           Phone:
                           </span>
                           <span class="contact_popup_item_content">
                           <a href="tel:+938373899">
                           +938373899
                           </a>
                           </span>
                        </div>
                     </div>
                  </li>
				  <?php /*
                  <li class="landing_menu_element">
                     <a class="landing_menu_link" href="//parttime.vn">Tôi muốn tìm việc</a>
                  </li> */
				  ?>
                  <li class="landing_menu_element">
                     <a class="landing_menu_link" href="//blog.parttime.vn">Blog</a>
                  </li>
                  <li class="landing_menu_element">
                     <a class="landing_menu_link_button" href="http://go.parttime.vn/create-job-request">Đăng tuyển</a>
                  </li>
               </ul>
            </div>
         </div>
         <section class="landing_tilted_section for_hire_form for_success">
            <div class="landing_tilted_content for_hire_form">
               <div class="landing_wrapper clearfix">
                  <div class="landing_text_block floated">
                     <h2 class="landing_heading">
                        Cảm ơn bạn!
                     </h2>
                     <p class="landing_paragraph big">
                        Chúng tôi đã nhận được yêu cầu tuyển dụng
                     </p>
                     <p class="landing_hire_form_success_contact for_desktop">
                        <strong>
                        Bạn cần hỗ trợ thêm?
                        </strong>
                        <br>
                        Nếu bạn có bất kỳ câu hỏi gì, vui lòng liên lạc tại:
                        <br>
                        <strong class="big">
                        +938373899
                        </strong>
                        <br>
                        <strong class="big">
                        <a href="mailto:support@parttime.vn">support@parttime.vn</a>
                        </strong>
                     </p>
                  </div>
                  <div class="landing_hire_form_success_explanation">
                     <h4>
                        Chúng tôi sẽ liên lạc sớm với bạn!
                     </h4>
                     <p>
                        Bạn đã gởi đầy đủ thông tin, nếu có thể, hãy cho chúng tôi biết
                        thời gian trống của bạn. Chúng tôi sẽ liên lạc thuận tiện hơn.
                     </p>
                     <form class="landing_hire_time_form js_call_time_form" action="/hire_enquiries/last_step/2711" accept-charset="UTF-8" data-remote="true" method="post">
                        <input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="_method" value="patch" /><input type="hidden" name="authenticity_token" value="/BAdqe1f+9Svd9hYxhyUB+Uk1lELuP1d2dmhMrgTamNin6kmBT9j9LPJdkVp83zoLtfqdj49/Mquy9f/xmyLOA==" />
                        <div class="landing_hire_form_input js_call_time_input">
                           <label for="hire_enquiry_call_time">Chọn ngày giờ trống của bạn</label>
                           <input class="js_date_time_input" tabindex="1" placeholder="Ngày & Giờ" type="text" name="hire_enquiry[call_time]" />
                        </div>
                        <button name="button" type="submit" class="landing_hire_time_form_submit" tabindex="2">
                           <div class="sprite sprite_icon_phone"></div>
                           Gởi lịch
                        </button>
                        <div class="landing_hire_time_form_success">
                           <span class="sprite sprite_check_green"></span>
                           Lịch đã gởi thành công
                        </div>
                     </form>
                     <h4>
                        Tuyển nhân viên thật dễ dàng tại Parttime.vn
                     </h4>
                     <p>
                        Chúng tôi sẵng sàng để đồng hành cùng bạn trong quá trình tuyển chọn
                     </p>
                     <a href="http://go.parttime.vn/create-job-request">Gởi thêm yêu cầu tuyển dụng</a>
                  </div>
                  <p class="landing_hire_form_success_contact for_mobile">
                     <strong>
                     Bạn cần hỗ trợ?
                     </strong>
                     <br>
                     Nếu bạn có bất kỳ câu hỏi gì, vui lòng liên lạc tại:
                     <br>
                     <strong class="big">
                     +938373899
                     </strong>
                     <br>
                     <strong class="big">
                     <a href="mailto:support@parttime.vn">support@parttime.vn</a>
                     </strong>
                  </p>
               </div>
            </div>
         </section>
<?php get_footer(); ?>
