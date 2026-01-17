// Fontend Script

// Glubal Modal
$('.g_modal').click(function () {
    var url = $(this).attr('data-bs-url') || 'modal-url';
    var method = $(this).attr('data-bs-method') || 'get';
    var size = $(this).attr('data-bs-size') || 'modal-lg';

    $.ajax({
        url: url,
        type: method,
        dataType: 'html',
        success: function (data) {
            $('#modal-size').addClass(size);
            $('#modal_html').html(data);
        },
        error: function (xhr, status, error) {
            console.log(status);
            console.log(error);
        },
    });
});
// End Glubal Modal

// For App Notification
$(document).ready(function () {
    if ($('#app_notification').length) {
        setTimeout(function () {
            $('#app_notification').fadeOut();
        }, 3000);
    }
});

$(document).ready(function () {
    $('#Category').on('change', function () {
        const categoryId = $(this).val();
        if (categoryId) {
            $.ajax({
                url: '/roots_&_wings/manage/get-subcategories/' + categoryId,
                type: 'GET',
                success: function (data) {
                    let subCategorySelect = $('#SubCategory');
                    subCategorySelect.empty(); // Clear existing options
                    subCategorySelect.append('<option value="">Select Subcategory</option>'); // Default option

                    data.forEach(function (subcategory) {
                        subCategorySelect.append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                    });
                },
                error: function (xhr) {
                    console.error('Error fetching subcategories:', xhr);
                }
            });
        } else {
            $('#InputSubCategory').empty().append('<option value="">Select Subcategory</option>');
        }
    });
});




































// Backend Script






