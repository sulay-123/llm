@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">Home Bottom Slider </h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item active">Home Bottom Slider </li>
              </ol>
           </div>
        </div>
     </div>
<div class="row">
    <div class="col-12">
      <div class="card m-b-20">
        <div class="card-body">
            <div class="row>"> 
          <h4 class="mt-0 header-title">Home Bottom Slider List</h4></p>
          <a class="btn btn-primary float-right" href="{{route('add.slider_images')}}">Add Home Bottom Slider </a>
            </div>
          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <p class="text-muted m-b-30">List of Home Bottom Slider  for website.
            <thead>
              <tr>
                <th>#</th>
                <th>Home Bottom Slider Image</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse($slider_images as $image)
              <tr>
                <td>{{$image->id}}</td>
                <td><img src="{{url('/').'/storage/image/'.$image->image}}" height="100" width="100"></td>
                <td>
                    <a class="btn btn-info" href="{{route('edit.slider_images',['id' => $image->id])}}"><i class="ion-edit"></i></a>
                    <a class="btn btn-danger" href="{{route('delete.slider_images',['id' => $image->id])}}"><i class="ion-android-close"></i></a>
                </td>
              </tr>
              @empty
              <tr>
                  <td>NO Home Bottom Slider Found.</td>
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