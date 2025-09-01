<div>
   <h2>Show Tweets</h2>

  <p>{{ $content }}</p>

  <form method="POST" wire:submit.prevent="create">
    <input type="text" name="content" id="content" wire:model="content" />
    @error('content')
        {{ $message }}
    @enderror
    <button type="submit">Criar tweet</button>
  </form>

  <hr>

  @foreach ($tweets as $tweet)
      {{ $tweet->user->name }} - {{ $tweet->content }} <br>
  @endforeach

  <hr>
  <div>
    {{ $tweets->links() }}
  </div>
</div>
