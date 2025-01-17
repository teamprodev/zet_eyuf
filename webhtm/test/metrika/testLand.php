(function(g) {
var z = {
min: false,
max: false,
format: "YYYY-MM-DD HH:mm:ss",
isRange: false,
hasShortcut: false,
shortcutOptions: [],
between: false,
language: "zh-CN",
hide: function() {},
show: function() {}
};
var t = {
onlytimeReg: function(o) {
return /^HH:mm(:ss)?$/.test(o)
},
getFormatTime: function(o) {
return o.onlyTime ? o.config.format : o.config.format.split(" ")[1]
},
timeReg: function(B) {
var A = t.getFormatTime(B);
var o = A.replace(/HH/, "([0-9]{1,2})").replace(/:/g, "(:?)").replace(/(mm|ss)/g, "([0-9]{1,2})");
return new RegExp("^" + o + "$")
},
dayReg: function(C) {
var B = C.config.format.split(" ")[0];
var A = new RegExp(C.splitStr,"g");
var o = B.replace(/YYYY/, "([1-9]{1}[0-9]{3})").replace(A, "(" + C.splitStr + "?)").replace(/(MM|DD)/g, "([0-9]{1,2})");
return new RegExp("^" + o + "$")
},
fixedFill: function(o) {
if (o[3] == 0) {
o[3] = o[5];
o[5] = "01"
}
if (o[3].length == 1 && o[5] == 0) {
o[3] = o[3] + "0";
o[5] = "01"
}
if (o[3].length == 2 && o[5] == 0) {
o[5] = "01"
}
return o
},
getMonthDay: function(A, o) {
var B = A - 1 < 0 ? 11 : A - 1;
return A === 2 && o % 4 === 0 ? "29" : f[B]
},
getFormat: function(C) {
var A = ["YYYY", "MM", "DD", "HH", "mm", "ss"];
var o = [];
for (var B = 0; B < A.length; B++) {
o.push(C.indexOf(A[B]) !== -1)
}
return o
},
getPicker: function(o, A) {
A = A || "picker";
return o.parents(".c-datepicker-picker").data(A)
},
fillTime: function(o) {
return Number(o) < 10 ? "0" + Number(o) : o
},
fillMonth: function(A, o) {
if (A < 1) {
A = 12;
o = o - 1
} else {
if (A > 12) {
A = 1;
o = o + 1
}
}
return {
month: A,
year: o
}
},
getTimeFormat: function(o) {
return {
year: o.year(),
month: o.month() + 1,
day: o.date()
}
},
getOnlyTimeFormat: function(o) {
return [o.hour(), o.minute(), o.second()]
},
getConcatTime: function(o, B, A) {
return t.fillTime(o) + ":" + t.fillTime(B) + ":" + t.fillTime(A)
},
newDateFixed: function(F, A) {
var D = !!window.ActiveXObject || "ActiveXObject"in window;
var B = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
var E = D || (B && F.config.format !== "YYYY-MM") ? "/" : "-";
var C = new RegExp(F.splitStr,"g");
var o = !A ? new Date() : F.splitStr ? new Date(A.replace(C, E)) : new Date(A);
return o
},
getRangeTimeFormat: function(D, C) {
var A;
var B = C.val();
A = B;
var o = A ? moment(t.newDateFixed(D, A)) : moment();
return t.getTimeFormat(o)
},
minMaxFill: function(D, I, E, F) {
var o;
if (F === "month") {
o = I.year + D.splitStr + t.fillTime(I.month)
} else {
if (F === "year") {
o = I.year + ""
} else {
o = I.year + D.splitStr + t.fillTime(I.month) + D.splitStr + t.fillTime(I.day)
}
}
if (D.hasTime) {
o += " " + D.$container.find(".c-datePicker__input-time").eq(E).val()
}
if (!D.config.min && !D.config.max) {
o = o.split(" ")[0];
return {
val: o,
result: I
}
}
var B = moment(t.newDateFixed(D, o));
var A = moment(t.newDateFixed(D, D.config.min));
var G = moment(t.newDateFixed(D, D.config.max));
var C = B.isBefore(A);
var H = B.isAfter(G);
if (C && D.config.min) {
o = A.format(D.config.format).split(" ")[0];
I = t.getTimeFormat(A)
}
if (H && D.config.max) {
o = G.format(D.config.format).split(" ")[0];
I = t.getTimeFormat(G)
}
o = o.split(" ")[0];
return {
val: o,
result: I
}
},
timeCheck: function(C) {
var o = C.split(":");
var B = [23, 59, 59];
for (var A = 0; A < o.length; A++) {
if (Number(o[A]) > B[A]) {
o[A] = B[A]
}
}
return o.join(":")
},
maxMonth: function(o) {
return o > 12
},
minMonth: function(o) {
return o < 1
},
judgeTimeRange: function(F, C, o, G) {
G = G || 0;
var H = C.val();
var B = o.val();
if (!H) {
return
}
var A = H + " " + B;
var E = moment(t.newDateFixed(F, A));
var D = F.config.min ? E.isBefore((t.newDateFixed(F, F.config.min))) : false;
var I = F.config.max ? E.isAfter((t.newDateFixed(F, F.config.max))) : false;
if (!D && !I) {
return
}
if (D && F.config.min) {
A = F.config.min;
o.val(A.split(" ")[1])
} else {
if (I && F.config.max) {
A = F.config.max;
o.val(A.split(" ")[1])
}
}
if (!F.config.isRange) {
F.$input.eq(G).val(A)
}
},
timeVal: function(B, o) {
var A = B.onlyTime ? B.config.format : B.config.format.split(" ")[1];
return o === "min" ? A.replace(/HH/, "00").replace(/mm/, "00").replace(/ss/, "00") : A.replace(/HH/, "23").replace(/mm/, "59").replace(/ss/, "59")
},
getScrollBarWidth: function() {
var B = document.createElement("p");
B.style.width = "100%";
B.style.height = "200px";
var C = document.createElement("div");
C.style.position = "absolute";
C.style.top = "0px";
C.style.left = "0px";
C.style.visibility = "hidden";
C.style.width = "200px";
C.style.height = "150px";
C.style.overflow = "hidden";
C.appendChild(B);
document.body.appendChild(C);
var A = B.offsetWidth;
C.style.overflow = "scroll";
var o = B.offsetWidth;
if (A == o) {
o = C.clientWidth
}
document.body.removeChild(C);
var D = A - o;
if (D === 0) {
D = 15
}
return D
},
getOnlyTimeMinMax: function(F) {
var C = F.config.min;
var H = F.config.max;
var L = void (0);
var o = {
hour: L,
minute: L,
second: L
};
var I = {
hour: L,
minute: L,
second: L
};
var J = C && C.match(t.timeReg(F));
var B = H && H.match(t.timeReg(F));
var E = B && J ? true : B ? "max" : J ? "min" : false;
if (J) {
var G = C.split(":");
o.hour = Number(G[0]);
o.minute = Number(G[1]);
o.second = Number(G[2])
}
if (B) {
var K = H.split(":");
I.hour = Number(K[0]);
I.minute = Number(K[1]);
I.second = Number(K[2])
}
var D = J ? t.countSecond(C.split(":")) : void (0);
var A = B ? t.countSecond(H.split(":")) : void (0);
return {
min: o,
max: I,
hasMin: J,
hasMax: B,
hasMinMax: E,
minSecond: D,
maxSecond: A,
minVal: C,
maxVal: H
}
},
countSecond: function(o) {
return o.length === 2 ? o = Number(o[0]) * 60 + Number(o[1]) : o.length === 3 ? o = Number(o[0]) * 3600 + Number(o[1]) * 60 + Number(o[2]) : false
}
};
var y = t.getScrollBarWidth();
var k = {
tableTpl: function(A, B) {
var o = '<table class="' + A + '" style=""><tbody>' + B + "</tbody></table>";
return o
},
tdTpl: function(o, B) {
var A = '<td class="' + o + '"><div><a class="cell">' + B + "</a></div></td>";
return A
},
dayHeader: function(A) {
var E = A.days;
var D = "";
for (var C = 0, o = E.length; C < o; C++) {
D += "<th>" + E[C] + "</th>"
}
var B = "<tr>" + D + "</tr>";
return B
},
timeLiTpl: function(A, B) {
var o = '<li class="c-datepicker-time-spinner__item ' + A + '">' + B + "</li>";
return o
},
timeTpl: function(B, o) {
var A = '<div class="c-datepicker-time-spinner__wrapper c-datepicker-scrollbar"><div class="c-datepicker-scrollbar__wrap ' + B + '" style="max-height: inherit; margin-bottom: -' + y + "px; margin-right: -" + y + 'px;"><ul class="c-datepicker-scrollbar__view c-datepicker-time-spinner__list">' + o + "</ul></div></div>";
return A
},
timeMainTpl: function(o, B) {
var A = '<div class="c-datepicker-time-panel c-datepicker-popper" style=""><div class="c-datepicker-time-panel__content has-seconds"><div class="c-datepicker-time-spinner has-seconds">' + B + '</div></div><div class="c-datepicker-time-panel__footer"><button type="button" class="c-datepicker-time-panel__btn min">' + o.zero + '</button><button type="button" class="c-datepicker-time-panel__btn max">23:59</button><button type="button" class="c-datepicker-time-panel__btn cancel">' + o.cancel + '</button><button type="button" class="c-datepicker-time-panel__btn confirm">' + o.confirm + "</button></div></div>";
return A
},
sideBarButton: function(o, C, A) {
var B = '<button type="button" class="c-datepicker-picker__shortcut" data-value="' + o + '" data-time="' + C + '">' + A + "</button>";
return B
},
sideBarTpl: function(A) {
var o = '<div class="c-datepicker-picker__sidebar">' + A + "</div>";
return o
},
pickerFooterTpl: function(o, B, C) {
var A = '<div class="c-datepicker-picker__footer" style=""><button type="button" class="c-datepicker-button c-datepicker-picker__link-btn c-datepicker-button--text c-datepicker-button--mini ' + B + '"><span>' + C + '</span></button><button type="button" class="c-datepicker-button c-datepicker-picker__link-btn confirm c-datepicker-button--default c-datepicker-button--mini is-plain"><span>' + o.confirm + "</span></button></div>";
return A
},
pickerArrowTpl: function() {
return '<div x-arrow="" class="popper__arrow" style="left: 35px;"></div>'
},
pickerHeaderTpl: function(o, D, E, C, B, F) {
var A = '<div class="' + D + '__header">' + E + '<span role="button" class="' + D + "__header-label " + D + '__header-year"><span>' + B + "</span> " + o.headerYearLink + '</span><span role="button" class="' + D + "__header-label " + D + '__header-month"><span>' + F + "</span> " + o.units[1] + "</span>" + C + "</div>";
return A
},
pickerHeaderPrevTpl: function(o, B) {
var A = '<i class="kxiconfont icon-first c-datepicker-picker__icon-btn ' + B + '__prev-btn year" aria-label="' + o.prevYear + '"></i><i class="kxiconfont icon-left c-datepicker-picker__icon-btn ' + B + '__prev-btn month" aria-label="' + o.nextMonth + '"></i>';
return A
},
pickerHeaderNextTpl: function(o, B) {
var A = '<i class="kxiconfont icon-right c-datepicker-picker__icon-btn ' + B + '__next-btn month" aria-label="' + o.nextMonth + '"></i><i class="kxiconfont icon-last c-datepicker-picker__icon-btn ' + B + '__next-btn year" aria-label="' + o.nextYear + '"></i>';
return A
},
pickerHeaderNextSingleTpl: function(o, B) {
var A = '<i class="kxiconfont icon-last c-datepicker-picker__icon-btn ' + B + '__next-btn year" aria-label="' + o.nextYear + '"></i><i class="kxiconfont icon-right c-datepicker-picker__icon-btn ' + B + '__next-btn month" aria-label="' + o.nextMonth + '"></i>';
return A
},
pickerTimeHeaderTpl: function(o, B) {
var A = '<span class="' + B + '__editor-wrap"><div class="c-datepicker-input c-datepicker-input--small"><input type="text" autocomplete="off" placeholder="' + o.chooseDay + '" class="c-datepicker-input__inner c-datePicker__input-day"></div></span><span class="' + B + '__editor-wrap"><div class="c-datepicker-input c-datepicker-input--small"><input type="text" autocomplete="off" placeholder="' + o.chooseTime + '" class="c-datepicker-input__inner c-datePicker__input-time"></div></span>';
return A
},
pickerOnlyTimeHeaderTpl: function(B, o) {
var A = '<span class="' + B + '__editor-wrap"><div class="c-datepicker-only-time-title">' + o + "</div></span>";
return A
},
rangePickerMainTpl: function(G, K, H, M, D, o, N) {
var F = "c-datepicker-date-range-picker";
var O = k.pickerTimeHeaderTpl(G, F);
var A = k.pickerHeaderPrevTpl(G, F);
var C = k.pickerHeaderNextTpl(G, F);
var L = k.pickerHeaderTpl(G, F, A, "", "{{year}}", "{{month}}");
var E = k.pickerHeaderTpl(G, F, "", C, M, D);
var J = k.pickerFooterTpl(G, "c-datepicker-picker__btn-clear", G.clear);
var I = k.pickerArrowTpl();
var B = '<div class="c-datepicker-picker c-datepicker-date-range-picker c-datepicker-popper ' + K + " " + H + '" x-placement="top-start"><div class="c-datepicker-picker__body-wrapper">' + o + '<div class="c-datepicker-picker__body"><div class="c-datepicker-date-range-picker__time-header"><div class="c-datepicker-date-range-picker__time-content">' + O + '</div><span class="kxiconfont icon-right"></span><div class="c-datepicker-date-range-picker__time-content">' + O + '</div></div><div class="c-datepicker-picker__body-content"><div class="c-datepicker-date-range-picker-panel__wrap is-left">' + L + '<div class="c-datepicker-picker__content">' + N + '</div></div><div class="c-datepicker-date-range-picker-panel__wrap is-right">' + E + '<div class="c-datepicker-picker__content">' + N + "</div></div></div></div></div>" + J + I + "</div>";
return B
},
pickerFooterOnlyTimeTpl: function(o) {
var A = '<div class="c-datepicker-picker__footer" style=""><button type="button" class="c-datepicker-button c-datepicker-picker__link-btn c-datepicker-button--text c-datepicker-button--mini  c-datepicker-picker__btn-clear"><span>' + o.clear + '</span></button><button type="button" class="c-datepicker-button c-datepicker-picker__link-btn c-datepicker-button--text c-datepicker-button--mini  c-datepicker-picker__btn-cancel"><span>' + o.cancel + '</span></button><button type="button" class="c-datepicker-button c-datepicker-picker__link-btn confirm c-datepicker-button--default c-datepicker-button--mini is-plain"><span>' + o.confirm + "</span></button></div>";
return A
},
rangePickerMainOnlyTimeTpl: function(B, A) {
var D = "c-datepicker-date-range-picker";
var o = k.pickerOnlyTimeHeaderTpl(D, B.begin);
var F = k.pickerOnlyTimeHeaderTpl(D, B.end);
var G = k.pickerFooterOnlyTimeTpl(B);
var E = k.pickerArrowTpl();
var C = '<div class="c-datepicker-picker c-datepicker-date-range-picker c-datepicker-popper ' + A + '" x-placement="top-start"><div class="c-datepicker-picker__body-wrapper"><div class="c-datepicker-picker__body"><div class="c-datepicker-date-range-picker__time-header"><div class="c-datepicker-date-range-picker__time-content c-datepicker-date-picker__onlyTime-content">' + o + '</div><div class="c-datepicker-date-range-picker__time-content c-datepicker-date-picker__onlyTime-content">' + F + "</div></div></div></div>" + G + E + "</div>";
return C
},
pickerFooterNowButton: function(o) {
var A = k.pickerFooterTpl(o, "c-datepicker-picker__btn-now", o.now);
return A
},
pickerFooterClearButton: function(o) {
var A = k.pickerFooterTpl(o, "c-datepicker-picker__btn-clear", o.clear);
return A
},
datePickerMainTpl: function(A) {
var D = "c-datepicker-date-picker";
var o = k.pickerTimeHeaderTpl(A, D);
var E = k.pickerHeaderPrevTpl(A, D);
var C = k.pickerHeaderNextSingleTpl(A, D);
var G = k.pickerHeaderTpl(A, D, E, C, "{{year}}", "{{month}}");
var F = k.pickerArrowTpl();
var B = '<div class="c-datepicker-picker c-datepicker-date-picker c-datepicker-popper {{hasTime}} {{hasSidebar}}" x-placement="top-start"><div class="c-datepicker-picker__body-wrapper">{{sidebar}}<div class="c-datepicker-picker__body"><div class="c-datepicker-date-picker__time-header">' + o + "</div>" + G + ' <div class="c-datepicker-picker__content">{{table}}</div></div></div>{{footerButton}}' + F + "</div>";
return B
},
datePickerMainOnlyTimeTpl: function(o) {
var C = k.pickerOnlyTimeHeaderTpl("c-datepicker-date-picker", "");
var B = k.pickerArrowTpl();
var A = '<div class="c-datepicker-picker c-datepicker-date-picker c-datepicker-popper ' + o + '" x-placement="top-start"><div class="c-datepicker-picker__body-wrapper"><div class="c-datepicker-picker__body"><div class="c-datepicker-date-picker__time-header c-datepicker-date-picker__onlyTime-content">' + C + "</div></div></div>" + B + "</div>";
return A
},
monthWords: function(o) {
return o.months
}
};
var f = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
var s = g({});
g.sub = function() {
s.on.apply(s, arguments)
}
;
g.unsub = function() {
s.off.apply(s, arguments)
}
;
g.pub = function() {
s.trigger.apply(s, arguments)
}
;
function v(o) {
this.picker = o;
this.init()
}
g.extend(v.prototype, {
init: function() {},
event: function() {
if (!this.picker.config.isRange) {
this.picker.$container.on("click", ".c-datepicker-year-table td.available", function() {
if (g(this).hasClass("disabled")) {
return
}
var A = t.getPicker(g(this), "year");
var o = g(this).text();
A.picker.$container.find(".c-datepicker-date-picker__header-year span").text(o);
if (A.picker.params.isYear) {
A.picker.$input.val(o);
A.picker.$container.find(".c-datepicker-year-table td.current").removeClass("current");
g(this).addClass("current");
A.picker.datePickerObject.hide("choose")
} else {
A.picker.monthObject.render();
A.hide()
}
})
}
},
show: function() {
this.picker.$container.find(".c-datepicker-date-table,.c-datepicker-month-table,.c-datepicker-date-picker__header-month").hide();
this.picker.$container.find(".c-datepicker-year-table").show()
},
hide: function() {
this.picker.$container.find(".c-datepicker-year-table").hide();
this.picker.$container.find(".c-datepicker-date-picker__prev-btn.year,.c-datepicker-date-picker__next-btn.year").removeClass("is-year")
},
render: function(B) {
var A = this.renderHtml(B);
var o = this.picker.$container.find(".c-datepicker-year-table");
if (!o.length) {
this.picker.$container.find(".c-datepicker-picker__content").append(A);
this.picker.$container.data("year", this);
this.show();
this.event()
} else {
o.replaceWith(A);
this.show()
}
this.picker.$container.find(".c-datepicker-date-picker__prev-btn.month,.c-datepicker-date-picker__next-btn.month").hide();
this.picker.$container.find(".c-datepicker-date-picker__prev-btn.year,.c-datepicker-date-picker__next-btn.year").addClass("is-year")
},
renderHtml: function(G) {
G = G || moment().year();
var B = Number(parseInt(G / 10) + "0");
var I = "";
var D = "";
var A = this.picker.$input.val();
var o = A ? t.getTimeFormat(moment(t.newDateFixed(this.picker, A))).year : false;
var H = g.fn.datePicker.dates[this.picker.language];
this.picker.$container.find(".c-datepicker-date-picker__header-year span").text(B + H.headerYearLink + "-" + (B + 9));
for (var E = 0; E < 10; E++) {
var C = B + E;
var F = C == o ? "current available" : "available";
if (C < this.picker.minJson.year || C > this.picker.maxJson.year) {
F += " disabled"
}
I += k.tdTpl(F, C);
if ((E + 1) % 4 === 0) {
D += "<tr>" + I + "</tr>";
I = ""
}
}
if (I) {
D += "<tr>" + I + "</tr>"
}
D = k.tableTpl("c-datepicker-year-table", D);
return D
}
});
function e(o) {
this.picker = o;
this.init()
}
g.extend(e.prototype, {
init: function() {},
event: function() {
if (!this.picker.config.isRange) {
this.picker.$container.on("click", ".c-datepicker-month-table td.available", function() {
if (g(this).hasClass("disabled")) {
return
}
var C = t.getPicker(g(this), "month");
var o = C.picker.$container.find(".c-datepicker-date-picker__header-year span").text();
var A = C.picker.$container.find(".c-datepicker-month-table td").index(g(this)) + 1;
C.picker.$container.find(".c-datepicker-date-picker__header-month span").text(A);
if (C.picker.params.isMonth) {
var B = o + C.picker.splitStr + t.fillTime(A);
C.picker.$input.val(B);
C.picker.$container.find(".c-datepicker-month-table td.current").removeClass("current");
g(this).addClass("current");
C.picker.datePickerObject.hide("choose")
} else {
C.picker.dayObject.renderSingle(o, A, false, true);
C.hide()
}
})
}
},
show: function() {
this.picker.$container.find(".c-datepicker-month-table").show();
this.picker.$container.find(".c-datepicker-date-table,.c-datepicker-year-table").hide()
},
hide: function() {
this.picker.$container.find(".c-datepicker-date-picker__prev-btn.month,.c-datepicker-date-picker__next-btn.month").show();
this.picker.$container.find(".c-datepicker-date-picker__header-month").show();
this.picker.$container.find(".c-datepicker-month-table").hide();
this.picker.$container.find(".c-datepicker-date-picker__prev-btn.year,.c-datepicker-date-picker__next-btn.year").removeClass("is-month")
},
render: function() {
var o = this.renderHtml();
var A = this.picker.$container.find(".c-datepicker-month-table");
if (!A.length) {
this.picker.$container.find(".c-datepicker-picker__content").append(o);
this.picker.$container.data("month", this);
this.show();
this.event()
} else {
A.replaceWith(o);
this.show()
}
this.picker.$container.find(".c-datepicker-date-picker__prev-btn.year,.c-datepicker-date-picker__next-btn.year").addClass("is-month")
},
renderHtml: function() {
var I = 1;
var N = "";
var G = "";
var D = this.picker.$container.find(".c-datepicker-date-picker__header-year span").text();
var O = this.picker.minJson.year;
var o = this.picker.maxJson.year;
var M = "";
var K = false;
if (D < O || D > o) {
M = " disabled"
} else {
if (D == O || D == o) {
K = true;
var L, A;
if (o == O) {
L = this.picker.minJson.month;
A = this.picker.maxJson.month
} else {
if (D == O) {
L = this.picker.minJson.month;
A = 13
} else {
if (D == o) {
L = 0;
A = this.picker.maxJson.month
}
}
}
}
}
var Q = this.picker.$input.val();
var J = t.getTimeFormat(moment(t.newDateFixed(this.picker, Q)));
var F = Q && (J.year == D) ? J.month : false;
var P = g.fn.datePicker.dates[this.picker.language];
var H = k.monthWords(P);
for (var E = 0; E < 12; E++) {
var C = I + E;
var B = C === F ? "current available" : "available";
B += M;
if (K && (C < L || C > A)) {
B += " disabled"
}
N += k.tdTpl(B, H[E]);
if ((E + 1) % 4 === 0) {
G += "<tr>" + N + "</tr>";
N = ""
}
}
G = k.tableTpl("c-datepicker-month-table", G);
return G
}
});
function b(o) {
this.picker = o;
this.init()
}
g.extend(b.prototype, {
init: function() {
this.current = 0
},
eventSingle: function() {
this.picker.$container.on("click", ".c-datepicker-date-table td.available", function(D) {
D.stopPropagation();
var E = g(this);
var F = t.getPicker(E, "day");
if (E.hasClass("disabled")) {
return
}
if (F.picker.isBlur) {
var B = E.parents(".c-datepicker-picker__content");
var C = B.find(".c-datepicker-date-table td").index(E);
g.sub("datapickerClick", function(G) {
E = B.find(".c-datepicker-date-table td").eq(C);
o(F, E);
g.unsub("datapickerClick")
});
g.pub("datapickerRenderPicker")
} else {
o(F, E)
}
});
function o(G, B) {
var F = B.text();
G.picker.$container.find(".c-datepicker-date-table td.current").removeClass("current");
B.addClass("current");
var E = G.picker.$container.find(".c-datePicker__input-day").val();
if (!E) {
var D = moment().format(G.picker.config.format).split(" ")[1];
G.picker.$container.find(".c-datePicker__input-time").val(D);
A.call(G, F, moment(), moment())
} else {
var C = G.picker.$input.val();
A.call(G, F, moment(t.newDateFixed(G.picker, E)), moment(t.newDateFixed(G.picker, C)))
}
if (!G.picker.hasTime) {
G.picker.datePickerObject.hide("choose")
} else {
t.judgeTimeRange(G.picker, G.picker.$container.find(".c-datePicker__input-day"), G.picker.$container.find(".c-datePicker__input-time"))
}
}
function A(G, B, F) {
var D = this.picker.$container.find(".c-datepicker-date-picker__header-year span").text();
var E = this.picker.$container.find(".c-datepicker-date-picker__header-month span").text() - 1;
val = B.set({
year: D,
month: E,
date: G
}).format(this.picker.config.format.split(" ")[0]);
this.picker.$container.find(".c-datePicker__input-day").val(val);
var C = F.set({
year: D,
month: E,
date: G
}).format(this.picker.config.format);
this.picker.$input.val(C)
}
},
eventRange: function() {
this.picker.$container.on("click", ".c-datepicker-date-table td.available", function(C) {
C.stopPropagation();
var D = g(this);
if (D.hasClass("disabled")) {
return
}
var E = t.getPicker(D, "day");
if (E.picker.isBlur) {
var A = D.parents(".c-datepicker-date-range-picker-panel__wrap");
var B = A.find("td").index(D);
g.sub("datapickerClick", function(F) {
D = A.find("td").eq(B);
o(E, D);
g.unsub("datapickerClick")
});
g.pub("datapickerRenderPicker")
} else {
o(E, D)
}
});
function o(I, D) {
var P = I.picker.$container.find(".c-datepicker-date-range-picker-panel__wrap");
P.find("td.current.hover").removeClass("current hover");
var B = P.find("td.current");
var E = D.parents(".c-datepicker-date-range-picker-panel__wrap");
var F = D.find(".cell").text();
var G = I.picker.$container.find(".c-datePicker__input-day");
var C = I.picker.$container.find(".c-datePicker__input-time");
var K = E.find(".c-datepicker-date-range-picker__header-year span").text();
var J = E.find(".c-datepicker-date-range-picker__header-month span").text() - 1;
if (I.current >= 2) {
B.removeClass("current");
P.find("td.in-range").removeClass("in-range");
B = P.find("td.current");
I.current = 0
}
if (!I.current) {
D.addClass("current");
var A = moment().set({
year: K,
month: J,
date: F
}).format(I.picker.config.format.split(" ")[0]);
G.val(A);
C.eq(0).val(I.picker.timeMin);
C.eq(1).val(I.picker.timeMax);
I.current = 1
} else {
if (I.current == 1) {
D.addClass("current");
var O = G.eq(0).val();
var A = moment().set({
year: K,
month: J,
date: F
}).format(I.picker.config.format.split(" ")[0]);
var M = moment(t.newDateFixed(I.picker, O));
var L = moment(t.newDateFixed(I.picker, A));
if (!I.picker.hasTime) {
if (L.diff(M) < 0) {
var N = A;
A = O;
O = N
}
I.current = 2;
I.picker.$inputBegin.val(O);
I.picker.$inputEnd.val(A);
I.picker.datePickerObject.hide("choose")
} else {
if (L.diff(M) < 0) {
G.eq(0).val(A);
G.eq(1).val(O)
} else {
G.eq(1).val(A)
}
I.current = 2;
I.addRangeClass()
}
}
}
if (I.current) {
var H = I.current - 1;
t.judgeTimeRange(I.picker, I.picker.$container.find(".c-datePicker__input-day").eq(H), I.picker.$container.find(".c-datePicker__input-time").eq(H), H)
}
}
this.picker.$container.on("mouseenter", ".c-datepicker-date-table td.available", function() {
var E = t.getPicker(g(this), "day");
if (E.current != 1) {
return
}
E.picker.$container.find("td.current.hover").removeClass("current hover");
g(this).addClass("current hover");
var I = g(this).parents(".c-datepicker-date-range-picker-panel__wrap");
var A = E.picker.$container.find(".c-datePicker__input-day").eq(0);
var G = I.find(".c-datepicker-date-range-picker__header-year span").text();
var F = I.find(".c-datepicker-date-range-picker__header-month span").text();
var C = g(this).find(".cell").text();
var B = A.val();
var D = G + E.picker.splitStr + F + E.picker.splitStr + C;
if (moment(t.newDateFixed(E.picker, B)).isAfter(t.newDateFixed(E.picker, D))) {
var H = B;
B = D;
D = H
}
E.addRangeClass(moment(t.newDateFixed(E.picker, B)), moment(t.newDateFixed(E.picker, D)), true)
})
},
show: function() {
this.picker.$container.find(".c-datepicker-year-table,.c-datepicker-month-table").hide();
this.picker.$container.find(".c-datepicker-date-table").show()
},
hide: function() {
this.picker.$container.find(".c-datepicker-date-table").hide()
},
render: function(C, D, o, B, A) {
if (this.picker.config.isRange) {
this.renderRange(C, D, o, B, A)
} else {
this.renderSingle(C, D, o, A)
}
},
renderSingle: function(F, G, A, D) {
var C = this.renderHtml(F, G, A);
var o = this.picker.$container.find(".c-datepicker-date-table");
if (o.length && !D) {
this.addCurrentSingle();
this.show()
} else {
var B = this.picker.$container.find(".c-datepicker-picker__content");
var o = this.picker.$container.find(".c-datepicker-date-picker__header-year span");
var E = this.picker.$container.find(".c-datepicker-date-picker__header-month span");
o.text(F);
E.text(G);
if (!B.find(".c-datepicker-date-table").length) {
B.append(C)
} else {
B.find(".c-datepicker-date-table").replaceWith(C)
}
if (!this.picker.$container.data("day")) {
this.picker.$container.data("day", this)
}
this.addCurrentSingle();
this.show();
if (!D) {
this.eventSingle()
}
}
},
addCurrentSingle: function() {
var D = this.picker.$input.val();
if (!D) {
return
}
if (!t.dayReg(this.picker).test(D.split(" ")[0])) {
return
}
var o = t.getTimeFormat(moment(t.newDateFixed(this.picker, D)));
var B = this.picker.$container.find(".c-datepicker-date-picker__header-year span").text();
var C = this.picker.$container.find(".c-datepicker-date-picker__header-month span").text();
if (o.year == B && o.month == C) {
var A = this.picker.$container.find(".c-datepicker-date-table td.available");
A.removeClass("current");
A.eq(o.day - 1).addClass("current")
}
},
renderRange: function(I, G, J, M, H) {
var A = this.picker.$container.find(".c-datepicker-date-table");
if (A.length && !H) {
this.show()
} else {
var F = 0
, o = 1
, N = t.maxMonth
, D = 1;
var C = this.renderHtml(I[F], G[F], false);
var B = G[F] + o;
var L = I[F];
if (N(B)) {
B = D;
L = L + o
}
var K = this.renderHtml(L, B, false);
var A = this.picker.$container.find(".c-datepicker-date-range-picker__header-year");
var E = this.picker.$container.find(".c-datepicker-date-range-picker__header-month");
A.eq(F).find("span").text(I[F]);
E.eq(F).find("span").text(G[F]);
A.eq(1 - F).find("span").text(L);
E.eq(1 - F).find("span").text(B);
this.picker.$container.find(".c-datepicker-picker__content").eq(F).html(C);
this.picker.$container.find(".c-datepicker-picker__content").eq(1 - F).html(K);
if (!this.picker.$container.data("day")) {
this.picker.$container.data("day", this)
}
this.addRangeClass();
if (!H) {
this.eventRange()
}
}
},
prevNextSingle: function(M, H) {
var F = this.picker.$container.find(".c-datepicker-date-picker__header-year");
var E = this.picker.$container.find(".c-datepicker-date-picker__header-month");
var I = Number(F.find("span").text());
var G = Number(E.find("span").text());
var J = this.picker.$container.find(".c-datePicker__input-day").val();
var B = t.getTimeFormat(moment(t.newDateFixed(this.picker, J)));
var D = 1;
if (M === "prev") {
D = -1
}
if (H === "year") {
I = I + D
} else {
if (H === "month") {
G = G + D;
var L = t.fillMonth(G, I);
G = L.month;
I = L.year
}
}
var A = false;
if (B.year == I && B.month == G) {
A = B.day
}
var C = this.renderHtml(I, G, A);
F.find("span").text(I);
E.find("span").text(G);
var o = this.picker.$container.find(".c-datepicker-picker__content");
var K = o.find(".c-datepicker-date-table");
this.picker.$container.find(".c-datepicker-month-table,.c-datepicker-year-table").hide();
if (K.length) {
K.replaceWith(C)
} else {
o.append(C)
}
},
prevNextRender: function(L, G) {
var E = this.picker.$container.find(".c-datepicker-date-range-picker__header-year");
var D = this.picker.$container.find(".c-datepicker-date-range-picker__header-month");
var H = Number(E.eq(0).find("span").text());
var F = Number(D.eq(0).find("span").text());
var C = 1;
var J, B;
if (L === "prev") {
C = -1
}
if (G === "year") {
H = H + C
} else {
if (G === "month") {
F = F + C
}
}
var K = t.fillMonth(F, H);
F = K.month;
H = K.year;
B = F + 1;
var o = t.fillMonth(B, H);
B = o.month;
J = o.year;
var A = this.renderHtml(H, F, false);
var I = this.renderHtml(J, B, false);
E.eq(0).find("span").text(H);
D.eq(0).find("span").text(F);
E.eq(1).find("span").text(J);
D.eq(1).find("span").text(B);
this.picker.$container.find(".c-datepicker-picker__content").eq(0).html(A);
this.picker.$container.find(".c-datepicker-picker__content").eq(1).html(I);
this.addRangeClass(false, false, true)
},
renderHtml: function(K, ac, X) {
var I = moment();
ac = ac || I.month() + 1;
K = K || I.year();
var Z = (I.month() + 1 === ac) && (I.year() === K) ? I.date() : "";
var L = t.getMonthDay(ac - 1, K);
var T = t.getMonthDay(ac, K);
var E = moment().set({
year: K,
month: ac - 1,
date: 1
}).weekday();
var F = moment().set({
year: K,
month: ac - 1,
date: T
}).weekday();
var ab = g.fn.datePicker.dates[this.picker.language];
var J = k.dayHeader(ab);
var R = 1;
var Y = "";
var H = 0;
if (E != 0) {
for (var O = E - 1; O >= 0; O--) {
var A = "prev-month";
Y += k.tdTpl(A, L - O);
if ((E - O) % 7 === 0) {
J += "<tr>" + Y + "</tr>";
Y = "";
H += 1
}
}
}
var aa = E % 7;
var Q = this.picker.minJson ? true : false;
var S = this.picker.maxJson ? true : false;
var V = Q ? moment(t.newDateFixed(this.picker, this.picker.minJson.year + this.picker.splitStr + this.picker.minJson.month + this.picker.splitStr + 1)) : false;
var o = S ? moment(t.newDateFixed(this.picker, this.picker.maxJson.year + this.picker.splitStr + this.picker.maxJson.month + this.picker.splitStr + 1)) : false;
var W = "";
var U = false;
var N = moment(t.newDateFixed(this.picker, K + this.picker.splitStr + ac + this.picker.splitStr + 1));
if ((Q && N.isBefore(V)) || (S && N.isAfter(o))) {
W = " disabled"
} else {
if ((Q && N.isSame(V)) || (S && N.isSame(o))) {
U = true;
var M, D;
if (Q && S && o.isSame(V)) {
M = this.picker.minJson.day;
D = this.picker.maxJson.day
} else {
if (Q && N.isSame(V)) {
M = this.picker.minJson.day;
D = 32
} else {
if (S && N.isSame(o)) {
M = 0;
D = this.picker.maxJson.day
}
}
}
}
}
for (var G = 0; G < T; G++) {
var A = "available" + W;
var C = R + G;
if (C === Z) {
A += " today"
}
if (C === X) {
A += " current"
}
if (U && (C < M || C > D)) {
A += " disabled"
}
Y += k.tdTpl(A, C);
if ((aa + G + 1) % 7 === 0) {
J += "<tr>" + Y + "</tr>";
Y = "";
if (G != (T - 1)) {
H += 1
}
}
}
aa = (E + T) % 7;
var B = (6 - H - 1) * 7 + (6 - F);
for (var P = 0; P < B; P++) {
var A = "next-month";
Y += k.tdTpl(A, 1 + P);
if ((aa + P + 1) % 7 === 0) {
J += "<tr>" + Y + "</tr>";
Y = ""
}
}
J = k.tableTpl("c-datepicker-date-table", J);
return J
},
addRangeClass: function(G, Z, o) {
var S = this.picker.$container.find(".c-datepicker-date-range-picker-panel__wrap");
S.find("td.available").removeClass("in-range start-date end-date");
var O = this.picker.$container.find(".c-datePicker__input-day");
var J = this.picker.$container.find(".c-datepicker-date-range-picker__header-year");
var Q = this.picker.$container.find(".c-datepicker-date-range-picker__header-month");
var F = G || O.eq(0).val();
var D = Z || O.eq(1).val();
if (!F || !D) {
return
}
if (!o) {
this.current = 2
}
var M = G || moment(t.newDateFixed(this.picker, O.eq(0).val()));
var aa = Z || moment(t.newDateFixed(this.picker, O.eq(1).val()));
var T = J.eq(0).find("span").text();
var K = J.eq(1).find("span").text();
var X = Q.eq(0).find("span").text();
var U = Q.eq(1).find("span").text();
var B = T + this.picker.splitStr + X + this.picker.splitStr + 1;
var E = K + this.picker.splitStr + U + this.picker.splitStr + t.getMonthDay(U, K);
var Y = !(M.isBefore(t.newDateFixed(this.picker, B)) || M.isAfter(t.newDateFixed(this.picker, E)));
var L = !(aa.isBefore(t.newDateFixed(this.picker, B)) || aa.isAfter(t.newDateFixed(this.picker, E)));
var I;
var ab = M.isBefore(t.newDateFixed(this.picker, B)) && M.isBefore(t.newDateFixed(this.picker, E)) && aa.isBefore(t.newDateFixed(this.picker, B)) && aa.isBefore(t.newDateFixed(this.picker, E));
var H = M.isAfter(t.newDateFixed(this.picker, B)) && M.isAfter(t.newDateFixed(this.picker, E)) && aa.isAfter(t.newDateFixed(this.picker, B)) && aa.isAfter(t.newDateFixed(this.picker, E));
if (H || ab) {
return
}
if (Y) {
I = (M.month() + 1) == X ? 0 : 1;
S.eq(I).find("td.available").eq(M.date() - 1).addClass("current start-date")
}
if (L) {
I = (aa.month() + 1) == X ? 0 : 1;
S.eq(I).find("td.available").eq(aa.date() - 1).addClass("current end-date")
}
var C = S.find("td.current");
var W = S.find(".start-date");
var R = S.find(".end-date");
C.addClass("in-range");
if (W.is(R)) {
W.addClass("in-range");
return
} else {
if (C.length === 2) {
var N = W.parents("tr");
var V = R.parents("tr");
if (W.parents(".c-datepicker-date-range-picker-panel__wrap").is(R.parents(".c-datepicker-date-range-picker-panel__wrap"))) {
if (N.is(V)) {
var A = W.nextAll("td.available");
A.each(function(ad, ac) {
g(ac).addClass("in-range");
if (g(ac).is(R)) {
return false
}
});
return
}
W.nextAll("td.available").addClass("in-range");
R.prevAll("td.available").addClass("in-range");
var P = N.nextAll("tr");
var V = V.prev("tr");
if (N.is(V)) {
return
}
P.each(function(ac, ad) {
g(ad).find("td.available").addClass("in-range");
if (g(ad).is(V)) {
return false
}
});
return
}
W.nextAll("td.available").addClass("in-range");
R.prevAll("td.available").addClass("in-range");
N.nextAll("tr").find("td.available").addClass("in-range");
V.prevAll("tr").find("td.available").addClass("in-range")
} else {
if (W.length) {
var N = W.parents("tr");
W.nextAll("td.available").addClass("in-range");
N.nextAll("tr").find("td.available").addClass("in-range");
if (I === 0) {
S.eq(1).find("td.available").addClass("in-range")
}
} else {
if (R.length) {
var V = R.parents("tr");
R.prevAll("td.available").addClass("in-range");
V.prevAll("tr").find("td.available").addClass("in-range");
if (I === 1) {
S.eq(0).find("td.available").addClass("in-range")
}
} else {
S.find("td.available").addClass("in-range")
}
}
}
}
}
});
function m(o) {
this.picker = o;
this.init()
}
g.extend(m.prototype, {
init: function() {},
event: function() {
this.picker.$container.on("click", ".c-datepicker-time-panel__btn.cancel", function() {
var D = t.getPicker(g(this), "time");
var C = D.picker.activeTimeWrap.find(".c-datePicker__input-time");
var B = D.picker.$container.find(".c-datePicker__input-time").index(C);
if (!D.picker.config.isRange) {
var A = D.picker.$container.find(".c-datePicker__input-day").eq(B).val();
D.picker.$input.val(A + " " + D.prevValue)
}
D.picker.$container.find(".c-datePicker__input-time").eq(B).val(D.prevValue);
D.hide()
});
this.picker.$container.on("click", ".c-datepicker-time-panel__btn.confirm", function() {
var A = t.getPicker(g(this), "time");
A.hide()
});
this.picker.$container.on("click", ".c-datepicker-time-panel__btn.min", function() {
var A = t.getPicker(g(this), "time");
A.updateTimeInput(A.picker.timeMin)
});
this.picker.$container.on("click", ".c-datepicker-time-panel__btn.max", function() {
var A = t.getPicker(g(this), "time");
A.updateTimeInput(A.picker.timeMax)
});
this.picker.$container.on("click", function() {
var A = g(this).data("time");
A.hide()
});
var o = {
timer0: "",
timer1: "",
timer2: ""
};
this.picker.$container.find(".c-datepicker-scrollbar__wrap").scroll(function() {
var B = t.getPicker(g(this), "time");
var A = B.picker.$container.find(".c-datepicker-scrollbar__wrap").index(g(this));
clearTimeout(o["timer" + A]);
o["timer" + A] = setTimeout(function() {
var H = g(this).scrollTop();
var F = Math.round(H / 32);
var C = g(this).find("li").length - 1;
if (F >= C) {
F = C
}
H = F * 32;
g(this).scrollTop(H);
var E = B.picker.activeTimeWrap.find(".c-datepicker-scrollbar__wrap").index(g(this));
var G = B.picker.activeTimeWrap.find(".c-datePicker__input-time");
var D = B.picker.activeTimeWrap.find(".c-datePicker__input-day").val();
var I = G.val();
I = I.split(":");
I[E] = t.fillTime(F);
I = I.join(":");
G.val(I);
if (!B.picker.config.isRange) {
B.picker.$input.val(D + " " + I)
}
}
.bind(this), 100)
})
},
updateTimeInput: function(A) {
this.picker.activeTimeWrap.find(".c-datePicker__input-time").val(A);
if (!this.picker.config.isRange) {
var o = this.picker.$input.val().split(" ")[0];
this.picker.$input.val(o + " " + A)
}
},
updateTimePanel: function(B) {
var A = this.picker.activeTimeWrap.find(".c-datepicker-scrollbar__wrap");
var F = this.picker.activeTimeWrap.find(".c-datePicker__input-time").val();
var E = this.picker.config.format.split(" ")[1];
var o = E.replace(/HH/, "[0-9]{2}").replace(/(mm|ss)/g, "[0-9]{2}");
var D = new RegExp("^" + o + "$");
var C = D.test(F);
if (C) {
if (B) {
this.prevValue = F
}
F = F.split(":");
g.each(A, function(G, H) {
g(H).scrollTop(Number(F[G]) * 32).addClass("active")
})
}
return C
},
show: function() {
this.picker.activeTimeWrap.find(".c-datepicker-time-panel").show();
this.updateTimePanel(true)
},
hide: function() {
this.picker.$container.find(".c-datepicker-time-panel").hide()
},
render: function(B, o, C, A) {
if (this.picker.config.isRange) {
this.renderRange(B, o, C, A)
} else {
this.renderSingle(B, o, C, A)
}
},
renderSingle: function(D, o, E, A) {
var C = this.renderHtml(D, o, E, A);
var B = this.picker.activeTimeWrap.find(".c-datepicker-time-panel");
if (!B.length) {
this.picker.activeTimeWrap.find(".c-datepicker-date-picker__editor-wrap").eq(1).append(C);
this.picker.$container.data("time", this);
this.event();
this.show()
} else {
this.show()
}
},
renderRange: function(E, o, F, B) {
var D = this.renderHtml(E, o, F, B);
var C = this.picker.activeTimeWrap.find(".c-datepicker-time-panel");
if (!C.length) {
var A = this.picker.$container.find(".c-datepicker-date-range-picker__time-content");
A.eq(0).find(".c-datepicker-date-range-picker__editor-wrap").eq(1).append(D);
A.eq(1).find(".c-datepicker-date-range-picker__editor-wrap").eq(1).append(D);
this.picker.$container.find(".c-datepicker-time-panel").hide();
this.picker.$container.data("time", this);
this.event();
this.show()
} else {
this.show()
}
},
renderHtml: function(I, C, A, o) {
C = C || moment().hour();
A = A || moment().minute();
o = o || moment().second();
var J = "";
var F = "";
if (I[0]) {
for (var E = 0; E < 24; E++) {
var G = C === E ? "active" : "";
J += k.timeLiTpl(G, t.fillTime(E))
}
F += k.timeTpl("hour", J);
J = ""
}
if (I[1]) {
for (var D = 0; D < 60; D++) {
var G = A === D ? "active" : "";
J += k.timeLiTpl(G, t.fillTime(D))
}
F += k.timeTpl("minute", J);
J = ""
}
if (I[2]) {
for (var B = 0; B < 60; B++) {
var G = o === B ? "active" : "";
J += k.timeLiTpl(G, t.fillTime(B))
}
F += k.timeTpl("second", J)
}
var H = g.fn.datePicker.dates[this.picker.language];
F = k.timeMainTpl(H, F);
return F
}
});
var x = {
getPanelVal: function(C, A) {
var o = C.find(".c-datepicker-time-spinner__wrapper");
var B = new Array(3);
o.each(function(D, E) {
if (D !== A) {
var F = g(E).find(".c-datepicker-scrollbar__wrap").scrollTop();
B[D] = t.fillTime(Math.round(F / 32))
}
});
return B
},
getType: function(o) {
return o === 0 ? "configBegin" : o === 1 ? "configEnd" : "configMinMax"
},
checkMinMaxGetVal: function(G, D, E) {
var B = D.join(":");
var C = x.getType(E);
var A = t.countSecond(D);
var o = G[C].minSecond;
var F = G[C].maxSecond;
if (A < o) {
val = G[C].minVal
} else {
if (A > F) {
val = G[C].maxVal
} else {
val = B
}
}
return val
}
};
function h(o) {
this.picker = o
}
g.extend(h.prototype, {
event: function() {
this.picker.$container.on("click", ".c-datepicker-time-panel__btn.cancel", function() {
var A = t.getPicker(g(this), "time");
A.picker.$input.val(A.prevValue);
A.picker.datePickerObject.hide("confirm")
});
this.picker.$container.on("click", ".c-datepicker-time-panel__btn.confirm", function() {
var A = t.getPicker(g(this), "time");
A.picker.datePickerObject.hide("confirm")
});
this.picker.$container.on("click", ".c-datepicker-time-panel__btn.min", function() {
var A = t.getPicker(g(this), "time");
A.updateTimeInput(A.picker.timeMin, g(this))
});
this.picker.$container.on("click", ".c-datepicker-time-panel__btn.max", function() {
var A = t.getPicker(g(this), "time");
A.updateTimeInput(A.picker.timeMax, g(this))
});
var o = {
timer0: "",
timer1: "",
timer2: ""
};
this.picker.$container.find(".c-datepicker-scrollbar__wrap").scroll(function() {
var F = t.getPicker(g(this), "time");
var B = F.picker.config;
var E = g(this).parents(".c-datepicker-date-picker__onlyTime-content");
var D = F.picker.$container.find(".c-datepicker-date-picker__onlyTime-content").index(E);
var A = E.find(".c-datepicker-scrollbar__wrap").index(g(this));
var C = x.getPanelVal(E, A);
clearTimeout(o["timer" + A]);
o["timer" + A] = setTimeout(function() {
var M = g(this).scrollTop();
var H = Math.round(M / 32);
var G = g(this).find("li").length - 1;
if (H >= G) {
H = G
}
M = H * 32;
g(this).scrollTop(M);
var K = F.picker.$input.eq(D);
C[A] = t.fillTime(H);
var J = C.join(":");
var N = x.checkMinMaxGetVal(F.picker, C, D);
K.val(N);
F.setMinMaxHour(D);
F.setMinMaxDisabled(J, D);
if (B.isRange) {
var I = F.picker.$container.find(".c-datepicker-date-picker__onlyTime-content").eq(1 - D);
var L = x.getPanelVal(I).join(":");
F.updateRange(D, C);
F.setMinMaxHour(1 - D);
F.setMinMaxDisabled(L, 1 - D)
}
}
.bind(this), 100)
})
},
updateRange: function(C, B) {
var E = this.picker;
var A = E.configMinMax;
var o = t.countSecond(B);
var D = function(F) {
return {
hour: F[0],
minute: F[1],
second: F[2]
}
};
if (C === 0 && o > A.minSecond) {
E.configEnd.min = D(B);
E.configEnd.minVal = B.join(":");
E.configEnd.minSecond = t.countSecond(B)
} else {
if (C === 1 && o < A.maxSecond) {
E.configBegin.max = D(B);
E.configBegin.maxVal = B.join(":");
E.configBegin.maxSecond = t.countSecond(B)
}
}
},
updateTimeInput: function(C, B) {
if (this.picker.config.isRange) {
var A = B.parents(".c-datepicker-time-panel");
var o = this.picker.$container.find(".c-datepicker-time-panel").index(A);
this.picker.$input.eq(o).val(C);
this.updateTimePanel()
} else {
this.picker.$input.val(C);
this.picker.datePickerObject.hide("confirm")
}
},
updateTimePanel: function(B) {
var E = this;
var D = this.picker.config.format;
var A = D.replace(/HH/, "[0-9]{2}").replace(/(mm|ss)/g, "[0-9]{2}");
var C = new RegExp("^" + A + "$");
var o = this.picker.$container.find(".c-datepicker-time-panel");
o.each(function(G, J) {
var F = g(J).find(".c-datepicker-scrollbar__wrap");
var I = E.picker.$input.eq(G).val();
var H = C.test(I);
if (H) {
I = I.split(":");
g.each(F, function(K, L) {
g(L).scrollTop(Number(I[K]) * 32).addClass("active")
})
}
})
},
show: function() {
this.picker.$container.find(".c-datepicker-time-panel").show();
this.updateTimePanel(true)
},
hide: function() {
this.picker.$container.find(".c-datepicker-time-panel").hide()
},
render: function(B, o, C, A) {
if (this.picker.config.isRange) {
this.renderRange(B, o, C, A);
this.picker.$container.find(".c-datepicker-time-panel__btn.cancel,.c-datepicker-time-panel__btn.confirm").remove()
} else {
this.renderSingle(B, o, C, A)
}
},
renderSingle: function(C) {
var o = this.picker.$input.val();
this.prevValue = o;
var D = o ? o.split(":") : t.getOnlyTimeFormat(moment());
this.picker.$input.val(t.getConcatTime(D[0], D[1], D[2]));
var B = this.picker.$container.find(".c-datepicker-time-panel");
if (!B.length) {
var A = p.renderTimePanelHtml(this.picker, C, D[0], D[1], D[2]);
this.picker.$container.find(".c-datepicker-date-picker__editor-wrap").append(A);
this.picker.$container.data("time", this);
this.setMinMaxHour();
this.event();
this.show()
} else {
this.show()
}
},
renderRange: function (event) {
var B = this.picker.$inputBegin.val();
var H = this.picker.$inputEnd.val();
this.prevValue = B + "," + H;
var G = B ? B.split(":") : t.getOnlyTimeFormat(moment());
var F = H ? H.split(":") : t.getOnlyTimeFormat(moment());
this.picker.$inputBegin.val(t.getConcatTime(G[0], G[1], G[2]));
this.picker.$inputEnd.val(t.getConcatTime(F[0], F[1], F[2]));
var A = this.picker.$container.find(".c-datepicker-time-panel");
if (!A.length) {
var D = p.renderTimePanelHtml(this.picker, E, G[0], G[1], G[2]);
var C = p.renderTimePanelHtml(this.picker, E, F[0], F[1], F[2]);
var o = this.picker.$container.find(".c-datepicker-date-range-picker__time-content");
o.eq(0).find(".c-datepicker-date-range-picker__editor-wrap").append(D);
o.eq(1).find(".c-datepicker-date-range-picker__editor-wrap").append(C);
this.picker.$container.data("time", this);
this.setMinMaxHour();
this.event();
this.show()
} else {
this.show()
}
},
setMinMaxHour: function(C) {
var E = this.picker;
if (!E.configMinMax.hasMinMax) {
return
}
var D = E.$container.find(".c-datepicker-time-panel");
if (C >= 0) {
D = D.eq(C)
}
var A = x.getType(C);
var o = E[A].max.hour;
var B = E[A].min.hour;
D.find(".c-datepicker-time-spinner__item").removeClass("disabled");
D.each(function(G, H) {
var F = g(H).find(".c-datepicker-scrollbar__wrap").eq(0);
F.find(".c-datepicker-time-spinner__item").each(function(I, J) {
if ((B && I < B) || (o && I > o)) {
g(J).addClass("disabled")
}
})
})
},
setMinMaxDisabled: function(H, M) {
var G = this.picker;
var D = G.configMinMax.hasMinMax;
if (!H || !D) {
return
}
var C = function(O) {
O.addClass("disabled")
};
var L = G.$container.find(".c-datepicker-time-panel").eq(M);
var N = L.find(".c-datepicker-scrollbar__wrap");
var J = N.eq(1);
var F = N.eq(2);
var E = J.find(".c-datepicker-time-spinner__item");
var I = M === 0 ? "configBegin" : "configEnd";
var o = G[I].min;
var K = G[I].max;
var B = H.split(":");
B = [Number(B[0]), Number(B[1]), Number(B[2])];
N.each(function(P, O) {
if (P !== 0) {
g(O).find(".c-datepicker-time-spinner__item").removeClass("disabled")
}
});
if ((!o.hour || B[0] > o.hour) && (!K.hour || B[0] < K.hour)) {
return
}
if ((o.hour && B[0] < o.hour) || (K.hour && B[0] > K.hour)) {
N.each(function(P, O) {
if (P !== 0) {
C(g(O).find(".c-datepicker-time-spinner__item"))
}
})
} else {
if (B[0] === o.hour) {
E.each(function(O, P) {
if (O < o.minute) {
C(g(P))
}
});
var A = F.find(".c-datepicker-time-spinner__item");
if (B[1] < o.minute) {
C(A);
return
}
if (B[1] > o.minute) {
return
}
if (B[1] === o.minute) {
A.each(function(O, P) {
if (O < o.second) {
C(g(P))
}
});
return
}
} else {
if (B[0] === K.hour) {
E.each(function(O, P) {
if (O > K.minute) {
C(g(P))
}
});
var A = F.find(".c-datepicker-time-spinner__item");
if (B[1] > K.minute) {
C(A);
return
}
if (B[1] < K.minute) {
return
}
if (B[1] === K.minute) {
A.each(function(O, P) {
if (O > K.second) {
C(g(P))
}
});
return
}
}
}
}
}
});
g("body").on("click.datePicker", function() {
g(".c-datepicker-picker").each(function(A, o) {
var B = g(o).data("picker");
if (g(o).css("display") === "block") {
if (B.config.isRange && (!B.$inputBegin.val() && !B.$inputEnd.val())) {
g(o).find("td.available").removeClass("current in-range")
}
if (B.hasTime) {
g(o).find(".c-datepicker-time-panel").hide()
}
if (B.onlyTime) {
B.datePickerObject.fixedInputValOnlyTime()
} else {
B.datePickerObject.fixedInputVal()
}
B.$container.data("isShow", false);
B.config.hide.call(B, "clickBody");
B.datePickerObject.betweenHandle()
}
});
g(".c-datepicker-picker").hide()
});
g(".c-datepicker-box").scroll(d);
function d() {
g(".c-datepicker-picker").each(function(A, o) {
var B = g(o).data("picker");
if (g(o).css("display") === "block") {
i(B.datePickerObject)
}
})
}
var p = {
initShowObject: function(G, F) {
var C, D, A, E, o;
if (G.config.isRange) {
G.fillDefault();
A = [F[0].year, F[1].year];
E = [F[0].month, F[1].month];
o = [F[0].day, F[1].day];
C = F[0].year;
D = F[0].month
} else {
var B = G.$input.val();
C = F.year;
D = F.month;
A = C;
E = D;
o = B ? F.day : false;
if (G.params.format[0]) {
G.yearObject = new v(G);
if (!G.params.format[2] && !G.params.format[1]) {
G.yearObject.render(C)
}
}
if (G.params.format[1]) {
G.monthObject = new e(G);
if (!G.params.format[2]) {
G.$container.find(".c-datepicker-date-picker__prev-btn.month,.c-datepicker-date-picker__next-btn.month").hide();
G.monthObject.render(D)
}
}
}
if (G.params.format[2]) {
G.dayObject = new b(G);
G.dayObject.render(A, E, o)
}
if (G.params.format[3] || G.params.format[4] || G.params.format[5]) {
G.timeObject = new m(G)
}
},
initParams: function(o) {
o.splitStr = o.config.format.replace(/[YMDhms:\s]/g, "").split("")[0];
o.params.format = t.getFormat(o.config.format);
o.minJson = o.config.min ? t.getTimeFormat(moment(t.newDateFixed(o, o.config.min))) : false;
o.maxJson = o.config.max ? t.getTimeFormat(moment(t.newDateFixed(o, o.config.max))) : false
},
renderPicker: function(o, B) {
var A = t.getPicker(g(o));
if (A.config.isRange) {
p.renderPickerRange(o, B)
} else {
p.renderPickerSingle(o, B)
}
},
renderPickerRange: function(R, M) {
var K = t.getPicker(g(R));
var U = R.value;
var L = K.config.format.split(" ")[0];
var N = L.replace(/YYYY/, "[0-9]{4}").replace(/(MM|DD)/g, "[0-9]{2}");
var C = new RegExp("^" + N + "$");
if (C.test(U)) {
var I = K.$container.find(".c-datePicker__input-day");
var o = K.$container.find(".c-datePicker__input-time");
var D = I.index(g(R));
var T = D === 1;
var G = I.eq(1 - D).val();
var E = moment(t.newDateFixed(K, U));
var B = moment(t.newDateFixed(K, G));
var J = D === 0 ? E.isAfter(B) : E.isBefore(B);
if (J) {
var O = U;
U = G;
G = O;
E = moment(t.newDateFixed(K, U));
B = moment(t.newDateFixed(K, G));
I.eq(D).val(U);
I.eq(1 - D).val(G)
}
if (K.hasTime && !M) {
o.eq(0).val(K.timeMin);
o.eq(1).val(K.timeMax)
}
var P = t.getTimeFormat(B);
var H = t.getTimeFormat(E);
var S = t.minMaxFill(K, H, D);
H = S.result;
R.value = S.val;
var F = []
, A = []
, Q = [];
F[D] = H.year;
A[D] = H.month;
Q[D] = H.day;
F[1 - D] = P.year;
A[1 - D] = P.month;
Q[1 - D] = P.day;
K.dayObject.renderRange(F, A, Q, T, true)
}
},
renderPickerSingle: function(F) {
var E = t.getPicker(g(F));
var C = F.value;
var H = E.config.format.split(" ")[0];
var A = H.replace(/YYYY/, "[0-9]{4}").replace(/(MM|DD)/g, "[0-9]{2}");
var B = new RegExp("^" + A + "$");
if (B.test(C)) {
var o = E.$container.find(".c-datePicker__input-time");
var D = moment(t.newDateFixed(E, C));
var I = t.getTimeFormat(D);
var G = t.minMaxFill(E, I, 0);
I = G.result;
C = G.val;
F.value = C;
if (E.hasTime) {
C += " " + o.val()
}
E.$input.val(C);
E.dayObject.renderSingle(I.year, I.month, I.day, true)
}
},
cancelBlur: function(o) {
g.unsub("datapickerRenderPicker");
o.isBlur = false
},
renderTimePanelHtml: function(G, J, C, A, o) {
C = C || moment().hour();
A = A || moment().minute();
o = o || moment().second();
var K = "";
var F = "";
if (J[0]) {
for (var E = 0; E < 24; E++) {
var H = C === E ? "active" : "";
K += k.timeLiTpl(H, t.fillTime(E))
}
F += k.timeTpl("hour", K);
K = ""
}
if (J[1]) {
for (var D = 0; D < 60; D++) {
var H = A === D ? "active" : "";
K += k.timeLiTpl(H, t.fillTime(D))
}
F += k.timeTpl("minute", K);
K = ""
}
if (J[2]) {
for (var B = 0; B < 60; B++) {
var H = o === B ? "active" : "";
K += k.timeLiTpl(H, t.fillTime(B))
}
F += k.timeTpl("second", K)
}
var I = g.fn.datePicker.dates[G.language];
F = k.timeMainTpl(I, F);
return F
},
setInitVal: function(o) {
o.params.initBeginVal = o.$inputBegin.val();
o.params.initEndVal = o.$inputEnd.val()
}
};
function q(o) {
this.datePickerObject = o;
this.datePickerObject.pickerObject = null;
this.$input = o.$target.find("input");
this.config = o.config;
this.params = {};
this.language = this.config.language || "zh-CN";
this.hasTime = this.config.format.split(" ").length > 1;
if (this.hasTime) {
this.timeMin = t.timeVal(this, "min");
this.timeMax = t.timeVal(this, "max")
}
this.init()
}
g.extend(q.prototype, {
init: function() {
this.initShow();
this.event()
},
initShow: function() {
p.initParams(this);
this.params.isYear = this.params.format[0] && !this.params.format[1];
this.params.isMonth = this.params.format[0] && this.params.format[1] && !this.params.format[2];
var I = "";
var A = this.$input.val();
var J = A ? moment(t.newDateFixed(this, A)) : moment();
var G = t.getTimeFormat(J);
var o = "";
var F = "";
var H = "";
if (this.params.format[3] || this.params.format[4] || this.params.format[5]) {
H = "has-time"
}
if (this.config.hasShortcut) {
F = "has-sidebar";
o = l(this)
}
var E = g.fn.datePicker.dates[this.language];
var C = k.datePickerMainTpl(E);
if (this.params.isYear || this.params.isMonth) {
C = C.replace(/{{footerButton}}/g, k.pickerFooterClearButton(E))
} else {
C = C.replace(/{{footerButton}}/g, k.pickerFooterNowButton(E))
}
var D = g(C.replace(/{{table}}/g, I).replace(/{{year}}/g, G.year).replace(/{{month}}/g, G.month).replace("{{sidebar}}", o).replace("{{hasTime}}", H).replace("{{hasSidebar}}", F));
g("body").append(D);
this.$container = D;
this.$container.data("picker", this);
this.$container.addClass("is-" + this.language);
if (!this.hasTime) {
this.$container.find(".c-datepicker-date-picker__time-header").hide()
}
p.initShowObject(this, G);
var B = this.$input.val().split(" ");
this.$container.find(".c-datePicker__input-day").val(B[0]);
this.$container.find(".c-datePicker__input-time").val(B[1]);
if (r(this).type !== "active") {
this.$container.find(".c-datepicker-picker__btn-now").remove()
}
},
event: function() {
if (this.hasTime) {
this.eventHasTime()
}
this.datePickerObject.$target.on("click", function(A) {
A.stopPropagation()
});
this.$container.on("click", function(A) {
A.stopPropagation()
});
this.$container.on("click", ".c-datepicker-date-picker__header-year", function(A) {
A.stopPropagation();
var C = t.getPicker(g(this));
if (C.isBlur) {
p.cancelBlur(C)
}
if (g(this).hasClass("disabled")) {
return
}
var B = C.$input.val();
if (!B) {
B = moment()
} else {
B = moment(t.newDateFixed(C, B))
}
C.yearObject.render(B.year())
});
this.$container.on("click", ".c-datepicker-date-picker__header-month", function(A) {
A.stopPropagation();
var C = t.getPicker(g(this));
if (C.isBlur) {
p.cancelBlur(C)
}
if (g(this).hasClass("disabled")) {
return
}
var B = C.$input.val();
if (!B) {
B = moment()
} else {
B = moment(t.newDateFixed(C, B))
}
C.monthObject.render(B.month() + 1)
});
this.$container.on("click", ".c-datepicker-date-picker__next-btn.month", function(A) {
A.stopPropagation();
var B = t.getPicker(g(this));
o(B, "next", "month")
});
this.$container.on("click", ".c-datepicker-date-picker__prev-btn.month", function(A) {
A.stopPropagation();
var B = t.getPicker(g(this));
o(B, "prev", "month")
});
this.$container.on("click", ".c-datepicker-date-picker__next-btn.year", function(C) {
C.stopPropagation();
var D = t.getPicker(g(this));
if (g(this).hasClass("is-year")) {
var B = Number(D.$container.find(".c-datepicker-year-table td.available").first().find(".cell").text()) + 10;
D.yearObject.render(B)
} else {
if (g(this).hasClass("is-month")) {
var A = D.$container.find(".c-datepicker-date-picker__header-year span");
A.text(Number(A.text()) + 1);
D.monthObject.render()
} else {
o(D, "next", "year")
}
}
});
this.$container.on("click", ".c-datepicker-date-picker__prev-btn.year", function(C) {
C.stopPropagation();
var D = t.getPicker(g(this));
if (g(this).hasClass("is-year")) {
var B = Number(D.$container.find(".c-datepicker-year-table td.available").first().find(".cell").text()) - 10;
D.yearObject.render(B)
} else {
if (g(this).hasClass("is-month")) {
var A = D.$container.find(".c-datepicker-date-picker__header-year span");
A.text(Number(A.text()) - 1);
D.monthObject.render()
} else {
o(D, "prev", "year")
}
}
});
function o(C, A, B) {
if (C.isBlur) {
C.dayObject.prevNextSingle(A, B);
g.unsub("datapickerRenderPicker");
C.isBlur = false
} else {
C.dayObject.prevNextSingle(A, B)
}
}
this.$container.on("click", ".c-datepicker-picker__btn-now", function() {
var A = t.getPicker(g(this));
c(A, moment().format(A.config.format));
A.datePickerObject.hide("shortcut")
});
this.$container.on("click", ".c-datepicker-picker__btn-clear", function() {
var A = t.getPicker(g(this));
A.clear()
});
this.$container.on("click", ".c-datepicker-picker__shortcut", function() {
var D = t.getPicker(g(this));
var B = g(this).data("value");
var A = moment().add(B, "day").format(D.config.format);
if (D.hasTime) {
var C = g(this).data("time");
if (C) {
A = A.split(" ")[0] + " " + C
}
}
c(D, A);
D.datePickerObject.hide("shortcut")
});
this.$container.on("click", ".c-datepicker-picker__link-btn.confirm", function() {
var B = t.getPicker(g(this));
if (!B.$input.val()) {
var A = r(B).value;
c(B, A)
}
B.datePickerObject.hide("confirm")
})
},
eventHasTime: function() {
this.$container.on("keyup", ".c-datePicker__input-time", function() {
var C = t.getPicker(g(this));
var A = C.timeObject.updateTimePanel();
if (A) {
var B = this.value;
var o = C.$container.find(".c-datePicker__input-day").val();
C.$input.val(o + " " + B)
}
});
this.$container.on("click", ".c-datePicker__input-time", function(o) {
o.stopPropagation()
});
this.$container.on("keyup", ".c-datePicker__input-day", function() {
p.renderPickerSingle(this)
});
this.$container.on("blur", ".c-datePicker__input-day", function(o) {
var A = t.getPicker(g(this));
a(A, g(this));
t.judgeTimeRange(A, g(this), A.$container.find(".c-datePicker__input-time"))
});
this.$container.on("blur", ".c-datePicker__input-time", function(o) {
var A = t.getPicker(g(this));
n(A, g(this));
t.judgeTimeRange(A, A.$container.find(".c-datePicker__input-day"), g(this))
});
this.$container.on("focus", ".c-datePicker__input-time", function(A) {
A.stopPropagation();
var C = t.getPicker(g(this));
if (!C.$input.val() && !this.value) {
var o = moment().format(C.config.format);
C.$input.val(o);
o = o.split(" ");
C.$container.find(".c-datePicker__input-day").val(o[0]);
g(this).val(o[1])
}
C.activeTimeWrap = g(this).parents(".c-datepicker-date-picker__time-header");
var B = this.value.split(":");
C.showTimeSelect(B[0], B[1], B[2])
});
this.$container.on("focus", ".c-datePicker__input-day", function() {
var A = t.getPicker(g(this));
if (!A.$input.val()) {
var o = moment().format(A.config.format).split(" ");
g(this).val(o[0]);
if (o.length > 1) {
A.$container.find(".c-datePicker__input-time").val(o[1])
}
}
})
},
clear: function() {
this.$input.val("");
this.$container.find("td.available").removeClass("current")
},
show: function() {
if (this.params.format[2]) {
var o = t.getRangeTimeFormat(this, this.$input);
this.dayObject.render(o.year, o.month, o.day, true)
}
this.$container.show()
},
reRenderDay: function() {
if (this.params.format[2]) {
var o = t.getRangeTimeFormat(this, this.$input);
var A = this.$input.val() ? o.day : false;
this.dayObject.render(o.year, o.month, A, true)
}
},
renderYear: function() {
this.yearObject.render()
},
renderMonth: function() {
this.monthObject.render()
},
showTimeSelect: function(A, B, o) {
if (this.params.format[3] || this.params.format[4] || this.params.format[5]) {
this.timeObject.render(this.params.format.slice(3), A, B, o)
}
}
});
function j(o) {
this.datePickerObject = o;
this.datePickerObject.pickerObject = null;
this.$input = o.$target.find("input");
this.$inputBegin = this.$input.eq(0);
this.$inputEnd = this.$input.eq(1);
this.config = o.config;
this.params = {};
this.language = this.config.language || "zh-CN";
this.hasTime = this.config.format.split(" ").length > 1;
if (this.hasTime) {
this.timeMin = t.timeVal(this, "min");
this.timeMax = t.timeVal(this, "max")
}
this.init()
}
g.extend(j.prototype, {
init: function() {
this.initShow();
this.event()
},
initShow: function() {
p.initParams(this);
var D = "";
var F = [];
F[0] = t.getRangeTimeFormat(this, this.$input.eq(0));
F[1] = t.getRangeTimeFormat(this, this.$input.eq(1));
var E = "";
var A = "";
var C = "";
if (this.params.format[3] || this.params.format[4] || this.params.format[5]) {
C = "has-time"
}
if (this.config.hasShortcut) {
A = "has-sidebar";
E = l(this)
}
var B = g.fn.datePicker.dates[this.language];
var o = g(k.rangePickerMainTpl(B, C, A, F[1].year, F[1].month, E, D));
g("body").append(o);
this.$container = o;
this.$container.data("picker", this);
this.$container.addClass("is-" + this.language);
if (!this.hasTime) {
this.$container.find(".c-datepicker-date-range-picker__time-header").hide()
}
p.initShowObject(this, F)
},
fillDefault: function() {
var o = this.$inputBegin.val().split(" ");
var C = this.$inputEnd.val().split(" ");
var B = this.$container.find(".c-datePicker__input-day");
var A = this.$container.find(".c-datePicker__input-time");
if (o) {
B.eq(0).val(o[0]);
A.eq(0).val(o[1])
}
if (C) {
B.eq(1).val(C[0]);
A.eq(1).val(C[1])
}
},
event: function() {
if (this.hasTime) {
this.eventHasTime()
}
this.$container.on("click", function(A) {
A.stopPropagation()
});
this.datePickerObject.$target.on("click", function(A) {
A.stopPropagation()
});
this.$container.on("click", ".c-datepicker-date-range-picker__next-btn.month", function() {
var A = t.getPicker(g(this));
o(A, "next", "month")
});
this.$container.on("click", ".c-datepicker-date-range-picker__prev-btn.month", function() {
var A = t.getPicker(g(this));
o(A, "prev", "month")
});
this.$container.on("click", ".c-datepicker-date-range-picker__next-btn.year", function() {
var A = t.getPicker(g(this));
o(A, "next", "year")
});
this.$container.on("click", ".c-datepicker-date-range-picker__prev-btn.year", function() {
var A = t.getPicker(g(this));
o(A, "prev", "year")
});
function o(C, A, B) {
if (C.isBlur) {
g.sub("datapickerClick", function(D) {
C.dayObject.prevNextRender(A, B);
g.unsub("datapickerClick")
});
g.pub("datapickerRenderPicker")
} else {
C.dayObject.prevNextRender(A, B)
}
}
this.$container.on("click", ".c-datepicker-picker__btn-clear", function() {
var A = t.getPicker(g(this));
A.clear()
});
this.$container.on("click", ".c-datepicker-picker__shortcut", function() {
var E = t.getPicker(g(this));
var D = g(this).data("value").split(",");
var B = moment().add(D[0], "day").format(E.config.format);
var A = moment().add(D[1], "day").format(E.config.format);
if (E.hasTime) {
var C = g(this).data("time").split(",");
if (C[0]) {
B = B.split(" ")[0] + " " + C[0]
}
if (C[1]) {
A = A.split(" ")[0] + " " + C[1]
}
}
E.$inputBegin.val(B);
E.$inputEnd.val(A);
E.datePickerObject.hide("shortcut")
});
this.$container.on("click", ".c-datepicker-picker__link-btn.confirm", function() {
var E = t.getPicker(g(this));
var C = E.$container.find(".c-datePicker__input-day");
var B = E.$container.find(".c-datePicker__input-time");
var D = C.eq(0).val();
var A = C.eq(1).val();
if (!D || !A) {
E.datePickerObject.hide("confirm");
return
}
if (E.hasTime) {
D += " " + B.eq(0).val();
A += " " + B.eq(1).val()
}
E.$inputBegin.val(D);
E.$inputEnd.val(A);
E.datePickerObject.hide("confirm")
})
},
eventHasTime: function() {
this.$container.on("keyup", ".c-datePicker__input-time", function() {
var o = t.getPicker(g(this));
o.timeObject.updateTimePanel()
});
this.$container.on("keyup", ".c-datePicker__input-day", function() {
p.renderPicker(this)
});
this.$container.on("click", ".c-datePicker__input-time", function(o) {
o.stopPropagation()
});
this.$container.on("focus", ".c-datePicker__input-time", function(A) {
A.stopPropagation();
var B = t.getPicker(g(this));
if (!B.$input.val() && !this.value) {
var o = moment().format(B.config.format);
o = o.split(" ");
B.$container.find(".c-datePicker__input-day").val(o[0]);
B.$container.find(".c-datePicker__input-time").val(o[1])
}
B.activeTimeWrap = g(this).parents(".c-datepicker-date-range-picker__time-content");
B.showTimeSelect();
g(this).trigger("keyup")
});
this.$container.on("focus", ".c-datePicker__input-day,.c-datePicker__input-time", function() {
var B = t.getPicker(g(this));
var A = B.$container.find(".c-datePicker__input-day");
if (!g(this).val()) {
var o = moment().format(B.config.format).split(" ");
A.val(o[0]);
if (o.length > 1) {
B.$container.find(".c-datePicker__input-time").val(o[1])
}
}
});
this.$container.on("blur", ".c-datePicker__input-day", function(A) {
var B = t.getPicker(g(this));
var o = B.$container.find(".c-datePicker__input-day").index(g(this));
a(B, g(this));
t.judgeTimeRange(B, g(this), B.$container.find(".c-datePicker__input-time").eq(o), o)
});
this.$container.on("blur", ".c-datePicker__input-time", function(A) {
var B = t.getPicker(g(this));
var o = B.$container.find(".c-datePicker__input-time").index(g(this));
n(B, g(this));
t.judgeTimeRange(B, B.$container.find(".c-datePicker__input-day").eq(o), g(this), o)
})
},
show: function() {
this.fillDefault();
var C = [];
C[0] = t.getRangeTimeFormat(this, this.$input.eq(0));
C[1] = t.getRangeTimeFormat(this, this.$input.eq(1));
var A = [C[0].year, C[1].year];
var o = [C[0].month, C[1].month];
var B = [C[0].day, C[1].day];
if (this.params.format[2]) {
this.dayObject.render(A, o, B, false, true)
}
p.setInitVal(this);
this.$container.show()
},
clear: function() {
this.$inputBegin.val("");
this.$inputEnd.val("");
this.$container.find(".c-datePicker__input-day,.c-datePicker__input-time").val("");
this.$container.find("td.available").removeClass("current in-range")
},
renderYear: function() {
this.yearObject.render()
},
renderMonth: function() {
this.monthObject.render()
},
showTimeSelect: function() {
if (this.params.format[3] || this.params.format[4] || this.params.format[5]) {
this.timeObject.render(this.params.format.slice(3))
}
}
});
function w(o) {
this.datePickerObject = o;
this.datePickerObject.pickerObject = null;
this.$input = o.$target.find("input");
this.$inputBegin = this.$input.eq(0);
this.$inputEnd = this.$input.eq(1);
this.config = o.config;
this.hasTime = true;
this.onlyTime = true;
this.params = {};
this.language = this.config.language || "zh-CN";
this.timeMin = t.timeVal(this, "min");
this.timeMax = t.timeVal(this, "max");
this.configMinMax = t.getOnlyTimeMinMax(this);
this.configBegin = g.extend({}, this.configMinMax);
this.configEnd = g.extend({}, this.configMinMax);
this.init()
}
g.extend(w.prototype, {
init: function() {
this.initShow();
this.event()
},
initShow: function() {
p.initParams(this);
var C = "has-time only-time";
var B = g.fn.datePicker.dates[this.language];
var o = this.config.isRange ? k.rangePickerMainOnlyTimeTpl(B, C) : k.datePickerMainOnlyTimeTpl(C);
var A = g(o.replace(/{{table}}/g, ""));
g("body").append(A);
this.$container = A;
this.$container.data("picker", this);
this.$container.addClass("is-" + this.language);
this.timeObject = new h(this)
},
event: function() {
this.$container.on("click", function(o) {
o.stopPropagation()
});
this.datePickerObject.$target.on("click", function(o) {
o.stopPropagation()
});
this.$container.on("click", ".c-datepicker-picker__btn-clear", function() {
var o = t.getPicker(g(this));
o.clear();
o.datePickerObject.hide("confirm")
});
this.$container.on("click", ".c-datepicker-picker__btn-cancel", function() {
var A = t.getPicker(g(this));
if (A.config.isRange) {
var o = A.timeObject.prevValue.split(",");
A.$inputBegin.val(o[0]);
A.$inputEnd.val(o[1])
}
A.datePickerObject.hide("confirm")
});
this.$container.on("click", ".c-datepicker-picker__link-btn.confirm", function() {
var o = t.getPicker(g(this));
o.datePickerObject.hide("confirm")
})
},
show: function() {
this.$container.show();
p.setInitVal(this);
this.timeObject.render(this.params.format.slice(3))
},
clear: function() {
this.$inputBegin.val("");
this.$inputEnd.val("")
}
});
function u(o, A) {
this.$target = A;
this.config = g.extend({}, z, o);
this.params = {};
this.onlyTime = t.onlytimeReg(this.config.format);
this.init()
}
g.extend(u.prototype, {
init: function() {
if (!this.config.isRange) {
this.pickerObject = this.onlyTime ? new w(this) : new q(this)
} else {
this.pickerObject = this.onlyTime ? new w(this) : new j(this)
}
this.pickerObject.$input.data("datepicker", this);
this.event()
},
event: function() {
this.pickerObject.$input.on("click", function() {
var o = g(this).data("datepicker");
if (!o.pickerObject.$container.data("isShow")) {
g(".c-datepicker-picker").data("isShow", false);
o.pickerObject.$container.data("isShow", true);
o.show()
}
});
this.pickerObject.$input.on("focus", function() {
var o = g(this).data("datepicker");
o.initInputVal = this.value
});
this.pickerObject.$container.on("click", function() {
var o = g(this).data("picker");
if (o.isBlur) {
g.unsub("datapickerClick");
g.pub("datapickerRenderPicker");
o.isBlur = false
}
});
this.pickerObject.$input.on("blur", function() {
if (!this.value) {
return
}
var F = g(this).data("datepicker");
var G = F.pickerObject.$input.index(g(this));
var o = this.value.split(" ");
var J = o[0];
var L = F.pickerObject.$container;
if (F.pickerObject.hasTime) {
var B = F.onlyTime ? t.timeCheck(o[0]) : o[1] ? t.timeCheck(o[1]) : false;
var A = L.find(".c-datePicker__input-time");
var E = B && B.match(t.timeReg(F));
if (F.onlyTime) {
if (!B || !E) {
B = F.initInputVal;
this.value = F.initInputVal
} else {
if (E) {
B = E[5] ? E[1] + ":" + t.fillTime(E[3]) + ":" + t.fillTime(E[5]) : E[1] + ":" + t.fillTime(E[3])
}
this.value = B
}
} else {
var K = t.dayReg(F.pickerObject);
var C = L.find(".c-datePicker__input-day");
var H = J.match(K);
if (!B || !E || !H) {
J = F.initInputVal.split(" ")[0];
B = F.initInputVal.split(" ")[1];
this.value = F.initInputVal
} else {
if (H) {
H = t.fixedFill(H);
J = H[1] + F.pickerObject.splitStr + t.fillTime(H[3]) + F.pickerObject.splitStr + t.fillTime(H[5])
}
if (E) {
B = E[5] ? E[1] + ":" + t.fillTime(E[3]) + ":" + t.fillTime(E[5]) : E[1] + ":" + t.fillTime(E[3])
}
this.value = J + " " + B
}
A.eq(G).val(B);
C.eq(G).val(J);
F.pickerObject.isBlur = true;
g.sub("datapickerRenderPicker", function() {
if (!F.onlyTime) {
p.renderPicker(C.eq(G)[0], true)
}
F.pickerObject.isBlur = false;
g.pub("datapickerClick");
g.unsub("datapickerRenderPicker")
})
}
} else {
if (F.pickerObject.params.isMonth) {
var D = moment(t.newDateFixed(F.pickerObject, J + F.pickerObject.splitStr + "01"));
var M = t.getTimeFormat(D);
var I = t.minMaxFill(F.pickerObject, M, 0, "month");
val = I.val;
g(this).val(val)
} else {
if (F.pickerObject.params.isYear) {
if (F.config.min && J < F.config.min) {
J = F.config.min
}
if (F.config.max && J > F.config.max) {
J = F.config.max
}
g(this).val(J)
} else {
var K = t.dayReg(F.pickerObject);
var H = J.match(K);
if (!H) {
this.value = F.initInputVal
} else {
H = t.fixedFill(H);
J = H[1] + F.pickerObject.splitStr + t.fillTime(H[3]) + F.pickerObject.splitStr + t.fillTime(H[5]);
this.value = J
}
}
}
}
})
},
show: function() {
i(this);
g(".c-datepicker-picker").hide();
this.pickerObject.show();
this.config.show.call(this.pickerObject)
},
hide: function(o) {
this.pickerObject.$container.find(".td.available").removeClass("current in-range");
this.pickerObject.$container.find(".c-datepicker-time-panel").hide();
this.pickerObject.$container.hide();
this.betweenHandle();
if (this.onlyTime) {
this.fixedInputValOnlyTime()
} else {
this.fixedInputVal()
}
this.pickerObject.$container.data("isShow", false);
this.config.hide.call(this.pickerObject, o)
},
fixedInputVal: function() {
var G = this.config;
var D = this.pickerObject;
var I = D.minJson ? true : false;
var B = D.maxJson ? true : false;
var E = function(M, L) {
return moment(t.newDateFixed(M, L))
};
var C = I ? E(D, G.min) : false;
var K = B ? E(D, G.max) : false;
if (G.isRange) {
var F = D.$inputBegin.val();
var J = D.$inputEnd.val();
if (!F && !J) {
return
}
var A = F ? E(D, F) : false;
var H = J ? E(D, J) : false;
if (F && J && A.isAfter(H)) {
D.$inputBegin.val(D.params.initBeginVal);
D.$inputEnd.val(D.params.initEndVal);
return
}
if (I && F && A.isBefore(C)) {
D.$inputBegin.val(G.min)
}
if (B && J && H.isAfter(K)) {
D.$inputEnd.val(G.max)
}
} else {
var o = D.$input.val();
if (!o) {
return
}
var A = o ? E(D, o) : false;
if (I && A.isBefore(C)) {
D.$input.val(G.min)
}
if (B && A.isAfter(K)) {
D.$input.val(G.max)
}
}
},
fixedInputValOnlyTime: function() {
var I = this.config;
var E = this.pickerObject;
if (I.isRange) {
var F = E.$inputBegin.val();
var J = E.$inputEnd.val();
if ((!F && !J)) {
return
}
var K = F.split(":");
var C = J.split(":");
var H = t.countSecond(K);
var G = t.countSecond(C);
if (H > G) {
E.$inputBegin.val(E.params.initBeginVal);
E.$inputEnd.val(E.params.initEndVal);
return
}
var D = E.configMinMax.minSecond;
var A = E.configMinMax.maxSecond;
if (H < D) {
E.$inputBegin.val(E.configMinMax.minVal)
}
if (G > A) {
E.$inputEnd.val(E.configMinMax.maxVal)
}
} else {
var B = E.$input.val();
if (!E.configMinMax || !B) {
return
}
var o = B.split(":");
B = x.checkMinMaxGetVal(E, o);
E.$input.val(B)
}
},
betweenHandle: function() {
var H = this.config;
if (!H.isRange || !H.between) {
return false
}
var o = this.pickerObject.$inputBegin.val();
var F = this.pickerObject.$inputEnd.val();
if (!o || !F) {
return false
}
var D = moment(t.newDateFixed(this.pickerObject, o));
var E = moment(t.newDateFixed(this.pickerObject, F));
var A = t.getTimeFormat(D);
var B = t.getTimeFormat(E);
if (H.between === "month") {
if (A.year !== B.year || A.month !== B.month) {
var C = D.set({
year: B.year,
month: B.month - 1,
date: 1
}).format(H.format);
this.pickerObject.$inputBegin.val(C)
}
return
}
if (H.between === "year") {
if (A.year !== B.year) {
var C = D.set({
year: B.year,
month: 0,
date: 1
}).format(H.format);
this.pickerObject.$inputBegin.val(C)
}
return
}
if (Number.isInteger(Number(H.between))) {
var G = E.add(-Number(H.between), "day");
if (G.isAfter(D)) {
var C = G.format(H.format);
this.pickerObject.$inputBegin.val(C)
}
}
}
});
function i(B) {
var A = B.$target.offset();
var o = B.$target.outerHeight();
B.pickerObject.$container.css({
top: A.top + o,
left: A.left
})
}
function n(C, A) {
var B = A.val();
var o = B && B.match(t.timeReg(C));
if (!B || !o) {
return
} else {
if (o) {
B = C.config.format.split(" ")[1].replace(/HH/, o[1]).replace(/mm/, t.fillTime(o[3])).replace(/ss/, t.fillTime(o[5]));
A.val(B);
if (!C.config.isRange) {
A.trigger("keyup")
}
}
}
}
function a(D, B) {
var o = B.val();
var C = t.dayReg(D);
var A = o.match(C);
if (!o || !A) {
return
} else {
if (A) {
A = t.fixedFill(A);
o = A[1] + D.splitStr + t.fillTime(A[3]) + D.splitStr + t.fillTime(A[5]);
B.val(o);
if (!D.config.isRange) {
B.trigger("keyup")
}
}
}
}
function l(D) {
var B = "";
var o = D.config.shortcutOptions;
for (var A = 0; A < o.length; A++) {
var C = o[A].time || "";
B += k.sideBarButton(o[A].day, C, o[A].name)
}
return k.sideBarTpl(B)
}
function c(B, A) {
B.$container.find(".c-datepicker-date-table td.current").removeClass("current");
var o = A.split(" ");
B.$input.val(A);
B.$container.find(".c-datePicker__input-day").val(o[0]);
if (o.length > 1) {
B.$container.find(".c-datePicker__input-time").val(o[1])
}
}
function r(D) {
var o, B;
var C = moment(D.config.min, D.config.format);
var A = moment(D.config.max, D.config.format);
if (D.config.min && moment().isBefore(C)) {
o = C.format(D.config.format);
B = "min"
} else {
if (D.config.max && moment().isAfter(A)) {
o = A.format(D.config.format);
B = "max"
} else {
o = moment().format(D.config.format);
B = "active"
}
}
return {
value: o,
type: B
}
}
g.fn.datePicker = function(o) {
return this.each(function() {
new u(o,g(this))
})
}
;
g.fn.datePicker.dates = {};
g.fn.datePicker.dates = {
"zh-CN": {
days: ["日", "一", "二", "三", "四", "五", "六"],
months: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
now: "此刻",
clear: "清空",
headerYearLink: "年",
units: ["年", "月"],
confirm: "确定",
cancel: "取消",
chooseDay: "选择日期",
chooseTime: "选择时间",
begin: "开始时间",
end: "结束时间",
prevYear: "前一年",
prevMonth: "上个月",
nextYear: "后一年",
nextMonth: "下个月",
zero: "0点"
}
}
}(jQuery));
