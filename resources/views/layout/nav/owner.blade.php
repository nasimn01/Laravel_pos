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
                    <li class="submenu-item"><a href="{{route(currentUser().'.branch.index')}}" class='submenu-link'>{{__('Branch')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.branch.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.branch.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                    <li class="submenu-item"><a href="{{route(currentUser().'.warehouse.index')}}" class='submenu-link'>{{__('Warehouse')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.warehouse.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.warehouse.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                </ul>  
            </div>
        </div>
    </li>
    <li class="menu-item has-sub">
        <a href="#" class='menu-link'>
        <i class="bi bi-box"></i>
            <span>{{__('Products')}}</span>
        </a>
        <div class="submenu ">
            <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
            <div class="submenu-group-wrapper">
                <ul class="submenu-group">
                    
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
                    <li class="submenu-item"><a href="{{route(currentUser().'.plabel')}}" class='submenu-link'>{{__('Product Label')}}</a></li>
                </ul>  
            </div>
        </div>
    </li>
    <li class="menu-item has-sub">
        <a href="#" class='menu-link'>
        <i class="bi bi-cart-plus"></i>
            <span>{{__('Purchases')}}</span>
        </a>
        <div class="submenu ">
            <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
            <div class="submenu-group-wrapper">
                <ul class="submenu-group">
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
    <li class="menu-item has-sub">
        <a href="#" class='menu-link'>
        <i class="bi bi-cart"></i>
            <span>{{__('Sales')}}</span>
        </a>
        <div class="submenu ">
            <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
            <div class="submenu-group-wrapper">
                <ul class="submenu-group">
                    <li class="submenu-item"><a href="{{route(currentUser().'.sales.index')}}" class='submenu-link'>{{__('Sales')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.sales.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.sales.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                </ul>  
            </div>
        </div>
    </li>
    <li class="menu-item has-sub">
        <a href="#" class='menu-link'>
            <i class="bi bi-people-fill"></i>
            <span>{{__('Supplier')}}</span>
        </a>
        <div class="submenu ">
            <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
            <div class="submenu-group-wrapper">
                <ul class="submenu-group">
                    <li class="submenu-item"><a href="{{route(currentUser().'.supplier.index')}}" class='submenu-link'>{{__('Supplier')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.supplier.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.supplier.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                    <li class="submenu-item"><a href="{{route(currentUser().'.customer.index')}}" class='submenu-link'>{{__('Supplier Payment')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.customer.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.customer.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                </ul>  
            </div>
        </div>
    </li>
    <li class="menu-item has-sub">
        <a href="#" class='menu-link'>
        <i class="bi bi-people"></i>
            <span>{{__('Customer')}}</span>
        </a>
        <div class="submenu ">
            <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
            <div class="submenu-group-wrapper">
                <ul class="submenu-group">
                    <li class="submenu-item"><a href="{{route(currentUser().'.customer.index')}}" class='submenu-link'>{{__('Customer')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.customer.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.customer.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                    <li class="submenu-item"><a href="{{route(currentUser().'.customer.index')}}" class='submenu-link'>{{__('Supplier Payment')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.customer.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.customer.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                </ul>  
            </div>
        </div>
    </li>
    <li class="menu-item has-sub">
        <a href="#" class='menu-link'>
        <i class="bi bi-calculator"></i>
            <span>{{__('Accounts')}}</span>
        </a>
        <div class="submenu ">
            <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
            <div class="submenu-group-wrapper">
                <ul class="submenu-group">
                    
                    <li class="submenu-item"><a href="{{route(currentUser().'.master.index')}}" class='submenu-link'>{{__('Master Head')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.master.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.master.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                    <li class="submenu-item"><a href="{{route(currentUser().'.sub_head.index')}}" class='submenu-link'>{{__('Sub Head')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.sub_head.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.sub_head.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                    <li class="submenu-item"><a href="{{route(currentUser().'.child_one.index')}}" class='submenu-link'>{{__('Child One')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.child_one.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.child_one.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                    <li class="submenu-item"><a href="{{route(currentUser().'.child_two.index')}}" class='submenu-link'>{{__('Child Two')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.child_two.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.child_two.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                    <li class="submenu-item"><a href="{{route(currentUser().'.navigate.index')}}" class='submenu-link'>{{__('Navigate View')}}</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.navigate.index')}}">{{__('List')}}</a></li>
                            <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.navigate.create')}}">{{__('Add New')}}</a></li>
                        </ul>
                    </li>
                    
                    
                </ul>  
            </div>
        </div>
    </li>
    <li class="menu-item has-sub">
        <a href="#" class='menu-link'>
        <i class="bi bi-card-checklist"></i>
            <span>{{__('Report')}}</span>
        </a>
        <div class="submenu ">
            <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
            <div class="submenu-group-wrapper">
                <ul class="submenu-group">
                    
                    <li class="submenu-item"><a href="{{route(currentUser().'.report.index')}}" class='submenu-link'>{{__('Purchase Report')}}</a></li>
                    <li class="submenu-item"><a href="{{route(currentUser().'.sreport')}}" class='submenu-link'>{{__('Stock Report')}}</a></li>
                    <li class="submenu-item"><a href="{{route(currentUser().'.salreport')}}" class='submenu-link'>{{__('Sales Report')}}</a></li>
                    
                    
                </ul>  
            </div>
        </div>
    </li>
</ul>