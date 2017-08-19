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
        return {}
    }

    initialize() {
        console.log( 'SHANNON FLOOD BASEVIEW LOADED' );
        console.log( params );
        return this;
    }

    render() {
        return this;
    }

}

export default BaseView