<?php $__env->startSection('title',"Edit Admin"); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<a href="<?php echo e(url('/admin-list')); ?>">Partners List</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(url('/public')); ?>/assets/vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-lg-12">

		<!--begin::Portlet-->
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
							<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							Edit Admin
						</h3>
					</div>
				</div>
			</div>

			<!--begin::Form-->
			<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="add_partner" method="post" action="<?php echo e(route('edit-admin',$userObj->id)); ?>" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>
				<div class="m-portlet__body">
					<div class="form-group m-form__group row">
						<div class="col-lg-6">
							<label>First Name:</label>
							<input type="text" class="form-control m-input" value="<?php echo e($userObj->firstname); ?>" id="firstname" name="firstname" placeholder="Enter first name">
							<?php if($errors->has('firstname')): ?>
			                  	<span class="m-form__help"><?php echo e($errors->first('firstname')); ?></span>
			              	<?php endif; ?>
						</div>
						<div class="col-lg-6">
							<label>Last Name:</label>
							<input type="text" class="form-control m-input" value="<?php echo e($userObj->lastname); ?>" id="lastname" name="lastname" placeholder="Enter last name">
							<?php if($errors->has('lastname')): ?>
			                  	<span class="m-form__help"><?php echo e($errors->first('lastname')); ?></span>
			              	<?php endif; ?>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<div class="col-lg-6">
							<label>Email:</label>
							<input type="email" class="form-control m-input" value="<?php echo e($userObj->email); ?>" id="email" name="email" placeholder="Enter an email address">
							<?php if($errors->has('email')): ?>
			                  	<span class="m-form__help"><?php echo e($errors->first('email')); ?></span>
			              	<?php endif; ?>
						</div>
						<div class="col-lg-6">
							<label>Address:</label>
							<textarea class="form-control m-input" id="address" name="address" placeholder="Enter address"><?php echo e($userObj->address); ?></textarea>
							<?php if($errors->has('address')): ?>
			                  	<span class="m-form__help"><?php echo e($errors->first('address')); ?></span>
			              	<?php endif; ?>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<div class="col-lg-6">
							<label>Phone:</label>
							<input type="text" class="form-control m-input" value="<?php echo e($userObj->phone); ?>" id="phone" name="phone" placeholder="Enter Phone">
							<?php if($errors->has('phone')): ?>
			                  	<span class="m-form__help"><?php echo e($errors->first('phone')); ?></span>
			              	<?php endif; ?>
						</div>
						<div class="col-lg-6">
							<label>Fax:</label>
							<input type="text" class="form-control m-input" value="<?php echo e($userObj->fax); ?>" id="fax" name="fax" placeholder="Enter Fax">
							<?php if($errors->has('fax')): ?>
			                  	<span class="m-form__help"><?php echo e($errors->first('fax')); ?></span>
			              	<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
					<div class="m-form__actions m-form__actions--solid">
						<div class="row">
							<div class="col-lg-10"></div>
							<div class="col-lg-2">
								<button type="submit" class="btn btn-info">Save</button>
								<a href="javascript:void(0)" onclick="back()" class="btn btn-secondary">Back</a>
							</div>
						</div>
					</div>
				</div>
			</form>

			<!--end::Form-->
		</div>

		<!--end::Portlet-->
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
   $(document).ready(function(){
      $("#add_partner").validate({
         rules:{
            email:{
               required:true,
               email:true,
            },
            firstname:{
         		required:true
         	},
         	lastname:{
         		required:true
         	},
         	address:{
         		required:true
         	},
         	phone:{
         		required:true
         	},
         	max_code:{
         		required:true
         	},

         },
         messages:{
            email:{
               required:"Please enter your email",
               email:"Please enter your valid email",
            },
            firstname:{
         		required:"Please enter firstname"
         	},
         	lastname:{
         		required:"Please enter lastname"
         	},
         	address:{
         		required:"Please enter address"
         	},
         	phone:{
         		required:"Please enter phone"
         	},
         	max_code:{
         		required:"Please enter max no. of codes"
         	},
         }
      })
   });
   function back(){
		swal({
            title: "There are unsaved content, are you sure you want to leave?",
            type: 'question',
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "Cancel",
            reverseButtons: true
        }).then(function(result){
            if (result.value) {
                window.location.href = "<?php echo e(url('admin-list')); ?>"
            }
    	});
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hqpyj8xflnii/public_html/prod/resources/views/admin/user/edit.blade.php ENDPATH**/ ?>