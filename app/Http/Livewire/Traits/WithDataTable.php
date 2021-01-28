<?php


namespace App\Http\Livewire\Traits;


trait WithDataTable
{


    public bool $timestamps = false;
    // Sorting
    public string $sortField = 'created_at';
    public string $sortDirection = 'asc';


    // Filters
    public bool $showFilters = false;

    /** sorting methods
     * @param $field
     */

    public function sortBy($field)
    {
        if ($this->sortField == $field) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->reset('sortDirection');
            $this->sortField = $field;
        }
    }

    public function applySorting($query)
    {
        return $query->orderBy($this->sortField, $this->sortDirection);
    }


    /** Advance Search methods */

    public function updatedFilters() {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset('filters');
    }



}
