<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $listeners = [
        'delete',
        'refreshComponent' => '$refresh'
    ];
    public function render()
    {
        $users = User::query()->where('name' , 'like' , '%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.user-list',compact('users'));
    }
    public function deleteConfirm($id)
    {
        $user = User::query()->find($id);
        $this->dispatch('deleteUser',userId: $user->id);
    }
    public function delete($id)
    {
        $user = User::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }
    public function changeStatus($id){
        $user = User::query()->find($id);
        if($user->status == 1){
            $user->update(['status' => 0]);
        } else {
            $user->update(['status' => 1]);
        }
    }
}
