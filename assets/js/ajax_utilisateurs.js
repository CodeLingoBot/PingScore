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
            url:"../../controllers/users/fetch.php",
            method:"POST",
            data:{id:id},
            dataType:"json",
            success:function(data){
                $('#username').val(data.username);
                $('#id').val(data.id);
                $('#insert').val("Mettre à jour");
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
                    title = "Succès";
                    if($('#insert').val() == "Mettre à jour"){
                        message = $('#username').val() + " a été mis à jour";
                    } else {
                        message = $('#username').val() + " a été créé";
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
        }
    });
});