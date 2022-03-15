<div>
    @include('livewire.create')
    <hr>
    <div class="container">
      <div class="row justify-content-center">

        <h1 class="offset-md-4">u can read the pod cast from <a href="/">home</a></h1>
      </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">image</th>
            <th scope="col">audio</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($podcasts as $podcast)
          <tr>
            <td>{{ $podcast->title }}</td>
            <td>{{ $podcast->desc }}</td>
            <td><img style="width: 50px; height:50px" src="{{ asset('') }}images/podcast/{{ $podcast->image }}" alt="England flag" />
            </td>
          
            <td>  <audio controls>
              <source src="{{ asset('') }}audio/podcast/{{ $podcast->mp3 }}" type="audio/ogg">
            </audio></td>
            <td>
              <button type="button" wire:click="editModel({{ $podcast->id }})" class="btn btn-primary">Edit</button>
              <button type="button" wire:click="delete({{ $podcast->id }})" class="btn btn-danger">delete</button>
            </td>
            @include('livewire.edit')
          </tr>
          @empty
            <h2>no podcasts added</h2>
          @endforelse
     
        </tbody>
      </table>
    </div>
</div>
