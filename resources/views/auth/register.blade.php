<div class="container container-login loginbar">
    <main class="main-login">
        <div class="login-card">
            <div class="tittle-register">
                <h2>Register</h2>
                <p class="subtitle">
                    Already have an account? <a href="/login">Sign in</a>
                </p>
            </div>
            <form method="POST" action="/register">
                @csrf

                <div class="input-group">
                    <i class='bx bx-user'></i>
                    <input type="text" name="name" placeholder="Full Name">
                </div>

                <div class="input-group">
                    <i class='bx bx-envelope'></i>
                    <input type="email" name="email" placeholder="Email Address">
                </div>

                <div class="input-group">
                    <i class='bx bx-lock-alt'></i>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="btn-login">
                    <a href="/">
                        <button type="button" class="back-btn">Back</button>
                    </a>
                    <button type="submit" class="login-btn">Register</button>
                </div>

            </form>

            <div class="divider">
                <span>or</span>
            </div>

            <p class="social-text">
                Register With Your Favourite Social Media Account
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
