@extends('layouts.layout')

@section('contect')
{{-- content --}}
<div class="flex justify-center mt-10 flex-col w-1/3 mx-auto">
  {{-- BUBBLE CHAT --}}
  <div class="chat chat-start">
    <div class="chat-header">
      Task
      <time class="text-xs opacity-50">{{ $task->tanggal }}</time>
    </div>
    <div class="chat-bubble">{{ $task->task }}</div>
  </div>
  @foreach ($comments as $comment)
  <div class="chat chat-end">
    <div class="chat-header">
      Comments
      <time class="text-xs opacity-50">{{ $comment->tanggal }}</time>
    </div>
    <div class="chat-bubble">{{ $comment->comment }}</div>
    <form action="/deleteComment/{{ $comment->comment_id }}" method="POST" class="chat-footer opacity-50">
      @method('DELETE')
      @csrf
      <button>
        Delete
      </button>
    </form>
  </div>
  @endforeach
  {{-- AKHIR BUBBLE CHAT --}}
  {{-- search bar --}}
  <form action="/addComment" method="POST" class="my-10">
    @csrf
    <input type="hidden" name="task_id" value="{{ $task->id }}">
    <label class="form-control w-full max-w-lg mx-auto">
      <div class="flex relative">
        <input name="comment" type="text" placeholder="Add Comment"
          class="input input-bordered input-success w-full max-w-lg" autocomplete="off" />
        {{-- button add --}}
        <button type="submit" class="w-12 h-full bg-transparent absolute self-center right-0">&#10148;</button>
        {{-- akhir button add --}}
      </div>
      @error('comment')
      <span class="text-red-600">{{ $message }}</span>
      @enderror
    </label>
  </form>
  {{-- akhir search bar --}}

</div>
{{-- akhir content --}}
@endsection