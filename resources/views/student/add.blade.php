@extends('layouts.app')

@section('content')
<div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Add Student</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="firstName" type="text" class="form-control" placeholder="Firstname" name="firstName" required autocomplete="firstName">
                                </div>
                                <div class="col-md-6">
                                    <input id="lastName" type="text" class="form-control" placeholder="Lastname" name="lastName" required autocomplete="lastName">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <select class="form-control" name="class">
                                        <option selected disabled>Class</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="SNA">SNA</option>
                                        <option value="Web Programming">Web Programming</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input id="picture" type="file" class="form-control" name="image" required autocomplete="picture">
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" name="tutor">
                                        <option selected disabled>Tutor</option>
                                       @foreach($users as $user)
                                            @if($user->role== 0)
                                                <option value="{{$user->id}}">{{$user->firstName." ".$user->lastName}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">

                                <div class="col-md-12">
                                    <textarea rows="5" class="form-control" placeholder="Description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <a href="{{route('home')}}">
                                        <button type="button" class=" btn btn-danger float-left">Concel</button>
                                    </a>
                                 </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary float-right">
                                        {{ __('Add Student') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection