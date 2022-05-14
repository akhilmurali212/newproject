
@extends('User.layout.app')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{ route('user.dashboard') }}" style="text-decoration: none;">Dashboard</a></li>
                <li class="breadcrumb-item active">View Profile</li>
            </ol>
            <form action="">
                <div class="form-group" style="padding: 10px">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Name</label>
                        <input readonly type="text" class="form-control" name="name"  value="{{ $user->name }}">
                    </div>
                </div>
                <div class="form-group" style="padding: 10px">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Email</label>
                        <input readonly type="text" class="form-control" name="name"  value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-group" style="padding: 10px">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Phone</label>
                        <input readonly type="text" class="form-control" name="name"  value="{{ $user->phone }}">
                    </div>
                </div>
                
                <div class="form-group" style="padding: 10px">
                    <label for="exampleFormControlFile1">Image</label><br>
                    <img id="eventimg" style="width: 360px;height: 250px;" @if($user->image) src="{{ asset($user->image) }}" @else src="{{ asset('image/default.jpg') }}" @endif alt="your image" />
                    <input value="profile.jpg" type="hidden" name="Profileimage" class="prfl-pic" onchange="backreadURL(this);" >
                    
                </div>
                
            </form>
        </div>
    </main>

@endsection