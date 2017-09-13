'use strict'

// Dependencies
import React from 'react'
import jQuery from 'jquery'
import Backbone from 'backbone'
import ReactDOM from 'react-dom'
import underscore from 'underscore'

const $ = jQuery;
const _ = underscore;

// URL Parameters
import params from '../util/url-parameters.jsx'

class BaseView extends Backbone.View {
    
    constructor( params ) {
        super();
        this.params = params;
        this.events = this.events.bind( this );
        this.render = this.render.bind( this );
        this.initialize = this.initialize.bind( this );
    }

    el() { return document.body }

    events() {
        return {
            'click': 'ToggleNavigationMenu',
            'touch': 'ToggleNavigationMenu'
        }
    }

    initialize() {
        console.log( 'SHANNON FLOOD BASEVIEW LOADED' );
        return this;
    }

    render() {
        return this;
    }

    ToggleNavigationMenu( e ) {
        e.stopPropagation();
        const $target = $( e.target );
        if ( window.innerWidth > 991 ) return this;
        if ( /^a$/gi.test( e.target.nodeName ) && $target.parents( '.menu-item' ).get( 0 ) ) return this;
        if ( !this.$el.hasClass( 'navigation-open' ) && !$target.hasClass( 'sidebar' ) ) return this;
        this.$el.toggleClass( 'navigation-open' );
        return this;
    }

}

export default BaseView