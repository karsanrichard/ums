<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><?php echo $unit_details['unit_name'];?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>">..</a></li>
            <li>
                <a href="<?php echo base_url();?>lecturer">Lecturers</a>
            </li>
             <li>
                <a href="<?php echo base_url();?>lecturer/lecturer_units">My Units</a>
            </li>
            <li class="active">
                <strong><?php echo $unit_details['unit_name'];?></strong>
            </li>
        </ol>
    </div>
</div>
<!-- Toggle Buttons -->
<!-- <div class="wrapper wrapper-content animated fadeInRight">
     <div class="row" id="filters">
        <div class="col-md-4">
            <div class="input-group m-b">
                <div class="input-group-btn">
                    <a href="<?php echo base_url();?>products/add"  class="btn btn-primary "><i class="fa fa-plus fa-rotate-270"></i>&nbsp;Add Product</a>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-md-4" style="margin-bottom:0px;">
                <div class="input-group m-b">
                    <div class="input-group-btn">
                        <a href="#" id="button"  class="btn btn-primary "><i class="fa fa-plus fa-rotate-270"></i>&nbsp;Add Notes</a>
                    </div>
                </div>
        </div>
    </div>
    <!-- Notes Display -->
    <div class="row" id="notes">
        <?php
            echo $notes;
        ?>
    </div>
    <!-- End of notes Display -->

    <!-- Notes Upload -->
    <div class="row" id="add_notes">
        <div class="col-lg-12">
            <div class="ibox-content m-b-sm border-bottom">
                <div class="p-lg">
                    <h2>Upload Notes here.</h2>
                    <form role="form" class="form-inline" method="post" action="<?php echo base_url();?>lecturer/notes_upload" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $unit_details['unit_details_id'];?>" name="unit_details_id" id="unit_details_id" />
                        <input type="hidden" value="<?php echo $unit_details['unit_id'];?>" name="unit_id" id="unit_id" />
                        <div class="row">
                            <div class="form-group col-lg-6">
                            <label for="topic" class="sr-only">Topic: </label>
                            <?php
                                echo $topics_dropdown;
                            ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                            <label for="notes_type" class="sr-only">Notes Type: </label>
                            <?php
                                echo $notes_dropdown;
                            ?>
                            </div>
                        </div>
                        <div id="upload" class="row">
                            <div class="form-group col-lg-6">
                                <label for="filesToUpload[]" class="sr-only">Select file(s)</label>
                                <input name="filesToUpload[]" id="filesToUpload" type="file" multiple="" class="form-control" />
                            </div>
                        </div>
                        <div id="link" class="row">
                            <div class="form-group col-lg-6">
                                <label for="url" class="sr-only">Enter URL: </label>
                                <input name="url" id="url" type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-lg-6">
                                <button class="btn btn-warning" type="submit">Upload Notes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#add_notes').hide();
    $('#upload').hide();
    $('#link').hide();

    $('#button').click(function(){
        $('#notes').hide();
        $('#add_notes').show();
        $('#button').attr('disabled', 'true');
    });

    $('#notes_type').change(function(){
        sv = $(this).val();
        console.log(sv);
        if (sv == 1) {
            $('#upload').show();
            $('#link').hide();
        } else{
            $('#link').show();
            $('#upload').hide();
        };
    });



    //get the input and UL list
    var input = document.getElementById('filesToUpload');
    var list = document.getElementById('fileList');

    //empty list for now...
    while (list.hasChildNodes()) {
        list.removeChild(ul.firstChild);
    }

    //for every file...
    for (var x = 0; x < input.files.length; x++) {
        //add to list
        var li = document.createElement('li');
        li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
        list.append(li);
    }

});
</script>