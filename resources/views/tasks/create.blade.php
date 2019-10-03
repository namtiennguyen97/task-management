@extends('home')

@section('title', 'Add new idol')
@section('content')
@if($errors->any())
    @foreach($errors->all() as $error)
        <a style="color: red">{{$error}}<br></a>

        @endforeach
    @endif
    <div class="row">

        <div class="col-md-12">

            <h2 style="color: orangered">Your idol is waiting for us! Add her now!</h2>

        </div>

        <div class="col-md-12">

            <form method="post" action="{{ route('tasks.store') }}" enctype="multipart/form-data">

                @csrf

                <div class="form-group">

                    <label >Idol name:</label>

                    <input type="text" class="form-control" name="title" >

                </div>

                <div class="form-group">

                    <label >History</label>

                    <textarea class="form-control" rows="3" name="content" ></textarea>

                </div>

                <div class="form-group">

                    <label for="exampleFormControlFile1">Image</label>

                    <input type="file" name="image" class="form-control-file">

                </div>

                <div class="form-group">

                    <label for="exampleFormControlFile1">Date of birth</label>

                    <input type="date" name="due_date" class="form-control">

                </div>

                <button type="submit" class="btn btn-primary">Add now!</button>

                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>

            </form>

        </div>

    </div>


@endsection
