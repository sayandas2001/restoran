<?php $this->load->view('admin/include/head'); ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
a.btn:hover {
-webkit-transform: scale(1.1);
-moz-transform: scale(1.1);
-o-transform: scale(1.1);
}
a.btn {
-webkit-transform: scale(0.8);
-moz-transform: scale(0.8);
-o-transform: scale(0.8);
-webkit-transition-duration: 0.5s;
-moz-transition-duration: 0.5s;
-o-transition-duration: 0.5s;
}
</style>

<div class="page-title-area">
    <div class="row align-items-center">

        <div class="col-sm-6">

            <div class="breadcrumbs-area clearfix">

                <h4 class="page-title pull-left">
                    Menu List
                </h4>

            </div>

        </div>

        <div class="col-sm-6 clearfix">

            <div class="search-ar pull-right">
            </div>

        </div>

    </div>
</div>

<div class="main-content-inner">

    <div class="row">

        <div class="col-12 mt-5">

            <?php if ($this->session->flashdata('success_msg') != "") { ?>

                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success_msg'); ?>
                </div>

            <?php } ?>

            <?php if ($this->session->flashdata('error_msg') != "") { ?>

                <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('error_msg'); ?>
                </div>

            <?php } ?>

            <div class="card">

                <div class="card-body">

                    <h4 class="header-title">

                        Menu List

                        <a href="<?= admin_url() ?>menu/add" class="btn btn-info float-right">
                            + Add New Menu
                        </a>

                    </h4>

                    <div class="single-table">

                        <div class="col-sm-12 table-responsive">

                            <table class="table table-striped table-bordered" width="100%">

                                <thead class="bg-light text-capitalize">

                                    <tr>
                                        <th>Category</th>
                                        <th>Item Name</th>
                                        <th>Item Image</th>
                                        <th>Action</th>
                                    </tr>

                                </thead>

                                <tbody>

                                    <?php if (!empty($allitem)) { ?>

                                        <?php foreach ($allitem as $value) { ?>

                                            <tr>

                                                <td>
                                                    <?php echo $value->category_name; ?>
                                                </td>

                                                <td>
                                                    <?php echo $value->item_name; ?>
                                                </td>

                                                <td>

                                                    <?php if (!empty($value->image)) { ?>

                                                        <img
                                                            src="<?php echo base_url('uploads/menu/' . $value->image); ?>"
                                                            style="height: 79px; width: 104px; object-fit: cover;"
                                                        >

                                                    <?php } else { ?>

                                                        No Image

                                                    <?php } ?>

                                                </td>

                                                <td>

                                                    <a href="<?php echo admin_url(); ?>menu/update/<?php echo $value->id; ?>">
                                                        <span class="glyphicon glyphicon-edit"></span>
                                                    </a>

                                                    <a href="<?php echo admin_url(); ?>menu/delete/<?php echo $value->id; ?>">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </a>

                                                </td>

                                            </tr>

                                        <?php } ?>

                                    <?php } else { ?>

                                        <tr>
                                            <td colspan="4" style="text-align: center;">
                                                No data found.
                                            </td>
                                        </tr>

                                    <?php } ?>

                                </tbody>

                            </table>

                            <?php echo $this->pagination->create_links(); ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

<?php $this->load->view('admin/include/footer'); ?>