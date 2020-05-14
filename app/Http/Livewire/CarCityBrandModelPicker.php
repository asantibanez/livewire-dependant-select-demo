<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CarCityBrandModelPicker extends Component
{
    public $city;
    public $brand;
    public $model;
    public $message;

    protected $listeners = [
        'citySelected' => 'setCity',
        'brandSelected' => 'setBrand',
        'modelSelected' => 'setModel',
    ];

    public function setCity($data)
    {
        $this->city = $data['value'];
        $this->brand = null;
        $this->model = null;
    }

    public function setBrand($data)
    {
        $this->brand = $data['value'];
        $this->model = null;
    }

    public function setModel($data)
    {
        $this->model = $data['value'];
    }

    public function cities()
    {
        return [
            'Guayaquil',
            'New York',
            'Rome',
            'Paris',
        ];
    }

    public function brands()
    {
        if ($this->city == null) {
            return [];
        }

        $brandsByCity = [
            'Guayaquil' => [
                'Nissan',
                'Chevrolet',
            ],
            'New York' => [
                'GMC',
                'Ford',
            ],
            'Rome' => [
                'Fiat',
            ],
            'Paris' => [
                'Volvo',
                'Volkswagen',
            ],
        ];

        return $brandsByCity[$this->city];
    }

    public function models()
    {
        if ($this->brand == null) {
            return [];
        }

        $modelsByBrand = [
            'Nissan' => [
                'Versa',
                'Tiida',
                'Patrol',
            ],
            'Chevrolet' => [
                'Tahoe',
                'Suburban',
            ],
            'GMC' => [
                'Yukon',
            ],
            'Ford' => [
                'Fiesta',
                'Explorer',
            ],
            'Fiat' => [
                'Uno',
            ],
            'Volvo' => [
                'S60',
                'S40',
            ],
            'Volkswagen' => [
                'Jetta',
                'Polo',
            ],
        ];

        return $modelsByBrand[$this->brand];
    }

    public function onMakeItRainClick()
    {
        $this->message = "We've got your back! Looking for your {$this->brand} {$this->model} in {$this->city} right now. You'll hear from us shortly 👍!";
    }

    public function render()
    {
        return view('livewire.car-city-brand-model-picker')
            ->with([
                'cities' => $this->cities(),
                'brands' => $this->brands(),
                'models' => $this->models(),
                'ready' => $this->city != null && $this->brand != null && $this->model != null,
            ]);
    }
}
