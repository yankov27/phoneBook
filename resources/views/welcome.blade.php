@extends('layout.default')


@section('welcome')

<body>
  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-9 col-xl-8">
          <div class="card shadow text-dark" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p class="text-center h2 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>
                  <form action="/" method="POST">
                    @csrf
                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" name="email" class="form-control" placeholder="Email"/>
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                      </div>
                    </div>
                    @include('layout.messages')
                    <div class="d-block">
                      <button type="submit" class="btn btn-primary shadow">Login</button>
                      <a href="{{ url('/register') }}" type="button" class="btn btn-primary shadow" >Register</a>
                    </div>
                  </form>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                  <img src="logo-color.png" class="img-fluid" alt="Sample image">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>    
@endsection
