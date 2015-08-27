    <?php $msg_url = (isset($replying))? base_url()."student/reply_message/".$msg_id : base_url()."student/reply_message/"; ?>
    <div id="content" class="content content-full-width">
        <!-- begin vertical-box -->
        <div class="vertical-box">

        <div class="vertical-box-column width-250">
            <!-- begin wrapper -->
            <div class="wrapper bg-silver text-center">
                <a href="<?php echo base_url().'student/student_compose_messsage'; ?>" class="btn btn-success p-l-40 p-r-40 btn-sm">
                    Compose
                </a>
            </div>
            <!-- end wrapper -->
            <?php $this->load->view('student/student_inbox_sidebar'); ?>
        </div>

            <div class="vertical-box-column">
                <!-- begin wrapper -->
                <div class="wrapper bg-silver-lighter">
                    <!-- begin btn-toolbar -->
                    <div class="btn-toolbar">
                        <div class="btn-group">
                            <a href="inbox_v2.html" class="btn btn-white btn-sm p-l-20 p-r-20"><i class="fa fa-file"></i></a>
                            <a href="inbox_v2.html" class="btn btn-white btn-sm p-l-20 p-r-20"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                    <!-- end btn-toolbar -->
                </div>
                <!-- end wrapper -->
                <!-- begin wrapper -->
                <div class="wrapper">
                <input type="hidden" value=""/>
                    <div class="p-30 bg-white <?php $rep = isset($replying)? 'col-md-5' : 'col-md-12'; echo $rep;?> ">
                        <!-- begin email form -->
                        <!-- <form action="http://seantheme.com/" method="POST" name="email_to_form"> -->
                            <!-- begin email to -->
                            <label class="control-label">To:</label>
                            <div class="m-b-15">
                            <?php if(isset($replying)):?>
                                <ul id="email-to" class="inverse">
                                <?php echo "<li>".$sender_fname.' '.$sender_lname."</li>"; ?>
                                <?php echo "<li>".$sender_fname.' '.$sender_lname."</li>"; ?>
                                </ul>
                                <?php else: ?>
                                <select>
                                    <option value="" selected="selected">Select Recepient</option>
                                       <?php foreach ($students as $key => $value) {?>
                                           <option value="<?php echo $value['id']?>"><?php echo $value['first_name'].' '.$value['last_name']; ?></option>
                                       <?php } ?>
                                       
                                </select>
                            <?php endif; ?>
                            </div>
                            
                            <!-- end email to -->
                            <!-- begin email subject -->
                            <label class="control-label">Subject:</label>
                            <div class="m-b-15">
                                <input id="msg_subject" type="text" class="form-control" />
                            </div>
                            <!-- end email subject -->
                            <!-- begin email content -->
                            <label class="control-label">Content:</label>
                            <div class="m-b-15">
                                <textarea  id="message_body" class="textarea form-control" id="wysihtml5" placeholder="Enter text ..." rows="12"></textarea>
                            </div>
                            <!-- end email content -->
                             <button class="btn btn-sm btn-success send_msg"><i class="fa fa-paper-plane"></i> Send Message </button>
                            <div class="empty_warning"></div>
                        <!-- </form> -->
                        <!-- end email form -->
                    </div>
                    <?php if(isset($replying)):?>
                    <div class="col-md-1"></div>

                    <div class="p-30 bg-white col-md-5">
                            <label class="control-label">Replying To Msg From:</label>
                            <div class="m-b-15">
                                <ul id="email-to" class="inverse">
                                <?php echo "<li>".$sender_fname.' '.$sender_lname."</li>"; ?>
                                </ul>
                            </div>
                            <!-- end email to -->
                            <!-- begin email subject -->
                            <label class="control-label">Subject:</label>
                            <div class="m-b-15">
                                <?php echo '<input id="msg_subject" type="text" class="form-control" value = "'.$subject.'" readonly/>'; ?>
                            </div>
                            <!-- end email subject -->
                            <!-- begin email content -->
                            <label class="control-label">Content:</label>
                            <div class="m-b-15">
                            <?php echo '<textarea class="textarea form-control" rows="12" value = "'.$message.'" readonly>'.$message.'</textarea>'; ?>
                                <!-- <textarea  id="message_body" class="textarea form-control" id="wysihtml5" placeholder="Enter text ..."></textarea> -->
                            </div>
                    </div>
                <?php endif; ?>

                </div>
                <!-- end wrapper -->
            </div>
        </div>
    </div>

    <script>
$(document).ready(function(){
    var reply_url = '<?php echo $msg_url; ?>';
    // alert(reply_url);return;
    $(".send_msg").click(function(){
    var message_body = $("#message_body").val();
    var msg_subject = $("#msg_subject").val();

    // alert(msg_subject);return;
    if ($("#message_body").val() == '' ) {
        $(".send_msg").html('<i class="fa fa-exclamation"></i> Send Message ');
        $(".empty_warning").html('<i class="fa fa-exclamation"></i> Kindly enter a message to send ');

        // alert("Kindly enter a message to send")
    }else{
    // alert(message_body);return;
        $.ajax({
        type: "POST",
        url:reply_url,
        data:{
            message_body:message_body,
            msg_subject:msg_subject
        },
        beforeSend : function(){
            $(".send_msg").html('<i class="fa fa-cog fa-spin"></i> Sending Message ');
        },
        success: function(msg){
            console.log(msg);
            // alert(msg);return;
            $(".send_msg").html('<i class="fa fa-check"></i> Message Sent');
            $("#message_body").val('');
        }
    });//end of ajax
    }//end of else
    });//end of send sms .click
});
</script>