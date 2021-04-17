function validateNumber(val, selector, message = "Field is required") {
    val = Number(val)
    if (val && val != undefined && val != null && !isNaN(val))
        return true
    return displayError(selector, message)
}

function isNotNull(val, selector, message = "Field is required") {
    if (val && val != undefined && val != null)
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

