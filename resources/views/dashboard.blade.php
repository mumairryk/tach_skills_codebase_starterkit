@extends('layouts.backend')

@section('content')
  <!-- Page Content -->
  <div class="content">
    <div class="my-50 text-center">
      <h2 class="font-w700 text-black mb-10">Dashboard</h2>
      <h3 class="h5 text-muted mb-0">Welcome to your app.</h3>
    </div>
    <div class="row row-deck">
      <div class="col-md-6 col-xl-4">
        <div class="block">
          <div class="block-header block-header-default">
            <h3 class="block-title">Welcome to your app</h3>
          </div>
          <div class="block-content">
            <p>
              We’ve put everything together, so you can start working on your Laravel project as soon as possible! OneUI assets are integrated and work seamlessly with Laravel Mix, so you can use the npm scripts as you would in any other Laravel project.
            </p>
            <p>
              Feel free to use any examples you like from the full HTML version to build your own pages.
            </p>
            <p>
              <strong>Wish you all the best and happy coding!</strong>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-4">
        <div class="block">
          <div class="block-header block-header-default">
            <h3 class="block-title">Block Title</h3>
          </div>
          <div class="block-content text-muted">
            <p>
              ...
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-4">
        <div class="block">
          <div class="block-header block-header-default">
            <h3 class="block-title">Block Title</h3>
          </div>
          <div class="block-content text-muted">
            <p>
              ...
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Page Content -->
@endsection
