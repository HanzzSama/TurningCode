<div class="container container-contributor contributorbar">

    <main class="main-contributor">

        <div class="tittle-contributor">
            <h4>contributor list</h4>
        </div>

        <div class="wrapper-contributor">

            @foreach ($contributors as $item)
                @php
                    $colors = ['linear-gradient(45deg, #15161f 85%, #3e3361)', 'linear-gradient(45deg, #15161f 85%, #614533)', 'linear-gradient(45deg, #15161f 85%, #613333)', 'linear-gradient(45deg, #15161f 85%, #336145)'];

                    $index = crc32($item->admin_email) % count($colors);
                    $bgColor = $colors[$index];
                @endphp

                <div class="box-contributor" style="background: {{ $bgColor }};">
                    <span></span>
                    <div>

                        <div class="text-contributor">

                            <div class="time-contributor">
                                <i class='bx bx-calendar'></i>
                                <h6>{{ $item->created_at->format('H:i') }}</h6>
                            </div>

                            <div class="user-contributor">
                                <h5>{{ $item->admin_email }}</h5>
                                <h6>{{ substr($item->admin_email, 0, 5) }}****@gmail.com</h6>
                            </div>

                            <div class="desc-contributor">
                                <h4>{{ $item->contribution }}</h4>
                            </div>

                        </div>

                        <div class="profile-contributor">
                            <div>
                                <img src="{{ asset('assets/ico/adminUser.jpg') }}" alt="">
                            </div>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </main>

</div>
<div class="container container-absen">
    <form class="main-absen" action="/admin/contributor/save" method="POST">
        <div class="tittle-absen">
            <h4>absen kontributor</h4>
        </div>
        <div class="wrapper-absen">

            @csrf
            <div>

                <div class="absen-input">
                    <textarea name="contribution" placeholder="apa yang kamu kerjakan hari ini?" required></textarea>
                </div>

                <div class="absen-btn">
                    <button type="submit">save</button>
                </div>

            </div>

        </div>
    </form>
</div>
