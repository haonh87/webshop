<!-- Modal -->
<div class="modal fade" id="createPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;
                </button>
                <h4 class="modal-title" id="myModalLabel">Tạo mới danh mục</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.category-management.add') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <label class="control-label" for="name">Tên danh mục</label>
                        <div class="controls">
                            <input type="text" name="name" class="form-control" value="{{old('name')}}"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="name">Ngôn ngữ</label>
                        <div class="controls">
                            <input type="text" name="lang_code" class="form-control" value="{{old('lang_code')}}"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="description">Miêu tả</label>
                        <div class="controls">
                            <input type="text" name="description" class="form-control"
                                   value="{{old('description')}}"/>
                        </div>
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
                                @foreach($cateAll as $cate)
                                    <option value="{{ $cate->id }}">
                                        {{ $cate->name }}
                                    </option>
                                @endforeach
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