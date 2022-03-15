<?php

namespace App\Http\Livewire;

use App\Models\PodCast as ModelsPodCast;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PodCast extends Component
{
    use WithFileUploads;
    public $title ;
    public $desc ;
    public $image ;
    public $audio ;
    
    protected function rules()
    {
        return [
            'title'     => 'required',
            'desc'     => 'nullable',
            'image'     => 'required|max:512',
            // |dimensions:max_width=100,max_height=100
            'audio'     => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav|max:25000',
    
        ];
    }
    private function resetForm() {
		$this->title                  = "";
		$this->image                 = "";
		$this->audio              = "";
		$this->desc = "";
	}
    public function mount(){
        if(Auth::user() == null){
            session()->flash('message', "u need to log in first");
            return redirect('/');
        }
    }
    public function podcast_create()
    {
        $data = $this->validate();
		ModelsPodCast::create([
			'title'     => $data['title'],
			'desc'    => $data['desc'],
			'image'    => $data['image'],
			'mp3'    => $data['audio'],
			'user_id'    =>Auth::user()->id,
		]);
		session()->flash('success', "u successfully added pod cast");
		$this->resetForm();
		$this->render();
    }
    public function render()
    {
        return view('livewire.pod-cast')->extends('layouts.app')->section('content');
    }
}
