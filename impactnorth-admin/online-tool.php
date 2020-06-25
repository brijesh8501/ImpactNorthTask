<?php
include 'template-parts/header.php';
include 'request.php';
?>
<div class="container">
    <?php if($select_record_for_edit_resp === 0){ ?>
        <div class="card bg-danger text-white">
            <div class="card-body">Something went wrong!</div>
        </div>
    <?php }else{ ?>
    <h1 class="text-center"><?php echo strtoupper($select_record_for_edit_resp->title); ?></h1>
        <form method="POST" enctype="multipart/form-data" class="pt-5">
            <input type="hidden" name="csrf_token" id="csrfToken" value="<?php echo generateToken('onlineTool'); ?>"/>
            <input type="hidden" id="id" name="id" value="<?php echo $select_record_for_edit_resp->id; ?>"/>
            <div class="form-group">
                <label for="content">Below code will place at the end in the header section:</label>
                <textarea class="form-control" id="headerContent" name="header_content" rows="20" cols="38"><?php echo $select_record_for_edit_resp->header_content; ?></textarea>
            </div>
            <div class="form-group">
                <label for="content">Below code will place at the end in the body section:</label>
                <textarea class="form-control" id="footerContent" name="footer_content" rows="20" cols="38"><?php echo $select_record_for_edit_resp->footer_content; ?></textarea>
            </div>
            <button type="submit" id="edit" class="btn btn-primary" name="edit_online_tool">Save changes</button>
        </form>
    <?php } ?>
</div>
<?php include 'template-parts/footer.php'; ?>