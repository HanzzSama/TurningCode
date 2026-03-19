<div class="container container-last-study last-studybar">
    <section class="main-last-study">

        <div class="tittle-last">
            <h4>last study</h4>
        </div>

        <div class="wrapper-last-study">

            @if ($lastStudy)
                <a href="/belajar/{{ $lastStudy->submateri->id }}">

                    <div class="box-last">

                        <div class="box-last-material">

                            <div class="thumb-last">
                                <img src="{{ asset('assets/img/img001.jpg') }}" alt="Thumbnail">
                            </div>

                            <div class="text-last">
                                <h4>{{ $lastStudy->submateri->materi->title }}</h4>
                                <h6>{{ $lastStudy->submateri->title }}</h6>
                            </div>

                        </div>

                        <div class="box-date">

                            <div>
                                <i class='bx bx-calendar'></i>
                                <h5>{{ $lastStudy->created_at->format('D, d M Y') }}</h5>
                            </div>

                            <div>
                                <i class='bx bx-time-five'></i>
                                <h5>{{ $lastStudy->created_at->format('H:i') }}</h5>
                            </div>

                        </div>

                    </div>

                </a>
            @else
                <h5>Belum ada materi dipelajari</h5>
            @endif

        </div>

    </section>
</div>
