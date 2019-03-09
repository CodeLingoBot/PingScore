<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Mini-Chat Amélioré</title>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script>
        var cacheData;
        var data = $('#minichat').html();
        var auto_refresh = setInterval(
        function ()
        {
            $.ajax({
                url: 'minichat.php',
                type: 'POST',
                data: data,
                dataType: 'html',
                success: function(data) {
                    if (data !== cacheData){
                        //data has changed (or it's the first call), save new cache data and update div
                        cacheData = data;
                        $('#minichat').html(data);
                    }         
                }
            })
        }, 300); // check every 300 milliseconds
        </script>
</head>
<body>

<div id="minichat">
LOADING
</div>
</body>
</html>