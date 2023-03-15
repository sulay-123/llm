@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">Banner Images</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item active">Banner Images</li>
              </ol>
           </div>
        </div>
     </div>
<div class="row">
    <div class="col-12">
      <div class="card m-b-20">
        <div class="card-body">
            <div class="row>"> 
          <h4 class="mt-0 header-title">Banner Images List</h4></p>
          <a class="btn btn-primary float-right" href="{{route('add.banner_images')}}">Add Banner Images</a>
            </div>
          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <p class="text-muted m-b-30">List of Banner Images for website.
            <thead>
              <tr>
                <th>#</th>
                <th>Banner Images Image</th>
                <th>Banner Link</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse($banner_images as $image)
              <tr>
                <td>{{$image->id}}</td>
                <td><img src="{{url('/').'/storage/image/'.$image->image}}" height="100" width="100"></td>
                <td>{{$image->link}}</td>
                <td>
                    <a class="btn btn-info" href="{{route('edit.banner_images',['id' => $image->id])}}"><i class="ion-edit"></i></a>
                    <a class="btn btn-danger" href="{{route('delete.banner_images',['id' => $image->id])}}"><i class="ion-android-close"></i></a>
                </td>
              </tr>
              @empty
              <tr>
                  <td>NO Banner Images Found.</td>
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