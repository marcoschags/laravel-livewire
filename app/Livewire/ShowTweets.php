<?php

namespace App\Livewire;

use App\Models\Tweet;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    use WithPagination;

    public $content = 'Apenas um teste -> ';

    protected $rules = [
        'content' => 'required|min:3|max:255',
    ];

    public function render()
    {
        $tweets = Tweet::with(['user', 'likes'])
                    ->latest()
                    ->paginate(10);

        return view('livewire.show-tweets', compact('tweets'));
    }

    public function createTweet()
    {
        $this->validate();

        auth()->user()->tweets()->create([
            'content' => $this->content,
        ]);

        $this->content = '';
        session()->flash('message', 'Tweet criado com sucesso.');
    }

    public function like($tweetId)
    {
        $userId = auth()->id();
        $tweet = Tweet::find($tweetId);

        if (! $tweet) {
            return;
        }

        // evita likes duplicados
        if ($tweet->likes()->where('user_id', $userId)->exists()) {
            return;
        }

        $tweet->likes()->create([
            'user_id' => $userId,
        ]);
    }

    public function unlike($tweetId)
    {
        $userId = auth()->id();
        $tweet = Tweet::find($tweetId);

        if (! $tweet) {
            return;
        }

        // encontra o like existente
        $like = $tweet->likes()->where('user_id', $userId)->first();

        if ($like) {
            $like->delete();
        }
    }
}
