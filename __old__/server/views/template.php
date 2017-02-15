<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Template</title>
    <link rel="stylesheet" href="css/grid.css">
    <style>
        #page{}
        #left{}
        #right{}
        form#edit{}
        form#edit .form_line{}
        form#edit .form_line>*:first-child{
            width: 200px;
        }
    </style>
</head>
<body>
    <div id="page" class="table">
        <div id="left">
            <h3>Pages</h3>
            <ul>
                <li>Page 1</li>
                <li>Page 1</li>
                <li>Page 1</li>
                <li>Page 1</li>
                <li>Page 1</li>
                <li>Page 1</li>
            </ul>
        </div>
        <div id="right">

            <form id="edit" action="">

                <div class="form_line table">
                    <p>Page Title</p>
                    <p><input type="text" name="title"></p>
                </div>
                <div class="form_line table">
                    <p>Page Text</p>
                    <p><textarea name="text"></textarea></p>
                </div>
                <div class="form_line table">
                    <p>Page links</p>
                </div>

            </form>

        </div>
    </div>
</body>
</html>