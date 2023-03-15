@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">Podcast</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item"><a href="{{route('video')}}">Podcast</a></li>
                 <li class="breadcrumb-item active">Edit Podcast</li>
              </ol>
           </div>
        </div>
     </div>
     <div class="row">
            <div class="col-12">
              <div class="card m-b-20">
                <div class="card-body">
                        <h4 class="mt-0 header-title">Edit Podcast</h4></p>
                <form method="POST" action="{{route('video.update')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$video->id}}">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Podcast Name</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" name="name" type="text" value="{{$video->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label for="example-text-input" class="col-sm-2 col-form-label">Podcast Image</label>
                                  <div class="col-sm-10">
                                  <input class="form-control" name="image" type="file">
                                  </div>
                              </div>
                              <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                  <input class="form-control" name="date" value="{{$video->date}}" type="date" id="example-date-input">
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="example-text-input" class="col-sm-2 col-form-label">Podcast url</label>
                              <div class="col-sm-10">
                                <textarea name="url" class="form-control">{{$video->url}}</textarea>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="example-text-input" class="col-sm-2 col-form-label">Podcast Time</label>
                              <div class="col-sm-10">
                                <input class="form-control" name="time" value="{{$video->time}}" type="time" id="example-time-input">
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