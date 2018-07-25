<!-- Modal -->
<div class="modal fade" id="createPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Tạo mới danh mục</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.category-management.add') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="control-group">
                        <label class="control-label" for="name_en">NAME-EN</label>
                        <div class="controls">
                            <input type="text" name="name_en" class="form-control"
                                   value="{{  Session::getOldInput('name_en') }}"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="name_ru">NAME-RU</label>
                        <div class="controls">
                            <input type="text" name="name_ru" class="form-control"
                                   value="{{  Session::getOldInput('name_ru') }}"/>
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