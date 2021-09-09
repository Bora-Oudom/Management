@extends('templates.main')

@section('content')
<div class="container h-100">
    <div class="row">
        <div class="col-12">
            <h1 class="float-left">
                Users
            </h1>
            <a class="btn btn-sm btn-success float-right" href="{{ route('admin.users.create')}}" role="button">Create</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black " style="border-radius: 15px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center ">
                        <table class="table">
                            <thead>
                                <tr class="table-dark">
                                    <th scope="col">#ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th>{{ $user->id }}</th>
                                    <th>{{ $user->name }}</th>
                                    <th>{{ $user->email }}</th>
                                    <th>
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
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    {{ $users->links() }}
                    
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection