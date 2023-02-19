function destroy(event) {
    event.preventDefault();

    $.ajax({
        url: event.target.action,
        type: event.target.method,
        data: $(event.target).serialize(),
    }).done(function (res) {
        userDataTable.ajax.reload()
    }).fail(function (err) {
        
    });

}
