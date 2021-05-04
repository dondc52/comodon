$(document).ready(function () {
    $("ul.recent-tab-list li:first-child a").addClass("active show");
    $("div.recent-content-list div:first-child").addClass("active show");


    if ($('#success_home').length) {
        $('#mailPopupSuccess').modal('show')
    }
    else {
        $('#mailPopupSuccess').modal('hide')
    }
    if ($('#error_home').length) {
        $('#mailPopupError').modal('show')
    }
    else {
        $('#mailPopupError').modal('hide')
    }
});