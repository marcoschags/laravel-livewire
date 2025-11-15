<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class UploadPhoto extends Component
{

    use WithFileUploads;

    public $photo;

    public function render()
    {
        return view('livewire.user.upload-photo');
    }

    public function storagePhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

        // Recupera o usuário autenticado
        $user = auth()->user();

        $nameFile = Str::slug($user->name) . '.' . $this->photo->getClientOriginalExtension();

        if ($path = $this->photo->storeAs('users', $nameFile)) {
            // Salva o caminho da foto no banco de dados do usuário
            $user->update([
                'profile_photo_path' => $path, // Nome da coluna no banco de dados
            ]);
    }

    return redirect()->route('tweets');
    
    }
}
