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

    <ul id="nums">
        <li>0000000000</li>
        <li>0000000000</li>
        <li class="num" data-id="id001">0000000001</li>
        <li class="num" data-id="id002">0000000002</li>
        <li class="num" data-id="id003">0000000003</li>
        <li>0000000000
            <ul>
                <li>ins 1 0000000</li>
                <li class="num-ins">ins 1 0000001</li>
                <li>ins 1 0000003</li>
            </ul>
        </li>
    </ul>


    <?php echo $layout->outPosition('page'); ?>

</div>
<script>
    //NSA.queryUp = function (from, selector, loops) {};

    var r = NSA.queryUp('li', '.num-ins', 5);
    if (NSA.isNode(r))
        NSA.css(r, 'border: 5px solid red');

    console.log(r);





</script>
</body>
</html>