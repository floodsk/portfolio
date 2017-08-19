'use strict'

// Dependencies
import React from 'react'
import jQuery from 'jquery'
import Backbone from 'backbone'
import ReactDOM from 'react-dom'
import underscore from 'underscore'

// Views
import BaseView from './base-view.jsx'

// Utitlities
import params from '../util/url-parameters.jsx'

const $ = jQuery;
const _ = underscore;

class SampleView extends BaseView {

    constructor( params ) {
        super();
        super.initialize();
        this.events = this.events.bind( this );
        this.render = this.render.bind( this );
        this.initialize = this.initialize.bind( this );
    }

    el() { return document.body }

    events() {
        return _.extend({
        }, super.events() );
    }

    initialize() {
        console.log( 'SHANNONFLOOD SAMPLEVIEW LOADED' );
        return this;
    }

    render() {
        return this;
    }

}

export default SampleView