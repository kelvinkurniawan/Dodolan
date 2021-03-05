$(document).ready(function() {
    Livewire.on("deleteTriggered", (id, name) => {
        const proceed = confirm(`Are you sure you want to delete ${name}`);

        if (proceed) {
            Livewire.emit("delete", id);
        }
    });

    Livewire.on("triggerCreate", () => {
        $("#product-modal").modal("show");
    });

    Livewire.on("dataFetched", product => {
        $("#product-modal").modal("show");
    });

    window.addEventListener("product-deleted", event => {
        alert(`${event.detail.product} was deleted!`);
    });

    window.addEventListener("product-saved", event => {
        $("#product-modal").modal("hide");
        alert(
            `Product ${event.detail.product_name} was ${event.detail.action}!`
        );
    });
});
