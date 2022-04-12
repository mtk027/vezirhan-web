$(document).delegate(".delete_item", "click", function () {
    let url = $(this).data('url');
    delete_item(url)
});
$(".dbl_click_delete_item").dblclick(function () {
    let url = $(this).data('url');
    delete_item(url)
});
function delete_item(url) {
    Swal.fire({
        title: "Emin misiniz?",
        text: "Bu işlem geri alınamamaktadır!",
        icon: "question",
        dangerMode: true,
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Onaylıyorum, Sil',
        cancelButtonText: 'İptal',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                method: 'DELETE',
                success: function (data) {
                    if (data == "1") {
                        Swal.fire({
                            title: "Başarılı!",
                            text: "Silme işlemi başarıyla tamamlandı.",
                            icon: "success",
                            confirmButtonText: 'Kapat',
                        }).then((result) => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: "Başarısız!",
                            text: data,
                            icon: "error",
                            confirmButtonText: 'Kapat',
                        });
                    }
                }
            });
        }
    })
}

$(document).delegate(".change_status", "click", function () {
    let id = $(this).data('id');
    let column = $(this).data('column');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: `change-status/${default_page}/${id}/${column}`,
        method: 'GET',
        success: function (data) {
            datatable.draw();
        }
    });
})
