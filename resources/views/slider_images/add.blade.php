@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">Home Bottom Slider Image</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item"><a href="{{route('slider_images')}}">Home Bottom Slider Image</a></li>
                 <li class="breadcrumb-item active">Add Home Bottom Slider Image</li>
              </ol>
           </div>
        </div>
     </div>
     <div class="row">
            <div class="col-12">
              <div class="card m-b-20">
                <div class="card-body">
                        <h4 class="mt-0 header-title">Add Home Bottom Slider Image</h4></p>
                <form method="POST" action="{{route('save.slider_images')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                            
                               
                                <div class="form-group row">
                                  <label for="example-text-input" class="col-sm-2 col-form-label">Home Bottom Slider Image</label>
                                  <div class="col-sm-10">
                                  <input class="form-control" name="image" type="file">
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