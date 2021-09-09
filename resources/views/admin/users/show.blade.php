@extends('templates.main')

@section('content')
<div class="container text-center" style="padding:5%">
	<div class="row">
        <div class="col-md-6 img" style="text-align:center">
          <img  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvzOpl3-kqfNbPcA_u_qEZcSuvu5Je4Ce_FkTMMjxhB-J1wWin-Q"  alt="" class="img-rounded">
        </div>
        <div class="col-md-6 details" style="border-left:3px solid #ded4da">
          <blockquote>
            <h4>{{ $user->name }}</h4>
          </blockquote>
          <p style="font-size:15px;
          font-weight:bold">
            {{ $user->email }} <br><br>
            
            <a class="btn btn-sm btn-primary" href="{{ route('admin.users.edit',$user->id)}}" role="button">Edit</a>
            <button 
                type="button"
                class="btn btn-sm btn-danger"
                onclick="event.preventDefault(), document.getElementById('delete-user-from-{{ $user->id }}').submit()">
                    Delete
                </button>
            <form id="delete-user-from-{{ $user->id }}" action="{{ route('admin.users.destroy',$user->id)}}" method="POST" >
                @csrf
                @method('Delete')
            </form>
        </div>

            
    </div>
</div>
@endsection