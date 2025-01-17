/**
 * jQuery asBreadcrumbs v0.2.3
 * https://github.com/amazingSurge/jquery-asBreadcrumbs
 *
 * Copyright (c) amazingSurge
 * Released under the LGPL-3.0 license
 */
!function (s, e) {
    if ("function" == typeof define && define.amd) define(["jquery"], e); else if ("undefined" != typeof exports) e(require("jquery")); else {
        var t = {exports: {}};
        e(s.jQuery), s.jqueryAsBreadcrumbsEs = t.exports
    }
}(this, function (s) {
    "use strict";

    function e(s, e) {
        if (!(s instanceof e)) throw new TypeError("Cannot call a class as a function")
    }

    var t = function (s) {
        return s && s.__esModule ? s : {default: s}
    }(s), i = function () {
        function s(s, e) {
            for (var t = 0; t < e.length; t++) {
                var i = e[t];
                i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(s, i.key, i)
            }
        }

        return function (e, t, i) {
            return t && s(e.prototype, t), i && s(e, i), e
        }
    }(), n = {
        namespace: "breadcrumb",
        overflow: "left",
        responsive: !0,
        ellipsisText: "&#8230;",
        ellipsisClass: null,
        hiddenClass: "is-hidden",
        dropdownClass: null,
        dropdownMenuClass: null,
        dropdownItemClass: null,
        dropdownItemDisableClass: "disabled",
        toggleClass: null,
        toggleIconClass: "caret",
        getItems: function (s) {
            return s.children()
        },
        getItemLink: function (s) {
            return s.find("a")
        },
        ellipsis: function (s, e) {
            return '<li class="' + s.ellipsisClass + '">' + e + "</li>"
        },
        dropdown: function (s) {
            var e = "dropdown-menu";
            return "right" === this.options.overflow && (e += " dropdown-menu-right"), '<li class="dropdown ' + s.dropdownClass + '">\n      <a href="javascript:void(0);" class="' + s.toggleClass + '" data-toggle="dropdown">\n        <i class="' + s.toggleIconClass + '"></i>\n      </a>\n      <ul class="' + e + " " + s.dropdownMenuClass + '"></ul>\n    </li>'
        },
        dropdownItem: function (s, e, t) {
            return t ? '<li class="' + s.dropdownItemClass + '"><a href="' + t + '">' + e + "</a></li>" : '<li class="' + s.dropdownItemClass + " " + s.dropdownItemDisableClass + '"><a href="#">' + e + "</a></li>"
        },
        onInit: null,
        onReady: null
    }, o = 0, l = function () {
        function s(i, l) {
            e(this, s), this.element = i, this.$element = (0, t.default)(i), this.options = t.default.extend({}, n, l, this.$element.data()), this.namespace = this.options.namespace, this.$element.addClass(this.namespace), this.classes = {
                toggleClass: this.options.toggleClass ? this.options.toggleClass : this.namespace + "-toggle",
                toggleIconClass: this.options.toggleIconClass,
                dropdownClass: this.options.dropdownClass ? this.options.dropdownClass : this.namespace + "-dropdown",
                dropdownMenuClass: this.options.dropdownMenuClass ? this.options.dropdownMenuClass : this.namespace + "-dropdown-menu",
                dropdownItemClass: this.options.dropdownItemClass ? this.options.dropdownItemClass : "",
                dropdownItemDisableClass: this.options.dropdownItemDisableClass ? this.options.dropdownItemDisableClass : "",
                ellipsisClass: this.options.ellipsisClass ? this.options.ellipsisClass : this.namespace + "-ellipsis",
                hiddenClass: this.options.hiddenClass
            }, this.initialized = !1, this.instanceId = ++o, this.$children = this.options.getItems(this.$element), this.$firstChild = this.$children.eq(0), this.$dropdown = null, this.$dropdownMenu = null, this.gap = 6, this.items = [], this._trigger("init"), this.init()
        }

        return i(s, [{
            key: "init", value: function () {
                var s = this;
                this.$element.addClass(this.namespace + "-" + this.options.overflow), this._prepareItems(), this._createDropdown(), this._createEllipsis(), this.render(), this.options.responsive && (0, t.default)(window).on(this.eventNameWithId("resize"), this._throttle(function () {
                    s.resize()
                }, 250)), this.initialized = !0, this._trigger("ready")
            }
        }, {
            key: "_prepareItems", value: function () {
                var s = this;
                this.$children.each(function () {
                    var e = (0, t.default)(this), i = s.options.getItemLink(e),
                        n = (0, t.default)(s.options.dropdownItem.call(s, s.classes, e.text(), i.attr("href")));
                    s.items.push({$this: e, outerWidth: e.outerWidth(), $item: n})
                }), "left" === this.options.overflow && this.items.reverse()
            }
        }, {
            key: "_createDropdown", value: function () {
                this.$dropdown = (0, t.default)(this.options.dropdown.call(this, this.classes)).addClass(this.classes.hiddenClass).appendTo(this.$element), this.$dropdownMenu = this.$dropdown.find("." + this.classes.dropdownMenuClass), this._createDropdownItems(), "right" === this.options.overflow ? this.$dropdown.appendTo(this.$element) : this.$dropdown.prependTo(this.$element)
            }
        }, {
            key: "_createDropdownItems", value: function () {
                for (var s = 0; s < this.items.length; s++) this.items[s].$item.appendTo(this.$dropdownMenu).addClass(this.classes.hiddenClass)
            }
        }, {
            key: "_createEllipsis", value: function () {
                this.options.ellipsisText && (this.$ellipsis = (0, t.default)(this.options.ellipsis.call(this, this.classes, this.options.ellipsisText)).addClass(this.classes.hiddenClass), "right" === this.options.overflow ? this.$ellipsis.insertBefore(this.$dropdown) : this.$ellipsis.insertAfter(this.$dropdown))
            }
        }, {
            key: "render", value: function () {
                for (var s = this.getDropdownWidth(), e = 0, t = this.getConatinerWidth(), i = !1, n = 0; n < this.items.length; n++) (e += this.items[n].outerWidth) + s > t ? (i = !0, this._showDropdownItem(n)) : this._hideDropdownItem(n);
                i ? (this.$ellipsis.removeClass(this.classes.hiddenClass), this.$dropdown.removeClass(this.classes.hiddenClass)) : (this.$ellipsis.addClass(this.classes.hiddenClass), this.$dropdown.addClass(this.classes.hiddenClass)), this._trigger("update")
            }
        }, {
            key: "resize", value: function () {
                this.render()
            }
        }, {
            key: "getDropdownWidth", value: function () {
                return this.$dropdown.outerWidth() + (this.options.ellipsisText ? this.$ellipsis.outerWidth() : 0)
            }
        }, {
            key: "getConatinerWidth", value: function () {
                var s = 0, e = this;
                return this.$element.children().each(function () {
                    "inline-block" === (0, t.default)(this).css("display") && "none" === (0, t.default)(this).css("float") && (s += e.gap)
                }), this.$element.width() - s
            }
        }, {
            key: "_showDropdownItem", value: function (s) {
                this.items[s].$item.removeClass(this.classes.hiddenClass), this.items[s].$this.addClass(this.classes.hiddenClass)
            }
        }, {
            key: "_hideDropdownItem", value: function (s) {
                this.items[s].$this.removeClass(this.classes.hiddenClass), this.items[s].$item.addClass(this.classes.hiddenClass)
            }
        }, {
            key: "_trigger", value: function (s) {
                for (var e = arguments.length, t = Array(e > 1 ? e - 1 : 0), i = 1; i < e; i++) t[i - 1] = arguments[i];
                var n = [this].concat(t);
                this.$element.trigger("asBreadcrumbs::" + s, n);
                var o = "on" + (s = s.replace(/\b\w+\b/g, function (s) {
                    return s.substring(0, 1).toUpperCase() + s.substring(1)
                }));
                "function" == typeof this.options[o] && this.options[o].apply(this, t)
            }
        }, {
            key: "eventName", value: function (s) {
                if ("string" != typeof s || "" === s) return "." + this.options.namespace;
                for (var e = (s = s.split(" ")).length, t = 0; t < e; t++) s[t] = s[t] + "." + this.options.namespace;
                return s.join(" ")
            }
        }, {
            key: "eventNameWithId", value: function (s) {
                if ("string" != typeof s || "" === s) return "." + this.options.namespace + "-" + this.instanceId;
                for (var e = (s = s.split(" ")).length, t = 0; t < e; t++) s[t] = s[t] + "." + this.options.namespace + "-" + this.instanceId;
                return s.join(" ")
            }
        }, {
            key: "_throttle", value: function (s, e) {
                var t = this, i = Date.now || function () {
                    return (new Date).getTime()
                }, n = void 0, o = void 0, l = void 0, a = void 0, r = 0, d = function () {
                    r = i(), n = null, a = s.apply(o, l), n || (o = l = null)
                };
                return function () {
                    for (var h = arguments.length, p = Array(h), u = 0; u < h; u++) p[u] = arguments[u];
                    var c = i(), f = e - (c - r);
                    return o = t, l = p, f <= 0 || f > e ? (n && (clearTimeout(n), n = null), r = c, a = s.apply(o, l), n || (o = l = null)) : n || (n = setTimeout(d, f)), a
                }
            }
        }, {
            key: "destroy", value: function () {
                this.$element.children().removeClass(this.classes.hiddenClass), this.$dropdown.remove(), this.options.ellipsisText && this.$ellipsis.remove(), this.initialized = !1, this.$element.data("asBreadcrumbs", null), (0, t.default)(window).off(this.eventNameWithId("resize")), this._trigger("destroy")
            }
        }], [{
            key: "setDefaults", value: function (s) {
                t.default.extend(n, t.default.isPlainObject(s) && s)
            }
        }]), s
    }(), a = {version: "0.2.3"}, r = "asBreadcrumbs", d = t.default.fn.asBreadcrumbs, h = function (s) {
        for (var e = arguments.length, i = Array(e > 1 ? e - 1 : 0), n = 1; n < e; n++) i[n - 1] = arguments[n];
        if ("string" == typeof s) {
            var o = s;
            if (/^_/.test(o)) return !1;
            if (!/^(get)/.test(o)) return this.each(function () {
                var s = t.default.data(this, r);
                s && "function" == typeof s[o] && s[o].apply(s, i)
            });
            var a = this.first().data(r);
            if (a && "function" == typeof a[o]) return a[o].apply(a, i)
        }
        return this.each(function () {
            (0, t.default)(this).data(r) || (0, t.default)(this).data(r, new l(this, s))
        })
    };
    t.default.fn.asBreadcrumbs = h, t.default.asBreadcrumbs = t.default.extend({
        setDefaults: l.setDefaults,
        noConflict: function () {
            return t.default.fn.asBreadcrumbs = d, h
        }
    }, a)
});
