<?php
session_start();
include "db_conn.php";
include "functions.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $error_message = "";
    $success_message = "";

    $username = validate($_POST['username']); 
    $password = validate($_POST['passw']);
    $email = validate($_POST['email']);
    $first_name = validate($_POST['fname']);
    $last_name = validate($_POST['lname']);
    $address = validate($_POST['address']);
    $city = validate($_POST['city']);
    $post_code = validate($_POST['pcode']);
    $phone_number = validate($_POST['phone_number']);

    if (empty($username) || empty($password) || empty($email) || empty($first_name) || empty($last_name) || empty($address) || empty($city) || empty($post_code) || empty($phone_number)){
        $error_message = "All fields are required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_message = "Invalid email format.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        
        //Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (username,password,email,first_name,last_name,address,city,post_code,phone_number) VALUES(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss", $username, $hashed_password, $email, $first_name,$last_name,$address,$city,$post_code,$phone_number);

        //Execute the statement
        if ($stmt->execute()){
            $success_message = "Account created successfully";
        } else {
            $error_message = "Error: ". $stmt->error;
        }
    //Close the statement and connection
    $stmt->close();
    $conn->close();
    }
}
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="mobile.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Sneakerz</title>
</head>
<body>
    <section class="header">
        <nav class="nav-links">
            <input type ="checkbox" id="checkMenu">
            <label for="checkMenu" class="checkMenuBtn">
                <i class='bx bx-menu'></i>
            </label>
            <input type ="checkbox" id="checkCart">
            <label for="checkCart" class="checkCartBtn">
                <a href="cart.php"><i class='bx bx-basket' style='color:#ffffff' ></i></a>
            </label>
            <input type ="checkbox" id="checkUser">
            <label for="checkUser" class="checkUserBtn">
                <a href="profile.php"><i class='bx bx-user' style='color:#ffffff' ></i></a>
            </label>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about-us.php">About</a></li>
                <li><a href="products.php">Shop</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="wishlist.php">Wishlist</a></li> 
            </ul>
            <a href="home.php"><img class="logo" src="assets/Sneakerz Logo.png" alt="Sneakerz Logo"></a>
        </nav>
    </section>
    <main>
            <h1 class="page-header">ACCOUNT DETAILS</h1>
            <form action="account-creation.php" class="signup-form" method="post">
                <?php if (isset($error_message) && !empty($error_message)) { ?>
                    <p class ="error-field"><?php echo $error_message; ?></p>
                <?php }?>

                <?php if (isset($success_message) && !empty($success_message)) { ?>
                    <p class ="success-field"><?php echo $success_message; ?></p>
                <?php }?>
                <div>
                    <label for = "username"><strong>Username:</strong></label>
                    <input type="text" id="username" name ="username"
                    placeholder="Enter Username" value="<?php echo $_SESSION['username'] ?>">

                    <label for = "passw"><strong>Password:</strong></label>
                    <input type="password" id="passw" name ="passw"
                    placeholder="Enter Password" >
                </div>
                <label for ="email"><strong>Email:</strong></label>
                <input type="email" id="email" name ="email"
                placeholder="Enter Email"  value="<?php echo $_SESSION['email'] ?>">

                <label for = "fname"><strong>First name:</strong></label>
                <input type="text" id="fname" name ="fname"
                placeholder="Enter First name"  value="<?php echo $_SESSION['first_name'] ?>">

                <label for = "lname"><strong>Last name:</strong></label>
                <input type="text" id="lname" name ="lname"
                placeholder="Enter Last name"  value="<?php echo $_SESSION['last_name'] ?>">

                <label for="address"><strong>Address:</strong></label>
                <input type="text" id="address" name="address"
                placeholder="Enter Address"  value="<?php echo $_SESSION['address'] ?>">

                <label for="city"><strong>City:</strong></label>
                <input type="text" id="city" name="city"
                placeholder="Enter City"  value="<?php echo $_SESSION['city'] ?>">

                <label for="pcode"><strong>Post Code:</strong></label>
                <input type="text" id="pcode" name="pcode"
                placeholder="Enter Post Code"  value="<?php echo $_SESSION['post_code'] ?>">

                <label for="phone_number"><strong>Phone Number:</strong></label>
                <input type="text" id="phone_number" name="phone_number"
                placeholder="Enter Phone Number" value="<?php echo $_SESSION['phone_number'] ?>">
                
                <p>Already have an account? <a href="login.php">Log in!</a></p>

                <input class="update-button" type="submit" value="Update Details">
            </form>
        <footer class="footer-section">
            <div class="footer-row">
                <div class="footer-left">
                    <div class="footer-logo">
                        <img class="logo" src="assets/Sneakerz Logo Black.png" alt="Sneakerz Logo">
                    </div>
                    <div class="footer-social">
                        <a href="#"><i class='bx bxl-instagram' style='color:#000' ></i></a>
                        <a href="#"><i class='bx bxl-twitter' style='color:#000'></i></a>
                        <a href="#"><i class='bx bxl-pinterest' style='color:#000' ></i></a>
                    </div>
                </div>
                <div class="footer-right">
                    <div>
                        <h3><strong>Contact Us</strong></h3>
                        <div class="details-content">
                            <i class='bx bx-current-location' style='color:#000' ></i>
                            <p>234 Park Lane,
                                TELFORD,    
                                TF19 4SK</p>
                        </div>
                        <div class="details-content">
                            <i class='bx bxs-phone' style='color:#000' ></i>
                            <p>+44-5713-499-208</p>
                        </div>
                        <div class="details-content">
                            <i class='bx bxs-envelope' style='color:#000' ></i>
                            <p>Sneakerzofficial@gmail.com</p>
                        </div>
                    </div>
                    <div>
                       <h3><strong>My Account</strong></h3>
                        <ul>
                            <li><a href="cart.php">View Cart</a></li>
                            <li><a href="wishlist.php">View Wishlist</a></li> 
                            <li><a href="profile.php">Account Settings</a></li>
                        </ul>
                    </div>
                    <div>
                       <h3><strong>Opening times</strong></h3>
                       <p>Mon - Tue: <strong>9:00AM - 9:00PM</strong></p>
                       <p>Wed: <strong>9:00AM - 9:00PM</strong></p>
                       <p>Thu: <strong>9:00AM - 9:00PM</strong></p>
                       <p>Fri: <strong>9:00AM - 9:00PM</strong></p>
                       <p>Sat: <strong>10:00AM - 7:00PM</strong></p>
                       <p>Sun: <strong>11:00AM - 5:00PM</strong></p>
                    </div>
                </div>
            </div>
        </footer>
    </main>
</body>
</html>
<?php
    }else {
        header("Location: login.php");
        exit();
    }
?>