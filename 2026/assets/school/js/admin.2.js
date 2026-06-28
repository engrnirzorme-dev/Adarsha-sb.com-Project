$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
    });
    $('.select2').select2();
});


$(document).ready(function () {

    $("body").on("focus", ".mark_upload", function () {
        var sl = $(this).attr("data-sl");
        $("#status_" + sl).html('<i class="fa fa-pencil-square-o text-warning" aria-hidden="true"></i>');
    });

    $("body").on("blur", ".mark_upload", function () {
        var sl = $(this).attr("data-sl");
        $("#status_" + sl).html('<i class="fa fa-spinner text-primary" aria-hidden="true"></i>');
        var mark = $(this).val();
        var full_mark = $(this).attr("max");
        var student_id = $(this).attr("data-student_id");
        var class_id = $(this).attr("data-class_id");
        var sub_code = $(this).attr("data-sub_code");
        var exam = $(this).attr("data-exam");
        var type = $(this).attr("data-type");
        var id = $(this).attr("data-id");
        $.post(site_url+'admin/updatemark', {id:id, mark:mark, full_mark:full_mark, student_id:student_id, class_id:class_id, sub_code:sub_code, exam:exam, type:type}, function(result){
            
            var resultOBJ = JSON.parse(result);

            if(resultOBJ.status==1){
                if(id==""){
                    $( "input[data-sl='"+sl+"']" ).attr("data-id", resultOBJ.insertID);
                    console.log(resultOBJ.insertID);
                }
                $("#status_" + sl).html('<i class="fa fa-check-square-o text-success" aria-hidden="true"></i>');
            }else if(resultOBJ.status==2){
                $("#status_" + sl).html('');
            }else{
                $("#status_" + sl).html('<i class="fa fa-exclamation text-danger" aria-hidden="true" data-toggle="tooltip" title="'+resultOBJ.msg+'"></i>');
            }
        });
    });

// Setup - add a text input to each footer cell
    $('.datatable tfoot th').each(function () {
        var title = $(this).text();
        if (title != "") {
            titles = title.split("*");
            if (titles.length > 1) {
                var str = '<select class="select_find  form-control">';
                str += '<option value="">Select ' + titles[0] + '</option>';
                for (i = 1; i < titles.length; i++) {
                    var values = titles[i].split(":");
                    if (values.length > 1) {
                        str += '<option value="' + values[0] + '">' + values[1] + '</option>';
                    } else {
                        str += '<option value="' + titles[i] + '">' + titles[i] + '</option>';
                    }
                }
                str += '</select>';
                $(this).html(str);
            } else {
                $(this).html('<input class="input_find form-control" type="text" placeholder="' + title + '" />');
            }

        }
    });

    // DataTable 1
    var table = $('#datatable1').DataTable({
        "paging": true,
        "lengthChange": true,
        "pageLength": 10,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": true
    });
    // Apply the search
    table.columns().every(function () {
        var that = this;

        $('input, select', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that
                        .search(this.value)
                        .draw();
            }
        });
    });
    //End Datatable 1
    // DataTable 1
    var table2 = $('#datatable2').DataTable({
        "paging": true,
        "lengthChange": true,
        "pageLength": 25,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": true
    });
    // Apply the search
    table2.columns().every(function () {
        var that = this;

        $('input, select', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that
                        .search(this.value)
                        .draw();
            }
        });
    });
    //End Datatable 2
    // DataTable 3
    var table3 = $('#datatable3').DataTable({
        "paging": true,
        "lengthChange": true,
        "pageLength": 25,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": true
    });
    // Apply the search
    table3.columns().every(function () {
        var that = this;

        $('input, select', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that
                        .search(this.value)
                        .draw();
            }
        });
    });
    //End Datatable 3    
});

