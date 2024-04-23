@if ($messege = Session::get('create'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $messege }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($messege = Session::get('update'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ $messege }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($messege = Session::get('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $messege }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
