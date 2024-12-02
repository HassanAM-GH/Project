
<?php
// Include the database connection
require_once 'jeek_DB.php';

// Fetch products from the database
$sql = "SELECT * FROM Products WHERE status = 'available' LIMIT 6"; // Adjust the query as needed (LIMIT 6 for the first 6 items)
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <!-- Head Section: Contains metadata and external resource links -->
    <head>
        <!-- Sets the character encoding for the document to UTF-8 (standard for web content) -->
        <meta charset="UTF-8">
        <!-- Ensures responsive design for all devices (mobile-first design) -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Title of the webpage, displayed on the browser tab -->
        <title>Home Page</title>
        <!-- Link to Bootstrap CSS for styling and responsive utilities -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Link to Bootstrap Icons for using pre-designed vector icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <script src="js-main/forgot_password.js"></script>

        
        <!-- Styles for Navbar and Footer -->
        <link rel="stylesheet" href="css-main/navbar-footer.css">
        <!-- Styles for Cards -->
        <link rel="stylesheet" href="css-main/cards.css">
        <style>
            /* Placeholder for additional custom styles (inline CSS) */
        </style>
    </head>

    <!-- Body Section -->
<body class="d-flex flex-column min-vh-100">
    <!-- Navbar Section -->
    <header class="bg-primary py-3">
        <!-- Container to center content and provide consistent spacing -->
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo and Store Name Section -->
            <div class="d-flex align-items-center">
                <!-- Logo Image -->
                <img src="imgs/jeek-high-resolution-logo-transparent.png" alt="Jeek Logo" class="me-2" style="height: 100px; width: 120px;">
                <!-- Placeholder for store name -->
                <span class="fs-4 text-white"></span>
            </div>

            <!-- Search Bar -->
            <div class="flex-grow-1 mx-3">
                <form class="d-flex">
                    <!-- Input field for search -->
                    <input 
                        class="form-control me-2" 
                        type="search" 
                        placeholder="Search for items..." 
                        aria-label="Search">
                    <!-- Search button -->
                    <button class="btn btn-outline-light" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>

            <!-- Navigation Menu -->
            <nav class="d-flex align-items-center">
                <!-- Unordered list for navigation links -->
                <ul class="nav me-3">
                    <!-- Individual navigation links -->
                    <li class="nav-item"><a href="HomePage.php" class="nav-link text-white">Home</a></li>
                    <li class="nav-item"><a href="categories.php" class="nav-link text-white">Categories</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link text-white">About</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link text-white">Contact Us</a></li>
                </ul>
                <!-- Login Button -->
                <!-- A button styled with Bootstrap's outline classes, triggers the sign-in modal -->
                <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#signInModal">Login</button>
            </nav>
        </div>
    </header>
    </body>

<!-- Login modal (Pop-up) -->
<div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
    <!-- Modal dialog container -->
    <div class="modal-dialog">
        <!-- Modal content: Contains header, body, and footer -->
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="signInModalLabel">Login or create an account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal body: Contains the login form -->
            <div class="modal-body">
                <!-- Login form starts -->
                <form action="login.php" method="POST">
                    <!-- Username input field -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                        </div>
                    </div>

                    <!-- Password input field -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <!-- Link to Forgot Password modal -->
                        <div class="text-end">
                            <a href="#" class="small text-decoration-none" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot your password?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer text-center">
                <p class="mb-0 w-100">
                    <a href="#" class="text-decoration-none" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerModal">Create new account</a>
                </p>
            </div>
        </div>
    </div>
</div>


<!-- Step 1: Enter Username -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotPasswordModalLabel">Reset your password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="usernameForm">
                    <p class="mb-3">Enter your username to fetch the security question.</p>
                    <div class="mb-3">
                        <label for="forgotPasswordUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="forgotPasswordUsername" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Step 2: Answer Security Question -->
