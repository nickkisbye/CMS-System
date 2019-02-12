<?php include 'includes/header.php';
$pageTitle = 'Brugere';

?>
      <div class="col-md-9">
        <!-- Website Overview -->
        <div class="panel panel-default">
          <div class="panel-heading" style="background-color: #428bca; color:white;">
            <h3 class="panel-title"><?php echo $pageTitle ?></h3>
          </div>
            <div class="panel-body">
            <br>
            <table class="table table-striped table-hover">
                  <tr>
                    <th>Navn</th>
                    <th>Email</th>
                    <th>Tilmeldt</th>
                    <th></th>
                  </tr>
                <?php foreach (get_user_info() as $user) { ?>
                  <tr>
                    <td><?php if($user['logged'] > $loggedtime) { ?> <img src="on.png" width="15px" height="15px"> <?php } else { ?> <img src="off.png" width="15px" height="15px"> <?php } ?> <?php echo $user['fullName'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['created_at'] ?></td>
                    <td><?php if(isset($_SESSION['admin'])) { ?><a class="btn btn-default" href="edit.php?id=<?php echo $user['id'] ?>">Ret</a> <a class="btn btn-danger" href="manage/user.php?delete=<?php echo $user['id'] ?>">Slet</a><?php } ?>
                    </td>
                </tr>
                <?php } ?>
                </table>
          </div>
          </div>

      </div>
    </div>
  </div>
</section>
      <?php include 'includes/footer.php'; ?>