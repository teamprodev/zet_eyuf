/**
 *
 * Author:  Asror Zakirov
 * Created: 5/20/2020 6:58 PM
 * https://www.linkedin.com/in/asror-zakirov-167961a9
 * https://www.facebook.com/asror.zakirov
 */

(function(window, factory) {
    var globalInstall = function(){
        factory(window.lazySizes);
        window.removeEventListener('lazyunveilread', globalInstall, true);
    };

    factory = factory.bind(null, window, window.document);

    if(typeof module == 'object' && module.exports){
        factory(require('lazysizes'));
    } else if (typeof define == 'function' && define.amd) {
        require(['lazysizes'], factory);
    } else if(window.lazySizes) {
        globalInstall();
    } else {
        window.addEventListener('lazyunveilread', globalInstall, true);
    }
}(window, function(window, document, lazySizes) {
    /*jshint eqnull:true */
    'use strict';
    var bgLoad, regBgUrlEscape;
    var uniqueUrls = {};

    if(document.addEventListener){
        regBgUrlEscape = /\(|\)|\s|'/;

        bgLoad = function (url, cb){
            var img = document.createElement('img');
            img.onload = function(){
                img.onload = null;
                img.onerror = null;
                img = null;
                cb();
            };
            img.onerror = img.onload;

            img.src = url;

            if(img && img.complete && img.onload){
                img.onload();
            }
        };

        addEventListener('lazybeforeunveil', function(e){
            if(e.detail.instance != lazySizes){return;}

            var tmp, load, bg, poster;
            if(!e.defaultPrevented) {

                var target = e.target;

                if(target.preload == 'none'){
                    target.preload = target.getAttribute('data-preload') || 'auto';
                }

                if (target.getAttribute('data-autoplay') != null) {
                    if (target.getAttribute('data-expand') && !target.autoplay) {
                        try {
                            target.play();
                        } catch (er) {}
                    } else {
                        requestAnimationFrame(function () {
                            target.setAttribute('data-expand', '-10');
                            lazySizes.aC(target, lazySizes.cfg.lazyClass);
                        });
                    }
                }

                tmp = target.getAttribute('data-link');
                if(tmp){
                    addStyleScript(tmp, true);
                }

                // handle data-script
                tmp = target.getAttribute('data-script');
                if(tmp){
                    addStyleScript(tmp);
                }

                // handle data-require
                tmp = target.getAttribute('data-require');
                if(tmp){
                    if(lazySizes.cfg.requireJs){
                        lazySizes.cfg.requireJs([tmp]);
                    } else {
                        addStyleScript(tmp);
                    }
                }

                // handle data-bg
                bg = target.getAttribute('data-bg');
                if (bg) {
                    e.detail.firesLoad = true;
                    load = function(){
                        target.style.backgroundImage = 'url(' + (regBgUrlEscape.test(bg) ? JSON.stringify(bg) : bg ) + ')';
                        e.detail.firesLoad = false;
                        lazySizes.fire(target, '_lazyloaded', {}, true, true);
                    };

                    bgLoad(bg, load);
                }

                // handle data-poster
                poster = target.getAttribute('data-poster');
                if(poster){
                    e.detail.firesLoad = true;
                    load = function(){
                        target.poster = poster;
                        e.detail.firesLoad = false;
                        lazySizes.fire(target, '_lazyloaded', {}, true, true);
                    };

                    bgLoad(poster, load);

                }
            }
        }, false);

    }

    function addStyleScript(src, style){
        if(uniqueUrls[src]){
            return;
        }
        var elem = document.createElement(style ? 'link' : 'script');
        var insertElem = document.getElementsByTagName('script')[0];

        if(style){
            elem.rel = 'stylesheet';
            elem.href = src;
        } else {
            elem.src = src;
        }
        uniqueUrls[src] = true;
        uniqueUrls[elem.src || elem.href] = true;
        insertElem.parentNode.insertBefore(elem, insertElem);
    }
}));


