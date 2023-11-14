<?php
use App\Http\Requests\TaskRequest;
use Illuminate\Http\{Response, Request};
use Illuminate\Support\Facades\Route;
use App\Models\Task;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){
    return redirect()->route('tasks.index');
});


Route::get('/tasks/', function () {
    return view('index',[
//        "tasks" => Task::latest()->get()
           "tasks" => Task::latest()->paginate(10)
    ]);
})->name('tasks.index');

Route::view("/tasks/create", 'create')->name("tasks.create");

Route::get('/tasks/{task}/edit',function(Task $task){
    return view('edit' , ['task' => $task]);

})->name('tasks.edit');

Route::get('/tasks/{task}',function(Task $task){

//    $task = collect($tasks)->firstWhere("id",$id);
//
//    if(!$task) {
//        abort(Response::HTTP_NOT_FOUND);
//    }

    return view('show' , ['task' => $task]);

})->name('tasks.show');


Route::post("/tasks/",function(TaskRequest $request){
//    $data = $request->validate([
//        'title' => 'required|max:255',
//        'description' => 'required',
//        'long_description' => 'required'
//    ]);

//    $data = $request->validated();
//
//    $task = new Task;
//
//    $task->title = $data['title'];
//    $task->description = $data['description'];
//    $task->long_description = $data['long_description'];

//    $task->save();

    $task = Task::create($request->validated());

    return redirect()->
        route('tasks.show', ['task' => $task->id])->
        with('success','Task Created Successfully!');

})->name("tasks.store");

Route::put("/tasks/{task}",function(Task $task, TaskRequest $request){
//    $data = $request->validate([
//        'title' => 'required|max:255',
//        'description' => 'required',
//        'long_description' => 'required'
//    ]);

//    $task->title = $data['title'];
//    $task->description = $data['description'];
//    $task->long_description = $data['long_description'];
//
//    $task->save();


    $task->update($request->validated());

    return redirect()->
        route('tasks.show', ['task' => $task->id])->
        with('success','Task Updated Successfully!');

})->name("tasks.update");

Route::delete('/tasks/{task}',function(Task $task){
    $task->delete();
    return redirect()->
        route('tasks.index')->
        with('success', 'Task deleted successfully!');
})->name('tasks.destroy');

Route::put("/tasks/{task}/toggle-complete",function(Task $task){
    $task->toggleComplete();
    return redirect()->back()->with("success","Task updated successfully!");
})->name('tasks.toggle-complete');

Route::fallback(function(){
    return 'There is something went wrong, dude!';
});

//Route::get('/greet',function(){
//    return "Hello";
//})->name("hello");
//Route::get("/greet/{name}",function($name){
//    return "Hello " . $name;
//});
//// Route::get("/hello",function(){
////     return redirect('/greet');
//// });
//Route::get("/hello",function(){
//    return redirect()->route('hello');
//});
//

