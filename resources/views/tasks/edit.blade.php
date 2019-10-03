@extends('home')

@section('title', 'Cập nhật công viêc')


@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <a style="color: red">{{$error}}<br></a>
@endforeach
        @endif
    <div class="row">

        <div class="col-md-12">

            <h2>Editing Idol information</h2>

        </div>

        <div class="col-md-12">

            <form method="post" action="{{ route('tasks.update', $task->id) }}" enctype="multipart/form-data">

                @csrf

                <div class="form-group">

                    <label>Idol's name:</label>

                    <input type="text" class="form-control" name="title" value="{{ $task->title }}" required>

                </div>

                <div class="form-group">

                    <label>History</label>

                    <textarea class="form-control" rows="3" name="content"  required>{{ $task->content }}</textarea>

                </div>

                <div class="form-group">

                    <label>Image</label>

                    <input type="file" name="image" class="form-control-file" >

                </div>

                <div class="form-group">

                    <label>Date of birth</label>

                    <input type="date" name="due_date" class="form-control"  value="{{ $task->due_date }}" required>

                </div>

                <button type="submit" class="btn btn-primary">Confirm Edit</button>

                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>

            </form>

        </div>

    </div>


@endsection