<div class="modal fade" id="securityQuestionModal" tabindex="-1" aria-labelledby="securityQuestionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="securityQuestionModalLabel">Answer Security Question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="securityQuestionForm">
                    <p id="securityQuestionText" class="mb-3"></p>
                    <div class="mb-3">
                        <label for="securityAnswerInput" class="form-label">Answer</label>
                        <input type="text" class="form-control" id="securityAnswerInput" name="security_answer" placeholder="Enter your answer" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Step 3: Enter New Password -->
<div class="modal fade" id="newPasswordModal" tabindex="-1" aria-labelledby="newPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPasswordModalLabel">Set New Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="newPasswordForm">
                    <p class="mb-4">Enter a new password for your account.</p>
                    <!-- New password input field -->
                    <div class="mb-3">
                        <label for="newPasswordInput" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="newPasswordInput" name="new_password" placeholder="Enter your new password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Register modal (Pop-up) -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!-- Registration form -->
                <form action="register.php" method="POST">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control" id="firstName" name="first_name" required placeholder="Enter your first name">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control" id="lastName" name="last_name" required placeholder="Enter your last name">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                            <input type="text" class="form-control" id="username" name="username" required placeholder="Choose a username">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email address">
                        </div>
                    </div>
                    
                    <div class="mb-3">
    <label for="phoneNumber" class="form-label">Phone Number</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
        <input 
            type="tel" 
            class="form-control" 
            id="phoneNumber" 
            name="phone_number" 
            minlength="10" 
            required 
            placeholder="Enter your phone number">
    </div>
</div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" id="confirmPassword" name="confirm_password" required placeholder="Re-enter your password">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="securityQuestion" class="form-label">Security Question</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-question-circle"></i></span>
                            <select class="form-select" id="securityQuestion" name="security_question" required>
                                <option value="">Select a question</option>
                                <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                                <option value="What was the name of your first pet?">What was the name of your first pet?</option>
                                <option value="What was the name of your elementary school?">What was the name of your elementary school?</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="securityAnswer" class="form-label">Answer</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                            <input type="text" class="form-control" id="securityAnswer" name="security_answer" required placeholder="Enter your answer">
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>

            <div class="modal-footer text-center">
                <p class="mb-0 w-100">
                    <a href="#" class="text-decoration-none" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#signInModal">Already have an account? Login</a>
                </p>
            </div>
        </div>
    </div>
</div>







<!-- Main content section -->
<main class="flex-grow-1">
    <!-- Introductory message -->
    <div class="bg-info text-white text-center py-4">
        <!-- Highlighted message for users -->
        <h1 class="fs-5">
            Step into a World of Rarity: Discover Unique Artifacts and Connect with Fellow Collectors!
        </h1>
    </div>



<!-- Categories section -->
 
<section class="container my-5">
    <div class="row text-center">
        <div class="col">
            <a href="art.php" class="icon-link" id="art-link">
                <i class="bi bi-palette display-4 mb-2"></i>
                <p class="fw-normal">Art</p>
            </a>
        </div>
        <div class="col">
            <a href="interiors.php" class="icon-link" id="interiors-link">
                <i class="bi bi-house-door display-4 mb-2"></i>
                <p class="fw-normal">Interiors</p>
            </a>
        </div>
        <div class="col">
            <a href="jewelry.php" class="icon-link" id="jewelry-link">
                <i class="bi bi-gem display-4 mb-2"></i>
                <p class="fw-normal">Jewelry</p>
            </a>
        </div>
        <div class="col">
            <a href="watches.php" class="icon-link" id="watches-link">
                <i class="bi bi-watch display-4 mb-2"></i>
                <p class="fw-normal">Watches</p>
            </a>
        </div>
        <div class="col">
            <a href="coins.php" class="icon-link" id="coins-link">
                <i class="bi bi-coin display-4 mb-2"></i>
                <p class="fw-normal">Coins & Stamps</p>
            </a>
        </div>
        <div class="col">
            <a href="bookss.php" class="icon-link" id="books-link">
                <i class="bi bi-book display-4 mb-2"></i>
                <p class="fw-normal">Books & History</p>
            </a>
        </div>
    </div>
