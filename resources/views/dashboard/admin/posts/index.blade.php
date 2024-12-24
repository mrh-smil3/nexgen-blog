@extends('dashboard.layouts.main')
@section('main')
    <div class="row">

        <div class="col">
            <div class="card">
                <div class="col">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-style-light m-2" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-between align-items-center px-3 pt-4 flex-wrap">
                        <div class="mb-2">
                            <h3 class="text-black fs-5 fw-bold">Post Manajement</h3>
                        </div>
                        <div class="mb-2">
                            <a href="{{ route('dashboard.posts.createView') }}"
                                class="btn btn-primary text-white shadow-sm shadow-primary cursor-pointer rounded-lg">
                                <i class="bi bi-plus-circle-fill fs-6 me-1"></i> Tambah Artikels
                            </a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable1" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td><img src="{{ asset('storage/' . $blog->image) }}" alt="" width="50">
                                        </td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->categoryBlog->title }}</td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <a href="" class="btn btn-primary btn-sm text-small">View</a>
                                                <a href="{{ route('dashboard.posts.editView' , ['slug' => $blog->slug] ) }}"
                                                    class="btn btn-warning btn-sm text-small">Edit</a>
                                                <a href="javascript::void(0)" class="btn btn-danger btn-sm text-small"
                                                    data-bs-toggle="modal" data-bs-target="#deletePost{{ $blog->id }}">
                                                    Delete
                                                </a>
                                                @include('components.modal.modal-confirm-delete', [
                                                    'modal_id' => 'deletePost',
                                                    'route' => 'dashboard.posts.delete',
                                                    'id' => $blog->id,
                                                    'title' => 'Delete Artikel',
                                                ])
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-end mt-4">
                                {{-- {{ $templates->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
