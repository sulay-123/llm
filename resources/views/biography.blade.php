@extends('layout')
@section('content')
<div class="row">
        <div class="col-sm-12">
           <div class="page-title-box">
              <h4 class="page-title">Biography</h4>
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                 <li class="breadcrumb-item"><a href="{{route('biography')}}">Biography</a></li>
                 <li class="breadcrumb-item active">Biography</li>
              </ol>
           </div>
        </div>
     </div>
     <div class="row">
            <div class="col-12">
              <div class="card m-b-20">
                <div class="card-body">
                        <h4 class="mt-0 header-title">Edit History</h4></p>
                <form method="POST" action="{{route('update.biography')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">History</label>
                                    <div class="col-sm-10">
                                    <textarea class="form-control" name="description" cols="10" rows="10">{{$biography->description}}</textarea>
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