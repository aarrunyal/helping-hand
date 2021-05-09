function ajaxCall(type, url, dataType, data, selector, success_method, error_method) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: type,
        dataType: dataType,
        data: data,
        success: function (response) {
            success_method(response, selector);
        },
        error: function (response) {
            error_method(response);
        },
        statusCode: {
            403: function (xhr) {
                error_method(xhr.responseText);
            }
        }
    });
}
