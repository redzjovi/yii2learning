$(function() {
    $('#modalButton').click(function() {
        var value = $(this).attr('value');
        $('#modal').modal('show').find('#modalContent').load(value);
    });
    $(document).on('click', '.fc-day', function() {
        var date = $(this).attr('data-date');
        $.get('index.php?r=events/create', {'date': date}, function(data) {
            $('#modal').modal('show').find('#modalContent').html(data);
        });
    });
    $(document).on('click', '.language', function() {
        var lang = $(this).attr('id');
        $.post('index.php?r=site/language', {'lang': lang}, function(data) {
            location.reload();
        });
    });
});