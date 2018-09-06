@extends('font-end.master')
@section('contact')

<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Contact</li>
      </ul>  
      <!-- Contact Us-->
      <h1 class="heading1"><span class="maintext">Liên Hệ</span><span class="subtext"> Contact Us for more</span></h1>
      <div class="row">
        <div class="col-lg-9">
          <form class="form-horizontal"  method="post">
            <input type="hidden" name="_token" value="{!!csrf_token()!!}">
            <fieldset>
              <div class="control-group">
                <label for="name" class="control-label">Name <span class="required">*</span></label>
                <div class="controls">
                  <input type="text"  class="required" id="name" value="" name="name">
                </div>
              </div>
              <div class="control-group">
                <label for="email" class="control-label">Email <span class="required">*</span></label>
                <div class="controls">
                  <input type="email"  class="required email" id="email" value="" name="email">
                </div>
              </div>
              <div class="control-group">
                <label for="message" class="control-label">Message</label>
                <div class="controls">
                  <textarea  class="required" rows="6" cols="40" id="message" name="message"></textarea>
                </div>
              </div>
              <div class="form-actions">
                <input class="btn btn-orange" type="submit" value="Submit" id="submit_id">
                <input class="btn" type="reset" value="Reset">
              </div>
            </fieldset>
          </form>
        </div>
        
        <!-- Sidebar Start-->
        <div class="col-lg-3">
          <aside>
            <div class="sidewidt">
              <h2 class="heading2"><span>---Thông tin liên hệ---</span></h2>
              <p style="margin-left: 25px">
                Phone: (012) 333-7890<br>
                Fax: (123) 444-7890<br>
                Email: test@gmail.com<br>
                Web: testLaravel.com<br>
              </p>
            </div>
          </aside>
        </div>
        <!-- Sidebar End-->
        
      </div>
    </div>
  </section>
</div>
@endsection()