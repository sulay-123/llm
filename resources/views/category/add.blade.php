@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">Watch Live</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item"><a href="{{route('player')}}">Watch Live</a></li>
                 <li class="breadcrumb-item active">Add Watch Live</li>
              </ol>
           </div>
        </div>
     </div>
     <div class="row">
            <div class="col-12">
              <div class="card m-b-20">
                <div class="card-body">
                        <h4 class="mt-0 header-title">Add Watch Live</h4></p>
                <form method="POST" action="{{route('category.save')}}">
                    {{csrf_field()}}
                            
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Video Link</label>
                                    <div class="col-sm-10">
                                    <textarea class="form-control" name="link">{{$player->link}}</textarea>
                                    <small style="color: red;">PLease add meu8 URL only</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                 <label for="example-text-input" class="col-sm-2 col-form-label">Donation Url</label>
                                 <div class="col-sm-10">
                                 <textarea class="form-control" name="donation_url">{{$player->donation_url}}</textarea>
                                 <small style="color: red;">PLease add URL only</small>
                                 </div>
                             </div>
                                <div class="form-group row">
                                 <label>Video Player Status</label>
                                 <div class="ml-5">
                                    <input type="radio" name="status"  value="0" <?php if($player->status == 0){ echo 'checked'; }?>>Off
                                    <input type="radio"  name="status" class="ml-3" value="1" <?php if($player->status == 1){ echo 'checked'; }?>>On
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