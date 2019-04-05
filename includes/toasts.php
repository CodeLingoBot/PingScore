<!-- Toast -->
<div class="" aria-live="polite" aria-atomic="true" style="position: absolute; min-height: 200px; z-index: 1;">
    <!-- Position it -->
    <div style="position: fixed; bottom: 5%; right: 2%;">
        <?php if(isset($_SESSION['flash'])): ?>
            <?php foreach ($_SESSION['flash'] as $type => $message): ?>
                <!-- Then put toasts within -->
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false" style="min-width: 350px;">
                    <div class="toast-header">
                        <img src="../../assets/img/logo_projet.png" class="rounded mr-2" alt="..." style="width: 20px;">
                        <strong class="mr-auto"><span class="badge badge-<?= $type; ?>" style="font-size: 13px">Message d'information</span></strong>
                        <small class="text-muted">just now</small>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        <?= $message ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
    </div>
</div>
