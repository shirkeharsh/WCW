<?php
include("config.php");

$duplicatePhoneError = false;

if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // Check if the phone number already exists
    $checkPhoneQuery = "SELECT * FROM `contact` WHERE `phone` = '$phone'";
    $result = mysqli_query($conn, $checkPhoneQuery);
    if (mysqli_num_rows($result) > 0) {
        // Duplicate phone number found
        $duplicatePhoneError = true;
    } else {
        // Insert data into the database
        $sql = "INSERT INTO `contact` (`fname`, `lname`, `phone`) 
                VALUES ('$fname', '$lname', '$phone')";

        if (mysqli_query($conn, $sql)) {
            // Show alert on successful form submission
            echo '<script>
                    alert("Thanks for contacting! I\'ll revert soon.");
                    window.location.href = "http://hrshshirke.site/";
                  </script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #111;
            color: #33FF00; /* Green color for terminal style */
            font-family: "Courier New", Courier, monospace;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }
        .container {
            text-align: left;
            width: 500px;
            background-color: #111;
            padding: 30px;
            border: 2px solid #33FF00;
            box-shadow: 0 0 30px rgba(0, 255, 0, 0.3);
            border-radius: 8px;
            animation: fadeIn 1s ease;
        }
        .terminal-header {
            font-size: 32px;
            margin-bottom: 20px;
            text-align: center;
            letter-spacing: 2px;
            color: #33FF00;
            font-weight: bold;
        }
        .terminal-line {
            font-size: 20px;
            color: #33FF00;
            margin: 15px 0;
        }
        .terminal-line span {
            color: #fff;
        }
        textarea {
            background-color: #111;
            color: #33FF00;
            font-family: "Courier New", Courier, monospace;
            font-size: 18px;
            width: 100%;
            height: 50px;
            border: 2px solid #33FF00;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 10px;
            resize: none;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 255, 0, 0.5);
            transition: all 0.3s ease;
        }
        textarea:focus {
            border-color: #00FF00;
            box-shadow: 0 0 10px rgba(0, 255, 0, 1);
        }
        .submit-btn {
            background-color: #111;
            color: #33FF00;
            border: 2px solid #33FF00;
            padding: 12px 20px;
            font-size: 20px;
            width: 100%;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .submit-btn:hover {
            background-color: #33FF00;
            color: #111;
            transform: scale(1.05);
        }
        .alert {
            color: red;
            font-size: 16px;
            margin-top: 10px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animating the terminal cursor */
        .cursor {
            display: inline-block;
            width: 10px;
            height: 30px;
            background-color: #33FF00;
            animation: blink 1s step-end infinite;
            margin-left: 5px;
        }

        @keyframes blink {
            0%, 50% {
                opacity: 1;
            }
            50.1%, 100% {
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="terminal-header">
            <span>$</span> Contact Portal
            <div class="cursor"></div>
        </div>
        <div class="terminal-line">
            <span>&gt;</span> Enter Your First Name
        </div>
        <form action="" method="POST">
            <textarea name="fname" placeholder="First Name..." required></textarea>

            <div class="terminal-line">
                <span>&gt;</span> Enter Your Last Name
            </div>
            <textarea name="lname" placeholder="Last Name..." required></textarea>

            <div class="terminal-line">
                <span>&gt;</span> Enter Your Phone Number
            </div>
            <textarea name="phone" placeholder="Phone Number..." required minlength="10" pattern="[1-9]{1}[0-9]{9}"></textarea>

            <button type="submit" name="submit" class="submit-btn">Submit</button>
        </form>
    </div>

    <?php if ($duplicatePhoneError): ?>
    <div class="alert">
        <p>User already registered. Please contact admin for support.</p>
    </div>
    <?php endif; ?>

</body>
</html>
