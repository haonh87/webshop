<!-- Modal -->
<div class="modal fade" id="editPopup_{{$configuration->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style='display:none'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;
                </button>
                <h4 class="modal-title" id="myModalLabel">Chỉnh sửa cấu hình: {{$configuration->name}}</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.configuration-management.update', ['id' => $configuration->id]) }}" method="POST"
                      enctype="multipart/form-data" class="editConfigurationForm">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <label class="control-label" for="name">Cấu hình</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="name" value="{{ (old('name')) ? : @$configuration->name }}" required>
                        </div>
                        @if(isset($errors) && $errors->has('name'))
                            <div class="invalid-feedback" style="font-size: 12px; Size: red">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="value">Gía trị</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="value" value="{{ (old('value')) ? : @$configuration->value }}" required>
                        </div>
                        @if(isset($errors) && $errors->has('value'))
                            <div class="invalid-feedback" style="font-size: 12px; Size: red">
                                {{ $errors->first('value') }}
                            </div>
                        @endif
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
        $("#editPopup_{{$productSize->id}}").modal('show');
        @endif

        $(document).ready(function () {
            $('.editConfigurationForm').bootstrapValidator({
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
                                message: 'The name is required and cannot be empty'
                            },
                            stringLength: {
                                min: 1,
                                max: 255,
                                message: 'The username must be more than 1 and less than 255 characters long'
                            }
                        }
                    },
                name: {
                     message: 'The value is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The value is required and cannot be empty'
                            },
                            stringLength: {
                                min: 1,
                                max: 255,
                                message: 'The value must be more than 1 and less than 255 characters long'
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection