
var App = new NamespaceApplication({
    url:'/interactive_book/demo.php',
    name:'My Application',
    debug:true,
    data:{pages:[]},
    current_page_data: {},
    current_page_id: 0,
    node:{}
});

App.func = {};

App.func.item_by_attr = function (arr, key, value) {
    var i, result = false;
    for (i = 0; i < arr.length; i ++)
        if (arr[i][key] !== undefined && arr[i][key] == value) {
            result = arr[i];
            break;
        }
    return result;
};

App.func.on_click_menu_item  = function (event) {
    var id = event.target.getAttribute('data-id'),
        page = App.func.item_by_attr(App.data.pages, 'id', id);

    if (id && page) {
        page.content = page.text;
        page.mode = 'update';
        App.render.form(page);
        App.query('#button-remove').classList.remove('hide');
        App.query('#button-new').classList.remove('hide');
    }
};

App.func.on_click_form_submit  = function (event) {
    event.preventDefault();

    if (App.query('input[name="title"]').value.length < 1 ||
        App.query('textarea[name="content"]').value.length) {
        App.query('.error').classList.remove('hide');
        App.query('.error').innerHTML = 'Not valid values';
        return;
    } else {
        App.query('.error').classList.add('hide');
    }

    var form_data = new FormData(this);
    form_data.append('mode', 'insert-update');
    //form_data.append('mode', 'multi');
    //console.log('name exec', App.query('input[name="exec"]', this));

    App.ajax({
        action: '/interactive_book/demo.php',
        method: 'post',
        data: form_data
    }, function (status, response) {
        console.log('response', status, response);
    });
};

App.render = function (elem, id, formate) {
    var template = App.query('#' + id, App.query('#templates')).innerHTML;
    if (template && elem)
        elem.innerHTML = App.format(template, formate);
};

App.render.form = function (values) {
    values = values || {content: '', title: '', mode: '', id: '', note: '', links: ''};
    App.render(App.node['box-form-content'], 'form', values);

    App.on('#box-form-content form', 'submit', App.func.on_click_form_submit);

    App.on('#box-form-content form #button-new', 'click', function () {
        App.render.form();
    });

    App.query('#button-remove').classList.add('hide');
    App.query('#button-new').classList.add('hide');
};

App.render.view = function (values) {
    // ...
    // ...
};

App.render.menu = function () {
    App.ajax({
        action: '/interactive_book/demo.php',
        method: 'post',
        data: {mode:'get'}
    }, function (status, response) {
        if (status === 200) {
            try {
                App.data = JSON.parse(response);
            } catch (e) {
                console.log('response not json string', response);
                return;
            }

            var i, item,
                menu = App.createElement('ul', {id: 'box-list-menu'});

            for (i = 0; i < App.data.pages.length; i ++) {
                item = App.data.pages[i];
                item = App.createElement('li', {'data-id': item.id}, item.title );
                item.onclick = App.func.on_click_menu_item;
                menu.appendChild(item);
            }

            App.inject(App.node['box-list-content'], menu);
        }
    });
};






/* -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  - */
App.domLoaded(function () {

    App.node['page'] = App.query('#page');

    App.node['box-list'] = App.query('#box-list');
    App.node['box-list-head'] = App.query('#box-list-head');
    App.node['box-list-content'] = App.query('#box-list-content');

    App.node['box-form'] = App.query('#box-form');
    App.node['box-form-head'] = App.query('#box-form-head');
    App.node['box-form-content'] = App.query('#box-form-content');

    App.node['box-view'] = App.query('#box-view');
    App.node['box-view-head'] = App.query('#box-view-head');
    App.node['box-view-content'] = App.query('#box-view-content');

    // Render MENU
    App.render.menu();

    // Render FORM INSERT
    App.render.form();

    // Render FORM INSERT
    App.render.view();




});








