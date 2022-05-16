@foreach ($towns as $index => $town)
    @if($index < 5)
        <li class="nav-item">
            <a href='/?town={{ $town->id }}' 
            class='nav-link'>
            {{ $town->name }} </a>
        </li>
    @endif
@endforeach
<li class="nav-item nav-dropdown">
    <button class='nav-link nav-dropdown-btn'  
            onclick="toggleDropdown()">Ostali
    </button>
    <ul class='nav-dropdown-list display-dropdown' id="nav-dropdown">
        @foreach ($towns as $index => $town)
            @if($index > 4)
                <li class="nav-item">
                    <a href='/?town={{ $town->id }}' 
                    class='nav-dropdown-link'>
                    {{ $town->name }} </a>
                </li>
            @endif  
        @endforeach
    </ul>
</li>