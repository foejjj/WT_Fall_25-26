<?php
include "db.php";

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['fullName'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($name) || empty($email) || empty($phone) || empty($password)) {
        $error = "Please fill in all fields.";
    } else {

        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (fullName, email, phone, password)
                VALUES ('$name', '$email', '$phone', '$hashPassword')";

        if ($conn->query($sql) === TRUE) {
            $success = "Registration successful!";
        } else {
            $error = "Database Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Lab 2 – Participant System</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 30px;
      background-color: #f0f8ff;
    }
    h2 {
      text-align: center;
      color: #003366;
    }
    form, .box {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      width: 350px;
      margin: 0 auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      margin-bottom: 20px;
    }
    input, button {
      width: 100%;
      padding: 8px;
      margin-top: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      background-color: #003366;
      color: white;
      cursor: pointer;
    }
    button:hover {
      background-color: #0055aa;
    }
    #success {
      margin-top: 15px;
      text-align: center;
      color: green;
    }
    #error {
      margin-top: 15px;
      text-align: center;
      color: red;
    }
    .activity-item {
      background: #eef4ff;
      padding: 8px;
      margin-top: 8px;
      border-radius: 5px;
      display: flex;
      justify-content: space-between;
    }
    .remove-btn {
      background: red;
      color: white;
      border: none;
      padding: 5px 8px;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>

<body>

<h2>Participant Registration</h2>

<form method="POST" onsubmit="return validateForm()">
  <label>Full Name:</label>
  <input type="text" name="fullName" id="fullName">

  <label>Email:</label>
  <input type="text" name="email" id="email">

  <label>Phone Number:</label>
  <input type="text" name="phone" id="phone">

  <label>Password:</label>
  <input type="password" name="password" id="password">

  <label>Confirm Password:</label>
  <input type="password" id="confirmPassword">

  <button type="submit">Register</button>
</form>

<div id="error"><?php echo $error; ?></div>
<div id="success"><?php echo $success; ?></div>

<h2>Activity Selection</h2>

<div class="box">
  <label>Activity Name:</label>
  <input type="text" id="activityName">
  <button type="button" onclick="addActivity()">Add Activity</button>
  <div id="activityList"></div>
</div>

<script>
function validateForm() {
  let name = document.getElementById("fullName").value.trim();
  let email = document.getElementById("email").value.trim();
  let phone = document.getElementById("phone").value.trim();
  let pass = document.getElementById("password").value;
  let confirm = document.getElementById("confirmPassword").value;

  if (name === "" || email === "" || phone === "" || pass === "" || confirm === "") {
    alert("Please fill in all fields.");
    return false;
  }

  if (!email.includes("@")) {
    alert("Invalid email format.");
    return false;
  }

  if (!/^[0-9]+$/.test(phone)) {
    alert("Phone must contain numbers only.");
    return false;
  }

  if (pass !== confirm) {
    alert("Passwords do not match.");
    return false;
  }

  return true; 
}

function addActivity() {
  let activity = document.getElementById("activityName").value.trim();
  if (activity === "") return;

  let list = document.getElementById("activityList");
  let div = document.createElement("div");
  div.className = "activity-item";
  div.innerHTML = `
    ${activity}
    <button class="remove-btn" onclick="this.parentElement.remove()">Remove</button>
  `;
  list.appendChild(div);
  document.getElementById("activityName").value = "";
}
</script>

</body>
</html>