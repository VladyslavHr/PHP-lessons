<?php 

if(isset($_POST['edit_rule']))
{
    $rule_id = (int)$_POST['rule_id'];
    $title = db_escape($_POST['title']);
    $description = db_escape($_POST['description']);
    $example = db_escape($_POST['example']);
    $type = db_escape($_POST['type']);

   

    db_query("UPDATE jq_rules SET
    title = '$title',
    `description` = '$description',
    example = '$example',
    `type` = '$type'
    WHERE id = '$rule_id'");

    if($_POST['edit_rule'] === 'save') redirect("admin.php?action=jquery-edit&rule_id=$rule_id");
    if($_POST['edit_rule'] === 'save_list') redirect('admin.php?action=jquery');

}

$rule_id = (int)$_GET['rule_id'];
$rule = db_query("SELECT * FROM jq_rules WHERE id = '$rule_id' ");
$rule = $rule[0];


?>


<h2>Edit Rule <?= $rule['title'] ?> </h2>

<form action="?action=jquery-edit" method="Post"  enctype='multipart/form-data'>

<input type="hidden" name="rule_id" value="<?= $rule['id']?>">

<div class="row my-3">
  <div class="col">
    <label class="form-label">Title</label>
    <input name="title" value="<?=$rule['title']?>" type="text" class="form-control" placeholder="Title" aria-label="Title">
  </div>
  <div class="col">
  <label class="form-label">Description</label>
    <textarea name="description" rows="4" class="form-control" placeholder="Description"><?=$rule['description']?></textarea>
  </div>
</div>

<div class="row my-3">
  <div class="col">
  <label class="form-label">Example</label>
    <textarea name="example" rows="4" class="form-control" placeholder="Example"><?=$rule['example']?></textarea>
  </div>
  <div class="col">
  <label class="form-label">Type</label>
  <select name="type" class="form-select">
    <option <?= if_selected($rule['type'], 'jQuery') ?> value="jQuery">jQuery</option>
    <option <?= if_selected($rule['type'], 'JavaScript') ?> value="JavaScript">JavaScript</option>
    </select>
  </div>
</div>

<button name="edit_rule" value="save" type="submit" class="btn btn-primary">Save</button>
<button name="edit_rule" value="save_list" type="submit" class="btn btn-primary"><?= bi('list-ul') ?> Save Show List</button>

</form>