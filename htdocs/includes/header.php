<?php
// Iniciar sesión para que navegacion.php funcione
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
  <p>
    <button type="button"
      id="hamburguesa"
      popovertarget="navegacionDelSitio"
      aria-controls="navegacionDelSitio"
      aria-label="Abrir navegación del sitio">
      ≡
    </button>
  </p>

  <!-- Navegación pequeña (modo móvil) -->
  <nav popover="auto" id="navegacionDelSitio">
    <h2>Navegación del sitio</h2>
    <?php require __DIR__ . '/navegacion.php'; ?>
  </nav>

  <!-- Navegación ancha (escritorio) -->
  <nav id="navegacionAncha" aria-label="Navegación del sitio">
    <?php require __DIR__ . '/navegacion.php'; ?>
  </nav>
</header>