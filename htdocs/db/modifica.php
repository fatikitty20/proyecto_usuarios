<?php
require_once __DIR__ . '/Bd.php';
require_once __DIR__ . '/recuperaIdEntero.php';
require __DIR__ . "/../includes/solo_admin.php";


try {
    $id = recuperaIdEntero('id'); 
    $pdo = Bd::pdo();

    $stmt = $pdo->prepare('SELECT id, nombre, email FROM usuarios WHERE id = :id LIMIT 1');
    $stmt->execute([':id' => $id]);
    $u = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$u) {
        throw new Error("Usuario no encontrado (id = $id).");
    }
} catch (Throwable $e) {
    $errorHtml = htmlspecialchars($e->getMessage());
    require __DIR__ . '/../includes/error.php';
    exit;
}

require __DIR__ . '/../includes/header.php';
?>
<link rel="stylesheet" href="/includes/estilos.css">
<div class="container">
  <h1>Modificar usuario</h1>

  <form action="usuarios-modifica-accion.php" method="post" autocomplete="off">
    <input type="hidden" name="id" value="<?= htmlspecialchars($u['id']) ?>">

    <p>
      <label>
        Nombre *
        <input type="text" name="nombre" required value="<?= htmlspecialchars($u['nombre']) ?>">
      </label>
    </p>

    <p>
      <label>
        Email *
        <input type="email" name="email" required value="<?= htmlspecialchars($u['email']) ?>">
      </label>
    </p>

    <p><button type="submit">Guardar cambios</button></p>
    <p><a href="../usuarios-lista.php">Cancelar</a></p>
  </form>
</div>

<?php require __DIR__ . '/../includes/footer.php'; ?>
