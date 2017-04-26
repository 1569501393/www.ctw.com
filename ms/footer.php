

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

        <script type="text/javascript" src="assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script type="text/javascript" src="assets/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script src="assets/plugins/select2/select2.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="assets/pages/jquery.widgets.js"></script>
        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
        <script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="assets/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
        <script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>
        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
        <script src="assets/pages/jquery.dashboard.js"></script>
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>


        <!-- 统计图表js -->
        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>
        <script src="assets/pages/morris.init.js"></script>
        <!-- 统计图表js end -->


        <!-- 文本编辑器相关js -->
        <script src="assets/plugins/summernote/dist/summernote.min.js"></script>
        <script src="assets/plugins/summernote/lang/summernote-zh-CN.js"></script>
        <script>
            jQuery(document).ready(function(){
                $('.summernote').summernote({
                    height: 200,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false,                // set focus to editable area after initializing summernote
                    // lang:'zh-CN'
                });
                
                $('.inline-editor').summernote({
                    airMode: true ,
                    lang:'zh-CN'        
                });
            });
        </script>
    <!-- 文本编辑器相关js结束 -->



        <script type="text/javascript">
            jQuery(document).ready(function($) {

                var page = $('.content-page').attr('page');
                $('.left-menu').each(function(){
                    if ($(this).attr('page')==page) {
                        $(this).addClass('active');
                    }
                })


                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

                userIdentity();

                function userIdentity(){
                    var identity = $('body').attr('identity');
                    if (identity=='fenhang') {
                        $('.left-menu').each(function(){
                            var page = $(this).attr('page');
                            if (page=='promotionmanager'||page=='contractmanager'||page=='finansialmanager'||page=='character'){
                                $(this).parent().remove();
                                // alert('have');
                            }
                        })
                    }else if(identity=='zijigou'){
                        $('.left-menu').each(function(){
                            var page = $(this).attr('page');
                            if (page=='commisionmanager'||page=='character'||page=='announcementmanager'||page=='groupmanager'||page=='promotionmanager'||page=='contractmanager'||page=='finansialmanager'){
                                $(this).parent().remove();
                                // alert('have');
                            }
                        })
                    }else if(identity=='kehujingli'){
                        // alert(identity);
                        $('.left-menu').each(function(){
                            var page = $(this).attr('page');
                            if (page=='commisionmanager'||page=='finansialmanager'||page=='groupmanager'||page=='contractmanager'||page=='character'||page=='announcementmanager'||page=='promotionmanager'){
                                $(this).parent().remove();
                                // alert('have');
                            }
                        })
                    }else if (identity=='shangcheng') {
                        $('.left-menu').each(function(){
                            var page = $(this).attr('page');
                            if (page=='announcements'||page=='groupmanager'||page=='commisionmanager'||page=='orders'||page=='settle'||page=='user'||page=='promotion'){
                                $(this).parent().remove();
                                // alert('have');
                                $('#split-line').hide();
                            }
                        })
                    }

                    // alert(identity);
                }



            });
        </script>



        <script>
            jQuery(document).ready(function() {

                // Time Picker
                jQuery('#timepicker').timepicker({
                    defaultTIme : false
                });
                jQuery('#timepicker2').timepicker({
                    showMeridian : false
                });
                jQuery('#timepicker3').timepicker({
                    minuteStep : 15
                });
                
                //colorpicker start

                $('.colorpicker-default').colorpicker({
                    format: 'hex'
                });
                $('.colorpicker-rgba').colorpicker();
                
                // Date Picker
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker-autoclose').datepicker({
                    autoclose: true,
                    todayHighlight: true
                });
                jQuery('#datepicker-autoclose2').datepicker({
                    autoclose: true,
                    todayHighlight: true
                });                
                jQuery('#datepicker-inline').datepicker();
                jQuery('#datepicker-multiple-date').datepicker({
                    format: "mm/dd/yyyy",
                    clearBtn: true,
                    multidate: true,
                    multidateSeparator: ","
                });
                jQuery('#date-range').datepicker({
                    toggleActive: true
                });
                
                //Clock Picker
                $('.clockpicker').clockpicker({
                    donetext: 'Done'
                });
                
                $('#single-input').clockpicker({
                    placement: 'bottom',
                    align: 'left',
                    autoclose: true,
                    'default': 'now'
                });
                $('#check-minutes').click(function(e){
                    // Have to stop propagation here
                    e.stopPropagation();
                    $("#single-input").clockpicker('show')
                            .clockpicker('toggleView', 'minutes');
                });
                
                
                //Date range picker
                $('.input-daterange-datepicker').daterangepicker({
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-default',
                    cancelClass: 'btn-white'
                });
                $('.input-daterange-timepicker').daterangepicker({
                    timePicker: true,
                    format: 'MM/DD/YYYY h:mm A',
                    timePickerIncrement: 30,
                    timePicker12Hour: true,
                    timePickerSeconds: false,
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-default',
                    cancelClass: 'btn-white'
                });
                $('.input-limit-datepicker').daterangepicker({
                    format: 'MM/DD/YYYY',
                    minDate: '06/01/2015',
                    maxDate: '06/30/2015',
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-default',
                    cancelClass: 'btn-white',
                    dateLimit: {
                        days: 6
                    }
                });
        
                $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        
                $('#reportrange').daterangepicker({
                    format: 'MM/DD/YYYY',
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment(),
                    minDate: '01/01/2012',
                    maxDate: '12/31/2015',
                    dateLimit: {
                        days: 60
                    },
                    showDropdowns: true,
                    showWeekNumbers: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'left',
                    drops: 'down',
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-default',
                    cancelClass: 'btn-white',
                    separator: ' to ',
                    locale: {
                        applyLabel: 'Submit',
                        cancelLabel: 'Cancel',
                        fromLabel: 'From',
                        toLabel: 'To',
                        customRangeLabel: 'Custom',
                        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        firstDay: 1
                    }
                }, function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                });
                
            });
</script>





    </body>
</html>