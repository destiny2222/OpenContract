@extends('layouts.main')
@section('header-section')
  @include('layouts.subheader')
@endsection
@section('title', 'Project ')
@section('content')
    <!-- BREADCRUMB AREA START -->
        @include('partials.breadcrumb')
    <!-- BREADCRUMB AREA END -->
    
      

        <div class="ltn__blog-area ltn__blog-item-3-normal mb-100">
            <div class="container">
                <div class="row">
                    <!-- Blog Item -->
                    @foreach ($project as $projects)
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="ltn__blog-item ltn__blog-item-3">
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <h3 class="ltn__blog-title">
                                        <a href="{{  route('project-details-page', $projects->slug) }}">{{  \Str::limit($projects->title, 30) }}</a>
                                    </h3>
                                    <p>
                                        {!!  html_entity_decode(\Str::limit($projects->body, 100)) !!}
                                    </p>
                                </div>
                                <div class="ltn__blog-meta-btn">
                                    <div class="ltn__blog-btn">
                                        <a href="{{  route('project-details-page', $projects->slug) }}">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__pagination-area text-center">
                            <div class="ltn__pagination">
                                <ul>
                                    <li><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">10</a></li>
                                    <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection