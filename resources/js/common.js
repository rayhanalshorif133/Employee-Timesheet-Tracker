
$(function () {
    handleItemDeleteBtn();
});





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
                axios.delete(url);
                location.reload();
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
