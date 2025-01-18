<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Tutor extends Component
{

    public $nombre;
    public $apellidoP;
    public $apellidoM;


    public function saveTutor(){
        $this->validate([
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',

            // 'email' => 'required|email',
            // 'phone' => 'required',
            // 'address' => 'required',
            // 'city' => 'required',
            // 'state' => 'required',
            // 'zip' => 'required',
            // 'country' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // $imageName = time().'.'.$this->image->extension();
        // $this->image->storeAs('tutors', $imageName);

        // session()->flash('message', 'Tutor Created Successfully.');
        // $this->resetInputFields();
        // $this->emit('tutorAdded');
    }




    public function render()
    {
        return view('livewire.admin.tutor');
    }
}
