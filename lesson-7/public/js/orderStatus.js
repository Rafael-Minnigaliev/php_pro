function show() {
    let id = $('#order_list').attr('user');
    $.ajax({
        url: "../model/MStatusUpdate.php?id="+id,
        cache: false,
        success: function(answer){
            let data = JSON.parse(answer);
            for(let i of data){
                $("#statusUp"+i.id).empty();
                $("#statusUp"+i.id).append(i.status);
            }
        }
    });
}

$(document).ready(function(){
    show();
    setInterval('show()', 60000);
});