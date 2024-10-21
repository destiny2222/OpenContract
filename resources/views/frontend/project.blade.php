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
                                    <!-- Previous Page Link -->
                                    @if ($project->onFirstPage())
                                        <li class="disabled"><span><i class="fas fa-angle-double-left"></i></span></li>
                                    @else
                                        <li><a href="{{ $project->previousPageUrl() }}"><i class="fas fa-angle-double-left"></i></a></li>
                                    @endif
                        
                                    <!-- Pagination Links -->
                                    @foreach ($project->links()->elements[0] as $page => $url)
                                        @if ($page == $project->currentPage())
                                            <li class="active"><a href="#">{{ $page }}</a></li>
                                        @else
                                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                    @endforeach
                        
                                    <!-- Next Page Link -->
                                    @if ($project->hasMorePages())
                                        <li><a href="{{ $project->nextPageUrl() }}"><i class="fas fa-angle-double-right"></i></a></li>
                                    @else
                                        <li class="disabled"><span><i class="fas fa-angle-double-right"></i></span></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
@endsection