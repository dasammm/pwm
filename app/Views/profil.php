<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?= $this->include('layout/sidebar'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?= $this->include('layout/topbar'); ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="row">
                    <div class="wrappers bg-white mt-sm-2">
                        <h4 class="pb-4 border-bottom">Profil</h4>
                        <div class="d-flex align-items-start py-3 border-bottom"> <img src="https://images.pexels.com/photos/1037995/pexels-photo-1037995.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="img-profile" alt="">
                            <div class="pl-sm-4 pl-2" id="img-section"> <b>Profile Photo</b>
                                <p>Accepted file type .png. Less than 1MB</p> <button class="btn button border"><b>Upload</b></button>
                            </div>
                        </div>
                        <div class="py-2">
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <label class="profil" for="firstname">Kode Pelanggan</label>
                                    <input type="text" class="bg-light form-control" placeholder="">
                                </div>
                                <div class="col-md-6 pt-md-0 pt-3">
                                    <label for="lastname">Nama Lengkap</label>
                                    <input type="text" class="bg-light form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-12">
                                    <label class="profil" for="email">Alamat</label>
                                    <textarea name="alamat" class="bg-light form-control" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-6"> <label class="profil" for="country">Country</label> <select name="country" id="country" class="bg-light">
                                        <option value="india" selected>India</option>
                                        <option value="usa">USA</option>
                                        <option value="uk">UK</option>
                                        <option value="uae">UAE</option>
                                    </select> </div>
                                <div class="col-md-6 pt-md-0 pt-3" id="lang"> <label class="profil" for="language">Language</label>
                                    <div class="arrow"> <select name="language" id="language" class="bg-light">
                                            <option value="english" selected>English</option>
                                            <option value="english_us">English (United States)</option>
                                            <option value="enguk">English UK</option>
                                            <option value="arab">Arabic</option>
                                        </select> </div>
                                </div>
                            </div>
                            <div class="py-3 pb-4 border-bottom">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                            <div class="d-sm-flex align-items-center pt-3">
                                <div> <b>Deactivate your account</b>
                                    <p>Details about your company account</p>
                                </div>
                                <div class="ml-auto">
                                    <button class="btn btn-outline-danger">Deactivate</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?= $this->include('layout/footer'); ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<?= $this->endsection(); ?>