@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title"> Radio Slider Image</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item"><a href="{{route('slider_images')}}"> Radio Slider Image</a></li>
                 <li class="breadcrumb-item active">Add Radio Slider Image</li>
              </ol>
           </div>
        </div>
     </div>
     <div class="row">
            <div class="col-12">
              <div class="card m-b-20">
                <div class="card-body">
                        <h4 class="mt-0 header-title">Add Radio Slider Image</h4></p>
                <form method="POST" action="{{route('save.radio_slider')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group row" style="display: none">
                      <label for="example-text-input" class="col-sm-2 col-form-label"> Radio Slider Image To</label>
                      <div class="col-sm-10" >
                        <label>Radio 1</label> <input class="form-control" name="type" type="radio" value='1' style="width:13%; margin-top: -34px !important; font-size:6px;" checked> 
                        <label style="margin-top: 12px;">Radio 2</label><input class="form-control" name="type" type="radio" value='2' style="width:13%; margin-top: -24px !important; font-size:6px;"> 
                      </div>
                  </div>
                               
                                <div class="form-group row">
                                  <label for="example-text-input" class="col-sm-2 col-form-label">Slider Image</label>
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