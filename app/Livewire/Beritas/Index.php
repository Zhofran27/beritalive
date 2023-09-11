<?php

namespace App\Livewire\Beritas;

use App\Models\Berita;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;

    public function destroy($id)
    {
        Berita::destroy($id);

        session()->flash('message', 'Data Berhasil Dihapus');

        return redirect()->route(beritas.index);
    }

    public function render()
    {
        return view('livewire.beritas.index', [
            'beritas' => Berita::latest()->paginate(5)
        ]);
    }
}
