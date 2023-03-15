@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">Dj</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item active">Dj</li>
              </ol>
           </div>
        </div>
     </div>
<div class="row">
    <div class="col-12">
      <div class="card m-b-20">
        <div class="card-body">
            <div class="row>"> 
          <h4 class="mt-0 header-title">Dj List</h4></p>
          <a class="btn btn-primary float-right" href="{{route('add.dj')}}">Add Dj</a>
            </div>
          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <p class="text-muted m-b-30">List of Dj for website.
            <thead>
              <tr>
                <th>#</th>
                <th>Dj Name</th>
                <th>Dj Bio</th>
                <th>Dj Image</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse($dj as $value)
              <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->bio}}</td>
                <td><img src="{{url('/').'/storage/image/'.$value->image}}" height="100" width="100"></td>
                <td>
                    <a class="btn btn-info" href="{{route('dj.edit',['id' => $value->id])}}"><i class="ion-edit"></i></a>
                    <a class="btn btn-danger" href="{{route('dj.delete',['id' => $value->id])}}"><i class="ion-android-close"></i></a>
                </td>
              </tr>
              @empty
              <tr>
                  <td>NO Dj Found.</td>
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