@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">Notifications</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item"><a href="{{route('Notification')}}">Notifications</a></li>
                 <li class="breadcrumb-item active">Add Notifications</li>
              </ol>
           </div>
        </div>
     </div>
     <div class="row">
            <div class="col-12">
              <div class="card m-b-20">
                <div class="card-body">
                        <h4 class="mt-0 header-title">Add Notifications Details</h4></p>
                <form method="POST" action="{{route('Notification.save')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group row">
                     <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                     <div class="col-sm-10">
                     <input class="form-control" name="title" type="text" >
                     <span style="color: red">Enter Notifications Title</span>
                     </div>
                 </div>
                 <div class="form-group row">
                  <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                  <input class="form-control" name="image" type="file" >
                  <span style="color: red">Enter Notifications Image</span>
                  </div>
              </div>
                 <div class="form-group row">
                  <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                  <textarea class="form-control" name="message"></textarea>
                  <span style="color: red">Enter Notifications Message</span>
                  </div>
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