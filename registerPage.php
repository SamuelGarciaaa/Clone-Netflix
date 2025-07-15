<?php $title = 'Register Page'; ?>
<?php require_once('./shared/header.php'); ?>

    <link rel="stylesheet" href="/src/css/registerPage.css">
</head>

<!-- Code begins here. -->

<?php
    if(isset($_REQUEST['cod'])){
        $interruption = true;
    }
?>

<body>
<div class="body-register">
    <!-- Header -->
    <header>
        <div class="container-fluid">
            <div class="logo-container">
                <a href="https://www.netflix.com/br/">
                    <!-- Image logo -->
                    <img src="/src/img/logoNetflix.png" alt="Logo Netflix" class="logo">
                </a>
            </div>
        </div>
    </header>
    
    <!-- Main -->
    <main class="d-flex justify-content-center">
        <!-- Login container -->
        <div class="rounded text-white mb-5 login-container">
            <p class="h1 fw-bold fs-2">Sign Up</p>
    
            <!-- Main form -->
            <form action="/src/controller/registerController.php" method="POST">
                <!-- Email -->
                <div class="mt-4 mb-3">
                    <input type="email" id="email" name="email" class="custom-form
                    <?php 
                        if($interruption){
                            if($_REQUEST['cod'] === 'empty'){
                                echo 'error-form-custom';
                            }
                        }
                    ?>" placeholder="Email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : '' ?>">
                </div>
    
                <!-- If there is an error -->
                <p class="error-p
                <?php
                    if($interruption){
                        if(!$_REQUEST['cod'] === 'empty'){
                            echo '';
                        }
                    }
    
                    else{
                        echo 'invisible';
                    }
                ?>
                "><i class="fa-solid fa-circle-exclamation"></i> Please fill in all fields!</p>
    
                <!-- Password -->
                <div class="mt-2 mb-3">
                    <input type="password" id="password" name="password" class="custom-form 
                    <?php 
                        if($interruption){
                            if($_REQUEST['cod'] === 'empty'){
                                echo 'error-form-custom';
                            }
                        }
                    ?>" placeholder="Password" value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : '' ?>">
                </div>
    
                <!-- If there is an error -->
                <p class="error-p
                <?php
                    if($interruption){
                        if($_REQUEST['cod'] === 'empty'){
                            echo '';
                        }
                    }
    
                    else{
                        echo 'invisible';
                    }
                ?>
                "><i class="fa-solid fa-circle-exclamation"></i> Please fill in all fields!</p>
    
                <!-- Buttons -->
                <div class="mt-2">
                    <input type="submit" value="Sign Up" class="rounded py-2 custom-button-1">
                </div>
    
                <p class="text-center mt-3 custom-p-button">OR</p>
    
                <div class="mt-2 mb-3">
                    <input type="submit" value="Use a Sign-Up Code" class="rounded py-2 custom-button-2">
                </div>
    
                <!-- Other options -->
                <a href="#" class="text-white custom-a-forgot">Forgot password?</a><br>
                
                <div class="checkbox mt-3 mb-3">
                    <input class="custom-checkbox" type="checkbox" id="remember-me-checkbox" name="remember-me-checkbox" value="remember">
                    <label class="label-checkbox" for="remember-me-checkbox">Remember me</label>
                </div>
    
                <p class="custom-p-new">New to Netflix? <a href="#" class="sign-up">Sign up now.</a></p>
    
                <p class="robot-p">This page is protected by Google reCAPTCHA to ensure you're not a bot.</p>
    
                <a href="#">Learn more.</a>
            </form>
        </div>
    </main>
    
    <!-- Footer -->
    <footer>
        <div class="container-fluid div-footer">
            <div class="container links-footer">
                <div class="row">
                    <p>Questions? Call <a class="tel-link" href="tel:5508005913517">0800 591 3517</a> (Toll-Free)</p>
    
                    <!-- Footer links -->
                    <div class="col">
                        <a href="#" class="links">FAQ</a>
                        <br><br>
                        <a href="#" class="links">Cookie Preferences</a>
                    </div>
    
                    <div class="col">
                        <a href="#" class="links">Help Center</a>
                        <br><br>
                        <a href="#" class="links">Corporate Information</a>
                    </div>
    
                    <div class="col">
                        <a href="#" class="links">Terms of Use</a>
                    </div>
    
                    <div class="col">
                        <a href="#" class="links">Privacy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>

<!-- Code ends here. -->

<?php require_once('./shared/footer.php'); ?>
