<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="./style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['email'])) {
        // removes backslashes
        $fullname = stripslashes($_REQUEST['fullname']);
        //escapes special characters in a string
        $fullname = mysqli_real_escape_string($con, $fullname);

        $prof = stripslashes($_REQUEST['prof']);
        $prof = mysqli_real_escape_string($con, $prof);

        $gender = stripslashes($_REQUEST['gender']);
        $gender = mysqli_real_escape_string($con, $gender);

        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);

        $number = stripslashes($_REQUEST['number']);
        $number = mysqli_real_escape_string($con, $number);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        $re_password = stripslashes($_REQUEST['re_password']);
        $re_password = mysqli_real_escape_string($con, $re_password);
       
        
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `registration` (fullname, prof, gender, email, number,password, re_password,  create_datetime)
                     VALUES ('$fullname', '$prof' ,'$gender' ,'$email', '$number' , '" . md5($password) . "','" . md5($re_password) . "','$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='./login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='./registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="fullname" placeholder="Full name" required />
        <input type="enum" class="login-input" name="prof" placeholder="Profession">
        <input type="enum" class="login-input" name="gender" placeholder="Gender">

        <input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
value="male">Male
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="other") echo "checked";?>
value="other">Other

        <input type="int" class="login-input" name="number" placeholder="Phone number">
        <input type="text" class="login-input" name="email" placeholder="Email">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="password" class="login-input" name="re_password" placeholder="Confirm Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="./login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>