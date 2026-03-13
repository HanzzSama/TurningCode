<div class="container container-header headerbar">
    <header class="main-header">
        <div class="tittle-header">
            <div>
                <h4>hello @auth
                        {{ Auth::user()->name }}
                    @else
                        Guys
                    @endauth!!</h4>
                <h5>Selamat Datang di Turning Code</h5>
                <button>Yok, belajar coding</button>
            </div>
        </div>
        <div class="thumb-header">
            <img src="{{ asset('assets/ico/img002.png') }}" alt="Thumbnail" />
        </div>
    </header>
</div>
