<?php include 'includes/header.php';

$pageTitle = 'Opdatér dine brugeroplysninger';

?>

    <div class="col-md-9">
        <!-- Website Overview -->
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #428bca; color:white;">
                <h3 class="panel-title" ><?php echo $pageTitle ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12"><h3><?php echo $_SESSION['fullName']; ?></h3></div>
            </div>
        </div>

    </div>
    </div>
    </div>
    </section>


<?php include 'includes/footer.php'; ?>