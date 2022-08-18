<?php

namespace Wainwright\CasinoDog\Controllers\Livewire;

use Livewire\Component;

class FormActions extends Component
{
    public $title;
    public $attributes;

        public $name;
        public $email;
        public $body;

        public function submit()
        {
            $validatedData = $this->validate([
                'name' => 'required|min:6',
                'email' => 'required|email',
                'body' => 'required',
            ]);

            Contact::create($validatedData);

            return redirect()->to('/form');
        }

    public function render()
    {

        return view('wainwright::livewire.partials.form-actions');
    }
}
