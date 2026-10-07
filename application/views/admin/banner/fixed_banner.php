<?php $this->load->view('admin/include/head'); ?>

<div class="page-title-area">
    <h4 class="page-title">Update Fixed Banner</h4>
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

                    <?php echo form_open_multipart(admin_url() . 'banner/do_edit_bannercontent'); ?>

                    <input type="hidden" name="id" value="<?= $banner->id ?>">

                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title" value="<?= $banner->title ?>">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="4"><?= $banner->description ?></textarea>
                    </div>

                    <!-- <textarea class="form-control" name="description" id="editor1" rows="4"><?= $banner->description ?></textarea> -->

                    <div class="form-group">
                        <label>Banner Image </label>
                        <input type="file" name="banner_image" class="form-control">

                        <?php if(!empty($banner->banner_image)) { ?>
                            <img src="<?= base_url('uploads/banner/'.$banner->banner_image); ?>" width="150" class="mt-2">
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
    
// CKEDITOR.replace('editor1', {
//     height: 350,

//     // allow everything
//     allowedContent: true,
//     extraAllowedContent: '*(*);*{*}',

//     // keep styling on paste
//     pasteFilter: null,
//     forcePasteAsPlainText: false,

//     removeFormatAttributes: '',
//     removeFormatTags: '',

//     extraPlugins: 'clipboard,pastefromword',

//     contentsCss: [
//         '<?= base_url("assets/css/bootstrap.min.css"); ?>',
//         'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css',
//         '<?= base_url("assets/css/site-content-for-ckeditor.css"); ?>'
//     ]
// });


</script>

<?php $this->load->view('admin/include/footer'); ?>
