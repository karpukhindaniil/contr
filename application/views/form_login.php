<?php
//session_start();
?>
<main>
    <form  method="post" role="form">
        <div class="container">
		
            <div class="row">
            <div class="col">
                <div class="form-group mb-2 col-4">
                    <input type="text" class="form-control" name="UserLogin" placeholder="введите логин" required>
                </div>
                <div class="form-group mb-2 col-4">
                    <input type="password" class="form-control" name="UserPassword" placeholder="введите пароль" required>
                </div>
                <div class="form-group mb-2 col-4">
                    <button type="submit" class="btn btn-outline-dark">Войти</button>
                </div>
				<?php echo $this->session->flashdata('login_error'); ?>
            </div>
            </div>
        </div>
    </form>
<?php

?>
</main>