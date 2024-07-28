@extends('layout.app')
@section('title','Dashboard')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">

                            <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                                <div class="widget-stat card">
                                    <div class="card-body p-4">
                                        <div class="media ai-icon">
                                            <span class="me-3 bgl-primary text-primary">
                                                <i class="fa fa-users">
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </i>
                                            </span>
                                            <div class="media-body">
                                                <p class="mb-1"><a href="#">Users</a></p>
                                                <h4 class="mb-0">2</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                                <div class="widget-stat card">
                                    <div class="card-body p-4">
                                        <div class="media ai-icon">
                                            <span class="me-3 bgl-danger text-danger">
                                                <i class="fa fa-users">
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </i>
                                            </span>
                                            <div class="media-body">
                                                <p class="mb-1"><a href="#">Article</a></p>
                                                <h4 class="mb-0">2</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
