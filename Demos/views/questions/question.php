<div>
    <legend><?php echo($this->question['Title'])?></legend>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Username:<strong><?php echo($this->question['Username'])?></strong>
            <div class="pull-right"> <?php echo($this->question['DateTime'])?></div>
        </div>
        <div class="panel-body">
            <p>
                <?php echo($this->question['Question'])?>
            </p>
        </div>

    </div>


    <?php
    foreach($this->answers as $answer): ?>
        <div class="panel panel-primary">
            <div class="panel-heading">Username: <strong> <?php echo($answer[0])?></strong>
                <div class="pull-right"> <?php echo($answer[1])?></div></div>
            <div class="panel-body">
                <p>
                    <?php echo($answer[2])?>
                </p>
            </div>
        </div>
    <?php endforeach;
    ?>

</div>

<form class="form-horizontal col-lg-6 col-lg-offset-3" >
    <fieldset>
        <legend>Send Answer</legend>

        <div class="form-group">
            <label for="textArea" class="col-lg-2 control-label">Textarea</label>
            <div class="col-lg-10">
                <textarea class="form-control" rows="3" id="textArea" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="inputUserName" class="col-lg-2 control-label">User Name</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputUserName" placeholder="User Name" type="text" required>

            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputEmail" placeholder="Email" type="text">
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </fieldset>
</form>
