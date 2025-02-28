<?php

namespace App\Livewire;

use App\Models\Wishes;
use Illuminate\Http\Request;
use Livewire\Component;

class CreateWish extends Component
{
    public $name;
    public $comment;
    public $guestName;

    protected $rules = [
        'name' => 'required',
        'comment' => 'required',
    ];

    public function mount($guestName = null)
    {
        // If a guest name is provided, use it to prefill the name field
        if ($guestName) {
            $this->name = $guestName;
        }
    }

    public function render()
    {
        return view('livewire.create-wish');
    }

    public function createWish()
    {
        $this->validate();

        Wishes::create([
            'wedding_id' => 1,
            'name' => $this->name,
            'comment' => $this->comment
        ]);

        $this->name = "";
        $this->comment = "";
        $this->dispatch('wishCreated');
    }
}
