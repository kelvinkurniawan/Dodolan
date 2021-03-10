$(document).ready(function() {
    // Livewire Event

    // Product handling
    Livewire.on("productDelete", (id, name) => {
        const proceed = confirm(`Are you sure you want to delete ${name}`);

        if (proceed) {
            Livewire.emit("delete", id);
        }
    });

    Livewire.on("productCreate", () => {
        $("#product-modal").modal("show");
    });

    Livewire.on("productFetched", product => {
        $("#product-modal").modal("show");
    });

    // Category handling
    Livewire.on("categoryDelete", (id, name) => {
        const proceed = confirm(`Are you sure you want to delete ${name}`);

        if (proceed) {
            Livewire.emit("delete", id);
        }
    });

    Livewire.on("categoryCreate", () => {
        $("#category-modal").modal("show");
    });

    Livewire.on("categoryFetched", category => {
        $("#category-modal").modal("show");
    });

    // Inventory Handling

    Livewire.on("inventoryDelete", (id, name) => {
        const proceed = confirm(`Are you sure you want to delete ${name}`);

        if (proceed) {
            Livewire.emit("delete", id);
        }
    });

    Livewire.on("inventoryCreate", () => {
        $("#inventory-modal").modal("show");
    });

    Livewire.on("inventoryFetched", inventory => {
        $("#inventory-modal").modal("show");
    });

    // Back event
    window.addEventListener("item-deleted", event => {
        alert(`${event.detail.item_name} was deleted!`);
    });

    window.addEventListener("item-saved", event => {
        $("#product-modal").modal("hide");
        $("#category-modal").modal("hide");
        $("#inventory-modal").modal("hide");
        alert(`Product ${event.detail.item_name} was ${event.detail.action}!`);
    });

    window.addEventListener("item-added", event => {
        $("#setInventory-modal").modal("hide");
        alert("Ingredient added!");
    });
});
