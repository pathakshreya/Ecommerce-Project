<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                        E-commerce Shop
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item {{ Request::is('dashboard') ? 'active':''}}">
                        <a class="nav-link" href="{{url('dashboard')}}">
                            <i class="fa fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('categories') ? 'active':''}}">
                        <a class="nav-link" href="{{url('categories')}}">
                            <i class="fa fa-list"></i>
                            <p>Category</p>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('add-category') ? 'active': ''}}">
                        <a class="nav-link" href="{{url('add-category')}}">
                            <i class="fa fa-book"></i>
                            <p>Add Category</p>
                        </a>
                    </li>

                    <li class="nav-item {{ Request::is('product') ? 'active':''}}">
                        <a class="nav-link" href="{{url('/product')}}">
                            <i class="fa fa-list"></i>
                            <p>Product</p>
                        </a>
                    </li>

                    <li class="nav-item {{ Request::is('add-product') ? 'active':''}}">
                        <a class="nav-link" href="{{url('add-product')}}">
                            <i class="fa fa-book"></i>
                            <p>Add Product</p>
                        </a>
                    </li>

                    <li class="nav-item {{ Request::is('order') ? 'active':''}}">
                        <a class="nav-link" href="{{url('order')}}">
                            <i class="fa fa-list"></i>
                            <p>View Order</p>
                        </a>
                    </li>
              
                        </a>
                    </li>
                </ul>
            </div>
        </div>