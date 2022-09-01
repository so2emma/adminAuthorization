<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Auth::guard("web")->user()->tasks;
        return view("user.task.index", compact("tasks"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where("status" ,"=", "active")->get();
        return view("user.task.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|min:3",
            "category" => "required",
            "deadline" => "required",
            "status" => "required|min:3",
        ]);

        $category = Category::where("title" ,"=", $request->category)->first();
        $validated["category_id"] = $category->id;
        $validated["user_id"] = Auth::guard('web')->user()->id;

        Task::create($validated);

        session()->flash("success", "Task Created Successfully");
        return redirect()->route("user.task.index");
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
    public function edit(Task $task)
    {
        $categories = Category::where("status" ,"=", "active")->get();
        return view("user.task.edit", compact("task", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            "title" => "required|min:3",
            "category" => "required",
            "deadline" => "required",
            "status" => "required|min:3",
        ]);

        $category = Category::where("title" ,"=", $request->category)->first();
        $validated["category_id"] = $category->id;

        $task->update($validated);

        session()->flash("success", "Task Updated Successfully");
        return redirect()->route("user.task.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::destroy($id);

        session()->flash("success", "Category Deleted Successfully");
        return redirect()->route("admin.category.index");
    }
}
