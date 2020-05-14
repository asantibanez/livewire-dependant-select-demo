<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Select extends Component
{
    public $value;

    public $title;

    public $options;

    public $emitUpEvent;

    public function mount($title, $options, $value, $emitUpEvent = null)
    {
        $this->title = $title;

        $this->options = $options;

        $this->value = $value;

        $this->emitUpEvent = $emitUpEvent;
    }

    public function updatedValue()
    {
        if ($this->emitUpEvent == null) {
            return;
        }

        $this->emitUp($this->emitUpEvent, [
            'value' => $this->value
        ]);
    }

    public function render()
    {
        return view('livewire.select');
    }
}
