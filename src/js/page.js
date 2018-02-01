var Page = Barba.BaseView.extend({
	namespace: 'page',
	onEnter: function() {
        // The new Container is ready and attached to the DOM.
        // console.log('Page.onEnter');

        this._construct();
    },
    onEnterCompleted: function() {
        // The Transition has just finished.
        // console.log('Page.onEnterCompleted');
        this.start();
    },
    onLeave: function() {
        // A new Transition toward a new page has just started.
        // console.log('Page.onLeave');

        this.exit();
    },
    // onLeaveCompleted: function() {
        // The Container has just been removed from the DOM.
        // console.log('Page.onLeaveCompleted');

        // this.destroy();
    // },

    _scrollmagic_controller: null,

    _construct: function() {
    	this.destroy();
    },
    destroy: function() {
    	if (this._scrollmagic_controller) {
    		this._scrollmagic_controller.destroy(true);
    	}

    	this._scrollmagic_controller = null;
    },
    start: function() {
        // console.info('Page.start');
        map.init();
    	this._initPlugins();

        this.calcColumnGap();
    },
    exit: function() {
        // console.info('Page.exit');
    	this.destroy();
    },
    _initPlugins: function() {

        $('js-anchor').anchor();
    },

    calcColumnGap: function(){
        if( $('.js-column') ) {
            var _$column = $('.js-column');

            var _width_section_parent = _$column.closest('.site-section').width();

            var _width_column_gap = (_width_section_parent * 60 ) / 1420;

            _$column.css(
                {
                    'column-gap'            : _width_column_gap + 'px',
                    '-webkit-column-count'  : _width_column_gap + 'px',
                    '-moz-column-count'     : _width_column_gap + 'px'
                });
        }
    }
});

// Don't forget to init the view!
Page.init();
