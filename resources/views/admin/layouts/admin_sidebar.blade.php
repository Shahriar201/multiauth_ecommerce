<div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> starlight</a></div>
    <div class="sl-sideleft">
      <div class="sl-sideleft-menu">
        <a href="{{ route('admin.home') }}" class="sl-menu-link active">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div>
        </a>
        {{-- <a href="widgets.html" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Cards &amp; Widgets</span>
          </div>
        </a> --}}
        {{-- Category Menu --}}
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Category</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('category') }}" class="nav-link">Category</a></li>
          <li class="nav-item"><a href="{{ route('subCategory') }}" class="nav-link">Sub Category</a></li>
          <li class="nav-item"><a href="{{ route('brand') }}" class="nav-link">Brand</a></li>
        </ul>

        {{-- Coupon Menu --}}
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Coupon</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('coupons') }}" class="nav-link">Coupon</a></li>
        </ul>

        {{-- Product Menu --}}
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">Products</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
          </a>
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('add.product') }}" class="nav-link">Add Product</a></li>
            <li class="nav-item"><a href="{{ route('all.product') }}" class="nav-link">All Product</a></li>
          </ul>

          <!-- Post Category Menu -->
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">Post Category</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
          </a>
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('all.post.category') }}" class="nav-link">Post Category</a></li>
            <li class="nav-item"><a href="{{ route('get.all.post') }}" class="nav-link">Post</a></li>
          </ul>

        {{-- Others Menu --}}
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Others</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('newsletters') }}" class="nav-link">Newsletter</a></li>
        </ul>
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
