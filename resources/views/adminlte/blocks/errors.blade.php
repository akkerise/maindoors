@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@push('errors')
<script type="text/javascript">
    document.ready(function () {
        $("div.alert").delay(3000).slideUp();
    });
</script>
@endpush
