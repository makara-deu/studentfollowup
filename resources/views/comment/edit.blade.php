@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Comment</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('comments.update', $comment->id)}}" method="post">
                        @csrf
                        @method('put')
                            <div class="form-group">
                                <label for="comment">{{ __('Comment') }}</label>
                                <textarea class="form-control" placeholder="Comment" name="comment">{{$comment->comment}}</textarea>
                            </div>
                            <a href="{{route('students.show', $comment->student['id'])}}" class="btn btn-danger float-left">Cancel</a>
                            <button type="submit" class="btn btn-primary float-right">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection