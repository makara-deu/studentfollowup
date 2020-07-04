@extends('layouts.app')

@section('content')
<div class="container mt-3">
 @if(auth::user()->role == 1)
    <a href="{{route('students.create')}}" class="btn btn-primary ">Add Student</a>
 @endif
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <table class="table table-bordered">
                <tr>
                    <th>Picture</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Classs</th>
                    <th>Action</th>
                </tr>
                @foreach($students as $student)
                    @if($student->activeFollowup == 1)
                        
                    <tr>
                        <td><img style="width: 50px;height:50px" class="mx-auto d-block" src="{{asset('img/'.$student->picture)}}"></td>
                        <td>{{$student->firstName}}</td>
                        <td>{{$student->lastName}}</td>
                        <td>{{$student->class}}</td>
                        <td>

                            @if(auth::user()->role == 1)
                            <a href="{{route('outfollowup', $student->id)}}"><i class='fas fa-user-alt-slash text-success'></i></a>&nbsp; | &nbsp;
                            <a href="{{route('students.edit',$student->id)}}"><i class='fas fa-user-edit'></i></a>&nbsp; | &nbsp;
                            @endif
                            <a href="{{route('students.show',$student->id)}}"><i class='fas fa-eye text-warning'></i></a>
                        </td>
                        @endif
                        
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>
@endsection