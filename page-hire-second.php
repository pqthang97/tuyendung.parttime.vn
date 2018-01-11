<?php
/*
 Template Name: Hire Second Page
 */

$wp_session = WP_Session::get_instance();

$HAPI = '7019d438-f263-4c4c-82d4-1d2f770d731e';
if(!isset($wp_session['job_template']) || $wp_session['job_template'] == 0)
  wp_redirect(get_site_url());

if(isset($_POST['commit'])) {
  $job = $_POST['hire_enquiry'];
  update_post_meta( $wp_session['job_order_id'], 'age_range', $job['age_range'] );
  update_post_meta( $wp_session['job_order_id'], 'salary_offered', $job['suggested_salary'] . ' ' . $job['suggested_salary_unit'] );
  update_post_meta( $wp_session['job_order_id'], 'do_you_need_to_interview_the_worker', $job['needs_interview'] );
  update_post_meta( $wp_session['job_order_id'], 'when_are_you_available_for_the_interview', $job['interview_date'] );
  update_post_meta( $wp_session['job_order_id'], 'contract_length', $job['contract_duration'] . ' ' . $job['contract_duration_unit'] );
  update_post_meta( $wp_session['job_order_id'], 'collective_agreement', $job['collective_agreement'] );
  update_post_meta( $wp_session['job_order_id'], 'special_requirements', $job['special_requirements'] );
  
  // $request = array(
  //   'associations' => array(
  //     'associatedCompanyIds' => '650948415',
  //     'associatedVids' => '',
  //   )
  // );

  // $result = wp_remote_post('https://api.hubapi.com/companies/v2/companies?hapikey='.$HAPI, array(
  //   'headers' => array('Accept' => 'application/json', 'Content-Type' => 'application/json'),
  //   'body' => array(
  //     'properties' => array(
  //       'company_name' => $wp_session['job_order']['company_name'],
  //       'company_size' => $wp_session['job_order']['current_employees'],
  //     )
  //   )
  // ));

  // var_dump($result );
  // exit;
  wp_redirect(get_site_url() . '/hire_completed');
  exit;
}

get_header();
?>

