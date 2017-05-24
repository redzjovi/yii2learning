$(function() {
    $('#modalButton').click(function() {
        var value = $(this).attr('value');
        $('#modal').modal('show').find('#modalContent').load(value);
    });
});