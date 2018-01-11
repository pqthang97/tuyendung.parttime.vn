<?php
/*
 Template Name: Hire Page
 */

$wp_session = WP_Session::get_instance();
if(!isset($wp_session['job_template']) || $wp_session['job_template'] == 0)
  wp_redirect(get_site_url());
if(isset($_POST['commit'])) {
  
  $job_order = $_POST['hire_enquiry'];

  $id = wp_insert_post(array(
    'post_author' => 1,
    'post_title' => $job_order['position_role'],
    'post_content' => $job_order['description'],
    'post_type' => 'job_order',
    'meta_input' => array(
      'job_template_id' => $wp_session['job_template'],
      'job_order_industry' => $job_order['industry'],
      'workplace_address' => $job_order['city'],
      'number_of_vacancies' => $job_order['vacancies'],
      'starting_date' => $job_order['start_date'],
      'contract_type' => $job_order['contract_kind'],
      'working_time' => $job_order['workday'],
      'contact_firstname' => $job_order['contact_person_name'],
      'contact_lastname' => $job_order['contact_person_surname'],
      'contact_email' => $job_order['company_email'],
      'contact_phone' => $job_order['contact_phone'],
      'company_name' => $job_order['company_name'],
      'company_size' => $job_order['current_employees'],
      'annually_total_of_new_hires' => $job_order['new_yearly_hirings'],
      'worked_on_a_temporary_agency' => $job_order['worked_with_temp_agency'],
    )
  ));
  $wp_session['job_order_id'] = $id;
  wp_redirect(get_site_url() . '/hire_second');
  exit;
}
get_header();
?>
<div class="landing_main_wrapper">
         <div class="landing_header for_scrolling for_areas">
            <div class="landing_wrapper">
               <a href="/" class="landing_mobile_menu_icon js_show_mobile_menu"></a>
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
                        Gởi yêu cầu tuyển dụng
                     </h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="landing_tilted_section for_hire_form">
            <div class="landing_tilted_content for_hire_form">
               <div class="landing_wrapper js_landing_selectize">
                  <form  class="new_hire_enquiry" id="new_hire_enquiry" action="" accept-charset="UTF-8" method="post">                     
                     <h2 class="landing_hire_form_heading">
                        Mô tả công việc
                     </h2>
                     <div class="landing_hire_form_inputs">
                        <div class="landing_hire_form_input">
                           <label for="hire_enquiry_position_role">Vị trí *</label>
                           <input tabindex="1" placeholder="Ví dụ: Thông dịch viên" type="text" name="hire_enquiry[position_role]" id="hire_enquiry_position_role" required />
                        </div>
                        <div class="landing_hire_form_input">
                           <label for="hire_enquiry_industry">Lĩnh vực *</label>
                           <select tabindex="2" placeholder="Vui lòng chọn" required name="hire_enquiry[industry]" id="hire_enquiry_industry">
                              <option value="">Vui lòng chọn</option>
                              <option value="accounting">Accounting</option>
                              <option value="farming">Agriculture / Ranching</option>
                              <option value="apparel-fashion">Apparel &amp; Fashion</option>
                              <option value="architecture-planning">Architecture &amp; Planning</option>
                              <option value="arts-crafts">Arts &amp; Crafts</option>
                              <option value="automotive">Automotive</option>
                              <option value="aviation-aerospace">Aviation &amp; Aerospace</option>
                              <option value="banking">Banking</option>
                              <option value="biotechnology">Biotechnology</option>
                              <option value="building-materials">Building Materials</option>
                              <option value="capital-markets">Capital Markets</option>
                              <option value="chemicals">Chemicals</option>
                              <option value="civil-engineering">Civil Engineering</option>
                              <option value="computer-games">Computer Games</option>
                              <option value="computer-hardware">Computer Hardware</option>
                              <option value="computer-software">Computer Software</option>
                              <option value="construction">Construction</option>
                              <option value="consumer-electronics">Consumer Electronics</option>
                              <option value="consumer-goods">Consumer Goods</option>
                              <option value="consumer-services">Consumer Services</option>
                              <option value="cosmetics">Cosmetics</option>
                              <option value="defense-space">Defense &amp; Space</option>
                              <option value="design">Design</option>
                              <option value="e-learning">E-Learning</option>
                              <option value="education-management">Education Management</option>
                              <option value="electrical-electronic-manufacturing">Electrical/Electronic Manufacturing</option>
                              <option value="entertainment">Entertainment</option>
                              <option value="environmental-services">Environmental Services</option>
                              <option value="events-services">Events</option>
                              <option value="facilities-services">Facilities Services</option>
                              <option value="financial-services">Financial Services</option>
                              <option value="food-beverages">Food &amp; Beverage</option>
                              <option value="food-production">Food Production</option>
                              <option value="furniture">Furniture</option>
                              <option value="gambling-casinos">Gambling &amp; Casinos</option>
                              <option value="glass-ceramics-concrete">Glass, Ceramics &amp; Concrete</option>
                              <option value="government-administration">Government &amp; Public Administration</option>
                              <option value="graphic-design">Graphic Design</option>
                              <option value="higher-education">Higher Education</option>
                              <option value="hospital-health-care">Hospital &amp; Health Care</option>
                              <option value="hospitality">Hospitality</option>
                              <option value="human-resources">Human Resources</option>
                              <option value="import-and-export">Import and Export</option>
                              <option value="individual-family-services">Individual &amp; Family Services</option>
                              <option value="industrial-automation">Industrial Automation</option>
                              <option value="information-services">Information Services</option>
                              <option value="information-technology-and-services">Information Technology and Services</option>
                              <option value="insurance">Insurance</option>
                              <option value="international-trade-and-development">International Trade and Development</option>
                              <option value="internet">Internet / E-Commerce</option>
                              <option value="law-practice">Law Practice</option>
                              <option value="legal-services">Legal Services</option>
                              <option value="leisure-travel-tourism">Leisure, Travel &amp; Tourism</option>
                              <option value="logistics-and-supply-chain">Logistics and Supply Chain</option>
                              <option value="luxury-goods-jewelry">Luxury Goods &amp; Jewelry</option>
                              <option value="machinery">Machinery</option>
                              <option value="management-consulting">Management Consulting</option>
                              <option value="maritime">Maritime</option>
                              <option value="market-research">Market Research</option>
                              <option value="marketing-and-advertising">Marketing and Advertising</option>
                              <option value="mechanical-or-industrial-engineering">Mechanical / Industrial Engineering</option>
                              <option value="media-production">Media</option>
                              <option value="medical-devices">Medical Devices</option>
                              <option value="mining-metals">Mining &amp; Metals</option>
                              <option value="motion-pictures-film">Motion Pictures and Film</option>
                              <option value="museums-institutions">Museums and Institutions</option>
                              <option value="music">Music</option>
                              <option value="no-industry">My industry is missing</option>
                              <option value="nanotechnology">Nanotechnology</option>
                              <option value="newspapers">Newspapers</option>
                              <option value="nonprofit-organization-management">Nonprofit Organizations / Social Sector</option>
                              <option value="oil-energy">Oil &amp; Energy</option>
                              <option value="outsourcing-offshoring">Outsourcing / Offshoring / Call Center</option>
                              <option value="packaging-and-containers">Packaging and Containers</option>
                              <option value="paper-forest-products">Paper &amp; Forest Products</option>
                              <option value="pharmaceuticals">Pharmaceuticals</option>
                              <option value="photography">Photography</option>
                              <option value="plastics">Plastics</option>
                              <option value="political-organization">Political Organization</option>
                              <option value="primary-secondary-education">Primary/Secondary Education</option>
                              <option value="professional-training-coaching">Professional Training &amp; Coaching</option>
                              <option value="program-development">Program Development</option>
                              <option value="public-relations-and-communications">Public Relations and Communications</option>
                              <option value="publishing-industry">Publishing Industry</option>
                              <option value="real-estate">Real Estate</option>
                              <option value="renewables-environment">Renewables &amp; Environment</option>
                              <option value="research">Research</option>
                              <option value="restaurants">Restaurants</option>
                              <option value="retail">Retail</option>
                              <option value="security-and-investigations">Security and Investigations</option>
                              <option value="semiconductors">Semiconductors</option>
                              <option value="sports">Sports</option>
                              <option value="staffing-and-recruiting">Staffing and Recruiting</option>
                              <option value="supermarkets">Supermarkets</option>
                              <option value="telecommunications">Telecommunications</option>
                              <option value="textiles">Textiles</option>
                              <option value="think-tanks">Think Tanks</option>
                              <option value="tobacco">Tobacco</option>
                              <option value="translation-and-localization">Translation and Interpretation</option>
                              <option value="transportation-trucking-railroad">Transportation / Trucking / Railroad</option>
                              <option value="utilities">Utilities</option>
                              <option value="venture-capital-private-equity">Venture Capital &amp; Private Equity</option>
                              <option value="veterinary">Veterinary</option>
                              <option value="warehousing-distribution">Warehousing</option>
                              <option value="health-wellness-and-fitness">Wellness &amp; Fitness</option>
                              <option value="wholesale">Wholesale</option>
                              <option value="wine-spirits">Wine and Spirits</option>
                              <option value="writing-and-editing">Writing and Editing</option>
                           </select>
                        </div>
                        <div class="landing_hire_form_input">
                           <label for="hire_enquiry_city">Nơi làm việc *</label>
                           <input tabindex="3" type="text" required placeholder="Nhập địa điểm chính xác trên bản đồ"  name="hire_enquiry[city]" id="hire_enquiry_city" />
                        </div>
                        <div class="landing_hire_form_input">
                           <div class="landing_hire_form_small_input">
                              <label title="N° of vacancies *" for="hire_enquiry_vacancies">Số lượng tuyển *</label>
                              <select class="js_vacancies" data-not-minor="more_than_five_vacancies" required tabindex="4" name="hire_enquiry[vacancies]" id="hire_enquiry_vacancies">
                                 <option value="">Vui lòng chọn</option>
                                 <option value="one_vacancy">1</option>
                                 <option value="between_two_and_five_vacancies">Từ 2 đến 5</option>
                                 <option value="more_than_five_vacancies">Trên 5 người</option>
                              </select>
                           </div>
                           <div class="landing_hire_form_small_input">
                              <label for="hire_enquiry_start_date">Thời gian bắt đầu *</label>
                              <input class="js_date_input" tabindex="5" required placeholder="Ngày tháng" type="text" name="hire_enquiry[start_date]" id="hire_enquiry_start_date" />
                           </div>
                        </div>
                        <div class="landing_hire_form_input">
                           <label for="hire_enquiry_contract_kind">Loại hình hợp đồng *</label>
                           <select tabindex="6" name="hire_enquiry[contract_kind]" required id="hire_enquiry_contract_kind">
                              <option value="">Vui lòng chọn</option>
                              <option value="permanent">Nhân viên hợp đồng</option>
                              <option value="temporary">Làm theo dự án</option>
                              <option value="freelance">Cộng tác viên</option>
                           </select>
                        </div>
                        <div class="landing_hire_form_input">
                           <label for="hire_enquiry_workday">Thời gian làm việc *</label>
                           <select tabindex="7" name="hire_enquiry[workday]" required id="hire_enquiry_workday">
                              <option value="">Vui lòng chọn</option>
                              <option value="full_time_workday">Bán thời gian</option>
                              <option value="part_time_workday">Làm từ xa (Remote)</option>
                           </select>
                        </div>
                        <label class="landing_hire_form_textarea_label" for="hire_enquiry_description">Mô tả công việc <span>(Tùy chọn)</span></label>
                        <textarea class="landing_hire_form_textarea" tabindex="8" placeholder="(Đội ngũ hỗ trợ Parttime.vn sẽ liên lạc để làm rõ hơn nhu cầu tuyển dụng và giúp bạn có tin tuyển dụng đầy đủ thông tin nhất)" name="hire_enquiry[description]" id="hire_enquiry_description">
