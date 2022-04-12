
function set_datatable() {
    datatable = $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url": $('.datatable').data('url'),
            "type": "GET",
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function (d) {
                $(".loading").LoadingOverlay("show");
                $(".loading").LoadingOverlay("hide", true);

                var datatableFilters = [];

                $.each($(".datatable").data("filters"), function (index, val) {
                    datatableFilters[val] = $('#' + val).val()
                })

                return $.extend({}, d, datatableFilters);
            }
        },
        language: {
            url: '/admin/assets/plugins/custom/datatables/tr.json'
        },
        columns: datatableColumns,
        order: [[0, "desc"]],
        searching: true
    });
}
function set_tinymce() {
    tinymce.init({
        selector: '.tinymce',
        plugins: 'print preview searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media table hr anchor toc insertdatetime advlist lists imagetools textpattern noneditable quickbars code',
        toolbar: 'code | undo redo | bold underline | fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange  removeformat | fullscreen | insertfile image media link | ltr rtl | showcomments addcomment',
        language: 'tr',
        height: "480",
        toolbar_mode: 'sliding',
        menubar: 'file edit view insert format table',
        language: 'tr_TR',
        language_url: `/admin/assets/plugins/custom/tinymce/tr_TR.js`,
    });
}

function set_filepond() {

    FilePond.registerPlugin(FilePondPluginImagePreview, FilePondPluginFileValidateType, FilePondPluginFilePoster);

    let filepondEl = $('*[data-filepond="true"]');


    for (let index = 0; index < filepondEl.length; index++) {
        let el = filepondEl[index];
        let val = el.defaultValue;
        if (val.charAt(0) == "[") {
            val = JSON.parse(val)
        }
        console.log(val);
        if (val != "") {
            if (typeof val != "object") {
                $.get(`${main_path}/file-fetch/${val}`, function (data) {
                    pond[el.name] = FilePond.create(el, {
                        files: filepond_ajax(data)
                    });
                });
            } else {
                let file_fetch_item = []
                val.forEach(function (item, index) {
                    $.get(`${main_path}/file-fetch/${item}`, function (data) {
                        file_fetch_item[index] = data
                    });
                })
                setTimeout(() => {
                    pond[el.name] = FilePond.create(el, {
                        files: filepond_ajax_multiple(file_fetch_item)
                    });
                    $('.loader').addClass('d-none');
                    $('.gallery_wrapper').removeClass('d-none');
                }, val.length * 500);
            }
        } else {
            pond[el.name] = FilePond.create(el);
        }
        FilePond.setOptions({
            server: {
                process: {
                    url: `${main_path}/file-upload/${default_page}`,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                },
                revert: {
                    url: `${main_path}/file-delete`,
                    method: 'DELETE',
                    withCredentials: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                }
            }
        });
    }
}
function set_calendar() {
    $(".date_picker").flatpickr({
        minDate: "today",
        locale: "tr",
        enableTime: true,
        dateFormat: "Y-m-d H:i"
    })
}