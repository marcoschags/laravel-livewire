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
        // $tweets = Tweet::get();
         $tweets = Tweet::with('user')
                    ->latest()
                    ->paginate(10);
        return view('livewire.show-tweets', compact('tweets'));
    }

    public function create()
    {
        $this->validate();

        Auth()->user()->tweets()->create([
                'content' => $this->content,
            ]);

        // Tweet::create([
        //     'content' => $this->content,
        //     'user_id' => Auth()->user()->id,
        // ]);
    }
}
