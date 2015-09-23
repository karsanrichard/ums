<div id="content" class="content">
	<!-- begin page-header -->
	<h1 class="page-header">Groups & Notes </h1>
    <a href="#modal-dialog" style="float:right;" class="btn btn-sm btn-success" data-toggle="modal">Add Group</a>
	<!-- end page-header -->
	
	<!-- begin row -->
            <div id="options" class="m-b-10">
                <span class="gallery-option-set" id="filter" data-option-key="filter">
                    <a href="#show-all" class="btn btn-default btn-xs active" data-option-value="*">
                        Show All Groups
                    </a>
                    <a href="#gallery-group-1" class="btn btn-default btn-xs" data-option-value=".gallery-group-1">
                        My Managed Groups
                    </a>
                    <a href="#gallery-group-2" class="btn btn-default btn-xs" data-option-value=".gallery-group-2">
                        Groups Not Belonged To
                    </a>
                </span>
            </div>
            <div id="gallery" class="gallery">
                <?php
                	echo $groups;
                ?>
                
            </div>
		<div class="modal fade" id="modal-dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Add Group</h4>
                    </div>
                    <div class="modal-body">
                        <?php 
                        $attr = array('class' => 'add_group','id'=>'add_group');
                        echo form_open('groups/add_group',$attr); 
                        ?>
                        <div class="form-group">
                            <table class="table table-bordered nowrap col-md-12">
                                <tbody>
                                    <tr>
                                        <td class="col-md-6">
                                            <label for="group_name">Group Name</label>
                                        </td>
                                        <td class="col-md-6">
                                            <input type="text" name="group_name" class="form-control group_name" id="group_name"required = "required" placeholder="Enter Group Name"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-6">
                                            <label for="group_password">Group Authentication</label>
                                        </td>
                                        <td class="col-md-6">
                                            <select class="form-control grp_select" id="grp_select" name="grp_select">
                                                <option value="NO" selected="selected">Do not require password</option>
                                                <option value="YES">Require Password</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr id="pwd_input">
                                        <td class="col-md-6">
                                            <label for="group_password">Group Password</label>
                                        </td>
                                        <td class="col-md-6">
                                            <input type="text" name="group_password" class="form-control group_password" id="group_password" placeholder="Enter Group Password"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <div class="footer">
                        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" id="submit" class="btn btn-sm btn-success submit">Submit</button>
                    </div>
                        <?php echo form_close(); ?>
                </div>
            </div>
        </div>
	<!-- end row -->
</div>
<script>
    $(document).ready(function(){
        $("#pwd_input").hide();
        $("#grp_select").change(function(){
            var value = $("#grp_select").val();
            // alert(value);
            if (value == 'YES') {
                $("#pwd_input").show();
            }else{
                $("#pwd_input").hide();
                $("#group_password").val('');
            }
        });
    });
</script>