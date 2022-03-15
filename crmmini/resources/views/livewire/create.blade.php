<div class="card-content collapse show mb-5">
    <div class="card-body">
        <form wire:submit.prevent="podcast_create">
         <div class="justify-content-center">
             <h4 class="col-md-4 offset-md-5">
                 create podcast
             </h4>
             <div id="validation-errors"></div>
             <div class="row justify-content-center">
                 <div class="col-md-6">
                     <div class="form-group row mx-1">
                         <label for="name" class="label-control">title</label>
                         <input wire:model="title"
                         class="form-control" placeholder="title" name="title" type="text">
                             @error('title')
                             <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                             @enderror
                     </div>
                 </div>
             </div>
             <div class="row justify-content-center">
                 <div class="col-md-6">
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
                 <div class="col-md-6">
                     <div class="form-group row mx-1">
                         <label for="name" class="label-control">image</label>
                         <input wire:model="image"
                         class="form-control" placeholder="image" name="image" type="file">
                             @error('image')
                             <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                             @enderror
                     </div>
                 </div>
             </div>
             <div class="row justify-content-center">
                 <div class="col-md-6">
                     <div class="form-group row mx-1">
                         <label for="name" class="label-control">audio</label>
                         <input wire:model="audio"
                         class="form-control" placeholder="audio" name="audio" type="file">
                             @error('audio')
                             <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                             @enderror
                     </div>
                 </div>
             </div>  
             <div class="row justify-content-center mt-3">
                 

                     <button wire:loading.attr="disabled" type="submit" class="btn btn-success col-md-3">
                         <i class="la la-check"></i> add podcast
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
