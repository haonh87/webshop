<!-- Modal -->
<div class="modal fade" id="createPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style='display:none'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;
                </button>
                <h4 class="modal-title" id="myModalLabel">Tạo mới cấu hình</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.configuration-management.add') }}" method="POST" enctype="multipart/form-data"
                      class="createConfigurationForm">
                    {{ csrf_field() }}

                    <div class="control-group">
                        <label class="control-label" for="name">Cấu hình</label>
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
                        <label class="control-label" for="value">Giá trị</label>
                        <div class="controls">
                            <input type="text" name="value" class="form-control" value="{{old('value')}}" required/>
                        </div>
                        @if(isset($errors) && $errors->has('value'))
                            <div class="invalid-feedback" style="font-size: 12px; color: red">
                                {{ $errors->first('value') }}
                            </div>
                        @endif
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
            $('.createConfigurationForm').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    name: {
                        message: 'The name is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The name is not valid'
                            }
                        }
                    },
                    value: {
                        message: 'The value is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The value is not valid'
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection