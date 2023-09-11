<?php

namespace App\Livewire\Beritas;

use App\Models\Berita;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class Edit extends Component
{

    use WithFileUploads;
//id post
    public $beritaID;
    //image
    public $image;
    #[Rule('required', message: 'Masukkan Judul Post')]
    public $title;

    #[Rule('required', message: 'Masukkan Isi Post')]
    #[Rule('min:3', message: 'Isi Post Minimal 3 Karakter')]
    public $content;

    public $date;

    public function mount($id)
    {
        //get post
        $berita = Berita::find($id);
        //assign
        $this->beritaID = $berita->id;
        $this->title = $berita->title;
        $this->content = $berita->content;
        $this->date = $berita->date;
    }
    /**
    * update
    *
    * @return void
    */
    public function update()
    {
        $this->validate();
        //get post
        $berita = Berita::find($this->beritaID);
        //check if image
        if ($this->image) {
        //store image in storage/app/public/posts
        $this->image->storeAs('public/beritas', $this->image->hashName());

        //update post
        $berita->update([
        'image' => $this->image->hashName(),
        'title' => $this->title,
        'content' => $this->content,
        'date' => $this->date,
        ]);
        } else {
        //update post
        $berita->update([
        'title' => $this->title,
        'content' => $this->content,
        'date' => $this->date,
        ]);

        }
        //flash message
        session()->flash('message', 'Data Berhasil Diupdate.');
        //redirect
        return redirect()->route('beritas.index');
}

    public function render()
    {
        return view('livewire.beritas.edit');
    }
}
