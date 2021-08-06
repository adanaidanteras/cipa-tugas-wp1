<?php

require __DIR__."/layout/header.php";

function getMetaTitle(){
    echo "Home";
}

?>
<div class="container py-5">
    <div class="row justify-content-center mt-5 mb-3">
        <div class="col-lg-12 text-center">
            <img src="<?=$base_url?>assets/img/logocipa.png" alt="" width="128px" class="mb-4">
        </div>
        <div class="col-auto mt-3">
            <div class="mt-3 mb-3 font-weight-bold">
                <i class="fas fa-check-circle fa-fw text-primary mr-2"></i> Easy Checking
            </div>
            <div class="mt-3 mb-3 font-weight-bold">
                <i class="fas fa-check-circle fa-fw text-primary mr-2"></i> Easy Tracking
            </div>
            <div class="mt-3 mb-3 font-weight-bold">
                <i class="fas fa-check-circle fa-fw text-primary mr-2"></i> Easy Parking
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5 mb-3">
        <div class="col-lg-4 text-center mt-3">
            <a href="<?=$base_url?>parkiran/cari.php" class="btn btn-primary btn-block">Cari Parkir Sekarang</a>
        </div>
    </div>
</div>

<?php

require __DIR__."/layout/footer.php";

?>