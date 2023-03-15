@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">Podcast</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item active">Podcast</li>
              </ol>
           </div>
        </div>
     </div>
<div class="row">
    <div class="col-12">
      <div class="card m-b-20">
        <div class="card-body">
            <div class="row>"> 
          <h4 class="mt-0 header-title">Podcast List</h4></p>
          <a class="btn btn-primary float-right" href="{{route('add.video')}}">Add Podcast</a>
            </div>
          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <p class="text-muted m-b-30">List of Podcast for website.
            <thead>
              <tr>
                <th>#</th>
                <th>Podcast Name</th>
                <th>Podcast Image</th>
                <th>Podcast Date</th>
                <th>Podcast Time</th>
                <th>Podcast Url</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse($videos as $video)
              <tr>
                <td>{{$video->id}}</td>
                <td>{{$video->name}}</td>
                <td><img src="{{url('/').'/storage/image/'.$video->image}}" height="100" width="100"></td>
                <td>{{$video->date}}</td>
                <td>{{$video->time}}</td>
                <td>{{$video->url}}</td>
                <td>
                    <a class="btn btn-info" href="{{route('video.edit',['id' => $video->id])}}"><i class="ion-edit"></i></a>
                    <a class="btn btn-danger" href="{{route('video.delete',['id' => $video->id])}}"><i class="ion-android-close"></i></a>
                </td>
              </tr>
              @empty
              <tr>
                  <td>NO Podcast Found.</td>
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