!function (e) {
    if ("object" == typeof exports && "undefined" != typeof module) module.exports = e(); else if ("function" == typeof define && define.amd) define([], e); else {
        ("undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : this).copyToClipboard = e()
    }
}(function () {
    return function a(i, c, l) {
        function s(t, e) {
            if (!c[t]) {
                if (!i[t]) {
                    var o = "function" == typeof require && require;
                    if (!e && o) return o(t, !0);
                    if (u) return u(t, !0);
                    var n = new Error("Cannot find module '" + t + "'");
                    throw n.code = "MODULE_NOT_FOUND", n
                }
                var r = c[t] = {exports: {}};
                i[t][0].call(r.exports, function (e) {
                    return s(i[t][1][e] || e)
                }, r, r.exports, a, i, c, l)
            }
            return c[t].exports
        }

        for (var u = "function" == typeof require && require, e = 0; e < l.length; e++) s(l[e]);
        return s
    }({
        1: [function (e, t, o) {
            "use strict";
            var s = e("toggle-selection"), u = {"text/plain": "Text", "text/html": "Url", default: "Text"};
            t.exports = function (o, n) {
                var r, t, e, a, i, c, l = !1;
                n || (n = {}), r = n.debug || !1;
                try {
                    if (e = s(), a = document.createRange(), i = document.getSelection(), (c = document.createElement("span")).textContent = o, c.style.all = "unset", c.style.position = "fixed", c.style.top = 0, c.style.clip = "rect(0, 0, 0, 0)", c.style.whiteSpace = "pre", c.style.webkitUserSelect = "text", c.style.MozUserSelect = "text", c.style.msUserSelect = "text", c.style.userSelect = "text", c.addEventListener("copy", function (e) {
                        if (e.stopPropagation(), n.format) if (e.preventDefault(), void 0 === e.clipboardData) {
                            r && console.warn("unable to use e.clipboardData"), r && console.warn("trying IE specific stuff"), window.clipboardData.clearData();
                            var t = u[n.format] || u.default;
                            window.clipboardData.setData(t, o)
                        } else e.clipboardData.clearData(), e.clipboardData.setData(n.format, o);
                        n.onCopy && (e.preventDefault(), n.onCopy(e.clipboardData))
                    }), document.body.appendChild(c), a.selectNodeContents(c), i.addRange(a), !document.execCommand("copy")) throw new Error("copy command was unsuccessful");
                    l = !0
                } catch (e) {
                    r && console.error("unable to copy using execCommand: ", e), r && console.warn("trying IE specific stuff");
                    try {
                        window.clipboardData.setData(n.format || "text", o), n.onCopy && n.onCopy(window.clipboardData), l = !0
                    } catch (e) {
                        r && console.error("unable to copy using clipboardData: ", e), r && console.error("falling back to prompt"), t = function (e) {
                            var t = (/mac os x/i.test(navigator.userAgent) ? "⌘" : "Ctrl") + "+C";
                            return e.replace(/#{\s*key\s*}/g, t)
                        }
                    }
                } finally {
                    i && ("function" == typeof i.removeRange ? i.removeRange(a) : i.removeAllRanges()), c && document.body.removeChild(c), e()
                }
                return l
            }
        }, {"toggle-selection": 2}], 2: [function (e, t, o) {
            t.exports = function () {
                var t = document.getSelection();
                if (!t.rangeCount) return function () {
                };
                for (var e = document.activeElement, o = [], n = 0; n < t.rangeCount; n++) o.push(t.getRangeAt(n));
                switch (e.tagName.toUpperCase()) {
                    case"INPUT":
                    case"TEXTAREA":
                        e.blur();
                        break;
                    default:
                        e = null
                }
                return t.removeAllRanges(), function () {
                    "Caret" === t.type && t.removeAllRanges(), t.rangeCount || o.forEach(function (e) {
                        t.addRange(e)
                    }), e && e.focus()
                }
            }
        }, {}]
    }, {}, [1])(1)
});
