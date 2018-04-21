
    <blockquote class="blockquote text-center">
        <h1> List of users</h1>
    </blockquote>
    <div class="row">
        <div class="col-md-8 offset-2">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">User id</th>
                    <th scope="col">User name</th>
                    <th scope="col">User type</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($usersList as $user) : ?>
                    <tr>
                        <td> <?php echo $user['id'] ?></td>
                        <td> <?php echo $user['username'] ?></td>
                        <td> <?php if ((int)$user['type'] == 1) {
                                echo 'admin';
                            } else {
                                echo 'simple user';
                            } ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

