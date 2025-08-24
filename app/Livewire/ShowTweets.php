<?php

namespace App\Livewire;

use App\Models\Tweet;
use Livewire\Component;
use Livewire\WithPagination; // <--- IMPORTANTE

class ShowTweets extends Component
{
    use WithPagination; // <--- NECESSÁRIO

    public $message = 'Apenas um teste -> ';

    public function render()
    {
        $tweets = Tweet::with('user')
                       ->latest()
                       ->paginate(10);

        return view('livewire.show-tweets', compact('tweets'));
    }

    public function createTweet()
    {
        Tweet::create([
            'content' => $this->message,
            'user_id' => 1,
        ]);

        $this->message = '';

        session()->flash('success', 'Tweet created successfully!');
    }
}
