! function(t) {
    var i = {
            bgColor: "#ccc",
            fgColor: "red",
            size: 160,
            donutwidth: 40,
            textsize: 16
        },
        s = {
            init: function(e) {
                var n = !0;
                if ("object" == typeof e ? (this.donutchartsettings = t.extend({}, i, e), e.size && !e.donutwidth && (this.donutchartsettings.donutwidth = e.size / 4), e.size && !e.textsize && (this.donutchartsettings.textsize = e.size / 10)) : "object" == typeof this.donutchartsettings ? n = !1 : this.donutchartsettings = i, n) {
                    t(this).css("position", "relative"), t(this).css("width", this.donutchartsettings.size + "px"), t(this).css("height", this.donutchartsettings.size + "px"), t(this).html("<canvas width='" + this.donutchartsettings.size + "' height='" + this.donutchartsettings.size + "'></canvas><div class='donutchart-text' style='position:absolute;top:0;left:0;line-height:" + this.donutchartsettings.size + "px;text-align:center;width:" + this.donutchartsettings.size + "px;font-weight:bold;font-size:" + this.donutchartsettings.textsize + "px;font-weight:bold;'></div>");
                    var h = t("canvas", this).get(0);
                    "undefined" != typeof G_vmlCanvasManager && G_vmlCanvasManager.initElement(h);
                    var a = h.getContext("2d");
                    s.drawBg.call(a, this.donutchartsettings)
                }
            },
            drawBg: function(t) {
                this.clearRect(0, 0, t.size, t.size), this.beginPath(), this.fillStyle = t.bgColor, this.arc(t.size / 2, t.size / 2, t.size / 2, 0, 2 * Math.PI, !1), this.arc(t.size / 2, t.size / 2, t.size / 2 - t.donutwidth, 0, 2 * Math.PI, !0), this.fill()
            },
            drawFg: function(t, i) {
                var s = i / 100 * 360,
                    e = -90 * Math.PI / 180,
                    n = Math.PI * (-90 + s) / 180;
                this.beginPath(), this.fillStyle = t.fgColor, this.arc(t.size / 2, t.size / 2, t.size / 2, e, n, !1), this.arc(t.size / 2, t.size / 2, t.size / 2 - t.donutwidth, n, e, !0), this.fill()
            }
        };
    t.fn.donutchart = function(i) {
        return this.each(function() {
            function e() {
                c++, s.drawBg.call(r, o), s.drawFg.apply(r, [o, c]), a.text(c + "%"), c >= n && clearInterval(d)
            }
            if (s.init.call(this, i), "animate" == i) {
                var n = t(this).attr("data-percent"),
                    h = t(this).children("canvas").get(0),
                    a = t(this).children("div"),
                    o = this.donutchartsettings;
                if (h.getContext) var r = h.getContext("2d"),
                    c = 0,
                    d = setInterval(e, 20)
            }
        })
    }
}(jQuery);