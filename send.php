<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    const SENDER_EMAIL_ADDRESS = 'transondinh2000@gmail.com';

    $sex = array('Male', 'Female');
    $purpose = array('Weight', 'Build', 'Health');
    $age = array('18 TO 24', '24 TO 29', '30 TO 39', 'Over 40');
    $invest = array('Yes', 'No');
    $countries = array(
        "AF"=>"Afghanistan",
        "AX"=>"Åland Islands",
        "AL"=>"Albania",
        "DZ"=>"Algeria",
        "AS"=>"American Samoa",
        "AD"=>"Andorra",
        "AO"=>"Angola",
        "AI"=>"Anguilla",
        "AQ"=>"Antarctica",
        "AG"=>"Antigua and Barbuda",
        "AR"=>"Argentina",
        "AM"=>"Armenia",
        "AW"=>"Aruba",
        "AU"=>"Australia",
        "AT"=>"Austria",
        "AZ"=>"Azerbaijan",
        "BS"=>"Bahamas",
        "BH"=>"Bahrain",
        "BD"=>"Bangladesh",
        "BB"=>"Barbados",
        "BY"=>"Belarus",
        "BE"=>"Belgium",
        "BZ"=>"Belize",
        "BJ"=>"Benin",
        "BM"=>"Bermuda",
        "BT"=>"Bhutan",
        "BO"=>"Bolivia",
        "BQ"=>"Bonaire, Sint Eustatius and Saba",
        "BA"=>"Bosnia and Herzegovina",
        "BW"=>"Botswana",
        "BV"=>"Bouvet Island",
        "BR"=>"Brazil",
        "IO"=>"British Indian Ocean Territory",
        "BN"=>"Brunei Darussalam",
        "BG"=>"Bulgaria",
        "BF"=>"Burkina Faso",
        "BI"=>"Burundi",
        "KH"=>"Cambodia",
        "CM"=>"Cameroon",
        "CA"=>"Canada",
        "CV"=>"Cape Verde",
        "KY"=>"Cayman Islands",
        "CF"=>"Central African Republic",
        "TD"=>"Chad",
        "CL"=>"Chile",
        "CN"=>"China",
        "CX"=>"Christmas Island",
        "CC"=>"Cocos (Keeling) Islands",
        "CO"=>"Colombia",
        "KM"=>"Comoros",
        "CG"=>"Congo",
        "CD"=>"Congo, the Democratic Republic of the",
        "CK"=>"Cook Islands",
        "CR"=>"Costa Rica",
        "CI"=>"Cote D'Ivoire",
        "HR"=>"Croatia",
        "CU"=>"Cuba",
        "CW"=>"Curaçao",
        "CY"=>"Cyprus",
        "CZ"=>"Czech Republic",
        "DK"=>"Denmark",
        "DJ"=>"Djibouti",
        "DM"=>"Dominica",
        "DO"=>"Dominican Republic",
        "EC"=>"Ecuador",
        "EG"=>"Egypt",
        "SV"=>"El Salvador",
        "GQ"=>"Equatorial Guinea",
        "ER"=>"Eritrea",
        "EE"=>"Estonia",
        "SZ"=>"Eswatini",
        "ET"=>"Ethiopia",
        "FK"=>"Falkland Islands (Malvinas)",
        "FO"=>"Faroe Islands",
        "FJ"=>"Fiji",
        "FI"=>"Finland",
        "FR"=>"France",
        "GF"=>"French Guiana",
        "PF"=>"French Polynesia",
        "TF"=>"French Southern Territories",
        "GA"=>"Gabon",
        "GM"=>"Gambia",
        "GE"=>"Georgia",
        "DE"=>"Germany",
        "GH"=>"Ghana",
        "GI"=>"Gibraltar",
        "GR"=>"Greece",
        "GL"=>"Greenland",
        "GD"=>"Grenada",
        "GP"=>"Guadeloupe",
        "GU"=>"Guam",
        "GT"=>"Guatemala",
        "GG"=>"Guernsey",
        "GN"=>"Guinea",
        "GW"=>"Guinea-Bissau",
        "GY"=>"Guyana",
        "HT"=>"Haiti",
        "HM"=>"Heard Island and McDonald Islands",
        "VA"=>"Holy See (Vatican City State)",
        "HN"=>"Honduras",
        "HK"=>"Hong Kong",
        "HU"=>"Hungary",
        "IS"=>"Iceland",
        "IN"=>"India",
        "ID"=>"Indonesia",
        "IR"=>"Iran, Islamic Republic of",
        "IQ"=>"Iraq",
        "IE"=>"Ireland",
        "IM"=>"Isle of Man",
        "IL"=>"Israel",
        "IT"=>"Italy",
        "JM"=>"Jamaica",
        "JP"=>"Japan",
        "JE"=>"Jersey",
        "JO"=>"Jordan",
        "KZ"=>"Kazakhstan",
        "KE"=>"Kenya",
        "KI"=>"Kiribati",
        "XK"=>"Kosovo",
        "KW"=>"Kuwait",
        "KG"=>"Kyrgyzstan",
        "LA"=>"Lao People's Democratic Republic",
        "LV"=>"Latvia",
        "LB"=>"Lebanon",
        "LS"=>"Lesotho",
        "LR"=>"Liberia",
        "LY"=>"Libya",
        "LI"=>"Liechtenstein",
        "LT"=>"Lithuania",
        "LU"=>"Luxembourg",
        "MO"=>"Macao",
        "MG"=>"Madagascar",
        "MW"=>"Malawi",
        "MY"=>"Malaysia",
        "MV"=>"Maldives",
        "ML"=>"Mali",
        "MT"=>"Malta",
        "MH"=>"Marshall Islands",
        "MQ"=>"Martinique",
        "MR"=>"Mauritania",
        "MU"=>"Mauritius",
        "YT"=>"Mayotte",
        "MX"=>"Mexico",
        "FM"=>"Micronesia, Federated States of",
        "MD"=>"Moldova, Republic of",
        "MC"=>"Monaco",
        "MN"=>"Mongolia",
        "ME"=>"Montenegro",
        "MS"=>"Montserrat",
        "MA"=>"Morocco",
        "MZ"=>"Mozambique",
        "MM"=>"Myanmar",
        "NA"=>"Namibia",
        "NR"=>"Nauru",
        "NP"=>"Nepal",
        "NL"=>"Netherlands",
        "NC"=>"New Caledonia",
        "NZ"=>"New Zealand",
        "NI"=>"Nicaragua",
        "NE"=>"Niger",
        "NG"=>"Nigeria",
        "NU"=>"Niue",
        "NF"=>"Norfolk Island",
        "KP"=>"North Korea",
        "MK"=>"North Macedonia, Republic of",
        "MP"=>"Northern Mariana Islands",
        "NO"=>"Norway",
        "OM"=>"Oman",
        "PK"=>"Pakistan",
        "PW"=>"Palau",
        "PA"=>"Panama",
        "PG"=>"Papua New Guinea",
        "PY"=>"Paraguay",
        "PE"=>"Peru",
        "PH"=>"Philippines",
        "PN"=>"Pitcairn",
        "PL"=>"Poland",
        "PT"=>"Portugal",
        "PR"=>"Puerto Rico",
        "QA"=>"Qatar",
        "RE"=>"Reunion",
        "RO"=>"Romania",
        "RU"=>"Russian Federation",
        "RW"=>"Rwanda",
        "BL"=>"Saint Barthélemy",
        "SH"=>"Saint Helena",
        "KN"=>"Saint Kitts and Nevis",
        "LC"=>"Saint Lucia",
        "MF"=>"Saint Martin (French part)",
        "PM"=>"Saint Pierre and Miquelon",
        "VC"=>"Saint Vincent and the Grenadines",
        "WS"=>"Samoa",
        "SM"=>"San Marino",
        "ST"=>"Sao Tome and Principe",
        "SA"=>"Saudi Arabia",
        "SN"=>"Senegal",
        "RS"=>"Serbia",
        "SC"=>"Seychelles",
        "SL"=>"Sierra Leone",
        "SG"=>"Singapore",
        "SX"=>"Sint Maarten (Dutch part)",
        "SK"=>"Slovakia",
        "SI"=>"Slovenia",
        "SB"=>"Solomon Islands",
        "SO"=>"Somalia",
        "ZA"=>"South Africa",
        "GS"=>"South Georgia and the South Sandwich Islands",
        "KR"=>"South Korea",
        "SS"=>"South Sudan",
        "ES"=>"Spain",
        "LK"=>"Sri Lanka",
        "PS"=>"State of Palestine",
        "SD"=>"Sudan",
        "SR"=>"Suriname",
        "SJ"=>"Svalbard and Jan Mayen",
        "SE"=>"Sweden",
        "CH"=>"Switzerland",
        "SY"=>"Syrian Arab Republic",
        "TW"=>"Taiwan, Province of China",
        "TJ"=>"Tajikistan",
        "TZ"=>"Tanzania, United Republic of",
        "TH"=>"Thailand",
        "TL"=>"Timor-Leste",
        "TG"=>"Togo",
        "TK"=>"Tokelau",
        "TO"=>"Tonga",
        "TT"=>"Trinidad and Tobago",
        "TN"=>"Tunisia",
        "TR"=>"Turkey",
        "TM"=>"Turkmenistan",
        "TC"=>"Turks and Caicos Islands",
        "TV"=>"Tuvalu",
        "UG"=>"Uganda",
        "UA"=>"Ukraine",
        "AE"=>"United Arab Emirates",
        "GB"=>"United Kingdom",
        "UM"=>"United States Minor Outlying Islands",
        "US"=>"United States of America",
        "UY"=>"Uruguay",
        "UZ"=>"Uzbekistan",
        "VU"=>"Vanuatu",
        "VE"=>"Venezuela",
        "VN"=>"Vietnam",
        "VG"=>"Virgin Islands, British",
        "VI"=>"Virgin Islands, U.S.",
        "WF"=>"Wallis and Futuna",
        "EH"=>"Western Sahara",
        "YE"=>"Yemen",
        "ZM"=>"Zambia",
        "ZW"=>"Zimbabwe"
    );

    // set email subject & body
    $subject = 'This is the contact information';
    $htmlContent = ' 
        <html> 
            <head> 
                <title>Welcome to Coach</title> 
            </head> 
            <body> 
                <h1>Thanks you for joining with us!</h1> 
                <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
                    <tr> 
                        <td style="font: weight 600px;">Purpose</td><td>'.$purpose[$_POST['purpose']].'</td>
                    </tr> 
                    <tr> 
                        <td style="font: weight 600px;">Sex</td><td>'.$sex[$_POST['sex']].'</td>
                    </tr> 
                    <tr> 
                        <td style="font: weight 600px;">Age</td><td>'.$age[$_POST['age']].'</td>
                    </tr> 
                    <tr> 
                        <td style="font: weight 600px;">Goal</td><td>'.$_POST['goal'].'</td>
                    </tr> 
                    <tr> 
                        <td style="font: weight 600px;">Motivation</td><td>'.$_POST['motivation'].'</td>
                    </tr> 
                    <tr> 
                        <td style="font: weight 600px;">Interest</td><td>'.$_POST['interest'].'</td>
                    </tr> 
                    <tr> 
                        <td style="font: weight 600px;">Invest</td><td>'.$invest[$_POST['invest']].'</td>
                    </tr> 
                    <tr> 
                        <td style="font: weight 600px;">Name</td><td>'.$_POST['name'].'</td>
                    </tr> 
                    <tr> 
                        <td style="font: weight 600px;">Phone</td><td>'.$_POST['phone'].'</td>
                    </tr> 
                    <tr> 
                        <td style="font: weight 600px;">Email</td><td>'.$_POST['email'].'</td>
                    </tr> 
                    <tr> 
                        <td style="font: weight 600px;">Country</td><td>'.$countries[$_POST['country']].'</td>
                    </tr> 
                </table> 
            </body> 
        </html>'; 

    // email header
    $header = "From:" . SENDER_EMAIL_ADDRESS;
    $email = "topdeveloper0908@gmail.com";

    // send the email
    sendEmail($email, $subject, $htmlContent, $header);
    
    function sendEmail($email, $subject, $message) {
        // create object of PHPMailer class with boolean parameter which sets/unsets exception.
        $mail = new PHPMailer(true);
        try {

            $mail->isSMTP(); // using SMTP protocol     
            
            $mail->CharSet  = "utf-8";

            $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 

            $mail->SMTPAuth = true;  // enable smtp authentication                             

            $mail->Username = 'transondinh2000@gmail.com';  // sender gmail host              

            $mail->Password = 'hzzllokjjdnreyjf'; // sender gmail host password     

            // $mail->Username = 'mikecreative0908@gmail.com';  // sender gmail host              

            // $mail->Password = 'iukemqztprpfrmhp'; // sender gmail host password   
                    

            $mail->SMTPSecure = 'ssl';  // for encrypted connection                           

            $mail->Port = 465;   // port for SMTP     

            $mail->setFrom('transondinh2000@gmail.com', "Sender"); // sender's email and name

            $mail->addAddress($email, $email);

            $mail->isHTML(true); 

            $mail->Subject =  $subject;

            $mail->Body    = $message;

            $mail->send();

        } catch (Exception $e) { // handle error.
            var_dump($e);
        }

    }


    // When form submitted, insert values into the database.
?>

