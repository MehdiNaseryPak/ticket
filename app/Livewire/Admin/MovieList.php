<?php

namespace App\Livewire\Admin;

use App\Models\Movie;
use Livewire\Component;
use Livewire\WithPagination;

class MovieList extends Component
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
        $movies = Movie::query()->where('name' , 'like' , '%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.movie-list',compact('movies'));
    }
    public function deleteConfirm($id)
    {
        $movie = Movie::query()->find($id);
        $this->dispatch('deleteMovie',movieId: $movie->id);
    }
    public function delete($id)
    {
        $movie = Movie::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }
    public function changeStatus($id){
        $movie = Movie::query()->find($id);
        if($movie->status == 1){
            $movie->update(['status' => 0]);
        } else {
            $movie->update(['status' => 1]);
        }
    }
    public function changeCommentable($id){
        $movie = Movie::query()->find($id);
        if($movie->commentable == 1){
            $movie->update(['commentable' => 0]);
        } else {
            $movie->update(['commentable' => 1]);
        }
    }
}
