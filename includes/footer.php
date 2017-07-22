<!--แสดงข้อมูลของเว็บไซต์ที่ด้านล่างของเว็บเพจ-->
<div class="row">
  	<div class="col-md-12">
		<hr>
			<table width="100%" border="0" cellspacing="0" cellpadding="10">
			 <tr>
			  <td align="center">
			   <p>&copy; <?php echo '2015 - ' . date('Y'); ?> <?php echo $namehosp; ?><br>
				Address : <?php echo $Address; ?><br>
				Phone : <?php echo $Phone; ?><br>
				Email : <a href="mailto:<?php echo $Email;?>"><?php echo $Email; ?></a><br>
				Facebook : <?php echo $message; ?> 
			   </td>
			 </tr>
			</table>
	</div>
</div>
<script>
  $(function() {
    $('.dropdown-toggle').dropdown();	//สำหรับการคลิก dropdown menu ใน Bootstrap
  });
</script>
</div><!-- ปิดส่วนของคลาส container -->
