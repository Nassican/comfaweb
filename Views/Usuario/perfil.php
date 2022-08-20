<?php include "Views/Templates/header.php"; ?>

<div class="col">
  <div class="row">
    <span><b>Nombre completo:</b></span>
    <p><?php echo $data['nombre'] . " " . $data['apellido']; ?></p>
  </div>
</div>

<?php include "Views/Templates/footer.php"; ?>