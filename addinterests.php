<?php include("includes/dashheader.php") ?>

<link href="css/jquery.tagit.css" rel="stylesheet" type="text/css">
<link href="css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<!-- The real deal -->
<script src="js/tag-it.js" type="text/javascript" charset="utf-8"></script>
<script>
   $(function(){
       var sampleTags = ['agriculture', 'chemical', 'computers', 'construction', 'defense', 'education', 'energy', 'entertainment', 'financial', 'food', 'health', 'hospitality', 'information', 'manufacturing', 'media', 'telco', 'transport', 'water'];
	   
       $('#allowSpacesTags').tagit({
           availableTags: sampleTags,
           allowSpaces: true,
   showAutocompleteOnFocus: true
       });
   
   });
   function addinterests(){
	 $.post("interesthdl.php",{method:"addinterests",tags:$("#allowSpacesTags").tagit("assignedTags")},function(e){
		alert(e);  
	 });	
   }
</script>
<h1>Add your interests</h1>
<form>
   <p></p>
   <ul id="allowSpacesTags"></ul>
   <button name="prb_submit" onClick="javascript:addinterests();" type="button" class="btn btn-primary">Add interests</button>
</form>
<small>Click on the text box to add your interests</small>

<?php include("includes/dashfooter.php") ?>