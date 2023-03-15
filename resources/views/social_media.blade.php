@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">Social media</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item"><a href="{{route('social_media')}}">Social media</a></li>
                 <li class="breadcrumb-item active">Social media</li>
              </ol>
           </div>
        </div>
     </div>
     <div class="row">
            <div class="col-12">
              <div class="card m-b-20">
                <div class="card-body">
                        <h4 class="mt-0 header-title">Edit Social media</h4></p>
                <form method="POST" action="{{route('social_media.update')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Facebook Link</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" name="facebook" type="text" value="{{$social->facebook}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label for="example-text-input" class="col-sm-2 col-form-label">MMK Instagram Link</label>
                                  <div class="col-sm-10">
                                  <input class="form-control" name="mmk_instagram" type="text" value="{{$social->mmk_instagram}}">
                                  </div>
                              </div>
                              <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">MM Radio Instagram Link</label>
                                <div class="col-sm-10">
                                <input class="form-control" name="mmradio_instagram" type="text" value="{{$social->mmradio_instagram}}">
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="example-text-input" class="col-sm-2 col-form-label">Youtube Link</label>
                              <div class="col-sm-10">
                              <input class="form-control" name="youtube" type="text" value="{{$social->youtube}}">
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