var App = new NamespaceApplication({
    url: '/',
    name: 'My Application',
    debug: true,
    node: {},
    form: function (name) {
        name = name || 'form';
        switch (name) {
            case 'form':
                return  App.query('form[name="editor"]');
            case 'title':
                return  App.query('form[name="editor"] input[name="title"]');
            case 'content':
                return  App.query('form[name="editor"] textarea[name="content"]');
            case 'create':
                return  App.query('#editor-create-reflection');
            case 'error':
                return  App.query('.error');
        }
        return false;
    }
});





App.load_pages_list = function () {
    App.ajax({
        data: {mode:'getpages'},
        method:'post',
        action:'server/server.php'
    }, function (status, response) {
        try {
            response = JSON.parse(response);
        } catch (e) {
            console.log("cant parse response JSON", response);
            return;
        }
        var i, pages = response.pages,
            item, menu = App.createElement('ul');

        for (i = 0; i < pages.length; i ++) {
            item = App.createElement('li', {'data-id': pages[i].id}, pages[i].title);
            menu.appendChild(item);
        }

        App.inject(App.node['box-list'], menu);
    });
};


App.formatElement = function (element, formated) {
    element.innerHTML = App.format(element.innerHTML, formated);
};

App.domLoaded(init);

function init () {
    App.node['form'] = App.form();
    App.node['box-form'] = App.query('#box-form');
    App.node['box-list'] = App.query('#box-list');
    App.node['box-view'] = App.query('#box-view');

    App.formatElement(App.node['form'], {
        id: '',
        title: '',
        content: '',
        mode: 'insert'
    });

    // Loaded pages data, create menu list
    App.load_pages_list ();

    App.on(App.form(), 'submit', function (event) {
        var formData = new FormData(this);
        event.preventDefault();

        if (App.form('title').value.length < 2 || App.form('content').value.length < 2 ) {
            App.form('error').classList.remove('hide');
            App.form('error').innerHTML = 'Not valid values';
        } else {
            App.form('error').classList.add('hide');
            App.form('error').innerHTML = '';
            App.ajax({
                data: formData,
                method:'post',
                action:'server/server.php'
            }, function (status, response) {
                console.log(status, response);
            });
        }
    });
}


function actionMenu (event) {}






























function parse (data) {
    //var type = false;
    //console.log(data.tagName, App.typeOfStrict(data));
    // HTMLFormElement
    //NamespaceApplication.parse = function (data, callback, thisInstance) {};
}
