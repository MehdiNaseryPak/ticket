<?php

namespace App\Livewire\Admin;

use App\Models\Position;
use Livewire\Component;
use Livewire\WithPagination;

class PositionList extends Component
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
        $positions = Position::query()->where('row' , 'like' , '%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.position-list',compact('positions'));
    }
    public function deleteConfirm($id)
    {
        $position = Position::query()->find($id);
        $this->dispatch('deletePosition',positionId: $position->id);
    }
    public function delete($id)
    {
        $position = Position::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }
    public function changeStatus($id){
        $position = Position::query()->find($id);
        if($position->status == 1){
            $position->update(['status' => 0]);
        } else {
            $position->update(['status' => 1]);
        }
    }
}
