<script>

    $('#formDK').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            type: 'post',
            url: '/Register/register',
            data: formData,
            async: false,
            cache: false,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (data) {

                if (data.stt == true) {
                    window.setTimeout(function () {
                        location.reload()
                    }, 1000);
                } else {
                    alert(data.msg);
                }
                //makeSAlert(data,5000);
                //$("#catlist").load(location.href + " #catlist");
                //$("#noti").html(data);
                //window.setTimeout(function(){location.reload()},1000);
            }
        }); //End Ajax
    }); //End submit

</script>