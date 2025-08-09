<?php

namespace App\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{
    public $message = 'Apenas um teste -> ';

    public function render()
    {
        // $tweets = Tweet::get();
         $tweets = Tweet::with('user')->get();
        return view('livewire.show-tweets', compact('tweets'));
    }
}
