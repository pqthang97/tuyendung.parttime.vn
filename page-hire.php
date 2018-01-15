<?php
/*
 Template Name: Hire Page
 */

$wp_session = WP_Session::get_instance();

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
  $wp_session['job_order'] = $job_order;
  $wp_session['job_order_id'] = $id;
  wp_redirect(get_site_url() . '/job-request-detail');
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
                              <option value="accounting">Kế toán</option>
                              <option value="farming">Ngôn nghiệp / Chăn nuôi</option>
                              <option value="apparel-fashion">May mặc &amp; Thời trang</option>
                              <option value="architecture-planning">Kiến trúc &amp; Quy hoạch</option>
                              <option value="arts-crafts">Nghệ thuật</option>
                              <option value="automotive">Xe hơi</option>
                              <option value="banking">Ngân hàng</option>
                              <option value="biotechnology">Công nghệ sinh học</option>
                              <option value="building-materials">Vật liệu xây dựng</option>
                              <option value="chemicals">Hóa chất</option>
                              <option value="civil-engineering">Công trình dân dụng</option>
                              <option value="computer-games">Trò chơi máy tính</option>
                              <option value="computer-hardware">Phần cứng máy tính</option>
                              <option value="computer-software">Phần mềm máy tính</option>
                              <option value="construction">Xây dựng</option>
                              <option value="consumer-electronics">Thiết bị điện tử tiêu dùng</option>
                              <option value="consumer-goods">Hàng tiêu dùng</option>
                              <option value="consumer-services">Dịch vụ tiêu dùng</option>
                              <option value="cosmetics">Hóa mỹ phẩm</option>
                              <option value="design">Thiết kế</option>
                              <option value="e-learning">Học trực tuyến</option>
                              <option value="education-management">Quản lý giáo dục</option>
                              <option value="electrical-electronic-manufacturing">Sản xuất hàng điện/ Điện tử</option>
                              <option value="entertainment">Giải trí</option>
                              <option value="environmental-services">Dịch vụ môi trường</option>
                              <option value="events-services">Sự kiện</option>
                              <option value="financial-services">Dịch vụ tài chính</option>
                              <option value="food-beverages">Dịch vụ ăn uống</option>
                              <option value="food-production">Sản xuất thực phẩm</option>
                              <option value="furniture">Nội thất</option>
                              <option value="hospital-health-care">Y tế &amp; Sức khỏe</option>
                              <option value="hospitality">Nhà hàng &amp; Khách sạn</option>
                              <option value="human-resources">Nhân sự</option>
                              <option value="import-and-export">Xuất nhập khẩu</option>
                              <option value="individual-family-services">Dịch vụ gia đình</option>
                              <option value="industrial-automation">Tự động hóa</option>
                              <option value="information-technology-and-services">Công nghệ thông tin &amp; Dịch vụ</option>
                              <option value="insurance">Bảo hiểm</option>
                              <option value="internet">Internet / Thương mại điện tử</option>
                              <option value="legal-services">Dịch vụ pháp lý</option>
                              <option value="leisure-travel-tourism">Du lịch &amp; Lữ hành</option>
                              <option value="logistics-and-supply-chain">Logistic &amp; Chuỗi cung ứng</option>
                              <option value="luxury-goods-jewelry">Nữ trang &amp; Hàng cao cấp</option>
                              <option value="market-research">Nghiên cứu thị trường</option>
                              <option value="marketing-and-advertising">Quảng cáo &amp; Tiếp thị</option>
                              <option value="music">Âm nhạc</option>
                              <option value="newspapers">Báo chí</option>
                              <option value="nonprofit-organization-management">Tổ chức phi chính phủ</option>
                              <option value="outsourcing-offshoring">Outsourcing / Tổng đài</option>
                              <option value="pharmaceuticals">Dược phẩm</option>
                              <option value="photography">Nhiếp ảnh</option>
                              <option value="public-relations-and-communications">Truyền thông &amp; Quan hệ công chúng</option>
                              <option value="real-estate">Bất động sản</option>
                              <option value="restaurants">Nhà hàng</option>
                              <option value="retail">Bán lẻ</option>
                              <option value="sports">Thể thao</option>
                              <option value="staffing-and-recruiting">Tuyển dụng</option>
                              <option value="supermarkets">Siêu thị</option>
                              <option value="telecommunications">Viễn thông</option>
							  <option value="translation-and-localization">Biên, Phiên dịch</option>
                              <option value="tobacco">Thuốc lá</option>
                              <option value="warehousing-distribution">Kho bãi</option>
                              <option value="health-wellness-and-fitness">Thể hình</option>
                              <option value="wholesale">Bán sĩ</option>
                              <option value="wine-spirits">Rượu</option>
                              <option value="writing-and-editing">Viết &amp; Biên tập</option>
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
                                 <option value="1">1</option>
                                 <option value="Từ 2 đến 5">Từ 2 đến 5</option>
                                 <option value="Trên 5 người">Trên 5 người</option>
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
         <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('hire_enquiry_city')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        //autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCkBoIOFraTb6SXZXkfbcjXD1-5kqNss4&libraries=places&callback=initAutocomplete"
        async defer></script>
        <script>
        var FormView = modulejs.require('ETTFormView');
        new FormView();

      </script>
<?php get_footer(); ?>
