@extends('admin.layout.main')
@section('title')
    {{ $id > 0 ? 'Cập nhật nhóm quyền' : 'Tạo nhóm quyền' }}
@endsection
@section('content')
    <form class="forms-sample" action="" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thông tin cơ bản</h4>

                        <div class="form-group">
                            <label>Tên nhóm quyền</label>
                            <input type="text" class="form-control" name="name" placeholder="Tài khoản"
                                   value="{{ isset($data->name) ? $data->name : old('name') }}">
                            @if($errors->has('name'))
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <button type="submit"
                                class="btn btn-success mr-2 has-spinner">{{ $id > 0 ? 'Cập nhật' : 'Tạo mới' }}</button>
                        <a href="{{ route('admin.account.getList') }}" class="btn btn-light">Hủy</a>
                    </div>
                </div>
            </div>
            @if($id > 0)
                <div class="col-md-8 grid-margin stretch-card bl-edit-permission">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Nhóm quyền</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Tên quyền
                                        </th>
                                        <th>
                                            Mã quyền
                                        </th>
                                        <th>
                                            Hành động
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="permission-content">
                                    @if(isset($data->permission) && $data->permission)
                                        @foreach($data->permission as $v)
                                            <tr>
                                                <td>
                                                    {{ $v->id }}
                                                </td>
                                                <td>
                                                    {{ $v->name }}
                                                </td>
                                                <td>
                                                    {{ $v->code }}
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                       class="text-warning edit_permission_btn mr-4"
                                                       data-id="{{ $v->id }}" data-name="{{ $v->name }}"
                                                       data-code="{{ $v->code }}">
                                                        <i class="fa fa-pencil-square-o icon-sm" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" data-id="{{ $v->id }}" class="text-danger rm_permission_btn">
                                                        <i class="fa fa-trash icon-sm" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>


                            </div>

                            <div class="row mt-5">
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label>Tên quyền</label>
                                        <input type="text" required class="form-control permission_name"
                                               placeholder="Tên quyền"/>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label>Mã quyền</label>
                                        <input type="text" required class="form-control permission_code"
                                               placeholder="Mã quyền"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{--<label>abc</label>--}}
                                        <input type="hidden" class="permission_id" value="0">
                                        <input type="hidden" class="group_id" value="{{ $id }}">
                                        <button class="btn btn-info btn-fw mr-2 mt-4 has-spinner permission_btn">Lưu
                                        </button>
                                        <button class="btn btn-warning btn-fw mt-4 has-spinner permission_cancel">Hủy
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Nhóm quyền</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Tên quyền
                                        </th>
                                        <th>
                                            Mã quyền
                                        </th>
                                        <th>
                                            Hành động
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="permission-content">
                                    @if(isset($data->permission) && $data->permission)
                                        @foreach($data->permission as $v)
                                            <tr>
                                                <td>
                                                    {{ $v->id }}
                                                </td>
                                                <td>
                                                    {{ $v->name }}
                                                </td>
                                                <td>
                                                    {{ $v->code }}
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                       class="text-warning edit_permission_btn"
                                                       data-id="{{ $v->id }}" data-name="{{ $v->name }}"
                                                       data-code="{{ $v->code }}">
                                                        <i class="fa fa-pencil-square-o icon-sm" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label>Tên quyền</label>
                                        <input type="text" required class="form-control permission_name"
                                               placeholder="Tên quyền"/>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label>Mã quyền</label>
                                        <input type="text" required class="form-control permission_code"
                                               placeholder="Mã quyền"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{--<label>abc</label>--}}
                                        <input type="hidden" class="permission_id" value="0">
                                        <input type="hidden" class="group_id" value="{{ $id }}}">
                                        <button class="btn btn-info btn-fw mr-2 mt-4 has-spinner permission_btn">Lưu
                                        </button>
                                        <button class="btn btn-warning btn-fw mt-4 has-spinner permission_cancel">Hủy
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </form>
@endsection
@section('custom_js')
    <script>
        $(document).ready(function () {
            $('.permission_btn').click(function (e) {
                e.preventDefault();
                var permission_id = $('.permission_id').val();
                var permission_name = $('.permission_name').val();
                var permission_code = $('.permission_code').val();
                var group_id = $('.group_id').val();

                var url = BASE_URL + '/admin/permission/editPermission';
                var data = {id: permission_id, name: permission_name, code: permission_code, group_id: group_id};
                $('.bl-edit-permission').preloader();
                $.post(url, data, function (res) {
                    if (res.success == 1) {
                        $('.permission-content').html(res.html);
                        $('.permission_name, .permission_code').val();
                        init.notyPopup(res.msg, 'success');
                    } else {
                        init.notyPopup(res.msg, 'error');
                    }
                    $('.bl-edit-permission').preloader('remove');
                })
            });

            $(document).on('click', '.edit_permission_btn', function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var code = $(this).data('code');
                $('.permission_id').val(id);
                $('.permission_name').val(name);
                $('.permission_code').val(code);
            });

            $(document).on('click', '.rm_permission_btn', function () {
                var id = $(this).data('id');
                var group_id = $('.group_id').val();
                var url = BASE_URL + '/admin/permission/removePermission';
                var data = {id: id, group_id: group_id};
                $('.bl-edit-permission').preloader();
                if(confirm('Bạn có chắc muốn xóa quyền này không?')){
                    $.post(url, data, function (res) {
                        if (res.success == 1) {
                            $('.permission-content').html(res.html);
                            init.notyPopup(res.msg, 'success');
                        } else {
                            init.notyPopup(res.msg, 'error');
                        }
                        $('.bl-edit-permission').preloader('remove');
                    })
                }
            });

            $('.permission_cancel').click(function (e) {
                e.preventDefault();
                $('.permission_id').val(0);
                $('.permission_name').val('');
                $('.permission_code').val('');
            })
        })
    </script>
@endsection