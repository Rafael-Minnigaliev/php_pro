function changeForm(id){
    $.ajax({
        url: "../model/MChangeForm.php",
        type: "POST",
        data: { id },
        success: function(data){
            $('#'+id).empty();
            $('#'+id).append(data);
        }
    });
}

$('#good_form').on('submit', function(e){
    e.preventDefault();
    let id = $(this).attr('goodId');
    $.ajax({
            method: 'POST',
            url: '../model/MChangeGood.php',
            encType: 'multipart/form-data',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data){
                $('#'+id).empty();
                $('#'+id).append(data);
            }
        }
    );
});