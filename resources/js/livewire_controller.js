$(document).ready(function() {
    // Livewire Event
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

    Livewire.on("categoryDelete", (id, name) => {
        const proceed = confirm(`Are you sure you want to delete ${name}`);

        if (proceed) {
            Livewire.emit("delete", id);
        }
    });

    Livewire.on("categoryCreate", () => {
        $("#category-modal").modal("show");
    });

    Livewire.on("categoryFetched", product => {
        $("#category-modal").modal("show");
    });

    // Back event
    window.addEventListener("item-deleted", event => {
        alert(`${event.detail.item_name} was deleted!`);
    });

    window.addEventListener("item-saved", event => {
        $("#product-modal").modal("hide");
        $("#category-modal").modal("hide");
        alert(`Product ${event.detail.item_name} was ${event.detail.action}!`);
    });
});
