<?php

namespace App\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;
use mysql_xdevapi\Warning;

class SliderList extends Component
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
        $sliders = Slider::query()->where('title','like','%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.slider-list',compact('sliders'));
    }
    public function deleteConfirm($id)
    {
        $slider = Slider::query()->find($id);
        $this->dispatch('deleteSlider',sliderId: $slider->id);
    }
    public function delete($id)
    {
        $slider = Slider::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }
    public function changeStatus($id){
        $slider = Slider::query()->find($id);
        if($slider->status == 1){
            $slider->update(['status' => 0]);
        } else {
            $slider->update(['status' => 1]);
        }
    }
}
