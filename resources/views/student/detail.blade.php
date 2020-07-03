@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Student Detail</h3>
                    </div>
                    <div class="card-body">
                        <img style="width: 100px;height:100px" class="mx-auto d-block" src="{{asset('img/'.$student->picture)}}"><br>
                        <h4>{{$student->firstName." ".$student->lastName}} - {{$student->class}}</span></h4>
                        <h5>Description:</h5>
                        <p>{{$student->description}}</p>
                        @if($student->user_id != "")
                        <p>Tutor By: {{$student->user['firstName']." ".$student->user['lastName']}}</p>
                        @else
                        <p>Tutor By: No</p>
                        @endif

                        <form action="{{route('addComment', $student->id)}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="comment">{{ __('Comment') }}</label>
                                <textarea class="form-control" placeholder="Comment" name="comment" required></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <a href="{{route('home')}}">
                                        <button type="button" class=" btn btn-danger float-left">Concel</button>
                                    </a>
                                 </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary float-right">Post</button>
                                 </div>
                            </div>
                            
                        </form><br>
                        @foreach($comments as $comment)
                            <h5>{{$comment->user['firstName']." ".$comment->user['lastName']}}</h5>
                            <p>{{$comment->comment}}</p>

                            @if(auth::id() == $comment->user_id)
                                <a href="{{route('comments.edit', $comment->id)}}">Edit</a> |
                                <a href="{{route('deleteComment', $comment->id)}}">Delete</a>
                            @endif
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection