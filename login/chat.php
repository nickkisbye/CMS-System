<?php include 'includes/header.php';

$pageTitle = 'Chat';

if(isset($_SESSION['admin']) || isset($_SESSION['user'])) {
    ?>

    <div class="col-md-9">
        <!-- Website Overview -->
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #428bca; color:white;">
                <h3 class="panel-title"><?php echo $pageTitle ?></h3>
            </div>
            <div class="panel-body">
                h
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
    </section>
<?php } else {
    header("Location: ../index.php");
}?>

<?php include 'includes/footer.php'; ?>