

<!DOCTYPE html>
<html lang="en">
  <head>
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
        
        <form action="{{url('editdoctor',$data->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div style="padding: 15px;">
            <label for="">Doctor Name</label>
            <input type="text" value="{{$data->name}}" name="name" placeholder="doctor's name" style="color:black" >
          </div>

          <div style="padding: 15px;">
            <label for="">Phone Number</label>
            <input type="number" value="{{$data->phone}}" name="phone" placeholder="doctor's number" style="color:black">
          </div>

          <div style="padding: 15px;">
            <label for="">Specialityer</label>
            <input type="text" value="{{$data->speciality}}" name="speciality" placeholder="doctor's speciality" style="color:black">
          </div>



          <div style="padding: 15px;">
            <label for="">Room No</label>
            <input type="number" value="{{$data->room}}" name="room" placeholder="doctor's room" style="color:black" >
          </div>

          <div style="padding: 15px;">
            <label for="">Doctor Images</label>
            <img src="doctorimage/{{$data->image}}" height="190px" width="190px" alt="">
            
          </div>
          <div>
              
            <label for="file">Change Image</label>
            <input type="file" name="file">
             
          </div>

          <div style="padding: 15px;">
            <input type="submit" class="btn btn-success">
          </div>
        </form>

        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    

    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>