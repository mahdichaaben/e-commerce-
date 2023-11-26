
@props(['product'])
@php
use Illuminate\Support\Facades\Auth;
@endphp
<div class="bg-white rounded-lg border p-2 my-4 mx-6">
    <h3 class="font-bold">Discussion</h3>
    <form >
        <div class="flex flex-col">
@foreach ($product->comments as $comment)
    <div class="border rounded-md p-3 ml-3 my-3">
        <div class="flex gap-3 items-center">
            <!-- Assuming you have a "users" table with a "name" and "image" column for users -->
            <img src="{{Storage::url($comment->user->image)}}" class="object-cover w-8 h-8 rounded-full border-2 border-emerald-400 shadow-emerald-400">
            <h3 class="font-bold">{{$comment->user->name }}</h3>
        </div>
        <p class="text-gray-600 mt-2">{{ $comment->body }}</p>
        <p class="text-gray-400 text-sm">Posted on:  <time>{{$comment->created_at->diffForHumans()}}</time></p>
    </div>
@endforeach

        </div>
        @auth
        <form method="POST" action="{{route('comments.store')}}">
            @csrf
            <input type="hidden" name="user_id" value="1">
            <input type="hidden" name="product_id" value="1">
            <div class="w-full px-3 my-2">
                <textarea name="body" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder="Type Your Comment" required></textarea>
            </div>
            @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="w-full flex justify-end px-3">
                <button type="submit" class="px-2.5 py-1.5 rounded-md text-white text-sm bg-indigo-500" >Post Comment</button>
            </div>
        </form>
        
    @endauth
</div>

