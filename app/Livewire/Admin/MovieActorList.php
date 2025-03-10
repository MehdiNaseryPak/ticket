<?php

namespace App\Livewire\Admin;

use App\Models\Actor;
use App\Models\Movie;
use Livewire\Component;
use Livewire\WithPagination;

class MovieActorList extends Component
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
        $actors = Movie::find($this->movie_id)->actors()->paginate(10);
        return view('livewire.admin.movie-actor-list',compact('actors'));
    }
    public function deleteConfirm($id)
    {
        $actor = Actor::query()->find($id);
        $this->dispatch('deleteMovieActor',movieActorId: $actor->id);
    }
    public function delete($id)
    {
        $actors = Movie::find($this->movie_id)->actors()->detach([$id]);
        $this->dispatch('refreshComponent');
    }

}
