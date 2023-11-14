@extends('layouts.app')

@section('title','The list of tasks')

@section('content')
    <nav class="mb-4">
        <i class="fa-solid fa-house"></i>
        <a href="{{route("tasks.create")}}" class="btn hover:bg-gray-700">Add task!</a>
    </nav>
        @forelse($tasks as $task)
            <div class="task">
                <a @class(['line-through' => $task->completed]) href="{{route("tasks.show",['task' => $task])}}">{{$task->title}}</a>
            </div>
        @empty
            <div>There are no tasks</div>
        @endforelse
        @if($tasks->count())
            <nav class="mt-4">
                {{$tasks->links()}}
            </nav>
        @endif
@endsection

