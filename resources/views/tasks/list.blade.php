@extends('home')
@section('title','Danh sach task')
@section('content')
    <div class="col-12">
        <div class="row-12">
            <h1 style="background-color: black"><a style="color: white">Danh sach</a> <a style="color: orangered">Dien vien yeu thich</a></h1>
        </div>
        <div class="col-12">
            @if(\Illuminate\Support\Facades\Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>{{ \Illuminate\Support\Facades\Session::get('success') }}
                </p>
            @endif
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Due-date</th>
                <th scope="col">Image</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(count($task)==0)
                <tr><td colspan="4">Khong co du lieu</td></tr>
            @else
                @foreach($task as $key => $value)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$value->title}}</td>
                        <td>{{$value->content}}</td>
                        <td>{{$value->due_date}}</td>
                        <td><img src="{{asset("storage/".$value->image)}}" style="width: 90px;height: 90px"> </td>
                        <td><a href="{{route('tasks.edit', $value->id)}}">Sua</a></td>
                        <td><a href="{{route('tasks.destroy', $value->id)}}" class="text-danger" onclick="return confirm('Ban muon xoa?')">Xoa</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{route('tasks.create')}}">Them moi</a>
    </div>

@endsection
