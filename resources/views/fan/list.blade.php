@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">Fans</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item active">Fans</li>
              </ol>
           </div>
        </div>
     </div>
<div class="row">
    <div class="col-12">
      <div class="card m-b-20">
        <div class="card-body">
            <div class="row>"> 
          <h4 class="mt-0 header-title">Fans List</h4></p>
          {{-- <a class="btn btn-primary float-right" href="{{route('add.category')}}">Add Idol</a> --}}
            </div>
          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <p class="text-muted m-b-30">List of Fans register with.
            <thead>
              <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse($fans as $fan)
              <tr>
                <td>{{$fan->id}}</td>
                <td>{{$fan->fname}}</td>
                <td>{{$fan->lname}}</td>
                <td>{{$fan->email}}</td>
                <td>{{$fan->phone}}</td>
                <td>
                    <a class="btn btn-info" href="{{route('edit.fan',['id' => $fan->id])}}"><i class="ion-edit"></i></a>
                    {{-- <a class="btn btn-danger" href="{{route('category.delete',['id' => $fan->id])}}"><i class="ion-android-close"></i></a> --}}
                </td>
              </tr>
              @empty
              <tr>
                  <td>NO Fans Found.</td>
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