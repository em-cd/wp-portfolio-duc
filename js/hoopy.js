/*! main */
jQuery(function ($) {

    /* setup main function and variables - do i need to rename these? */

    var hoopy = function() {
        "use strict";
        var a, e, n, o, t;
        var s = function() {
            e = $(window), n = $("html"), o = $("body"), t = n.add(o),

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
                console.log('hello world masonry');
        
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



        }();
        return {
            init: s
        }
    }();
    $(function() {
        "use strict";
        return {
            init: hoopy
        }
    });
});