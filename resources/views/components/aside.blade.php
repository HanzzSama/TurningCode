<div class="container container-aside asidebar" id="asidePage">
    <aside class="main-aside">
        <div class="wrapper-aside">

            {{-- Title --}}
            <div class="tittle-aside">
                <div>
                    <h4>Turning Code</h4>
                </div>
                <div>
                    <i class="bx bx-menu-alt-left"></i>
                </div>
            </div>

            <main class="aside-list">

                {{-- PROFILE --}}
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

                {{-- NAV LINKS --}}
                <figure>
                    {{-- Home --}}
                    <a href="@if (Auth::user()->role === 'admin')
                        /admin
                        @else
                        /
                    @endif" class="{{ request()->is('/') ? 'disabled' : '' }}">
                        <div class="box-aside">
                            <div>
                                <i class="bx bxs-home"></i>
                                <h4>Home</h4>
                            </div>
                        </div>
                    </a>

                    <hr />

                    {{-- Data Analisis (hanya admin) --}}
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <a href="/admin" class="{{ request()->is('admin') ? 'disabled' : '' }}">
                                <div class="box-aside">
                                    <div>
                                        <i class="bx bx-line-chart"></i>
                                        <h4>Data Analisis</h4>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endauth
                </figure>

                <figure>
                    {{-- Database Admin (hanya admin) --}}
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <a href="http://localhost/phpmyadmin/" target="_blank">
                                <div class="box-aside">
                                    <div>
                                        <i class="bx bxs-data"></i>
                                        <h4>Database Admin</h4>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endauth

                    <hr />

                    {{-- Question --}}
                    <div class="box-aside">
                        <div>
                            <i class="bx bxs-book-content"></i>
                            <h4>Question</h4>
                        </div>
                    </div>

                    <hr />

                    {{-- Planned --}}
                    <div class="box-aside">
                        <div>
                            <i class="bx bx-table"></i>
                            <h4>Planned</h4>
                        </div>
                    </div>
                </figure>

                <figure>
                    {{-- Login / Logout --}}
                    @auth
                        <form method="POST" action="/logout">
                            @csrf
                            <div class="box-aside">
                                <button type="submit" class="logout-btn">
                                    <i class='bx bx-log-out-circle'></i>
                                    <h4>Log out</h4>
                                </button>
                            </div>
                        </form>
                    @else
                        <a href="/login">
                            <div class="box-aside">
                                <div>
                                    <i class='bx bx-log-in-circle'></i>
                                    <h4>Login</h4>
                                </div>
                            </div>
                        </a>
                    @endauth
                </figure>

            </main>
        </div>
    </aside>
</div>
