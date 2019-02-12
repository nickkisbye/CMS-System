<?php if (!isset($_GET['id'])) {
    header("Location: /login/users.php"); ?>
    <?php } else { ?>
    <?php include 'includes/header.php';
    $pageTitle = 'Ret Bruger';

    $id = $_GET['id'];
    foreach (edit_user_info($id) as $d) {

    }

    ?>
              <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading" style="background-color: #428bca; color:white;">
                <h3 class="panel-title"><?php echo $pageTitle ?></h3>
              </div>
              <div class="panel-body">
                  <?php
                  if (isset($_GET['error'])) {
                      if ($_GET['error'] == 'true') {
                          echo 'Du mangler at udfylde et kodeord!';
                      }
                  }
                  ?>
                  <form action="./manage/user.php" method="post">
                      <div class="modal-body">
                          <div class="form-group">
                              <label>Fulde navn</label>
                              <input type="text" name="name" class="form-control" value="<?php echo $d['fullName']; ?>">
                          </div>
                          <div class="form-group">
                              <label>Email</label>
                              <input type="email" name="email" class="form-control" value="<?php echo $d['email']; ?>">
                          </div>
                          <div class="form-group">
                              <select class="custom-select" name="role">
                                  <?php foreach (get_roles() as $role) { ?>
                                      <option value="<?php echo $role['name']; ?>"><?php echo $role['name']; ?></option>
                                  <?php } ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Brugernavn</label>
                              <input type="text" name="username" class="form-control" value="<?php echo $d['username']; ?>">
                          </div>
                          <div class="form-group">
                              <label>Kodeord</label>
                              <input type="password" name="password" class="form-control" placeholder="Nyt kodeord">
                          </div>
                          <input type="hidden" name="id" value="<?php echo $id ?>">
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Gem</button>
                      </div>
                  </form>
              </div>
              </div>

          </div>
        </div>
      </div>
    </section>
<?php } ?>

<?php include 'includes/footer.php'; ?>