<!-- Modal -->
<div class="modal fade" id="editPopup_{{$productColor->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style='display:none'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;
                </button>
                <h4 class="modal-title" id="myModalLabel">Chỉnh sửa màu sắc: {{$productColor->name}}</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.product.color.update', ['id' => $productColor->id]) }}" method="POST"
                      enctype="multipart/form-data" class="editProductColorForm">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <label class="control-label" for="code">Mã màu</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="code" value="{{ (old('code')) ? : @$productColor->code }}" required>
                        </div>
                        @if(isset($errors) && $errors->has('code'))
                            <div class="invalid-feedback" style="font-size: 12px; color: red">
                                {{ $errors->first('code') }}
                            </div>
                        @endif
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="name">Màu sắc</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="name" value="{{ (old('name')) ? : @$productColor->name }}" required>
                        </div>
                        @if(isset($errors) && $errors->has('name'))
                            <div class="invalid-feedback" style="font-size: 12px; color: red">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group pad-top-15">
                        <div class="controls text-right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
                            <button class="btn btn-success" type="submit">Hoàn tất</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script type="text/javascript">

        @if (isset($errors) && count($errors) > 0)
        $("#editPopup_{{$productColor->id}}").modal('show');
        @endif

        $(document).ready(function () {
            $('.editProductColorForm').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    name: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Nhập tên danh mục'
                            },
                            stringLength: {
                                min: 1,
                                max: 255,
                                message: 'The username must be more than 6 and less than 30 characters long'
                            }
                        }
                    },
                    description: {
                        validators: {
                            notEmpty: {
                                message: 'Thêm miêu tả'
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection