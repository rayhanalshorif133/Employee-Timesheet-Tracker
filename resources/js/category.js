const { toastrWarning } = require("./toastr");

$(function () {
    handleSelectDateRange();
    handleCategoryEditBtn();
    handleCategoryViewBtn();    
});

const handleCategoryViewBtn = () => {
    $(".categoryViewBtn").on('click',function(){
        const id = $(this).attr("data-id");
        axios.get(`/category/fetch/${id}`)
        .then(function(response){
            const data = response.data.data;
            // viewCategoryImage
            if(data.image){
                $(".viewCategoryImage").attr("src",`${data.image}`);
            }else{
                $(".viewCategoryImage").attr("src",`/images/no-image.png`);
            }
            $(".viewCategoryName").text(data.name);
            $(".viewCategoryStartDate").text(data.start_date);
            $(".viewCategoryEndDate").text(data.end_date);
            $(".viewCategoryStatus").text(data.status);
            $(".viewCategoryType").text(data.type);
            data.type == 'gavel_it'? $(".viewCategoryType").addClass('bg-label-success'): $(".viewCategoryType").addClass('bg-label-danger');
            const description = data.description ? data.description : 'No Description';
            $(".viewCategoryDescription").text(description);
        });
    });
}

const handleSelectDateRange = () => {
    
    var today = new Date().toISOString().substr(0, 10);
    var startDate = today;
    var endDate = today;

    $(".category_start_date").val(today);
    $(".category_end_date").val(today);

    $(".category_start_date").on("change", function () {
        startDate = $(this).val();
        $(".category_end_date").val(startDate);
        toastrWarning('Reset End Date');
    });
    $(".category_end_date").on("change", function () {
        endDate = $(this).val();
        if (startDate > endDate) {
            $(".category_start_date").val(endDate);
            toastrWarning('End Date should be less than Start Date');
        }
    });
}

const handleCategoryEditBtn = () => {
    $(".categoryEditBtn").on('click',function(){
        const id = $(this).attr("data-id");
        axios.get(`/category/fetch/${id}`)
            .then(function(response){
                const data = response.data.data;
                console.log(data);
                $("#category_id").val(data.id);
                $("#updateCategoryName").val(data.name);
                $("#updateCategoryStartDate").val(data.start_date);
                $("#updateCategoryEndDate").val(data.end_date);
                $("#updateCategoryStatus").val(data.status);
                $("#updateCategoryType").val(data.type);
                $("#updateCategoryDescription").val(data.description);
            });
    });
}
