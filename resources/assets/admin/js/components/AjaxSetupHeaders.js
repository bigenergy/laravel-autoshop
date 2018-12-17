let AjaxSetupHeaders = (() => {
    let init = () => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    };

    return {
        init: init,
    };
})();

export default AjaxSetupHeaders;