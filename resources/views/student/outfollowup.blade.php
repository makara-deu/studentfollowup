
@extends('layouts.app')

@section('content')
<div class="container mt-3">
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
                    @if($student->activeFollowup == 0)
                        
                    <tr>
                        <td><img style="width: 50px; height:50px" class="mx-auto d-block" src="{{asset('img/'.$student->picture)}}" class="img-fluid rounded-circle"></td>
                        <td>{{$student->firstName}}</td>
                        <td>{{$student->lastName}}</td>
                        <td>{{$student->class}}</td>
                        <td class=" text-center">
                            <a href="#"><i class='fas fa-user-times text-danger'></i></i></a>
                        </td>
                        @endif
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>
@endsection

