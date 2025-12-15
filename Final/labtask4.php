<!DOCTYPE html>
<html>
<head><title>PHP Code</title></head>
 
<body>
    <h1>Labtask3</h1>
 
    <?php
    $name = "";
    $nameerror = "";
    $email = "";
    $emailerror = "";
    $day=$month=$year="";
    $doberror = "";
    $gendererror = "";
    $hobbyerror = "";
    $degreeerror = "";
    $bloodgrouperror = "";
 
    if (empty ($_POST["name"]))
{
$nameerror="Name is req"; 
}
else{
$name= test_input($_POST["name"]); 
if (!preg_match("/^[a-zA-Z ]*$/",$name))  
{
    $nameerror ="Only letters and white space allowed";
}
}
 
if (empty($_POST["email"]))
{
    $emailerror="Email is req";
}
else{
    $email=test_input($_POST["email"]);
    if (!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $emailerror="Invalid email format";
    }
}
 
if (empty($_POST["day"]) || empty($_POST["month"]) || empty($_POST["year"]))
{
    $doberror="Date of birth is req";
}
else{
    $day=test_input($_POST["day"]);
    $month=test_input($_POST["month"]);
    $year=test_input($_POST["year"]);
}
if (empty($_POST["gender"]))
{
    $gendererror="Gender is req";
}
else{
    $gender = test_input($_POST["gender"]);
    if ($gender != "Male" && $gender != "   Female" && $gender != "Other")
    {
        $gendererror = "Invalid gender selection";
    }
}
 
if (empty($_POST["hobby"]))
{
    $hobbyerror="Hobby is req";
}
else{
    $hobby=test_input($_POST["hobby"]);
}
 
if (empty($_POST["degree"]))
{
    $degreeerror="Degree is req";
}
else{
    $degree=test_input($_POST["degree"]);
}
 
if (empty($_POST["bloodgroup"]))
{
    $bloodgrouperror="Blood group is req";
}
else{
    $bloodgroup=test_input($_POST["bloodgroup"]);
}
function test_input($data) {
    $data = trim($data);
    return $data;
  }
 
    ?>