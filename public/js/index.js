/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/index.js ***!
  \*******************************/
$(document).ready(function () {
  $('.logout-btn').on('click', function (event) {
    event.preventDefault();
    this.closest('form').submit();
  });
});
/******/ })()
;