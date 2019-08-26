



<div class="sidebar" data-color="purple"  data-image="{{asset('backend/img/sidebar-1.jpg')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="{{route('admin.dashboard')}}" class="simple-text logo-normal">
         Restaurant
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="{{Request::is('admin/dashboard*')? 'active':''}}  ">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class= "{{Request::is('admin/slider*')? 'active':''}} " >
            <a class="nav-link" href="{{route('slider.index')}}">
              <i class="material-icons">slideshow</i>
              <p>Slider</p>
            </a>
          </li>
            <li class="{{Request::is('admin/category*')? 'active':''}} ">
                <a class="nav-link" href="{{route('category.index')}}">
                    <i class="material-icons">category</i>
                    <p>Category</p>
                </a>
            </li>
          <li class="{{Request::is('admin/item*')? 'active':''}} ">
            <a class="nav-link" href="{{route('item.index')}}">
              <i class="material-icons">library_books</i>
              <p>Item</p>
            </a>
          </li>
          <li class="{{Request::is('admin/reservation*')? 'active':''}} ">
            <a class="nav-link" href="{{route('reservation.index')}}">
              <i class="material-icons">chrome_reader_mode</i>
              <p>Reservation</p>
            </a>
          </li>
          <li class="{{Request::is('admin/contact*')? 'active':''}} ">
            <a class="nav-link" href="{{route('contact.index')}}">
              <i class="material-icons">message</i>
              <p>Contact Message</p>
            </a>
          </li>
        </ul>
      </div>
    </div>