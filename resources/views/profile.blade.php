@extends('layout.default')

@section('content')

<div class="container" style="  display: flex; align-items: center; justify-content: center;">
    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">Profile Info</strong>
            <h3 class="mb-0">Name: {{ Auth::user()->name }}</h3>
            <p class="mb-auto">Email: {{ Auth::user()->email }}</p>
            <p class="mb-auto">Is this user Admin: <?php echo (Auth::user()->isAdmin) ? 'Yes' : 'No'; ?></p>
          </div>
          <div class="col-auto d-none d-lg-block">
            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
          </div>
        </div>
      </div>
</div>

@endsection