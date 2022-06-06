@if(session()->has('success'))
    <div class='success-msg' id='success-msg'>
        {{ session()->get('success') }}
    </div>
@endif