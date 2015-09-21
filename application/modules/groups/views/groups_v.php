<div id="content" class="content">
	<!-- begin page-header -->
	<h1 class="page-header">Groups & Notes </h1>
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
                        Belonged Groups
                    </a>
                    
                </span>
            </div>
            <div id="gallery" class="gallery">
                <?php
                	echo $groups;
                ?>
                
            </div>
		
	<!-- end row -->
</div>
