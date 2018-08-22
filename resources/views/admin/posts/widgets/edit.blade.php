<!-- Modal -->
<div class="modal fade" id="editPopup_{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style='display:none'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;
                </button>
                <h4 class="modal-title" id="myModalLabel">Chỉnh sửa bài viết</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.posts-management.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data"
                      class="editPostsForm">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <label class="control-label" for="post_categories_id">Tên danh mục</label>
                        <div class="controls">
                            <select class="form-control" id="post_categories_id" name="post_categories_id">
                                <option value="">-- Chọn danh mục bài viết --</option>
                                {{\App\Helpers\ListItemHelper::showCategories($cateAll, 0, '', $post->post_categories_id, 'post_categories_id')}}
                            </select>
                        </div>
                        @if(isset($errors) && $errors->has('post_categories_id'))
                            <div class="invalid-feedback" style="font-size: 12px; color: red">
                                {{ $errors->first('post_categories_id') }}
                            </div>
                        @endif
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="title">Tiêu đề</label>
                        <div class="controls">
                            <input type="text" name="title" class="form-control" value="{{ (old('title')) ? : @$post->title }}" required/>
                        </div>
                        @if(isset($errors) && $errors->has('title'))
                            <div class="invalid-feedback" style="font-size: 12px; color: red">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="description">Miêu tả</label>
                        <div class="controls">
                            <textarea name="description" class="form-control" required>{{(old('description')) ? : @$post->description }}</textarea>
                        </div>
                        @if(isset($errors) && $errors->has('description'))
                            <div class="invalid-feedback" style="font-size: 12px; color: red">
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="content">Nội dung</label>
                        <textarea class="form-control" rows="10" id="edit_content_posts_{{$post->id}}" name="content" required>{{ (old('content')) ? : @$post->content }}"</textarea>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="image">Hình ảnh</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <img style="padding-top: 5px ; width: 20%" src="{{asset($post->image_url)}}">
                    <div class="control-group pad-top-15">
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
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'edit_content_posts_{{$post->id}}' );
</script>
@section('script')
    <script type="text/javascript">

        @if (isset($errors) && count($errors) > 0)
        $("#editPopup_{{$post->id}}").modal('show');
        @endif

        $(document).ready(function () {
            $('.editPostsForm').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    title: {
                        message: 'The title is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Nhập tiêu đề'
                            },
                            stringLength: {
                                min: 1,
                                max: 255,
                                message: 'The title must be more than 6 and less than 30 characters long'
                            }
                        }
                    },
                    description: {
                        validators: {
                            notEmpty: {
                                message: 'Thêm miêu tả'
                            }
                        }
                    },
                    content: {
                        validators: {
                            notEmpty: {
                                message: 'Thêm nội dung'
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection