<?php if(isset($_SESSION['failed'])):?>
    <div class="my-5" >
        <span class="alert alert-danger" ><?php echo $_SESSION['failed']?></span>
        <?php session_unset()?>
    </div>
<?php endif;?>    
<?php if(isset($_SESSION['success'])):?>
    <div class="my-5" >
        <span class="alert alert-success" ><?php echo $_SESSION['success']?></span>
        <?php session_unset()?>
    </div>
<?php endif;?>    