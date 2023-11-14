@extends("layouts.app")

@section("title", isset($task) ? "Edit task" : "Add Task")
@section("content")
    <form action="{{isset($task) ? route("tasks.update",['task' => $task->id]) :route("tasks.store")}}" method="POST">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset

        <div class="mb-4">
            <label for="title">title</label>
            <input type="text" name="title" @class(['border-red-500' => $errors->has('title'),'p-1']) id="title" value="{{$task->title ?? old('title')}}"/>
            @error('title')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description">description</label>
            <textarea name="description" id="description" cols="30" rows="5"
            @class(['border-red-500' => $errors->has('description'),'area'])>{{$task->derscription ?? old('description')}}
            </textarea>
            @error('description')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="long_description">long description</label>
            <textarea name="long_description" id="long_description" cols="30" rows="10"
            @class(['border-red-500' => $errors->has('long_description'),'area'])>{{$task->long_derscription ?? old('long_description')}}
            </textarea>
            @error('long_description')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="flex gap-2">
            <input type="submit" class="btn hover:bg-gray-700" value="{{isset($task) ? "Edit task" : "Add task"}}">
            <a class="btn hover:bg-gray-700" href="{{route('tasks.index')}}">Cancel</a>
        </div>
    </form>
@endsection



