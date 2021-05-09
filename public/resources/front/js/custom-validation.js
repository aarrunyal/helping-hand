function validateNumber(selector, message = "Field is required") {
    let val = $(selector).val();
    val = Number(val)
    if (val && val != undefined && val != null && !isNaN(val))
        return true
    return displayError(selector, message)
}

function isNotNull(selector, message = "Field is required") {
    let val = $(selector).val();
    if (val && val != undefined && val != null)
        return true
    return displayError(selector, message)
}

// function isValidEmail(selector, message) {
//     let val = $(selector).val();
//     var pattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
//     if (pattern.test(val))
//         return true
//     return displayError(selector, message)
// }

function isChecked(selector, message) {
    let val = $(selector).prop("checked")
    if (val)
        return true
    return displayError(selector, message)
}


function displayError(selector, message) {
    $(selector).css({"border": "1px solid red"});
    $(selector).next('span').remove()
    $(selector).after(`<span class="text-danger">${message}</span>`)
    setTimeout(() => {
        $(selector).css({"border": "1px solid lightgrey"});
        $(selector).next('span').remove()
    }, 3000)
    return false;
}

