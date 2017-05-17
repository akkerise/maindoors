@if(Session::has('msgAlert'))
    <div id="msgAlert" class="alert alert-{{ Session::get('lvlAlert') }}">
        {{ Session::get('msgAlert') }}
    </div>
@endif
@if(isset($msgAlert) && isset($lvlAlert))
    <div id="msgAlert" class="alert alert-{{ $lvlAlert }}">
        {{ $msgAlert }}
    </div>
@endif