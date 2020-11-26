<?php


namespace App\Http\Livewire\Traits;


trait WithAlerts
{

    public function confirmDelete($id)
    {
        $this->emit("swal:confirm",[
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => "You won't be able to revert this!",
            'confirmText' => 'Yes, delete!',
            'method' => 'destroy',
            'params' => $id,
        ]);
    }

    public function showDeleteAlert()
    {
        $this->emit("swal:alert",[
            'icon' => 'info',
            'title' => 'Item Removed.',
            'timeout' => 3000
        ]);
    }

    public function showSuccessAlert()
    {
        $this->emit("swal:alert", [
            'icon' => 'success',
            'title' => $this->selectedId
                ? ucfirst($this->title) . ' Updated Successfully.'
                : ucfirst($this->title) . ' Created Successfully.',
            'timeout' => 5000
        ]);
    }
}
