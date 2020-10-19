require('./bootstrap');

import $ from 'jquery';
require('jquery-easing');
require('popper.js');
require('bootstrap');
require('./sb-admin-2.js');

//Enable popper.js / bootstrap tooltips
window.addEventListener('load', function() {
    $('[data-toggle="tooltip"]').tooltip()
});

//Script to send DELETE requests without creating a form
var restful = {

    // TODO: add various configurations, e.g.
    // - do_confirm: [ true | false ]
    // - confirm_message: "Are you sure?"
    // - do_remove_parent: [ true | false ]
    // - parent_selector: '.li' '.div' ...
    // - success: (closure)

    init: function(elem) {
        elem.on('click', function(e) {
            self=$(this);
            e.preventDefault();

            if(confirm('Are you sure?')) {
              $.ajax({
                url: self.attr('href'),
                method: 'DELETE',
                success: function(data) {
                  self.parent('li').remove();
                  self.parent('li').parent('ul').parent('div.card-body').parent('div.card').remove(); // todo: make configurable
                },
                error: function(data) {
                    alert("Error while deleting.");
                    console.log(data);
                }
              });
            };
        })
    },
}
