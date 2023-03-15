@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">Idol</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item active">Idol</li>
              </ol>
           </div>
        </div>
     </div>
<div class="row">
    <div class="col-12">
      <div class="card m-b-20">
        <div class="card-body">
            <div class="row>"> 
          <h4 class="mt-0 header-title">Idol List</h4></p>
          {{-- <a class="btn btn-primary float-right" href="{{route('add.category')}}">Add Idol</a> --}}
            </div>
          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <p class="text-muted m-b-30">List of idols register with.
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
                @forelse($idols as $idol)
              <tr>
                <td>{{$idol->id}}</td>
                <td>{{$idol->fname}}</td>
                <td>{{$idol->lname}}</td>
                <td>{{$idol->email}}</td>
                <td>{{$idol->phone}}</td>
                <td>
                    <a class="btn btn-info" href="{{route('edit.idol',['id' => $idol->id])}}"><i class="ion-edit"></i></a>
                    {{-- <a class="btn btn-danger" href="{{route('category.delete',['id' => $idol->id])}}"><i class="ion-android-close"></i></a> --}}
                </td>
              </tr>
              @empty
              <tr>
                  <td>NO Idol Found.</td>
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