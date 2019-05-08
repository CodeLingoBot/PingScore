$(document).ready(function(){
    $('#add').click(function(){
        $('#id').val("");
        $('#insert').val("Ajouter");
        $('#id').val("");
        $('#del').prop("type", "hidden");
        $('#insert_form')[0].reset();
    });
    $(document).on('click', '.edit_data', function(){
        let id = $(this).attr("id");
        $.ajax({
            url:"../../controllers/players/fetch.php",
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
                $('#insert').val("Mettre à jour");
                $('#del').prop("type", "button");
                $('#add_data_Modal').modal('toggle');
            }
        });
    });
    $('#insert_form').on("submit", function(event){
        event.preventDefault();
        let formData = new FormData(this); //$('#insert_form').serialize()
            $.ajax({
                url:"../../controllers/players/insert.php",
                method:"POST",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    type = "success";
                    title = "Succès";
                    if($('#insert').val() == "Mettre à jour"){
                        message = 'Les informations de ' + $('#name').val() + ' ' + $('#surname').val() + " ont été mises à jour";
                    } else {
                        message = 'Les informations de ' + $('#name').val() + ' ' + $('#surname').val() + " ont été créées";
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