$(document).ready(function() {
    $('#brandmodel').on('change', function() {
        let brandId = $(this).val();
        let carModelSelect = $('#carmodel');

        carModelSelect.empty();
        carModelSelect.append('<option value="" selected disabled>Загрузка...</option>');

        $.ajax({
            url: getCarModelsUrl + '/' + brandId,
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                carModelSelect.empty();
                carModelSelect.append('<option value="" selected disabled>Выберите модель</option>');
                $.each(response, function(index, model) {
                    carModelSelect.append('<option value="' + model.id + '">' + model.name + '</option>');
                });
            },
            error: function(response) {
                carModelSelect.empty();
                carModelSelect.append('<option value="" selected disabled>Ошибка загрузки</option>');
            }
        });
    });
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        autoclose: true
    });
});

