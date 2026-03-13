<div class="container container-material materialbar">
    <main class="main-material">
        <div class="wrapper-material" id="scrollingMaterial">

            @foreach ($mainMateri as $materi)
                <div class="box-material">

                    <div class="box-material-count">

                        <div>
                            <i class='bx {{ $materi->icon }}'></i>
                        </div>

                        <div>
                            <h3>{{ str_pad($materi->materis_count, 2, '0', STR_PAD_LEFT) }}</h3>
                            <h5>materi</h5>
                        </div>

                    </div>

                    <div class="box-material-tittle">
                        <h4>{{ $materi->title }}</h4>
                    </div>
                    <a href="/materi/{{ $materi->id }}">
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
                    </a>
                </div>
            @endforeach

        </div>
    </main>
</div>
