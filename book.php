<?php

    include 'server/server.php';

//    $page_links = $page->getPageLinks(2);
//    var_dump($page_data);
//    var_dump($page_links);
    //UPDATE page SET title='Change title name', text='Some text'', group='ok', note='ok', links='[]' WHERE id = 3;


//    $page_data = $page->getPage(3);
//    $page_data['note'] = 'my note';
//    $update_result = $page->updatePages(3, $page_data);
//    var_dump($update_result);
//    var_dump(Page::db()->getError());


//    $insert_result = $page->insertPages([
//        "title"=>"title",
//        "text"=>"text",
//        "group"=>"group",
//        "note"=>"note",
//        "goto"=>"goto"
//    ]);
//    var_dump($insert_result);
//    var_dump(Page::db()->getError());

//$open_id = isset($_GET['goto']) ? (int) $_GET['goto'] : 1;
//$data_page = $page->getPage($open_id);
//$data_link = $page->getPageLinks($open_id);
//$data_page = $page->toDefaultFields($data_page, false);

//var_dump($data_page);



?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/book.css">

    <script data-init="js/book.js" src="js/namespaceapplication.js"></script>
</head>
<body>
<div id="page">

    <?php echo $layout->outPosition('page'); ?>

</div>
</body>
</html>