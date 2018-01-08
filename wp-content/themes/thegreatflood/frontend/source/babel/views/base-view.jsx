'use strict'

// Dependencies
import jQuery from 'jquery'
import underscore from 'underscore'

const $ = jQuery;
const _ = underscore;

// URL Parameters
import params from '../util/url-parameters.jsx'

export default class BaseView {

    constructor() {
      console.log( 'THE GREAT FLOOD BASEVIEW LOADED' );
      this.menu = this.menu.bind( this );
      this.el = document.body;
      this.params = params;
      this.$el = $( this.el );

      this.$el.on( 'click touch', this.menu )
      document.documentElement.className = document.documentElement.className.replace( /no-js/gi, 'js' );
    }

    menu( e ) {
        if ( window.innerWidth > 991 ) return this;
        e.stopPropagation();
        const $target = $( e.target );
        if ( /^a$/gi.test( e.target.nodeName ) && $target.parents( '.menu-item' ).get( 0 ) ) return this;
        if ( !this.$el.hasClass( 'navigation-open' ) && !$target.hasClass( 'sidebar' ) ) return this;
        this.$el.toggleClass( 'navigation-open' );
        return this;
    }

}
