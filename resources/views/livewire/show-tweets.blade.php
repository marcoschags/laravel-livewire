<div>
   Show Tweets

  <p>{{ $message }}</p>

  <textarea name="message" id="message" cols="30" rows="10">{{ $message }}</textarea>
  <input type="text" name="message" id="message" wire:model="message" />

  <hr>

  @foreach ($tweets as $tweet)
    <div class="tweet">
      <h3>{{ $tweet->user->name }}</h3>
      <p>{{ $tweet->content }}</p>
      <small>
        Posted at: {{ $tweet->created_at ? $tweet->created_at->diffForHumans() : 'Data indisponível' }}
      </small>
    </div>
  @endforeach
</div>
