<?php if (isset($_SESSION)): ?>
    <div id="myDropdown" class="container alert alert-danger" style="display: none;">
        <?= debug($_SESSION); ?>
    </div>
<?php endif; ?>

    <div class="text-white fixed-bottom">
        <a id="myBtn" class="dropbtn" onclick="toggle()"><p>&copy; Ping Score 2019</p></a>
    </div>

</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        function toggle() {
            console.log("$_SESSION");
            $("#myDropdown").slideToggle('slow');
        }
    </script>
</html>
