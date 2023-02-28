function destroy(event) {
    event.preventDefault();

    $("#delete-modal").modal("show");

    $("#confirm-delete").off().on("click", function () {
        const confirmDelete = $(this);
        const confirmDeleteText = confirmDelete.text();

        confirmDelete.prop("disabled", true);
        confirmDelete.text(`Loading ...`);

        $.ajax({
            url: event.target.action,
            type: event.target.method,
            data: $(event.target).serialize(),
        })
            .done(function (res) {
                userDatatable.ajax.reload();
                $("#delete-modal").modal("hide");
                confirmDelete.prop("disabled", false);
                confirmDelete.text(confirmDeleteText);
                toastr.success(res.message)
            })
            .fail(function (err) {
                confirmDelete.prop("disabled", false);
                confirmDelete.text(confirmDeleteText);
                toastr.error(err.responseJSON.message);
            });
    });
}
