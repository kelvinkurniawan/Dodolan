/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************!*\
  !*** ./resources/js/livewire_controller.js ***!
  \*********************************************/
$(document).ready(function () {
  // Livewire Event
  // Product handling
  Livewire.on("productDelete", function (id, name) {
    var proceed = confirm("Are you sure you want to delete ".concat(name));

    if (proceed) {
      Livewire.emit("delete", id);
    }
  });
  Livewire.on("productCreate", function () {
    $("#product-modal").modal("show");
  });
  Livewire.on("productFetched", function (product) {
    $("#product-modal").modal("show");
  }); // Category handling

  Livewire.on("categoryDelete", function (id, name) {
    var proceed = confirm("Are you sure you want to delete ".concat(name));

    if (proceed) {
      Livewire.emit("delete", id);
    }
  });
  Livewire.on("categoryCreate", function () {
    $("#category-modal").modal("show");
  });
  Livewire.on("categoryFetched", function (category) {
    $("#category-modal").modal("show");
  }); // Inventory Handling

  Livewire.on("inventoryDelete", function (id, name) {
    var proceed = confirm("Are you sure you want to delete ".concat(name));

    if (proceed) {
      Livewire.emit("delete", id);
    }
  });
  Livewire.on("inventoryCreate", function () {
    $("#inventory-modal").modal("show");
  });
  Livewire.on("inventoryFetched", function (inventory) {
    $("#inventory-modal").modal("show");
  }); // Back event

  window.addEventListener("item-deleted", function (event) {
    alert("".concat(event.detail.item_name, " was deleted!"));
  });
  window.addEventListener("item-saved", function (event) {
    $("#product-modal").modal("hide");
    $("#category-modal").modal("hide");
    $("#inventory-modal").modal("hide");
    alert("Product ".concat(event.detail.item_name, " was ").concat(event.detail.action, "!"));
  });
  window.addEventListener("item-added", function (event) {
    $("#setInventory-modal").modal("hide");
    alert("Ingredient added!");
  });
});
/******/ })()
;