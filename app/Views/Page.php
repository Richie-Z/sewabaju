<?= $this->extend("layouts/client") ?>
<?= $this->section("content") ?>
<section class="page-header aboutus_page">
    <div class="container">
        <div class="page-header_wrap">
            <div class="page-heading">
                <h1><?= $data->PageName ?></h1>
            </div>
            <ul class="coustom-breadcrumb">
                <li><a href="#">Home</a></li>
                <li><?= $data->PageName ?></li>
            </ul>
        </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
</section>
<section class="about_us section-padding">
    <div class="container">
        <div class="section-header text-center">
            <h2><?= $data->PageName ?></h2>
            <p><?= $data->detail; ?> </p>
        </div>
    </div>
</section>
<?= $this->endSection() ?>