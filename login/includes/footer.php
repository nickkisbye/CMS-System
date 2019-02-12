<!-- Modals -->
<?php if(isset($_SESSION['admin'])) { ?>

<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="./manage/user.php" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Page</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Fulde navn</label>
                        <input type="text" name="name" class="form-control" placeholder="Fulde navn">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="role">
                            <option selected="">Vælg Rolle</option>
                            <?php foreach (get_roles() as $role) { ?>
                            <option value="<?php echo $role['name']; ?>"><?php echo $role['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Brugernavn</label>
                        <input type="text" name="username" class="form-control" placeholder="Brugernavn">
                    </div>
                    <div class="form-group">
                        <label>Kodeord</label>
                        <input type="password" name="password" class="form-control" placeholder="Kodeord">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Luk</button>
                    <button type="submit" class="btn btn-primary">Gem</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace( 'editor2' );
    CKEDITOR.replace( 'editor3' );
</script>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>