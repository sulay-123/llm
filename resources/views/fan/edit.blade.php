@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">Fan</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item"><a href="{{route('fan')}}">Fans</a></li>
                 <li class="breadcrumb-item active">Edit Fan</li>
              </ol>
           </div>
        </div>
     </div>
     <div class="row">
            <div class="col-12">
              <div class="card m-b-20">
                <div class="card-body">
                        <h4 class="mt-0 header-title">Edit Fan Details</h4></p>
                <form method="POST" action="{{route('fan.update')}}">
                    {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$fan->id}}">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">First Name</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" name="fname" type="text" value="{{$fan->fname}}" id="example-text-input" disabled>
                                    </div>
                                </div>
                              <div class="form-group row">
                                 <label for="example-text-input" class="col-sm-2 col-form-label">Last Name</label>
                                 <div class="col-sm-10">
                                 <input class="form-control" name="lname" type="text" value="{{$fan->lname}}" id="example-text-input" disabled>
                                 </div>
                             </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                              <input class="form-control" name="email" type="email" value="{{$fan->email}}" id="example-text-input">
                              </div>
                          </div>
                          <div class="form-group row">
                           <label for="example-text-input" class="col-sm-2 col-form-label">Phone</label>
                           <div class="col-sm-10">
                           <input class="form-control" name="phone" type="number" value="{{$fan->phone}}" id="example-text-input" disabled>
                           </div>
                       </div>
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>

                        </form>
                </div>
              </div>
            </div>
     </div>
@endsection