<?php
 require_once "connect.php";

//define vaariables and set to empty
$firstnameErr =$approved= $middle_nameErr = $lastnameErr =  $countryErr = $emailErr = $cellphoneErr = $usernameErr  = $passwordErr =
$re_enter_passwordErr = "";
$firstname = $middle_name = $lastname = $country = $email = $cellphone = $username = $pass = $re_enter_pass = "";
$error = ""; $error1 = "";
$email_rr =""; $Cell_rr =""; $U_rr = "";

$approved = 1;
if(isset($_POST["name"])){

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  
    if(empty($_POST["name"])){
      $firstnameErr = "firstname is required";
      $approved = 0;
    }else{
      $firstname = test_input($_POST["name"]);
    }

if(empty($_POST["name2"])){
    $middle_nameErr = "none";
  }else{
    $middle_name = test_input($_POST["name2"]);
  }

 if(empty($_POST["name3"])){
    $lastnameErr = "lastname is required";
    $approved = 0;

  }else{
    $lastname = test_input($_POST["name3"]);
  }
  if(empty($_POST["country"])){
    $countryErr = "country is required";
    $approved = 0;

  }else{
    $country = test_input($_POST["country"]);
  }

  if(empty($_POST["email"])){
    $emailErr = "email is required";
    $approved = 0;

  }else{
    $email = test_input($_POST["email"]);
    //check if email is well formed
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }
  }

  if(empty($_POST["telphone"])){
    $cellphoneErr = "cellphone is required";
  }elseif($cellphone<=9){
   $approved=0;
   $Cell_rr = "phone number must be atleast 10";
  }else{
    $cellphone = test_input($_POST["telphone"]);
  }


 if(empty($_POST["password"])){
    $passwordErr = "password is required";
    $approved = 0;

  }else{
    $pass = test_input($_POST["password"]);
  }
  if(empty($_POST["password2"])){
    $approved = 0;

    $re_enter_passwordErr = "please re_enter your password";
  }else{
    $re_enter_pass = test_input($_POST["password2"]);

    
  if($password === $re_enter_pass){
   

}
else{
    $error = "Password do not match";
    $approved = 0;
}
  }
    
  //Select in the database
  $u = "SELECT username FROM registration WHERE username = '$username'";
  $result = $conn->query($u);
  if(empty($_POST["user"])){
    $usernameErr = "username is required";
    $approved = 0;

  }elseif($result->num_rows>0){
      $approved=0;
      $U_rr = "Username already exist";
    
  }else{
    $username = test_input($_POST["user"]);
  }


   $sql = "SELECT firstname,lastname FROM registration WHERE email = '$email'" ;
   $result = $conn->query($sql);

