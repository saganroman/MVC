<?php echo '
<div class="container" id="container">
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
                <tbody>';
foreach ($usersList as $user) {
	echo " <tr>
                        <td> $user[id] </td>
                        <td> $user[username] </td>
                        <td> ";

	if ((int)$user["type"] == 1) {
		echo 'admin';
	} else {
		echo 'simple user';
	}

	echo '   </td>
                    </tr>';
}
echo '   </tbody>
            </table>
        </div>
    </div>
</div>
'; ?>
