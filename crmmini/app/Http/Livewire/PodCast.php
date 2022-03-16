<?php

namespace App\Http\Livewire;

use App\Models\PodCast as ModelsPodCast;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class PodCast extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $title ;
    public $desc ;
    public $image ;
    public $image_new ;
    public $audio_new ;
    public $podcast_id ;
    public $Id ;
    public $audio ;
    public $showEditModal = false ;
    
    protected function rules()
    {
        return [
            'title'     => 'required',
            'desc'     => 'nullable',
             'image'     => 'required|max:512|dimensions:max_width=100,max_height=100',
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
        $imagename = time() . '.' . $this->image->extension();
        $name = time() . '.' . $this->audio->extension();
        $relPath = 'images/podcast/';
        if (!file_exists(public_path($relPath))) {
            mkdir(public_path($relPath), 777, true);
        }
     
        $fileName = uniqid() . '.' . $this->audio->extension();
        $uploadedFile = $this->audio->store('audio/', 'userpublic');
        $attachFile = substr($uploadedFile, strpos($uploadedFile, "//")+2);
        \File::move(base_path('public/'.$uploadedFile),base_path('/public/audio/podcast/'.$fileName));

       
         Image::make($this->image)->save($relPath . $imagename);
		ModelsPodCast::create([
			'title'     => $data['title'],
			'desc'    => $data['desc'],
			'image'    => $imagename,
			'mp3'    => $fileName,
			'user_id'    =>Auth::user()->id,
		]);
		session()->flash('success', "u successfully added pod cast");
    $this->alert('success', 'added success ');
		$this->resetForm();
		$this->render();
    }

    public function editModel($id){
      $podcast = ModelsPodCast::where('id',$id)->with('user')->first();
        if($podcast->user_id == Auth::user()->id){

          $this->title = $podcast->title ;
          $this->desc = $podcast->desc ;
          $this->audio = $podcast->mp3 ;
          $this->image = $podcast->image ;
          $this->podcast_id = $id;
        $this->showEditModal = true ;
        }else{
          $this->alert('question', 'edit only by creator '. $podcast->user->name, [
            'showConfirmButton' => true,
            'confirmButtonText' => 'ok',
        ]);
        }
        }
  
    public function getListeners()
{
    return [
    	'confirmed',
    
    ];
}
    public function delete($id){
      $this->Id = $id ;
      $this->confirm('Are u sure that u want to delete?', [
        'onConfirmed' => 'confirmed',
    ]);
      // $podcast = ModelsPodCast::findOrFail($id)->first();

    }
    public function confirmed()
{
  
  $podcast = ModelsPodCast::findOrFail($this->Id);
  $podcast->delete();
         $this->alert('warning', 'deleted success ');

}
    public function podcast_update(){
      $podcast = ModelsPodCast::findOrFail($this->podcast_id);
      $data = $this->validate(
        ['title'    => 'required',
        'desc'     => 'nullable',
        'image'    => 'required|max:512|dimensions:max_width=100,max_height=100',
         'audio'     => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav|max:25000',
        ]
    );
    if($this->image_new != ''){ $relPath = 'images/podcast/';
      $imagename = time() . '.' . $this->image_new->extension();
      if (!file_exists(public_path($relPath))) {
        mkdir(public_path($relPath), 777, true);
      }
      Image::make($this->image_new)->save($relPath . $imagename);}
      if($this->audio_new != ''){

        $name = time() . '.' . $this->audio_new->extension();
        $fileName = uniqid() . '.' . $this->audio_new->extension();
        $uploadedFile = $this->audio_new->store('audio/', 'userpublic');
        $attachFile = substr($uploadedFile, strpos($uploadedFile, "//")+2);
        \File::move(base_path('public/'.$uploadedFile),base_path('/public/audio/podcast/'.$fileName));
      }
      $podcast->title = $data['title'];
      $podcast->desc    = $data['desc'];
      $podcast->image   = $this->image_new != '' ? $imagename : $this->image;
      $podcast->mp3    = $this->audio_new != '' ? $fileName : $this->audio ;
      $podcast->user_id   =Auth::user()->id;
      $podcast->save();
      $this->showEditModal = false ;
      $this->alert('success', 'updated success ');
    }
    public function closemodal(){
      $this->showEditModal = false ;
    }
    public function render()
    {
        $podcasts = ModelsPodCast::get();
        return view('livewire.pod-cast',['podcasts' => $podcasts])->extends('layouts.app')->section('content');
    }
}
