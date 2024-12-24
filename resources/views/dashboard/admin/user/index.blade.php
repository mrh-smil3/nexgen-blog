@extends('dashboard.layouts.main')

@section('main')
    <div class="row">

        <div class="col">
            <div class="card">
                <div class="col">
                    <div class="d-flex justify-content-between align-items-center px-3 pt-4 flex-wrap">
                        <div class="mb-2">
                            <h3 class="text-black fs-5 fw-bold">Manage Role User</h3>
                        </div>
                        <div class="mb-2">

                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable1" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->full_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <div class="d-flex gap-2 align-items-center flex-lg-nowrap flex-wrap">
                                                <div>
                                                    <span class="badge badge-primary">{{ $user->roles->name }}</span>
                                                </div>
                                                <form action="{{ route('dashboard.user.edit', $user->id) }}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <select class="form-select form-select-sm" name="role_id"
                                                        aria-label="Default select example">
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->id }}"
                                                                {{ $user->roles->id == $role->id ? 'selected' : '' }}>
                                                                {{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <button class="btn btn-sm btn-primary">Update</button>
                                                </form>
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
