@if (count($errors) > 0)
<div class="row">
    <div class="col-sm-6 mx-auto">
        <ul class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
            <li class="ml-4">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
