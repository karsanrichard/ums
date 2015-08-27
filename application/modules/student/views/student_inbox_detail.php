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
                <div class="vertical-box-column bg-white">
                    <!-- begin wrapper -->
                    <div class="wrapper bg-silver-lighter clearfix">
                        <div class="btn-group m-r-5">
                            <a href="#" class="btn btn-white btn-sm"><i class="fa fa-reply"></i></a>
                        </div>
                        <div class="btn-group m-r-5">
                            <a href="#" class="btn btn-white btn-sm p-l-20 p-r-20"><i class="fa fa-trash"></i></a>
                            <a href="#" class="btn btn-white btn-sm p-l-20 p-r-20"><i class="fa fa-file"></i></a>
                        </div>
                        <div class="pull-right">
                            <div class="btn-group btn-toolbar">
                                <a href="inbox_v2.html" class="btn btn-white btn-sm disabled"><i class="fa fa-arrow-up"></i></a>
                                <a href="inbox_v2.html" class="btn btn-white btn-sm"><i class="fa fa-arrow-down"></i></a>
                            </div>
                            <div class="btn-group m-l-5">
                                <a href="inbox_v2.html" class="btn btn-white btn-sm"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end wrapper -->
                    <!-- begin wrapper -->
                    <div class="wrapper underline">
                        

                        <?php 
                        /*
                        <h4 class="m-b-15 m-t-0 p-b-10 underline">'.$value['subject'].'</h4>
                        <ul class="media-list underline m-b-20 p-b-15">
                            <li class="media media-sm clearfix">
                                <a href="javascript:;" class="pull-left">
                                    <img class="media-object rounded-corner" alt="" src="assets/img/user-14.jpg" />
                                </a>
                                <div class="media-body">
                                    <span class="email-from text-inverse f-w-600">
                                        from support@wrapbootstrap.com
                                        
                                    </span><span class="text-muted m-l-5"><i class="fa fa-clock-o fa-fw"></i> 8: 30 AM</span><br />
                                    <span class="email-to">
                                        To: nguoksiong@live.co.uk
                                    </span>
                                </div>
                            </li>
                        </ul>
                        */
                        foreach ($message_content as $key => $value) {
                            echo '
                            <h4 class="m-b-15 m-t-0 p-b-10 underline">'.$value['subject'].'</h4>
                        <ul class="media-list underline m-b-20 p-b-15">
                            <li class="media media-sm clearfix">
                                <div class="media-body">
                                    <span class="email-from text-inverse f-w-600">
                                        From: '.$value['sender_fname'].' '.$value['sender_lname'].'
                                        
                                    </span><span class="text-muted m-l-5"><i class="fa fa-clock-o fa-fw"></i>'.date('d m Y',strtotime($value['time_sent'])).'</span><br />
                                </div>
                            </li>
                        </ul>
                        ';
                        // echo '<span class="label label-primary f-s-10">admin</span>
                        echo '
                                    </h5>
                                    <p class="email-desc">'.$value['message'].'</p>
                        ';
                        echo '
                        </div>
                        </li>
                        </ul>
                        <div style="float: right;margin: 10px 10px 0 10px;">
                            <a href="'.base_url().'student/student_compose_messsage/'.$value['id'].'" class="btn btn-sm btn-success"><i class="fa fa-paper-plane"></i> Reply Message </a>
                        </div>
                        ';
                        }
                         ?>

                        <!-- <ul class="attached-document clearfix">
                            <li>
                                <div class="document-name"><a href="#">flight_ticket.pdf</a></div>
                                <div class="document-file">
                                    <a href="#">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="document-name"><a href="#">front_end_mockup.jpg</a></div>
                                <div class="document-file">
                                    <a href="#">
                                        <img src="assets/img/login-bg/bg-1.jpg" alt="" />
                                    </a>
                                </div>
                            </li>
                        </ul> -->
                        
                        <!-- <p class="f-s-12 text-inverse"> 
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel auctor nisi, vel auctor orci. <br />
                            Aenean in pretium odio, ut lacinia tellus. Nam sed sem ac enim porttitor vestibulum vitae at erat.
                        </p>
                        <p class="f-s-12 text-inverse">
                            Curabitur auctor non orci a molestie. Nunc non justo quis orci viverra pretium id ut est. <br />
                            Nullam vitae dolor id enim consequat fermentum. Ut vel nibh tellus. <br />
                            Duis finibus ante et augue fringilla, vitae scelerisque tortor pretium. <br />
                            Phasellus quis eros erat. Nam sed justo libero.
                        </p>
                        <p class="f-s-12 text-inverse">
                            Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br /> 
                            Sed tempus dapibus libero ac commodo.
                        </p>
                        <br />
                        <br />
                        <p class="f-s-12 text-inverse">
                            Best Regards,<br />
                            Sean.<br /><br />
                            Information Technology Department,<br />
                            Senior Front End Designer<br />
                        </p> -->
                        
                    </div>
                    <!-- end wrapper -->
                    <!-- begin wrapper -->
                    <div class="wrapper bg-silver-lighter text-right clearfix">
                        <div class="btn-group btn-toolbar">
                            <a href="inbox_v2.html" class="btn btn-white btn-sm disabled"><i class="fa fa-arrow-up"></i></a>
                            <a href="inbox_v2.html" class="btn btn-white btn-sm"><i class="fa fa-arrow-down"></i></a>
                        </div>
                        <div class="btn-group m-l-5">
                            <a href="inbox_v2.html" class="btn btn-white btn-sm"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <!-- end wrapper -->
                </div>
                <!-- end vertical-box-column -->
            </div>
            <!-- end vertical-box -->
        </div>