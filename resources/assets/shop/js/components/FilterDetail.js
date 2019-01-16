let FilterDetail = (() => {
    const $routeSortFilter = '/filter/sorting';
    const $changeButtonSelector = '#sortingSelector';
    const $sortFilter = '#sort_filter';
    const $sortLoader = '#sorting_loader';
    const $filterResult = '#filter_information';

    let init = () => {
        listenClickChangeButton();
    };

    let listenClickChangeButton = () => {
        $(document).on('change', $changeButtonSelector, function() {
            let sortingData = {
                'slug': $(this).data('slug'),
                'value': $('#sortingSelector option:selected').val(),
                'sort': $('#sortingSelector option:selected').val(),
            };

            history.pushState('page2', 'Title', '/catalog/' + sortingData.slug + '?sort=' + sortingData.sort);

            $($sortLoader).prop('hidden', false);
            $($sortFilter).prop('disabled', true);

            $.post($routeSortFilter, sortingData).then(function (response) {
                insertFilterInformation(response);
                $($sortFilter).prop('disabled', false);
                $($sortLoader).prop('hidden', true);
            });

        });
    };

    // Заполнить результаты фильтра
    let insertFilterInformation = function(data) {
        $($filterResult).html(data);
    };

    return {
        init: init
    };
})();

export default FilterDetail;