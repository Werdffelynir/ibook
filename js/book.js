
var App = new NamespaceApplication({
    url:'/interactive_book/demo.php',
    name:'My Application',
    debug:true,
    data: {pages: []},
    node:{}
});






(function () {
    NSA.queryAll('.fp-item-title').map(function(item){
        NSA.on(item, 'click', function (event) {
            var elem =  event.target.nextElementSibling;
            NSA.cssDisplay.toggle(elem);
        });
    });
    NSA.on('#fp-box-open', 'click', function (event) {
        var elem =  event.target.nextElementSibling;
        NSA.cssDisplay.toggle(elem);
    });
})();