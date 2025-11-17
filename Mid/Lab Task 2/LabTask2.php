<!DOCTYPE html>
<html>
    <head>
        <title>Participate Registration</title>
        <style>
            body{
                font-family: Arial, sans-serif;
                background-color: #f0f8ff;
                padding: 30px;
            }
            h2{
                text-align: center;
                color: #003366;
            }
            form, .box{
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                width: 350px;
                margin: 0 auto;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;               
            }

            input, button{
                width: 100%;
                padding: 8px;
                margin: 10px;
                border-radius: 5px;
                border: 1px solid #ccc;
            }

            button{
                background-color: #003366;
                color: white;
                cursor: pointer;
            }

            button:hover{
                background-color: #0055aa;
            }

            #success{
                margin-top: 20px;
                text-align: center;
                font-size: 16px;
                color: green;
            }

            #error{
                margin-top: 20px;
                text-align: center;
                font-size: 16px;
                color: red;
            }

            .activity-item{
                background: #eef4ff;
                padding: 8px;
                margin-top: 8px;
                border-radius: 5px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .remove-btn {
                background-color: red;
                border: none;
                color: white;
                padding: 5px 8px;
                border-radius: 5px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <h2>Participate Registration</h2>

        <form onsubmit="return registerUser()">
            <label>Full Name:</label>
            <input type="text" id="fullname"/>

            <label>Email:</label>
            <input type="email" id="email"/>

            <label>Phone Number:</label>
            <input type="text" id="phone"/>

            <label>Password:</label>
            <input type="password" id="password"/>

            <label>Confirm Password:</label>
            <input type="password" id="confirmPassword"/>

            <button type="submit">Register</button>
        </form>

        <div id="success"></div>
        <div id="error"></div>

        <h2>Activity selection</h2>

        <div class="box">
            <label>Activity Name:</label>
            <input type="text" id="activityName"/>

            <button onclick="addActivity()">Add Activity</button>

            <div id="activityList"></div>
        </div>

        <script>
            function registerUser(){
                var name = document.getElementById('fullname').value.trim();
                var email = document.getElementById('email').value.trim();
                var phone = document.getElementById('phone').value.trim();
                var pass = document.getElementById('password').value;
                var confirm = document.getElementById('confirmPassword').value;

                var errorDiv = document.getElementById('error');
                var successDiv = document.getElementById('success');

                errorDiv.innerHTML = '';
                successDiv.innerHTML = '';

                if(name === '' || email === '' || phone === '' || pass === '' || confirm === ''){
                    errorDiv.innerHTML = 'Please fill in all fields.';
                    return false;
                }

                if(!email.includes('@')){
                    errorDiv.innerHTML = 'Please enter a valid email address.';
                    return false;
                }

                if(!/^[0-9]+$/.test(phone)){
                    errorDiv.innerHTML = 'Phone number must contain digits only.';
                    return false;
                }

                if(pass !== confirm){
                    errorDiv.innerHTML = 'Passwords do not match.';
                    return false;
                }

                successDiv.innerHTML = `<strong>'Registration successful!';</strong><br><br>
                Name:${name}<br>
                Email:${email}<br>
                Phone:${phone}`;
                return false;
            }    
            function addActivity(){
                var activityName = document.getElementById('activityName').value.trim();
                if(activityName === '')return;
                
                var list = document.getElementById("activityList");

                var div = document.createElement("div");
                div.className = "activity-item";

                div.innerHTML = `${activity}<button class="remove-btn" onclick="this.parentElement.remove()">Remove</button>`;
                list.appendChild(div);

                document.getElementById('activityName').value = "";
            }
        </script>
    </body>
</html>