<!-- Modal -->
<div class="modal fade" id="editPopup_{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;
                </button>
                <h4 class="modal-title" id="myModalLabel">Chỉnh sửa danh mục: {{$category->name}}</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.category-management.update', ['id' => $category->id]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <label class="control-label" for="name">Tên danh mục</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="description">Miêu tả</label>
                        <div class="controls">
                            <input type="text" name="description" value="{{ $category->description }}"
                                   required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="image">Hình ảnh</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="edit_parent_id">Danh muc gốc</label>
                        <div class="controls">
                            <select class="form-control" id="edit_parent_id" name="parent_id">
                                <option value="">-- Chọn danh mục gốc --</option>
                                @foreach($cateAll as $cate)
                                    <option value="{{ $cate->id }}" {{($category->parent_id === $cate->id) ? 'selected': ''}}>
                                        {{ $cate->name }}
                                    </option>
                                @endforeach
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