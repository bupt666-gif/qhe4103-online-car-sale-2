<?php
$basePath = $basePath ?? '.';
$siteRoot = $siteRoot ?? '';

$assetPath = function (string $path) use ($basePath): string {
    if ($basePath === '') {
        return ltrim($path, '/');
    }

    return rtrim($basePath, '/') . '/' . ltrim($path, '/');
};

$sitePath = function (string $path) use ($siteRoot, $assetPath): string {
    if ($siteRoot === '') {
        return $assetPath($path);
    }

    return rtrim($siteRoot, '/') . '/' . ltrim($path, '/');
};
?>
  <footer class="site-footer">
    <div class="footer-intro">
      <a class="site-logo" href="<?php echo htmlspecialchars($sitePath('/index.php'), ENT_QUOTES, 'UTF-8'); ?>">AutoSphere</a>
      <p>Premium used cars presented with calmer browsing, stronger trust cues, and a more intentional showroom experience.</p>
    </div>
    <nav class="footer-group" aria-label="Browse links">
      <h2>Browse</h2>
      <a href="<?php echo htmlspecialchars($sitePath('/pages/search.php'), ENT_QUOTES, 'UTF-8'); ?>">Search</a>
      <a href="<?php echo htmlspecialchars($sitePath('/index.php#inventory'), ENT_QUOTES, 'UTF-8'); ?>">Featured Cars</a>
    </nav>
    <nav class="footer-group" aria-label="Sell links">
      <h2>Sell</h2>
      <a href="<?php echo htmlspecialchars($sitePath('/pages/add-car.php'), ENT_QUOTES, 'UTF-8'); ?>">Add Car</a>
      <a href="<?php echo htmlspecialchars($sitePath('/pages/register.php'), ENT_QUOTES, 'UTF-8'); ?>">Seller Account</a>
    </nav>
    <nav class="footer-group" aria-label="Account links">
      <h2>Account</h2>
      <a href="<?php echo htmlspecialchars($sitePath('/pages/register.php'), ENT_QUOTES, 'UTF-8'); ?>">Register</a>
      <a href="<?php echo htmlspecialchars($sitePath('/pages/login.php'), ENT_QUOTES, 'UTF-8'); ?>">Login</a>
    </nav>
  </footer>

  <script src="<?php echo htmlspecialchars($assetPath('assets/js/main.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
</body>
</html>
