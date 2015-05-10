<div class="col-lg-12">
     <div class="col-lg-3">
         <?php if($this->isLoggedIn) : ?>
         <a class="btn btn-default"  type="submit" href="/demos/questions/create">Add Question</a>
         <?php endif; ?>
     </div>
    <form class="form-group col-lg-4 col-lg-offset-4" action="/demos/search" method="post">
        <div class="input-group">
            <input class="form-control" name="search" placeholder="..." type="text">
             <span class="input-group-btn">
                 <button class="btn btn-default"  type="submit">Search</button>
            </span>
        </div>
    </form>
</div>

<div class="col-lg-10">
    <legend>All Questions</legend>
    <table class="table table-striped table-hover ">
        <?php
        foreach($this->questions as $question): ?>
        <tr href="/demos/questions/question/20">
           <td class="col-md-7">
               <a href="<?php  echo("/demos/questions/question/".$question['id'])  ?>">
                <?php echo(htmlentities($question['Title'])) ?>
                 </a>
            </td>
            <td class="col-md-2">User: <?php echo($question['Username']) ?></td>
            <td class="col-md-3">Post date: <?php echo($question['DateTime']) ?></td>
        </tr>
        <?php endforeach;
        ?>
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