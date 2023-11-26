<div class="bg-white rounded-lg border p-2 my-4 mx-6">
    <h3 class="font-bold">Discussion</h3>

    <div class="flex flex-col max-h-[40vh] overflow-scroll">
        @foreach ($product->comments as $comment)
            <div class="border group flex justify-between rounded-md p-3 ml-3 my-3">
                <div>
                <div class="flex gap-3 items-center">
                    <!-- Assuming you have a "users" table with a "name" and "image" column for users -->
                    <img src="{{ Storage::url($comment->user->image) }}" class="object-cover w-8 h-8 rounded-full border-2 border-emerald-400 shadow-emerald-400">
                    <h3 class="font-bold">{{ $comment->user->name }}</h3>
                </div>
                <p class="text-gray-600 mt-2">{{ $comment->body }}</p>
                <p class="text-gray-400 text-sm">Posted on:  <time>{{ $comment->created_at->diffForHumans() }}</time></p>
            </div>
                @auth
                    @if(Auth::user()->id === $comment->user->id)
                        <form method="POST" action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" class="mt-2 hidden group-hover:flex">

                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="comment_id" value="{{$comment->id }}">
                            <button type="submit" class="px-2 py-1 rounded-md text-white text-sm "><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
                        </form>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>

    @auth
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="w-full px-3 my-2">
                <textarea name="body" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder="Type Your Comment" required></textarea>
            </div>
            @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="w-full flex justify-end px-3">
                <button type="submit" class="px-2.5 py-1.5 rounded-md text-white text-sm bg-indigo-500">Post Comment</button>
            </div>
        </form>
    @endauth
</div>

