<section class="login-block m-5 p-5 " style="text-align: center;">
  <div class="container">
    <div class="row">
      <div class="col-md-4 login-sec">
        <!-- <h3 class="text-center"><b>Login Now</b></h3> -->
        <form action="index.php?action=forgetps&act=forgetps_action" class="login-form" method="post">

          <div class="form-group">
            <label for="exampleInputEmail1" class="text-uppercase">Enter Email Address To Send Password Link</label>
            <input  type="text" class="form-control" name="email" placeholder="">
          </div>
          <div class="form-check">
            <input style="height: 50px; width: 50px; background-color: red; color: white;" type="submit" name="submit_email" value="Gửi">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>