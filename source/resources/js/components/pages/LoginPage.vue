<template>
    <div class="wrapper">
        <main class="main-container" role="main">
            <div class="container-container logo-container">
                <twitter-icon class="logo-icon"></twitter-icon>
            </div>
            <div class="container-container login-container">
                <twitter-icon class="login-icon"></twitter-icon>

                <h1 class="login-title">Happening now</h1>

                <h2 class="join-title">Join Twitter today.</h2>

                <div class="sign-up-container">
                    <google-icon class="sign-up-icon"></google-icon>
                    <p class="sign-up-text">Sign up with Google</p>
                </div>

                <div class="sign-up-container">
                    <apple-icon class="sign-up-icon"></apple-icon>
                    <p class="sign-up-text">Sign up with Apple</p>
                </div>

                <div class="centre-line-container">
                    <p class="centre-line"><span>or</span></p>
                </div>

                <div class="sign-up-mail-container" id="sign-up-btn">
                    <p class="sign-up-text">Sign up with phone or email</p>
                </div>

                <div class="sign-up-agreement-container">
                    <p class="sign-up-agreement-text">
                        By signing up, you agree to the
                        <a class="sign-up-agreement-link" href="#">Terms of Service</a> and
                        <a class="sign-up-agreement-link" href="#">Privacy Policy</a>, including
                        <a class="sign-up-agreement-link" href="#">Cookie Use</a>.
                    </p>
                </div>

                <div class="already-have-account-container">
                    <h3 class="already-have-account-header">Already have an account?</h3>
                </div>

                <div class="sign-in-container" id="sign-in-btn">
                    <p class="sign-in-text">Sign in</p>
                </div>
            </div>
        </main>

        <footer class="footer">
            <a class="footer-text" href="#">About</a>
            <a class="footer-text" href="#">Help Center</a>
            <a class="footer-text" href="#">Terms of Service</a>
            <a class="footer-text" href="#">Privacy Policy</a>
            <a class="footer-text" href="#">Cookie Policy</a>
            <a class="footer-text" href="#">Accessibility</a>
            <a class="footer-text" href="#">Ads info</a>
            <a class="footer-text" href="#">Blog</a>
            <a class="footer-text" href="#">Status</a>
            <a class="footer-text" href="#">Careers</a>
            <a class="footer-text" href="#">Brand Resources</a>
            <a class="footer-text" href="#">Advertising</a>
            <a class="footer-text" href="#">Marketing</a>
            <a class="footer-text" href="#">Twitter for Business</a>
            <a class="footer-text" href="#">Developers</a>
            <a class="footer-text" href="#">Directory</a>
            <a class="footer-text" href="#">Settings</a>
            <p class="footer-text">© 2022 Twitter, Inc.</p>
        </footer>

        <!--MODALS-->
        <div id="sign-up-modal" class="sign-up-modal">
            <div class="sign-up-modal-content">
                <div class="sign-up-modal-header">
                    <span class="sign-up-close">&times;</span>
                </div>

                <div class="sign-up-modal-container">
                    <form action="#">
                        <h3 class="sign-up-modal-input-header">Create your account</h3>

                        <label class="sign-up-modal-input-label" for="sign-up-name" data-label="Name">
                            <input class="sign-up-modal-input" id="sign-up-name" type="text" name="name" value="" placeholder="Name">
                        </label>

                        <label class="sign-up-modal-input-label" for="sign-up-email" data-label="Email">
                            <input class="sign-up-modal-input" id="sign-up-email" type="text" name="email" value="" placeholder="Email">
                        </label>

                        <input class="sign-up-modal-submit" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>

        <div id="sign-in-modal" class="sign-in-modal">
            <div class="sign-in-modal-content">
                <div class="sign-in-modal-header">
                    <span class="sign-in-close">&times;</span>
                    <twitter-icon class="sign-in-icon"></twitter-icon>
                </div>

                <div class="sign-in-modal-container">
                    <form action="#">
                        <h3 class="sign-in-modal-input-header">Sign in to Twitter</h3>

                        <label class="sign-in-modal-input-label" for="sign-in-name" data-label="Name">
                            <input class="sign-in-modal-input" id="sign-in-name" type="text" name="name" value="" placeholder="Name">
                        </label>

                        <label class="sign-in-modal-input-label" for="sign-in-email" data-label="Email">
                            <input class="sign-in-modal-input" id="sign-in-email" type="text" name="email" value="" placeholder="Email">
                        </label>

                        <input class="sign-in-modal-submit" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TwitterIcon from "../UI/Icons/Navbar/TwitterIcon";
import GoogleIcon from "../UI/Icons/Navbar/GoogleIcon";
import AppleIcon from "../UI/Icons/Navbar/AppleIcon";
export default {
    components: {AppleIcon, GoogleIcon, TwitterIcon},
    mounted() {
        initSignUpPopup();
        initSignInPopup();
    }
}

function initSignUpPopup () {
    var modal = document.getElementById("sign-up-modal");
    var btn = document.getElementById("sign-up-btn");
    var span = document.getElementsByClassName("sign-up-close")[0];
    btn.onclick = function() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
}

function initSignInPopup () {
    var modal = document.getElementById("sign-in-modal");
    var btn = document.getElementById("sign-in-btn");
    var span = document.getElementsByClassName("sign-in-close")[0];
    btn.onclick = function() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
}

</script>

<style scoped src="./sign-up-popup.scoped.css"></style>
<style scoped src="./sign-in-popup.scoped.css"></style>
<style scoped src="./login.scoped.css"></style>
