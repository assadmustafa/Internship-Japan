<?php

/** @var PDO $db */

require '../connection.php';

session_start();

if(intval($_SESSION['user_id']) == 0){
    header('../login.php');
}

$message = '';
$error = '';

if (isset ($_POST['email'])
    && isset($_POST['firstname'])
    && isset($_POST['surname'])
    && isset($_POST['street_address'])
    && isset($_POST['postal_code'])
    && isset($_POST['city'])
    && isset($_POST['dateofbirth'])
    && isset($_POST['countryid'])
    && isset($_POST['profiletext'])
    && isset($_POST['study'])
    && isset($_POST['video'])
    && isset($_POST['profileimage'])) {

    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $street_address = $_POST['street_address'];
    $postal_code = $_POST['postal_code'];
    $city = $_POST['city'];
    $dateofbirth = $_POST['dateofbirth'];
    $countryid = $_POST['countryid'];
    $profiletext = $_POST['profiletext'];
    $study = $_POST['study'];
    $video = $_POST['video'];
    $profileimage = $_POST['profileimage'];

    $user_data =
        'email=' . $email
        . '&firstname=' . $firstname
        . '&surname=' . $surname
        . '&countryid=' . $countryid
        . '&city=' . $city
        . '&street_address=' . $street_address
        . '&postal_code=' . $postal_code
        . '&dateofbirth=' . $dateofbirth
        . '&profiletext=' . $profiletext
        . '&study=' . $study
        . '&video=' . $video
        . '&profileimage=' . $profileimage;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: intern_home.php?error=Email is required&$user_data");
        exit();
    }
    else if(empty($firstname)) {
        header("Location: intern_home.php?error=Firstname is required&$user_data");
        exit();
    }
    else if(empty($surname)){
        header("Location: intern_home.php?error=Surname is required&$user_data");
        exit();
    }
    else if(empty($street_address)){
        header("Location: intern_home.php?error=Street name is required&$user_data");
        exit();
    }
    else if(empty($postal_code)){
        header("Location: intern_home.php?error=Postal code is required&$user_data");
        exit();
    }
    else if(empty($city)){
        header("Location: intern_home.php?error=City name is required&$user_data");
        exit();
    }
    else if(empty($dateofbirth)){
        header("Location: intern_home.php?error=Date of birth is required&$user_data");
        exit();
    }
    else if(empty($countryid)){
        header("Location: intern_home.php?error=Country name is required&$user_data");
        exit();
    }
    else if(empty($profiletext)){
        header("Location: intern_home.php?error=About you field is required&$user_data");
        exit();
    }
    else if(empty($study)){
        header("Location: intern_home.php?error=Study field is required&$user_data");
        exit();
    }
    else if(empty($video)){
        header("Location: intern_home.php?error=Video link is required&$user_data");
        exit();
    }
    else if(empty($profileimage)){
        header("Location: intern_home.php?error=Profile image link is required&$user_data");
        exit();
    }

    else
    {
        $sql = 'INSERT INTO intern(user_id,email,firstname, surname,street_address,postal_code,city,dateofbirth,countryid,profiletext,study,video,profileimage) 
                            VALUES(:user_id,:email,:firstname, :surname,:street_address,:postal_code,:city,:dateofbirth,:countryid,:profiletext,:study,:video,:profileimage)';
        $statement = $db->prepare($sql);
        $statement->execute([
            ':email' => $email,
            ':firstname' => $firstname,
            ':surname' => $surname,
            ':street_address' => $street_address,
            ':postal_code' => $postal_code,
            ':city' => $city,
            ':dateofbirth' => $dateofbirth,
            ':countryid' => $countryid,
            ':profiletext' => $profiletext,
            ':study' => $study,
            ':video' => $video,
            ':profileimage' => $profileimage,
            ':user_id' => $_SESSION["user_id"]
        ]);

        // take the user ID from the first registration step (register.php) using sessions
        $last_id = $_SESSION["user_id"];

        if (intval($last_id) > 0) {
            $message = 'Intern profile completed successfully';
            header("refresh:3;intern_profile.php?id=" . $last_id);
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


            <center><img src="../assets/logo.png" width="100px"><h2>Intern | Make Profile</h2>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
                <?php } ?>
            </center>


            <form method="post" class="form-horizontal">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="text" name="email" class="form-control" placeholder="enter email" value="<?php echo $_SESSION['intern_login']; ?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Firstname</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['firstname'])) { ?>
                            <input type="text"
                                   name="firstname"
                                   class="form-control"
                                   placeholder="Enter your first name"
                                   value="<?php echo $_GET['firstname']; ?>">
                        <?php }else{ ?>
                            <input type="text"
                                   name="firstname"
                                   placeholder="Enter your first name"
                                   class="form-control">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Surname</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['surname'])) { ?>
                            <input type="text"
                                   name="surname"
                                   class="form-control"
                                   placeholder="Enter your last name"
                                   value="<?php echo $_GET['surname']; ?>">
                        <?php }else{ ?>
                            <input type="text"
                                   name="surname"
                                   placeholder="Enter your last name"
                                   class="form-control">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Street</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['street_address'])) { ?>
                            <input type="text"
                                   name="street_address"
                                   class="form-control"
                                   placeholder="Enter your street name"
                                   value="<?php echo $_GET['street_address']; ?>">
                        <?php }else{ ?>
                            <input type="text"
                                   name="street_address"
                                   placeholder="Enter your street name"
                                   class="form-control">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Postal Code</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['postal_code'])) { ?>
                            <input type="text"
                                   name="postal_code"
                                   class="form-control"
                                   placeholder="Enter your postal code"
                                   value="<?php echo $_GET['postal_code']; ?>">
                        <?php }else{ ?>
                            <input type="text"
                                   name="postal_code"
                                   placeholder="Enter your postal code"
                                   class="form-control">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">City</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['city'])) { ?>
                            <input type="text"
                                   name="city"
                                   class="form-control"
                                   placeholder="Enter your city name"
                                   value="<?php echo $_GET['city']; ?>">
                        <?php }else{ ?>
                            <input type="text"
                                   name="city"
                                   placeholder="Enter your city"
                                   class="form-control">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Date of birth</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['dateofbirth'])) { ?>
                            <input type="date"
                                   name="dateofbirth"
                                   class="form-control"
                                   placeholder="Enter your date of birth"
                                   value="<?php echo $_GET['dateofbirth']; ?>">
                        <?php }else{ ?>
                            <input type="date"
                                   name="dateofbirth"
                                   placeholder="Enter your date of birth"
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
                                <option value="">select country</option>
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
                    <label class="col-sm-3 control-label">About</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['profiletext'])) { ?>
                            <input type="text"
                                   name="profiletext"
                                   class="form-control"
                                   placeholder="Fill about you text"
                                   value="<?php echo $_GET['profiletext']; ?>">
                        <?php }else{ ?>
                            <input type="text"
                                   name="profiletext"
                                   placeholder="Fill about you text"
                                   class="form-control">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Study</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['study'])) { ?>
                            <input type="text"
                                   name="study"
                                   class="form-control"
                                   placeholder="Enter your study field"
                                   value="<?php echo $_GET['study']; ?>">
                        <?php }else{ ?>
                            <input type="text"
                                   name="study"
                                   placeholder="Enter your study field"
                                   class="form-control">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Video</label>
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
                    <label class="col-sm-3 control-label">Profile Image</label>
                    <div class="col-sm-6">
                        <?php if (isset($_GET['profileimage'])) { ?>
                            <input type="text"
                                   name="profileimage"
                                   class="form-control"
                                   placeholder="Enter your profile image link"
                                   value="<?php echo $_GET['profileimage']; ?>">
                        <?php }else{ ?>
                            <input type="text"
                                   name="profileimage"
                                   placeholder="Enter your profile image link"
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