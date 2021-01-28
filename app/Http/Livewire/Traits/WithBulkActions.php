<?php


namespace App\Http\Livewire\Traits;


trait WithBulkActions
{
    public $selectPage = false;
    public $selectAll = false;
    public $selectedRow = [];

    public function renderingWithBulkActions()
    {
        if ($this->selectAll) $this->selectPageRows();
    }

    public function updatedSelectedRow()
    {
        $this->selectAll = false;
        $this->selectPage = false;
    }

    public function updatedSelectPage($value)
    {
        if ($value) return $this->selectPageRows();

        $this->selectAll = false;
        $this->selectedRow = [];
    }

    public function selectPageRows()
    {
        $this->selectedRow = $this->rows->pluck('id')->map(fn($id) => (string) $id);
    }

    public function selectAll()
    {
        $this->selectAll = true;
    }

    public function getSelectedRowsQueryProperty()
    {
        return (clone $this->rowsQuery)
            ->unless($this->selectAll, fn($query) => $query->whereKey($this->selectedRow));
    }
}
