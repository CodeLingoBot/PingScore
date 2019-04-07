$(document).ready(function(){
    function showToastr(type, title, message) {
        toastr.remove();
        let body;
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": true,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": 5000,
            "onclick": null,
            "onCloseClick": null,
            "extendedTimeOut": 0,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "tapToDismiss": false
        };
        switch(type){
            case "success": body = "<span> <i class='fa fa-cog fa-pulse'></i></span>";
                break;
            default: body = '';
        }
        const content = message + body;
        toastr[type](content, title)
    }
    $('#add').click(function(){
        $('#insert').val("Insert");
        $('#del').prop("type", "hidden");
        $('#insert_form')[0].reset();
    });
    $(document).on('click', '.edit_data', function(){
        var id = $(this).attr("id");
        $.ajax({
            url:"../../controllers/fetch.php",
            method:"POST",
            data:{id:id},
            dataType:"json",
            success:function(data){
                $('#surname').val(data.surname);
                $('#name').val(data.name);
                $('#cat').val(data.cat);
                $('#club').val(data.club);
                $('#rank').val(data.rank);
                $('#id').val(data.id);
                $('#insert').val("Update");
                $('#del').prop("type", "button");
                $('#add_data_Modal').modal('show');
            }
        });
    });
    $('#insert_form').on("submit", function(event){
        event.preventDefault();
        if($('#surname').val() == ""){
            alert("Name is required");
        } else if($('#name').val() == ''){
            alert("Address is required");
        } else if($('#club').val() == ''){
            alert("Designation is required");
        } else if($('#rank').val() == ''){
            alert("Age is required");
        } else{
            $.ajax({
                url:"../../controllers/insert.php",
                method:"POST",
                data:$('#insert_form').serialize(),
                beforeSend:function(){
                    $('#insert').val("Inserting");
                },
                success:function(data){
                    $('#insert_form')[0].reset();
                    $('#add_data_Modal').modal('hide');
                    $('#employee_table').html(data);
                    type = "success";
                    title = "Success";
                    message = "Data up to date !";
                    showToastr(type, title, message);
                }
            });
        }
    });
});