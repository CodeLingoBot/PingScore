$(document).ready(function(){
    $('#add').click(function(){
        $('#id').val("");
        $('#insert').val("Insert");
        $('#del').prop("type", "hidden");
        $('#insert_form')[0].reset();
    });
    $(document).on('click', '.edit_data', function(){
        var id = $(this).attr("id");
        $.ajax({
            url:"../../controllers/users/fetch.php",
            method:"POST",
            data:{id:id},
            dataType:"json",
            success:function(data){
                $('#username').val(data.username);
                $('#password').val(data.password);
                $('#id').val(data.id);
                $('#insert').val("Update");
                $('#del').prop("type", "button");
                $('#add_data_Modal').modal('toggle');
            }
        });
    });
    $('#insert_form').on("submit", function(event){
        event.preventDefault();
        if($('#username').val() === ''){
            alert("Name is required");
        } else if($('#password').val() === ''){
            alert("Pasword is required");
        } else if($('#role').val() === ''){
            alert("Rôle is required");
        } else{
            $.ajax({
                url:"../../controllers/users/insert.php",
                method:"POST",
                data:$('#insert_form').serialize(),
                beforeSend:function(){
                    type = "success";
                    title = "Success";
                    if($('#insert').val() == "Update"){
                        message = $('#username').val() + "\'s Informations Updated";
                    } else {
                        message = $('#username').val() + "\'s Informations Created";
                    }
                    $('#id').val("");
                    $('#insert').val("Inserting");
                },
                success:function(data){
                    $('#insert_form')[0].reset();
                    $('#add_data_Modal').modal('toggle');
                    $('#employee_table').html(data);
                    showToastr(type, title, message);
                }
            });
        }
    });
});