Barba.Dispatcher.on('initStateChange', function(currentStatus) {
    // console.log('initStateChange');

    // disable scroll between transitions
    app.disableScroll();

    // ensure menu is closed
    menu.close();

    // if (!currentStatus.namespace) {
    //     // set namespace of future before it's load
    //     Barba.Pjax.History.setCurrentNamespace();
    // }

    // console.log(currentStatus);
});

Barba.Dispatcher.on('transitionCompleted', function(currentStatus, prevStatus) {
    // console.log('transitionCompleted');

    $('body').addClass('loaded ready');

    // ensure scroll is enabled but do not reset it
    app.enableScroll(false);

    // show back container
    // TweenLite.set(Barba.Pjax.Dom.getContainer(), { opacity: 1 });

    // only when page has changed, not on first load
    // if (typeof prevStatus !== 'undefined') {
    //     // set color of header when page is fully loaded
    //     var header_color = 'white';
    //     if (!currentStatus.namespace || ['page', 'contact'].indexOf(currentStatus.namespace) !== -1) {
    //         header_color = 'black';
    //     }
    //     app.setHeaderColor(header_color);        
    // }

    // ScrollMagic
    // http://scrollmagic.io/


    $(".js-animation-slide").each(function (index, elem) {
        this._scrollmagic_controller = new ScrollMagic.Controller();
        var tl = new TimelineLite();


        tl
            .fromTo(
                this, 
                3, 
                { 
                    opacity: 0, 
                    xPercent: '-10', 
                    ease: Cubic.easeOut, 
                }, 
                { 
                    opacity: 1, 
                    xPercent: 0 
                }
            );
        
        new ScrollMagic.Scene({
                triggerElement: this,
                triggerHook: "onEnter",
                duration: 0,
                offset: this.innerHeight
            })
            .setTween(tl)
            .addTo(this._scrollmagic_controller);
            // .addIndicators();
    });

    $(".js-animation-opacity").each(function (index, elem) {
        this._scrollmagic_controller = new ScrollMagic.Controller();
        var tl = new TimelineLite();


        tl
            .fromTo('.js-animation-opacity', 1, { opacity: 0, ease: Cubic.easeOut }, { opacity: 1 });
        
        new ScrollMagic.Scene({
                triggerElement: this,
                triggerHook: "onCenter",
                duration: 0,
                offset: 0
            })
            .setTween(tl)
            .addTo(this._scrollmagic_controller);
            // .addIndicators();
    });

    $(".js-consultations-rates").each(function (index, elem) {
        this._scrollmagic_controller = new ScrollMagic.Controller();
        var tl = new TimelineLite({  /* paused: true */  });

        tl
            .staggerFromTo(
                ".js-consultations-rates",
                0.5,
                {
                    opacity: 0,
                    x: -50,
                },
                {
                    opacity: 1,
                    x: 0,
                    ease: Power1.easeOut,
                    // Clear all propriety to preserve z-index after animation
                    // http://greensock.com/forums/topic/12379-z-index-issue-when-animating-a-container/?p=51395
                    clearProps: 'all'
                },
                0.1
            );

        new ScrollMagic.Scene({
                triggerElement: ".js-consultations-rates",
                triggerHook: "onEnter",
                duration: 0,
                offset: 0
            })
            .setTween(tl)
            .addTo(this._scrollmagic_controller);
            // .addIndicators();
    });


});

var FadeTransition = Barba.BaseTransition.extend({
  start: function() {
    /**
     * This function is automatically called as soon the Transition starts
     * this.newContainerLoading is a Promise for the loading of the new container
     * (Barba.js also comes with an handy Promise polyfill!)
     */

    // As soon the loading is finished and the old page is faded out, let's fade the new page
    Promise
      .all([this.newContainerLoading, this.fadeOut()])
      .then(this.fadeIn.bind(this));
  },

  fadeOut: function() {
    /**
     * this.oldContainer is the HTMLElement of the old Container
     */

    return $(this.oldContainer).animate({ opacity: 0 }).promise();
  },

  fadeIn: function() {
    /**
     * this.newContainer is the HTMLElement of the new Container
     * At this stage newContainer is on the DOM (inside our #barba-container and with visibility: hidden)
     * Please note, newContainer is available just after newContainerLoading is resolved!
     */

    var _this = this;
    var $el = $(this.newContainer);

    $(this.oldContainer).hide();

    $el.css({
      visibility : 'visible',
      opacity : 0
    });

    document.body.scrollTop = 0;

    $el.animate({ opacity: 1 }, 400, function() {
      /**
       * Do not forget to call .done() as soon your transition is finished!
       * .done() will automatically remove from the DOM the old Container
       */

      _this.done();
    });
  }
});

/**
 * Next step, you have to tell Barba to use the new Transition
 */

Barba.Pjax.getTransition = function() {
  /**
   * Here you can use your own logic!
   * For example you can use different Transition based on the current page or link...
   */

  return FadeTransition;
};

(function($) {
  'use strict';

  $.fn.anchor = function() {
    $('.js-anchor').on('click', function() {

      if (app.is_mobile) {
          menu.close();
      }

      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 1000);
            return false;
        }
      }
    });
  };

})(jQuery);