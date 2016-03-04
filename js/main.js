/*! main */
jQuery(function ($) {

    /* setup main function and variables - do i need to rename these? */

    var hoopy = function() {
        "use strict";
        var a, e, n, o, t;
        var s = function() {
            a = $(document), e = $(window), n = $("html"), o = $("body"), t = n.add(o)

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
            }();

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

        //     ! function() {
        //             var e = !1,
        //                 n = 0;
        //             doc.on({
        //                 touchstart: function() {
        //                     var a = $(this);
        //                     "touch" === a.data("action") ? a.addClass("is-hovered") : (e = !0, setTimeout(function() {
        //                         e = !1
        //                     }, 300))
        //                 },
        //                 touchmove: function() {
        //                     $(this).removeClass("is-hovered")
        //                 },
        //                 touchend: function() {
        //                     $(this).removeClass("is-hovered")
        //                 },
        //                 mouseenter: function() {
        //                     e || $(this).addClass("is-hovered")
        //                 },
        //                 mouseleave: function() {
        //                     $(this).removeClass("is-hovered")
        //                 },
        //                 click: function() {
        //                     var a = $(this).addClass("is-clicked");
        //                     clearTimeout(n), n = setTimeout(function() {
        //                         a.removeClass("is-hovered is-clicked")
        //                     }, 1e3)
        //                 }}
        //             , 'a, button, [data-action="hover"], [data-action="touch"]'), a.on("touchcancel", function() {
        //                 $('a, button, [data-action="hover"], [data-action="touch"]').removeClass("is-hovered is-clicked")
        //             })
        //         }(), $('[target="_blank"]').add('[data-ga="true"]').on("click keydown", function() {
        //             var a = $(this),
        //                 e = a.attr("href"),
        //                 n = a.data("ga-category"),
        //                 o = a.data("ga-action"),
        //                 t = a.data("ga-label");
        //             ga("send", "event", n ? n : "outbound", o ? o : "click", t ? t : e, {
        //                 nonInteraction: 1
        //             })
        //         })
        //};

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
}();