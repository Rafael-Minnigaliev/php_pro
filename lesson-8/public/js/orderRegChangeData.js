$("#form").on("submit", function(e){
    e.preventDefault();
    $.ajax({
        url: '../model/MOrderRegChangeData.php',
        method: 'post',
        data: $(this).serialize(),
        success: function(data){
            $('#message').html(data);
        }
    });
});
