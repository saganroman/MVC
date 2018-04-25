<?php echo '
<div class="container" id="container">
<blockquote class="blockquote text-center">
	<h1> Messages board User</h1>
	</button>
</blockquote>
<div class="row">
	<div class="col-md-8 offset-2">
		<table class="table table-striped">
			<thead>
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Title</th>
				<th scope="col">Content</th>
				<th scope="col">Priority</th>
				
			</tr>
			</thead>
			<tbody>';
foreach ($messagesList as $message) {
	echo "
				<tr>
					<td>  $message[id] </td>
					<td>  $message[title] </td>
					<td>  $message[content] </td>
					<td> ";
	if ((int)$message["priority"] == 1) {
		echo 'asc';
	} else {
		echo 'desc';
	}
	echo '
				</td>
								</tr>
												';
}
echo '
			</tbody>
		</table>
	</div>
</div>

	'; ?>