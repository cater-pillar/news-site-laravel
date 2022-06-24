@props(['categories', 'towns'])
<nav>
    @include('_nav-admin')
    <div class="nav-primary">
        <div class="main-container">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href='/' class='nav-link'>NASLOVNA</a>
                </li>
                @foreach ($towns as $index => $town)
                    @if($index < 6)
                        <li class="nav-item">
                            <a href='/?town={{ $town->slug }}' 
                            class='nav-link'>
                            {{ $town->name }} </a>
                        </li>
                    @endif
                @endforeach
                <li class="nav-item nav-dropdown">
                    <button class='nav-link nav-dropdown-btn'  
                            onclick="toggleDropdown()">Ostali
                    </button>
                    <ul class='nav-dropdown-list display-dropdown' 
                        id="nav-dropdown">
                        @foreach ($towns as $index => $town)
                            @if($index > 4)
                                <li class="nav-item">
                                    <a href='/?town={{ $town->slug }}' 
                                    class='nav-dropdown-link'>
                                    {{ $town->name }} </a>
                                </li>
                            @endif  
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="nav-secondary">
        <div class="main-container">
        <ul class="nav-list">
            @foreach ($categories as $category)
                <li class="nav-item">
                    <a href="/?category={{ $category->slug }}" 
                        class='nav-link'>
                    {{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
        </div>
    </div>
</nav>