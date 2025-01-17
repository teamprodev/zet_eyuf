function MenuEditor(l, t, cf) {
    var i = $("#" + l),
        r = {
            labelEdit: '<i class="fas fa-edit clickable"></i>',
            labelRemove: '<i class="fas fa-trash-alt clickable"></i>',
            textConfirmDelete: "This item will be deleted. Are you sure?",
            iconPicker: {
                cols: 4,
                rows: 4,
                footer: !1,
                iconset: "fontawesome5"
            },
            listOptions: {
                hintCss: {
                    border: "1px dashed #13981D"
                },
                opener: {
                    as: "html",
                    close: '<i class="fas fa-minus"></i>',
                    open: '<i class="fas fa-plus"></i>',
                    openerCss: {
                        "margin-right": "10px",
                        float: "none"
                    },
                    openerClass: "btn btn-success btn-sm"
                },
                placeholderCss: {
                    "background-color": "gray"
                },
                ignoreClass: "clickable",
                listsClass: "pl-0",
                listsCss: {
                    "padding-top": "10px"
                },
                complete: function (e) {
                    return MenuEditor.updateButtons(i), !0
                }
            }
        };
    $.extend(!0, r, t);
    var s = null,
        n = !0,
        a = null,
        o = null,
        e = r.iconPicker,
        c = (t = r.listOptions, $("#" + l + "_icon").iconpicker(e)),
        modelName;

    function d() {
        if (cf === true) {
            a[0].reset(), (c = c.iconpicker(e)).iconpicker("setIcon", "empty"), o.attr("disabled", !0), s = null
        }
    }

    function p(e) {
        return $("<a>").addClass(e.classCss).addClass("clickable").attr("href", "#").html(e.text)
    }

    function f() {
        var e = $("<div>").addClass("btn-group float-right"),
            s = p({
                classCss: "btn btn-primary btn-sm btnEdit",
                text: r.labelEdit
            }),
            t = p({
                classCss: "btn btn-danger btn-sm btnRemove",
                text: r.labelRemove
            }),
            l = p({
                classCss: "btn btn-secondary btn-sm btnUp btnMove",
                text: '<i class="fas fa-angle-up clickable"></i>'
            }),
            n = p({
                classCss: "btn btn-secondary btn-sm btnDown btnMove",
                text: '<i class="fas fa-angle-down clickable"></i>'
            }),
            o = p({
                classCss: "btn btn-secondary btn-sm btnOut btnMove",
                text: '<i class="fas fa-level-down-alt clickable"></i>'
            }),
            i = p({
                classCss: "btn btn-secondary btn-sm btnIn btnMove",
                text: '<i class="fas fa-level-up-alt clickable"></i>'
            });
        return e.append(l).append(n).append(i).append(o).append(s).append(t), e
    }

    function u(e) {
        $("<span>").addClass("sortableListsOpener " + t.opener.openerClass).css(t.opener.openerCss).on("mousedown touchstart", function (e) {
            var s = $(this).closest("li");
            return s.hasClass("sortableListsClosed") ? s.iconOpen(t) : s.iconClose(t), !1
        }).prependTo(e.children("div").first()), e.hasClass("sortableListsOpen") ? e.iconOpen(t) : e.iconClose(t)
    }
    i.sortableLists(r.listOptions), c.on("change", function (e) {
        a.find("[name=\""+ modelName + "[icon]" + "\"]").val(e.icon)
    }), $(document).on("click", ".btnRemove", function (e) {
        if (e.preventDefault(), confirm(r.textConfirmDelete)) {
            var s = $(this).closest("ul");
            $(this).closest("li").remove();
            var t = !1;
            void 0 !== s.attr("id") && (t = s.attr("id").toString() === l), s.children().length || t || (s.prev("div").children(".sortableListsOpener").first().remove(), s.remove()), MenuEditor.updateButtons(i)
        }
    }), $(document).on("click", ".btnEdit", function (e) {
        e.preventDefault(),
            function (e) {
                var s = e.data();
                $.each(s, function (e, s) {
                    a.find("[name=\""+ modelName + "[" + e + "]" + "\"]").val(s)
                }), a.find(".item-menu").first().focus(), s.hasOwnProperty("icon") ? c.iconpicker("setIcon", s.icon) : c.iconpicker("setIcon", "empty");
                o.removeAttr("disabled")
            }(s = $(this).closest("li"))
    }), i.on("click", ".btnUp", function (e) {
        e.preventDefault();
        var s = $(this).closest("li");
        s.prev("li").before(s), MenuEditor.updateButtons(i)
    }), i.on("click", ".btnDown", function (e) {
        e.preventDefault();
        var s = $(this).closest("li");
        s.next("li").after(s), MenuEditor.updateButtons(i)
    }), i.on("click", ".btnOut", function (e) {
        e.preventDefault();
        var s = $(this).closest("ul"),
            t = $(this).closest("li");
        t.closest("ul").closest("li").after(t), s.children().length <= 0 && (s.prev("div").children(".sortableListsOpener").first().remove(), s.remove()), MenuEditor.updateButtons(i)
    }), i.on("click", ".btnIn", function (e) {
        e.preventDefault();
        var s = $(this).closest("li"),
            t = s.prev("li");
        if (0 < t.length)
            if (0 < (l = t.children("ul")).length) l.append(s);
            else {
                var l = $("<ul>").addClass("pl-0").css("padding-top", "10px");
                t.append(l), l.append(s), t.addClass("sortableListsOpen"), u(t)
            }
        MenuEditor.updateButtons(i)
    }), this.setForm = function (e) {
        a = e
    },this.setModelName = function (name) {
        modelName = name
    }, this.getForm = function () {
        return a
    }, this.setUpdateButton = function (e) {
        (o = e).attr("disabled", !0), s = null
    }, this.getUpdateButton = function () {
        return o
    }, this.getCurrentItem = function () {
        return s
    }, this.update = function () {
        var e = this.getCurrentItem();
        if (null !== e) {
            var s = e.data("icon");
            var newIcon = $('#myEditor_icon').find('i').attr('class');
            a.find(".item-menu").each(function () {
                e.data($(this).attr("name").match(/\[(.+)\]/)[1], $(this).val())
            }), e.children().children("i").removeClass(s).addClass(e.data("icon")), e.find("span.txt").first().text(e.data("text")), d();



        }
    }, this.add = function () {
        var e = {};
        a.find(".item-menu").each(function () {
            e[$(this).attr("name").match(/\[(.+)\]/)[1]] = $(this).val()
        });
        var s = f(),
            t = $("<span>").addClass("txt").text(e.text),
            l = $("<i>").addClass(e.icon),
            n = $("<div>").css({
                overflow: "auto"
            }).append(l).append(" ").append(t).append(s),
            o = $("<li>").data(e);
        o.addClass("list-group-item pr-0").append(n), i.append(o), MenuEditor.updateButtons(i), d()
    }, this.getString = function () {
        var e = i.sortableListsToJson();
        return JSON.stringify(e)
    }, this.setData = function (e) {
        var s = Array.isArray(e) ? e : function (e) {
            try {
                var s = JSON.parse(e)
            } catch (e) {
                return console.log("The string is not a json valid."), null
            }
            return s
        }(e);
        if (null !== s) {
            i.empty();
            var t = function d(e, s) {
                var p = void 0 === s ? 0 : s,
                    u = 0 === p ? i : $("<ul>").addClass("pl-0").css("padding-top", "10px");
                return $.each(e, function (e, s) {
                    var t = void 0 !== s.children && $.isArray(s.children),
                        l = {
                            text: "",
                            href: "",
                            icon: "empty",
                            target: "_self",
                            title: ""
                        },
                        n = $.extend({}, s);
                    t && delete n.children, $.extend(l, n);
                    var o = $("<li>").addClass("list-group-item pr-0");
                    o.data(l);
                    var i = $("<div>").css("overflow", "auto"),
                        r = $("<i>").addClass(s.icon),
                        a = $("<span>").addClass("txt").append(s.text).css("margin-right", "5px"),
                        c = f();
                    i.append(r).append(" ").append(a).append(c), o.append(i), t && o.append(d(s.children, p + 1)), u.append(o)
                }), u
            }(s);
            n ? i.find("li").each(function () {
                var e = $(this);
                e.children("ul").length && u(e)
            }) : (t.sortableLists(r.listOptions), n = !0), MenuEditor.updateButtons(i)
        }
    }
}! function (L) {
    L.fn.sortableLists = function (e) {
        var s = L("body").css("position", "relative"),
            t = {
                currElClass: "",
                placeholderClass: "",
                placeholderCss: {
                    position: "relative",
                    padding: 0
                },
                hintClass: "",
                hintCss: {
                    display: "none",
                    position: "relative",
                    padding: 0
                },
                hintWrapperClass: "",
                hintWrapperCss: {},
                baseClass: "",
                baseCss: {
                    position: "absolute",
                    top: 0 - parseInt(s.css("margin-top")),
                    left: 0 - parseInt(s.css("margin-left")),
                    margin: 0,
                    padding: 0,
                    "z-index": 2500
                },
                opener: {
                    active: !1,
                    open: "",
                    close: "",
                    openerCss: {
                        float: "left",
                        display: "inline-block",
                        "background-position": "center center",
                        "background-repeat": "no-repeat"
                    },
                    openerClass: ""
                },
                listSelector: "ul",
                listsClass: "",
                listsCss: {},
                insertZone: 50,
                insertZonePlus: !1,
                scroll: 20,
                ignoreClass: "",
                isAllowed: function (e, s, t) {
                    return !0
                },
                onDragStart: function (e, s) {
                    return !0
                },
                onChange: function (e) {
                    return !0
                },
                complete: function (e) {
                    return !0
                }
            },
            d = L.extend(!0, {}, t, e),
            p = L("<" + d.listSelector + " />").prependTo(s).attr("id", "sortableListsBase").css(d.baseCss).addClass(d.listsClass + " " + d.baseClass),
            u = L("<li />").attr("id", "sortableListsPlaceholder").css(d.placeholderCss).addClass(d.placeholderClass),
            f = L("<li />").attr("id", "sortableListsHint").css(d.hintCss).addClass(d.hintClass),
            r = L("<" + d.listSelector + " />").attr("id", "sortableListsHintWrapper").addClass(d.listsClass + " " + d.hintWrapperClass).css(d.listsCss).css(d.hintWrapperCss),
            a = L("<span />").addClass("sortableListsOpener " + d.opener.openerClass).css(d.opener.openerCss).on("mousedown touchstart", function (e) {
                var s = L(this).closest("li");
                return s.hasClass("sortableListsClosed") ? C(s) : l(s), !1
            });
        "class" == d.opener.as ? a.addClass(d.opener.close) : "html" == d.opener.as ? a.html(d.opener.close) : (a.css("background-image", "url(" + d.opener.close + ")"), console.error("jQuerySortableLists opener as background image is deprecated. In version 2.0.0 it will be removed. Use html instead please."));
        var h = {
            isDragged: !1,
            isRelEFP: null,
            oEl: null,
            rootEl: null,
            cEl: null,
            upScroll: !1,
            downScroll: !1,
            pX: 0,
            pY: 0,
            cX: 0,
            cY: 0,
            isAllowed: !0,
            e: {
                pageX: 0,
                pageY: 0,
                clientX: 0,
                clientY: 0
            },
            doc: L(document),
            win: L(window)
        };
        if (d.opener.active) {
            if (!d.opener.open) throw "Opener.open value is not defined. It should be valid url, html or css class.";
            if (!d.opener.close) throw "Opener.close value is not defined. It should be valid url, html or css class.";
            L(this).find("li").each(function () {
                var e = L(this);
                e.children(d.listSelector).length && (a.clone(!0).prependTo(e.children("div").first()), e.hasClass("sortableListsOpen") ? C(e) : l(e))
            })
        }
        return this.on("mousedown touchstart", function (e) {
            var s = L(e.target);
            if (!(!1 !== h.isDragged || d.ignoreClass && s.hasClass(d.ignoreClass))) {
                e.preventDefault(), "touchstart" === e.type && m(e);
                var t = s.closest("li"),
                    l = L(this);
                t[0] && (d.onDragStart(e, t), function (e, s, t) {
                    h.isDragged = !0;
                    var l = parseInt(s.css("margin-top")),
                        n = parseInt(s.css("margin-bottom")),
                        o = parseInt(s.css("margin-left")),
                        i = parseInt(s.css("margin-right")),
                        r = s.offset(),
                        a = s.innerHeight();
                    h.rootEl = {
                        el: t,
                        offset: t.offset(),
                        rootElClass: t.attr("class")
                    }, h.cEl = {
                        el: s,
                        mT: l,
                        mL: o,
                        mB: n,
                        mR: i,
                        offset: r
                    }, h.cEl.xyOffsetDiff = {
                        X: e.pageX - h.cEl.offset.left,
                        Y: e.pageY - h.cEl.offset.top
                    }, h.cEl.el.addClass("sortableListsCurrent " + d.currElClass), s.before(u);
                    var c = h.placeholderNode = L("#sortableListsPlaceholder");
                    s.css({
                        width: s.width(),
                        position: "absolute",
                        top: r.top - l,
                        left: r.left - o
                    }).prependTo(p), c.css({
                        display: "block",
                        height: a
                    }), f.css("height", a), h.doc.on("mousemove touchmove", v).on("mouseup touchend touchcancel", b)
                }(e, t, l))
            }
        });

        function v(e) {
            if (h.isDragged) {
                var s = h.cEl,
                    t = h.doc,
                    l = h.win;
                "touchmove" === e.type && m(e), e.pageX || ((i = e).pageY = h.pY, i.pageX = h.pX, i.clientY = h.cY, i.clientX = h.cX), t.scrollTop() > h.rootEl.offset.top - 10 && e.clientY < 50 ? h.upScroll ? (e.pageY = e.pageY - d.scroll, L("html, body").each(function (e) {
                    L(this).scrollTop(L(this).scrollTop() - d.scroll)
                }), c(e)) : function (e) {
                    if (h.upScroll) return;
                    h.upScroll = setInterval(function () {
                        h.doc.trigger("mousemove")
                    }, 50)
                }() : t.scrollTop() + l.height() < h.rootEl.offset.top + h.rootEl.el.outerHeight(!1) + 10 && l.height() - e.clientY < 50 ? h.downScroll ? (e.pageY = e.pageY + d.scroll, L("html, body").each(function (e) {
                    L(this).scrollTop(L(this).scrollTop() + d.scroll)
                }), c(e)) : function (e) {
                    if (h.downScroll) return;
                    h.downScroll = setInterval(function () {
                        h.doc.trigger("mousemove")
                    }, 50)
                }() : g(h), h.oElOld = h.oEl, s.el[0].style.visibility = "hidden", h.oEl = oEl = function (e, s) {
                    if (!document.elementFromPoint) return null;
                    var t = h.isRelEFP;
                    if (null === t) {
                        var l, n;
                        0 < (l = h.doc.scrollTop()) && (t = null == (n = document.elementFromPoint(0, l + L(window).height() - 1)) || "HTML" == n.tagName.toUpperCase()), 0 < (l = h.doc.scrollLeft()) && (t = null == (n = document.elementFromPoint(l + L(window).width() - 1, 0)) || "HTML" == n.tagName.toUpperCase())
                    }
                    t && (e -= h.doc.scrollLeft(), s -= h.doc.scrollTop());
                    var o = L(document.elementFromPoint(e, s)); {
                        if (!h.rootEl.el.find(o).length) return null;
                        if (o.is("#sortableListsPlaceholder") || o.is("#sortableListsHint")) return null;
                        if (!o.is("li")) return (o = o.closest("li"))[0] ? o : null;
                        if (o.is("li")) return o
                    }
                }(e.pageX, e.pageY), s.el[0].style.visibility = "visible",
                    function (e, s) {
                        var t = s.oEl;
                        if (!t || !s.oElOld) return;
                        var l = t.outerHeight(!1),
                            n = e.pageY - t.offset().top;
                        d.insertZonePlus ? n < 14 ? function (e, s, t) {
                            L("#sortableListsHintWrapper", h.rootEl.el).length && f.unwrap();
                            if (!t && e.pageX - s.offset().left > d.insertZone) {
                                var l = s.children(),
                                    n = s.children(d.listSelector).first();
                                if (n.children().first().is("#sortableListsPlaceholder")) return f.css("display", "none");
                                n.length ? n.prepend(f) : (l.first().after(f), f.wrap(r)), h.oEl && C(s)
                            } else {
                                if (s.prev("#sortableListsPlaceholder").length) return f.css("display", "none");
                                s.before(f)
                            }
                            f.css("display", "block"), h.isAllowed = d.isAllowed(h.cEl.el, f, f.parents("li").first())
                        }(e, t, n < 7) : l - 14 < n && function (e, s, t) {
                            L("#sortableListsHintWrapper", h.rootEl.el).length && f.unwrap();
                            if (!t && e.pageX - s.offset().left > d.insertZone) {
                                var l = s.children(),
                                    n = s.children(d.listSelector).last();
                                if (n.children().last().is("#sortableListsPlaceholder")) return f.css("display", "none");
                                n.length ? l.last().append(f) : (s.append(f), f.wrap(r)), h.oEl && C(s)
                            } else {
                                if (s.next("#sortableListsPlaceholder").length) return f.css("display", "none");
                                s.after(f)
                            }
                            f.css("display", "block"), h.isAllowed = d.isAllowed(h.cEl.el, f, f.parents("li").first())
                        }(e, t, l - 7 < n) : n < 5 ? function (e, s) {
                            L("#sortableListsHintWrapper", h.rootEl.el).length && f.unwrap();
                            if (e.pageX - s.offset().left < d.insertZone) {
                                if (s.prev("#sortableListsPlaceholder").length) return f.css("display", "none");
                                s.before(f)
                            } else {
                                var t = s.children(),
                                    l = s.children(d.listSelector).first();
                                if (l.children().first().is("#sortableListsPlaceholder")) return f.css("display", "none");
                                l.length ? l.prepend(f) : (t.first().after(f), f.wrap(r)), h.oEl && C(s)
                            }
                            f.css("display", "block"), h.isAllowed = d.isAllowed(h.cEl.el, f, f.parents("li").first())
                        }(e, t) : l - 5 < n && function (e, s) {
                            L("#sortableListsHintWrapper", h.rootEl.el).length && f.unwrap();
                            if (e.pageX - s.offset().left < d.insertZone) {
                                if (s.next("#sortableListsPlaceholder").length) return f.css("display", "none");
                                s.after(f)
                            } else {
                                var t = s.children(),
                                    l = s.children(d.listSelector).last();
                                if (l.children().last().is("#sortableListsPlaceholder")) return f.css("display", "none");
                                l.length ? t.last().append(f) : (s.append(f), f.wrap(r)), h.oEl && C(s)
                            }
                            f.css("display", "block"), h.isAllowed = d.isAllowed(h.cEl.el, f, f.parents("li").first())
                        }(e, t)
                    }(e, h), n = e, (o = h.cEl).el.css({
                    top: n.pageY - o.xyOffsetDiff.Y - o.mT,
                    left: n.pageX - o.xyOffsetDiff.X - o.mL
                })
            }
            var n, o, i
        }

        function b(e) {
            var t = h.cEl,
                l = L("#sortableListsHint", h.rootEl.el),
                n = f[0].style,
                o = null,
                i = !1,
                r = L("#sortableListsHintWrapper");
            "touchend" !== e.type && "touchcancel" !== e.type || m(e), "block" == n.display && l.length && h.isAllowed ? (o = l, i = !0) : (o = h.placeholderNode, i = !1), offset = o.offset(), t.el.animate({
                left: offset.left - h.cEl.mL,
                top: offset.top - h.cEl.mT
            }, 250, function () {
                var e, s;
                s = (e = t).el[0].style, e.el.removeClass(d.currElClass + " sortableListsCurrent"), s.top = "0", s.left = "0", s.position = "relative", s.width = "auto", o.after(t.el[0]), o[0].style.display = "none", n.display = "none", l.remove(), r.removeAttr("id").removeClass(d.hintWrapperClass), r.length && r.prev("div").prepend(a.clone(!0)), i ? h.placeholderNode.slideUp(150, function () {
                    h.placeholderNode.remove(), E(), d.onChange(t.el), d.complete(t.el), h.isDragged = !1
                }) : (h.placeholderNode.remove(), E(), d.complete(t.el), h.isDragged = !1)
            }), g(h), h.doc.unbind("mousemove touchmove", v).unbind("mouseup touchend touchcancel", b)
        }

        function c(e) {
            h.pY = e.pageY, h.pX = e.pageX, h.cY = e.clientY, h.cX = e.clientX
        }

        function g(e) {
            clearInterval(e.upScroll), clearInterval(e.downScroll), e.upScroll = e.downScroll = !1
        }

        function m(e) {
            e.pageX = e.originalEvent.changedTouches[0].pageX, e.pageY = e.originalEvent.changedTouches[0].pageY, e.screenX = e.originalEvent.changedTouches[0].screenX, e.screenY = e.originalEvent.changedTouches[0].screenY
        }

        function C(e) {
            e.removeClass("sortableListsClosed").addClass("sortableListsOpen"), e.children(d.listSelector).css("display", "block");
            var s = e.children("div").children(".sortableListsOpener").first();
            "html" == d.opener.as ? s.html(d.opener.close) : "class" == d.opener.as ? s.addClass(d.opener.close).removeClass(d.opener.open) : s.css("background-image", "url(" + d.opener.close + ")")
        }

        function l(e) {
            e.removeClass("sortableListsOpen").addClass("sortableListsClosed"), e.children(d.listSelector).css("display", "none");
            var s = e.children("div").children(".sortableListsOpener").first();
            "html" == d.opener.as ? s.html(d.opener.open) : "class" == d.opener.as ? s.addClass(d.opener.open).removeClass(d.opener.close) : s.css("background-image", "url(" + d.opener.open + ")")
        }

        function E() {
            L(d.listSelector, h.rootEl.el).each(function (e) {
                L(this).children().length || (L(this).prev("div").children(".sortableListsOpener").first().remove(), L(this).remove())
            })
        }
    }, L.fn.iconOpen = function (e) {
        this.removeClass("sortableListsClosed").addClass("sortableListsOpen"), this.children("ul").css("display", "block");
        var s = this.children("div").children(".sortableListsOpener").first();
        "html" === e.opener.as ? s.html(e.opener.close) : "class" === e.opener.as && s.addClass(e.opener.close).removeClass(e.opener.open)
    }, L.fn.iconClose = function (e) {
        this.removeClass("sortableListsOpen").addClass("sortableListsClosed"), this.children("ul").css("display", "none");
        var s = this.children("div").children(".sortableListsOpener").first();
        "html" === e.opener.as ? s.html(e.opener.open) : "class" === e.opener.as && s.addClass(e.opener.open).removeClass(e.opener.close)
    }, L.fn.sortableListsToJson = function () {
        var l = [];
        return L(this).children("li").each(function () {
            var e = L(this),
                s = e.data();
            l.push(s);
            var t = e.children("ul,ol").sortableListsToJson();
            0 < t.length ? s.children = t : delete s.children
        }), l
    }, L.fn.updateButtons = function (e) {
        var s = void 0 === e ? 0 : e,
            t = ["Up", "In"],
            l = ["Down"];
        0 === s && (t.push("Out"), l.push("Out"), L(this).children("li").hideButtons(["Out"])), L(this).children("li").each(function () {
            var e = L(this).children("ul");
            0 < e.length && e.updateButtons(s + 1)
        }), L(this).children("li:first").hideButtons(t), L(this).children("li:last").hideButtons(l)
    }, L.fn.hideButtons = function (e) {
        for (var s = 0; s < e.length; s++) L(this).find(".btn-group:first").children(".btn" + e[s]).hide()
    }
}(jQuery), MenuEditor.updateButtons = function (e) {
    e.find(".btnMove").show(), e.updateButtons()
};
