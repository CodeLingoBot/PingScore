<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Mini-Chat Amélioré</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script>
        var cacheData;
        var data = $('#minichat').html();
        var auto_refresh = setInterval(
        function ()
        {
            $.ajax({
                url: '../../includes/minichat.php',
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
        <script>         
        var cacheData;
        var data = $('#match').html();
        var auto_refresh = setInterval(
        function ()
        {
            $.ajax({
                url: '../../includes/match.php',
                type: 'POST',
                data: data,
                dataType: 'html',
                success: function(data) {
                    if (data !== cacheData){
                        //data has changed (or it's the first call), save new cache data and update div
                        cacheData = data;
                        $('#match').html(data);
                    }         
                }
            })
        }, 300); // check every 300 milliseconds</script>
</head>
<body>
<style>
    #conteneur-global {
        border: solid black;
    }
    #minichat {
        display: inline-block;
        width: 500px;
        padding: 5px;
        border: solid black;
        vertical-align: top;
    }

    #match {
        display: inline-block;
        width: 1000px;
        height: 500px;
        padding: 5px;
        border: solid black;
        vertical-align: top;
    }
</style>
<div id="conteneur-global">
<div id="match">
    LOADING
</div>
<div id="minichat">
    LOADING
</div>

</div>


</body>
</html>