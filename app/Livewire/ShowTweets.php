<?php

namespace App\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{
    public $content = 'Apenas um teste -> ';

    protected $rules = [
        'content' => 'required|min:3|max:255',
    ];

    public function render()
    {
        // $tweets = Tweet::get();
         $tweets = Tweet::with('user')->get();
        return view('livewire.show-tweets', compact('tweets'));
    }

    public function createTweet()
    {
        $this->validate();

        Tweet::create([
            'content' => $this->content,
            'user_id' => 1,
        ]);

        $this->content = '';

        session()->flash('success', 'Tweet created successfully!');
    }
}
