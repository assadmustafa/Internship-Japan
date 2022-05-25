<?php

/** @var PDO $db */

require '../connection.php';

session_start();

if(intval($_SESSION['user_id']) == 0){
    header('../login.php');
}

$message = '';
$error = '';

if (isset ($_POST['name'])
    && isset($_POST['street_address'])
    && isset($_POST['postal_code'])
    && isset($_POST['city'])
    && isset($_POST['countryid'])
    && isset($_POST['profiletext'])
    && isset($_POST['position'])
    && isset($_POST['positiontext'])
    && isset($_POST['video'])
    && isset($_POST['logo'])
    && isset($_POST['contactpersoon'])
    && isset($_POST['email_contactpersoon'])
    && isset($_POST['website'])) {
    $name = $_POST['name'];
    $street_address = $_POST['street_address'];
    $postal_code = $_POST['postal_code'];
    $city = $_POST['city'];
    $countryid = $_POST['countryid'];
    $profiletext = $_POST['profiletext'];
    $position = $_POST['position'];
    $positiontext = $_POST['positiontext'];
    $video = $_POST['video'];
    $logo = $_POST['logo'];
    $contactpersoon = $_POST['contactpersoon'];
    $email_contactpersoon = $_POST['email_contactpersoon'];
    $website = $_POST['website'];

    $user_data =
        'name=' . $name
        . '&street_address=' . $street_address
        . '&postal_code=' . $postal_code
        . '&city=' . $city
        . '&countryid=' . $countryid
        . '&profiletext=' . $profiletext
        . '&position=' . $position
        . '&positiontext=' . $positiontext
        . '&video=' . $video
        . '&logo=' . $logo
        . '&contactpersoon=' . $contactpersoon
        . '&email_contactpersoon=' . $email_contactpersoon
        . '&website=' . $website;

    if (empty($name)) {
        header("Location: education_home.php?error=Name is required&$user_data");
        exit();
    } else if (empty($street_address)) {
        header("Location: education_home.php?error=Street name is required&$user_data");
        exit();
    } else if (empty($postal_code)) {
        header("Location: education_home.php?error=Postal code is required&$user_data");
        exit();
    } else if (empty($city)) {
        header("Location: education_home.php?error=City name is required&$user_data");
        exit();
    } else if (empty($countryid)) {
        header("Location: education_home.php?error=Country name is required&$user_data");
        exit();
    } else if (empty($profiletext)) {
        header("Location: education_home.php?error=About you field is required&$user_data");
        exit();
    } else if (empty($position)) {
        header("Location: education_home.php?error=Position is required&$user_data");
        exit();
    } else if (empty($positiontext)) {
        header("Location: education_home.php?error=Position text is required&$user_data");
        exit();
    } else if (empty($video)) {
        header("Location: education_home.php?error=Video link is required&$user_data");
        exit();
    } else if (empty($logo)) {
        header("Location: education_home.php?error=Logo link is required&$user_data");
        exit();
    } else if (empty($contactpersoon)) {
        header("Location: education_home.php?error=Contact person's name is required&$user_data");
        exit();
    } else if (!filter_var($email_contactpersoon, FILTER_VALIDATE_EMAIL)) {
        header("Location: education_home.php?error=Contact person's email is required&$user_data");
        exit();
    } else if (empty($website)) {
        header("Location: education_home.php?error=Website link is required&$user_data");
        exit();
    } else {

        $sql = 'INSERT INTO education(user_id,name,street_address,postal_code,city,countryid,profiletext,position,positiontext,video,logo,contactpersoon,email_contactpersoon,website) 
VALUES(:user_id,:name,:street_address,:postal_code,:city,:countryid,:profiletext,:position,:positiontext,:video,:logo,:contactpersoon,:email_contactpersoon,:website)';
        $statement = $db->prepare($sql);
        $last_id = $statement->execute([
            ':name' => $name,
            ':street_address' => $street_address,
            ':postal_code' => $postal_code,
            ':city' => $city,
            ':countryid' => $countryid,
            ':profiletext' => $profiletext,
            ':position' => $position,
            ':positiontext' => $positiontext,
            ':video' => $video,
            ':logo' => $logo,
            ':contactpersoon' => $contactpersoon,
            ':email_contactpersoon' => $email_contactpersoon,
            ':website' => $website,
            ':user_id' => $_SESSION["user_id"]
        ]);
        if (intval($last_id) > 0) {
            $message = 'Education profile completed successfully';
            header("refresh:3;education_profile.php?id=" . $last_id);
        }
    }// end else
}// end big if

