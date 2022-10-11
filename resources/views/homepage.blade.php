@extends('layout.default')

@section('homepage')

<body>
  <section  style="background-color: #fff;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
            <!-- Nav bar  -->
          <nav class="mb-3 mt-3">
            <div class="card" style="border-radius: 12px; background-color: #EEE">
              <div class="container-fluid d-flex justify-content-around">
                <a class="navbar-brand mt-2" href="home">Phone Book</a>
                  <form class="d-flex justify-content-center" method="GET" action="{{ url('search') }}"> 
                    <input class="form-control  mt-2 mb-2 mr-1" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary  mt-2 mb-2 ml-1" type="submit">Search</button>
                  </form>
                  <a href="{{ url('logout') }}" class="btn btn-outline-primary  mt-2 mb-2" type="submit">Logout</a>
              </div>
            </div>
          </nav>
                  <!-- body -->
          <div class="card text-black mb-3" style="border-radius: 12px; background-color: #EEE">
            <div class="card-body p-md-5 row justify-content-center">
                  <!-- Left container  -->
              <div class="col-lg-6 order-2 order-lg-1">                       
                <div class="container">
                  <p class="text-center h4 fw-bold mb-5 mx-1 mx-md-4 mt-4">Create Contact</p>

                  <form method="POST" action="{{ url('home') }}" class="mx-1 mx-md-4">
                    @csrf
                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="name" class="form-control" placeholder="Contact Name"/>
                        @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" name="email" class="form-control" placeholder="Contact Email"/>
                        @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <input type="input" name="phone" class="form-control" placeholder="Contact Phone Number"/>
                        @if ($errors->has('phone'))
                        <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="d-flex justify-content-around">
                      <button type="submit" id="createBtn" class="btn btn-outline-primary">Create Contact</button>
                    </div>
                  </form>
                </div>
              </div>
                    <!-- Right container  -->
              <div class="col-lg-6 order-2 order-lg-1">       
                <div class="container">

                  @if (count($contacts) == 0)

                  <div class="card mb-2">
                    <div class="card-body d-block text-center">
                      <h5 class="card-title">There are no contacts found!</h5>
                      <p>To see all contacts go back.</p>
                    </div>
                    <div class="d-flex justify-content-around mb-3">
                      <a href="/home" id="goBackBtn" class="btn btn-outline-primary btn-sm">Go Back</a>
                    </div>
                  </div>

                  @endif

                  @foreach ($contacts as $contact)


                        <div class="card mb-2 shadow" style="background-color: #EEE">
                          <div class="card-body d-block text-center">
                            <h5 class="card-title">{{ $contact['name'] }}</h5>
                            <p class="card-text">{{ $contact['email'] }}</p>
                            <p class="card-text">{{ $contact['phone'] }}</p>
                          </div>
                          <div class="d-flex justify-content-around mb-3">
                            <a href="{{ url('contacts/' . $contact['id']) }}" class="btn btn-outline-primary btn-sm">Edit Contact</a>
                            <form method="POST" action="{{ url('contacts/' . $contact['id']) }}">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-outline-danger btn-sm">Remove Contact</button>
                            </form>
                          </div>
                        </div>

                  @endforeach
                </div>
              </div> 
            </div> 
          </div>   
        </div>
      </div>
    </div>
  </section>
  <input type="hidden" id="contactLength" value="{{ $contact_length }}"></input>
  <script>
    const contactLength = document.querySelector('#contactLength').value;
    const createBtn = document.querySelector('#createBtn');
    const goBackBtn = document.querySelector('#goBackBtn');

    if(createBtn && goBackBtn && contactLength > 0) {
      createBtn.addEventListener('click', function(e) {
        e.preventDefault();
        goBackBtn.click();
      });
    }
  </script>
</body>  
@endsection

