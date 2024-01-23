<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="  crossorigin="anonymous"></script>
    <script src="./assets/js/custom.js"></script>
    <script>
        function validateForm() {
            var firstName = document.getElementsByName('p_fname')[0].value.trim();
            var lastName = document.getElementsByName('p_lname')[0].value.trim();
            var checkboxes = document.getElementsByName('support_need[]');
            var isChecked = false;

            // Validate First Name and Last Name
            if (firstName === '') {
                alert("Please enter patient first name.");
                return false;
            }

            if ( lastName === '') {
                alert("Please enter patient last name.");
                return false;
            }

            // Validate at least one checkbox
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    isChecked = true;
                    break;
                }
            }

            if (!isChecked) {
                alert("Please select at least one support option.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>

    <?php
    
    if(isset($_POST) && (count($_POST) > 0)){
        // echo "<pre>";
        // print_r($_POST);

        $to = "admin@thekeynursing.com.au";
        //$to = "lemonpstu09@gmail.com";
        $subject = "Referral Form - The Key Nursing Australia";

        $p_fname = (isset($_POST['p_fname'])) ? $_POST['p_fname'] : "";
        $p_lname = (isset($_POST['p_lname'])) ? $_POST['p_lname'] : "";
        $p_contact = (isset($_POST['p_contact'])) ? $_POST['p_contact'] : "";

        $s_fname = (isset($_POST['s_fname'])) ? $_POST['s_fname'] : "";
        $s_lname = (isset($_POST['s_lname'])) ? $_POST['s_lname'] : "";
        $s_p_contact = (isset($_POST['s_p_contact'])) ? $_POST['s_p_contact'] : "";
        $s_p_ndis_dva = (isset($_POST['s_p_ndis_dva'])) ? $_POST['s_p_ndis_dva'] : "";

        $r_fname = (isset($_POST['r_fname'])) ? $_POST['r_fname'] : "";
        $r_fname = (isset($_POST['r_fname'])) ? $_POST['r_fname'] : "";
        $r_contact = (isset($_POST['r_contact'])) ? $_POST['r_contact'] : "";

        $support_need = "";
        if(isset($_POST['support_need']) && count($_POST['support_need']) > 0){
            $support_need = implode(",", $_POST['support_need']);
        }

        $message = "
            <html>
            <head>
            <title>Referral Form - The Key Nursing Australia</title>
            </head>
            <body>
            <h2>Patient Information</h2>
            <p>First Name: ".$p_fname." Last Name: ".$p_lname."</p>
            <p>Contact Number: ".$p_contact."</p><br>

            <h2>Support Person Information</h2>
            <p>First Name: ".$s_fname." Last Name: ".$s_lname."</p>
            <p>Contact Number: ".$s_p_contact."</p><br>
            <p>NDIS/DVA Number: ".$s_p_ndis_dva."</p>

            <h2>Referral Information</h2>
            <p>First Name: ".$r_fname." Last Name: ".$r_fname."</p>
            <p>Contact Number: ".$r_contact."</p><br>

            <h2>Support Needed</h2>
            <p>".$support_need."</p><br>

            </body>
            </html>
        ";

        // Set headers for HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Additional headers
        $headers .= "From: lemonkazi@thekeynursing.com.au";
        //$headers .= "Cc: another_email@example.com\r\n";

        // Send the email
        mail($to, $subject, $message, $headers);

        $successMessage = "";
        if (mail($to, $subject, $message, $headers)) {
            $successMessage = "Thank you! Your referral form has been submitted successfully.";
        }
    }
    ?>

    <div class="header">
        <div class="headerLeft">
            <div class="logo">
                <a href="index.html">
                    <img src="./assets/images/logo.png" alt="Logo">
                </a>
            </div>
            <h1 class="title">The Key Nursing Australia</h1>
        </div>
        <div class="headerRight">
            <ul class="menu">
                <li><a href="index.html">About Us</a></li>
                <li><a href="our_services.html">Our Services</a></li>
                <li><a href="ndsi.html">NDSI</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
            </ul>

            <div class="nav-right">
                <div class="sidebar-button mobile-menu-btn">
                    <span></span>
                </div>
            </div>
        </div>
    </div>

    <div class="pHeadingContactus">
        <div class="items item1">Contact Us</div>
        <div class="items item2">PHONE NUMBER </div>
        <div class="items item3">0425531472 | (02) 9138 3511</div>
    </div>

    <div class="container">
        <div class="contactusContent">
            <form action="" method="post" onsubmit="return validateForm()">
                <div class="contentHeading">Referral Form</div>
                <?php
                if($successMessage != ''){
                    ?>
                    <div class="successMessage"><?php echo $successMessage; ?></div>
                    <?php
                }
                ?>
                <div class="contentInner">
                    <div class="leftBar">
                        <div class="leftBarTop">
                            <h2>Patient Information</h2>
                            <div class="inputSection">
                                <input type="text" name="p_fname" value="<?php $p_fname; ?>" placeholder="First Name" />
                                <input type="text" name="p_lname" value="<?php $p_lname; ?>" placeholder="Last Name" />
                            </div>

                            <div class="inputSection oneColumn lastColumn">
                                <input type="text" name="p_contact" value="<?php $p_contact; ?>" placeholder="Contact Number" />
                            </div>
                        </div>
                        <div class="leftBarMiddle">
                            <h2>Support Person Information</h2>
                            <div class="inputSection">
                                <input type="text" name="s_fname" value="<?php $s_fname; ?>" placeholder="First Name" />
                                <input type="text" name="s_lname" value="<?php $s_lname; ?>" placeholder="Last Name" />
                            </div>

                            <div class="inputSection oneColumn">
                                <input type="text" name="s_p_contact" value="<?php $s_p_contact; ?>" placeholder="Contact Number" />
                            </div>

                            <div class="inputSection oneColumn lastColumn">
                                <input type="text" name="s_p_ndis_dva" value="<?php $s_p_ndis_dva; ?>" placeholder="NDIS/DVA Number" />
                            </div>
                        </div>
                        <div class="leftBarBottom">
                            <h2>Referral Information</h2>
                            <div class="inputSection">
                                <input type="text" name="r_fname" value="<?php $r_fname; ?>" placeholder="First Name" />
                                <input type="text" name="r_lname" value="<?php $r_lname; ?>" placeholder="Last Name" />
                            </div>

                            <div class="inputSection oneColumn lastColumn">
                                <input type="text" name="r_contact" value="<?php $r_contact; ?>" placeholder="Contact Number" />
                            </div>
                        </div>
                    </div>
                    <div class="rightBar">
                        <div class="rightBarContent">
                            <div class="rightBarInner">
                                <h2>Support Needed</h2>
                                <div class="optionInput">
                                    <input type="checkbox" value="Community Nursing Services" name="support_need[]" />
                                    <label>Community Nursing Services</label>
                                </div>

                                <div class="optionInput">
                                    <input type="checkbox" value="Education & Training" name="support_need[]" />
                                    <label>Education & Training</label>
                                </div>

                                <div class="optionInput">
                                    <input type="checkbox" value="Behavioural Support" name="support_need[]" />
                                    <label>Behavioural Support</label>
                                </div>

                                <div class="optionInput">
                                    <input type="checkbox" value="Daily Living Activites" name="support_need[]" />
                                    <label>Daily Living Activites</label>
                                </div>

                                <div class="optionInput twoCol">
                                    <input type="checkbox" value="Social & Community Participation" name="support_need[]" />
                                    <label>Social & Community Participation</label>
                                </div>

                                <div class="optionInput">
                                    <input type="checkbox" value="Other" name="support_need[]" />
                                    <label>Other</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <input class="button" type="submit" name="Submit" value="Submit" />
            </form>
        </div>
    </div>


    <div class="bottomSectionContact">
        <a class="button" href="contact_us.php">CONTACT US NOW</a>
    </div>

    <div class="footer">
        <div class="address">
            <p>Available for service in these areas:</p>
            <p>Sydney West, Hills District, South Western Sydney, Parramatta, Sydney CBD</p>
        </div>
        <div class="phone">0425531472 | (02) 9138 3511</div>
    </div>

</body>
</html>