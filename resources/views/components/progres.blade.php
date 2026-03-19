@foreach ($progress as $prog)
    <div class="container container-progres progresbar">

        <section class="main-progres">

            <div class="wrapper-progres">

                <div class="tittle-progres">
                    <h4>progres -> {{ $prog['title'] }}</h4>
                    <h6>({{ $prog['done'] }}/{{ $prog['total'] }})</h6>
                </div>

                <div class="progres-strip">

                    @for ($i = 1; $i <= $prog['total']; $i++)
                        <span class="progres-save {{ $i <= $prog['done'] ? 'active' : '' }}"></span>
                    @endfor

                </div>

            </div>

        </section>

    </div>
@endforeach
