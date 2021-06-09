var $ = window.$; // use the global jQuery instance

var $fileUpload = $('#resumable-browse');
var bar = $('.bar');
var percent = $('.percent');
var percentVal;
var SITEURL = "{{ URL('/') }}";
var isFail=false;
var failCnt=0;
if ($fileUpload.length > 0) {
    var resumable = new Resumable({
        // Use chunk size that is smaller than your maximum limit due a resumable issue
        // https://github.com/23/resumable.js/issues/51
        chunkSize: 1 * 1024 * 1024, // 1MB
        simultaneousUploads: 2,
        testChunks: false,
        throttleProgressCallbacks: 1,
        // Get the url from data-url tag
        target: $fileUpload.data('url'),
        // Append token to the request - required for web routes
        query: {
            _token: $('input[name=_token]').val()
        }
    });

    // Resumable.js isn't supported, fall back on a different method
    if (!resumable.support) {} else {
        // Show a place for dropping/selecting files

        resumable.assignBrowse($fileUpload[0]);
        // Handle file add event
        resumable.on('fileAdded', function(file) {
            // Show progress pabr
            $('#video').val(file.fileName);
            toastr.info('Uploading', {
                timeOut: 5000
            });
            percent.html('Uploading');
            resumable.upload();
        });
        resumable.on('fileSuccess', function(file, message) {
            bar.width(percentVal)
            var res = JSON.parse(message);
            percent.html("Completed");
            $('#filepath').val(res.path);
            $('.video-preview').attr('src', SITEURL + "/" + res.path);
            $('.video-prev').show();
            toastr.success("Video upload done", {
                timeOut: 5000
            });
            $('#save').prop('disabled', false);

        });

        resumable.on('fileRetry', function(file) {
            isFail=false;
            console.log("retry");
            percent.html("Retrying!!!");
            toastr.info("Retrying!!", {
                timeOut: 2000
            });
            resumable.upload();
        });
        resumable.on('fileError', function(file, message) {
             console.log("error");
            console.log(message);
            failCnt++;
            if(failCnt>20){
                 percent.html("Upload fails");
                toastr.error("Video upload fails", {
                timeOut: 3000
                 });
                toastr.clear();
                isFail=true;
                $('#video').val("");
                 resumable.cancel();
            }else{
                  toastr.info("Retrying!!", {
                    timeOut: 2000
                    });
                 percent.html("Retrying!!!");
            }
           
        });
        resumable.on('fileProgress', function(file) {
            if(isFail==false){
                 console.log("uploading");
                var percentComplete = Math.floor(resumable.progress() * 100);
                percentVal = "Uploading " +
                    percentComplete + '%';
                bar.width(percentComplete + "%")
                percent.html(percentVal);
                failCnt=0;
            }
        });
    }

}
