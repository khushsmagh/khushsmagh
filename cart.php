<?php
$pageTitle = 'Your cart';

include('includes/header.inc.php');
require_once('includes/painting.class.php');
require_once('includes/types.frames.class.php');
require_once('includes/types.glass.class.php');
require_once('includes/types.matt.class.php');

?>
				<script src="js/changeBackground.js"></script>

			<h2>Your cart</h2>
			
<a href="clear-cart.php" onclick="return confirm('This will empty your cart \n Are you sure?')"> empty cart </a>
				
<?php
			if(is_array($myCart->cartContent())){
?>
			<div class="container-fluid cart">
				<div class="row">
					<div class="col-md-1">
					item
					</div>
					<div class="col-md-1">
					ID
					</div>
					<div class="col-md-5">
					title
					</div>
					<div class="col-md-3">
					artist
					</div>
					<div class="col-md-2">
					price
					</div>
				</div>
<?php
				$rowCount = 0;
				foreach($myCart->cartContent() as $cartItem) {
					$painting = new Painting($cartItem->paintingID());
					$rowCount++;
					?>
						<div class="row accordion">
							<div class="col-md-1">
							<?php echo $rowCount; ?>
							</div>
							<div class="col-md-1">
							<?php echo $cartItem->paintingID(); ?>
							</div>
							<div class="col-md-5">
							<?php $painting->outputMiniature(); ?>
							</div>
							<div class="col-md-3">
							<?php echo $painting->artist(); ?>
							</div>
							<div class="col-md-2 text-right">
							<?php echo '$ '.number_format($painting->price(),2); ?>
							</div>
						</div>
						<div class="row panel">
							<div class="col-md-8">
							<form action="update-cart-item.php" method="POST" >
								<input type="hidden" name="cartItem" value="<?php echo $rowCount; ?>">
								<input type="hidden" name="paintingID" value="<?php echo $cartItem->paintingID(); ?>">
								<div class="form-group">
									<label>Frame</label>
									<select name="frame" class="form-control frame">
									<?php
									$frames = new TypesFrames;
									$frames->optionList($cartItem->frameID());
									?>
									</select>
								</div>
								<div class="form-group">
									<label>Glass</label>
									<select name="glass" class="form-control glass">
									<?php
									$glass = new TypesGlass;
									$glass->optionList($cartItem->glassID());
									?>
									</select>
								</div>

								<div class="form-group">
									<label>Matt</label>
									<select name="matt" class="form-control matt" onclick="changeBackground()">
									<?php
									$matt = new TypesMatt;
									$matt->optionList($cartItem->mattID());
									?>
									</select>
								</div>
								<button type="submit" class="btn btn-default">Update</button>
								</form>
							</div>
							<div class="col-md-4">
							<a href="delete-cart-item.php?cartItem=<?php echo $rowCount; ?>" onclick="return confirm('Are you sure?')"> delete</a>

							</div>
						</div>
<?php					}	
?>
				</div>
				<script src="js/accordion.js"></script>
				
  <?php
			}
				?>

			<form action="add-to-cart.php" method="POST">
			  Painting ID:<br>
			  <input type="text" name="paintingID">
			  <br><br>
			  <input type="submit" value="Add to cart">
			</form>

			
<?php include('includes/footer.inc.php'); ?>
