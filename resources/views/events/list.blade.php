@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">Events</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item active">Events</li>
              </ol>
           </div>
        </div>
     </div>
<div class="row">
    <div class="col-12">
      <div class="card m-b-20">
        <div class="card-body">
            <div class="row>"> 
          <h4 class="mt-0 header-title">Events List</h4></p>
          <a class="btn btn-primary float-right" href="{{route('add.events')}}">Add Events</a>
            </div>
          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <p class="text-muted m-b-30">List of Events for website.
            <thead>
              <tr>
                <th>#</th>
                <th>Event Name</th>
                <th>Event Image</th>
                <th>Event Date & Time</th>
                <th>Event Address</th>
                <th>Event Description</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
              <tr>
                <td>{{$event->id}}</td>
                <td>{{$event->name}}</td>
                <td><img src="{{url('/').'/storage/image/'.$event->image}}" height="100" width="100"></td>
                <td>{{$event->date_time}}</td>
                <td>{{$event->address}}</td>
                <td>{{$event->description}}</td>
                <td>
                    <a class="btn btn-info" href="{{route('events.edit',['id' => $event->id])}}"><i class="ion-edit"></i></a>
                    <a class="btn btn-danger" href="{{route('events.delete',['id' => $event->id])}}"><i class="ion-android-close"></i></a>
                </td>
              </tr>
              @empty
              <tr>
                  <td>NO Events Found.</td>
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