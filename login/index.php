<?php include 'includes/header.php';

$pageTitle = 'Hjemmeside oversigt';

if(isset($_SESSION['admin']) || isset($_SESSION['user'])) {
?>

            <div class="col-md-9">
                <!-- Website Overview -->
               <?php if(isset($_SESSION['admin'])) { ?>
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #428bca; color:white;">
                        <h3 class="panel-title"><?php echo $pageTitle ?></h3>or
                    </div>
                    <div class="panel-body">
                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo count(get_user_info()); ?></h2>
                                <h4>Brugere</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> <?php echo count(get_online()); ?> </h2>
                                <h4>Online</h4>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-time" aria-hidden="true"></span> 2 </h2>
                                <h4>Deadlines</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> 12,334</h2>
                                <h4>Indtjening</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Latest Users -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Seneste brugere</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Navn</th>
                                <th>Email</th>
                                <th>Tilmeldt</th>
                            </tr>
                            <?php foreach (get_user_info() as $userDetail) { ?>
                            <tr>
                                <td><?php echo $userDetail['fullName'] ?></td>
                                <td><?php echo $userDetail['email'] ?></td>
                                <td><?php echo $userDetail['created_at'] ?></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
               <?php } else { ?>
                   <div class="panel panel-default">
                       <div class="panel-heading">
                           <h3 class="panel-title">Seneste aktiviteter</h3>
                       </div>
                       <div class="panel-body">
                           <table class="table table-striped table-hover">
                               <tr>
                                   <th>Aktivitet</th>
                               </tr>
                               <?php foreach (get_user_info() as $userDetail) { ?>
                                   <tr>
                                       <td>Aktivitet</td>
                                   </tr>
                               <?php } ?>
                           </table>
                       </div>
                   </div>
               <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } else {
    header("Location: ../index.php");
}?>

<?php include 'includes/footer.php'; ?>