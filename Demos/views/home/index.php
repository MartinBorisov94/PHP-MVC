<div>
    <legend>All Questions</legend>
    <table class="table table-striped table-hover ">
        <?php
        foreach($this->questions as $question): ?>
        <tr href="/demos/questions/question/20">
           <td class="col-md-7">
                <a href="<?php  echo("/demos/questions/question/".$question['id'])  ?>">
                <?php echo($question['Title']) ?>
                </a>
            </td>
            <td class="col-md-2">User <?php echo($question['Username']) ?></td>
            <td class="col-md-3">Post date: <?php echo($question['DateTime']) ?></td>
        </tr>
        <?php endforeach;
        ?>
    </table>
</div>

