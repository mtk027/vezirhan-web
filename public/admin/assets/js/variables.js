let pathname = window.location.pathname.substring(1)
let main_path = pathname.split('/')[0]
let datatable, survey_length, current_element, gallery_count, default_page, selected_path
let pond = [];
let datatableEl = [];
if (main_path == "dashboard") {
    main_path = "";
    default_page = pathname.split('/')[1]
} else {
    main_path = `/${main_path}`
    default_page = pathname.split('/')[2]
}
