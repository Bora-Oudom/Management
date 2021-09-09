@extends('templates.main')

@section('content')   

  <div class="container">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Log in</p>
                <form class="mx-1 mx-md-4" method="POST" action="{{ route('login')}}">
                    @csrf

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"/>
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        {{ $message }}
                      </span>
                    @enderror
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="password">Password</label>
                      <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" />
                      
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          {{ $message }}
                        </span>
                      @enderror
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Login</button>
                  </div>

                </form>
                <p class="text-center text-muted mt-5 mb-0">Forget Password.? <a href="{{ route('password.request') }}" class="fw-bold text-body"><u>Reset Password</u></a></p>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="/img/bg1.jpg" class="img-fluid" alt="Sample image" style="border-radius: 25px; ">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection