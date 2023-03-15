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
            <div class="row>"> 
          <h4 class="mt-0 header-title">Songs List</h4></p>
          <a class="btn btn-primary float-right" href="{{route('add.song')}}">Add Songs</a>
            </div>
          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <p class="text-muted m-b-30">List of Songs for website.
            <thead>
              <tr>
                <th>#</th>
                <th>Song Name</th>
                <th>Artist Name</th>
                <th>Song Image</th>
                <th>Song Belongs To</th>
                <th>Song Length</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse($songs as $song)
              <tr>
                <td>{{$song->id}}</td>
                <td>{{$song->song_name}}</td>
                <td><img src="{{$song->full_image}}" height="100" width="100" /></td>
                <td>{{$song->artist_name}}</td>
                <td>@if($song->djs != null) {{$song->djs->name}} @elseif($song->song_type == 2 && $song->category) {{$song->category->name}} @elseif($song->song_type ===2 ) Hot Mixes @else mixes @endif</td>
                <td>{{$song->song_length}}</td>
                <td>
                    <a class="btn btn-info" href="{{route('song.edit',['id' => $song->id])}}"><i class="ion-edit"></i></a>
                    <a class="btn btn-danger" href="{{route('song.delete',['id' => $song->id])}}"><i class="ion-android-close"></i></a>
                </td>
              </tr>
              @empty
              <tr>
                  <td>NO Songs Found.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- end col -->
  </div>
  <!-- end row -->
@endsection