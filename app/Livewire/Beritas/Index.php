<?php

namespace App\Livewire\Beritas;

use App\Models\Berita;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.beritas.index', [
            'beritas' => Berita::latest()->paginate(5)
        ]);
    }
}
