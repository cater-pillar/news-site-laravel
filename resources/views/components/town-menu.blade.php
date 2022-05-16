@foreach ($towns as $town)
    <li class="nav-item">
        <a href='/?town={{ $town->id }}' 
        class='nav-link'>
        {{ $town->name }} </a>
    </li>
@endforeach