<div class="landing_main_wrapper">
         <div class="landing_header for_scrolling for_areas">
            <div class="landing_wrapper">
               <a href="#" class="landing_mobile_menu_icon js_show_mobile_menu"></a>
               <a class="landing_logo" href="/">
               Parttime.vn
               </a>
            </div>
         </div>
         <section class="landing_tilted_section for_hire_form_top ">
            <div class="landing_tilted_content for_hire_form_top">
               <div class="landing_wrapper">
                  <div class="landing_text_block wide">
                     <h1 class="landing_heading">
                        Hoàn thiện thông tin việc làm
                     </h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="landing_tilted_section for_hire_form">
            <div class="landing_tilted_content for_hire_form">
               <div class="landing_wrapper js_landing_selectize">
                  <h2 class="landing_hire_form_heading">
                     Chi tiết việc làm
                  </h2>
                  <form autocomplete="on" class="edit_hire_enquiry" id="edit_hire_enquiry_2711" accept-charset="UTF-8" method="post">
                     <div class="landing_hire_form_inputs">
                        <div class="landing_hire_form_input">
                           <label for="hire_enquiry_age_range">Độ tuổi</label>
                           <select tabindex="1" name="hire_enquiry[age_range]" id="hire_enquiry_age_range" required>
                              <option value="between_18_and_25_years">Từ 18 đến 25 tuổi</option>
                              <option value="between_25_and_35_years">Từ 25 đến 35 tuổi</option>
                              <option value="more_than_35_years">Trên 35 tuổi</option>
                           </select>
                        </div>
                        <div class="landing_hire_form_input">
                           <div class="landing_hire_form_small_input">
                              <label for="hire_enquiry_suggested_salary">Mức lương</label>
                              <input tabindex="2" required placeholder="vd. 3,000,000" type="text" value="" name="hire_enquiry[suggested_salary]" id="hire_enquiry_suggested_salary" />
                           </div>
                           <div class="landing_hire_form_small_input">
                              <label for="hire_enquiry_suggested_salary_unit">&nbsp;</label>
                              <select tabindex="3" required name="hire_enquiry[suggested_salary_unit]" id="hire_enquiry_suggested_salary_unit">
                                 <option value="hour">Giờ</option>
                                 <option value="month">Tuần</option>
                                 <option value="year">Tháng</option>
                              </select>
                           </div>
                        </div>
                        <div class="landing_hire_form_input">
                           <label title="Bạn có muốn phỏng vấn ứng viên?" for="hire_enquiry_needs_interview">Bạn có muốn phỏng vấn ứng viên?</label>
                           <select tabindex="4" required name="hire_enquiry[needs_interview]" id="hire_enquiry_needs_interview">
                              <option value="">Vui lòng chọn</option>
                              <option value="true">Có</option>
                              <option value="false">Không</option>
                           </select>
                        </div>
                        <div class="landing_hire_form_input">
                           <label for="hire_enquiry_interview_date">Thời gian phỏng vấn?</label>
                           <input class="js_date_time_input" required tabindex="5" placeholder="Chọn ngày & Giờ" type="text" value="" name="hire_enquiry[interview_date]" id="hire_enquiry_interview_date" />
                        </div>
                        <div class="landing_hire_form_input">
                           <div class="landing_hire_form_small_input">
                              <label class="overflowing" for="hire_enquiry_contract_duration">Thời hạn hợp đồng</label>
                              <input tabindex="6" required placeholder="vd. 30" type="text" value="" name="hire_enquiry[contract_duration]" id="hire_enquiry_contract_duration" />
                           </div>
                           <div class="landing_hire_form_small_input">
                              <label for="hire_enquiry_contract_duration_unit">&nbsp;</label>
                              <select tabindex="7" required name="hire_enquiry[contract_duration_unit]" id="hire_enquiry_contract_duration_unit">
                                 <option value="hours">Giờ</option>
                                 <option value="weeks">Tuần</option>
                                 <option value="months">Tháng</option>
                              </select>
                           </div>
                        </div>
                        <div class="landing_hire_form_input">
                           <label for="hire_enquiry_collective_agreement">Phụ cấp thêm</label>
                           <input tabindex="8" required placeholder="Vui lòng ghi nếu có" type="text" value="" name="hire_enquiry[collective_agreement]" id="hire_enquiry_collective_agreement" />
                        </div>
                        <label class="landing_hire_form_textarea_label" for="hire_enquiry_special_requirements">Các yêu cầu đặc biệt</label>
                        <textarea class="landing_hire_form_textarea" tabindex="9" placeholder="(vd. Phải có laptop, xe máy, smart phone, hoặc khả năng ngoại ngữ)" name="hire_enquiry[special_requirements]" id="hire_enquiry_special_requirements"></textarea>
                        <div class="landing_hire_form_inputs_explanation for_desktop darker">
                           Cung cấp thông tin chi tiết về việc làm, giúp cho chúng tôi hiểu và
                           tư vấn bạn thêm. Ngoài ra nó còn rất quan trọng để ứng viên tìm hiểu
                           trước khi ứng tuyển vào công ty bạn.
                           <br><br><br>
                           Hãy liên lạc với chúng tôi nếu bạn cần bất kỳ sự trợ giúp.
                           <br>
                           <a href="tel:+84938373899">+84938373899</a>
                           <br>
                           <a href="">support@parttime.vn</a>
                        </div>
                     </div>
                     <input type="submit" name="commit" value="Gởi yêu cầu tuyển dụng" class="landing_hire_form_submit" tabindex="10"/>
                     <p class="landing_hire_form_inputs_explanation for_mobile">
                        Hãy luôn nhớ rằng chúng tôi có sẵn nguồn lực ứng viên chất lượng đáp ứng mọi nhu cầu tuyển dụng của bạn.
                     </p>
                  </form>
               </div>
            </div>
         </section>
<?php get_footer(); ?>