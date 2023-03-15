@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">Events</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item"><a href="{{route('events')}}">Events</a></li>
                 <li class="breadcrumb-item active">Edit Events</li>
              </ol>
           </div>
        </div>
     </div>
     <div class="row">
            <div class="col-12">
              <div class="card m-b-20">
                <div class="card-body">
                        <h4 class="mt-0 header-title">Edit Events</h4></p>
                <form method="POST" action="{{route('events.update')}}">
                    {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$events->id}}">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Event Name</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" name="name" type="text" value="{{$events->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label for="example-text-input" class="col-sm-2 col-form-label">Event Image</label>
                                  <div class="col-sm-10">
                                  <input class="form-control" name="image" type="file">
                                  </div>
                              </div>
                              <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Date & Time</label>
                                <div class="col-sm-10">
                                  <input class="form-control" name="date_time" value="{{$events->date_time}}" type="datetime-local" id="example-datetime-local-input">
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="example-text-input" class="col-sm-2 col-form-label">Event Address</label>
                              <div class="col-sm-10">
                                <textarea name="address" class="form-control">{{$events->address}}</textarea>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="example-text-input" class="col-sm-2 col-form-label">Event Description</label>
                              <div class="col-sm-10">
                                <textarea name="description" class="form-control">{{$events->description}}</textarea>
                              </div>
                            </div>
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>

                        </form>
                </div>
              </div>
            </div>
     </div>
@endsection