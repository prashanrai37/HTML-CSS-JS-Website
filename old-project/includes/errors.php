<?php if (sizeof($errors) > 0): ?>
  <div class="error">
  	<?php foreach ($errors as $error): ?>
  	  <p><?php echo $error ?></p>
  	<?php
    endforeach ?>
  </div>
<?php
endif ?>

<?php if (sizeof($success) > 0): ?>
  <div class="success">
  	<?php foreach ($success as $s): ?>
  	  <p><?php echo $s ?></p>
  	<?php
    endforeach ?>
  </div>
<?php
endif ?>