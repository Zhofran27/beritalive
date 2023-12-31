<?php

namespace App\Livewire\Beritas;

use App\Models\Berita;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;


class Create extends Component
{

    use WithFileUploads;
//image
#[Rule('required', message: 'Masukkan Gambar Post')]
#[Rule('image', message: 'File Harus Gambar')]
#[Rule('max:1024', message: 'Ukuran File Maksimal 1MB')]
public $image;

//title
#[Rule('required', message: 'Masukkan Judul Post')]
public $title;

//content
#[Rule('required', message: 'Masukkan Isi Post')]
#[Rule('min:3', message: 'Isi Post Minimal 3 Karakter')]
public $content;

public $date;

/**
* store
*
* @return void
*/
public function store()
{
    $this->validate();
    //store image in storage/app/public/posts
    $this->image->storeAs('public/beritas', $this->image->hashName());
    //create post
    Berita::create([
    'image' => $this->image->hashName(),
    'title' => $this->title,
    'content' => $this->content,
    'date' => $this->date,
]);
//flash message

session()->flash('message', 'Data Berhasil Disimpan.');
//redirect
return redirect()->route('beritas.index');
}

    public function render()
    {
        return view('livewire.beritas.create');
    }
}
