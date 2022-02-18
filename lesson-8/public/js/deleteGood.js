function deleteGood(id){
    $.ajax({
        url: "../model/MDeleteGood.php",
        type: "POST",
        data: { id },
        success: function(data){
            $('#'+id).detach();
        }
    });
}