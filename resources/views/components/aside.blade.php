<div class="container container-aside asidebar" id="asidePage">
    <aside class="main-aside">
        <div class="wrapper-aside">
            <div class="tittle-aside">
                <div>
                    <h3>Turning Code</h3>
                </div>
                <div>
                    <i class="bx bx-menu-alt-left"></i>
                </div>
            </div>
            <main class="aside-list">
                @auth
                    <figure class="box-profile">
                        <div class="wrapper-profile">
                            <div class="wrapper-user">

                                <div class="user-img">
                                    <img src="{{ asset('assets/ico/default-user.jpg') }}" alt="user" />
                                </div>

                                <div class="username">
                                    <h4>{{ Auth::user()->name }}</h4>

                                    @php
                                        $email = Auth::user()->email;
                                        $parts = explode('@', $email);
                                        $name = substr($parts[0], 0, 3) . '*******';
                                        $maskedEmail = $name . '@' . $parts[1];
                                    @endphp

                                    <h6>{{ $maskedEmail }}</h6>
                                </div>

                            </div>

                            <div class="user-ico">
                                <i class="bx bx-message-rounded"></i>
                            </div>
                        </div>
                    </figure>
                @endauth
                <figure>
                    <a href="/" class="{{ request()->is('/') ? 'disabled' : '' }}">
                        <div class="box-aside">
                            <div>
                                <i class="bx bxs-home"></i>
                                <h4>home</h4>
                            </div>
                        </div>
                    </a>
                    <hr />
                    <a href="/admin" class="{{ request()->is('admin') ? 'disabled' : '' }}">
                        <div class="box-aside">
                            <div>
                                <i class="bx bx-line-chart"></i>
                                <h4>data analisis</h4>
                            </div>
                        </div>
                    </a>
                </figure>
                <figure>
                    <a href="http://localhost/phpmyadmin/" target="blank">
                        <div class="box-aside">
                            <div>
                                <i class="bx bxs-data"></i>
                                <h4>database admin</h4>
                            </div>
                        </div>
                    </a>
                    <hr />
                    <div class="box-aside">
                        <div>
                            <i class="bx bxs-book-content"></i>
                            <h4>question</h4>
                        </div>
                    </div>
                    <hr />
                    <div class="box-aside">
                        <div>
                            <i class="bx bx-table"></i>
                            <h4>planned</h4>
                        </div>
                    </div>
                </figure>
                <figure>
                    <a href="/login">
                        @auth
                            <form method="POST" action="/logout">
                                @csrf
                                <div class="box-aside">
                                    <button type="submit">
                                        <i class='bx bx-log-out-circle'></i>
                                        <h4>Log out</h4>
                                    </button>
                                </div>
                            </form>
                        @else
                            <div class="box-aside">
                                <div>
                                    <i class='bx bx-log-in-circle'></i>
                                    <h4>login</h4>
                                </div>
                            </div>
                        @endauth
                    </a>
                </figure>
            </main>
        </div>
    </aside>
</div>
