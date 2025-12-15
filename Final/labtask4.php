<!DOCTYPE html>
<html>
    <head>
        <title>PHP Code</title>
    </head>
    <body>
        <h1>Lab Task 3</h1>

        <?php
            $name = "";
            $nameerror = "";
            $email = "";
            $emailerror = "";
            $day=$month=$year="";
            $doberror="";
            $genderror = "";
            $hobbyerror = "";
            $degreeerror = "";
            $bloodgrouperror = "";

            if(empty($_POST["name"])) {
                $nameerror = "Name is required";
            } else {
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                    $nameerror = "Only letters and white space allowed";
                }
            }

            if(empty($_POST["email"])) {
                $emailerror = "Email is required";
            } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailerror = "Invalid email format";
                }
            }
            
            if(empty($_POST["day"])||empty($_POST["month"])||empty($_POST["year"])) {
                $doberror = "Date of Birth is required";
            } else {
                $day = test_input($_POST["day"]);d
                $month = test_input($_POST["month"]);
                $year = test_input($_POST["year"]);
            }

            if(empty($_POST["gender"])) {
                $genderror = "Gender is required";
            } else {
                $gender = test_input($_POST["gender"]); 
            }
            
    
    
    
    
    
    
    
    
    
    </body>