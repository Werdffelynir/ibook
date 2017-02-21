<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="js/namespaceapplication.js"></script>
    <style>
        .num-ins{
            border: 1px solid black;
        }
    </style>
</head>
<body>
<div id="page">

    <ul id="nums" class="list">
        <li>0000000000</li>
        <li>0000000000</li>
        <li class="num" data-id="id001">0000000001</li>
        <li class="num" data-id="id002">0000000002</li>
        <li class="num" data-id="id003">0000000003</li>
        <li>0000000000
            <ul class="list">
                <li>ins 1 0000000</li>
                <li class="num-ins">ins 1 0000001</li>
                <li>ins 1 0000003</li>
            </ul>
        </li>
    </ul>

</div>




<script>

/*    var eachParent = function (selector, callbackFilter, loops) {
        loops = loops === undefined ? 10 : loops;
        selector = NamespaceApplication.isNode(selector) ? selector : NamespaceApplication.query(selector);

        var result = [],
            get_parent = function (elem) {
                return elem && elem.parentNode ? elem.parentNode : false
            },
            parent = get_parent(selector);

        while (loops > 0 && parent) {
            loops--;

            if (typeof callbackFilter === 'function') {
                if (callbackFilter.call({}, parent))
                    result.push(parent);
            } else {
                result.push(parent);
            }

            parent = get_parent(parent);
        }
        return result;
    };



//    var r = queryUp('.num-ins', 'li', 5);
//    if (NSA.isNode(r))
//        NSA.css(r, 'border: 5px solid red');
//
//    console.log(NSA.isNode(r), r);

    var filter = function (parent) {
        if (parent.classList && parent.classList.contains('list'))
            return true;
        console.log('parent', parent, parent.classList);
    };
    var result = eachParent('.num-ins', filter);

    console.log('eachParent', result);



/!*,
 'li',
 document.body,
 function(p){
 console.log(p);
 },
 10*!/*/

</script>
</body>
</html>