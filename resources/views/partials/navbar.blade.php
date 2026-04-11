<nav class="navbar">
    <!-- Logo -->
    <div class="nav-logo">
        <a href="{{ route('home') }}">🎮 GameZone</a>
    </div>

    <!-- Links -->
    <ul class="nav-links">

        @if (!request()->routeIs('home'))
            <li>
                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'active' : '' }}">
                   Home
                </a>
            </li>
        @endif

        @foreach(config('menu') as $item)
            <li>
                <a href="{{ route($item['route']) }}"
                class="{{ request()->routeIs($item['route']) ? 'active' : '' }}">
                    {{$item['title']}}
                </a>
            </li>
        @endforeach

    </ul>

    <!-- Icons -->
    <div class="nav-icons">
        <i class="fa-solid fa-magnifying-glass"></i>
        <i class="fa-solid fa-user"></i>
    </div>

    <!-- Mobile Toggle -->
    <div class="menu-toggle" id="menuToggle">
        ☰
    </div>

</nav>