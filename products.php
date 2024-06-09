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
        <label for="checkSearch" class="checkSearchBtn">
            <div class="search-wrapper">
                <input type ="text" id="search-bar" placeholder="Search.." name="search">
            </div>
        </label>
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

