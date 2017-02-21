
var App = new NamespaceApplication({
    url:'/ibook/book.php',
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




var Mox = function () {
    if (!(this instanceof Mox)) return new Mox();
    this.stack = {};
};
Mox.prototype.set = function (name, src) {
    this.stack[name] = src;
    return this;
};
Mox.prototype.get = function (name) {

};

var m = Mox();
