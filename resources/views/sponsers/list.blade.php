@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">Sponsors</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item active">Sponsors</li>
              </ol>
           </div>
        </div>
     </div>
<div class="row">
    <div class="col-12">
      <div class="card m-b-20">
        <div class="card-body">
            <div class="row>"> 
          <h4 class="mt-0 header-title">Sponsors List</h4></p>
          <a class="btn btn-primary float-right" href="{{route('add.sponser')}}">Add Sponsors</a>
            </div>
          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <p class="text-muted m-b-30">List of sponsors for website.
            <thead>
              <tr>
                <th>#</th>
                <th>Sponsors Name</th>
                <th>Sponsors Image</th>
                <th>Sponsors Date & Time</th>
                <th>Sponsors Address</th>
                <th>Sponsors Description</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse($sponsers as $sponser)
              <tr>
                <td>{{$sponser->id}}</td>
                <td>{{$sponser->name}}</td>
                <td><img src="{{url('/').'/storage/image/'.$sponser->image}}" height="100" width="100"></td>
                <td>{{$sponser->date_time}}</td>
                <td>{{$sponser->address}}</td>
                <td>{{$sponser->description}}</td>
                <td>
                    <a class="btn btn-info" href="{{route('sponser.edit',['id' => $sponser->id])}}"><i class="ion-edit"></i></a>
                    <a class="btn btn-danger" href="{{route('sponser.delete',['id' => $sponser->id])}}"><i class="ion-android-close"></i></a>
                </td>
              </tr>
              @empty
              <tr>
                  <td>NO sponsors Found.</td>
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