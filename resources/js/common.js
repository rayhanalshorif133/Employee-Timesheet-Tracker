import { toastrError, toastrSuccess } from "./toastr";

$(function () {
    handleItemEditBtn();
    handleItemDeleteBtn();
});

const handleItemEditBtn = () => {
    // itemEditBtn
    $(".itemEditBtn").on('click', function () {
        // remove all class
        $(this).removeClass();
        // add class
        $(this).addClass("itemCheckBtn btn btn-sm btn-outline-success");
        $(this).find('i').removeClass('bx-edit-alt').addClass('bx-check');
        $(this).parent().parent().parent().find('.name').addClass('d-none');
        $(this).parent().parent().parent().find('.nameInput').removeClass('d-none').focus();
        handleItemCheckBtn();
    });


}

const handleItemCheckBtn = () => {
    $(".itemCheckBtn").on('click', function () {
        const id = $(this).attr("data-id");
        const url = $(this).attr("data-url");
        const inputValue = $(this).parent().parent().parent().find('.nameInput');
        const name = $(this).parent().parent().parent().find('.name');
        const addedByName = $(this).parent().parent().parent().find('.addedByName');
        // remove this class
        $(this).removeClass();
        // add class
        $(this).addClass("itemEditBtn btn btn-sm btn-outline-info");
        $(this).find('i').removeClass('bx-check').addClass('bx-edit-alt');
        name.removeClass('d-none');
        inputValue.addClass('d-none');
        const inputName = inputValue.find('input').val();

        if(inputName == '') {
            toastrError('Name is required');
            return;
        }

        axios.put(url, {
            id: id,
            name: inputName
        }).then(function (response) {
            const {data,status,message} = response.data;
            name.text(data.name);
            addedByName.text(data.added_by?.username);
            status == true ? toastrSuccess(message) : toastrError(message);
        });
        handleItemEditBtn();
    });
}


const handleItemDeleteBtn = () => {
    $(".itemDeleteBtn").on('click', function () {
        const url = $(this).parent().attr("data-url");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(url)
                    .then(function (res) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        location.reload();
                    });
            } else {
                Swal.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    });
}
