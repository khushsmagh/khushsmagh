<?php
$pageTitle = 'Artists';
include('includes/header.inc.php'); 
include('includes/view-artists.php');
?>
</div>
    <h3>This Week's best selling artists</h3>
    <div class="alert alert-warning">
        <p>Each week we show you who are our best-selling artists ...</p>
    </div>
<div class = "container">
    <div class="row">
        <?php
        OutputArtist();
        ?>
    </div>
</div>
    <h4> Artists by Genre </h4>
    <div class="row">
        <div class="col-md-12">
            <div class="progress">
                <div class="progress-bar progress-bar-info" role="progressbar" style="width: 7%">
                    <p>Gothic</p>
                </div>
                <div class="progress-bar progress-bar-success" role="progressbar" style="width: 27%">
                    <p>Renaissance</p>
                </div>
                <div class="progress-bar progress-bar-warning" role="progressbar" style="width: 15%">
                    <p>Baroque</p>
                </div>
                <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 21%">
                    <p>Pre-Modern</p>
                </div>
                <div class="progress-bar progress-bar-primary" role="progressbar" style="width: 30%">
                    <p>Modern</p>
                </div>
            </div>
        </div>
	</div>
</div>
</div>
<script src="bootstrap-3.2.0-dist/js/jQuery.js"></script>
<script src="bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
