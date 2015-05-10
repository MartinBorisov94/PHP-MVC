<div class="col-lg-10">
    <legend>Search</legend>
    <table class="table table-striped table-hover ">
        <?php if( $this->searchDate == null): ?>
            <h3> Not found </h3>
        <?php endif;?>
        <?php
        foreach( $this->searchDate as $date): ?>
            <tr href="/demos/questions/question/20">
                <td class="col-md-5">
                    <a href="<?php  echo("/demos/questions/question/".$date['Id'])  ?>">
                        <?php echo(htmlentities($date['Title'])) ?>
                    </a>
                </td>
                <td class="col-md-2">User: <?php echo(htmlentities($date['Username'])) ?></td>
                <td class="col-md-3">Post date: <?php echo($date['DateTime']) ?>
                </td><td class="col-md-5">Category <?php echo($date['Catagory']) ?></td>
            </tr>
        <?php endforeach;
        ?>
    </table>
</div>
<div class="col-lg-2">