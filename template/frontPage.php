<?php include_once 'include/header.php'; ?>

<!-- 

handleMan@theRightWay badestOne

 -->

<!-- Start Hero -->
<div class="p-5 mb-4 bg-light rounded-3 border border-secondary">
  <div class="container-fluid text-center" style="max-width: 24rem">
    <h1 class="display-2 mb-3 fw-bold text-secondary">Find A job</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">

      <select name="cat_ID" class="form-select form-select-lg mb-4 mx-auto">

        <option selected value="all">Latest Jobs</option>

        <?php foreach ($cats as $cat): ?>

          <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>

        <?php endforeach ?>
        
      </select>
      
      <button type="submit" class="btn btn-success btn-lg d-block w-100">Search</button>
    </form>
  </div>
</div>
<!-- Start Hero -->

<!-- Start Title -->

<h2 class="display-4 mb-4 text-center text-danger">
  <?php echo $title ?>
</h2>

<!-- End Title -->

<!-- Start Jobs -->
<div class="row align-items-md-stretch">

  <!-- Start Foreach -->
  <?php foreach ($jobs as $job): ?>

  <!-- Start One Job -->
  <div class="col-md-6 mb-4">
    <div class="h-100 p-4 bg-light border rounded-3">

      <h2 class="fs-4"><?php echo $job->job_title ?></h2>
      <p>
        <span class="text-secondary fw-bold bi-buildings-fill fs-5"></span> : 
        <span class="badge bg-info">Mehdi.inc</span>
      </p>
      
      <p>
        <?php echo $job->description ?>
      </p>

      <!-- Job Infos Table-->

      <table class="table">
        <tr>
          <td><i class="bi-currency-dollar"></i> Salary</td>
          <td class="py-1"><i class="bi-heart-arrow text-danger fs-5"></i></td>
          <td class="text-end">
            <span class="badge bg-secondary">
              <?php echo SITE_CURRENCY . ' ' . $job->salary ?>
            </span>
          </td>
        </tr>
        
        <tr>
          <td><i class="bi-geo-alt-fill"></i> Location</td>
          <td class="py-1"><i class="bi-heart-arrow text-danger fs-5"></i></td>
          <td class="text-end"><span class="badge bg-primary"><?php echo $job->location ?></span></td>
        </tr>
        
        <tr>
          <td><i class="bi-envelope-fill"></i> Company</td>
          <td class="py-1"><i class="bi-heart-arrow text-danger fs-5"></i></td>
          <td class="text-end"><span class="badge bg-primary"><?php echo $job->contact_email ?></span></td>
        </tr>

      </table>

      <!-- End Job Infos Table -->

      <!-- Job Buttons -->

      <div class="row">

        <div class="col-6">
          <a class="btn btn-warning border border-dark btn-sm d-inline d-md-block d-lg-inline mb-md-2 d-sm-inline" href="#">Detail</a>
          <a class="btn btn-success btn-sm d-inline d-md-block d-lg-inline mb-md-2 d-sm-inline" href="#">
            Apply
            <span class="badge bg-light text-dark border border-dark">21</span>
          </a>
        </div>

        <div class="col-6 text-end">
          <span>
            <span class="text-small">
              <!-- View : (1 H : 30 M) -->
              <?php echo $job->date ?>
            </span>
            <i class="bi-hourglass-split ms-2 text-danger fs-5"></i>
          </span>
        </div>

      </div>

      <!-- End Job Buttons -->

    </div>

  </div>
  <!-- End One Job -->

  <?php endforeach ?>

</div>
<!-- End Jobs -->

<?php include_once 'include/footer.php'; ?>
