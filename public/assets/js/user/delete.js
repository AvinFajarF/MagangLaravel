function destroy(event) {
    event.preventDefault();

    $("#delete-modal").modal("show");

    $("#confirm-delete").on("click", function () {
        const confirmButton = $(this);
        confirmButton.prop("disabled", true);

        $.ajax({
            url: event.target.action,
            type: event.target.method,
            data: $(event.target).serialize(),
        })
            .done(function (res) {
                postDatatable.ajax.reload();
                $("#delete-modal").modal("hide");
                confirmDelete.prop("disabled", false);
                confirmDelete.text(confirmDeleteText);
                toastr.success(res.message);
            })
            .fail(function (err) {
                confirmDelete.prop("disabled", false);
                confirmDelete.text(confirmDeleteText);
                toastr.error(err.responseJSON.message);
            });
    });
}

$(document).ready(function () {
    $(".close-modal").click(function () {
        $("#delete-modal").modal("hide");
    });
});
