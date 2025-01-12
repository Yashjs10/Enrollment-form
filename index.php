<?php
$insert = false;
if (isset($_POST["name"])) {
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password, "entry");
    if (!$con) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $dob = $_POST['dob'];
    $sgpa = $_POST['sgpa'];

    $sql = "INSERT INTO `student` (`name`, `age`, `gender`, `email`, `phone`, `dob`, `sgpa`, `desc`, `dt`) 
        VALUES ('$name', '$age', '$gender', '$email', '$phone', '$dob', '$sgpa', '$desc', current_timestamp());";


    if ($con->query($sql) === true) {
        $insert = true;
    } else {
        echo "<p style='color:red;'>There was an error submitting your form. Error: " . $con->error . "</p>";
    }

    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Enrollment Form</title>
    <link rel="shortcut icon" href="http://localhost/yash/bg.jpg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="bg.jpg" alt="STONE-GEN">
    <div class="container">
        <h3 >Welcome to STONE-GEN Enrollment Form</h3>
        <p>Enter your details to confirm your participation in the enrollment</p>
        <?php
            if ($insert == true) {
                echo "<p class='submitmsg'>Thanks for submitting your form. We are happy to see you joining for STONE-GEN.</p>";
            }
        ?>
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <input type="text" name="age" id="age" placeholder="Enter your age" required>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender" required>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <input type="text" name="phone" id="phone" placeholder="Enter your phone number" required>
            <input type="date" name="dob" id="dob" placeholder="Enter your date of birth" required>
            <input type="text" name="sgpa" id="sgpa" placeholder="Enter your last semester SGPA" required>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Why you want join this community?" ></textarea>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>
