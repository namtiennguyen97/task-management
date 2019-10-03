<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateIdol;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use http\Env\Response;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //validate


        $task = Task::all();
        return view('tasks.list',compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateIdol $request)
    {

        $task = new Task();
        $task->title = $request->input('title');
        $task->content = $request->input('content');

        //upload file hehe
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $path =$image->store('images','public');
            $task->image = $path;
        }
        $task->due_date = $request->input('due_date');
        $task->save();
        Session::flash('success','Tao moi thanh cong');
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateIdol $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->title = $request->input('title');
        $task->content = $request->input('content');
        $task->due_date= $request->input('due_date');
        if ($request->hasFile('image')){
            //xoa anh cu neu co
            $currentImg = $task->image;
            if ($currentImg){
                Storage::delete('/public/'.$currentImg);
            }
            //them anh moi sau khi xoa
            $image = $request->file('image');
            $path = $image->store('images','public');
            $task->image = $path;
        }
        $task->due_date = $request->input('due_date');
        $task->save();
        //dung session de hien thi ra thong bao
        Session::flash('success','Cap nhat thanh cong');
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $image = $task->image;
        if ($image){
            Storage::delete('/public/'.$image);
        }
        $task->delete();
        Session::flash('success','Xoa thanh cong');
        return redirect()->route('tasks.index');
    }
}
