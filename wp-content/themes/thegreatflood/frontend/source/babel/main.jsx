'use strict'

// Dependencies
import Backbone from 'backbone'

// Router
import Router from './routes/router.jsx'

(()=> {
    const status = Backbone.history.start({
        pushState: true,
        hashChange: false,
    });
})();