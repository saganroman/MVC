<blockquote class="blockquote text-center">
    <h1> Messages board</h1>

</blockquote>
<div class="row">
    <div class="col-md-8 offset-2">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Priority</th>

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

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>



<!-- Modal -->
<div id="addMessage" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add message</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="addMessageTitle">Title</label>
                        <input type="text" class="form-control" id="addMessageTitle" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="addMessagePriority">Priority</label>
                        <select class="form-control" id="addMessagePriority">
                            <option value="1">Asc</option>
                            <option value="2">Desc</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="addMessageContent">Message content</label>
                        <textarea class="form-control" id="addMessageContent" rows="3"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary " id="addMessageSubmit">Add message</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div id="editMessage" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit message</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="editMessageTitle">Title</label>
                        <input type="text" class="form-control" id="editMessageTitle" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="editMessagePriority">Priority</label>
                        <select class="form-control" id="editMessagePriority">
                            <option value="1">Asc</option>
                            <option value="2">Desc</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editMessageContent">Message content</label>
                        <textarea class="form-control" id="editMessageContent" rows="3"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary " id="editMessageSubmit">Edit message</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>