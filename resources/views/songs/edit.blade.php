@extends('layout')
@section('content')
<div class="row">
  <div class="col-sm-12">
     <div class="page-title-box">
        <h4 class="page-title">Songs</h4>
         <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
           <li class="breadcrumb-item active">Songs</li>
        </ol>
     </div>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card m-b-20">
      <div class="card-body">
              <h4 class="mt-0 header-title">Edit Song</h4></p>
      <form method="POST" action="{{route('song.update')}}" enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="hidden" name="id" value="{{$song->id}}">
          <div class="form-group row">
            <label for="example-text-input" class="col-sm-2 col-form-label">Song Name</label>
            <div class="col-sm-10">
            <input class="form-control" name="song_name" type="text" value="{{$song->song_name}}">
            </div>
        </div>
        <div class="form-group row">
          <label for="example-text-input" class="col-sm-2 col-form-label">Artist Name</label>
          <div class="col-sm-10">
          <input class="form-control" name="artist_name" type="text" value="{{$song->artist_name}}">
          </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-sm-2 col-form-label">Upload To</label>
        <div class="col-sm-10" style="display:inline-flex;">
        <input class="form-control" name="song_type[]" type="checkbox" value="1" style="width:4%" onclick="hide()" @if(in_array(1, $song->song_type)) checked @endif> <span class="mt-2">Mixes</span>
        <input class="form-control" name="song_type[]" type="checkbox" value="2" style="width:4%" onclick="showdj()" @if(in_array(2, $song->song_type)) checked @endif> <span class="mt-2">Category</span>
        <input class="form-control" name="song_type[]" type="checkbox" value="3" style="width:4%" onclick="show()" @if(in_array(3, $song->song_type)) checked @endif> <span class="mt-2">Dj</span>
        </div>
    </div>
    <div class="mb-3 row" id="dj" style="display: @if(in_array(3, $song->song_type)) flex @else none @endif;">
      <label class="col-md-2 col-form-label">Dj</label>
      <div class="col-md-10">
          <select class="form-control" name="dj_id">
              <option>Select Dj</option>
              @foreach ($song->dj as $item)
              <option value="{{$item->id}}" @if($item->id == $song->dj_id) selected @endif>{{$item->name}}</option>
              @endforeach
              
          </select>
      </div>
  </div>
  <div class="mb-3 row" id="category" style="display: @if(in_array(2, $song->song_type)) flex @else none @endif;">
    <label class="col-md-2 col-form-label">Category</label>
    <div class="col-md-10">
        <select class="form-control" name="category_id">
            <option>Select Category</option>
            @foreach ($song->category as $item)
            <option value="{{$item->id}}" @if($item->id == $song->category_id) selected @endif>{{$item->name}}</option>
            @endforeach
            
        </select>
    </div>
</div>
  <div class="form-group row">
    <label for="example-text-input" class="col-sm-2 col-form-label">Song Image</label>
                        <div class="col-sm-10">
                        <input class="form-control" name="image" type="file">
                        </div>
  </div>
  <div class="row">
    <img src="{{$song->full_image}}" height="100" width="100">
  </div>
                      <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Song File</label>
                        <div class="col-sm-10">
                        <input class="form-control" name="song" type="file" id="song">
                        </div>
                    </div>
                    <input type="hidden" name="song_length" id="song_length" value="{{strtotime($song->song_length) - strtotime('TODAY') }}">
                      <div class="form-group row">
                          <button type="submit" class="btn btn-success">Save</button>
                      </div>
                      <audio id="audio"></audio>
              </form>
      </div>
    </div>
  </div>
</div>


	<script type="text/javascript">            
    var f_duration =0;  //store duration
    document.getElementById('audio').addEventListener('canplaythrough', function(e){
   
      f_duration = Math.round(e.currentTarget.duration);
      document.getElementById('song_length').value = f_duration;
      URL.revokeObjectURL(obUrl);
    });

   

    var obUrl;
    document.getElementById('song').addEventListener('change', function(e){
    var file = e.currentTarget.files[0];
    
      if(file.name.match(/\.(avi|mp3|mp4|mpeg|ogg)$/i)){
        obUrl = URL.createObjectURL(file);
        document.getElementById('audio').setAttribute('src', obUrl);
      }
      else
      {
        alert('please upload Valid File');
      }
    });

	 document.getElementById('song_url').addEventListener('keyup', function(e){
        document.getElementById('audio').setAttribute('src', $("#song_url").val());
        $('#audio').on('error', function () {
            document.getElementById('song_length').value = '';
        });        
    });

    function hide() {
      document.getElementById('dj').style.display = 'none';
    }

    function show() {
      document.getElementById('dj').style.display = 'flex';
    }

    function showdj() {
      document.getElementById('category').style.display = 'flex';
    }
</script>

@endsection