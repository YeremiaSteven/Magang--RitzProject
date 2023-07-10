<!-- Menghubungkan dengan view template master -->

<?php $__env->startSection('content'); ?>

    <div style="background-color:#ffffff"class="container-fluid">
      <br><br><div class="row justify-content-center">
        <div class="col-md-6 text-center">

        <img
            src="<?php echo e(asset('assets/picture').'/'.(Auth::user()->profile_picture)); ?>"
            alt="Foto Profil"
            style="border-radius: 50%; width:150px; height:150px;"
            class="img-fluid mt-3 "/>
            <br><br>
            </a>
          <p class="fw-bold"><?php echo e(Auth::user()->vname); ?></p>
          <p hidden class="fw-bold"><?php echo e(Auth::user()->id_user); ?></p>
          <p styeclass="pb-4"><?php echo e(Auth::user()->email); ?></p>
          <div class="container">
            <div
              class="row p-2 mb-2 fw-bold rounded"
              style="background-color: #6b9bd0"
            >
              <div style="color:white;"class="col text-start">Settings</div>
            </div>
            <div class="row p-2">
              <div class="col text-start"><a style="color:#858796" href="transaction_user/ongoing">
               <i class="fa fa-shopping-bag" aria-hidden="true" style="margin-right: 3px"></i>    My Order
                </a>
              </div>
              <div class="col text-end">
                <i class="fa-solid fa-chevron-right"></i>
              </div>
            </div>
            <div class="row p-2">
              <div class="col text-start"><a style="color:#858796"href="editprofile_form">
                <i class="fa-regular fa-user me-2"></i> Edit profile
                </a>
              </div>
              <div class="col text-end">
                <i class="fa-solid fa-chevron-right"></i>
              </div>
            </div>
            <div class="row p-2">
              <div class="col text-start"><a style="color:#858796"href="address/list">
                <i class="fa-regular fa-address-book me-2"></i> Address List
                </a>
              </div>
              <div class="col text-end">
                <i class="fa-solid fa-chevron-right"></i>
              </div>
            </div>
            <div class="row p-2 mb-2"><a style="color:#858796" href="password_change">
                <div class="col text-start">
                <i class="fa-solid fa-lock me-2"></i> Change Password
                </a>
                </div>
                <div class="col text-end">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
            </div>
            <div class="row p-2 mb-2"><a style="color:#858796" href="" data-bs-toggle="modal" data-bs-target="#member_request">
                <div class="col text-start">
                 <i class="fa-solid fa-users me-2"></i> Member Request
                </a>
                </div>
                <div class="col text-end">
                  <i class="fa-solid fa-chevron-right"></i>
                </div>
            </div>

            <div
              class="row p-2 mb-2 fw-bold rounded"
              style="background-color: #6b9bd0"
            >
              <div style="color:white;"class="col text-start">Help Center</div>
            </div>
            <div class="row p-2">
              <div class="col text-start">
                <i class="fa-solid fa-circle-info me-2"></i>Privacy
              </div>
              <div class="col text-end">
                <i class="fa-solid fa-chevron-right"></i>
              </div>
            </div>
            <div class="row p-2">
              <div class="col text-start">
                <i class="fa-regular fa-comment me-2"></i>FAQ
              </div>
              <div class="col text-end">
                <i class="fa-solid fa-chevron-right"></i>
              </div>
            </div>
            <div class="row p-2">
              <div class="col text-start">
                <i class="fa-solid fa-address-card me-2"></i>About Tokobiru
              </div>
              <div class="col text-end">
                <i class="fa-solid fa-chevron-right"></i>
              </div>
            </div>
            <div class="row p-2 mb-2">
              <div class="col text-start"><a style="color:#858796"href="<?php echo e(url('logout')); ?>">
                <i class="fa-solid fa-right-from-bracket me-2"></i>Logout
                </a>
              </div>
              <div class="col text-end">
                <i class="fa-solid fa-chevron-right"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template_users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/profile_settings.blade.php ENDPATH**/ ?>