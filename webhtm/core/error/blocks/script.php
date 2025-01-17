<!-- vanta js scripts -->
<script src="https://cdn.jsdelivr.net/npm/vanta@0.5.10/vendor/three.r95.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@0.5.10/dist/vanta.clouds2.min.js"></script>

<!--<script>
    VANTA.CLOUDS2({
        el: "#vantaClouds2",
        texturePath: '/render/animo/All/assets/JS/All Vanta animos/noise.png',
        backgroundColor: '#000000',
        skyColor: '#5ca6ca',
        cloudColor: '#334d80',
        lightColor: '#ffffff',
        speed: 1
    })
</script>-->

<script>
    var hljs = new function () {
        function l(o) {
            return o.replace(/&/gm, "&amp;").replace(/</gm, "&lt;").replace(/>/gm, "&gt;")
        }

        function b(p) {
            for (var o = p.firstChild; o; o = o.nextSibling) {
                if (o.nodeName == "CODE") {
                    return o
                }
                if (!(o.nodeType == 3 && o.nodeValue.match(/\s+/))) {
                    break
                }
            }
        }

        function h(p, o) {
            return Array.prototype.map.call(p.childNodes, function (q) {
                if (q.nodeType == 3) {
                    return o ? q.nodeValue.replace(/\n/g, "") : q.nodeValue
                }
                if (q.nodeName == "BR") {
                    return "\n"
                }
                return h(q, o)
            }).join("")
        }

        function a(q) {
            var p = (q.className + " " + q.parentNode.className).split(/\s+/);
            p = p.map(function (r) {
                return r.replace(/^language-/, "")
            });
            for (var o = 0; o < p.length; o++) {
                if (e[p[o]] || p[o] == "no-highlight") {
                    return p[o]
                }
            }
        }

        function c(q) {
            var o = [];
            (function p(r, s) {
                for (var t = r.firstChild; t; t = t.nextSibling) {
                    if (t.nodeType == 3) {
                        s += t.nodeValue.length
                    } else {
                        if (t.nodeName == "BR") {
                            s += 1
                        } else {
                            if (t.nodeType == 1) {
                                o.push({
                                    event: "start",
                                    offset: s,
                                    node: t
                                });
                                s = p(t, s);
                                o.push({
                                    event: "stop",
                                    offset: s,
                                    node: t
                                })
                            }
                        }
                    }
                }
                return s
            })(q, 0);
            return o
        }

        function j(x, v, w) {
            var p = 0;
            var y = "";
            var r = [];

            function t() {
                if (x.length && v.length) {
                    if (x[0].offset != v[0].offset) {
                        return (x[0].offset < v[0].offset) ? x : v
                    } else {
                        return v[0].event == "start" ? x : v
                    }
                } else {
                    return x.length ? x : v
                }
            }

            function s(A) {
                function z(B) {
                    return " " + B.nodeName + '="' + l(B.value) + '"'
                }

                return "<" + A.nodeName + Array.prototype.map.call(A.attributes, z).join("") + ">"
            }

            while (x.length || v.length) {
                var u = t().splice(0, 1)[0];
                y += l(w.substr(p, u.offset - p));
                p = u.offset;
                if (u.event == "start") {
                    y += s(u.node);
                    r.push(u.node)
                } else {
                    if (u.event == "stop") {
                        var o, q = r.length;
                        do {
                            q--;
                            o = r[q];
                            y += ("</" + o.nodeName.toLowerCase() + ">")
                        } while (o != u.node);
                        r.splice(q, 1);
                        while (q < r.length) {
                            y += s(r[q]);
                            q++
                        }
                    }
                }
            }
            return y + l(w.substr(p))
        }

        function f(q) {
            function o(s, r) {
                return RegExp(s, "m" + (q.cI ? "i" : "") + (r ? "g" : ""))
            }

            function p(y, w) {
                if (y.compiled) {
                    return
                }
                y.compiled = true;
                var s = [];
                if (y.k) {
                    var r = {};

                    function z(A, t) {
                        t.split(" ").forEach(function (B) {
                            var C = B.split("|");
                            r[C[0]] = [A, C[1] ? Number(C[1]) : 1];
                            s.push(C[0])
                        })
                    }

                    y.lR = o(y.l || hljs.IR, true);
                    if (typeof y.k == "string") {
                        z("keyword", y.k)
                    } else {
                        for (var x in y.k) {
                            if (!y.k.hasOwnProperty(x)) {
                                continue
                            }
                            z(x, y.k[x])
                        }
                    }
                    y.k = r
                }
                if (w) {
                    if (y.bWK) {
                        y.b = "\\b(" + s.join("|") + ")\\s"
                    }
                    y.bR = o(y.b ? y.b : "\\B|\\b");
                    if (!y.e && !y.eW) {
                        y.e = "\\B|\\b"
                    }
                    if (y.e) {
                        y.eR = o(y.e)
                    }
                    y.tE = y.e || "";
                    if (y.eW && w.tE) {
                        y.tE += (y.e ? "|" : "") + w.tE
                    }
                }
                if (y.i) {
                    y.iR = o(y.i)
                }
                if (y.r === undefined) {
                    y.r = 1
                }
                if (!y.c) {
                    y.c = []
                }
                for (var v = 0; v < y.c.length; v++) {
                    if (y.c[v] == "self") {
                        y.c[v] = y
                    }
                    p(y.c[v], y)
                }
                if (y.starts) {
                    p(y.starts, w)
                }
                var u = [];
                for (var v = 0; v < y.c.length; v++) {
                    u.push(y.c[v].b)
                }
                if (y.tE) {
                    u.push(y.tE)
                }
                if (y.i) {
                    u.push(y.i)
                }
                y.t = u.length ? o(u.join("|"), true) : {
                    exec: function (t) {
                        return null
                    }
                }
            }

            p(q)
        }

        function d(D, E) {
            function o(r, M) {
                for (var L = 0; L < M.c.length; L++) {
                    var K = M.c[L].bR.exec(r);
                    if (K && K.index == 0) {
                        return M.c[L]
                    }
                }
            }

            function s(K, r) {
                if (K.e && K.eR.test(r)) {
                    return K
                }
                if (K.eW) {
                    return s(K.parent, r)
                }
            }

            function t(r, K) {
                return K.i && K.iR.test(r)
            }

            function y(L, r) {
                var K = F.cI ? r[0].toLowerCase() : r[0];
                return L.k.hasOwnProperty(K) && L.k[K]
            }

            function G() {
                var K = l(w);
                if (!A.k) {
                    return K
                }
                var r = "";
                var N = 0;
                A.lR.lastIndex = 0;
                var L = A.lR.exec(K);
                while (L) {
                    r += K.substr(N, L.index - N);
                    var M = y(A, L);
                    if (M) {
                        v += M[1];
                        r += '<span class="' + M[0] + '">' + L[0] + "</span>"
                    } else {
                        r += L[0]
                    }
                    N = A.lR.lastIndex;
                    L = A.lR.exec(K)
                }
                return r + K.substr(N)
            }

            function z() {
                if (A.sL && !e[A.sL]) {
                    return l(w)
                }
                var r = A.sL ? d(A.sL, w) : g(w);
                if (A.r > 0) {
                    v += r.keyword_count;
                    B += r.r
                }
                return '<span class="' + r.language + '">' + r.value + "</span>"
            }

            function J() {
                return A.sL !== undefined ? z() : G()
            }

            function I(L, r) {
                var K = L.cN ? '<span class="' + L.cN + '">' : "";
                if (L.rB) {
                    x += K;
                    w = ""
                } else {
                    if (L.eB) {
                        x += l(r) + K;
                        w = ""
                    } else {
                        x += K;
                        w = r
                    }
                }
                A = Object.create(L, {
                    parent: {
                        value: A
                    }
                });
                B += L.r
            }

            function C(K, r) {
                w += K;
                if (r === undefined) {
                    x += J();
                    return 0
                }
                var L = o(r, A);
                if (L) {
                    x += J();
                    I(L, r);
                    return L.rB ? 0 : r.length
                }
                var M = s(A, r);
                if (M) {
                    if (!(M.rE || M.eE)) {
                        w += r
                    }
                    x += J();
                    do {
                        if (A.cN) {
                            x += "</span>"
                        }
                        A = A.parent
                    } while (A != M.parent);
                    if (M.eE) {
                        x += l(r)
                    }
                    w = "";
                    if (M.starts) {
                        I(M.starts, "")
                    }
                    return M.rE ? 0 : r.length
                }
                if (t(r, A)) {
                    throw "Illegal"
                }
                w += r;
                return r.length || 1
            }

            var F = e[D];
            f(F);
            var A = F;
            var w = "";
            var B = 0;
            var v = 0;
            var x = "";
            try {
                var u, q, p = 0;
                while (true) {
                    A.t.lastIndex = p;
                    u = A.t.exec(E);
                    if (!u) {
                        break
                    }
                    q = C(E.substr(p, u.index - p), u[0]);
                    p = u.index + q
                }
                C(E.substr(p));
                return {
                    r: B,
                    keyword_count: v,
                    value: x,
                    language: D
                }
            } catch (H) {
                if (H == "Illegal") {
                    return {
                        r: 0,
                        keyword_count: 0,
                        value: l(E)
                    }
                } else {
                    throw H
                }
            }
        }

        function g(s) {
            var o = {
                keyword_count: 0,
                r: 0,
                value: l(s)
            };
            var q = o;
            for (var p in e) {
                if (!e.hasOwnProperty(p)) {
                    continue
                }
                var r = d(p, s);
                r.language = p;
                if (r.keyword_count + r.r > q.keyword_count + q.r) {
                    q = r
                }
                if (r.keyword_count + r.r > o.keyword_count + o.r) {
                    q = o;
                    o = r
                }
            }
            if (q.language) {
                o.second_best = q
            }
            return o
        }

        function i(q, p, o) {
            if (p) {
                q = q.replace(/^((<[^>]+>|\t)+)/gm, function (r, v, u, t) {
                    return v.replace(/\t/g, p)
                })
            }
            if (o) {
                q = q.replace(/\n/g, "<br>")
            }
            return q
        }

        function m(r, u, p) {
            var v = h(r, p);
            var t = a(r);
            if (t == "no-highlight") {
                return
            }
            var w = t ? d(t, v) : g(v);
            t = w.language;
            var o = c(r);
            if (o.length) {
                var q = document.createElement("pre");
                q.innerHTML = w.value;
                w.value = j(o, c(q), v)
            }
            w.value = i(w.value, u, p);
            var s = r.className;
            if (!s.match("(\\s|^)(language-)?" + t + "(\\s|$)")) {
                s = s ? (s + " " + t) : t
            }
            r.innerHTML = w.value;
            r.className = s;
            r.result = {
                language: t,
                kw: w.keyword_count,
                re: w.r
            };
            if (w.second_best) {
                r.second_best = {
                    language: w.second_best.language,
                    kw: w.second_best.keyword_count,
                    re: w.second_best.r
                }
            }
        }

        function n() {
            if (n.called) {
                return
            }
            n.called = true;
            Array.prototype.map.call(document.getElementsByTagName("pre"), b).filter(Boolean).forEach(function (o) {
                m(o, hljs.tabReplace)
            })
        }

        function k() {
            window.addEventListener("DOMContentLoaded", n, false);
            window.addEventListener("load", n, false)
        }

        var e = {};
        this.LANGUAGES = e;
        this.highlight = d;
        this.highlightAuto = g;
        this.fixMarkup = i;
        this.highlightBlock = m;
        this.initHighlighting = n;
        this.initHighlightingOnLoad = k;
        this.IR = "[a-zA-Z][a-zA-Z0-9_]*";
        this.UIR = "[a-zA-Z_][a-zA-Z0-9_]*";
        this.NR = "\\b\\d+(\\.\\d+)?";
        this.CNR = "(\\b0[xX][a-fA-F0-9]+|(\\b\\d+(\\.\\d*)?|\\.\\d+)([eE][-+]?\\d+)?)";
        this.BNR = "\\b(0b[01]+)";
        this.RSR = "!|!=|!==|%|%=|&|&&|&=|\\*|\\*=|\\+|\\+=|,|\\.|-|-=|/|/=|:|;|<|<<|<<=|<=|=|==|===|>|>=|>>|>>=|>>>|>>>=|\\?|\\[|\\{|\\(|\\^|\\^=|\\||\\|=|\\|\\||~";
        this.BE = {
            b: "\\\\[\\s\\S]",
            r: 0
        };
        this.ASM = {
            cN: "string",
            b: "'",
            e: "'",
            i: "\\n",
            c: [this.BE],
            r: 0
        };
        this.QSM = {
            cN: "string",
            b: '"',
            e: '"',
            i: "\\n",
            c: [this.BE],
            r: 0
        };
        this.CLCM = {
            cN: "comment",
            b: "//",
            e: "$"
        };
        this.CBLCLM = {
            cN: "comment",
            b: "/\\*",
            e: "\\*/"
        };
        this.HCM = {
            cN: "comment",
            b: "#",
            e: "$"
        };
        this.NM = {
            cN: "number",
            b: this.NR,
            r: 0
        };
        this.CNM = {
            cN: "number",
            b: this.CNR,
            r: 0
        };
        this.BNM = {
            cN: "number",
            b: this.BNR,
            r: 0
        };
        this.inherit = function (q, r) {
            var o = {};
            for (var p in q) {
                o[p] = q[p]
            }
            if (r) {
                for (var p in r) {
                    o[p] = r[p]
                }
            }
            return o
        }
    }();
    hljs.LANGUAGES.php = function (a) {
        var e = {
            cN: "variable",
            b: "\\$+[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*"
        };
        var b = [a.inherit(a.ASM, {
            i: null
        }), a.inherit(a.QSM, {
            i: null
        }), {
            cN: "string",
            b: 'b"',
            e: '"',
            c: [a.BE]
        }, {
            cN: "string",
            b: "b'",
            e: "'",
            c: [a.BE]
        }];
        var c = [a.BNM, a.CNM];
        var d = {
            cN: "title",
            b: a.UIR
        };
        return {
            cI: true,
            k: "and include_once list abstract global private echo interface as static endswitch array null if endwhile or const for endforeach self var while isset public protected exit foreach throw elseif include __FILE__ empty require do xor return implements parent clone use __CLASS__ __LINE__ else break print eval new catch __METHOD__ case exception php_user_filter default die require __FUNCTION__ enddeclare final try this switch continue endfor endif declare unset true false namespace trait goto instanceof insteadof __DIR__ __NAMESPACE__ __halt_compiler",
            c: [a.CLCM, a.HCM, {
                cN: "comment",
                b: "/\\*",
                e: "\\*/",
                c: [{
                    cN: "phpdoc",
                    b: "\\s@[A-Za-z]+"
                }]
            }, {
                cN: "comment",
                eB: true,
                b: "__halt_compiler.+?;",
                eW: true
            }, {
                cN: "string",
                b: "<<<['\"]?\\w+['\"]?$",
                e: "^\\w+;",
                c: [a.BE]
            }, {
                cN: "preprocessor",
                b: "<\\?php",
                r: 10
            }, {
                cN: "preprocessor",
                b: "\\?>"
            }, e, {
                cN: "function",
                bWK: true,
                e: "{",
                k: "function",
                i: "\\$|\\[|%",
                c: [d, {
                    cN: "params",
                    b: "\\(",
                    e: "\\)",
                    c: ["self", e, a.CBLCLM].concat(b).concat(c)
                }]
            }, {
                cN: "class",
                bWK: true,
                e: "{",
                k: "class",
                i: "[:\\(\\$]",
                c: [{
                    bWK: true,
                    eW: true,
                    k: "extends",
                    c: [d]
                }, d]
            }, {
                b: "=>"
            }].concat(b).concat(c)
        }
    }(hljs);
</script>

