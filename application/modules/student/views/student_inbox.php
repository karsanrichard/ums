<style>
    .f-s-10{
        margin: 0 10px;
    }
</style>
<div id="content" class="content content-full-width">
    <!-- begin vertical-box -->
    <div class="vertical-box">
        <!-- begin vertical-box-column -->
        <div class="vertical-box-column width-250">
            <!-- begin wrapper -->
            <div class="wrapper bg-silver text-center">
                <a href="<?php echo base_url().'student/student_compose_messsage'; ?>" class="btn btn-success p-l-40 p-r-40 btn-sm">
                    Compose
                </a>
            </div>
            <!-- end wrapper -->
            <!-- begin wrapper -->
            <?php $this->load->view('student/student_inbox_sidebar'); ?>
            <!-- end wrapper -->
        </div>
        <!-- end vertical-box-column -->
        <!-- begin vertical-box-column -->
        <div class="vertical-box-column">
            <!-- begin wrapper -->
            <div class="wrapper bg-silver-lighter">
                <!-- begin btn-toolbar -->
                <div class="btn-toolbar">
                    <!-- begin btn-group -->
                    <div class="btn-group pull-right">
                        <button class="btn btn-white btn-sm">
                            <i class="fa fa-chevron-left"></i>
                        </button>
                        <button class="btn btn-white btn-sm">
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                    <!-- end btn-group -->
                    <!-- begin btn-group -->
                    <div class="btn-group dropdown">
                        <button class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown">
                            View All <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu text-left text-sm">
                            <li class="active"><a href="#"><i class="fa fa-circle f-s-10 fa-fw m-r-5"></i> All</a></li>
                            <li><a href="javascript:;"><i class="fa f-s-10 fa-fw m-r-5"></i> Unread</a></li>
                            <li><a href="javascript:;"><i class="fa f-s-10 fa-fw m-r-5"></i> Contacts</a></li>
                            <li><a href="javascript:;"><i class="fa f-s-10 fa-fw m-r-5"></i> Groups</a></li>
                            <li><a href="javascript:;"><i class="fa f-s-10 fa-fw m-r-5"></i> Newsletters</a></li>
                            <li><a href="javascript:;"><i class="fa f-s-10 fa-fw m-r-5"></i> Social updates</a></li>
                            <li><a href="javascript:;"><i class="fa f-s-10 fa-fw m-r-5"></i> Everything else</a></li>
                        </ul>
                    </div>
                    <!-- end btn-group -->
                    <!-- begin btn-group -->
                    <div class="btn-group">
                        <button class="btn btn-sm btn-white btn-refresh" data-toggle="tooltip" data-placement="top" data-title="Refresh" data-original-title="" title=""><i class="fa fa-refresh"></i></button>
                    </div>
                    <!-- end btn-group -->
                    <!-- begin btn-group -->
                    <div class="btn-group">
                        <button class="btn btn-sm btn-white hide" data-email-action="delete"><i class="fa fa-times m-r-3"></i> <span class="hidden-xs">Delete</span></button>
                        <button class="btn btn-sm btn-white hide" data-email-action="archive"><i class="fa fa-folder m-r-3"></i> <span class="hidden-xs">Archive</span></button>
                        <button class="btn btn-sm btn-white hide" data-email-action="archive"><i class="fa fa-trash m-r-3"></i> <span class="hidden-xs">Junk</span></button>
                    </div>
                    <!-- end btn-group -->
                </div>
                <!-- end btn-toolbar -->
            </div>
            <!-- end wrapper -->
            <!-- begin list-email -->
            <?php 
            foreach ($messages as $key => $value) {
                echo '<ul class="list-group list-group-lg no-radius list-email">
            <li class="list-group-item inverse">
            <div class="email-checkbox">
                        <label>
                            <i class="fa fa-square-o"></i>
                            <input type="checkbox" data-checked="email-checkbox" />
                        </label>
                    </div>
                    
                    <div class="email-info">
                        <span class="email-time">Today</span>
                        <h5 class="email-title">
            ';
            echo '<a href="'.base_url().'student/student_msg_details/'.$value['id'].'">'.$value['subject'].'</a>';
                
                if($value['status'] == 1):
                    echo '<span class="label label-success f-s-10"><i class="fa fa-exclamation"> Unread</i></span>';
                else:
                    echo '<span class="label label-primary f-s-10"><i class="fa fa-check"></i> Read</span>';
                    endif;
             echo '</h5>
                        <p class="email-desc">'.$value['message'].'</p>
            ';
            echo '
            </div>
            </li>
            </ul>';
            }
             ?>
                
                    
                            
                            
                    
            
            <!-- end list-email -->
            <!-- begin wrapper -->
            <div class="wrapper bg-silver-lighter clearfix">
                <div class="btn-group pull-right">
                    <button class="btn btn-white btn-sm">
                        <i class="fa fa-chevron-left"></i>
                    </button>
                    <button class="btn btn-white btn-sm">
                        <i class="fa fa-chevron-right"></i>
                    </button>
                </div>
                <div class="m-t-5"> Total of <?php echo $message_count; ?> messages</div>
            </div>
            <!-- end wrapper -->
        </div>
        <!-- end vertical-box-column -->
    </div>
    <!-- end vertical-box -->
</div>

<script>
    $(".btn-refresh").click(function(){
        location.reload();
    });
</script>