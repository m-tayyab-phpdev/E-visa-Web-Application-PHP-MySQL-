<?php
include 'format.php';

if (isset($_POST['btn-step3'])) {

    $application_id = $_SESSION['APP_ID'];
    extract($_POST);
    $challan = rand(100000, 9999999);
    $sql = "UPDATE `applicant_info` SET `country` = '$country', `mission` = '$mission', `entry_port` = '$entry', `departure_port` = '$departure', `arrival_date` = '$a_date', `departure_date` = '$d_date', `challan` = '$challan' WHERE `app_id` = '$application_id'";
    $run = mysqli_query($con, $sql);
    if ($run) {
        echo "<script>window.location.replace('finalapplication.php');</script>";
    }
}


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="container">

                <div style="margin-top: 20px; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center; position: relative; width: 100%;">
                    <a href="visainfo.php" style="text-decoration: none;"><div style="width: 150px; height: 40px; border-radius: 20px; background-color: #007bff; color: #fff; text-align: center; line-height: 40px; z-index: 2;">Visa Info</div></a>
                    <div style="flex-grow: 1; height: 5px; background-color: #007bff; margin: 0 10px;"></div>
                    <a href="personalinfo.php" style="text-decoration: none;"><div style="width: 150px; height: 40px; border-radius: 20px; background-color: #007bff; color: #fff; text-align: center; line-height: 40px; z-index: 2;">Personal Info</div></a>
                    <div style="flex-grow: 1; height: 5px; background-color: #007bff; margin: 0 10px;"></div>
                    <a href="travelinfo.php" style="text-decoration: none;"><div style="width: 150px; height: 40px; border-radius: 20px; background-color: #007bff; color: #fff; text-align: center; line-height: 40px; z-index: 2;">Travel & Interview</div></a>
                    <div style="flex-grow: 1; height: 5px; background-color: #d3d3d3; margin: 0 10px;"></div>
                    <a href="finalapplication.php" style="text-decoration: none;"><div style="width: 150px; height: 40px; border-radius: 20px; background-color: #d3d3d3; color: #fff; text-align: center; line-height: 40px; z-index: 2;">Review Application</div></a>
                </div>




                <h2 style="font-family: 'Times New Roman', Times, serif; font-size: 28px; color: #343a40; text-align: center; margin-bottom: 10px;">Interview & Travel Info</h2>

                <div class="form-section" style="background-color: #ffffff; padding: 25px; border-radius: 8px; border: 1px solid #ced4da; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">


                    <form action="" method="post">
                        <div class="row mb-3">
                            <div class="textbar" style="background-color: #f8f9fa; padding: 8px 12px; border-radius: 5px; margin-bottom: 15px;">
                                <p style="font-weight: bold; font-family: 'Times New Roman', Times, serif; color: #495057;">Where would you like to be interviewed? if required.</p>
                            </div>
                            <div class="col-md-6">
                                <label for="visaCategory" class="form-label" style="font-weight: 600; margin-bottom: 5px;">Country <span class="mandatory" style="color: red;">*</span></label>
                                <select class="form-select" id="visaCategory" required name="country" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
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
                                <label for="visaSubCategory" class="form-label" style="font-weight: 600; margin-bottom: 5px;">Mission <span class="mandatory" style="color: red;">*</span></label>
                                <select class="form-select" id="visaSubCategory" required name="mission" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                                    <option value="">Select</option>
                                    <option value="Tourism">Tourism</option>
                                    <option value="Business">Business</option>
                                    <option value="Employment">Employment</option>
                                    <option value="Education">Education</option>
                                    <option value="Family Visit">Family Visit</option>
                                    <option value="Medical Treatment">Medical Treatment</option>
                                    <option value="Religious Activities">Religious Activities</option>
                                    <option value="Diplomatic Mission">Diplomatic Mission</option>
                                    <option value="Journalism">Journalism</option>
                                    <option value="Cultural Exchange">Cultural Exchange</option>
                                    <option value="Investment">Investment</option>
                                    <option value="Permanent Residence">Permanent Residence</option>
                                    <option value="Asylum/Refugee">Asylum/Refugee</option>
                                    <option value="Retirement">Retirement</option>
                                    <option value="Marriage">Marriage</option>
                                    <option value="Accompanying Family">Accompanying Family</option>
                                    <option value="Sports Participation">Sports Participation</option>
                                    <option value="Film Production">Film Production</option>
                                    <option value="Missionary Work">Missionary Work</option>
                                    <option value="Transit">Transit</option>
                                </select>
                            </div>
                        </div>
                        <div class="textbar" style="background-color: #f8f9fa; padding: 8px 12px; border-radius: 5px; margin-bottom: 15px;">
                            <p style="font-weight: bold; font-family: 'Times New Roman', Times, serif; color: #495057;">What will be your port of entry and departure?</p>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="applicationType" class="form-label" style="font-weight: 600; margin-bottom: 5px;">Entry Port <span class="mandatory" style="color: red;">*</span></label>
                                <select class="form-select" id="applicationType" required name="entry" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                                    <option value="">Select</option>
                                    <optgroup label="Airports">
                                        <option value="Alama Iqbal International Airport Lahore">Alama Iqbal International Airport Lahore</option>
                                        <option value="Los Angeles International Airport (LAX)">Los Angeles International Airport (LAX)</option>
                                        <option value="John F. Kennedy International Airport (JFK)">John F. Kennedy International Airport (JFK)</option>
                                        <option value="Heathrow Airport (LHR)">Heathrow Airport (LHR)</option>
                                        <option value="Charles de Gaulle Airport (CDG)">Charles de Gaulle Airport (CDG)</option>
                                        <option value="Dubai International Airport (DXB)">Dubai International Airport (DXB)</option>
                                        <option value="Changi Airport (SIN)">Changi Airport (SIN)</option>
                                        <option value="Tokyo Haneda Airport (HND)">Tokyo Haneda Airport (HND)</option>
                                        <option value="Hong Kong International Airport (HKG)">Hong Kong International Airport (HKG)</option>
                                        <option value="Sydney Kingsford Smith Airport (SYD)">Sydney Kingsford Smith Airport (SYD)</option>
                                        <option value="Toronto Pearson International Airport (YYZ)">Toronto Pearson International Airport (YYZ)</option>
                                        <option value="Frankfurt Airport (FRA)">Frankfurt Airport (FRA)</option>
                                        <option value="Amsterdam Schiphol Airport (AMS)">Amsterdam Schiphol Airport (AMS)</option>
                                        <option value="Beijing Capital International Airport (PEK)">Beijing Capital International Airport (PEK)</option>
                                        <option value="Mumbai Chhatrapati Shivaji Maharaj International Airport (BOM)">Mumbai Chhatrapati Shivaji Maharaj International Airport (BOM)</option>
                                    </optgroup>


                                    <optgroup label="Seaports">
                                        <option value="Port of New York and New Jersey">Port of New York and New Jersey</option>
                                        <option value="Port of Los Angeles">Port of Los Angeles</option>
                                        <option value="Port of Miami">Port of Miami</option>
                                        <option value="Port of Rotterdam">Port of Rotterdam</option>
                                        <option value="Port of Hamburg">Port of Hamburg</option>
                                        <option value="Port of Singapore">Port of Singapore</option>
                                        <option value="Port of Shanghai">Port of Shanghai</option>
                                        <option value="Port of Hong Kong">Port of Hong Kong</option>
                                        <option value="Port of Dubai (Jebel Ali)">Port of Dubai (Jebel Ali)</option>
                                        <option value="Port of Sydney">Port of Sydney</option>
                                    </optgroup>


                                    <optgroup label="Land Border Crossings">
                                        <option value="San Ysidro Port of Entry (USA-Mexico)">San Ysidro Port of Entry (USA-Mexico)</option>
                                        <option value="Niagara Falls Rainbow Bridge (USA-Canada)">Niagara Falls Rainbow Bridge (USA-Canada)</option>
                                        <option value="Ambassador Bridge (USA-Canada)">Ambassador Bridge (USA-Canada)</option>
                                        <option value="Poipet Border Crossing (Thailand-Cambodia)">Poipet Border Crossing (Thailand-Cambodia)</option>
                                        <option value="Aranyaprathet Border Crossing (Thailand-Cambodia)">Aranyaprathet Border Crossing (Thailand-Cambodia)</option>
                                        <option value="Torkham Border Crossing (Pakistan-Afghanistan)">Torkham Border Crossing (Pakistan-Afghanistan)</option>
                                        <option value="Wagah Border Crossing (India-Pakistan)">Wagah Border Crossing (India-Pakistan)</option>
                                        <option value="Friendship Bridge (Laos-Thailand)">Friendship Bridge (Laos-Thailand)</option>
                                        <option value="Hatta Border Crossing (UAE-Oman)">Hatta Border Crossing (UAE-Oman)</option>
                                        <option value="Zaragoza International Bridge (USA-Mexico)">Zaragoza International Bridge (USA-Mexico)</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Departure Port <span class="mandatory" style="color: red;">*</span></label>
                                <select class="form-select" id="applicationType" required name="departure" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                                    <option value="">Select</option>
                                    <optgroup label="Airports">
                                        <option value="Alama Iqbal International Airport Lahore">Alama Iqbal International Airport Lahore</option>
                                        <option value="Los Angeles International Airport (LAX)">Los Angeles International Airport (LAX)</option>
                                        <option value="John F. Kennedy International Airport (JFK)">John F. Kennedy International Airport (JFK)</option>
                                        <option value="Heathrow Airport (LHR)">Heathrow Airport (LHR)</option>
                                        <option value="Charles de Gaulle Airport (CDG)">Charles de Gaulle Airport (CDG)</option>
                                        <option value="Dubai International Airport (DXB)">Dubai International Airport (DXB)</option>
                                        <option value="Changi Airport (SIN)">Changi Airport (SIN)</option>
                                        <option value="Tokyo Haneda Airport (HND)">Tokyo Haneda Airport (HND)</option>
                                        <option value="Hong Kong International Airport (HKG)">Hong Kong International Airport (HKG)</option>
                                        <option value="Sydney Kingsford Smith Airport (SYD)">Sydney Kingsford Smith Airport (SYD)</option>
                                        <option value="Toronto Pearson International Airport (YYZ)">Toronto Pearson International Airport (YYZ)</option>
                                        <option value="Frankfurt Airport (FRA)">Frankfurt Airport (FRA)</option>
                                        <option value="Amsterdam Schiphol Airport (AMS)">Amsterdam Schiphol Airport (AMS)</option>
                                        <option value="Beijing Capital International Airport (PEK)">Beijing Capital International Airport (PEK)</option>
                                        <option value="Mumbai Chhatrapati Shivaji Maharaj International Airport (BOM)">Mumbai Chhatrapati Shivaji Maharaj International Airport (BOM)</option>
                                    </optgroup>


                                    <optgroup label="Seaports">
                                        <option value="Port of New York and New Jersey">Port of New York and New Jersey</option>
                                        <option value="Port of Los Angeles">Port of Los Angeles</option>
                                        <option value="Port of Miami">Port of Miami</option>
                                        <option value="Port of Rotterdam">Port of Rotterdam</option>
                                        <option value="Port of Hamburg">Port of Hamburg</option>
                                        <option value="Port of Singapore">Port of Singapore</option>
                                        <option value="Port of Shanghai">Port of Shanghai</option>
                                        <option value="Port of Hong Kong">Port of Hong Kong</option>
                                        <option value="Port of Dubai (Jebel Ali)">Port of Dubai (Jebel Ali)</option>
                                        <option value="Port of Sydney">Port of Sydney</option>
                                    </optgroup>


                                    <optgroup label="Land Border Crossings">
                                        <option value="San Ysidro Port of Entry (USA-Mexico)">San Ysidro Port of Entry (USA-Mexico)</option>
                                        <option value="Niagara Falls Rainbow Bridge (USA-Canada)">Niagara Falls Rainbow Bridge (USA-Canada)</option>
                                        <option value="Ambassador Bridge (USA-Canada)">Ambassador Bridge (USA-Canada)</option>
                                        <option value="Poipet Border Crossing (Thailand-Cambodia)">Poipet Border Crossing (Thailand-Cambodia)</option>
                                        <option value="Aranyaprathet Border Crossing (Thailand-Cambodia)">Aranyaprathet Border Crossing (Thailand-Cambodia)</option>
                                        <option value="Torkham Border Crossing (Pakistan-Afghanistan)">Torkham Border Crossing (Pakistan-Afghanistan)</option>
                                        <option value="Wagah Border Crossing (India-Pakistan)">Wagah Border Crossing (India-Pakistan)</option>
                                        <option value="Friendship Bridge (Laos-Thailand)">Friendship Bridge (Laos-Thailand)</option>
                                        <option value="Hatta Border Crossing (UAE-Oman)">Hatta Border Crossing (UAE-Oman)</option>
                                        <option value="Zaragoza International Bridge (USA-Mexico)">Zaragoza International Bridge (USA-Mexico)</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="textbar" style="background-color: #f8f9fa; padding: 8px 12px; border-radius: 5px; margin-bottom: 15px;">
                            <p style="font-weight: bold; font-family: 'Times New Roman', Times, serif; color: #495057;">Provide your planned dates of travel to Paksitan. This does not means your visa will only be valid for these dates.</p>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Arrival Date </label>
                                <input type="date" class="form-control" id="refPassportNo" name="a_date" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                            </div>


                            <div class="col-md-6">
                                <label for="refPassportNo" class="form-label" style="font-weight: 600; margin-bottom: 5px;">Departure Date </label>
                                <input type="date" class="form-control" id="refPassportNo" name="d_date" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                            </div>
                        </div>


                        <!-- Additional form sections -->

                        <button type="submit" class="btn btn-primary form-control" name="btn-step3" style="background-color: #0d6efd; border-color: #0d6efd; padding: 12px; font-weight: bold; border-radius: 4px; transition: background-color 0.3s ease;">
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