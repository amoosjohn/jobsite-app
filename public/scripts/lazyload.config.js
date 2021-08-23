// lazyload config
var MODULE_CONFIG = {
    chat:           [
                      '../public/libs/list.js/dist/list.js',
                      '../public/libs/notie/dist/notie.min.js',
                      'scripts/plugins/notie.js',
                      'scripts/app/chat.js'
                    ],
    mail:           [
                      '../public/libs/list.js/dist/list.js',
                      '../public/libs/notie/dist/notie.min.js',
                      'scripts/plugins/notie.js',
                      'scripts/app/mail.js'
                    ],
    user:           [
                      '../public/libs/list.js/dist/list.js',
                      '../public/libs/notie/dist/notie.min.js',
                      'scripts/plugins/notie.js',
                      'scripts/app/user.js'
                    ],
    screenfull:     [
                      '../public/libs/screenfull/dist/screenfull.js',
                      'scripts/plugins/screenfull.js'
                    ],
    jscroll:        [
                      '../public/libs/jscroll/jquery.jscroll.min.js'
                    ],
    stick_in_parent:[
                      '../public/libs/sticky-kit/jquery.sticky-kit.min.js'
                    ],
    scrollreveal:   [
                      '../public/libs/scrollreveal/dist/scrollreveal.min.js',
                      'scripts/plugins/jquery.scrollreveal.js'
                    ],
    owlCarousel:    [
                      '../public/libs/owl.carousel/dist/assets/owl.carousel.min.css',
                      '../public/libs/owl.carousel/dist/assets/owl.theme.css',
                      '../public/libs/owl.carousel/dist/owl.carousel.min.js'
                    ],
    html5sortable:  [
                      '../public/libs/html5sortable/dist/html.sortable.min.js',
                      'scripts/plugins/jquery.html5sortable.js',
                      'scripts/plugins/sortable.js'
                    ],
    easyPieChart:   [
                      '../public/libs/easy-pie-chart/dist/jquery.easypiechart.min.js' 
                    ],
    peity:          [
                      'public/libs/peity/jquery.peity.js',
                      'scripts/plugins/jquery.peity.tooltip.js',
                    ],
    chart:          [
                      '../public/libs/moment/min/moment-with-locales.min.js',
                      '../public/libs/chart.js/dist/Chart.min.js',
                      'scripts/plugins/jquery.chart.js',
                      'scripts/plugins/chartjs.js'
                    ],
    dataTable:      [
                      'public/libs/datatables/media/js/jquery.dataTables.min.js',
                      'public/libs/datatables.net-bs4/js/dataTables.bootstrap4.js',
                      'public/libs/datatables.net-bs4/css/dataTables.bootstrap4.css',
                      'public/scripts/plugins/datatable.js'
                    ],
    bootstrapTable: [
                      'public/libs/bootstrap-table/dist/bootstrap-table.min.css',
                      'public/libs/bootstrap-table/dist/bootstrap-table.min.js',
                      'public/libs/bootstrap-table/dist/extensions/export/bootstrap-table-export.min.js',
                      'public/libs/bootstrap-table/dist/extensions/mobile/bootstrap-table-mobile.min.js',
                      'public/scripts/plugins/tableExport.min.js',
                      'public/scripts/plugins/bootstrap-table.js'
                    ],
    bootstrapWizard:[
                      '../public/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js'
                    ],
    // dropzone:       [
    //                   '../public/libs/dropzone/dist/min/dropzone.min.js',
    //                   '../public/libs/dropzone/dist/min/dropzone.min.css'
    //                 ],
    datetimepicker: [
                      '../public/libs/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css',
                      '../public/libs/moment/min/moment-with-locales.min.js',
                      '../public/libs/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js',
                      'scripts/plugins/datetimepicker.js'
                    ],
    datepicker:     [
                      "../public/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js",
                      "../public/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css",
                    ],
    fullCalendar:   [
                      '../public/libs/moment/min/moment-with-locales.min.js',
                      '../public/libs/fullcalendar/dist/fullcalendar.min.js',
                      '../public/libs/fullcalendar/dist/fullcalendar.min.css',
                      'scripts/plugins/fullcalendar.js'
                    ],
    parsley:        [
                      '../public/libs/parsleyjs/dist/parsley.min.js'
                    ],
    select2:        [
                      'public/libs/select2/dist/css/select2.min.css',
                      'public/libs/select2/dist/js/select2.min.js',
                      'public/scripts/plugins/select2.js'
                    ],
    summernote:     [
                      'public/libs/summernote/dist/summernote.css',
                      'public/libs/summernote/dist/summernote-bs4.css',
                      'public/libs/summernote/dist/summernote.min.js',
                      'public/libs/summernote/dist/summernote-bs4.min.js'
                    ],
    vectorMap:      [
                      '../public/libs/jqvmap/dist/jqvmap.min.css',
                      '../public/libs/jqvmap/dist/jquery.vmap.js',
                      '../public/libs/jqvmap/dist/maps/jquery.vmap.world.js',
                      '../public/libs/jqvmap/dist/maps/jquery.vmap.usa.js',
                      '../public/libs/jqvmap/dist/maps/jquery.vmap.france.js',
                      'scripts/plugins/jqvmap.js'
                    ],
    waves:          [
                      '../public/libs/node-waves/dist/waves.min.css',
                      '../public/libs/node-waves/dist/waves.min.js',
                      'scripts/plugins/waves.js'
                    ]
  };

var MODULE_OPTION_CONFIG = {
  parsley: {
    errorClass: 'is-invalid',
    successClass: 'is-valid',
    errorsWrapper: '<ul class="list-unstyled text-sm mt-1 text-muted"></ul>'
  }
}
