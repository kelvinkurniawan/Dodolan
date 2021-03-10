/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
require("./livewire_controller");

import "jquery-ui/ui/widgets/sortable.js";
import Swal from "sweetalert2";

$("#usedInventory, #unUsedInventory").sortable({
    connectWith: ".connectedSortable",
    receive: function(event, ui) {
        let id = ui.item.data("id");
        let itemStatus = ui.item.data("used");
        let ingredientName = ui.item.data("ingredient");
        let productId = ui.item.data("product");
        let ingredientId = ui.item.data("inventory");
        let target = event.target.id;
        let modalInventory = $("#setInventory-modal");

        if (itemStatus == false && target == "usedInventory") {
            modalInventory.modal({
                backdrop: "static",
                keyboard: false
            });

            Livewire.emit("setProductAndInventory", productId, ingredientId);

            modalInventory
                .find(".modal-title")
                .text("Add " + ingredientName + " to product ingredient ?");

            $(".closeInventoryModal").on("click", function() {
                $("#setInventory-modal").modal("hide");
                $(ui.sender).sortable("cancel");
            });
        }

        if (itemStatus == true && target == "unUsedInventory") {
            Swal.fire({
                icon: "warning",
                text: "Are you sure want to remove this ingredient?",
                showCancelButton: true,
                confirmButtonText: "Remove",
                confirmButtonColor: "#f1926e"
            }).then(result => {
                if (result.isConfirmed) {
                    Livewire.emit("delete", id);
                }

                if (result.isDismissed) {
                    $(ui.sender).sortable("cancel");
                }
            });
        }
    }
});

//import * as Turbo from "@hotwired/turbo";
// Enable TurboLinks
// var Turbolinks = require("turbolinks");
// Turbolinks.start();

//window.Vue = require("vue").default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component(
//     "example-component",
//     require("./components/ExampleComponent.vue").default
// );

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: "#app"
// });
