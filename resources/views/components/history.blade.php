<div class="conatiner container-history historybar">
    <main class="main-history">
        <div class="wrapper-history">
            <div class="tittle-history">
                <div>
                    <h4>history</h4>
                    <i class="bx bx-right-arrow-alt"></i>
                </div>
            </div>
            <div class="box-filter">
                <div class="active">
                    <h5>all</h5>
                </div>
                <div>
                    <h5>html</h5>
                </div>
                <div>
                    <h5>css</h5>
                </div>
                <div>
                    <h5>js</h5>
                </div>
            </div>
            <div class="wrapper-history-list">
                @if (isset($histories) && count($histories) > 0)

                    <div class="wrapper-history-list">

                        @foreach ($histories as $history)
                            <a href="/detail/{{ $history->submateri->id }}">

                                <div class="box-history">

                                    <div class="thumb-history">
                                        <div>
                                            <span></span>
                                        </div>
                                    </div>

                                    <div class="text-history">
                                        <div>
                                            <h4>{{ $history->submateri->materi->title }}</h4>
                                            <h6>{{ $history->submateri->title }}</h6>
                                        </div>
                                    </div>

                                    <div class="icon-menu-history">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </div>

                                </div>

                            </a>

                            <hr />
                        @endforeach

                    </div>
                @else
                    <p style="padding:20px">Belum ada history belajar</p>

                @endif
            </div>
        </div>
    </main>
</div>
