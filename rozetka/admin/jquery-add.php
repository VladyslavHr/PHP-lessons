<?php


if (isset($_POST['new_rule'])) {
    if (empty($_POST['title'])){
      $message = 'Please add title!';
      flash_alert('danger', $message);
      redirect('admin.php?action=jquery-add');
    }
    
    if (empty($_POST['description'])){
      $message = 'Please add description!';
      flash_alert('danger', $message);
      redirect('admin.php?action=jquery-add');
    }
    
    if (empty($_POST['example'])){
      $message = 'Please add example!';
      flash_alert('danger', $message);
      redirect('admin.php?action=jquery-add');
    }

    if (empty($_POST['link'])){
      $message = 'Please add link!';
      flash_alert('danger', $message);
      redirect('admin.php?action=jquery-add');
    }
}
    
    // Create
    if(isset($_POST['new_rule'])){
        $title = db_escape($_POST['title']);
        $description = db_escape($_POST['description']);
        $type = db_escape($_POST['type']);
        $example = db_escape($_POST['example']);
        $link = db_escape($_POST['link']);

        db_query("INSERT INTO jq_rules SET
          title = '$title',
          `description` = '$description',
          `type` = '$type',
          example = '$example',
          link = '$link' ");
    
          $message = 'Rule add successfully!';
          flash_alert('success', $message);
    
          session_post_clear();

        redirect('admin.php?action=jquery');
      
    
    }



?>


<h1>JQUERY add</h1>



<form action="?action=jquery-add" method="Post" enctype='multipart/form-data'>



<div class="row my-3">
  <div class="col">
  <label class="form-label">Title</label>
    <input name="title" value="<?= session_take_post('title')?>" type="text" class="form-control" placeholder="Title" aria-label="Title">

    <div class="col">
        <label class="form-label">Type</label>
            <select name="type" class="form-select">
            <option selected="selected" value="jQuery">jQuery</option>
            <option  value="JavaScript">JavaScript</option>
            </select>
    </div>

  <label class="form-label">Link</label>
    <input name="link" type="text" class="form-control" placeholder="Link" aria-label="Link">
  </div>

  <div class="col">
  <label class="form-label">Description</label>
    <textarea name="description" value="<?= session_take_post('description')?>" rows="4" type="text" max="50" class="form-control" placeholder="Description" aria-label="description"></textarea>
  </div>
</div>

<div class="row my-3">
  <label class="form-label">Example</label>
    <textarea name="example" value="<?= session_take_post('example')?>" rows="4" type="text" max="50" class="form-control" placeholder="Example" aria-label="example"></textarea>
  </div>


  <button name="new_rule" type="submit" class="btn btn-primary">Save</button>