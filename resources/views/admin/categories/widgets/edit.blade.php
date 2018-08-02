<!-- Modal -->
<div class="modal fade" id="editPopup_{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style='display:none'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;
                </button>
                <h4 class="modal-title" id="myModalLabel">Chỉnh sửa danh mục: {{$category->name}}</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.category-management.update', ['id' => $category->id]) }}" method="POST"
                      enctype="multipart/form-data" class="editCategoryForm">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <label class="control-label" for="name">Tên danh mục</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="name"
                                   value="{{ (old('name')) ? : @$category->name }}" required>
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
                            <textarea name="description" class="form-control"
                                      required>{{ (old('description')) ? : @$category->description }}</textarea>
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
                    <img style="width: 20%" src="{{asset($category->image_url)}}">
                    <div class="control-group">
                        <label class="control-label" for="edit_parent_id">Danh muc gốc</label>
                        <div class="controls">
                            <select class="form-control" id="edit_parent_id" name="parent_id">
                                <option value="">-- Chọn danh mục gốc --</option>
                                {{\App\Helpers\MenuHelper::showCategories($cateAll, 0, '', $category)}}
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls text-right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
                            <button class="btn btn-primary" type="submit">Hoàn tất</button>
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
        $("#editPopup_{{$category->id}}").modal('show');
        @endif

        $(document).ready(function () {
            $('.editCategoryForm').bootstrapValidator({
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