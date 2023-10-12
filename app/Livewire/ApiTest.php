<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ApiTest extends Component
{

    public $data = [];
    public function fetch(){
            $response = Http::get('http://localhost:8000/api/categories');

            $this->data = $response->json();
    }

    public function render()
    {

        return view('livewire.api-test',[
            'data' => $this->data
        ]);
    }
}
