
@push('style_plugins')
<!--<link href="{{url('assets/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
-->
<link href="{{url('assets/admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
<!--
<link href="{{url('assets/admin/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/admin/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/admin/global/plugins/clockface/css/clockface.css')}}" rel="stylesheet" type="text/css" />
-->
@endpush

@push('scripts_plugins')
<!--<script src="{{url('assets/admin/global/plugins/moment.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
-->
<script src="{{url('assets/admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<!--
<script src="{{url('assets/admin/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/admin/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/admin/global/plugins/clockface/js/clockface.js')}}" type="text/javascript"></script>
-->
@endpush
@push('scripts')
<script src="{{url('assets/admin/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>
<script>
    $('.date-picker').datepicker({
        format: 'yyyy/mm/dd',

    });
</script>
@endpush