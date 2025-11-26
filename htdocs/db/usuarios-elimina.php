<?php
require_once __DIR__ . '/Bd.php';
require_once __DIR__ . '/recuperaIdEntero.php';
require __DIR__ . "/../includes/solo_admin.php";
try {

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
        $id = recuperaIdEntero('id');
        $pdo = Bd::pdo();
        $stmt = $pdo->prepare('DELETE FROM usuarios WHERE id = :id');
        $stmt->execute([':id' => $id]);
        header('Location: usuarioslista.php');
        exit;
    }

    $id = recuperaIdEntero('id');
    require __DIR__ . '/../includes/header.php';
    ?>
	<link rel="stylesheet" href="/includes/estilos.css">

    <div class="container">
      <h1>Eliminar usuario</h1>
      <p>¿Seguro que deseas eliminar el usuario con id <?= htmlspecialchars($id) ?>?</p>

      <form action="usuarios-elimina-accion.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
        <button type="submit" name="confirm" value="yes">Sí, eliminar</button>
        <a href="lista.php" style="margin-left:12px">No, volver</a>
      </form>
    </div>

    <?php
    require __DIR__ . '/../includes/footer.php';
    exit;
} catch (Throwable $e) {
    require __DIR__ . '/../includes/header.php';
    echo '<div class="container"><div class="alert">' . htmlspecialchars($e->getMessage()) . '</div>';
    echo '<p><a href="lista.php">Volver</a></p></div>';
    require __DIR__ . '/../includes/footer.php';
    exit;
}
