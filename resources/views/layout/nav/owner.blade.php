<ul>
    <li
        class="menu-item  ">
        <a href="{{route(currentUser().'.dashboard')}}" class='menu-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{__('dashboard') }}</span>
        </a>
    </li>

    <li class="menu-item has-sub">
        <a href="#" class='menu-link'>
            <i class="bi bi-gear"></i>
            <span>{{__('Settings')}}</span>
        </a>
        <div class="submenu ">
            <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
            <div class="submenu-group-wrapper">
                <ul class="submenu-group">
                    <li class="submenu-item"><a href="#" class='submenu-link'>{{__('User')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.users.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.users.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                </ul>  
            </div>
        </div>
    </li>
    <li class="menu-item has-sub">
        <a href="#" class='menu-link'>
        <i class="bi bi-table"></i>
            <span>{{__('Table')}}</span>
        </a>
        <div class="submenu ">
            <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
            <div class="submenu-group-wrapper">
                <ul class="submenu-group">
                    <li class="submenu-item"><a href="{{route(currentUser().'.branch.index')}}" class='submenu-link'>{{__('Branch')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.branch.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.branch.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                    <li class="submenu-item"><a href="{{route(currentUser().'.category.index')}}" class='submenu-link'>{{__('Category')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.category.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.category.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                    <li class="submenu-item"><a href="{{route(currentUser().'.subcategory.index')}}" class='submenu-link'>{{__('Sub Category')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.subcategory.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.subcategory.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                    <li class="submenu-item"><a href="{{route(currentUser().'.childcategory.index')}}" class='submenu-link'>{{__('Child Category')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.childcategory.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.childcategory.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                    <li class="submenu-item"><a href="{{route(currentUser().'.brand.index')}}" class='submenu-link'>{{__('Brand')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.brand.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.brand.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                    <li class="submenu-item"><a href="{{route(currentUser().'.product.index')}}" class='submenu-link'>{{__('Products')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.product.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.product.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                    <li class="submenu-item"><a href="{{route(currentUser().'.supplier.index')}}" class='submenu-link'>{{__('Suppliers')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.supplier.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.supplier.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                    <li class="submenu-item"><a href="{{route(currentUser().'.customer.index')}}" class='submenu-link'>{{__('Customers')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.customer.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.customer.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                    <li class="submenu-item"><a href="{{route(currentUser().'.purchase.index')}}" class='submenu-link'>{{__('Purchases')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.purchase.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.purchase.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                </ul>  
            </div>
        </div>
    </li>
</ul>