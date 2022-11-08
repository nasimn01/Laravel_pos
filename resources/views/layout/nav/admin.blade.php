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
                                                    <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.admin.index')}}">{{__('List')}}</a></li>
                                                    <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.admin.create')}}">{{__('Add New')}}</a></li>
                                                </ul>
                                            </li>
                                            <li class="submenu-item"><a href="#" class='submenu-link'>{{__('Country')}}</a>
                                                <ul class="subsubmenu">
                                                    <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.country.index')}}">{{__('List')}}</a></li>
                                                    <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.country.create')}}">{{__('Add New')}}</a></li>
                                                </ul>
                                            </li>
                                            <li class="submenu-item"><a href="#" class='submenu-link'>{{__('Division')}}</a>
                                                <ul class="subsubmenu">
                                                    <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.division.index')}}">{{__('List')}}</a></li>
                                                    <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.division.create')}}">{{__('Add New')}}</a></li>
                                                </ul>
                                            </li>
                                            <li class="submenu-item"><a href="#" class='submenu-link'>{{__('District')}}</a>
                                                <ul class="subsubmenu">
                                                    <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.district.index')}}">{{__('List')}}</a></li>
                                                    <li class="subsubmenu-item"><a class="subsubmenu-link" href="{{route(currentUser().'.district.create')}}">{{__('Add New')}}</a></li>
                                                </ul>
                                            </li>
                                        </ul>  
                                    </div>
                                </div>
                            </li>
                        </ul>