</textarea>
                        <div class="landing_hire_form_inputs_explanation for_desktop">
                           <h3 class="landing_hire_form_inputs_explanation_list_header">
                              Quy trình hỗ trợ doanh nghiệp
                           </h3>
                           <ul class="landing_hire_form_inputs_explanation_list">
                              <li class="landing_hire_form_inputs_explanation_list_element">
                                 <span class="landing_hire_form_inputs_explanation_list_number">
                                 1
                                 </span>
                                 <h4 class="landing_hire_form_inputs_explanation_list_heading">
                                    Yêu cầu tuyển dụng
                                 </h4>
                                 Bạn gởi yêu cầu theo form mẫu bên cạnh
                              </li>
                              <li class="landing_hire_form_inputs_explanation_list_element">
                                 <span class="landing_hire_form_inputs_explanation_list_number">
                                 2
                                 </span>
                                 <h4 class="landing_hire_form_inputs_explanation_list_heading">
                                    Xác thực thông tin
                                 </h4>
                                 Đội ngũ hỗ trợ liên lạc để xác thực lại thông tin
                              </li>
                              <li class="landing_hire_form_inputs_explanation_list_element">
                                 <span class="landing_hire_form_inputs_explanation_list_number">
                                 3
                                 </span>
                                 <h4 class="landing_hire_form_inputs_explanation_list_heading">
                                    Hiển thị việc làm
                                 </h4>
                                 Tin tuyển dụng hiển thị tại website Parttime.vn
                              </li>
                              <li class="landing_hire_form_inputs_explanation_list_element">
                                 <span class="landing_hire_form_inputs_explanation_list_number">
                                 4
                                 </span>
                                 <h4 class="landing_hire_form_inputs_explanation_list_heading">
                                    Tiếp thị đa kênh
                                 </h4>
                                 Việc làm của bạn sẽ được marketing trên nhiều kênh
                              </li>
                              <li class="landing_hire_form_inputs_explanation_list_element">
                                 <span class="landing_hire_form_inputs_explanation_list_number">
                                 5
                                 </span>
                                 <h4 class="landing_hire_form_inputs_explanation_list_heading">
                                    Nhận hồ sơ ứng tuyển
                                 </h4>
                                 Bạn sẽ nhận được hồ sơ ứng tuyển trực tiếp
                              </li>
                              <li class="landing_hire_form_inputs_explanation_list_element">
                                 <span class="landing_hire_form_inputs_explanation_list_number">
                                 6
                                 </span>
                                 <h4 class="landing_hire_form_inputs_explanation_list_heading">
                                    Chọn lọc & Phỏng vấn
                                 </h4>
                                 Bạn chọn và hẹn phỏng vấn ứng viên trực tiếp
                              </li>
                           </ul>
                        </div>
                     </div>
                     <h2 class="landing_hire_form_heading">
                        Thông tin nhà tuyển dụng
                     </h2>
                     <div class="landing_hire_form_inputs">
                        <div class="landing_hire_form_input">
                           <label for="hire_enquiry_contact_person_name">Họ *</label>
                           <input tabindex="9" type="text" required name="hire_enquiry[contact_person_name]" id="hire_enquiry_contact_person_name" />
                        </div>
                        <div class="landing_hire_form_input">
                           <label for="hire_enquiry_contact_person_surname">Tên người liên lạc *</label>
                           <input tabindex="10" type="text" required name="hire_enquiry[contact_person_surname]" id="hire_enquiry_contact_person_surname" />
                        </div>
                        <div class="landing_hire_form_input">
                           <label for="hire_enquiry_company_email">Địa chỉ email *</label>
                           <input tabindex="11" placeholder="vd. your@company.com" required type="text" name="hire_enquiry[company_email]" id="hire_enquiry_company_email" />
                        </div>
                        <div class="landing_hire_form_input">
                           <label for="hire_enquiry_contact_phone">Số điện thoại *</label>
                           <input tabindex="12" placeholder="vd. 0938 27 36 22" required type="text" name="hire_enquiry[contact_phone]" id="hire_enquiry_contact_phone" />
                        </div>
                        <div class="landing_hire_form_input">
                           <label for="hire_enquiry_company_name">Tên công ty *</label>
                           <input tabindex="13" type="text" required name="hire_enquiry[company_name]" id="hire_enquiry_company_name" />
                        </div>
                        <div class="landing_hire_form_input">
                           <label for="hire_enquiry_current_employees">Quy mô *</label>
                           <select tabindex="14" required name="hire_enquiry[current_employees]" id="hire_enquiry_current_employees">
                              <option value="">Vui lòng chọn</option>
                              <option value="less_than_ten_employees">Dưới 10 nhân viên</option>
                              <option value="between_ten_and_fifty_employees">Từ 10 đến 50 nhân viên</option>
                              <option value="more_than_fifty_employees">Trên 50 nhân viên</option>
                           </select>
                        </div>
                        <div class="landing_hire_form_input">
                           <label for="hire_enquiry_new_yearly_hirings">Số lượng tuyển hằng năm *</label>
                           <select class="js_hirings" required data-not-minor="more_than_ten_hirings" tabindex="15" name="hire_enquiry[new_yearly_hirings]" id="hire_enquiry_new_yearly_hirings">
                              <option value="">Vui lòng chọn</option>
                              <option value="less_than_five_hirings">Ít hơn 5</option>
                              <option value="between_five_and_ten_hirings">Từ khoảng 5 đến 10</option>
                              <option value="more_than_ten_hirings">Hơn 10</option>
                           </select>
                        </div>
                        <div class="landing_hire_form_input">
                           <label title="Worked on a Temporary Agency? *" for="hire_enquiry_worked_with_temp_agency">Sử dụng dịch vụ bên ngoài? *</label>
                           <select tabindex="16" required name="hire_enquiry[worked_with_temp_agency]" id="hire_enquiry_worked_with_temp_agency">
                              <option value="">Vui lòng chọn</option>
                              <option value="true">Có - để hỗ trợ tuyển nhanh hơn</option>
                              <option value="false">Không</option>
                           </select>
                        </div>
                        <div class="landing_hire_form_inputs_explanation for_desktop darker">
                           <p>Để thông tin tuyển dụng thu hút hơn, bạn cần có thông tin rõ ràng về doanh nghiệp của mình, ứng viên sẽ rất quan tâm và tìm hiểu kỹ về nhà tuyển dụng trước khi ứng tuyển.</p>
                           <p>Thông tin liên lạc của bạn sẽ không xuất hiện bên ngoài, chúng tôi chỉ liên lạc để xác thực.</p>
                           <p>Liên lạc với chúng tôi nếu bạn cần hỗ trợ thêm bất cứ điều gì tại:
                              <br>
                              <a href="tel:+84938373899">+84938373899</a>
                              <br>
                              <a href="">support@parttime.vn</a>
                           </p>
                        </div>
                     </div>
                     <input type="submit" name="commit" value="Tiếp tục" class="landing_hire_form_submit js_submit_hire_form" tabindex="17" data-alt-text="Gởi yêu cầu tuyển dụng" data-disable-with="Tiếp tục" />
                     <p class="landing_hire_form_inputs_explanation for_mobile">
						Hãy luôn đảm bảo quyền lợi và hỗ trợ người lao động để họ có điều kiện làm việc tốt nhất.
                     </p>
                  </form>
               </div>
            </div>
         </section>
       
<?php get_footer(); ?>
