@extends('layouts.master-2')
@section('title', 'Blog | Gritinai')
@section('content')
<div class="container-fluid py-5">

    <!-- start page title -->
    <div class="row py-5">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Publication Section</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="page-title-box d-flex align-items-center">
                <a class="mb-0 btn btn-primary text-white waves-effect waves-light ms-2" data-bs-toggle="modal" data-bs-target="#modalCenter">
                   Add New Publication
                </a>
            </div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="card">
            <h5 class="card-header">Publication</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>image</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($blog as $blogs)
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <img class="w-100 h-auto" src="{{ asset('storage/blogger/'.$blogs->image) }}" alt="Card image cap">
                                </td>
                                <td>
                                    <p>{{ $blogs->author }}</p>
                                </td>
                                <td>
                                    <h5>{{ (\Str::limit(  $blogs->title, 30 )) }}</h5>
                                </td>
                                <td>
                                    <p class="">{!! html_entity_decode(\Str::limit($blogs->body, 100))  !!}</p>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                                            data-bs-target="#modalTop{{ $blogs->id }}" title="Edit">
                                            <i class='bx bxs-edit-alt text-white'></i>
                                        </a>
                                        <a class="" href="javascript:void(0);">
                                            <form action="{{ route('admin.publication.destroy', $blogs->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="ms-2 btn btn-primary waves-effect waves-light" onclick="return confirm('Are you sure?');"><i class=" fa fa-trash me-1"></i>Delete</button>
                                            </form>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @include('admin.post.edit')
                        @endforeach

                    </tbody>
                    {{ $blog->links() }}
                </table>
            </div>
          </div>
    </div>

    <!-- end row -->
    @include('admin.post.create')
</div> <!-- container-fluid -->

@endsection
