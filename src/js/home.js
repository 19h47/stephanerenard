var Home = Barba.BaseView.extend({
    namespace: 'home',
    onEnter: function() {
        // The new Container is ready and attached to the DOM.
        // console.log('Home.onEnter');

        this._construct();
    },
    onEnterCompleted: function() {
        // The Transition has just finished.
        // console.log('Home.onEnterCompleted');

        this.start();
    },
    onLeave: function() {
        // A new Transition toward a new page has just started.
        // console.log('Home.onLeave');

        this.exit();
    },
    onLeaveCompleted: function() {
        // The Container has just been removed from the DOM.
        // console.log('Home.onLeaveCompleted');

        // this.destroy();
    },

    // constants
    __NAMESPACE__: '.home',

    // public

    // DOM public elements
    $body: null,

    // DOM private elements

    // functions
    _construct: function() {
        this.destroy();

        this.$body = $('body');

        this._initPlugins();
        this._initEvents();
    },
    destroy: function() {
        // console.info('home.destroy');

        if (this._scrollmagic_controller) {
            this._scrollmagic_controller.destroy(true);
        }

        this._scrollmagic_controller = null;


        // clear events
        $(document).off(this.__NAMESPACE__);
        // remove variables
        this.$body = null;

    },
    start: function() {
        console.info('home.start');
        // map.init();
    },
    exit: function() {
        console.info('home.exit');
        this.destroy();
    },
    _initPlugins: function() {
        // console.info('home._initPlugins');
        var _this = this;

        $('js-anchor').anchor();

    },
    _initEvents: function() {
        // console.info('home._initEvents');

        var _this = this;

    },

    open: function() {
        this.$body.addClass(this._class_panel_open);
    },
    close: function() {
    	this.$body.removeClass(this._class_panel_open);
    }
});

// Don't forget to init the view!
Home.init();
