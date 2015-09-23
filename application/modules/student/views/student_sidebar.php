<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <!-- <a href="javascript:;"><img src="<?php echo base_url().'assets/images/developers/richard.jpg'; ?>" alt="" /></a> -->
                    <center>
                    <i style="font-size: 38px;color:#00acac;" class="fa fa-user"></i>
                    </center>
                </div>
                <div class="info">
                    <?php echo ucfirst($student_data[0]['first_name']).' '.ucfirst($student_data[0]['last_name']); ?>
                    <small>Member</small>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header">Navigation</li>
            <li class="has-sub active">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-laptop"></i>
                    <span>Dashboard</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="<?php echo base_url().'student'; ?>">Dashboard Home</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <span class="badge pull-right"><?php echo $unread_messages_count; ?></span>
                    <i class="fa fa-inbox"></i> 
                    <span>Messages</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="<?php echo base_url().'student/student_inbox'; ?>">Inbox</a></li>
                    <li><a href="<?php echo base_url().'student/student_compose_messsage'; ?>">Compose</a></li>
                    <!-- <li><a href="email_detail.html">Detail</a></li> -->
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <!-- <span class="badge pull-right">10</span> -->
                    <i class="fa fa-inbox"></i> 
                    <span>Group Management</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="<?php echo base_url().'groups'; ?>">Groups</a></li>
                    <!-- <li><a href="<?php echo base_url().'groups'; ?>">Your Groups Mine</a></li> -->
                    <!-- <li><a href="<?php echo base_url().'student/group_create'; ?>">Create Group</a></li> -->
                    <!-- <li><a href="email_detail.html">Detail</a></li> -->
                </ul>
            </li>
            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>