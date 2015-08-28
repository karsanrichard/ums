<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;">Dashboard</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Student Dashboard <small>User Details</small></h1>
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-green">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-title">YOUR UNITS</div>
                <div class="stats-number">10</div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 70.1%;"></div>
                </div>
                <div class="stats-desc"><i class="fa fa-exclamation"></i> Notes Uploaded Today</div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-tags fa-fw"></i></div>
                <div class="stats-title">Messages</div>
                <div class="stats-number">5</div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 40.5%;"></div>
                </div>
                <div class="stats-desc">Total Unread (5)</div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-purple">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-shopping-cart fa-fw"></i></div>
                <div class="stats-title">ANNOUNCEMENTS</div>
                <div class="stats-number">4</div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 76.3%;"></div>
                </div>
                <div class="stats-desc">View Announcements</div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-black">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-comments fa-fw"></i></div>
                <div class="stats-title">GPA</div>
                <div class="stats-number">85%</div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 54.9%;"></div>
                </div>
                <div class="stats-desc">Last Semester GPA 83%</div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>
    <!-- end row -->
    
    <!-- begin row -->
    <div class="row">
        <div class="col-md-8">
            <div class="widget-chart with-sidebar bg-black">
                <div class="widget-chart-content">
                    <h4 class="chart-title">
                        Current Grades
                        <small>Average(s) for all grades</small>
                    </h4>
                    <div id="visitors-line-chart" class="morris-inverse" style="height: 260px;"></div>
                </div>
                <div class="widget-chart-sidebar bg-black-darker">
                    <div class="chart-number">
                        85%
                        <small>Average Grade</small>
                    </div>
                    <div id="visitors-donut-chart" style="height: 160px"></div>
                    <ul class="chart-legend">
                        <li><i class="fa fa-circle-o fa-fw text-success m-r-5"></i> 83.0% <span>Last Semester</span></li>
                        <li><i class="fa fa-circle-o fa-fw text-primary m-r-5"></i> 85.0% <span>This Semester</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-inverse" data-sortable-id="index-1">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Last Seen Mappings
                    </h4>
                </div>
                <div id="visitors-map" class="bg-black" style="height: 181px;"></div>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-inverse text-ellipsis">
                        <span class="badge badge-success">11:45AMM</span>
                            Lecturer 1
                    </a> 
                    <a href="#" class="list-group-item list-group-item-inverse text-ellipsis">
                        <span class="badge badge-primary">11:00AM</span>
                        Student A
                    </a>
                    <a href="#" class="list-group-item list-group-item-inverse text-ellipsis">
                        <span class="badge badge-inverse">9:00AM</span>
                        Student B
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-4 -->
        <div class="col-md-4">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="index-2">
                <div class="panel-heading">
                    <h4 class="panel-title">Message History <span class="label label-success pull-right">4 message</span></h4>
                </div>
                <div class="panel-body bg-silver">
                    <div data-scrollbar="true" data-height="225px">
                        <ul class="chats">
                            <li class="left">
                                <span class="date-time">yesterday 11:23pm</span>
                                <a href="javascript:;" class="name">Richard Karsan</a>
                                <a href="javascript:;" class="image"><img alt="" src="assets/img/user-12.jpg" /></a>
                                <div class="message">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit volutpat. Praesent mattis interdum arcu eu feugiat.
                                </div>
                            </li>
                            <li class="right">
                                <span class="date-time">08:12am</span>
                                <a href="#" class="name"><span class="label label-primary">Student</span> Me</a>
                                <a href="javascript:;" class="image"><img alt="" src="assets/img/user-13.jpg" /></a>
                                <div class="message">
                                    Nullam posuere, nisl a varius rhoncus, risus tellus hendrerit neque.
                                </div>
                            </li>
                            <li class="left">
                                <span class="date-time">09:20am</span>
                                <a href="#" class="name">Joshua Bakasa</a>
                                <a href="javascript:;" class="image"><img alt="" src="assets/img/user-10.jpg" /></a>
                                <div class="message">
                                    Euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                </div>
                            </li>
                            <li class="left">
                                <span class="date-time">11:15am</span>
                                <a href="#" class="name">Shag Strap</a>
                                <a href="javascript:;" class="image"><img alt="" src="assets/img/user-14.jpg" /></a>
                                <div class="message">
                                    Nullam iaculis pharetra pharetra. Proin sodales tristique sapien mattis placerat.
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel-footer">
                    <form name="send_message_form" data-id="message-form">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm" name="message" placeholder="Enter your message here.">
                            <span class="input-group-btn">
                                <button class="btn btn-primary btn-sm" type="button">Send</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-4 -->
        <!-- begin col-4 -->
        <div class="col-md-4">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="index-3">
                <div class="panel-heading">
                    <h4 class="panel-title">Student Calendat</h4>
                </div>
                <div id="schedule-calendar" class="bootstrap-calendar"></div>
                <div class="list-group">
                    <a href="#" class="list-group-item text-ellipsis">
                        <span class="badge badge-success">9:00 am</span>Micro Economics CAT 1
                    </a> 
                    <a href="#" class="list-group-item text-ellipsis">
                        <span class="badge badge-primary">2:45 pm</span>Business Statistics Final Exam
                    </a>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-4 -->
        <!-- begin col-4 -->
        <div class="col-md-4">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="index-4">
                <div class="panel-heading">
                    <h4 class="panel-title">New Users<span class="pull-right label label-success">24 new users</span></h4>
                </div>
                <ul class="registered-users-list clearfix">
                    <li>
                        <a href="javascript:;"><img src="assets/img/user-5.jpg" alt="" /></a>
                        <h4 class="username text-ellipsis">
                            Richard Karsan
                            <small>BIF</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="assets/img/user-3.jpg" alt="" /></a>
                        <h4 class="username text-ellipsis">
                            Joshua Bakasa
                            <small>BIF</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="assets/img/user-1.jpg" alt="" /></a>
                        <h4 class="username text-ellipsis">
                            Chrispine Otaalo
                            <small>BIF</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="assets/img/user-8.jpg" alt="" /></a>
                        <h4 class="username text-ellipsis">
                            Student 4
                            <small>BTC</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="assets/img/user-2.jpg" alt="" /></a>
                        <h4 class="username text-ellipsis">
                            Student 5
                            <small>Course Name</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="assets/img/user-6.jpg" alt="" /></a>
                        <h4 class="username text-ellipsis">
                            Student 6
                            <small>Hospitality</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="assets/img/user-4.jpg" alt="" /></a>
                        <h4 class="username text-ellipsis">
                            Cream Puffs
                            <small>Choco Pops</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="assets/img/user-9.jpg" alt="" /></a>
                        <h4 class="username text-ellipsis">
                            Dora The Explorer
                            <small>Nickelodeon</small>
                        </h4>
                    </li>
                </ul>
                <div class="panel-footer text-center">
                    <a href="javascript:;" class="text-inverse">View All</a>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-4 -->
    </div>
    <!-- end row -->
</div>