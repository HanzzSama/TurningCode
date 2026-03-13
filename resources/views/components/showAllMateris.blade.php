@if ($materi)
    <div class="container container-header headerbar">
        <header class="main-header-materi">
            <div class="tittle-header-materi">
                <div>
                    <h4>{{ $materi->title }}?</h4>
                    <h5>buat apa belajar materi ini...</h5>
                </div>
            </div>
            <div class="thumb-header-materi">
                <img src="{{ asset('assets/ico/img005.png') }}" alt="Thumbnail" />
            </div>
        </header>
    </div>
    <div class="container container-show-materi">
        <main class="main-show-materi">
            <div class="tittle-show-materi">
                <h4>about {{ $materi->title }}</h4>
                <h5>{{ $materi->description }}</h5>
            </div>
            <div class="wrapper-show-materi">
                @foreach ($subMateris as $materi)
                    <a href="/submateri/{{ $materi->id }}">
                        <div class="box-show-materi">
                            <div>
                                <div class="icon-show-materi"></div>
                                <div>
                                    <h4>{{ $materi->title }}</h4>
                                    <h5>{{ $materi->description }}</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </main>
    </div>
@endif



{{-- @if ($materi)
<a href="/">back</a>
<div class=" page-materi container container-material materialbar">
    <main class="main-material">
        <div class="wrapper-material">

            <h3>{{ $materi->title }}</h3>

            @foreach ($subMateris as $sub)
            <div class="box-material">

                <div class="box-material-tittle">
                    <h4>{{ $sub->title }}</h4>
                </div>

                <div class="box-material-profile">
                    <div>
                        <div class="thumb-material">
                            <img src="{{ asset('assets/ico/devlab.jpg') }}">
                        </div>
                        <div>
                            <h6>join room</h6>
                        </div>
                    </div>

                    <div>
                        <i class='bx bx-right-arrow-alt'></i>
                    </div>
                </div>

            </div>
            @endforeach

        </div>
    </main>
</div>

@endif --}}
