$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click', '.image-delete__button', function() {
    var image = $(this);
    var imageId = image.data('id');

    $.ajax({
        type: "POST",
        url: '/admin/image/destroy/',
        data: {
            id: imageId
        },
        success: function() {
            $(document).find('.image-' + imageId).remove();
            $(".refresh-after-ajax").load(window.location + " .refresh-after-ajax");

            $.alert({
                icon: 'fas fa-check-double',
                type: 'success',
                title: 'Выполнено',
                content: 'Изображение удалено!',
                theme: 'supervan',
                autoClose: 'thx|2000',
                buttons: {
                    thx: {
                        text: 'ОК',
                    }
                }


            });
        }
    });
});