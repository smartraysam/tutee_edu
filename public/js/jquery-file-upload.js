var $ = window.$; // use the global jQuery instance
var $fileUpload = $('#fileupload');
var bar = $('.bar');
var percent = $('.percent');
var percentVal;
if ($fileUpload.length > 0) {
    var idSequence = 0;

    // A quick way setup - url is taken from the html tag
    $fileUpload.fileupload({
        maxChunkSize: 1000000,
        method: "POST",
        // Not supported
        sequentialUploads: false,
        formData: function(form) {
            // Append token to the request - required for web routes
            return [{
                name: '_token',
                value: $('input[name=_token]').val()
            }];
        },
        progressall: function(e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            percentVal = progress + '%';
            bar.width(percentVal);
            percent.html(percentVal);

        },
        add: function(e, data) {
            data._progress.theId = 'id_' + idSequence;
            idSequence++;
            toastr.info('Uploading', {
                timeOut: 5000
            });
            percent.html('Uploading');
            $('#video').val(data.files[0].name);
            data.submit();
        },
        done: function(e, data) {
            bar.width(percentVal)
            percent.html("Completed");
            $('#filepath').val(data.result.path);
            toastr.success("Video upload done", {
                timeOut: 5000
            });
            $('#save').prop('disabled', false);
        }
    });
}