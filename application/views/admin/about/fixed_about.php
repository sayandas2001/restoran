<?php $this->load->view('admin/include/head'); ?>

<div class="page-title-area">
    <h4 class="page-title">Update Fixed About</h4>
</div>

<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-5">

            <?php if($this->session->flashdata('success_msg')): ?>
                <div class="alert alert-success"><?= $this->session->flashdata('success_msg'); ?></div>
            <?php endif; ?>

            <?php if($this->session->flashdata('error_msg')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('error_msg'); ?></div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">

                    <?php echo form_open_multipart(admin_url() . 'about/do_edit_aboutcontent'); ?>

                    <input type="hidden" name="id" value="<?= $about->id ?>">

                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title" value="<?= $about->title ?>">
                    </div>

                    <!-- <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="4"><?= $about->description ?></textarea>
                    </div> -->

                    <textarea class="form-control" name="description" id="editor1" rows="4"><?= $about->description ?></textarea>

                    <div class="form-group">
                        <label>Experince</label>
                        <input class="form-control" name="experince" value="<?= $about->experince ?>">
                    </div>

                    <div class="form-group">
                        <label>Chefs</label>
                        <input class="form-control" name="chefs" value="<?= $about->chefs ?>">
                    </div>

                    <div class="form-group">
                        <label>About Image 1</label>
                        <input type="file" name="about_img1" class="form-control">

                        <?php if(!empty($about->about_img1)) { ?>
                            <img src="<?= base_url('uploads/about/'.$about->about_img1); ?>" width="150" class="mt-2">
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>About Image 2</label>
                        <input type="file" name="about_img2" class="form-control">

                        <?php if (!empty($about->about_img2)) { ?>
                            <div class="mt-2">
                                <img src="<?= base_url('uploads/about/' . $about->about_img2); ?>"
                                    width="150"
                                    height="100"
                                    style="object-fit: cover;">
                            </div>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>About Image 3</label>
                        <input type="file" name="about_img3" class="form-control">

                        <?php if (!empty($about->about_img3)) { ?>
                            <div class="mt-2">
                                <img src="<?= base_url('uploads/about/' . $about->about_img3); ?>"
                                    width="150"
                                    height="100"
                                    style="object-fit: cover;">
                            </div>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>About Image 4</label>
                        <input type="file" name="about_img4" class="form-control">

                        <?php if (!empty($about->about_img4)) { ?>
                            <div class="mt-2">
                                <img src="<?= base_url('uploads/about/' . $about->about_img4); ?>"
                                    width="150"
                                    height="100"
                                    style="object-fit: cover;">
                            </div>
                        <?php } ?>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

 <script>
    //CKEDITOR.replace('editor1');

    // CKEDITOR.replace('editor1', {
    //     height: 350,

    //     // IMPORTANT — disable filtering
    //     allowedContent: true,
    //     extraAllowedContent: '*(*);*{*}',    // allow all classes + inline styles

    //     // KEEP STYLES ON PASTE
    //     pasteFilter: null,
    //     forcePasteAsPlainText: false,

    //     // Disable removing content on paste
    //     removeFormatAttributes: '',
    //     removeFormatTags: '',

    //     // Optional but useful
    //     extraPlugins: 'clipboard,pastefromword',

    //     // To preview correct design inside editor
    //     contentsCss: [
    //         '<?= base_url("assets/css/bootstrap.min.css"); ?>',
    //          'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css',
    //         '<?= base_url("assets/css/site-content-for-ckeditor.css"); ?>'
    //     ]
    // });
    // });
CKEDITOR.replace('editor1', {
    height: 350,

    // allow everything
    allowedContent: true,
    extraAllowedContent: '*(*);*{*}',

    // keep styling on paste
    pasteFilter: null,
    forcePasteAsPlainText: false,

    removeFormatAttributes: '',
    removeFormatTags: '',

    extraPlugins: 'clipboard,pastefromword',

    contentsCss: [
        '<?= base_url("assets/css/bootstrap.min.css"); ?>',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css',
        '<?= base_url("assets/css/site-content-for-ckeditor.css"); ?>'
    ]
});


</script>

<?php $this->load->view('admin/include/footer'); ?>
