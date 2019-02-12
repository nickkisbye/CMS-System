<?php include 'includes/header.php';

$pageTitle = 'Dine Beskeder';

if(isset($_SESSION['admin']) || isset($_SESSION['user'])) {
    ?>

    <div class="col-md-9">
        <!-- Website Overview -->
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #428bca; color:white;">
                <h3 class="panel-title"><?php echo $pageTitle ?></h3>
            </div>
            <div class="panel-body">
                <?php if (isset($_GET['type']) == 'send') {?>
                <form action="manage/messages.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Send til: </label>
                        <br>
                        <select class="custom-select" name="user2">
                            <?php foreach (get_user_info() as $user) {
                                if($_SESSION['fullName'] != $user['fullName']) { ?>
                            <option value="<?php echo $user['fullName'] ?>"><?php echo $user['fullName'] ?></option>
                            <?php } } ?>
                        </select>
                        <div class="form-group">
                            <br>
                            <label for="exampleInputEmail1">Emne</label>
                            <input type="text" class="form-control" name="subject" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Skriv emne">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Besked</label>
                            <textarea type="text" class="form-control" name="message" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Skriv besked"></textarea>
                        </div>
                        <input type="hidden" name="user" value="<?php echo $_SESSION['fullName'] ?>">
                        <button type="submit" class="btn btn-primary">Send besked</button>
                    </div>
                </form>
                    <?php } elseif(isset($_GET['id'])) { ?>

                    <?php foreach (view_message($_GET['id']) as $message) { ?>

                        <div class="jumbotron">
                            <h2 class="display-3"><?php echo $message['title'] ?></h2>
                            <p class="lead"><?php echo $message['timestamp'] ?> | Af <?php echo $message['user1'] ?></p>
                            <hr class="my-4">
                            <p><?php echo $message['message'] ?></p>
                            <p class="lead">
                              <hr>
      
                            </p>
                        </div>


                    <?php }  ?>

                    <?php } elseif(isset($_GET['delete'])) { ?>

                    <?php delete_message($_GET['delete']); ?>
                        <?php echo 'Besked slettet.' ?>
                    <?php } else { ?>

                    <a href="messages.php?type=send">Send besked</a>
                    <br>
                    <br>Du har <b><?php echo $count = count(get_message($_SESSION['fullName']))?></b> besked<?php if($count > 1) { echo 'er.'; } ?>
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Fra</th>
                                <th>Sendt</th>
                                <th>Titel</th>
                                <th></th>
                            </tr>
                            <?php foreach (get_message($_SESSION['fullName']) as $message) { ?>
                                <tr>
                                    <td><?php echo $message['user1'] ?></td>
                                    <td><?php echo $message['timestamp'] ?></td>
                                    <td><?php echo $message['title'] ?></td>
                                    <td><a class="btn btn-default" href="messages.php?id=<?php echo $message['id'] ?>">Se</a> <a class="btn btn-danger" href="messages.php?delete=<?php echo $message['id'] ?>">Slet</a><?php } ?>
                                    </td>
                                </tr>

                            <?php } ?>
                        </table>

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