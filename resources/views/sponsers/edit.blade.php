@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">Sponsors</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item"><a href="{{route('player')}}">Sponsors</a></li>
                 <li class="breadcrumb-item active">Edit Sponsors</li>
              </ol>
           </div>
        </div>
     </div>
     <div class="row">
            <div class="col-12">
              <div class="card m-b-20">
                <div class="card-body">
                        <h4 class="mt-0 header-title">Edit Sponsors</h4></p>
                <form method="POST" action="{{route('sponser.update')}}">
                    {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$sponsers->id}}">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Sponsor Name</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" name="name" type="text" value="{{$sponsers->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label for="example-text-input" class="col-sm-2 col-form-label">Sponsor Image</label>
                                  <div class="col-sm-10">
                                  <input class="form-control" name="image" type="file">
                                  </div>
                              </div>
                              <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Date & Time</label>
                                <div class="col-sm-10">
                                  <input class="form-control" name="date_time" value="{{$sponsers->date_time}}" type="datetime-local" id="example-datetime-local-input">
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="example-text-input" class="col-sm-2 col-form-label">Sponsors Address</label>
                              <div class="col-sm-10">
                                <textarea name="address" class="form-control">{{$sponsers->address}}</textarea>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="example-text-input" class="col-sm-2 col-form-label">Sponsors Description</label>
                              <div class="col-sm-10">
                                <textarea name="description" class="form-control">{{$sponsers->description}}</textarea>
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