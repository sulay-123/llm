@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">Radio Player</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item"><a href="{{route('player')}}">Radio Player</a></li>
                 <li class="breadcrumb-item active">Add Radio Player</li>
              </ol>
           </div>
        </div>
     </div>
     <div class="row">
            <div class="col-12">
              <div class="card m-b-20">
                <div class="card-body">
                        <h4 class="mt-0 header-title">Add Audio Player</h4></p>
                <form method="POST" action="{{route('radio.save')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                            
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Radio 1 Link</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="radio1_url" value="{{$player->radio1_url}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Radio 1 Name</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="radio1_name" value="{{$player->radio1_name}}">
                                   
                                    </div>
                                 </div>

                                 <div class="form-group row" style="display: none">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Radio 2 Link</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="radio2_url" value="{{$player->radio2_url}}">
                                    </div>
                                </div>
                                <div class="form-group row" style="display: none">
                                 <label for="example-text-input" class="col-sm-2 col-form-label">Radio 2 Name</label>
                                 <div class="col-sm-10">
                                 <input type="text" class="form-control" name="radio2_name" value="{{$player->radio2_name}}">
                                
                                 </div>
                              </div>
                                {{-- <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Radio 2 Image</label>
                                    <div class="col-sm-10">
                                    <input type="file" class="form-control" name="radio2">
                                    <img src="{{url('/').'/storage/image/'.$player->radio2_image}}" height="200" width="200">
                                    </div>
                                 </div> --}}
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>

                        </form>
                </div>
              </div>
            </div>
     </div>
@endsection