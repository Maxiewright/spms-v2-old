<?php

namespace App\Http\Livewire\Serviceperson;

use App\Models\Serviceperson\Serviceperson;
use Livewire\Component;

class SearchDropdown extends Component
{

    public $search = '';

    public $searchResults = [];

    public function mount()
    {
        $this->fill(['searchResults' => $this->searchResults]);
    }

    public function resetFilters()
    {
        $this->reset('search');
    }

    public function render()
    {
        $searchTerm = $this->search . '%';

        if (strlen($this->search) >= 2){
            $this->searchResults = Serviceperson::query()
                ->orderBy('created_at', 'desc')
                ->where('last_name', 'like', $searchTerm)
                ->orWhere('first_name', 'like', $searchTerm)
                ->orWhere('number', 'like', $searchTerm)
                ->get();
        }


        return view('livewire.serviceperson.search-dropdown',[
            'searchResults' => $this->searchResults
        ]);


    }

}
