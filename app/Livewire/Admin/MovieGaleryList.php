<?php

namespace App\Livewire\Admin;

use App\Models\MovieGallery;
use Livewire\Component;
use Livewire\WithPagination;

class MovieGaleryList extends Component
{
    public $movie_id;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'delete',
        'refreshComponent' => '$refresh'
    ];
    public function mount($movie_id)
    {
        $this->movie_id = $movie_id;
    }
    public function render()
    {
        $images = MovieGallery::query()->where('movie_id' , $this->movie_id)->paginate(10);
        return view('livewire.admin.movie-galery-list',compact('images'));
    }
    public function deleteConfirm($id)
    {
        $movieGallery = MovieGallery::query()->find($id);
        $this->dispatch('deleteMovieGallery',movieGalleryId: $movieGallery->id);
    }
    public function delete($id)
    {
        $movieGallery = MovieGallery::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }
    public function changeStatus($id){
        $movieGallery = MovieGallery::query()->find($id);
        if($movieGallery->status == 1){
            $movieGallery->update(['status' => 0]);
        } else {
            $movieGallery->update(['status' => 1]);
        }
    }

}
