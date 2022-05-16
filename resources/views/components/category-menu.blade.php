@foreach ($categories as $category)
    <li class="nav-item">
        <a href="/?category={{ $category->id }}" 
            class='nav-link'>
        {{ $category->name }}</a>
    </li>
@endforeach