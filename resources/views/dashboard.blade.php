@extends('layout')
@section('content')
<div class="row">
      <div class="col-sm-12">
         <div class="page-title-box">
            <h4 class="page-title">Dashboard</h4>
         </div>
      </div>
   </div>
                  <div class="row">
                        <div class="col-xl-3 col-md-6">
                          <div class="card mini-stat bg-primary">
                            <div class="card-body mini-stat-img">
                              <div class="mini-stat-icon"><i class="mdi mdi-cube-outline float-right"></i></div>
                              <div class="text-white">
                                <h6 class="text-uppercase mb-3">Sponsors</h6>
                                <h4 class="mb-4">{{$sponsers}}</h4>
                                {{-- <span class="badge badge-info">+10 </span> --}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                          <div class="card mini-stat bg-primary">
                            <div class="card-body mini-stat-img">
                              <div class="mini-stat-icon"><i class="mdi mdi-buffer float-right"></i></div>
                              <div class="text-white">
                                <h6 class="text-uppercase mb-3">Dj</h6>
                                <h4 class="mb-4">{{$dj}}</h4>
                                {{-- <span class="badge badge-danger">-29% </span><span class="ml-2">From previous period</span> --}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                          <div class="card mini-stat bg-primary">
                            <div class="card-body mini-stat-img">
                              <div class="mini-stat-icon"><i class="mdi mdi-tag-text-outline float-right"></i></div>
                              <div class="text-white">
                                <h6 class="text-uppercase mb-3">Podcast</h6>
                                <h4 class="mb-4">{{$video}}</h4>
                                {{-- <span class="badge badge-warning">0% </span><span class="ml-2">From previous period</span> --}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                          <div class="card mini-stat bg-primary">
                            <div class="card-body mini-stat-img">
                              <div class="mini-stat-icon"><i class="mdi mdi-briefcase-check float-right"></i></div>
                              <div class="text-white">
                                <h6 class="text-uppercase mb-3">Events</h6>
                                <h4 class="mb-4">{{$event}}</h4>
                                {{-- <span class="badge badge-info">+89% </span><span class="ml-2">From previous period</span> --}}
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  <!-- end row -->
@endsection