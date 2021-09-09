@extends('templates.main')

@section('content')   

  <div class="container ">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Password Reset</p>
                <form class="mx-1 mx-md-4" method="POST" action="{{ url('reset-password') }}">
                    @csrf
                  
                  <input type="hidden" name="token" value="{{ $request->token }}">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example3c">Email</label>
                      <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $request->email }}"/>
                      
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

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="password_confirmation">Repeat your password</label>
                      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
                      
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Reset</button>
                  </div>

                </form>
                
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection