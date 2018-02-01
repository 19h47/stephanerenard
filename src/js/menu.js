var menu = {
    
    // constants
    __NAMESPACE__: '.menu',

    // public

    // DOM public elements
    $body: null,

    // DOM private elements
    _classMenuOpen: 'menu--is-open',
    _$nav: null,

    // functions
    init: function() {
        // console.info('menu.init');
        
        this.$body = $('body');

        this._$nav = $('#js-nav');

        this._initEvents();
    },
    destroy: function() {
        // console.info('menu.destroy');

        // remove variables

    },
    _initPlugins: function() {
        // console.info('menu._initPlugins');

        var _this = this;

    },
    _initEvents: function() {
        // console.info('menu._initEvents');

        var _this = this;

        // TOGGLE MENU RESPONSIVE
	    $(document)
            .on('click.menu', '#js-toggle-menu', function(e) {
                // only on mobile
                if (!app.is_mobile) {
                    return;
                }
                
    	        // AVOID PROPAGATION OF EVENT IN DOM
    	        e.stopPropagation();

                if (_this.$body.hasClass(_this._classMenuOpen)) {
                    _this.close();    
                } else{
                    _this.open();
                }
            })
	        .on('click.menu', function(e) {
                // only on mobile
                if (!app.is_mobile) {
                    return;
                }

	            // e.preventDefault();

	            // console.log( e.target );
                if (_this.$body.hasClass(_this._classMenuOpen) && !$(e.target).closest(_this._$nav).length) {
                    _this.close();
                }
           });
    },

    open: function() {
        // only on mobile
        if (!app.is_mobile) {
            return;
        }

        this.$body.addClass(this._classMenuOpen);
        // this._openAnimation();
    },
    close: function() {
        // only on mobile
        if (!app.is_mobile) {
            return;
        }

    	this.$body.removeClass(this._classMenuOpen);
        // this._closeAnimation();
    },

    // MOBILE MENU ANIMATION
    _openAnimation: function() {
        var _this = this;

        TweenLite
            .to(
            	_this._$nav,
            	0.3,
                { 
                    autoAlpha: 1
                }
            );
    },
    _closeAnimation: function() {
        var _this = this;

        TweenLite
            .to(
                _this._$nav,
                0.3,
                { 
                    autoAlpha: 0
                }
            );
    }

};

$(function() {
	menu.init();
});
