<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <!-- jsPanel CSS -->
    <link href="/render/notifier/ZIziModalWidget/assets/iframe.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>

</head>
<body>
<a href="" data-izimodal-open="#modal-vimeo">Vimeo</a>
<a href="" data-izimodal-open="#modal-youtube">Youtube</a>


<div id="modal-vimeo" class="modais" data-izimodal-transitionin="fadeInUp" data-izimodal-title="Vimeo"
     data-izimodal-iframeURL="https://player.vimeo.com/video/22439234?autoplay=1"></div>
<div id="modal-youtube" class="modais" data-izimodal-autoopen data-izimodal-transitionin="fadeInDown"
     data-izimodal-title="Youtube" data-izimodal-iframeURL="https://www.youtube.com/embed/1G4isv_Fylg?autoplay=1"></div>
<script>
    $(function () {

        $(".modais").iziModal({
            history: false,
            iframe: true,
            fullscreen: true,
            headerColor: '#000000',
            group: 'group1',
            loop: true
        });

    })


    /*
            * iziModal | v1.5.0
            * http://izimodal.marcelodolce.com
            * by Marcelo Dolce.
            */
    !function (t) {
        "function" == typeof define && define.amd ? define(["jquery"], t) : "object" == typeof module && module.exports ? module.exports = function (e, i) {
            return void 0 === i && (i = "undefined" != typeof window ? require("jquery") : require("jquery")(e)), t(i), i
        } : t(jQuery)
    }(function (t) {
        function e() {
            var t, e = document.createElement("fakeelement"), i = {
                animation: "animationend",
                OAnimation: "oAnimationEnd",
                MozAnimation: "animationend",
                WebkitAnimation: "webkitAnimationEnd"
            };
            for (t in i) if (void 0 !== e.style[t]) return i[t]
        }

        function i(t) {
            return t = t || navigator.userAgent, t.indexOf("MSIE ") > -1 || t.indexOf("Trident/") > -1
        }

        function n(t) {
            var e = /%|px|em|cm|vh|vw/;
            return parseInt(String(t).split(e)[0])
        }

        var o = t(window), s = t(document), a = "iziModal",
            r = {CLOSING: "closing", CLOSED: "closed", OPENING: "opening", OPENED: "opened", DESTROYED: "destroyed"},
            l = e(), h = !!/Mobi/.test(navigator.userAgent), d = 0, c = function (t, e) {
                this.init(t, e)
            };
        return c.prototype = {
            constructor: c, init: function (e, i) {
                var n = this;
                this.$element = t(e), void 0 !== this.$element[0].id && "" !== this.$element[0].id ? this.id = this.$element[0].id : (this.id = a + Math.floor(1e7 * Math.random() + 1), this.$element.attr("id", this.id)), this.classes = void 0 !== this.$element.attr("class") ? this.$element.attr("class") : "", this.content = this.$element.html(), this.state = r.CLOSED, this.options = i, this.width = 0, this.timer = null, this.timerTimeout = null, this.progressBar = null, this.isPaused = !1, this.isFullscreen = !1, this.headerHeight = 0, this.modalHeight = 0, this.$overlay = t('<div class="' + a + '-overlay" style="background-color:' + i.overlayColor + '"></div>'), this.$navigate = t('<div class="' + a + '-navigate"><div class="' + a + '-navigate-caption">Use</div><button class="' + a + '-navigate-prev"></button><button class="' + a + '-navigate-next"></button></div>'), this.group = {
                    name: this.$element.attr("data-" + a + "-group"),
                    index: null,
                    ids: []
                }, this.$element.attr("aria-hidden", "true"), this.$element.attr("aria-labelledby", this.id), this.$element.attr("role", "dialog"), this.$element.hasClass("iziModal") || this.$element.addClass("iziModal"), void 0 === this.group.name && "" !== i.group && (this.group.name = i.group, this.$element.attr("data-" + a + "-group", i.group)), this.options.loop === !0 && this.$element.attr("data-" + a + "-loop", !0), t.each(this.options, function (t, e) {
                    var o = n.$element.attr("data-" + a + "-" + t);
                    try {
                        "undefined" != typeof o && ("" === o || "true" == o ? i[t] = !0 : "false" == o ? i[t] = !1 : "function" == typeof e ? i[t] = new Function(o) : i[t] = o)
                    } catch (s) {
                    }
                }), i.appendTo !== !1 && this.$element.appendTo(i.appendTo), i.iframe === !0 ? (this.$element.html('<div class="' + a + '-wrap"><div class="' + a + '-content"><iframe class="' + a + '-iframe"></iframe>' + this.content + "</div></div>"), null !== i.iframeHeight && this.$element.find("." + a + "-iframe").css("height", i.iframeHeight)) : this.$element.html('<div class="' + a + '-wrap"><div class="' + a + '-content">' + this.content + "</div></div>"), this.$wrap = this.$element.find("." + a + "-wrap"), null === i.zindex || isNaN(parseInt(i.zindex)) || (this.$element.css("z-index", i.zindex), this.$navigate.css("z-index", i.zindex - 1), this.$overlay.css("z-index", i.zindex - 2)), "" !== i.radius && this.$element.css("border-radius", i.radius), "" !== i.padding && this.$element.find("." + a + "-content").css("padding", i.padding), "" !== i.theme && ("light" === i.theme ? this.$element.addClass(a + "-light") : this.$element.addClass(i.theme)), i.rtl === !0 && this.$element.addClass(a + "-rtl"), i.openFullscreen === !0 && (this.isFullscreen = !0, this.$element.addClass("isFullscreen")), this.createHeader(), this.recalcWidth(), this.recalcVerticalPos()
            }, createHeader: function () {
                this.$header = t('<div class="' + a + '-header"><h2 class="' + a + '-header-title">' + this.options.title + '</h2><p class="' + a + '-header-subtitle">' + this.options.subtitle + '</p><div class="' + a + '-header-buttons"></div></div>'), this.options.closeButton === !0 && this.$header.find("." + a + "-header-buttons").append('<a href="javascript:void(0)" class="' + a + "-button " + a + '-button-close" data-' + a + "-close></a>"), this.options.fullscreen === !0 && this.$header.find("." + a + "-header-buttons").append('<a href="javascript:void(0)" class="' + a + "-button " + a + '-button-fullscreen" data-' + a + "-fullscreen></a>"), this.options.timeoutProgressbar !== !0 || isNaN(parseInt(this.options.timeout)) || this.options.timeout === !1 || 0 === this.options.timeout || this.$header.prepend('<div class="' + a + '-progressbar"><div style="background-color:' + this.options.timeoutProgressbarColor + '"></div></div>'), "" === this.options.subtitle && this.$header.addClass(a + "-noSubtitle"), "" !== this.options.title && (null !== this.options.headerColor && (this.options.borderBottom === !0 && this.$element.css("border-bottom", "3px solid " + this.options.headerColor), this.$header.css("background", this.options.headerColor)), null === this.options.icon && null === this.options.iconText || (this.$header.prepend('<i class="' + a + '-header-icon"></i>'), null !== this.options.icon && this.$header.find("." + a + "-header-icon").addClass(this.options.icon).css("color", this.options.iconColor), null !== this.options.iconText && this.$header.find("." + a + "-header-icon").html(this.options.iconText)), this.$element.css("overflow", "hidden").prepend(this.$header))
            }, setGroup: function (e) {
                var i = this, n = this.group.name || e;
                if (this.group.ids = [], void 0 !== e && e !== this.group.name && (n = e, this.group.name = n, this.$element.attr("data-" + a + "-group", n)), void 0 !== n && "" !== n) {
                    var o = 0;
                    t.each(t("." + a + "[data-" + a + "-group=" + n + "]"), function (e, n) {
                        i.group.ids.push(t(this)[0].id), i.id == t(this)[0].id && (i.group.index = o), o++
                    })
                }
            }, toggle: function () {
                this.state == r.OPENED && this.close(), this.state == r.CLOSED && this.open()
            }, open: function (e) {
                function i() {
                    o.state = r.OPENED, o.$element.trigger(r.OPENED), o.options.onOpened && "function" == typeof o.options.onOpened && o.options.onOpened(o)
                }

                function n() {
                    o.$element.off("click", "[data-" + a + "-close]").on("click", "[data-" + a + "-close]", function (e) {
                        e.preventDefault();
                        var i = t(e.currentTarget).attr("data-" + a + "-transitionOut");
                        void 0 !== i ? o.close({transition: i}) : o.close()
                    }), o.$element.off("click", "[data-" + a + "-fullscreen]").on("click", "[data-" + a + "-fullscreen]", function (t) {
                        t.preventDefault(), o.isFullscreen === !0 ? (o.isFullscreen = !1, o.$element.removeClass("isFullscreen")) : (o.isFullscreen = !0, o.$element.addClass("isFullscreen")), o.options.onFullscreen && "function" == typeof o.options.onFullscreen && o.options.onFullscreen(o), o.$element.trigger("fullscreen", o)
                    }), o.$navigate.off("click", "." + a + "-navigate-next").on("click", "." + a + "-navigate-next", function (t) {
                        o.next(t)
                    }), o.$element.off("click", "[data-" + a + "-next]").on("click", "[data-" + a + "-next]", function (t) {
                        o.next(t)
                    }), o.$navigate.off("click", "." + a + "-navigate-prev").on("click", "." + a + "-navigate-prev", function (t) {
                        o.prev(t)
                    }), o.$element.off("click", "[data-" + a + "-prev]").on("click", "[data-" + a + "-prev]", function (t) {
                        o.prev(t)
                    })
                }

                var o = this;
                if (this.state == r.CLOSED) {
                    if (n(), this.setGroup(), this.state = r.OPENING, this.$element.trigger(r.OPENING), this.$element.attr("aria-hidden", "false"), this.options.iframe === !0) {
                        this.$element.find("." + a + "-content").addClass(a + "-content-loader"), this.$element.find("." + a + "-iframe").on("load", function () {
                            t(this).parent().removeClass(a + "-content-loader")
                        });
                        var d = null;
                        try {
                            d = "" !== t(e.currentTarget).attr("href") ? t(e.currentTarget).attr("href") : null
                        } catch (c) {
                        }
                        if (null === this.options.iframeURL || null !== d && void 0 !== d || (d = this.options.iframeURL), null === d || void 0 === d) throw new Error("Failed to find iframe URL");
                        this.$element.find("." + a + "-iframe").attr("src", d)
                    }
                    (this.options.bodyOverflow || h) && (t("html").addClass(a + "-isOverflow"), h && t("body").css("overflow", "hidden")), this.options.onOpening && "function" == typeof this.options.onOpening && this.options.onOpening(this), function () {
                        if (o.group.ids.length > 1) {
                            o.$navigate.appendTo("body"), o.$navigate.addClass(o.options.transitionInOverlay), o.options.navigateCaption === !0 && o.$navigate.find("." + a + "-navigate-caption").show();
                            var n = o.$element.outerWidth();
                            o.options.navigateArrows !== !1 ? "closeScreenEdge" === o.options.navigateArrows ? (o.$navigate.find("." + a + "-navigate-prev").css("left", 0).show(), o.$navigate.find("." + a + "-navigate-next").css("right", 0).show()) : (o.$navigate.find("." + a + "-navigate-prev").css("margin-left", -(n / 2 + 84)).show(), o.$navigate.find("." + a + "-navigate-next").css("margin-right", -(n / 2 + 84)).show()) : (o.$navigate.find("." + a + "-navigate-prev").hide(), o.$navigate.find("." + a + "-navigate-next").hide());
                            var s;
                            0 === o.group.index && (s = t("." + a + "[data-" + a + '-group="' + o.group.name + '"][data-' + a + "-loop]").length, 0 === s && o.options.loop === !1 && o.$navigate.find("." + a + "-navigate-prev").hide()), o.group.index + 1 === o.group.ids.length && (s = t("." + a + "[data-" + a + '-group="' + o.group.name + '"][data-' + a + "-loop]").length, 0 === s && o.options.loop === !1 && o.$navigate.find("." + a + "-navigate-next").hide())
                        }
                        o.options.overlay === !0 ? o.$overlay.appendTo("body") : t(o.options.overlay).length > 0 && o.$overlay.appendTo(t(o.options.overlay)), o.options.transitionInOverlay && o.$overlay.addClass(o.options.transitionInOverlay);
                        var r = o.options.transitionIn;
                        "object" == typeof e && (void 0 === e.transition && void 0 === e.transitionIn || (r = e.transition || e.transitionIn)), "" !== r ? (o.$element.addClass("transitionIn " + r).show(), o.$wrap.one(l, function () {
                            o.$element.removeClass(r + " transitionIn"), o.$overlay.removeClass(o.options.transitionInOverlay), o.$navigate.removeClass(o.options.transitionInOverlay), i()
                        })) : (o.$element.show(), i()), o.options.pauseOnHover !== !0 || o.options.pauseOnHover !== !0 || o.options.timeout === !1 || isNaN(parseInt(o.options.timeout)) || o.options.timeout === !1 || 0 === o.options.timeout || (o.$element.off("mouseenter").on("mouseenter", function (t) {
                            t.preventDefault(), o.isPaused = !0
                        }), o.$element.off("mouseleave").on("mouseleave", function (t) {
                            t.preventDefault(), o.isPaused = !1
                        }))
                    }(), this.options.timeout === !1 || isNaN(parseInt(this.options.timeout)) || this.options.timeout === !1 || 0 === this.options.timeout || (this.options.timeoutProgressbar === !0 ? (this.progressBar = {
                        hideEta: null,
                        maxHideTime: null,
                        currentTime: (new Date).getTime(),
                        el: this.$element.find("." + a + "-progressbar > div"),
                        updateProgress: function () {
                            if (!o.isPaused) {
                                o.progressBar.currentTime = o.progressBar.currentTime + 10;
                                var t = (o.progressBar.hideEta - o.progressBar.currentTime) / o.progressBar.maxHideTime * 100;
                                o.progressBar.el.width(t + "%"), t < 0 && o.close()
                            }
                        }
                    }, this.options.timeout > 0 && (this.progressBar.maxHideTime = parseFloat(this.options.timeout), this.progressBar.hideEta = (new Date).getTime() + this.progressBar.maxHideTime, this.timerTimeout = setInterval(this.progressBar.updateProgress, 10))) : this.timerTimeout = setTimeout(function () {
                        o.close()
                    }, o.options.timeout)), this.options.overlayClose && !this.$element.hasClass(this.options.transitionOut) && this.$overlay.click(function () {
                        o.close()
                    }), this.options.focusInput && this.$element.find(":input:not(button):enabled:visible:first").focus(), function u() {
                        o.recalcLayout(), o.timer = setTimeout(u, 100)
                    }(), function () {
                        if (o.options.history) {
                            var t = document.title;
                            document.title = t + " - " + o.options.title, document.location.hash = o.id, document.title = t
                        }
                    }(), s.on("keydown." + a, function (t) {
                        o.options.closeOnEscape && 27 === t.keyCode && o.close()
                    })
                }
            }, close: function (e) {
                function i() {
                    n.state = r.CLOSED, n.$element.trigger(r.CLOSED), n.options.iframe === !0 && n.$element.find("." + a + "-iframe").attr("src", ""), (n.options.bodyOverflow || h) && (t("html").removeClass(a + "-isOverflow"), h && t("body").css("overflow", "auto")), n.options.onClosed && "function" == typeof n.options.onClosed && n.options.onClosed(n), n.options.restoreDefaultContent === !0 && n.$element.find("." + a + "-content").html(n.content), 0 === t("." + a + ":visible").length && t("html").removeClass(a + "-isAttached")
                }

                var n = this;
                if (this.state == r.OPENED || this.state == r.OPENING) {
                    s.off("keydown." + a), this.state = r.CLOSING, this.$element.trigger(r.CLOSING), this.$element.attr("aria-hidden", "true"), clearTimeout(this.timer), clearTimeout(this.timerTimeout), n.options.onClosing && "function" == typeof n.options.onClosing && n.options.onClosing(this);
                    var o = this.options.transitionOut;
                    "object" == typeof e && (void 0 === e.transition && void 0 === e.transitionOut || (o = e.transition || e.transitionOut)), "" !== o ? (this.$element.attr("class", [this.classes, a, o, "light" == this.options.theme ? a + "-light" : this.options.theme, this.isFullscreen === !0 ? "isFullscreen" : "", this.options.rtl ? a + "-rtl" : ""].join(" ")), this.$overlay.attr("class", a + "-overlay " + this.options.transitionOutOverlay), n.options.navigateArrows !== !1 && this.$navigate.attr("class", a + "-navigate " + this.options.transitionOutOverlay), this.$element.one(l, function () {
                        n.$element.hasClass(o) && n.$element.removeClass(o + " transitionOut").hide(), n.$overlay.removeClass(n.options.transitionOutOverlay).remove(), n.$navigate.removeClass(n.options.transitionOutOverlay).remove(), i()
                    })) : (this.$element.hide(), this.$overlay.remove(), this.$navigate.remove(), i())
                }
            }, next: function (e) {
                var i = this, n = "fadeInRight", o = "fadeOutLeft", s = t("." + a + ":visible"), r = {};
                r.out = this, void 0 !== e && "object" != typeof e ? (e.preventDefault(), s = t(e.currentTarget), n = s.attr("data-" + a + "-transitionIn"), o = s.attr("data-" + a + "-transitionOut")) : void 0 !== e && (void 0 !== e.transitionIn && (n = e.transitionIn), void 0 !== e.transitionOut && (o = e.transitionOut)), this.close({transition: o}), setTimeout(function () {
                    for (var e = t("." + a + "[data-" + a + '-group="' + i.group.name + '"][data-' + a + "-loop]").length, o = i.group.index + 1; o <= i.group.ids.length; o++) {
                        try {
                            r["in"] = t("#" + i.group.ids[o]).data().iziModal
                        } catch (s) {
                        }
                        if ("undefined" != typeof r["in"]) {
                            t("#" + i.group.ids[o]).iziModal("open", {transition: n});
                            break
                        }
                        if (o == i.group.ids.length && e > 0 || i.options.loop === !0) for (var l = 0; l <= i.group.ids.length; l++) if (r["in"] = t("#" + i.group.ids[l]).data().iziModal, "undefined" != typeof r["in"]) {
                            t("#" + i.group.ids[l]).iziModal("open", {transition: n});
                            break
                        }
                    }
                }, 200), t(document).trigger(a + "-group-change", r)
            }, prev: function (e) {
                var i = this, n = "fadeInLeft", o = "fadeOutRight", s = t("." + a + ":visible"), r = {};
                r.out = this, void 0 !== e && "object" != typeof e ? (e.preventDefault(), s = t(e.currentTarget), n = s.attr("data-" + a + "-transitionIn"), o = s.attr("data-" + a + "-transitionOut")) : void 0 !== e && (void 0 !== e.transitionIn && (n = e.transitionIn), void 0 !== e.transitionOut && (o = e.transitionOut)), this.close({transition: o}), setTimeout(function () {
                    for (var e = t("." + a + "[data-" + a + '-group="' + i.group.name + '"][data-' + a + "-loop]").length, o = i.group.index; o >= 0; o--) {
                        try {
                            r["in"] = t("#" + i.group.ids[o - 1]).data().iziModal
                        } catch (s) {
                        }
                        if ("undefined" != typeof r["in"]) {
                            t("#" + i.group.ids[o - 1]).iziModal("open", {transition: n});
                            break
                        }
                        if (0 === o && e > 0 || i.options.loop === !0) for (var l = i.group.ids.length - 1; l >= 0; l--) if (r["in"] = t("#" + i.group.ids[l]).data().iziModal, "undefined" != typeof r["in"]) {
                            t("#" + i.group.ids[l]).iziModal("open", {transition: n});
                            break
                        }
                    }
                }, 200), t(document).trigger(a + "-group-change", r)
            }, destroy: function () {
                var e = t.Event("destroy");
                this.$element.trigger(e), s.off("keydown." + a), clearTimeout(this.timer), clearTimeout(this.timerTimeout), this.options.iframe === !0 && this.$element.find("." + a + "-iframe").remove(), this.$element.html(this.$element.find("." + a + "-content").html()), this.$element.off("click", "[data-" + a + "-close]"), this.$element.off("click", "[data-" + a + "-fullscreen]"), this.$element.off("." + a).removeData(a).attr("style", ""), this.$overlay.remove(), this.$navigate.remove(), this.$element.trigger(r.DESTROYED), this.$element = null
            }, getState: function () {
                return this.state
            }, getGroup: function () {
                return this.group
            }, setWidth: function (t) {
                this.options.width = t, this.recalcWidth();
                var e = this.$element.outerWidth();
                this.options.navigateArrows !== !0 && "closeToModal" != this.options.navigateArrows || (this.$navigate.find("." + a + "-navigate-prev").css("margin-left", -(e / 2 + 84)).show(), this.$navigate.find("." + a + "-navigate-next").css("margin-right", -(e / 2 + 84)).show())
            }, setTop: function (t) {
                this.options.top = t, this.recalcVerticalPos(!1)
            }, setBottom: function (t) {
                this.options.bottom = t, this.recalcVerticalPos(!1)
            }, setHeader: function (t) {
                t ? this.$element.find("." + a + "-header").show() : (this.headerHeight = 0, this.$element.find("." + a + "-header").hide())
            }, setTitle: function (t) {
                this.options.title = t, 0 === this.headerHeight && this.createHeader(), 0 === this.$header.find("." + a + "-header-title").length && this.$header.append('<h2 class="' + a + '-header-title"></h2>'), this.$header.find("." + a + "-header-title").html(t)
            }, setSubtitle: function (t) {
                "" === t ? (this.$header.find("." + a + "-header-subtitle").remove(), this.$header.addClass(a + "-noSubtitle")) : (0 === this.$header.find("." + a + "-header-subtitle").length && this.$header.append('<p class="' + a + '-header-subtitle"></p>'), this.$header.removeClass(a + "-noSubtitle")), this.$header.find("." + a + "-header-subtitle").html(t), this.options.subtitle = t
            }, setIcon: function (t) {
                0 === this.$header.find("." + a + "-header-icon").length && this.$header.prepend('<i class="' + a + '-header-icon"></i>'), this.$header.find("." + a + "-header-icon").attr("class", a + "-header-icon " + t), this.options.icon = t
            }, setIconText: function (t) {
                this.$header.find("." + a + "-header-icon").html(t), this.options.iconText = t
            }, setHeaderColor: function (t) {
                this.options.borderBottom === !0 && this.$element.css("border-bottom", "3px solid " + t), this.$header.css("background", t), this.options.headerColor = t
            }, setZindex: function (t) {
                isNaN(parseInt(this.options.zindex)) || (this.options.zindex = t, this.$element.css("z-index", t), this.$navigate.css("z-index", t - 1), this.$overlay.css("z-index", t - 2))
            }, setFullscreen: function (t) {
                t ? (this.isFullscreen = !0, this.$element.addClass("isFullscreen")) : (this.isFullscreen = !1, this.$element.removeClass("isFullscreen"))
            }, setTransitionIn: function (t) {
                this.options.transitionIn = t
            }, setTransitionOut: function (t) {
                this.options.transitionOut = t
            }, startLoading: function () {
                this.$element.find("." + a + "-loader").length || this.$element.append('<div class="' + a + '-loader fadeIn"></div>'), this.$element.find("." + a + "-loader").css({
                    top: this.headerHeight,
                    borderRadius: this.options.radius
                })
            }, stopLoading: function () {
                var t = this.$element.find("." + a + "-loader");
                t.length || (this.$element.prepend('<div class="' + a + '-loader fadeIn"></div>'), t = this.$element.find("." + a + "-loader").css("border-radius", this.options.radius)), t.removeClass("fadeIn").addClass("fadeOut"), setTimeout(function () {
                    t.remove()
                }, 600)
            }, recalcWidth: function () {
                var t = this;
                if (this.$element.css("max-width", this.options.width), i()) {
                    var e = t.options.width;
                    e.toString().split("%").length > 1 && (e = t.$element.outerWidth()), t.$element.css({
                        left: "50%",
                        marginLeft: -(e / 2)
                    })
                }
            }, recalcVerticalPos: function (t) {
                null !== this.options.top && this.options.top !== !1 ? (this.$element.css("margin-top", this.options.top), 0 === this.options.top && this.$element.css({
                    borderTopRightRadius: 0,
                    borderTopLeftRadius: 0
                })) : t === !1 && this.$element.css({
                    marginTop: "",
                    borderRadius: this.options.radius
                }), null !== this.options.bottom && this.options.bottom !== !1 ? (this.$element.css("margin-bottom", this.options.bottom), 0 === this.options.bottom && this.$element.css({
                    borderBottomRightRadius: 0,
                    borderBottomLeftRadius: 0
                })) : t === !1 && this.$element.css({marginBottom: "", borderRadius: this.options.radius})
            }, recalcLayout: function () {
                var e = this, s = o.height(), l = this.$element.outerHeight(), h = this.$element.outerWidth(),
                    d = this.$element.find("." + a + "-content")[0].scrollHeight, c = d + this.headerHeight,
                    u = this.$element.innerHeight() - this.headerHeight,
                    p = (parseInt(-((this.$element.innerHeight() + 1) / 2)) + "px", this.$wrap.scrollTop()), m = 0;
                i() && (h >= o.width() || this.isFullscreen === !0 ? this.$element.css({
                    left: "",
                    marginLeft: ""
                }) : this.$element.css({
                    left: "50%",
                    marginLeft: -(h / 2)
                })), this.options.borderBottom === !0 && (m = 3), this.$element.find("." + a + "-header").length && this.$element.find("." + a + "-header").is(":visible") ? (this.headerHeight = parseInt(this.$element.find("." + a + "-header").innerHeight()), this.$element.css("overflow", "hidden")) : (this.headerHeight = 0, this.$element.css("overflow", "")), this.$element.find("." + a + "-loader").length && this.$element.find("." + a + "-loader").css("top", this.headerHeight), l !== this.modalHeight && (this.modalHeight = l, this.options.onResize && "function" == typeof this.options.onResize && this.options.onResize(this)), this.state != r.OPENED && this.state != r.OPENING || (this.options.iframe === !0 && (s < this.options.iframeHeight + this.headerHeight + m || this.isFullscreen === !0 ? this.$element.find("." + a + "-iframe").css("height", s - (this.headerHeight + m)) : this.$element.find("." + a + "-iframe").css("height", this.options.iframeHeight)), l == s ? this.$element.addClass("isAttached") : this.$element.removeClass("isAttached"), this.isFullscreen === !1 && this.$element.width() >= o.width() ? this.$element.find("." + a + "-button-fullscreen").hide() : this.$element.find("." + a + "-button-fullscreen").show(), this.recalcButtons(), this.isFullscreen === !1 && (s = s - (n(this.options.top) || 0) - (n(this.options.bottom) || 0)), c > s ? (this.options.top > 0 && null === this.options.bottom && d < o.height() && this.$element.addClass("isAttachedBottom"), this.options.bottom > 0 && null === this.options.top && d < o.height() && this.$element.addClass("isAttachedTop"), t("html").addClass(a + "-isAttached"), this.$element.css("height", s)) : (this.$element.css("height", d + (this.headerHeight + m)), this.$element.removeClass("isAttachedTop isAttachedBottom"), t("html").removeClass(a + "-isAttached")), function () {
                    d > u && c > s ? (e.$element.addClass("hasScroll"), e.$wrap.css("height", l - (e.headerHeight + m))) : (e.$element.removeClass("hasScroll"), e.$wrap.css("height", "auto"))
                }(), function () {
                    u + p < d - 30 ? e.$element.addClass("hasShadow") : e.$element.removeClass("hasShadow")
                }())
            }, recalcButtons: function () {
                var t = this.$header.find("." + a + "-header-buttons").innerWidth() + 10;
                this.options.rtl === !0 ? this.$header.css("padding-left", t) : this.$header.css("padding-right", t)
            }
        }, o.off("hashchange." + a + " load." + a).on("hashchange." + a + " load." + a, function (e) {
            var i = document.location.hash;
            if (0 === d) if ("" !== i) {
                t.each(t("." + a), function (e, n) {
                    var o = t(n).iziModal("getState");
                    "opened" != o && "opening" != o || "#" + t(n)[0].id !== i && t(n).iziModal("close")
                });
                try {
                    var n = t(i).data();
                    "undefined" != typeof n && ("load" === e.type ? n.iziModal.options.autoOpen !== !1 && t(i).iziModal("open") : setTimeout(function () {
                        t(i).iziModal("open")
                    }, 200))
                } catch (o) {
                }
            } else t.each(t("." + a), function (e, i) {
                if (void 0 !== t(i).data().iziModal) {
                    var n = t(i).iziModal("getState");
                    "opened" != n && "opening" != n || t(i).iziModal("close")
                }
            }); else d = 0
        }), s.off("click", "[data-" + a + "-open]").on("click", "[data-" + a + "-open]", function (e) {
            e.preventDefault();
            var i = t("." + a + ":visible"), n = t(e.currentTarget).attr("data-" + a + "-open"),
                o = t(e.currentTarget).attr("data-" + a + "-transitionIn"),
                s = t(e.currentTarget).attr("data-" + a + "-transitionOut");
            void 0 !== s ? i.iziModal("close", {transition: s}) : i.iziModal("close"), setTimeout(function () {
                void 0 !== o ? t(n).iziModal("open", {transition: o}) : t(n).iziModal("open")
            }, 200)
        }), s.off("keyup." + a).on("keyup." + a, function (e) {
            if (t("." + a + ":visible").length) {
                var i = t("." + a + ":visible")[0].id, n = t("#" + i).iziModal("getGroup"), o = e || window.event,
                    s = o.target || o.srcElement;
                void 0 === i || void 0 === n.name || o.ctrlKey || o.metaKey || o.altKey || "INPUT" === s.tagName.toUpperCase() || "TEXTAREA" == s.tagName.toUpperCase() || (37 === o.keyCode ? t("#" + i).iziModal("prev", o) : 39 === o.keyCode && t("#" + i).iziModal("next", o))
            }
        }), t.fn[a] = function (e, i) {
            if (!t(this).length && "object" == typeof e) {
                var n = {
                    $el: document.createElement("div"),
                    id: this.selector.split("#"),
                    "class": this.selector.split(".")
                };
                if (n.id.length > 1) {
                    try {
                        n.$el = document.createElement(id[0])
                    } catch (o) {
                    }
                    n.$el.id = this.selector.split("#")[1].trim()
                } else if (n["class"].length > 1) {
                    try {
                        n.$el = document.createElement(n["class"][0])
                    } catch (o) {
                    }
                    for (var s = 1; s < n["class"].length; s++) n.$el.classList.add(n["class"][s].trim())
                }
                document.body.appendChild(n.$el), this.push(t(this.selector))
            }
            for (var r = this, l = 0; l < r.length; l++) {
                var h = t(r[l]), u = h.data(a), p = t.extend({}, t.fn[a].defaults, h.data(), "object" == typeof e && e);
                if (u || e && "object" != typeof e) {
                    if ("string" == typeof e && "undefined" != typeof u) return u[e].apply(u, [].concat(i))
                } else h.data(a, u = new c(h, p));
                p.autoOpen && (isNaN(parseInt(p.autoOpen)) ? p.autoOpen === !0 && u.open() : setTimeout(function () {
                    u.open()
                }, p.autoOpen), d++)
            }
            return this
        }, t.fn[a].defaults = {
            title: "",
            subtitle: "",
            headerColor: "#88A0B9",
            theme: "",
            appendTo: ".body",
            icon: null,
            iconText: null,
            iconColor: "",
            rtl: !1,
            width: 600,
            top: null,
            bottom: null,
            borderBottom: !0,
            padding: 0,
            radius: 3,
            zindex: 999,
            iframe: !1,
            iframeHeight: 400,
            iframeURL: null,
            focusInput: !0,
            group: "",
            loop: !1,
            navigateCaption: !0,
            navigateArrows: !0,
            history: !1,
            restoreDefaultContent: !1,
            autoOpen: 0,
            bodyOverflow: !1,
            fullscreen: !1,
            openFullscreen: !1,
            closeOnEscape: !0,
            closeButton: !0,
            overlay: !0,
            overlayClose: !0,
            overlayColor: "rgba(0, 0, 0, 0.4)",
            timeout: !1,
            timeoutProgressbar: !1,
            pauseOnHover: !1,
            timeoutProgressbarColor: "rgba(255,255,255,0.5)",
            transitionIn: "comingIn",
            transitionOut: "comingOut",
            transitionInOverlay: "fadeIn",
            transitionOutOverlay: "fadeOut",
            onFullscreen: function () {
            },
            onResize: function () {
            },
            onOpening: function () {
            },
            onOpened: function () {
            },
            onClosing: function () {
            },
            onClosed: function () {
            }
        }, t.fn[a].Constructor = c, t.fn.iziModal
    });
</script>
</body>          
</html>


