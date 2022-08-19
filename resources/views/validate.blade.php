{{-- global validation --}}
@if ($errors -> any())
    <p class="alert alert-danger alert-dismissible fade show">{{ $errors -> first() }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button></p>
@endif

@if (Session::has('success'))
    <p class="alert alert-success alert-dismissible fade show">{{ Session::get('success') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button></p>
@endif

@if (Session::has('warning'))
    <p class="alert alert-warning alert-dismissible fade show">{{ Session::get('warning') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button></p>
@endif

@if (Session::has('danger'))
    <p class="alert alert-danger alert-dismissible fade show">{{ Session::get('danger') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button></p>
@endif

