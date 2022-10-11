@extends('layout.default')
@php
    $contact = $contact[0];
@endphp
@section('edit')
<body>
  <section class="vh-100" style="background-color: #fff;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
        <!--          navbar        -->
          <nav class="mb-3">
            <div class="card" style="border-radius: 12px; background-color: #EEE">
              <div class="container-fluid d-flex d-flex justify-content-between">
                <a class="navbar-brand mt-2" href="#">Phone Book</a>
                <a class="btn btn-outline-primary  mt-2 mb-2 " href="{{ url('logout') }}" type="submit">Logout</a>
              </div>
            </div>
          </nav>
          <!--          body        -->
          <div class="card text-black" style="border-radius: 12px; background-color: #EEE">
            <div class="card-body p-md-5 row justify-content-center">
              <!--          left side       -->
              <div class="col-lg-6 order-2 order-lg-1">                       
                <p class="text-center h4 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit Contact</p>       
                <form method="POST" action="{{ url('contacts/' . $contact['id']) }}" class="mx-1 mx-md-4">
                  @csrf
                  @method('PUT')
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <small>Edit Phone Number</small>
                      <input type="text" name="name" class="form-control" value="{{ $contact['name'] }}"/>
                      @if ($errors->has('name'))
                      <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <small>Edit Email</small>
                      <input type="email" name="email" class="form-control" value="{{ $contact['email'] }}"/>
                      @if ($errors->has('email'))
                      <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <small>Edit Phone Number</small>
                      <input type="input" name="phone" class="form-control" value="{{ $contact['phone'] }}"/>
                      @if ($errors->has('phone'))
                      <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex justify-content-around">
                    <button type="submit" class="btn btn-outline-primary">Save Contact</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>    
@endsection
