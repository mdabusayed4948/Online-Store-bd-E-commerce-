<?php include 'inc/header.php';?>		
<?php include 'inc/slider.php';?>
<?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wlist'])) {
        $productId = $_POST['productId'];
        $saveWlist = $pd->saveWishlistData($productId, $cmrId);
    }
?>
<?php
	if (isset($saveWlist)) {
		echo  $saveWlist;
		}
	?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		 
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      <?php
	      	$getFpd = $pd->getFeaturedProduct();
	      	if ($getFpd) {
	      		while ($result = $getFpd->fetch_assoc()) {
	      			
	      ?>
	     
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId']?>"><img src="admin/<?php echo $result['image']?>" alt="" /></a>
					 <h2><?php echo $result['productName']?> </h2>
					 <p>
					 <?php echo $fm->textShorten($result['body'],60);?>
					 </p>
					 <p><span class="price">$<?php echo $result['price']?></span></p>
					 <style>
					 	.myspan{ width: 100px; float: left; }
					 	
					 </style>
				     <div class="button">
				     <span class="myspan"><a href="details.php?proid=<?php echo $result['productId']?>" class="details">Details</a>
				     </span>
				   <?php
	  	         $login = Session::get("cuslogin");
	  	         if ($login == true) { ?>
				     <span class="myspan"><form action="" method="post" >
						<input type="hidden" class="buyfield" name="productId" value="<?php echo $result['productId']?>"/>
						<input type="submit" class="buysubmit"  name="wlist" value="Save to List"/>
					</form>	
				     </span>
				     <?php } ?>
				     </div>
				     
				    
				</div>
				<?php } };?>
				
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			 <?php
	      	$getNpd = $pd->getNewProduct();
	      	if ($getNpd) {
	      		while ($result = $getNpd->fetch_assoc()) {
	      			
	      ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId']?>"><img src="admin/<?php echo $result['image']?>" alt="" /></a>
					 <h2><?php echo $result['productName']?> </h2>
					
					 <p><span class="price">$<?php echo $result['price']?></span></p>
				     <div class="button">

				     <span class="myspan"><a href="details.php?proid=<?php echo $result['productId']?>" class="details">Details</a></span>
					  <?php
	  	         $login = Session::get("cuslogin");
	  	         if ($login == true) { ?>
					<span class="myspan"><form action="" method="post" >
						<input type="hidden" class="buyfield" name="productId" value="<?php echo $result['productId']?>"/>
						<input type="submit" class="buysubmit"  name="wlist" value="Save to List"/>
					</form>	
				     </span>
				     <?php } ?>
				     </div>
				</div>				
			<?php } };?>	
				
			</div>
    </div>
 </div>
 <?php include 'inc/footer.php';?>