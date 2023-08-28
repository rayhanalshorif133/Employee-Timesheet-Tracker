export const toastrSuccess = (msg = 'success') => {
    $(".toastr-success").removeClass('hide').addClass('show');
    $(".toastr-msg").text(msg);

    setTimeout(() => {
        $(".toastr-success").removeClass('show').addClass('hide');
    }, 3000);
    return true;
}


export const toastrInfo = (msg = 'info') => {
    $(".toastr-info").removeClass('hide').addClass('show');
    $(".toastr-msg").text(msg);

    setTimeout(() => {
        $(".toastr-info").removeClass('show').addClass('hide');
    }, 3000);
    return true;
}

export const toastrWarning = (msg = 'Warning') => {
    $(".toastr-warning").removeClass('hide').addClass('show');
    $(".toastr-msg").text(msg);

    setTimeout(() => {
        $(".toastr-warning").removeClass('show').addClass('hide');
    }, 3000);
    return true;
}
export const toastrError = (msg = 'Error') => {
    $(".toastr-error").removeClass('hide').addClass('show');
    $(".toastr-msg").text(msg);

    setTimeout(() => {
        $(".toastr-error").removeClass('show').addClass('hide');
    }, 3000);
    return true;
}