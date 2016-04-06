/*! main */
jQuery(function ($) {

    /* setup main function and variables - do i need to rename these? */

    var portfolio = function() {
        "use strict";
        var a, e, n, o, t;
        var s = function() {
            a= $(document), e = $(window), n = $("html"), o = $("body"), t = n.add(o),

            /* setup masonry */

            function() {
                function a() {
                    clearTimeout(i), i = setTimeout(function() {
                        r()
                    }, 30)
                }
                var n = $("#masonry");
                if (n.length > 0) {
                    var o = {
                            itemSelector: '.post',
                            gutter: ".gutter-sizer",
                            transitionDuration: 0
                        },
                        t = !1,
                        i = 0,
                        s = function() {
                            window.matchMedia("(min-width: 640px)").matches ? (n.
                                imagesLoaded({
                                    background: true
                                }, function() {
                                    n.masonry(o).addClass('is-masonry--init')
                                }), t = !0) : n.addClass("is-masonry--init")
                        },
                        r = function(){
                            window.matchMedia("(min-width: 640px)").matches && !t ? (n.masonry(o), t = !0) : !window.matchMedia("(min-width: 640px)").matches && t && (n.masonry("destroy"), t = !1)
                        };
                    e.on("resize", function() {
                        a()
                    }), s()
                }

            }();

            // landscape or portrait view ? 

            ! function() {
                function a() {
                    Math.ceil(e.width() * t) > e.height() ? o.hasClass("window--landscape") || o.removeClass("window--portrait").addClass("window--landscape") : o.hasClass("window--portrait") || o.removeClass("window--landscape").addClass("window--portrait")
                }
                var n = 0,
                    t = 1;
                    a(), e.on("resize", function() {
                        clearTimeout(n), n = setTimeout(function() {
                            a()
                        }, 30)
                    })
            }(),


            /* menu-toggle */

            ! function() {
                var a = $("#menu");
                if (!(a.length <= 0)) {
                    var e = $("#menu-toggle");
                    e.on("click", function(a) {
                        a.preventDefault();
                        var e = $(this);
                        o.toggleClass("menu--visible"), setTimeout(function() {
                            e.removeClass("is-hovered")
                        }, 100)
                    });
                }
            }();

            /* hover animations */

            ! function() {

                //declare variables
                var e = !1,
                    n = 0;

                //recognise touch and mouse events and react to them
                a.on({
                    //this is the set of possible events and their handlers
                    touchstart: function() {
                        var a = $(this);
                        "touch" === a.data("action") ? a.addClass('is-hovered'): (e = !0, setTimeout(function() {
                            e = !1
                        }, 300))
                    },
                    touchmove: function() {
                        $(this).removeClass("is-hovered")
                    },
                    touchend: function() {
                        $(this).removeClass("is-hovered")
                    },
                    mouseenter: function() {
                        e || $(this).addClass('is-hovered')
                    },
                    mouseleave: function() {
                        $(this).removeClass('is-hovered')
                    },
                    click: function() {
                        var a = $(this).addClass('is-clicked');
                        clearTimeout(n), n = setTimeout(function() {
                            a.removeClass('is-hovered is-clicked')
                        }, 1e3)
                    }
                }, 'a, [data-action="hover"], [data-action="touch"]');
                
            }();

        }();
        return {
            init: s
        }
    }();
    $(function() {
        "use strict";
        return {
            init: portfolio
        }
    });
});