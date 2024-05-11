
function sendRequest() {

    $(formId).submit(function (e) {
        e.preventDefault();

        for (instance in CKEDITOR.instances) {
            if (CKEDITOR.instances.en) {
                CKEDITOR.instances.en.updateElement();
            }
            if (CKEDITOR.instances.ar) {
                CKEDITOR.instances.ar.updateElement();
            }
        }

        const action = $(this).attr("action");
        let form = $(this);
        let formData = new FormData($(this)[0]);
        let submitHtml = '';

        $.ajax({
            url: action
            , data: formData
            , type: 'POST'
            , processData: false
            , contentType: false
            , cache: false
            , beforeSend: function () {
                submitHtml = form.find('.submit').html();
                form.find('.submit').attr('type', 'button');
                form.find('.submit').attr('disabled', true);
                form.find('.submit').html(`
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    `);
            }
            , success: function (res) {
                form[0].reset();
                if (res.status == true) {
                    toastr.success(res.message);
                    location.reload();
                }
            }
            , complete: function (response) {
                let res = $.parseJSON(response.responseText);
                if (res.status == false) {
                    toastr.error(res.message);
                    location.reload();
                }
                form.find('.submit').attr('type', 'submit');
                form.find('.submit').attr('disabled', false);
                form.find('.submit').html(submitHtml);
            }
            , error: function (reject, key) {
                let res = $.parseJSON(reject.responseText);
                $.each(res.errors, function (key, value) {
                    // $("#" + key).text(value[0]);
                    toastr.error(value[0]);
                });
            }
        });
    });

}
