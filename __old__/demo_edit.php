<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/grid.css">

<!--    <link rel="stylesheet" href="css/demo.css">-->

    <script data-init="js/demo.js" src="js/namespaceapplication.js"></script>

    <style>
        .r-item>span:first-child{
            display: inline-block;
            width: 100px;
        }

        .editbox-form>div>span{
            display: inline-block;
            width: 60px;
        }
    </style>
</head>
<body>
<div id="page" class="table">

    <div id="menu">menu</div>

    <div id="content">



        <div class="editbox table">
            <div class="editbox-list valign_top">
                <ul>
                    <li data-id="">edit item</li>
                    <li data-id="">edit item</li>
                    <li data-id="">edit item</li>
                </ul>
            </div>
            <div class="editbox-form valign_top">
                <div>
                    <span>text</span>
                    <span><input type="text"></span></div>
                <div>
                    <span>text</span>
                    <span><input type="text"></span></div>
                <div>
                    <span>text</span>
                    <span><input type="text"></span></div>
            </div>
        </div>




    </div>

</div>
</body>
</html>