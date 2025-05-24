$(document).ready(function () {
    $.ajax({
        type: 'get',
        url: 'get-home-page-destinations',
        data: {
        },
        success: function (response) {
            if (response.length) {
                let data = "";
                response.forEach(element => {
                    data += '<div class="col-md-4 mb-4">' +
                        '<div class="destinations-block">' +
                        '<img src="' + site_url + element.destination_image + '" class="img-fluid" width="" height="" alt="' + element.destination_name + '">' +
                        '<span class="destinations-title">' + element.destination_name + '</span>' +
                        '</div>' +
                        '</div>';
                });
                if (data) {
                    $("#destinations").html(data);
                }
            }
        },
        failure: function (response) {

        }
    });
    $.ajax({
        type: 'get',
        url: 'get-home-page-services',
        data: {
        },
        success: function (response) {
            if (response.length) {
                let data = "";
                response.forEach(element => {
                    data +=
                        '<div class="col-md-4 mb-4">' +
                        '<div class="our-block">' +
                        '<div class="our-block-figure">' +
                        '<i class="fs-2 ' + element.service_icon + '"></i>' +
                        '</div>' +
                        '<div class="our-content">' +
                        '<h4 class="our-title">' + element.service_name + '</h4>' +
                        '<p class="mb-0">' + element.service_details + '</p>' +
                        '</div>' +
                        '</div >' +
                        '</div >';
                });
                if (data) {
                    $("#ourServices").html(data);
                }
            }
        },
        failure: function (response) {

        }
    });
});