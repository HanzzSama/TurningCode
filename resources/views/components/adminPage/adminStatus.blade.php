<div class="admin-stats">

    <div class="box-stat">
        <h4>Total User</h4>
        <h2>{{ $totalUsers }}</h2>
    </div>

    <div class="box-stat">
        <h4>Total Admin</h4>
        <h2>{{ $totalAdmins }}</h2>
    </div>

</div>
<div class="admin-list">

    <h3>Daftar Admin</h3>


    @foreach ($admins as $admin)
        @php
            $isOnline = $admin->last_seen && $admin->last_seen >= now()->subMinutes(2);
        @endphp

        <div class="box-admin">

            <h4>{{ $admin->name }}</h4>

            <span class="{{ $isOnline ? 'online' : 'offline' }}">
                ● {{ $isOnline ? 'Online' : 'Offline' }}
            </span>
            <h5>Last Seen: {{ $admin->last_seen }}</h5>
            <h5>Now: {{ now() }}</h5>

        </div>
    @endforeach

</div>
