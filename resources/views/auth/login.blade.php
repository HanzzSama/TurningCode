@if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container container-login loginbar">
    <main class="main-login">
        <div class="login-card">
            <div class="tittle-login">
                <h2>Sign in</h2>
                <p class="subtitle">
                    New user? <a href="/register">Create an account</a>
                </p>
            </div>
            <form method="POST" action="/login">
                @csrf

                <div class="input-group">
                    <i class='bx bx-envelope'></i>
                    <input type="email" name="email" placeholder="Email Address">
                </div>

                <div class="input-group">
                    <i class='bx bx-lock-alt'></i>
                    <input type="password" name="password" id="password" placeholder="Password">
                    <i class='bx bx-show eye' id="togglePassword"></i>
                </div>

                <a href="#" class="forgot">Forgot password?</a>

                <div class="btn-login">
                    <a href="/">
                        <button type="button" class="back-btn">Back</button>
                    </a>
                    <button type="submit" class="login-btn">Login</button>
                </div>

            </form>

            <div class="divider">
                <span>or</span>
            </div>

            <p class="social-text">
                Join With Your Favourite Social Media Account
            </p>

            <div class="social-login">

                <button class="social-btn">
                    <i class='bx bxl-google'></i>
                </button>

                <button class="social-btn">
                    <i class='bx bxl-facebook'></i>
                </button>

                <button class="social-btn">
                    <i class='bx bxl-twitter'></i>
                </button>

                <button class="social-btn">
                    <i class='bx bxl-apple'></i>
                </button>

            </div>
            <div class="footer-terms">
                <p class="terms">
                    By signing in with an account, you agree to SO's
                    <a href="#">Terms of Service</a> and
                    <a href="#">Privacy Policy</a>.
                </p>
            </div>
        </div>
    </main>
</div>
