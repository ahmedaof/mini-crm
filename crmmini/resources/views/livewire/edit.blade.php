<div class="modal fade show @if ($showEditModal) d-block @endif" role="dialog" style="max-height: calc(100vh);
    overflow-y: auto; background-color: #22222255;" id="modalbody">
<div class="modal-dialog" id="innerbox">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">edit</h4>
                    <button wire:click="closemodal" type="button" class="close">&times;</button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="podcast_update">
                        <div class="justify-content-center">
                            <h4 class="col-md-4">
                                update podcast
                            </h4>
                            <div id="validation-errors"></div>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="form-group row mx-1">
                                        <label for="name" class="label-control">title</label>
                                        <input wire:model.lazy="title"
                                        class="form-control" placeholder="title" name="title" type="text">
                                            @error('title')
                                            <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="form-group row mx-1">
                                        <label for="name" class="label-control">description</label>
                                        <input wire:model="desc"
                                        class="form-control" placeholder="desc" name="desc" type="text">
                                            @error('desc')
                                            <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="form-group row mx-1">
                                        <label for="name" class="label-control">image</label>
                                        <input wire:model="image_new"
                                        class="form-control" placeholder="image" name="image" type="file">
                                       <img style="width: 50px; height:50px" src="{{ asset('') }}images/podcast/{{ $podcast->image }}" alt="England flag" />

                                            @error('image_new')
                                            <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="form-group row mx-1">
                                        <label for="name" class="label-control">audio</label>
                                        <input wire:model="audio_new"
                                        class="form-control" placeholder="audio" name="audio" type="file">
                                        <audio controls>
                                            <source src="{{ asset('') }}audio/podcast/{{ $podcast->mp3 }}" type="audio/ogg">
                                          </audio>
                                            @error('audio_new')
                                            <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                                            @enderror
                                    </div>
                                </div>
                            </div>  
                            <div class="row justify-content-center mt-3">
                                
               
                                    <button wire:loading.attr="disabled" type="submit" class="btn btn-success col-md-3">
                                        <i class="la la-check"></i> update podcast
                                       </button>
                                 
                               </div>
                               @if ($message = Session::get('success'))
                               <div class="alert alert-success alert-block mt-3 mb-3">
                                   <strong>{{ $message }}</strong>
                               </div>
                               @endif
                           </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
