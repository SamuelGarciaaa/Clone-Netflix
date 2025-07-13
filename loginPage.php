<?php require_once('./shared/header.php'); ?>

<!-- Code begins here. -->

<!-- Header -->
<header>
    <div class="container-fluid">
        <div class="logo" style="padding-left: 150px;">
            <a href="https://www.netflix.com/br/">
                <img src="/img/logoNetflix.png" alt="Logo Netflix" style="height: 100px;">
            </a>
        </div>
    </div>
</header>

<!-- Main -->
<main>
    <div style="background-color: rgba(0, 0, 0, 0.65); width: 500px; height: 850px; padding: 60px" class="rounded text-white container mb-5">
        <div class="title">
            <p class="h1 fw-bold" style="font-size: 35px">Sign In</p>
        </div>

        <form action="#" method="POST">
            <div class="form-floating mt-5 mb-3" style="width: 385px">
                <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                <label for="email" class="text-black">Email or mobile number</label>
            </div>

            <div class="form-floating mt-5 mb-3" style="width: 385px">
                <input type="text" id="password" name="password" class="form-control" placeholder="Password">
                <label for="email" class="text-black">Password</label>
            </div>  

            <div class="buttons mt-5">
                <input type="submit" value="Sign In" class="rounded py-2 button">
            </div>

            <p class="text-center mt-3" style="color: gray; font-size: 20px">OR</p>

            <div class="buttons mt-2 mb-3">
                <input type="submit" value="Use a Sign-In Code" class="rounded py-2 button-2">
            </div>

            <a href="#" class="text-white" style="margin-left: 33%">Forgot password?</a>

            <div class="form-check mt-3 mb-3">
                <input class="form-check-input remember" type="checkbox" id="remember" name="remember" value="remember" checked>
                <label class="form-check-label" for="remember">Remember me</label>
            </div>

            <p class="newtop">New to Netflix? <a href="#" class="signup">Sign up now.</a></p>

            <p class="robot">This page is protected by Google reCAPTCHA to ensure you're not a bot.</p>

            <a href="#">Learn more.</a>
        </form>
    </div>
</main>

<!-- Footer -->
<footer>
    <div class="container-fluid footer">
        <div class="container linksspot">
            <div class="row">
                <p>Questions? Call <a style="color: rgb(192, 192, 192); text-decoration: none;" href="tel:5508005913517">0800 591 3517</a> (Toll-Free)</p>

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

<!-- Code ends here. -->

<?php require_once('./shared/footer.php'); ?>