if($result->num_rows>0){
    $approved = 0;
    $email_rr = "Your email already exist";

}else{ $C = "SELECT firstname,lastname FROM registration WHERE cellphone = '$cellphone' " ;
   $result1 = $conn->query($C);

if($result->num_rows>0){
    $approved = 0;
    $error1 = "Number is already registered";
}
} 
    
    $stmt = $conn->prepare("INSERT INTO registration (firstname,middle_name,lastname,country,email,cellphone,username,passwords,re_enter_pass)
    values(?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssisss",$firstname,$middle_name,$lastname,$country,$email,$cellphone,$username,$pass,$re_enter_pass);
    
    if($approved == 0){
    
    }
    else{
        $stmt->execute();
       echo "registered successfully..";
  
    }

    $stmt->close();
    $conn->close();
} 
     

?>

<?php

$submit_err =$submit_err1 =$submit=  $submit1= "";
if( isset($_FILES["btnFileUpload"])){

$target_dir= "files/Id/"; //specifies the directory where the file is going to be placed

$target_file = $target_dir.basename($_FILES["btnFileUpload"]["name"]);  // specifies the path of uploaded file
$uploadok=1;

$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//check if the file already exits 

if(file_exists($target_file)){
	
	$submit_err="File Already exists.";
	$uploadok=0;
}

//check the size of the file

if($_FILES["btnFileUpload"]["size"]>1737418240){
	
	$submit_err1="sorry your file is too large. upload files that are less then 10MB";
	$uploadok=0;
}
//check the file type and limit it

if($FileType != "jpg" && $FileType != "jpeg" && $FileType != "png" && $FileType != "pdf"){
	$submit1="sorry, only JPG,JPEG,PNG & pdf files are allowed.";
	$uploadok = 0;
}

//check if upload was set to zero by error

if($uploadok==0){
    // , 
$submit="<div class='response'><span class='response_cancel'> &times </span>
		
		<p style='color:green;'><b><span style='color:red;'>Tip</span>: Take picture of your id/passport with  phone or  scan it, then re-submit</b> </p></div>";
        echo "<script type='text/javascript'>alert('Your file is not submitted, error(101) name:".$submit1." $submit_err1 . $submit_err ') </script>";

}
else{
	if (move_uploaded_file($_FILES["btnFileUpload"]["tmp_name"],$target_file)){
		$submit="<div class='response'><span class='response_cancel'> &times </span>
		
		<br><span style='color:green;'>Your file is now uploaded successfully</span>
	</div>";
	}
	else{
		echo "<script type='text/javascript' > alert('Error encoutered while uploading the file please try again later')</script>";
	}

}

}
?>

<Doctype html>
    <html lang="en">
    <head>
    <!-- start meta tags-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sign in and start trading...." />
    <!-- End of meta tags -->
    
    <!-- SITE TITLE -->
    <title>Registration</title>
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta1-dist/bootstrap-5.0.0-beta1-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta1-dist/bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
    
     <!--start of fonts -->
     <link rel="stylesheet" href="fonts/css/all.css">
    <link rel="stylesheet" href="fonts/css/all.min.css">
    <link rel="stylesheet" href="fonts/css/brands.css">
    <link rel="stylesheet" href="fonts/css/brands.min.css">
    <link rel="stylesheet" href="fonts/css/fontawesome.css">
    <link rel="stylesheet" href="fonts/css/regular.css">
    <link rel="stylesheet" href="fonts/css/regular.min.css">
    <link rel="stylesheet" href="fonts/css/solid.css">
    <link rel="stylesheet" href="fonts/css/svg-with-js.css">
    <link rel="stylesheet" href="fonts/css/svg-with-js.min.css">
    <link rel="stylesheet" href="fonts/css/v4-shims.css">
    <link rel="stylesheet" href="fonts/css/v4-shims.min.css">
    <!-- end of fonts -->
    
    <!-- start of links styling-->
    <link rel="stylesheet" href="css/tablet.css">
    <link rel="stylesheet" href="css/desktop.css">
    <link rel="stylesheet" href="css/phone.css">
    <link rel="stylesheet" href="css/smart.css">
    <!--end of link styling-->
    
    <!-- javascript -->
    <script type="text/javascript"> src="bootstrap-5.0.0-beta1-dist/bootstrap-5.0.0-beta1-dist/js/bootstrap.bundle.js"</script>
    <script type="text/javascript"> src="bootstrap-5.0.0-beta1-dist/bootstrap-5.0.0-beta1-dist/js/bootstrap.js"</script>
    <script type="text/javascript"> src="bootstrap-5.0.0-beta1-dist/bootstrap-5.0.0-beta1-dist/js/bootstrap.min.js"</script>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/smart.js"></script>
    <!-- end of javascript -->

    </head>
    <!-- end of header -->

    <!-- start of body -->
    <body class="body_style">
         <?php echo $submit?>
        <div class="bottom_header">
            <!-- start of logo -->
            <div>
                <img src="img/smart.investa.logo2.png"  class="logo_2" alt="logo">
            </div>
            <!-- end of logo -->
            <!-- start of nav -->
            <div class="nav_link2">
                <a href="index.html">Home</a>
            </div>
            <!-- end of nav -->
            <!-- start of form box -->
        </div>
        <div class="icon2">
            <i class="fas fa-lightbulb">All fields with star must be filled</i>
        </div>
        <div class="center_2">
            <form class="box2" action="#" method="post" enctype="multipart/form-data">
                    <div>
                        <div class="box_header">
                            <span class="box_header">Personal Details</span>
                        </div>
                        <div>
                            <label for="name">First Name* </label><br>
                            <input type="text" name="name" id="name" class="box2_style" required>
                            <div class="red-text"><?php  echo $firstnameErr; ?></div>
                        </div>
                        <div>
                            <label for="middlename">Middle Name(optional)</label><br>
                            <input type="text" name="name2" id="middlename" class="box2_style">
                        </div>
                        <div>
                            <label for="surname">Last Name*</label><br>
                            <input type="text" name="name3" id="surname" class="box2_style" required>
                            <div class="red-text"><?php  echo $lastnameErr; ?></div>
                        </div>
                        <div>
                            <label for="country">Country of Residence*</lable><br>
                            <select  class="box2_style" name="country" id="country" required><div class="red-text"><?php  echo $countryErr; ?></div>
                                <option value="">--select your country--</option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Åland Islands">Åland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
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
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote D'ivoire">Cote D'ivoire</option>
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
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Territories">French Southern Territories</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guernsey">Guernsey</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-bissau">Guinea-bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jersey">Jersey</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                <option value="Korea, Republic of">Korea, Republic of</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macao">Macao</option>
                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montenegro">Montenegro</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn">Pitcairn</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russian Federation">Russian Federation</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Helena">Saint Helena</option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
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
                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Timor-leste">Timor-leste</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Viet Nam">Viet Nam</option>
                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                <option value="Western Sahara">Western Sahara</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>
                        <div>
                            <lable for="email">Email* <?php echo $email_rr; ?></lable><br>
                            <input type="email" name="email" id="email"  class="box2_style" required>
                            <div class="red-text"><?php  echo $emailErr; ?></div>
                        </div>
                        <div>
                            <lable for="phone">Cell-phone Number*</lable><br>
                            <input type="tel" name="telphone" placeholder = "eg +2772 000 0000"  id="phone"  class="box2_style" required>
                            <div class="red-text"><?php  echo $Cell_rr; ?></div>
                            <div class="red-text"><?php  echo $cellphoneErr; ?></div>
                        </div>

                    

                    </div>
                    <div >
                        <div class="box_header">
                            <span class="box_header">Account Details</span>
                        </div>
                        <div>
                            <label for="username">Username*</label><br>
                            <input type="user" name="user" id="username"  class="box2_style" required>
                            <div class="red-text"><?php  echo $usernameErr; echo $U_rr;?></div>
                        </div>
                        <div>
                            <lable for="password">Password*</lable><br>
                            <input type="password" name="password" id="pass"  class="box2_style" required>
                            <div class="red-text"><?php  echo $passwordErr; ?></div>
                        </div>
                        <div>
                            <lable for="phone">Re-type Password* </lable><br>
                            <input type="password" name="password2" id="pass2"  class="box2_style" required>
                             
                        </div>
                    </div>
                    <div class="shift_upl">
                        <div class="box_header">
                            <span  class="box_header">Documents Uploads</span>
                        </div>
                            <div>
                                <label for="id/passport">Your ID/passport*</label><br>
                                <input type="file" id="id/passport" name="btnFileUpload" value="Upload" class="fileupload" required>


                            </div>
                            <div>
                                <label for="proof">Proof of Residence(optional)</label><br>
                                <input type="file" id="proof" name="btnFile" value="Upload" class="fileupload">


                            </div>
                        <div class="icon2">
                            <i class="fas fa-lightbulb">Proof of residence can be anything containing your address, E.g: Bank Statement</i>
                        </div>
                        <div>
                            <input type="submit" name="Signin" value="Register" class="reg_btn button">
                        </div>   
                </div>
            </form>
        </div>
        <!-- end of form box -->
    </body>
    <!-- end of body -->
</html> 