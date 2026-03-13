<div class="container container-tools toolsbar">
    <section class="main-tools">
        @if ($page == 'materi' || $page == 'submateri')
            <a href="{{ url()->previous() }}">
                <div class="back-home">
                    <i class='bx bx-left-arrow-alt'></i>
                    <h4>back</h4>
                </div>
            </a>
        @else
            <span></span>
        @endif
        <div class="wrapper-tools">
            <div>
                <i class="bx bx-video"></i>
            </div>
            <div>
                <i class="bx bx-group"></i>
            </div>
            <div>
                <i class="bx bx-archive-in"></i>
            </div>
        </div>
    </section>
</div>
