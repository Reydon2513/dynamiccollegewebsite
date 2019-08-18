<!-- Sidebar Start -->

<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">

                    <li class="list">
                        <a class='text-dark' href="<?php echo site_url().'/admin/index'?>"><i class="menu-icon fa fa-tachometer"></i>Dashboard</a>
                    </li>
    
                    <li class='list'>
                        <a class='text-dark' href="<?php echo site_url().'/admin/info'?>"><i class="menu-icon fa fa-info-circle"></i>College Information</a>
                    </li>

                    <li class='list'>
                        <a class='text-dark' href="<?php echo site_url().'/admin/slideshow'?>"><i class="menu-icon fa fa-file-image-o"></i>Slideshow</a>
                    </li>

                    <!-- <li class='list'>
                        <a class='text-dark' href="<?php echo site_url().'/admin/gallery'?>"><i class="menu-icon fa fa-picture-o"></i>Gallery</a>
                    </li> -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle text-dark" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"> <i class="menu-icon fa fa-picture-o"></i>Gallery</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li> 
                            <i class="fa fa-plus-circle"></i><a class='text-dark' href="<?php echo site_url().'/admin/add_gallery_category';?>">Add Category</a>
                            </li>
                            <li>
                            <i class="menu-icon fa fa-picture-o"></i><a class='text-dark' href="<?php echo site_url().'/admin/gallery'?>">Add Images</a>
                            </li>
                            
                        </ul>
                    </li>

                    <!-- <li class='list'>
                        <a href="browse_department.php"><i class="menu-icon fa fa-building"></i>Staff</a>
                    </li> -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle text-dark" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Staff</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user-plus"></i><a class='text-dark' href="<?php echo site_url().'/admin/staff'?>">Add Staff</a></li>
                            <li><i class="fa fa-table"></i><a class='text-dark' href="<?php echo site_url().'/admin/staff_manage'?>">Manage Staff</a></li>
                        </ul>
                    </li>



                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle text-dark" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Courses</a>
                        <ul class="sub-menu children dropdown-menu">
                            
                            <li><i class="fa fa-plus-circle"></i><a class='text-dark' href="<?php echo site_url().'/admin/course_manage'?>">Add Course</a></li>
                            <li><i class="fa fa-table"></i><a class='text-dark' href="<?php echo site_url().'/admin/course'?>">Manage Course</a></li>
                        </ul>
                    </li>


                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle text-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cog"></i>Extra Curricular </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-circle"></i><a class='text-dark' href="<?php echo site_url().'/admin/add_extra_curricular';?>">Add Activity</a></li>
                            <li><i class="fa fa-table"></i><a class='text-dark' href="<?php echo site_url().'/admin/list_extra_curricular';?>">Manage Activity</a></li>
                        </ul>
                    </li>


                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle text-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-graduation-cap"></i>Placement Details </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-circle"></i><a class='text-dark' href="<?php echo site_url().'/admin/add_student';?>">Add Students</a></li>
                            <li><i class="fa fa-table"></i><a class='text-dark' href="<?php echo site_url().'/admin/manage_student';?>">Manage Students</a></li>
                        </ul>
                    </li>


                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle text-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-building"></i>Infrastructure </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-circle"></i><a class='text-dark' href="<?php echo site_url().'/admin/add_news';?>">Add</a></li>
                            <li><i class="fa fa-table"></i><a class='text-dark' href="<?php echo site_url().'/admin/manage_news';?>">Manage</a></li>
                        </ul>
                    </li>


                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle text-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-font-awesome"></i>Events</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-circle"></i><a class='text-dark' href="<?php echo site_url().'/admin/add_events';?>">Add Events</a></li>
                            <li><i class="fa fa-table"></i><a class='text-dark' href="<?php echo site_url().'/admin/manage_events';?>">Manage Events</a></li>
                        </ul>
                    </li>



                    <li class='list'>
                        <a class='text-dark' href="<?php echo site_url().'/admin/text';?>"><i class="menu-icon fa fa-font"></i>Mission and Vision</a>
                    </li>

                    

                    <li class='list'>
                        <a class='text-dark' href="<?php echo site_url().'/admin/panorama';?>"><i class="menu-icon fa fa-picture-o"></i>Panorama</a>
                    </li>


                    <li class='list'>
                        <a class='text-dark' href="<?php echo site_url().'/admin/calender';?>"><i class="menu-icon fa fa-calendar"></i>Calender</a>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle text-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pencil"></i>College Rules </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <i class="fa fa-plus-circle"></i>
                                <a class='text-dark' href="<?php echo site_url().'/admin/add_rule_category';?>">Add Category</a>
                            </li>
                            
                            <li class='list'>
                                <i class="fa fa-plus-circle"></i>
                                <a class='text-dark' href="<?php echo site_url().'/admin/rule';?>">Add Rule</a>
                            </li>

                        </ul>
                    </li>
                    <li class='list'>
                        <a class='text-dark' href="<?php echo site_url().'/admin/notification';?>"><i class="menu-icon fa fa-envelope"></i>Notification</a>
                    </li>
                    
                    <li class='list'>
                        <a class='text-dark' href="<?php echo site_url().'/admin/contactus';?>"><i class="menu-icon fa fa-phone"></i>Contact Us</a>
                    </li>

                    <li class='list'>
                        <a class='text-dark' href="<?php echo site_url().'/admin/aboutus';?>"><i class="menu-icon fa fa-info"></i>About Us</a>
                    </li>

                    <li class='list'>
                        <a class='text-dark' href="<?php echo site_url().'/admin/faq';?>"><i class="menu-icon fa fa-question-circle"></i>FAQ</a>
                    </li>
                   <li class='list'>
                        <a class='text-dark' href="<?php echo site_url().'/admin/form';?>"><i class="menu-icon fa fa-wpforms"></i>Forms</a>
                    </li>
                     
                    <li class='list'>
                        <a class='text-dark' href="<?php echo site_url().'/admin/logout';?>"><i class="menu-icon fa fa-sign-out"></i>Logout</a>
                    </li>
                    
            </div>
        </nav>
    </aside>

    <!-- Sidebar End -->

    
    