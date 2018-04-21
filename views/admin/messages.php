<blockquote class="blockquote text-center">
    <h1> Messages board</h1>
    <button type="button " class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add message</button>
</blockquote>
<div class="row">
    <div class="col-md-8 offset-2">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Priority</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($messagesList as $message) : ?>
                <tr>
                    <td> <?php echo $message['title'] ?></td>
                    <td> <?php echo $message['content'] ?></td>
                    <td> <?php if ((int)$message['priority'] == 1) {
                            echo 'asc';
                        } else {
                            echo 'desc';
                        } ?></td>
                    <td class="menu-action">
                        <div class="pdng5">
                            <a data-toggle="modal" data-target="#edit"
                               class="btn btn-xs btn-default editMessage"> <i class="fas fa-pencil-alt"></i>
                                <i class="fas fa-pencil-alt"
                                                                             data-original-title="Edit"
                                                                             data-toggle="tooltip"
                                                                             data-placement="top"></i></a>
                            <a data-toggle="modal" data-target="#remove"
                               class="btn btn-xs btn-default destroyMessage"><i class="fa fa-trash-o"
                                                                                data-original-title="Remove"
                                                                                data-toggle="tooltip"
                                                                                data-placement="top"></i></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>



<!-- Modal -->
<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>