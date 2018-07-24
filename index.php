<?php include('includes/fancyheader.php'); ?>


<div class="centersearch">
	<img src="img/logo.png" style="width: 400px;"/>
	<form action="problems.php" method="get">
    	<input type="hidden" name="prb_cat" value=""/>
    	<input name="prb_search" placeholder="Enter your search query here" type="text" class="form-control"/><input name="prb_scbtn" value="SEARCH" type="submit" class="btn btn-warning"/>
        <br/><br/>
        Tuteler offered in <a href="#">සිංහල</a>  <a href="#">English</a> 
    </form>
</div>

<?php include('includes/fancyfooter.php'); ?>