            <!-- begin wrapper -->
            <div class="wrapper">
                <p><b>FOLDERS</b></p>
                <ul class="nav nav-pills nav-stacked nav-sm">
                    <li class="active"><a href="<?php echo base_url().'student/student_inbox'; ?>"><i class="fa fa-inbox fa-fw m-r-5"></i> Inbox <span class="badge pull-right"><?php $badge = isset($unread_count)? $unread_count: NULL; echo $badge;?></span></a></li>
                    <li><a href="#"><i class="fa fa-flag fa-fw m-r-5"></i> Important</a></li>
                    <li><a href="#"><i class="fa fa-send fa-fw m-r-5"></i> Sent</a></li>
                    <li><a href="#"><i class="fa fa-pencil fa-fw m-r-5"></i> Drafts</a></li>
                    <li><a href="#"><i class="fa fa-trash fa-fw m-r-5"></i> Trash</a></li>
                </ul>
                <!--
                <p><b>LABEL</b></p>
                <ul class="nav nav-pills nav-stacked nav-sm m-b-0">
                    <li><a href="javascript:;"><i class="fa fa-fw m-r-5 fa-circle text-inverse"></i> Admin</a></li>
                    <li><a href="javascript:;"><i class="fa fa-fw m-r-5 fa-circle text-primary"></i> Designer & Employer</a></li>
                    <li><a href="javascript:;"><i class="fa fa-fw m-r-5 fa-circle text-success"></i> Staff</a></li>
                    <li><a href="javascript:;"><i class="fa fa-fw m-r-5 fa-circle text-warning"></i> Sponsorer</a></li>
                    <li><a href="javascript:;"><i class="fa fa-fw m-r-5 fa-circle text-danger"></i> Client</a></li>
                </ul>
                 -->
            </div>
            <!-- end wrapper -->