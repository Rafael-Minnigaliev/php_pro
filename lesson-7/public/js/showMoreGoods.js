$('#showmore-button').click(function (){
    let item = $(this);
    let page = item.attr('page');
    let gcat = item.attr('gcat');
    let gen = item.attr('gen');
    let uid = item.attr('uid');
    let sid = item.attr('sid');
    page++;
    $.ajax({
        url: "../model/MshowMoreGoods.php",
        type: "POST",
        data: { page, gcat, gen, uid, sid },
        success: function(data){
            $('#catalog__list').append(data);
        }
    });
    item.attr('page', page);
    if(page == item.attr('max_page')){
        item.hide();
    }
    return false;
});