@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">contact us</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item active">contact us</li>
              </ol>
           </div>
        </div>
     </div>
<div class="row">
    <div class="col-12">
      <div class="card m-b-20">
        <div class="card-body">
            <div class="row>"> 
          <h4 class="mt-0 header-title">contact us List</h4></p>
          
            </div>
          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <p class="text-muted m-b-30">List of contact us for website.
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Time</th>
                <th>Address</th>
                <th>Zipcode</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Phone</th>
                <th>Other</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse($contact as $video)
              <tr>
                <td>{{$video->id}}</td>
                <td>{{$video->name}}</td>
                <td>{{$video->email}}</td>
                <td>{{$video->date}}</td>
                <td>{{$video->time}}</td>
                <td>{{$video->address}}</td>
                <td>{{$video->zipcode}}</td>
                <td>{{$video->city}}</td>
                <td>{{$video->state}}</td>
                <td>{{$video->country}}</td>
                <td>{{$video->phone}}</td>
                <td>{{$video->other}}</td>
                <td>
                    {{-- <a class="btn btn-info" href="{{route('video.edit',['id' => $video->id])}}"><i class="ion-edit"></i></a> --}}
                    <a class="btn btn-danger" href="{{route('contactus.delete',['id' => $video->id])}}"><i class="ion-android-close"></i></a>
                </td>
              </tr>
              @empty
              <tr>
                  <td>NO contact us Found.</td>
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