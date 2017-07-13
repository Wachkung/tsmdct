<?php
	include("../includes/config.inc.php"); 
	include("../includes/conndb.php"); 
?>
<script>

function validate() {
	
if(document.frmMain.Datacenter_Username.value == "")
{	alert('ใส่ Username');	
			document.frmMain.Datacenter_Username.focus();
			return false;
} 

		
if(document.frmMain.Datacenter_Password.value == "")
{	alert(' ใส่ Password ');	
			document.frmMain.Datacenter_Password.focus();
			return false;
} 	




return true;
}

function validateGroup(elements) {
   for (var i = 0; i < elements.length; i++) 
   {
       if (elements[i].checked) return true;
   }
   return false;
}

</script>
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li>เข้าสู่ระบบ</li>
		</ol>
	</div>
</div>

<div class="container-fluid">
	<div id="page-login" class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="box">                  
				<div class="box-content">
					<form  name="frmMain"  action="check_login.php" method="post" enctype="multipart/form-data" onSubmit="JavaScript:return validate();">
					<div class="text-center">
						<h3 class="page-header"><?php echo $titleweb; ?></h3>
					</div>
					<div class="form-group">
						<label class="control-label">Username</label>
						<input type="text" class="form-control" name="Datacenter_Username" />
					</div>
					<div class="form-group">
						<label class="control-label">Password</label>
						<input type="password" class="form-control" name="Datacenter_Password" />
					</div>
                    	
                     
					<div class="text-center">
                    	<input type="submit" class="btn btn-primary" value="เข้าสู่ระบบ">
						
					</div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>

