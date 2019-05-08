$(document).ready(function(){
    $('#add').click(function(){
        $('#id').val("");
        $('#insert').val("Ajouter");
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
                $('#insert').val("Mettre à jour");
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
                    title = "Succès";
                    if($('#insert').val() == "Mettre à jour"){
                        message = 'Le match n°' + $('#id').val() + ' a été mis à jour';
                    } else {
                        message = 'Le match n°' + $('#id').val() + ' a été créé';
                    }

                    $('#id').val("");
                    $('#insert').val("Ajout...");
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