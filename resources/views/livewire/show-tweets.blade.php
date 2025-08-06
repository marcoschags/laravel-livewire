<div>
   Show Tweets
    <p>{{ $message }}</p>

    <textarea name="message" id="message" cols="30" rows="10" wire:model="message">Teste área de teste</textarea>
    <input type="text" name="message" id="message" wire:model="message">

    <hr>

    @foreach($tweets as $tweet)
        {{ $tweet->user->name }} - {{ $tweet->content }} <br>
    @endforeach
</div>
