
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
                contentType: false,
                processData: false,
                success: function (data) {

                    //makeSAlert(data,5000);
                    //$("#catlist").load(location.href + " #catlist");
                    //$("#noti").html(data);
                    //window.setTimeout(function(){location.reload()},1000);
                }
            }); //End Ajax
        }); //End submit

</script>