@extends('dashboard.layouts.main')

@section('main')
    <div class="row">

        <div class="col">
            <div class="card">
                <div class="col">
                    <div class="d-flex justify-content-between align-items-center px-3 pt-4 flex-wrap">
                        <div class="mb-2">
                            <h3 class="text-black fs-5 fw-bold">Category Blog Manajement</h3>
                        </div>
                        <div class="mb-2">
                            <button class="btn btn-primary text-white shadow-sm shadow-primary cursor-pointer rounded-lg"
                                data-bs-toggle="modal" data-bs-target="#tambahCategory">
                                <i class="bi bi-plus-circle-fill fs-6 me-1"></i> Tambah Category
                            </button>
                            <div id="modal-tambah-modal">
                                @include('components.modal.modal-blog-category', [
                                    'route_id' => 'dashboard.posts.category.create',
                                    'modal_id' => 'tambahCategory',
                                    'modal_title' => 'Create Catgory',
                                    'modal_save' => 'Simpan',
                                    'categories' => '',
                                    'id' => '',
                                ])
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable1" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <a href="javascript:void(0)" class="btn btn-warning btn-sm text-small"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editCategoryBlog{{ $category->id }}">Edit</a>
                                                @include('components.modal.modal-blog-category', [
                                                    'route_id' => 'dashboard.posts.category.update',
                                                    'modal_id' => 'editCategoryBlog',
                                                    'modal_title' => 'Update Catgeory',
                                                    'modal_save' => 'Update',
                                                    'id' => $category->id,
                                                    'categories' => $categories,
                                                ])
                                                <a href="javascript::void(0)" class="btn btn-danger btn-sm text-small"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteCategoryBlog{{ $category->id }}">
                                                    Delete
                                                </a>
                                                @include('components.modal.modal-confirm-delete', [
                                                    'modal_id' => 'deleteCategoryBlog',
                                                    'route' => 'dashboard.posts.category.delete',
                                                    'id' => $category->id,
                                                    'title' => 'Delete Category',
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
