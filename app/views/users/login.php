<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navigation.php'; ?>
<div class="container">
    <div class="wrapper-login text-center">
        <h2>Sign in</h2>
        <form action="<?= URLROOT; ?>/users/login" method="POST">
            <input type="text" placeholder="Username" name="username">
            <span class="InvalidFeedback">
                <?php echo $data['usernameError']; ?>
            </span>
        </form>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>