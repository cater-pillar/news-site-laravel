<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vesti | {{ $add_to_title == "" ? $title : $add_to_title }}</title>
    <link rel="icon" href={{ asset('images/newspaper-red.png'); }}>
    <link rel="stylesheet" type="text/css" href={{ URL::asset('style.css'); }} >
</head>
<body>
</html>
<header>
    <div class="head">
        @include('_search')
        <div class="main-container">
            <img src={{ asset('images/newspaper.png') }} 
                 alt="logo" class="logo">       
        </div>
    </div>
    <x-nav :categories="$categories" :towns="$towns"/>
</header>
<div class="main-container">
    <div class="horizontal-banner"></div>
    <div class="breadcrumbs">
        Vesti | {{ $add_to_title == "" ? $title : $add_to_title }}
    </div>

    {{ $slot }}

<footer>
    <img src={{ asset('images/newspaper-red.png') }} alt="logo" class="logo-footer">
    <span class="text-footer">Vesti, Internet novine - Sva prava zadržana ©</span>
</footer>
</div>
<script>
    function toggleDropdown() {
    let dropdown = document.getElementById('nav-dropdown')
        dropdown.classList.toggle("display-dropdown");
    }

    let message = document.getElementById('success-msg');
    if (message) {
        setTimeout(() => {
        message.className = "hidden-input";   
    }, 4000);
    }
    

</script>
</body>
