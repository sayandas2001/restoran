<?php $this->load->view('admin/include/head'); ?>

<style>
   input[type="file"] {
   display: block;
   }
   .imageThumb {
   max-height: 75px;
   border: 2px solid;
   padding: 1px;
   cursor: pointer;
   }
   .pip {
   display: inline-block;
   margin: 10px 10px 0 0;
   }
   .img-delete {
   display: block;
   background: #444;
   border: 1px solid black;
   color: white;
   text-align: center;
   cursor: pointer;
   }
   .img-delete:hover {
   background: white;
   color: black;
   }
</style>

<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">New Menu</h4>
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

            <?php if($this->session->flashdata('error_msg')!=""){ ?>

            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('error_msg'); ?>
            </div>

            <?php } ?>

            <?php if($this->session->flashdata('success_msg')!=""){ ?>

            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success_msg'); ?>
            </div>

            <?php } ?>

            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">
                        Create New Menu

                        <a href="<?= admin_url(); ?>menu" class="btn btn-danger float-right">
                            Back
                        </a>
                    </h4>

                    <?php

                    echo form_open_multipart(
                        admin_url().'menu/add',
                        array(
                            'method'=>'post',
                            'name'=>'form1',
                            'id'=>'form1',
                            'class'=>'form-frame',
                            'autocomplete'=>"off"
                        )
                    );

                    ?>

                    <div class="form-group">
                        <label for="category_id" class="col-form-label">
                            Category
                        </label>

                        <select class="form-control" name="category_id" id="category_id">

                            <option value="">Select Category</option>

                            <?php if(!empty($categories)){ ?>

                                <?php foreach($categories as $category){ ?>

                                    <option value="<?= $category->id; ?>">
                                        <?= $category->category_name; ?>
                                    </option>

                                <?php } ?>

                            <?php } ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="item_name" class="col-form-label">
                            Food Name
                        </label>

                        <input
                            class="form-control"
                            type="text"
                            name="item_name"
                            id="item_name"
                            placeholder="Enter food name"
                        >
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-form-label">
                            Description
                        </label>

                        <textarea
                            class="form-control"
                            name="description"
                            id="description"
                            rows="4"
                            placeholder="Enter food description"
                        ></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-form-label">
                            Price
                        </label>

                        <input
                            class="form-control"
                            type="number"
                            name="price"
                            id="price"
                            step="0.01"
                            min="0"
                            placeholder="Enter price"
                        >
                    </div>

                    <div class="form-group">
                        <label for="image" class="col-form-label">
                            Food Image
                        </label>

                        <input
                            class="form-control"
                            type="file"
                            name="image"
                            id="image"
                            accept="image/jpeg,image/jpg,image/png,image/gif,image/webp"
                        >
                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary mt-4 pr-4 pl-4"
                    >
                        Submit
                    </button>

                    <a
                        href="<?= admin_url(); ?>menu"
                        class="btn btn-danger mt-4 ml-3"
                    >
                        Cancel
                    </a>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</div>

<!-- main content area end -->

<!-- footer area start-->

<?php $this->load->view('admin/include/footer'); ?>