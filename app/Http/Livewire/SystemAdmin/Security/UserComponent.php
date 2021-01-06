<?php

namespace App\Http\Livewire\SystemAdmin\Security;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UserComponent extends Component
{
    use WithPagination;


    public $search = '', $filterRole, $filterJob;
    public $user, $userServicepersonName, $selectedId;
    public $updateMode = false;
    public $roles, $userRoles, $userRoleIds;
    public $title = 'User';
    public $record;


    public function mount(){
        $this->roles = Role::all('id','name');
    }


    public function render()
    {
        $searchTerm = $this->search . '%';
        return view('livewire.system-administration.security.user-component',[
            'data' => User::query()

                ->whereHas('serviceperson', function ($query) use($searchTerm){
                $query->where('last_name', 'like', $searchTerm)
                    ->orWhere('first_name', 'like', $searchTerm)
                    ->orWhere('number', 'like', $searchTerm);
            })->with([
                'serviceperson', 'serviceperson.currentUnit','serviceperson.promotions',
                'serviceperson.lastPromotion.rank', 'serviceperson.currentJob.job',
                'serviceperson.phoneNumbers:number', 'serviceperson.emailAddresses:email',
                'serviceperson.lastEnlistment','serviceperson.status', 'serviceperson.photo'
            ])
                ->orWhereHas('roles', function ($query) use($searchTerm){
                    $query->where('name', 'like', $searchTerm);
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10)
        ]);
    }

    public function reloadUpdateField()
    {
        $this->updateMode = false;
        $this->updateMode = true;
    }

    public function resetInput()
    {
        $this->userServicepersonName = null;
        $this->reset('userRoles');
    }

    public function edit($id)
    {
//        $this->updateMode = false;

        $this->user = User::findOrFail($id);
        $this->selectedId = $id;
        $this->userServicepersonName = $this->user->serviceperson->name;
        $this->userRoleIds = $this->user->roles->pluck('id');

//        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'userRoles' => 'required',
        ],[
            'userRoles.required' => 'A user must have at least one role'
        ]);

        if ($this->selectedId) {
            $record = User::find($this->selectedId);
            $record->syncRoles($this->userRoles);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

}