</section>

<!-- Popular items section -->
<section class="container mb-5">
    <h2 class="mb-4 text-center text-primary">Popular Items</h2>
    <div class="row g-4">
        <?php
        // Fetch products with the least quantity from the database
        $sql = "SELECT * FROM Products WHERE status = 'available' ORDER BY quantity ASC LIMIT 6";
        $result = $conn->query($sql);

        // Loop through products and display them in cards
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product_id = $row['product_id']; // Assuming the primary key is product_id
                $name = $row['name'];
                $description = $row['description'];
                $price = $row['price'];
                $image = $row['image'];

                // Link to the product details page with the product ID
                echo "
                <div class='col-md-4'>
                    <a href='logged-product_page.php?id=$product_id' class='card shadow-lg border-0 hover-effect text-decoration-none'>
                        <div class='card-img-overlay text-end p-2'>
                            <span class='badge bg-primary fs-6'>$$price</span>
                        </div>
                        <img src='uploads/$image' class='card-img-top' alt='$name' style='height: 25rem; object-fit: cover; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;'>
                        <div class='card-body text-center'>
                            <h5 class='card-title fw-bold text-primary'>$name</h5>
                        </div>
                    </a>
                </div>
                ";
            }
        } else {
            echo "<p>No products available at the moment.</p>";
        }
        ?>
    </div>
</section>



</main>
  
<!-- Footer Area and adds color -->
<footer class="mt-auto bg-light py-4">
    <!-- Container to structure the footer content -->
    <div class="container">
        <div class="row">
            <!-- Links Section: Provides quick navigation to important pages -->
            <div class="col-md-4 footer-links">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <!-- List of links to key pages -->
                    <li><a href="HomePage.php">Home</a></li>
                    <li><a href="Categories.php">Categories</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
            
            <!-- Middle Section: Highlights specific product categories -->
            <div class="col-md-4 footer-links">
                <h5>Categories</h5>
                <ul class="list-unstyled">
                    <!-- Links to categories offered on the website -->
                    <li><a href="art.php">Art</a></li>
                    <li><a href="interiors.php">Interiors</a></li>
                    <li><a href="jewelry.php">Jewelry</a></li>
                    <li><a href="watches.php">Watches</a></li>
                    <li><a href="coins.php">Coins & Stamps</a></li>
                    <li><a href="bookss.php">Books & History</a></li>
                </ul>
            </div>
            
            <!-- Contact Details Section -->
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                    <!-- Phone numbers -->
                    <li><i class="bi bi-telephone me-2"></i>+966 (0) 55 1234567</li>
                    <li><i class="bi bi-telephone-fill me-2"></i>+966 (0) 0 1234567</li>
                    <!-- Email address with clickable link -->
                    <li><i class="bi bi-envelope me-2"></i><a href="mailto:info@jeek.com" class="text-dark text-decoration-none">info@Jeek.com</a></li>
                    <!-- Website URL with clickable link -->
                    <li><i class="bi bi-globe me-2"></i><a href="https://www.jeek.com" target="_blank" class="text-dark text-decoration-none">www.Jeek.com</a></li>
                </ul>
                
                <!-- Social Media Icons Section -->
                <div class="social-icons mt-3">
                    <!-- Instagram icon linking to Instagram profile -->
                    <a href="https://www.instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
                    <!-- WhatsApp icon linking to WhatsApp -->
                    <a href="https://www.whatsapp.com" target="_blank"><i class="bi bi-whatsapp"></i></a>
                    <!-- Twitter (X) icon linking to Twitter profile -->
                    <a href="https://www.x.com" target="_blank"><i class="bi bi-twitter"></i></a>
                </div>
            </div>
        </div>

        <!-- Footer bottom section with copyright -->
        <div class="text-center mt-3">
            <p>© 2024 Jeek. All Rights Reserved</p>
        </div>
    </div>
</footer>



<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Include the JavaScript for password confirmation -->
<script src="js-main/Confirm-password.js"></script>
