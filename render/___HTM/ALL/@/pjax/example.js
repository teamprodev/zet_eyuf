/* global Pjax */
var pjax;

console.log("Document initialized:", window.location.href);

document.addEventListener("pjax:send", function() {
    console.log("Event: pjax:send", arguments);
});

document.addEventListener("pjax:complete", function() {
    console.log("Event: pjax:complete", arguments);
});

document.addEventListener("pjax:error", function() {
    console.log("Event: pjax:error", arguments);
});

document.addEventListener("pjax:success", function() {
    console.log("Event: pjax:success", arguments);
});

document.addEventListener("DOMContentLoaded", function() {
    // Init Pjax instance
    pjax = new Pjax({
        elements: [".js-Pjax"],
        selectors: [".body", "title"],
        cacheBust: true
    });
    console.log("Pjax initialized.", pjax);

});
