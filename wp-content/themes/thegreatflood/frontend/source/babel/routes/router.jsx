'use strict'

// Dependencies
import Backbone from 'backbone'

// Views
import BaseView from '../views/base-view.jsx'

let view = '';

const LoadView = ( Layout )=> {
    if ( view ) view.remove();
    view = new Layout();
}

const Router = new Backbone.Router ({

    routes: {
        '*all': 'default',
    }

});

Router.on( 'route:default', ()=> {
    LoadView( BaseView );
});

export default Router