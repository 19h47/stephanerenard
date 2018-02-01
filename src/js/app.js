var app = {
    
    // constants
    __NAMESPACE__: '.app',
    
    // private
    _body_scrollLeft: 0,
    _body_scrollTop: 0,
    _class_body_ready: 'is-ready',

    // public
    viewport: {
        width: 0,
        height: 0
    },
    is_mobile: true,

    // DOM public elements
    $body: null,

    // DOM private elements

    // functions
    init: function() {
        console.info('app.init');
        
        var _this = this;
        
        this.$body = $('body');

        this.is_mobile = true;

        this.resize();

        this._initPlugins();
        this._initEvents();

       $(document).on("ready page:change", function() {
    
            _this.$body
                .removeClass('first-loading')
                .addClass(_this._class_body_ready);
        });

            
    },
    destroy: function() {
        // console.info('app.destroy');

        // remove variables

    },
    _initPlugins: function() {
        // console.info('app._initPlugins');

        var _this = this;

        // Barba.js
        // http://barbajs.org/
        Barba.Pjax.start();

        TweenLite.defaultEase = Expo.easeOut;

    },
    _initEvents: function() {
        // console.info('app._initEvents');

        var _this = this;

        $(window)
            .on('resize' + this.__NAMESPACE__, function() {
                _this.resize();
            });

    },

    resize: function() {
        this._resetViewportDimensions();

        Page.calcColumnGap();

        this.is_mobile = (this.viewport.width < 768);

    },
    _resetViewportDimensions: function() {
        this.viewport.width = $(window).width();
        this.viewport.height = $(window).height();
    },
    disableScroll: function() {
        // lock scroll position, but retain settings for later
        // http://stackoverflow.com/a/3656618
        this._body_scrollLeft = self.pageXOffset || document.documentElement.scrollLeft  || document.body.scrollLeft;
        this._body_scrollTop = self.pageYOffset || document.documentElement.scrollTop  || document.body.scrollTop;
        $('html').css('overflow', 'hidden');
        window.scrollTo(this._body_scrollLeft, this._body_scrollTop);
        // disable scroll on touch devices as well
        if (this.is_touch) {
            $(document).on('touchmove.app', function(e) {
                e.preventDefault();
            });
        }
    },
    enableScroll: function(_position) {
        if (typeof _position === 'undefined') {
            _position = this._body_scrollTop;
        }

        var resume_scroll = true;
        if (typeof _position === 'boolean' && _position === false) {
            resume_scroll = false;
        }

        // unlock scroll position
        // http://stackoverflow.com/a/3656618
        $('html').css('overflow', 'visible');
        // resume scroll position if possible
        if (resume_scroll) {
            window.scrollTo(this._body_scrollLeft, _position);
        }
        // enable scroll on touch devices as well
        if (this.is_touch) {
            $(document).off('touchmove.app');
        }
    },

};

$(function() {
	app.init();
});
