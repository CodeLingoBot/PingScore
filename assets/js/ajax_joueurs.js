$(document).ready(function(){
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
                $('#add_data_Modal').modal('toggle');
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
                    type = "success";
                    title = "Success";
                    if($('#insert').val() == "Update"){
                        message = $('#name').val() + ' ' + $('#surname').val() + "\'s Informations Updated";
                    } else {
                        message = $('#name').val() + ' ' + $('#surname').val() + "\'s Informations Created";
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