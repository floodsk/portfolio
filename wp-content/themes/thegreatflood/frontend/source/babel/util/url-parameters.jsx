'use strict'

const params = (() => {
    let obj = {};
    let queries = window.location.href.split( /[\?&]/gi );

    for ( let c = 1; c < queries.length; c++ ) {
        var pairs = queries[ c ].split( '=' );
        obj[ pairs[ 0 ] ] = pairs[ 1 ];
    }

    return obj
})();

export default params