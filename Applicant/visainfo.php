<?php
include 'format.php';
$application = $_SESSION['APP_ID'];
if (isset($_POST['btn-step1'])) {
    extract($_POST);
    $status = "pending";
    $visa_status = "pending";
    $query = "UPDATE `applicant_info` SET `visa_category` = '$v_category', `visa_sub-category` = '$v_sub_category', `application_type` = '$app_type', `visa_type` = '$v_type', `applied_for` = '$appliedfor', `passport_no` = '$passport_no', `visit_purpose` = '$visit_purpose', `number_duration` = '$num_duration', `varchar_duration` = '$var_duration', `visa_status` = '$status', `application_status` = '$visa_status' WHERE `app_id` = '$application'";

    $run = mysqli_query($con, $query);

    if ($run) {
        echo "<script>window.location.replace('personalinfo.php');</script>";
    }
}

$sql = mysqli_query($con, "SELECT * FROM `applicant_info` WHERE `app_id` = '$application'");
$row = mysqli_fetch_assoc($sql);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="container">

                <div style="margin-top: 20px; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center; position: relative; width: 100%;">
                    <a href="visainfo.php" style="text-decoration: none;"><div style="width: 150px; height: 40px; border-radius: 20px; background-color: #007bff; color: #fff; text-align: center; line-height: 40px; z-index: 2;">Visa Info</div></a>
                    <div style="flex-grow: 1; height: 5px; background-color: #d3d3d3; margin: 0 10px;"></div>
                    <a href="personalinfo.php" style="text-decoration: none;"><div style="width: 150px; height: 40px; border-radius: 20px; background-color: #d3d3d3; color: #fff; text-align: center; line-height: 40px; z-index: 2;">Personal Info</div></a>
                    <div style="flex-grow: 1; height: 5px; background-color: #d3d3d3; margin: 0 10px;"></div>
                    <a href="travelinfo.php" style="text-decoration: none;"><div style="width: 150px; height: 40px; border-radius: 20px; background-color: #d3d3d3; color: #fff; text-align: center; line-height: 40px; z-index: 2;">Travel & Interview</div></a>
                    <div style="flex-grow: 1; height: 5px; background-color: #d3d3d3; margin: 0 10px;"></div>
                    <a href="finalapplication.php" style="text-decoration: none;"><div style="width: 150px; height: 40px; border-radius: 20px; background-color: #d3d3d3; color: #fff; text-align: center; line-height: 40px; z-index: 2;">Review Application</div></a>
                </div>



                <h2 style="font-family: 'Times New Roman', Times, serif; font-size: 28px; color: #343a40; text-align: center; margin-bottom: 10px;">Visa Information</h2>

                <div class="form-section" style="background-color: #ffffff; padding: 25px; border-radius: 8px; border: 1px solid #ced4da; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <p class="text-danger" style="font-size: 14px; margin-bottom: 10px;">Fields marked with <span class="mandatory" style="color: red;">*</span> are mandatory</p>

                    <form action="" method="post">
                        <div class="row mb-3">
                            <div class="textbar" style="background-color: #f8f9fa; padding: 8px 12px; border-radius: 5px; margin-bottom: 15px;">
                                <p style="font-weight: bold; font-family: 'Times New Roman', Times, serif; color: #495057;">Choose what type of visa you want to apply for. If you are not sure, check the e-visa website.</p>
                            </div>
                            <div class="col-md-6">
                                <label for="visaCategory" class="form-label" style="font-weight: 600; margin-bottom: 5px;">Visa Category <span class="mandatory" style="color: red;">*</span></label>
                                <select class="form-select" id="visaCategory" required name="v_category" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                                    <option value="">Select</option>
                                    <option value="Tourist / Visit Visa">Tourist / Visit Visa</option>
                                    <option value="Visa in Your Inbox">Visa in Your Inbox</option>
                                    <option value="Family Visit Visa">Family Visit Visa</option>
                                    <option value="Business Visa">Business Visa</option>
                                    <option value="Work Visa">Work Visa</option>
                                    <option value="Study Visa">Study Visa</option>
                                    <option value="Religious Tourism">Religious Tourism</option>
                                    <option value="Official Visa">Official Visa</option>
                                    <option value="NGO / INGO">NGO / INGO</option>
                                    <option value="Medical Visa">Medical Visa</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="visaSubCategory" class="form-label" style="font-weight: 600; margin-bottom: 5px;">Visa Sub-category <span class="mandatory" style="color: red;">*</span></label>
                                <select class="form-select" id="visaSubCategory" required name="v_sub_category" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="applicationType" class="form-label" style="font-weight: 600; margin-bottom: 5px;">Application Type <span class="mandatory" style="color: red;">*</span></label>
                                <select class="form-select" id="applicationType" required name="app_type" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                                    <option value="">Select</option>
                                    <option value="First-time">First time</option>
                                    <option value="Extension">Extension</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="visaType" class="form-label" style="font-weight: 600; margin-bottom: 5px;">Visa Type <span class="mandatory" style="color: red;">*</span></label>
                                <select class="form-select" id="visaType" required name="v_type" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                                    <option value="">Select</option>
                                    <option value="single-entry-visa">Single Entry Visa</option>
                                    <option value="multiple-entry-visa">Multiple Entry Visa</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="country" class="form-label" style="font-weight: 600; margin-bottom: 5px;">Applied for <span class="mandatory" style="color: red;">*</span></label>
                                <select class="form-select" id="country" required name="appliedfor" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                                    <option value="">Select</option>
                                    <option value="">Select</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cabo Verde">Cabo Verde</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                                    <option value="Congo, Republic of the">Congo, Republic of the</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Eswatini">Eswatini</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Ivory Coast">Ivory Coast</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea, North">Korea, North</option>
                                    <option value="Korea, South">Korea, South</option>
                                    <option value="Kosovo">Kosovo</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Micronesia">Micronesia</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="North Macedonia">North Macedonia</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia">Saint Lucia</option>
                                    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Sudan">South Sudan</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Timor-Leste">Timor-Leste</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City">Vatican City</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="refPassportNo" class="form-label" style="font-weight: 600; margin-bottom: 5px;">Ref. Passport No </label>
                                <input type="text" class="form-control" id="refPassportNo" name="passport_no" value="<?php if(isset($row['passport_no'])){$passport = $row['passport_no'];}else{$passport = null;} echo $passport;?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="visitPurpose" class="form-label" style="font-weight: 600; margin-bottom: 5px;">Visit Purpose</label>
                                <input type="text" class="form-control" id="visitPurpose" name="visit_purpose" value="<?php if(isset($row['visit_purpose'])){$visit = $row['visit_purpose'];}else{$visit = null;} echo $visit;?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                            </div>
                            <div class="col-md-6">
                                <label for="visaDuration" class="form-label" style="font-weight: 600; margin-bottom: 5px;">Required Visa Duration <span class="mandatory" style="color: red;">*</span></label>
                                <div class="d-flex">
                                    <input type="number" class="form-control" id="visaDuration" value="<?php if(isset($row['number_duration'])){$number = $row['number_duration'];}else{$number = null;} echo $number;?>" required name="num_duration" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                                    <select class="form-select ms-2" required name="var_duration" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                                        <option value="Months">Month(s)</option>
                                        <option value="Years">Year(s)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Additional form sections -->

                        <button type="submit" class="btn btn-primary form-control" name="btn-step1" style="background-color: #0d6efd; border-color: #0d6efd; padding: 12px; font-weight: bold; border-radius: 4px; transition: background-color 0.3s ease;">
                            Submit and Move to next step
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto" style="background-color: #f8f9fa; padding-top: 16px; padding-bottom: 16px; border-top: 1px solid #eaeaea;">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted" style="font-size: 14px;">Copyright &copy; Virtual University of Pakistan</div>
            </div>
        </div>
    </footer>
</div>



<script>
    const visaOptions = {
        "Tourist / Visit Visa": ["Tourist / Visit"],
        "Visa in Your Inbox": ["Tourist", "Business"],
        "Family Visit Visa": ["No change"],
        "Business Visa": ["No change"],
        "Work Visa": ["Work", "Domestic Aide", "Journalist", "Transport aid"],
        "Study Visa": ["Student", "Deeni Madaris"],
        "Religious Tourism": ["Tabligh", "Missionary", "Pilgrim (Sikh/Hindu/Others)"],
        "Official Visa": ["Official", "Diplomatic"],
        "NGO / INGO": ["No Change"],
        "Medical Visa": ["New"],
        "Other": ["No change"]
    };
    document.getElementById('visaCategory').addEventListener('change', function() {
        const category = this.value;
        const subCategorySelect = document.getElementById('visaSubCategory');

        subCategorySelect.innerHTML = '<option value="">Select</option>';

        if (category && visaOptions[category]) {
            visaOptions[category].forEach(function(subCategory) {
                const option = document.createElement('option');
                option.value = subCategory;
                option.text = subCategory;
                subCategorySelect.appendChild(option);
            });
        }
    });
</script>