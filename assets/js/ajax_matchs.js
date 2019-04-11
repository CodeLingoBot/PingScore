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
            url:"../../controllers/matchs/fetch.php",
            method:"POST",
            data:{id:id},
            dataType:"json",
            success:function(data){
                $('#hour').val(data.hour);
                $('#blue_player').val(data.blue_player);
                $('#red_player').val(data.red_player);
                $('#court').val(data.court);
                $('#state').val(data.state);
                $('#id').val(data.id);
                $('#insert').val("Update");
                $('#del').prop("type", "button");
                $('#add_data_Modal').modal('toggle');
            }
        });
    });
    $('#insert_form').on("submit", function(event){
        event.preventDefault();
            $.ajax({
                url:"../../controllers/matchs/insert.php",
                method:"POST",
                data:$('#insert_form').serialize(),
                beforeSend:function(){
                    type = "success";
                    title = "Success";
                    if($('#insert').val() == "Update"){
                        message = $('#blue_player').val() + ' - ' + $('#red_player').val() + " match\'s Informations Updated";
                    } else {
                        message = $('#blue_player').val() + ' - ' + $('#red_player').val() + " match\'s Informations Created";
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
    });
});