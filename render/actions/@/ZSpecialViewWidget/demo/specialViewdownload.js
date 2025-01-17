/**
 *
 * Author:  Asror Zakirov
 * Created: 12/8/2019 7:37 PM
 * https://www.linkedin.com/in/asror-zakirov-167961a9
 * https://www.facebook.com/asror.zakirov
 */


function setFontSize(e) {
    e < min && (e = min),
    e > max && (e = max),
        $("").css({
            "font-size": parseInt(e) + 12 + "px"
        }),
        $(".italic_text").css({
            "font-size": parseInt(e) + 10 + "px"
        }),
        $(".menu_list li a,.ofer p:first-child,.name_text a span, .news_name").css({
            "font-size": parseInt(e) + 2 + "px"
        }),
        $(".title_link").css({
            "font-size": parseInt(e) + 3 + "px"
        }),
        $(".name_text a, .title, .title_link_footer, .cat_title .big_box").css({
            "font-size": parseInt(e) + 6 + "px"
        }),
        $(".title_in,.calendarBox td,.text,.tab_list li a,.links a").css({
            "font-size": parseInt(e) + 4 + "px"
        }),
        $(".lang a,.ways a,.textix,.tab-content li span,.tab-content li p,.beta, .main_news span").css({
            "font-size": parseInt(e) - 2 + "px"
        }),
        $(".timeCountainer span").css({
            "font-size": parseInt(e) - 3 + "px"
        }),
        $(".send_box .title").css({
            "font-size": parseInt(e) + 8 + "px"
        }),
        $("").css({
            "font-size": parseInt(e) + 14 + "px"
        }),
        $("").css({
            "font-size": parseInt(e) + 16 + "px"
        }),
        $(".main_news p.head_menu li a,.news_detail,.breadcrumb a,.dropdown-menu a,.speciel_box span,.official,.control-label,.submit_btn,.parent_mini .text,.parent_mini label,.parent_mini .btn-block,.text-info,.parent_big .parent_mini .form-control,.form_boxes .text4,.ofer,.send_box .title,.tag_link,.tag_date,.tab_box_list li a,.events,.nav-tabs.nav-justified li a,.info,.old_site a,.news_list li a,.orders_list li .tag,.text_anons,.order_box .events,.list li a,.just_tag,.alone,.dropdown-toggle").css({
            "font-size": e + "px"
        })
}
function makeNormal() {
    $("html").removeClass("blackAndWhite blackAndWhiteInvert"),
        $.removeCookie("specialView", {
            path: "/"
        })
}
function makeBlackAndWhite() {
    makeNormal(),
        $("html").addClass("blackAndWhite"),
        $.cookie("specialView", "blackAndWhite", {
            path: "/"
        })
}
function makeBlackAndWhiteDark() {
    makeNormal(),
        $("html").addClass("blackAndWhiteInvert"),
        $.cookie("specialView", "blackAndWhiteInvert", {
            path: "/"
        })
}
function saveFontSize(e) {
    $.cookie("fontSize", e, {
        path: "/"
    })
}
function changeSliderText(e, n) {
    var t = Math.round(Math.abs(100 / (max - min) * (n - min)));
    $("#" + e).prev(".sliderText").children(".range").text(t)
}
function savezoomSizer(e) {
    $.session("zoomSizer", e, {
        path: "/"
    })
}
function changeSliderTextZoom(e, n) {
    var t = Math.round(Math.abs(100 - 20 * (maxzoom - n)));
    $("#" + e).prev(".sliderZoom").children(".range").text(t)
}
function setzoomSizer(e) {
    e < minzoom && (e = minzoom),
    e > maxzoom && (e = maxzoom),
        $("body").css({
            "-webkit-transform": "scale(1." + parseInt(e) + ")",
            "-moz-transform": "scale(1." + parseInt(e) + ")",
            "-ms-transform": "scale(1." + parseInt(e) + ")",
            transform: "scale(1." + parseInt(e) + ")",
            "-webkit-transform-origin": "top center",
            "-moz-transform-origin": "top center",
            "-ms-transform-origin": "top center",
            "transform-origin": "top center"
        })
}
var min = 14
    , max = 30;
$(document).ready(function() {
    switch ($.cookie("specialView")) {
        case "blackAndWhite":
            makeBlackAndWhite();
            break;
        case "blackAndWhiteInvert":
            makeBlackAndWhiteDark()
    }
    $(".no-propagation").click(function(e) {
        e.stopPropagation()
    }),
        $(".appearance .spcNormal").click(function() {
            makeNormal()
        }),
        $(".appearance .spcWhiteAndBlack").click(function() {
            makeBlackAndWhite()
        }),
        $(".appearance .spcDark").click(function() {
            makeBlackAndWhiteDark()
        }),
        $("#fontSizer").slider({
            min: min,
            max: max,
            range: "min",
            slide: function(e, n) {
                setFontSize(n.value),
                    changeSliderText("fontSizer", n.value)
            },
            change: function(e, n) {
                saveFontSize(n.value)
            }
        });
    var e = $.cookie("fontSize");
    void 0 !== e && ($("#fontSizer").slider("value", e),
        setFontSize(e),
        changeSliderText("fontSizer", e)),
        $("#zoomSizer").slider({
            min: minzoom,
            max: maxzoom,
            range: "min",
            slide: function(e, n) {
                setzoomSizer(n.value),
                    changeSliderTextZoom("zoomSizer", n.value)
            },
            change: function(e, n) {}
        });
    var n = $.cookie("zoomSizer");
    void 0 !== n && ($("#zoomSizer").slider("value", n),
        setzoomSizer(n),
        changeSliderTextZoom("zoomSizer", n))
});
var minzoom = 0
    , maxzoom = 5;
