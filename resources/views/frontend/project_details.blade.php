@extends('layouts.main')
@section('header-section')
  @include('layouts.subheader')
@endsection
@section('title', 'Project Details ')
@section('content')
    <!-- BREADCRUMB AREA START -->
        @include('partials.breadcrumb')
    <!-- BREADCRUMB AREA END -->
    
        <!-- PAGE DETAILS AREA START (portfolio-details) -->
        <div class="ltn__page-details-area ltn__blog-details-area mb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__blog-details-wrap">
                            <div class="ltn__page-details-inner ltn__blog-details-inner">
                                <h2 class="ltn__blog-title">{{ $project->title  }}</h2>
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <b>Status</b> : 
                                            @if ($project->status == '1')
                                              <span class="badge bg-warning p-1">Blending</span>
                                            @elseif($project->status == '2')
                                              <span class="badge bg-success">In Progress</span>
                                            @else
                                               
                                            @endif
                                        </li>
                                        <li class="ltn__blog-date">
                                            <i class="far fa-calendar-alt"></i>
                                            Award date <span class="badge bg-info">{{  $project->award_date }}</span>
                                        </li>
                                        <li>
                                            <strong>
                                                <i class="fa fa-award"></i>
                                                Award 
                                                @if ($project->award == '1')
                                                   <span class="badge bg-warning p-1">Processing</span>
                                                @elseif($project->status == '2')
                                                  <span class="badge bg-success">Completed</span>
                                                @else
                                                <span class="badge bg-info">Blending</span>
                                                @endif
                                            </strong>
                                        </li>
                                    </ul>
                                </div>
                                <p>
                                    {{  $project->body }}
                                </p>
                            </div>
                            
                        </div>
                            


                            <!-- comment-area -->
                            <div class="ltn__comment-area mt-50 mb-50">
                                <h4 class="title-2">Comments</h4>
                                <div class="ltn__comment-inner">
                                    <ul>
                                        @foreach($project->comments as $key => $comment)
                                            <li>
                                                <div class="ltn__comment-item clearfix">
                                                    <div class="ltn__commenter-img">
                                                        <img src="/avatar.png" alt="Image">
                                                    </div>
                                                    <div class="ltn__commenter-comment">
                                                        <h6><a href="javascript:void()"> {{  $comment->name }} </a></h6>
                                                        <span class="comment-date">{{  $comment->created_at->diffforHumans() }}</span>
                                                        <p> {!!  html_entity_decode($comment->message) !!}</p>
                                                    </div>
                                                </div>
                                                @if($key < count($project->comments) - 1)
                                                    <ul>
                                                        @for($i = $key + 1; $i <= min($key + 2, count($project->comments) - 1); $i++)
                                                            <li>
                                                                <div class="ltn__comment-item clearfix">
                                                                    <div class="ltn__commenter-img">
                                                                        <img src="/avatar.png" alt="Image">
                                                                    </div>
                                                                    <div class="ltn__commenter-comment">
                                                                        <h6><a href="javascript:void()">{{  $comment->name }}</a></h6>
                                                                        <span class="comment-date">{{  $comment->created_at->diffforHumans() }}</span>
                                                                        <p> {!!  html_entity_decode($comment->message) !!}</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endfor
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <div class="ltn__comment-reply-area ltn__form-box mb-60---">
                                <h4 class="title-2">Post Comment</h4>
                                <form action="{{ route('project-comment') }}" method="POST">
                                    @csrf
                                    <input type="text" name="project_id" value="{{ $project->id }}" hidden>
                                    <input type="text" name="contractor_id" value="{{ $project->contractor->id }}" hidden>
                                    <div class="input-item input-item-name ltn__custom-icon">
                                        <input type="text" name="name" placeholder="Type your name....">
                                    </div>
                                    <div class="input-item input-item-email ltn__custom-icon">
                                        <input type="email" name="email" placeholder="Type your email....">
                                    </div>
                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                        <textarea  name="message" placeholder="Type your comments...."></textarea>
                                    </div>
                                    <div class="btn-wrapper">
                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">
                                            <i class="far fa-comments"></i> Post Comment
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- PAGE DETAILS AREA END -->
@endsection