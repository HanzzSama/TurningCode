<div class="container container-detail-materi">

    <section class="main-detail-materi">

        <div class="wrapper-detail-materi">

            {{-- Breadcrumb --}}
            <div class="breadcrumb">
                <h6>
                    {{ $submateri->materi->mainMateri->title }}
                    <i class='bx bx-chevron-right'></i>
                    {{ $submateri->materi->title }}
                    <i class='bx bx-chevron-right'></i>
                    <span>{{ $submateri->title }}</span>
                </h6>
            </div>

            {{-- Title --}}
            <div class="title-materi">
                <h2>{{ $submateri->title }}</h2>
            </div>

            {{-- Content --}}
            <div class="content-materi">

                {!! $submateri->content !!}

            </div>

            {{-- Navigation --}}
            <div class="materi-navigation">

                @if ($prev)
                    <a href="/belajar/{{ $prev->id }}" class="btn-prev">
                        <i class='bx bx-left-arrow-alt'></i>
                        Prev
                    </a>
                @endif

                @if ($next)
                    <a href="/belajar/{{ $next->id }}" class="btn-next">
                        Next
                        <i class='bx bx-right-arrow-alt'></i>
                    </a>
                @endif

            </div>

        </div>

    </section>

</div>
