let FilterDetail = (() => {
    const $routeSortFilter = '/filter/sorting';
    const $routeFilter = '/filter/sorting';
    const $changeButtonSelector = '#sortingSelector';
    const $sortFilter = '#sort_filter';
    const $sortLoader = '#sorting_loader';
    const $filterResult = '#filter_information';
    const $changeForm = '#filter_form';
    const $sort = '#sort';
    const $sort_type = '#sort_type';

    let init = () => {
        // listenClickChangeButton();
        listenChangeForm();
        listenSyncSortingFilter();

    };

    let getFilterInputs = () => {
        let inputs = $(document).find('#filter_form input');

        return inputs.filter(function () {
            let input = $(this);
            return (input.attr('type') === 'checkbox' && input.prop('checked')) ||
                input.attr('type') !== 'checkbox';
        });
    };

    let getAppliedParams = () => {
        let inputs = getFilterInputs();
        return getAppliedFilters(inputs);
    };

    let getAppliedFilters = (inputs) => {
        let selectedParams = [];
        inputs.each(function () {
            let input = $(this);
            if ((
                input.attr('name') &&
                input.val() !== '0' &&
                input.val() !== '' &&
                input.data('min-available') !== Number(input.val()) &&
                input.data('max-available') !== Number(input.val())
            )
            ) {
                selectedParams.push({
                    name: input.attr('name'),
                    value: input.val()
                });
            }
        });

        return selectedParams;
    };

    let getParams = (toArray) => {
        let selectedParams = getAppliedParams();

        return toArray
            ? selectedParams
            : $.param(selectedParams);
    };

    let setUrl = () => {
         history.pushState(null, null, window.location.href.split('?')[0] + '?' + getParams());
    };


    let listenChangeForm = () => {
        $(document).on('change', $changeForm, function() {
            listenSyncSortingFilter();
            setUrl();
            applyFilter();
        });
    };

    // Cинхронизация фильтра сортировки с hidden inputs
    let listenSyncSortingFilter = () => {
        $(document).on('change', $sortFilter, function() {
            $($sort).val($('#sortingSelector option:selected').val());
            $($sort_type).val($('#sortingSelector option:selected').data('type'));
            setUrl();
            applyFilter();
        });
    };

    // Собрать данные с формы и отправить их на бэкенд
    let applyFilter = () => {
        lockForms();
        $.post($routeFilter, getAppliedParams()).then(function (response) {
            console.log('Filter applied, form send success');
            insertFilterInformation(response);
            unlockForms();
        });
    };

    // Блокировка форм на время выполнения запроса
    let lockForms = () => {
        $($sortLoader).prop('hidden', false);
        $($sortFilter).prop('disabled', true);
        $('#filter_form_lock').prop('disabled', true);
    };

    // Разблокировка форм после запроса
    let unlockForms = () => {
        $($sortFilter).prop('disabled', false);
        $($sortLoader).prop('hidden', true);
        $('#filter_form_lock').prop('disabled', false);
    }
    // Заполнить результаты фильтра в шаблон
    let insertFilterInformation = function(data) {
        $($filterResult).html(data);
    };

    return {
        init: init
    };
})();

export default FilterDetail;