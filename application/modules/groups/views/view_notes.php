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
</style>
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Home</a></li>
		<li><a href="javascript:;">Extra</a></li>
		<li class="active">Search Results</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Search Results <small>3 results found</small></h1>
	<!-- end page-header -->
	
	<!-- begin row -->
	<div class="row">
	    <!-- begin col-12 -->
	    <div class="col-md-12">
	        <div class="result-container">
	            <div class="input-group m-b-20">
                    <input type="text" class="form-control input-white" placeholder="Enter keywords here..." />
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-inverse"><i class="fa fa-search"></i> Search</button>
                        <button type="button" class="btn btn-inverse dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-cog"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:;">Action</a></li>
                            <li><a href="javascript:;">Another action</a></li>
                            <li><a href="javascript:;">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:;">Separated link</a></li>
                        </ul>
                    </div>
                </div>
                <div class="dropdown pull-left">
                    <a href="javascript:;" class="btn btn-white btn-white-without-border dropdown-toggle" data-toggle="dropdown">
                        Filters by <span class="caret m-l-5"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="javascript:;">Posted Date</a></li>
                        <li><a href="javascript:;">View Count</a></li>
                        <li><a href="javascript:;">Total View</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:;">Location</a></li>
                    </ul>
                </div>
                <div class="btn-group m-l-10 m-b-20">
                    <a href="javascript:;" class="btn btn-white btn-white-without-border"><i class="fa fa-list"></i></a>
                    <a href="javascript:;" class="btn btn-white btn-white-without-border"><i class="fa fa-th"></i></a>
                    <a href="javascript:;" class="btn btn-white btn-white-without-border"><i class="fa fa-th-large"></i></a>
                </div>
                <ul class="pagination pagination-without-border pull-right m-t-0">
                    <li class="disabled"><a href="javascript:;">«</a></li>
                    <li class="active"><a href="javascript:;">1</a></li>
                    <li><a href="javascript:;">2</a></li>
                    <li><a href="javascript:;">3</a></li>
                    <li><a href="javascript:;">4</a></li>
                    <li><a href="javascript:;">5</a></li>
                    <li><a href="javascript:;">6</a></li>
                    <li><a href="javascript:;">7</a></li>
                    <li><a href="javascript:;">»</a></li>
                </ul>
                <ul class="result-list">
                    <?php echo $group_data; ?>
                 </ul>
                <div class="clearfix">
                    <ul class="pagination pagination-without-border pull-right">
                        <li class="disabled"><a href="javascript:;">«</a></li>
                        <li class="active"><a href="javascript:;">1</a></li>
                        <li><a href="javascript:;">2</a></li>
                        <li><a href="javascript:;">3</a></li>
                        <li><a href="javascript:;">4</a></li>
                        <li><a href="javascript:;">5</a></li>
                        <li><a href="javascript:;">6</a></li>
                        <li><a href="javascript:;">7</a></li>
                        <li><a href="javascript:;">»</a></li>
                    </ul>
                </div>
            </div>
	    </div>
	    <!-- end col-12 -->
	</div>
	<!-- end row -->
</div>
 <script type="text/javascript">
$(document).ready(function(){
    $('#doc').hide();
    $('#link').hide();
    $('#doc_type').change(function(){
        type = $(this).val();
        if (type == 1) {
            $('#doc').show();
            $('#doc').attr('required','true');
            $('#link').hide();
            $('#link').removeAttr('required');
        }else {
            $('#doc').hide();
            $('#doc').removeAttr('required');
            $('#link').show();
            $('#link').attr('required','true');
        };
    });
    rights = <?php echo $rights;?>;
    
    //get the input and UL list when it is the group leader logged in.
    if (rights == 1) {
        var input = document.getElementById('upload');
        
        //for every file...
        for (var x = 0; x < input.files.length; x++) {
            //add to list
            var li = document.createElement('li');
            li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
            list.append(li);
        }
    };

});
</script>