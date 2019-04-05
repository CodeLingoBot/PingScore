<?php if (isset($_SESSION)): ?>
    <div id="myDropdown" class="container alert alert-danger" style="display: none;">
        <?= debug($_SESSION); ?>
    </div>
<?php endif; ?>

    <div class="text-white fixed-bottom">
        <a id="myBtn" class="dropbtn" onclick="toggle()"><p>&copy; Ping Score 2019</p></a>
    </div>



</body>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Datatables JS -->
    <script type="text/javascript" src="../../vendor/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../vendor/DataTables/media/js/dataTables.bootstrap4.min.js"></script>


    <!-- Scripts for this page -->
    <script src="../../assets/js/scripts.js"></script>


<script>
         function toggle() {
            console.log("$_SESSION");
            $("#myDropdown").slideToggle('slow');
        }

         $(document).ready( function () {
             $('.toast').toast("show")
         } );

</script>
</html>
