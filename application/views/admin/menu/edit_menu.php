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
            <h4 class="page-title pull-left">Update Menu </h4>
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
         <div class="card">
            <div class="card-body">
               <h4 class="header-title">Update Menu
                  <a href="<?= admin_url(); ?>menu" class="btn btn-danger float-right">Back</a>
               </h4>
               <?php 
                  echo form_open_multipart(admin_url().'menu/editmenu', array('method'=>'post','name'=>'form1', 'id'=>'form1','class'=>'form-frame', 'autocomplete'=>"off"));
                  ?>
               <input type="hidden" value="<?php echo $menuInfo->id; ?>" name="id" id="id" />

               <div class="form-group">
                     <label for="category_id" class="col-form-label">
                        Category <span class="text-red">*</span>
                     </label>
                     <select class="form-control" name="category_id" id="category_id" required>
                        <option value="">Select Category</option>

                        <?php if (!empty($categories)) { ?>

                              <?php foreach ($categories as $category) { ?>

                                 <option
                                    value="<?php echo $category->id; ?>"
                                    <?php echo ($menuInfo->category_id == $category->id) ? 'selected' : ''; ?>
                                 >
                                    <?php echo $category->category_name; ?>
                                 </option>

                              <?php } ?>

                        <?php } ?>
                     </select>
               </div>
               <div class="form-group">
                  <label for="item_name" class="col-form-label">Item Name </label>
                  <input class="form-control" type="text" name="item_name" id="item_name" value="<?php echo $menuInfo->item_name; ?>">
               </div>
               <div class="form-group">
                        <label for="description" class="col-form-label"> Description</label>
                        <textarea class="form-control" name="description" id="description" rows="4" ><?php echo set_value('description', $menuInfo->description); ?></textarea>
               </div>
               <div class="form-group"> 
                  <label for="price" class="col-form-label"> Price <span class="text-red">*</span> </label> 
                  <input class="form-control" type="text" name="price" id="price" value="<?php echo set_value('price', $menuInfo->price); ?>" required > 
               </div>
               <div class="form-group"> 
                  <label for="image" class="col-form-label"> Food Image </label>
                   <input type="button" class="form-control image-preview-filename" value="<?php echo !empty($menuInfo->image) ? $menuInfo->image : 'No image selected'; ?>" disabled="disabled" > <span class="input-group-btn"> <button type="button" class="btn btn-default image-preview-clear" style="display:none;" > <span class="fa fa-remove"></span> Clear </button> <div class="btn btn-primary image-preview-input"> <span class="fa fa-repeat"></span> <span class="image-preview-input-title"> File Browse </span> <input type="file" accept="image/png,image/jpg,image/jpeg,image/gif,image/webp" id="image" name="image" /> </div> </span> <?php if (!empty($menuInfo->image)) { ?> <div class="mt-3"> <img src="<?php echo base_url('uploads/menu/'.$menuInfo->image); ?>" width="150" height="100" style="object-fit:cover;" > </div> <?php } else { ?> <div class="mt-3"> <img src="<?php echo assets_url(); ?>uploads/blank.jpg" width="100" height="100" > </div> <?php } ?>                    </div>
                     <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" >Submit</button>
                   <a href="<?= admin_url(); ?>menu" class="btn btn-danger mt-4 ml-3">Cancel</a>
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