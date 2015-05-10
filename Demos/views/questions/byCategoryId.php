<div class="col-lg-10">
    <legend> <?php echo($this->questionsByCategorie[0]['4']) ?></legend>
    <table class="table table-striped table-hover ">
        <?php
        foreach($this->questionsByCategorie as $question): ?>
            <tr href="/demos/questions/question/20">
                <td class="col-md-7">
                    <a href="<?php  echo("/demos/questions/question/".$question['0'])  ?>">
                        <?php echo($question['1']) ?>
                    </a>
                </td>
                <td class="col-md-2">User <?php echo($question['3']) ?></td>
                <td class="col-md-3">Post date: <?php echo($question['2']) ?></td>
            </tr>
        <?php endforeach;?>
    </table>
</div>
<div class="col-lg-2">
    <h5>Categories</h5>
    <p class="text-primary">
        <a href="/demos/">All</a>
    </p>
    <?php foreach($this->categories as $category): ?>
        <p class="text-primary">
            <a href="<?php echo("/demos/questions/bycategoryid/" .$category['Id'])?>">
                <?php echo($category["Catagory"]); ?>
            </a>
        </p>
    <?php endforeach; ?>
</div>