let FilterDetail = (() => {
    const $routeSortFilter = '/filter/sorting';
    const $changeButtonSelector = '#sortingSelector';

    let init = () => {
        listenClickChangeButton();
        //$('#sorting_loader').hide();
    };

    let listenClickChangeButton = () => {
        $(document).on('change', $changeButtonSelector, function() {
            let sortingData = {
                'slug': $(this).data('slug'),
                'value': $('#sortingSelector option:selected').val(),
                'sort': $('#sortingSelector option:selected').val(),
            };

            history.pushState('page2', 'Title',);

            $('#sorting_loader').prop('hidden', false);
            $('#sort_filter').prop('disabled', true);

            console.log('OK GUY');

            $.post($routeSortFilter, sortingData).then(function (response) {
                insertFilterInformation(response);
                $('#sort_filter').prop('disabled', false);
                $('#sorting_loader').prop('hidden', true);
            });

        });
    };

    // Заполнить результаты фильтра
    let insertFilterInformation = function(data) {
        $("#filter_information").html(data);
    };

    return {
        init: init
    };
})();

export default FilterDetail;