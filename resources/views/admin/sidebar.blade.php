<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
    <div class="lami" style="margin-right: 15px;">
        <img src="admin/img/lami.jpg" alt="lami" class="img-fluid rounded-circle">
    </div>
    <div class="title">
        <br>
        <h1 class="h5">Sumaya Akter</h1>
        <p>Web Developer</p>
    </div>
</div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li><a href="{{url('admin/dashboard')}}"> <i class="fas fa-home"></i>Home </a></li>
                <li ><a href="{{url('view_category')}}"> <i class="fas fa-th-list"></i>Category </a></li>
                
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-box-open"></i>Products</a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('add_product')}}">Add Product</a></li>
                    <li><a href="{{url('view_product')}}">View Product</a></li>
                  
                  </ul>
                </li>
                <li><a href="{{url('view_order')}}"> <i class="fas fa-shopping-cart"></i> Orders </a></li>
<li><a href="{{url('subscribers')}}"> <i class="fas fa-users"></i> Subscribers </a></li>
<li><a href="{{url('contact_us')}}"> <i class="fas fa-comments"></i> Feedback </a></li>
<li><a href="{{url('all_messages')}}"> <i class="fas fa-envelope"></i> Messages </a></li>

               
      </nav>