?>
<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="wrapper">

    <div class="container">

        <div class="col-lg-12">


            <center><img src="../assets/logo.png" width="100px"><h2>Education | Make Profile</h2>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
                <?php } ?>
            </center>


            <form method="post" class="form-horizontal">

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">Name</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['name'])) { ?>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Enter name"
                                   value="<?php echo $_GET['name']; ?>">
                        <?php }else{ ?>
                            <input type="text"
                                   name="name"
                                   placeholder="Enter name"
                                   class="form-control">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="street_address">Street</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['street_address'])) { ?>
                            <input type="text"
                                   name="street_address"
                                   class="form-control"
                                   placeholder="Enter street name"
                                   value="<?php echo $_GET['street_address']; ?>">
                        <?php }else{ ?>
                            <input type="text"
                                   name="street_address"
                                   placeholder="Enter street name"
                                   class="form-control">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="postal_code">Postal code</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['postal_code'])) { ?>
                            <input type="text"
                                   name="postal_code"
                                   class="form-control"
                                   placeholder="Enter postal code"
                                   value="<?php echo $_GET['postal_code']; ?>">
                        <?php }else{ ?>
                            <input type="text"
                                   name="postal_code"
                                   placeholder="Enter postal code"
                                   class="form-control">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="city">City</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['city'])) { ?>
                            <input type="text"
                                   name="city"
                                   class="form-control"
                                   placeholder="Enter city name"
                                   value="<?php echo $_GET['city']; ?>">
                        <?php }else{ ?>
                            <input type="text"
                                   name="city"
                                   placeholder="Enter city name"
                                   class="form-control">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="countryid">Country</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['countryid'])) { ?>
                            <select id="countryid"
                                    name="countryid"
                                    class="form-control">
                                <option value="">Select Country</option>
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Aland Islands</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarctica</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaijan</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrain</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BY">Belarus</option>
                                <option value="BE">Belgium</option>
                                <option value="BZ">Belize</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermuda</option>
                                <option value="BT">Bhutan</option>
                                <option value="BO">Bolivia</option>
                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                <option value="BA">Bosnia and Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BV">Bouvet Island</option>
                                <option value="BR">Brazil</option>
                                <option value="IO">British Indian Ocean Territory</option>
                                <option value="BN">Brunei Darussalam</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="KH">Cambodia</option>
                                <option value="CM">Cameroon</option>
                                <option value="CA">Canada</option>
                                <option value="CV">Cape Verde</option>
                                <option value="KY">Cayman Islands</option>
                                <option value="CF">Central African Republic</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CX">Christmas Island</option>
                                <option value="CC">Cocos (Keeling) Islands</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoros</option>
                                <option value="CG">Congo</option>
                                <option value="CD">Congo, Democratic Republic of the Congo</option>
                                <option value="CK">Cook Islands</option>
                                <option value="CR">Costa Rica</option>
                                <option value="CI">Cote D'Ivoire</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Curacao</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="DK">Denmark</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="DO">Dominican Republic</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egypt</option>
                                <option value="SV">El Salvador</option>
                                <option value="GQ">Equatorial Guinea</option>
                                <option value="ER">Eritrea</option>
                                <option value="EE">Estonia</option>
                                <option value="ET">Ethiopia</option>
                                <option value="FK">Falkland Islands (Malvinas)</option>
                                <option value="FO">Faroe Islands</option>
                                <option value="FJ">Fiji</option>
                                <option value="FI">Finland</option>
                                <option value="FR">France</option>
                                <option value="GF">French Guiana</option>
                                <option value="PF">French Polynesia</option>
                                <option value="TF">French Southern Territories</option>
                                <option value="GA">Gabon</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="DE">Germany</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GR">Greece</option>
                                <option value="GL">Greenland</option>
                                <option value="GD">Grenada</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GG">Guernsey</option>
                                <option value="GN">Guinea</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Haiti</option>
                                <option value="HM">Heard Island and Mcdonald Islands</option>
                                <option value="VA">Holy See (Vatican City State)</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">Hong Kong</option>
                                <option value="HU">Hungary</option>
                                <option value="IS">Iceland</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">Iran, Islamic Republic of</option>
                                <option value="IQ">Iraq</option>
                                <option value="IE">Ireland</option>
                                <option value="IM">Isle of Man</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italy</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japan</option>
                                <option value="JE">Jersey</option>
                                <option value="JO">Jordan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KE">Kenya</option>
                                <option value="KI">Kiribati</option>
                                <option value="KP">Korea, Democratic People's Republic of</option>
                                <option value="KR">Korea, Republic of</option>
                                <option value="XK">Kosovo</option>
                                <option value="KW">Kuwait</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="LA">Lao People's Democratic Republic</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LS">Lesotho</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libyan Arab Jamahiriya</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MO">Macao</option>
                                <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                                <option value="MG">Madagascar</option>
                                <option value="MW">Malawi</option>
                                <option value="MY">Malaysia</option>
                                <option value="MV">Maldives</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MH">Marshall Islands</option>
                                <option value="MQ">Martinique</option>
                                <option value="MR">Mauritania</option>
                                <option value="MU">Mauritius</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">Mexico</option>
                                <option value="FM">Micronesia, Federated States of</option>
                                <option value="MD">Moldova, Republic of</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="ME">Montenegro</option>
                                <option value="MS">Montserrat</option>
                                <option value="MA">Morocco</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NL">Netherlands</option>
                                <option value="AN">Netherlands Antilles</option>
                                <option value="NC">New Caledonia</option>
                                <option value="NZ">New Zealand</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Niger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NF">Norfolk Island</option>
                                <option value="MP">Northern Mariana Islands</option>
                                <option value="NO">Norway</option>
                                <option value="OM">Oman</option>
                                <option value="PK">Pakistan</option>
                                <option value="PW">Palau</option>
                                <option value="PS">Palestinian Territory, Occupied</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines</option>
                                <option value="PN">Pitcairn</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="RE">Reunion</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russian Federation</option>
                                <option value="RW">Rwanda</option>
                                <option value="BL">Saint Barthelemy</option>
                                <option value="SH">Saint Helena</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="LC">Saint Lucia</option>
                                <option value="MF">Saint Martin</option>
                                <option value="PM">Saint Pierre and Miquelon</option>
                                <option value="VC">Saint Vincent and the Grenadines</option>
                                <option value="WS">Samoa</option>
                                <option value="SM">San Marino</option>
                                <option value="ST">Sao Tome and Principe</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="SN">Senegal</option>
                                <option value="RS">Serbia</option>
                                <option value="CS">Serbia and Montenegro</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapore</option>
                                <option value="SX">Sint Maarten</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SO">Somalia</option>
                                <option value="ZA">South Africa</option>
                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                <option value="SS">South Sudan</option>
                                <option value="ES">Spain</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SD">Sudan</option>
                                <option value="SR">Suriname</option>
                                <option value="SJ">Svalbard and Jan Mayen</option>
                                <option value="SZ">Swaziland</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="SY">Syrian Arab Republic</option>
                                <option value="TW">Taiwan, Province of China</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TZ">Tanzania, United Republic of</option>
                                <option value="TH">Thailand</option>
                                <option value="TL">Timor-Leste</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad and Tobago</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TC">Turks and Caicos Islands</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="GB">United Kingdom</option>
                                <option value="US">United States</option>
                                <option value="UM">United States Minor Outlying Islands</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VE">Venezuela</option>
                                <option value="VN">Viet Nam</option>
                                <option value="VG">Virgin Islands, British</option>
                                <option value="VI">Virgin Islands, U.s.</option>
                                <option value="WF">Wallis and Futuna</option>
                                <option value="EH">Western Sahara</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                            </select>
                        <?php }else{ ?>
                            <select id="countryid"
                                    name="countryid"
                                    class="form-control">
                                <option value="">Select Country</option>
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Aland Islands</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarctica</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaijan</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrain</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BY">Belarus</option>
                                <option value="BE">Belgium</option>
                                <option value="BZ">Belize</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermuda</option>
                                <option value="BT">Bhutan</option>
                                <option value="BO">Bolivia</option>
                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                <option value="BA">Bosnia and Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BV">Bouvet Island</option>
                                <option value="BR">Brazil</option>
                                <option value="IO">British Indian Ocean Territory</option>
                                <option value="BN">Brunei Darussalam</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="KH">Cambodia</option>
                                <option value="CM">Cameroon</option>
                                <option value="CA">Canada</option>
                                <option value="CV">Cape Verde</option>
                                <option value="KY">Cayman Islands</option>
                                <option value="CF">Central African Republic</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CX">Christmas Island</option>
                                <option value="CC">Cocos (Keeling) Islands</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoros</option>
                                <option value="CG">Congo</option>
                                <option value="CD">Congo, Democratic Republic of the Congo</option>
                                <option value="CK">Cook Islands</option>
                                <option value="CR">Costa Rica</option>
                                <option value="CI">Cote D'Ivoire</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Curacao</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="DK">Denmark</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="DO">Dominican Republic</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egypt</option>
                                <option value="SV">El Salvador</option>
                                <option value="GQ">Equatorial Guinea</option>
                                <option value="ER">Eritrea</option>
                                <option value="EE">Estonia</option>
                                <option value="ET">Ethiopia</option>
                                <option value="FK">Falkland Islands (Malvinas)</option>
                                <option value="FO">Faroe Islands</option>
                                <option value="FJ">Fiji</option>
                                <option value="FI">Finland</option>
                                <option value="FR">France</option>
                                <option value="GF">French Guiana</option>
                                <option value="PF">French Polynesia</option>
                                <option value="TF">French Southern Territories</option>
                                <option value="GA">Gabon</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="DE">Germany</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GR">Greece</option>
                                <option value="GL">Greenland</option>
                                <option value="GD">Grenada</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GG">Guernsey</option>
                                <option value="GN">Guinea</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Haiti</option>
                                <option value="HM">Heard Island and Mcdonald Islands</option>
                                <option value="VA">Holy See (Vatican City State)</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">Hong Kong</option>
                                <option value="HU">Hungary</option>
                                <option value="IS">Iceland</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">Iran, Islamic Republic of</option>
                                <option value="IQ">Iraq</option>
                                <option value="IE">Ireland</option>
                                <option value="IM">Isle of Man</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italy</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japan</option>
                                <option value="JE">Jersey</option>
                                <option value="JO">Jordan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KE">Kenya</option>
                                <option value="KI">Kiribati</option>
                                <option value="KP">Korea, Democratic People's Republic of</option>
                                <option value="KR">Korea, Republic of</option>
                                <option value="XK">Kosovo</option>
                                <option value="KW">Kuwait</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="LA">Lao People's Democratic Republic</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LS">Lesotho</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libyan Arab Jamahiriya</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MO">Macao</option>
                                <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                                <option value="MG">Madagascar</option>
                                <option value="MW">Malawi</option>
                                <option value="MY">Malaysia</option>
                                <option value="MV">Maldives</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MH">Marshall Islands</option>
                                <option value="MQ">Martinique</option>
                                <option value="MR">Mauritania</option>
                                <option value="MU">Mauritius</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">Mexico</option>
                                <option value="FM">Micronesia, Federated States of</option>
                                <option value="MD">Moldova, Republic of</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="ME">Montenegro</option>
                                <option value="MS">Montserrat</option>
                                <option value="MA">Morocco</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NL">Netherlands</option>
                                <option value="AN">Netherlands Antilles</option>
                                <option value="NC">New Caledonia</option>
                                <option value="NZ">New Zealand</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Niger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NF">Norfolk Island</option>
                                <option value="MP">Northern Mariana Islands</option>
                                <option value="NO">Norway</option>
                                <option value="OM">Oman</option>
                                <option value="PK">Pakistan</option>
                                <option value="PW">Palau</option>
                                <option value="PS">Palestinian Territory, Occupied</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines</option>
                                <option value="PN">Pitcairn</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="RE">Reunion</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russian Federation</option>
                                <option value="RW">Rwanda</option>
                                <option value="BL">Saint Barthelemy</option>
                                <option value="SH">Saint Helena</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="LC">Saint Lucia</option>
                                <option value="MF">Saint Martin</option>
                                <option value="PM">Saint Pierre and Miquelon</option>
                                <option value="VC">Saint Vincent and the Grenadines</option>
                                <option value="WS">Samoa</option>
                                <option value="SM">San Marino</option>
                                <option value="ST">Sao Tome and Principe</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="SN">Senegal</option>
                                <option value="RS">Serbia</option>
                                <option value="CS">Serbia and Montenegro</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapore</option>
                                <option value="SX">Sint Maarten</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SO">Somalia</option>
                                <option value="ZA">South Africa</option>
                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                <option value="SS">South Sudan</option>
                                <option value="ES">Spain</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SD">Sudan</option>
                                <option value="SR">Suriname</option>
                                <option value="SJ">Svalbard and Jan Mayen</option>
                                <option value="SZ">Swaziland</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="SY">Syrian Arab Republic</option>
                                <option value="TW">Taiwan, Province of China</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TZ">Tanzania, United Republic of</option>
                                <option value="TH">Thailand</option>
                                <option value="TL">Timor-Leste</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad and Tobago</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TC">Turks and Caicos Islands</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="GB">United Kingdom</option>
                                <option value="US">United States</option>
                                <option value="UM">United States Minor Outlying Islands</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VE">Venezuela</option>
                                <option value="VN">Viet Nam</option>
                                <option value="VG">Virgin Islands, British</option>
                                <option value="VI">Virgin Islands, U.s.</option>
                                <option value="WF">Wallis and Futuna</option>
                                <option value="EH">Western Sahara</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                            </select>
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="profiletext">About</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['profiletext'])) { ?>
                            <textarea type="text"
                                      name="profiletext"
                                      class="form-control"
                                      placeholder="About you text"
                                      value="<?php echo $_GET['profiletext']; ?>"></textarea>
                        <?php }else{ ?>
                            <textarea type="text"
                                      name="profiletext"
                                      placeholder="About you text"
                                      class="form-control"></textarea>
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="position">Position</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['position'])) { ?>
                            <input type="text"
                                   name="position"
                                   class="form-control"
                                   placeholder="Enter your position"
                                   value="<?php echo $_GET['position']; ?>">
                        <?php }else{ ?>
                            <input type="text"
                                   name="position"
                                   placeholder="Enter your position"
                                   class="form-control">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="positiontext">Position text</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['position'])) { ?>
                            <textarea value="<?php echo $_GET['positiontext']; ?>" placeholder="Type your position text" id="positiontext" name="positiontext" rows="4" cols="50" class="form-control"></textarea>
                        <?php }else{ ?>
                            <textarea placeholder="Type your position text" id="positiontext" name="positiontext" rows="4" cols="50" class="form-control"></textarea>
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="video">Video</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['video'])) { ?>
                            <input type="text"
                                   name="video"
                                   class="form-control"
                                   placeholder="Enter your video link"
                                   value="<?php echo $_GET['video']; ?>">
                        <?php }else{ ?>
                            <input type="text"
                                   name="video"
                                   placeholder="Enter your video link"
                                   class="form-control">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="logo">Logo</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['logo'])) { ?>
                            <input type="text"
                                   name="logo"
                                   class="form-control"
                                   placeholder="Enter your logo link"
                                   value="<?php echo $_GET['logo']; ?>">
                        <?php }else{ ?>
                            <input type="text"
                                   name="logo"
                                   placeholder="Enter your logo link"
                                   class="form-control">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="contactpersoon">Contact Person</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['contactpersoon'])) { ?>
                            <input type="text"
                                   name="contactpersoon"
                                   class="form-control"
                                   placeholder="Enter contact person's name"
                                   value="<?php echo $_GET['contactpersoon']; ?>">
                        <?php }else{ ?>
                            <input type="text"
                                   name="contactpersoon"
                                   placeholder="Enter contact person's name"
                                   class="form-control">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="email_contactpersoon">Email Contact Person</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['email_contactpersoon'])) { ?>
                            <input type="email"
                                   name="email_contactpersoon"
                                   class="form-control"
                                   placeholder="Enter contact person's email"
                                   value="<?php echo $_GET['email_contactpersoon']; ?>">
                        <?php }else{ ?>
                            <input type="email"
                                   name="email_contactpersoon"
                                   placeholder="Enter contact person's email"
                                   class="form-control">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="website">Website</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['website'])) { ?>
                            <input type="text"
                                   name="website"
                                   class="form-control"
                                   placeholder="Enter website link"
                                   value="<?php echo $_GET['website']; ?>">
                        <?php }else{ ?>
                            <input type="text"
                                   name="website"
                                   placeholder="Enter website"
                                   class="form-control">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                        <input type="submit"  name="complete_profile" class="btn btn-primary " value="Done">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

</div>