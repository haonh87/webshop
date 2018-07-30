<!-- Modal -->
<div class="modal fade" id="createPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style='display:none'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;
                </button>
                <h4 class="modal-title" id="myModalLabel">Tạo mới danh mục</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.category-management.add') }}" method="POST" enctype="multipart/form-data"
                      class="createCategoryForm">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <label class="control-label" for="name">Tên danh mục</label>
                        <div class="controls">
                            <input type="text" name="name" class="form-control" value="{{old('name')}}" required/>
                        </div>
                        @if(isset($errors) && $errors->has('name'))
                            <div class="invalid-feedback" style="font-size: 12px; color: red">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="description">Miêu tả</label>
                        <div class="controls">
                            <textarea name="description" class="form-control" required>{{old('description')}}</textarea>
                        </div>
                        @if(isset($errors) && $errors->has('description'))
                            <div class="invalid-feedback" style="font-size: 12px; color: red">
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="image">Hình ảnh</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="parent_id">Danh muc gốc</label>
                        <div class="controls">
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="">-- Chọn danh mục gốc --</option>
                                {{\App\Helpers\MenuHelper::showCategories($cateAll)}}
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
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
        $("#createPopup").modal('show');
        @endif

        $(document).ready(function () {
            $('.createCategoryForm').bootstrapValidator({
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