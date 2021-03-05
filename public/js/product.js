/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/product.js ***!
  \*********************************/
$(document).ready(function () {
  Livewire.on("deleteTriggered", function (id, name) {
    var proceed = confirm("Are you sure you want to delete ".concat(name));

    if (proceed) {
      Livewire.emit("delete", id);
    }
  });
  Livewire.on("triggerCreate", function () {
    $("#product-modal").modal("show");
  });
  Livewire.on("dataFetched", function (product) {
    $("#product-modal").modal("show");
  });
  window.addEventListener("product-deleted", function (event) {
    alert("".concat(event.detail.product, " was deleted!"));
  });
  window.addEventListener("product-saved", function (event) {
    $("#product-modal").modal("hide");
    alert("Product ".concat(event.detail.product_name, " was ").concat(event.detail.action, "!"));
  });
});
/******/ })()
;