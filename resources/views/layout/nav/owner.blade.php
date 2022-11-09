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
                                            <li class="submenu-item"><a href="table.html" class='submenu-link'>{{__('Product')}}</a>
                                                <ul class="subsubmenu">
                                                    <li class="subsubmenu-item"><a class="subsubmenu-link" href="">{{__('List')}}</a></li>
                                                    <li class="subsubmenu-item"><a class="subsubmenu-link" href="">{{__('Add New')}}</a></li>
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
                                        </ul>  
                                    </div>
                                </div>
                            </li>
                        </ul>