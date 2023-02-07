

<!DOCTYPE html>
<html lang="en">
  <head>

  <style type="text/css">
    label {
      display: inline-block;
      width: 200px;
    }
  </style>
    <base href="/public">
    <!-- R  equired meta tags -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

        <div style="align-items: center">
        <form action="{{url('sendmail',$data->id)}}" method="POST" enctype="multipart/form-data" >
          @csrf

          <div style="padding: 15px;">
            <label for="">Mail id</label>
            <input type="text" value="{{$data->email}}" name="mailid" placeholder="Mail id" style="color:black" required="">
          </div>

          <div style="padding: 15px;">
            <label for="">User Name</label>
            <input type="text" value="{{$data->name}}" name="username" placeholder="user's name" style="color:black" required="">
        </div>

        <div style="padding: 15px;">
            <label for="">Greetings</label>
            <input type="text"  name="greeting" placeholder="Greetings" style="color:black" required="">
        </div>

    

          <div style="padding: 15px;">
            <label for="">Body</label>
            <input type="text" style="height:150px;color:black" name="body" placeholder="body"  required="">
          </div>

          <div style="padding: 15px;">
            <label for="">Action Text</label>
            <input type="text"  name="actiontext" placeholder="Action Text" style="color:black" required="">
        </div>

        <div style="padding: 15px;">
            <label for="">Action URL</label>
            <input type="text"  name="actionurl" placeholder="Action URL" style="color:black" required="">
        </div>

        

        <div style="padding: 15px;">
            <label for="">End Part</label>
            <input type="text"  name="endpart" placeholder="End Part" style="color:black" required="">
        </div>

        <div style="padding: 15px;">
    
            <input type="submit"  name="submit">
        </div>

        

        </form>

        </div>
        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    

    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>