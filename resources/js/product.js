const { toastrWarning,toastrSuccess } = require("./toastr");

$(function () {
    handleSelectDateRange();
    handleProductOneImageDelete();
});


const handleProductOneImageDelete = () => {
    $(".productOneImageDelete").on("click", function () {
        const id = $(this).attr("data-productId");
        const image = $(this).attr("data-image");
        const thisBtn = $(this);
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
                axios.delete(`/product/delete-image`, {
                    data: {
                        id: id,
                        image: image
                    }
                }).then(function (res) {
                        thisBtn.parent().remove();
                        toastrSuccess('Image deleted successfully');
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

const handleSelectDateRange = () => {

    var today = new Date().toISOString().substr(0, 10);
    var startDate = today;
    var endDate = today;

    $(".product_start_date").val(today);
    $(".product_end_date").val(today);

    $(".product_start_date").on("change", function () {
        startDate = $(this).val();
        $(".product_end_date").val(startDate);
        toastrWarning('Reset End Date');
    });
    $(".product_end_date").on("change", function () {
        endDate = $(this).val();
        if (startDate > endDate) {
            $(".product_start_date").val(endDate);
            toastrWarning('End Date should be less than Start Date');
        }
    });
}
