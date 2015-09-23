<style type="text/css">
    label {
        font-weight: 500;
        font-size: initial;
    }
    .note{
        margin-right: 2em;
        display: inline-block;
    }
    .notes_holder {
        width:100px;
        height:100px;
        padding: 0.5em;
    }
    .margin-kiasi{
        margin: auto auto;
        width: 50%;
    }
</style>
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Home</a></li>
		<!-- <li><a href="javascript:;">Extra</a></li> -->
		<li class="active">Enrollment</li>
	</ol>
	<!-- end breadcrumb -->
	<div class="row margin-kiasi">
    <!-- begin page-header -->
    <center><h1 class="page-header">Enrollment Key</h1></center>
    <!-- end page-header -->
    
    <!-- begin row -->
	    <!-- begin col-12 -->
	    <!-- <div class="col-md-12"> -->
            <?php echo form_open('groups/group_authenicate'); ?>
	        <table class="table">
                <tbody>
                <tr>
                    <td colspan="2">The group you would like to join requires an enrollment key,kindly contact the group administrator for it.</td>
                </tr>
                    <tr>
                        <td><label>Enter enrollment key:</label></td>
                        <td>
                        <input class="form-control" type="password" name="enrollment_key" placeholder="Enter Enrollment Key" />
                        <input type="hidden" name="something" value="<?php echo $group_id; ?>" />
                        <input type="hidden" name="rght" value="<?php echo $rights; ?>" />
                        </td>
                    </tr>
                    <tr>
                    <td></td>
                        <td>
                            <button style ="float:right;" type="submit" class="btn btn-success">Submit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php echo form_close(); ?>
	    <!-- </div> -->
	    <!-- end col-12 -->
	</div>
    <!-- end row -->
</div>
 <script type="text/javascript">
$(document).ready(function(){

});
</script>