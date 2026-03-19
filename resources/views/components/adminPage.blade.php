<div id="desktop-warning">
    <div>
        <h2>Admin Panel hanya bisa diakses di Desktop</h2>
        <p>Silakan gunakan layar minimal 1024px</p>
    </div>
</div>
@include('components.adminPage.adminChat')
<div class="container container-admin adminbar">
    <main class="main-admin">
        <div>
            @include('components.adminPage.header')
        </div>
        <div>
            @include('components.adminPage.adminContributor')
            @include('components.adminPage.adminStatus')
            @include('components.adminPage.leaderboard')
        </div>
        {{-- @include() --}}
        {{-- @include() --}}
        {{-- @include() --}}
        {{-- @include() --}}
        {{-- @include() --}}
        {{-- @include() --}}
    </main>
</div>
