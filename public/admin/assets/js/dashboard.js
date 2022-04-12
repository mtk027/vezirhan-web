
$(document).ready(function () {
    set_datatable();
    set_tinymce();
    set_filepond();
    set_calendar
        ();
    current_element = pond['image'];
});
var datatableColumns = [];
$('.datatable th').each(function () {
    var column = $(this).data('column');
    datatableColumns.push({
        data: column,
        name: column
    });
});
setTimeout(function () {
    $("[rel='tooltip']").tooltip();
}, 1000);


$(".title").on("keyup", function () {
    let language = $(this).data('language')
    let el = $(`.seo_title[data-language='${language}']`)
    el.val($(this).val())
});
if ($(".short_description").length > 0) {
    $(".short_description").on("keyup", function () {
        let language = $(this).data('language')
        let el = $(`.seo_description[data-language='${language}']`)
        el.val($(this).val())
    });
}

$("#file_search").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $(".searchable_item").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    if ($('.searchable_item:visible').length === 0) {
        $('.not-found').show();
    } else {
        $('.not-found').hide();
    }
});

$('#file_modal .modal-body .item').on('click', function () {
    $("#file_modal .modal-body .item").removeClass('active')
    $(this).addClass('active')
    selected_item = $(this).children('.img-thumbnail').attr('name');
});

$('.select_image').on("click", function () {
    get_pond_image(selected_item, current_element)
})

$(document).delegate(".modal_button", "click", function () {
    current_element = pond[$(this).attr('id')];
});

function get_pond_image(selected_item, current_element) {
    if (selected_item) {
        $.ajax({
            url: `${main_path}/file-fetch/${selected_item}`,
            success: function (data) {
                current_element.files = filepond_ajax(data);
                $('#file_modal').modal('hide')
            },
        })
    }
}

function filepond_ajax(data) {
    return [{
        source: data.name,
        options: {
            type: 'local',
            file: {
                name: data.full_name,
                size: data.size,
                type: data.mime_type,
            },
            metadata: {
                poster: `${main_path}${data.file_path}`,
            },
        }
    }]
}

function filepond_ajax_multiple(data) {
    let returned_array = [];
    data.forEach(function (item, index) {
        returned_array[index] = {
            source: item.name,
            options: {
                type: 'local',
                file: {
                    name: item.full_name,
                    size: item.size,
                    type: item.mime_type,
                },
                metadata: {
                    poster: `${main_path}${item.file_path}`,
                },
            }
        }
    });
    return returned_array;
}

$(window).on("load scroll", function () {
    $('.img-thumbnail').each(function () {
        if ($(this).isOnScreen()) {
            $(this).attr('src', $(this).data('src'))
        }
    });
});

$.fn.isOnScreen = function (e) {
    var win = $(window);

    var viewport = {
        top: win.scrollTop(),
        left: win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();

    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();

    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));

};