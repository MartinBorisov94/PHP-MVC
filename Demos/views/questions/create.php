
<form class="form-horizontal col-lg-6 col-lg-offset-3"  method="post" action="/demos/questions/create">
    <fieldset>
        <legend>Add Question</legend>
        <div class="form-group">
            <label for="title" class="col-lg-2 control-label">Title</label>
            <div class="col-lg-10">
                <input class="form-control" rows="3" id="title" name="title" placeholder="Title" required/>
            </div>
        </div>
        <div class="form-group">
            <label for="question" class="col-lg-2 control-label">Question</label>
            <div class="col-lg-10">
                <textarea class="form-control" rows="3" id="question" name="question" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="select" class="col-lg-2 control-label">Selects</label>
            <div class="col-lg-10">
                <select class="form-control" id="category" name="category">
                    <?php foreach ($this->categories as $category) : ?>
                    <option value="<?php echo($category['Id']); ?>"> <?php echo($category['Catagory']); ?></option>
                    <?php endforeach;?>
                </select>
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
