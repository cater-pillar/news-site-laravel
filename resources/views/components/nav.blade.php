@props(['towns', 'categories'])
<nav>
    <div class="nav-primary">
        <div class="main-container">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href='/' class='nav-link'>NASLOVNA</a>
                </li>
                @foreach ($towns as $town)
                    <li class="nav-item">
                        <a href='#' 
                        class='nav-link'>
                        {{ $town->name }} 
                    </a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="nav-secondary">
        <div class="main-container">
        <ul class="nav-list">
            @foreach ($categories as $category)
                <li class="nav-item">
                    <a href="/?category={{ $category->id }}" 
                       class='nav-link'>
                    {{ $category->name }} 
                </a></li>
            @endforeach
        </ul>
        </div>
    </div>
</nav>