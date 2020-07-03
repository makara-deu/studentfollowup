@extends('layouts.app')

@section('content')
<div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Edit Student</h3>
                        <img style="width: 100px; height:100px;" class="mx-auto d-block" src="{{asset('img/'.$student->picture)}}" class="img-fluid rounded-circle">
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('students.update', $student->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="firstName" value="{{$student->firstName}}" type="text" class="form-control" placeholder="Firstname" name="firstName" required autocomplete="firstName">
                                </div>
                                <div class="col-md-6">
                                    <input id="lastName" value="{{$student->lastName}}" type="text" class="form-control" placeholder="Lastname" name="lastName" required autocomplete="lastName">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <select class="form-control" name="class">
                                        <option selected disabled>Class</option>
                                        <option <?php if($student->class=="A"){?>selected="selected"<?php } ?> value="A">A</option>
                                        <option <?php if($student->class=="B"){?>selected="selected"<?php } ?> value="B">B</option>
                                        <option <?php if($student->class=="C"){?>selected="selected"<?php } ?> value="C">C</option>
                                        <option <?php if($student->class=="SNA"){?>selected="selected"<?php } ?> value="SNA">SNA</option>
                                        <option <?php if($student->class=="Web Programming"){?>selected="selected"<?php } ?> value="Web Programming">Web Programming</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input id="picture" type="file" class="form-control" name="image" autocomplete="picture">
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" name="tutor">
                                        <option selected disabled>Tutor</option>
                                       @foreach($users as $user)
                                            @if($user->role== 0)
                                                <option  <?php if($student->user_id == $user->id){?>selected="selected"<?php } ?>  value="{{$user->id}}">{{$user->firstName." ".$user->lastName}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            <div class="form-group row">

                                <div class="col-md-12">
                                   <textarea rows="5" class="form-control" placeholder="Description" name="description">{{$student->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <a href="{{route('home')}}">
                                        <button type="button" class=" btn btn-danger float-left">Concel</button>
                                    </a>
                                 </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary float-right">
                                        {{ __('Edit Student') }}
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