
@extends('User.layout.app')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{ route('user.dashboard') }}" style="text-decoration: none;">Dashboard</a></li>
                <li class="breadcrumb-item active">Update Profile</li>
            </ol>
            <form action="{{ route('profile.update' ,$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group" style="padding: 10px">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name"  value="{{ $user->name }}">
                        @error('name')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            
                <div class="form-group" style="padding: 10px">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control" name="phone"  value="{{ $user->phone }}">
                        @error('phone')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group" style="padding: 10px">
                    <label for="exampleFormControlFile1">Image</label><br>
                    <img id="eventimg" style="width: 360px;height: 250px;" @if($user->image) src="{{ asset($user->image) }}" @else src="{{ asset('image/default.jpg') }}" @endif alt="your image" />
                    <input value="profile.jpg" type="hidden" name="Profileimage" class="prfl-pic" onchange="backreadURL(this);" >
                    <div class="action-section">
                        <input type="file" name="empimage" class="prfl-pic" onchange="eventpic(this);" capture >
                        
                    </div>
                    @error('empimage')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group" style="padding: 10px">
                    <button type="submit" class="btn btn-success mt-10">Submit</button>
                </div>
            </form>
        </div>
    </main>

@endsection