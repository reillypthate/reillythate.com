/**
 * This script contains the code from wzrd.io that I use to power my contact form.
 * I've copied the following code so my Contact page will load immediately instead of having to wait on the wzrd.io server.
 */
// https://wzrd.in/standalone/formdata-polyfill
! function(t) {
    if ("object" == typeof exports && "undefined" != typeof module) module.exports = t();
    else if ("function" == typeof define && define.amd) define([], t);
    else {
        ("undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : this).formdataPolyfill = t()
    }
}(function() {
    return function() {
        return function t(e, n, o) {
            function r(a, u) {
                if (!n[a]) {
                    if (!e[a]) {
                        var f = "function" == typeof require && require;
                        if (!u && f) return f(a, !0);
                        if (i) return i(a, !0);
                        var l = new Error("Cannot find module '" + a + "'");
                        throw l.code = "MODULE_NOT_FOUND", l
                    }
                    var s = n[a] = {
                        exports: {}
                    };
                    e[a][0].call(s.exports, function(t) {
                        return r(e[a][1][t] || t)
                    }, s, s.exports, t, e, n, o)
                }
                return n[a].exports
            }
            for (var i = "function" == typeof require && require, a = 0; a < o.length; a++) r(o[a]);
            return r
        }
    }()({
        1: [function(t, e, n) {
            (function(t) {
                ! function() {
                    var e;

                    function n(t) {
                        var e = 0;
                        return function() {
                            return e < t.length ? {
                                done: !1,
                                value: t[e++]
                            } : {
                                done: !0
                            }
                        }
                    }
                    var o = "function" == typeof Object.defineProperties ? Object.defineProperty : function(t, e, n) {
                            t != Array.prototype && t != Object.prototype && (t[e] = n.value)
                        },
                        r = "undefined" != typeof window && window === this ? this : void 0 !== t && null != t ? t : this;

                    function i() {
                        i = function() {}, r.Symbol || (r.Symbol = f)
                    }
                    var a, u, f = (a = 0, function(t) {
                        return "jscomp_symbol_" + (t || "") + a++
                    });

                    function l() {
                        i();
                        var t = r.Symbol.iterator;
                        t || (t = r.Symbol.iterator = r.Symbol("iterator")), "function" != typeof Array.prototype[t] && o(Array.prototype, t, {
                            configurable: !0,
                            writable: !0,
                            value: function() {
                                return t = n(this), l(), (t = {
                                    next: t
                                })[r.Symbol.iterator] = function() {
                                    return this
                                }, t;
                                var t
                            }
                        }), l = function() {}
                    }

                    function s(t) {
                        var e = "undefined" != typeof Symbol && Symbol.iterator && t[Symbol.iterator];
                        return e ? e.call(t) : {
                            next: n(t)
                        }
                    }
                    if ("function" == typeof Object.setPrototypeOf) u = Object.setPrototypeOf;
                    else {
                        var c;
                        t: {
                            var p = {};
                            try {
                                p.__proto__ = {
                                    o: !0
                                }, c = p.o;
                                break t
                            } catch (a) {}
                            c = !1
                        }
                        u = c ? function(t, e) {
                            if (t.__proto__ = e, t.__proto__ !== e) throw new TypeError(t + " is not extensible");
                            return t
                        } : null
                    }
                    var h = u;

                    function d() {
                        this.g = !1, this.c = null, this.m = void 0, this.b = 1, this.l = this.s = 0, this.f = null
                    }

                    function y(t) {
                        if (t.g) throw new TypeError("Generator is already running");
                        t.g = !0
                    }

                    function v(t, e, n) {
                        return t.b = n, {
                            value: e
                        }
                    }

                    function b(t) {
                        for (var e in this.w = t, this.j = [], t) this.j.push(e);
                        this.j.reverse()
                    }

                    function m(t) {
                        this.a = new d, this.A = t
                    }

                    function w(t, e, n, o) {
                        try {
                            var r = e.call(t.a.c, n);
                            if (!(r instanceof Object)) throw new TypeError("Iterator result " + r + " is not an object");
                            if (!r.done) return t.a.g = !1, r;
                            var i = r.value
                        } catch (e) {
                            return t.a.c = null, t.a.i(e), g(t)
                        }
                        return t.a.c = null, o.call(t.a, i), g(t)
                    }

                    function g(t) {
                        for (; t.a.b;) try {
                            var e = t.A(t.a);
                            if (e) return t.a.g = !1, {
                                value: e.value,
                                done: !1
                            }
                        } catch (e) {
                            t.a.m = void 0, t.a.i(e)
                        }
                        if (t.a.g = !1, t.a.f) {
                            if (e = t.a.f, t.a.f = null, e.v) throw e.u;
                            return {
                                value: e.return,
                                done: !0
                            }
                        }
                        return {
                            value: void 0,
                            done: !0
                        }
                    }

                    function x(t) {
                        this.next = function(e) {
                            return t.h(e)
                        }, this.throw = function(e) {
                            return t.i(e)
                        }, this.return = function(e) {
                            return function(t, e) {
                                y(t.a);
                                var n = t.a.c;
                                return n ? w(t, "return" in n ? n.return : function(t) {
                                    return {
                                        value: t,
                                        done: !0
                                    }
                                }, e, t.a.return) : (t.a.return(e), g(t))
                            }(t, e)
                        }, l(), this[Symbol.iterator] = function() {
                            return this
                        }
                    }

                    function j(t, e) {
                        var n = new x(new m(e));
                        return h && h(n, t.prototype), n
                    }
                    if (d.prototype.h = function(t) {
                            this.m = t
                        }, d.prototype.i = function(t) {
                            this.f = {
                                u: t,
                                v: !0
                            }, this.b = this.s || this.l
                        }, d.prototype.return = function(t) {
                            this.f = {
                                return: t
                            }, this.b = this.l
                        }, m.prototype.h = function(t) {
                            return y(this.a), this.a.c ? w(this, this.a.c.next, t, this.a.h) : (this.a.h(t), g(this))
                        }, m.prototype.i = function(t) {
                            return y(this.a), this.a.c ? w(this, this.a.c.throw, t, this.a.h) : (this.a.i(t), g(this))
                        }, "undefined" == typeof FormData || !FormData.prototype.keys) {
                        var _ = function(t, e) {
                                for (var n = 0; n < t.length; n++) e(t[n])
                            },
                            F = function(t, e, n) {
                                if (2 > arguments.length) throw new TypeError("2 arguments required, but only " + arguments.length + " present.");
                                return e instanceof Blob ? [t + "", e, void 0 !== n ? n + "" : "string" == typeof e.name ? e.name : "blob"] : [t + "", e + ""]
                            },
                            S = function(t) {
                                if (!arguments.length) throw new TypeError("1 argument required, but only 0 present.");
                                return [t + ""]
                            },
                            O = function(t) {
                                var e = s(t);
                                return t = e.next().value, e = e.next().value, t instanceof Blob && (t = new File([t], e, {
                                    type: t.type,
                                    lastModified: t.lastModified
                                })), t
                            },
                            D = "object" == typeof window ? window : "object" == typeof self ? self : this,
                            M = D.FormData,
                            q = D.XMLHttpRequest && D.XMLHttpRequest.prototype.send,
                            k = D.Request && D.fetch;
                        i();
                        var E = D.Symbol && Symbol.toStringTag,
                            T = new WeakMap,
                            A = Array.from || function(t) {
                                return [].slice.call(t)
                            };
                        E && (Blob.prototype[E] || (Blob.prototype[E] = "Blob"), "File" in D && !File.prototype[E] && (File.prototype[E] = "File"));
                        try {
                            new File([], "")
                        } catch (a) {
                            D.File = function(t, e, n) {
                                return t = new Blob(t, n), n = n && void 0 !== n.lastModified ? new Date(n.lastModified) : new Date, Object.defineProperties(t, {
                                    name: {
                                        value: e
                                    },
                                    lastModifiedDate: {
                                        value: n
                                    },
                                    lastModified: {
                                        value: +n
                                    },
                                    toString: {
                                        value: function() {
                                            return "[object File]"
                                        }
                                    }
                                }), E && Object.defineProperty(t, E, {
                                    value: "File"
                                }), t
                            }
                        }
                        i(), l();
                        var B = function(t) {
                            if (T.set(this, Object.create(null)), !t) return this;
                            var e = this;
                            _(t.elements, function(t) {
                                t.name && !t.disabled && "submit" !== t.type && "button" !== t.type && ("file" === t.type ? _(t.files || [], function(n) {
                                    e.append(t.name, n)
                                }) : "select-multiple" === t.type || "select-one" === t.type ? _(t.options, function(n) {
                                    !n.disabled && n.selected && e.append(t.name, n.value)
                                }) : "checkbox" === t.type || "radio" === t.type ? t.checked && e.append(t.name, t.value) : e.append(t.name, t.value))
                            })
                        };
                        if ((e = B.prototype).append = function(t, e, n) {
                                var o = T.get(this);
                                o[t] || (o[t] = []), o[t].push([e, n])
                            }, e.delete = function(t) {
                                delete T.get(this)[t]
                            }, e.entries = function t() {
                                var e, n, o, r, i, a, u = this;
                                return j(t, function(t) {
                                    switch (t.b) {
                                        case 1:
                                            e = T.get(u), o = new b(e);
                                        case 2:
                                            var f;
                                            t: {
                                                for (f = o; 0 < f.j.length;) {
                                                    var l = f.j.pop();
                                                    if (l in f.w) {
                                                        f = l;
                                                        break t
                                                    }
                                                }
                                                f = null
                                            }
                                            if (null == (n = f)) {
                                                t.b = 0;
                                                break
                                            }
                                            r = s(e[n]), i = r.next();
                                        case 5:
                                            if (i.done) {
                                                t.b = 2;
                                                break
                                            }
                                            return a = i.value, v(t, [n, O(a)], 6);
                                        case 6:
                                            i = r.next(), t.b = 5
                                    }
                                })
                            }, e.forEach = function(t, e) {
                                for (var n = s(this), o = n.next(); !o.done; o = n.next()) {
                                    var r = s(o.value);
                                    o = r.next().value, r = r.next().value, t.call(e, r, o, this)
                                }
                            }, e.get = function(t) {
                                var e = T.get(this);
                                return e[t] ? O(e[t][0]) : null
                            }, e.getAll = function(t) {
                                return (T.get(this)[t] || []).map(O)
                            }, e.has = function(t) {
                                return t in T.get(this)
                            }, e.keys = function t() {
                                var e, n, o, r, i = this;
                                return j(t, function(t) {
                                    if (1 == t.b && (e = s(i), n = e.next()), 3 != t.b) return n.done ? void(t.b = 0) : (o = n.value, r = s(o), v(t, r.next().value, 3));
                                    n = e.next(), t.b = 2
                                })
                            }, e.set = function(t, e, n) {
                                T.get(this)[t] = [
                                    [e, n]
                                ]
                            }, e.values = function t() {
                                var e, n, o, r, i = this;
                                return j(t, function(t) {
                                    if (1 == t.b && (e = s(i), n = e.next()), 3 != t.b) return n.done ? void(t.b = 0) : (o = n.value, (r = s(o)).next(), v(t, r.next().value, 3));
                                    n = e.next(), t.b = 2
                                })
                            }, B.prototype._asNative = function() {
                                for (var t = new M, e = s(this), n = e.next(); !n.done; n = e.next()) {
                                    var o = s(n.value);
                                    n = o.next().value, o = o.next().value, t.append(n, o)
                                }
                                return t
                            }, B.prototype._blob = function() {
                                for (var t = "----formdata-polyfill-" + Math.random(), e = [], n = s(this), o = n.next(); !o.done; o = n.next()) {
                                    var r = s(o.value);
                                    o = r.next().value, r = r.next().value, e.push("--" + t + "\r\n"), r instanceof Blob ? e.push('Content-Disposition: form-data; name="' + o + '"; filename="' + r.name + '"\r\n', "Content-Type: " + (r.type || "application/octet-stream") + "\r\n\r\n", r, "\r\n") : e.push('Content-Disposition: form-data; name="' + o + '"\r\n\r\n' + r + "\r\n")
                                }
                                return e.push("--" + t + "--"), new Blob(e, {
                                    type: "multipart/form-data; boundary=" + t
                                })
                            }, B.prototype[Symbol.iterator] = function() {
                                return this.entries()
                            }, B.prototype.toString = function() {
                                return "[object FormData]"
                            }, E && (B.prototype[E] = "FormData"), [
                                ["append", F],
                                ["delete", S],
                                ["get", S],
                                ["getAll", S],
                                ["has", S],
                                ["set", F]
                            ].forEach(function(t) {
                                var e = B.prototype[t[0]];
                                B.prototype[t[0]] = function() {
                                    return e.apply(this, t[1].apply(this, A(arguments)))
                                }
                            }), q && (XMLHttpRequest.prototype.send = function(t) {
                                t instanceof B ? (t = t._blob(), this.setRequestHeader("Content-Type", t.type), q.call(this, t)) : q.call(this, t)
                            }), k) {
                            var P = D.fetch;
                            D.fetch = function(t, e) {
                                return e && e.body && e.body instanceof B && (e.body = e.body._blob()), P(t, e)
                            }
                        }
                        D.FormData = B
                    }
                }()
            }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
        }, {}]
    }, {}, [1])(1)
});

// wzrd.io/standalone/promise-polyfill@latest
! function(e) {
    if ("object" == typeof exports && "undefined" != typeof module) module.exports = e();
    else if ("function" == typeof define && define.amd) define([], e);
    else {
        ("undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : this).promisePolyfill = e()
    }
}(function() {
    return function() {
        return function e(t, n, o) {
            function r(u, c) {
                if (!n[u]) {
                    if (!t[u]) {
                        var f = "function" == typeof require && require;
                        if (!c && f) return f(u, !0);
                        if (i) return i(u, !0);
                        var l = new Error("Cannot find module '" + u + "'");
                        throw l.code = "MODULE_NOT_FOUND", l
                    }
                    var a = n[u] = {
                        exports: {}
                    };
                    t[u][0].call(a.exports, function(e) {
                        return r(t[u][1][e] || e)
                    }, a, a.exports, e, t, n, o)
                }
                return n[u].exports
            }
            for (var i = "function" == typeof require && require, u = 0; u < o.length; u++) r(o[u]);
            return r
        }
    }()({
        1: [function(e, t, n) {
            var o, r, i = t.exports = {};

            function u() {
                throw new Error("setTimeout has not been defined")
            }

            function c() {
                throw new Error("clearTimeout has not been defined")
            }

            function f(e) {
                if (o === setTimeout) return setTimeout(e, 0);
                if ((o === u || !o) && setTimeout) return o = setTimeout, setTimeout(e, 0);
                try {
                    return o(e, 0)
                } catch (t) {
                    try {
                        return o.call(null, e, 0)
                    } catch (t) {
                        return o.call(this, e, 0)
                    }
                }
            }! function() {
                try {
                    o = "function" == typeof setTimeout ? setTimeout : u
                } catch (e) {
                    o = u
                }
                try {
                    r = "function" == typeof clearTimeout ? clearTimeout : c
                } catch (e) {
                    r = c
                }
            }();
            var l, a = [],
                s = !1,
                d = -1;

            function h() {
                s && l && (s = !1, l.length ? a = l.concat(a) : d = -1, a.length && p())
            }

            function p() {
                if (!s) {
                    var e = f(h);
                    s = !0;
                    for (var t = a.length; t;) {
                        for (l = a, a = []; ++d < t;) l && l[d].run();
                        d = -1, t = a.length
                    }
                    l = null, s = !1,
                        function(e) {
                            if (r === clearTimeout) return clearTimeout(e);
                            if ((r === c || !r) && clearTimeout) return r = clearTimeout, clearTimeout(e);
                            try {
                                r(e)
                            } catch (t) {
                                try {
                                    return r.call(null, e)
                                } catch (t) {
                                    return r.call(this, e)
                                }
                            }
                        }(e)
                }
            }

            function m(e, t) {
                this.fun = e, this.array = t
            }

            function y() {}
            i.nextTick = function(e) {
                var t = new Array(arguments.length - 1);
                if (arguments.length > 1)
                    for (var n = 1; n < arguments.length; n++) t[n - 1] = arguments[n];
                a.push(new m(e, t)), 1 !== a.length || s || f(p)
            }, m.prototype.run = function() {
                this.fun.apply(null, this.array)
            }, i.title = "browser", i.browser = !0, i.env = {}, i.argv = [], i.version = "", i.versions = {}, i.on = y, i.addListener = y, i.once = y, i.off = y, i.removeListener = y, i.removeAllListeners = y, i.emit = y, i.prependListener = y, i.prependOnceListener = y, i.listeners = function(e) {
                return []
            }, i.binding = function(e) {
                throw new Error("process.binding is not supported")
            }, i.cwd = function() {
                return "/"
            }, i.chdir = function(e) {
                throw new Error("process.chdir is not supported")
            }, i.umask = function() {
                return 0
            }
        }, {}],
        2: [function(e, t, n) {
            (function(t, o) {
                var r = e("process/browser.js").nextTick,
                    i = Function.prototype.apply,
                    u = Array.prototype.slice,
                    c = {},
                    f = 0;

                function l(e, t) {
                    this._id = e, this._clearFn = t
                }
                n.setTimeout = function() {
                    return new l(i.call(setTimeout, window, arguments), clearTimeout)
                }, n.setInterval = function() {
                    return new l(i.call(setInterval, window, arguments), clearInterval)
                }, n.clearTimeout = n.clearInterval = function(e) {
                    e.close()
                }, l.prototype.unref = l.prototype.ref = function() {}, l.prototype.close = function() {
                    this._clearFn.call(window, this._id)
                }, n.enroll = function(e, t) {
                    clearTimeout(e._idleTimeoutId), e._idleTimeout = t
                }, n.unenroll = function(e) {
                    clearTimeout(e._idleTimeoutId), e._idleTimeout = -1
                }, n._unrefActive = n.active = function(e) {
                    clearTimeout(e._idleTimeoutId);
                    var t = e._idleTimeout;
                    t >= 0 && (e._idleTimeoutId = setTimeout(function() {
                        e._onTimeout && e._onTimeout()
                    }, t))
                }, n.setImmediate = "function" == typeof t ? t : function(e) {
                    var t = f++,
                        o = !(arguments.length < 2) && u.call(arguments, 1);
                    return c[t] = !0, r(function() {
                        c[t] && (o ? e.apply(null, o) : e.call(null), n.clearImmediate(t))
                    }), t
                }, n.clearImmediate = "function" == typeof o ? o : function(e) {
                    delete c[e]
                }
            }).call(this, e("timers").setImmediate, e("timers").clearImmediate)
        }, {
            "process/browser.js": 1,
            timers: 2
        }],
        3: [function(e, t, n) {
            (function(e) {
                "use strict";
                var n = setTimeout;

                function o() {}

                function r(e) {
                    if (!(this instanceof r)) throw new TypeError("Promises must be constructed via new");
                    if ("function" != typeof e) throw new TypeError("not a function");
                    this._state = 0, this._handled = !1, this._value = void 0, this._deferreds = [], a(e, this)
                }

                function i(e, t) {
                    for (; 3 === e._state;) e = e._value;
                    0 !== e._state ? (e._handled = !0, r._immediateFn(function() {
                        var n = 1 === e._state ? t.onFulfilled : t.onRejected;
                        if (null !== n) {
                            var o;
                            try {
                                o = n(e._value)
                            } catch (e) {
                                return void c(t.promise, e)
                            }
                            u(t.promise, o)
                        } else(1 === e._state ? u : c)(t.promise, e._value)
                    })) : e._deferreds.push(t)
                }

                function u(e, t) {
                    try {
                        if (t === e) throw new TypeError("A promise cannot be resolved with itself.");
                        if (t && ("object" == typeof t || "function" == typeof t)) {
                            var n = t.then;
                            if (t instanceof r) return e._state = 3, e._value = t, void f(e);
                            if ("function" == typeof n) return void a((o = n, i = t, function() {
                                o.apply(i, arguments)
                            }), e)
                        }
                        e._state = 1, e._value = t, f(e)
                    } catch (t) {
                        c(e, t)
                    }
                    var o, i
                }

                function c(e, t) {
                    e._state = 2, e._value = t, f(e)
                }

                function f(e) {
                    2 === e._state && 0 === e._deferreds.length && r._immediateFn(function() {
                        e._handled || r._unhandledRejectionFn(e._value)
                    });
                    for (var t = 0, n = e._deferreds.length; t < n; t++) i(e, e._deferreds[t]);
                    e._deferreds = null
                }

                function l(e, t, n) {
                    this.onFulfilled = "function" == typeof e ? e : null, this.onRejected = "function" == typeof t ? t : null, this.promise = n
                }

                function a(e, t) {
                    var n = !1;
                    try {
                        e(function(e) {
                            n || (n = !0, u(t, e))
                        }, function(e) {
                            n || (n = !0, c(t, e))
                        })
                    } catch (e) {
                        if (n) return;
                        n = !0, c(t, e)
                    }
                }
                r.prototype.catch = function(e) {
                    return this.then(null, e)
                }, r.prototype.then = function(e, t) {
                    var n = new this.constructor(o);
                    return i(this, new l(e, t, n)), n
                }, r.prototype.finally = function(e) {
                    var t = this.constructor;
                    return this.then(function(n) {
                        return t.resolve(e()).then(function() {
                            return n
                        })
                    }, function(n) {
                        return t.resolve(e()).then(function() {
                            return t.reject(n)
                        })
                    })
                }, r.all = function(e) {
                    return new r(function(t, n) {
                        if (!e || void 0 === e.length) throw new TypeError("Promise.all accepts an array");
                        var o = Array.prototype.slice.call(e);
                        if (0 === o.length) return t([]);
                        var r = o.length;

                        function i(e, u) {
                            try {
                                if (u && ("object" == typeof u || "function" == typeof u)) {
                                    var c = u.then;
                                    if ("function" == typeof c) return void c.call(u, function(t) {
                                        i(e, t)
                                    }, n)
                                }
                                o[e] = u, 0 == --r && t(o)
                            } catch (e) {
                                n(e)
                            }
                        }
                        for (var u = 0; u < o.length; u++) i(u, o[u])
                    })
                }, r.resolve = function(e) {
                    return e && "object" == typeof e && e.constructor === r ? e : new r(function(t) {
                        t(e)
                    })
                }, r.reject = function(e) {
                    return new r(function(t, n) {
                        n(e)
                    })
                }, r.race = function(e) {
                    return new r(function(t, n) {
                        for (var o = 0, r = e.length; o < r; o++) e[o].then(t, n)
                    })
                }, r._immediateFn = "function" == typeof e && function(t) {
                    e(t)
                } || function(e) {
                    n(e, 0)
                }, r._unhandledRejectionFn = function(e) {
                    "undefined" != typeof console && console && console.warn("Possible Unhandled Promise Rejection:", e)
                }, t.exports = r
            }).call(this, e("timers").setImmediate)
        }, {
            timers: 2
        }]
    }, {}, [3])(3)
});

// wzrd.io/standalone/whatwg-fetch@latest
