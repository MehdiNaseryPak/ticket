<?php

namespace App\Livewire\Admin;

use App\Models\Actor;
use Livewire\Component;
use Livewire\WithPagination;

class ActorList extends Component
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
        $actors = Actor::query()->where('name' , 'like' , '%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.actor-list',compact('actors'));
    }
    public function deleteConfirm($id)
    {
        $actor = Actor::query()->find($id);
        $this->dispatch('deleteActor', actorId: $actor->id);
    }
    public function delete($id)
    {
        $actor = Actor::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }
    public function changeStatus($id){
        $actor = Actor::query()->find($id);
        if($actor->status == 1){
            $actor->update(['status' => 0]);
        } else {
            $actor->update(['status' => 1]);
        }
    }
}
