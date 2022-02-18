<?php
include_once "engine/connect.php";
include_once "Twig/Autoloader.php";
Twig_Autoloader::register();
$limit = 20;

try{
    $result = $db->query("SELECT * FROM goods LIMIT {$limit}");
    if($db->errorCode() != 0000){
        $er_arr = $db->errorInfo();
        echo "Error: {$er_arr[2]}";
    }
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    $res = $db->query("SELECT count(id) FROM goods");
    if($db->errorCode() != 0000){
        $er_arr = $db->errorInfo();
        echo "Error: {$er_arr[2]}";
    }
    $good_count = $res->fetch(PDO::FETCH_COLUMN);
    $max_page = ceil($good_count / $limit);

    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader);
    $template = $twig->loadTemplate('catalog.tmpl');

    echo $template->render(array(
        'data' => $data,
        'max_page'=> $max_page,
        'limit' => $limit
    ));

} catch (PDOException $e){
    echo "Error: {$e->getMessage()}";
}
?>

<script>
    $('#showmore-button').click(function (){
        let item = $(this);
        let page = item.attr('page');
        let limit = item.attr('limit');
        page++;
        $.ajax({
            url: 'public/js/ajax.php?page='+page+'&limit='+limit,
            dataType: 'html',
            success: function(data){
                $('#catalog__list .catalog').append(data);
            }
        });
        item.attr('page', page);
        if(page == item.attr('max_page')){
            item.hide();
        }
        return false;
    });
</script>





