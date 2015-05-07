<div>
    <legend>All Questions</legend>
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

