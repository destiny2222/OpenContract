@extends('layouts.main')
@section('header-section')
    @include('layouts.subheader')
@endsection
@section('title', 'Contractor ')
@section('content')
    <!-- BREADCRUMB AREA START -->
        @include('partials.breadcrumb')
    <!-- BREADCRUMB AREA END -->


    <div class="ltn__img-slider-area pb-100">
        <div class="container">
            <div class="row ltn__image-slider-3-active slick-arrow-1 slick-arrow-1-inner---">
                @foreach ($contract as $contracts)     
                    <div class="col-lg-4 mb-4">
                        <div class="ltn__img-slide-item-3 ltn__img-slide-item-3-2">
                            <a href="{{ route('contractor-project', $contracts->slug) }}">
                                <img src="{{ $contracts->image }}" alt="Image">
                            </a>
                            <div class="ltn__img-slide-info">
                                <div class="ltn__img-slide-info-brief">
                                    <h6>{{   $contracts->position }}</h6>
                                    <h1><a href="{{ route('contractor-project', $contracts->slug) }}">{{  $contracts->name }}</a></h1>
                                </div>
                                <div class="btn-wrapper">
                                    <a href="{{ route('contractor-project', $contracts->slug) }}" class="btn-- theme-btn-1-- btn-effect-1--">
                                        View Project
                                        <i class="flaticon-right-arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">
                            <ul>
                                <!-- Previous Page Link -->
                                @if ($contract->onFirstPage())
                                    <li class="disabled"><span><i class="fas fa-angle-double-left"></i></span></li>
                                @else
                                    <li><a href="{{ $contract->previousPageUrl() }}"><i class="fas fa-angle-double-left"></i></a></li>
                                @endif

                                <!-- Pagination Links -->
                                @foreach ($contract->links()->elements[0] as $page => $url)
                                    @if ($page == $contract->currentPage())
                                        <li class="active"><a href="#">{{ $page }}</a></li>
                                    @else
                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach

                                <!-- Next Page Link -->
                                @if ($contract->hasMorePages())
                                    <li><a href="{{ $contract->nextPageUrl() }}"><i class="fas fa-angle-double-right"></i></a></li>
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
