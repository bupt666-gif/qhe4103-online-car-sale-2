<?php
$pageTitle = $pageTitle ?? 'AutoSphere | Premium Used Cars';
$bodyClass = $bodyClass ?? '';
$basePath = $basePath ?? '.';
$siteRoot = $siteRoot ?? '';
$currentPage = $currentPage ?? basename($_SERVER['SCRIPT_NAME']);

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

$navItems = [
    'Search' => '/pages/search.php',
    'Add Car' => '/pages/add-car.php',
    'Register' => '/pages/register.php',
    'Login' => '/pages/login.php',
];

$escapedBodyClass = htmlspecialchars($bodyClass, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
  <link rel="stylesheet" href="<?php echo htmlspecialchars($assetPath('assets/css/styles.css'), ENT_QUOTES, 'UTF-8'); ?>">
</head>
<body<?php echo $escapedBodyClass !== '' ? ' class="' . $escapedBodyClass . '"' : ''; ?>>
  <header class="site-navbar" data-site-navbar>
    <a class="site-logo" href="<?php echo htmlspecialchars($sitePath('/index.php'), ENT_QUOTES, 'UTF-8'); ?>" aria-label="AutoSphere home">AutoSphere</a>
    <nav class="desktop-nav" aria-label="Primary navigation">
<?php foreach ($navItems as $label => $href): ?>
      <a href="<?php echo htmlspecialchars($sitePath($href), ENT_QUOTES, 'UTF-8'); ?>"<?php echo basename($href) === $currentPage ? ' class="is-active"' : ''; ?> data-nav-link><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?></a>
<?php endforeach; ?>
    </nav>
    <button class="mobile-nav-toggle" type="button" aria-label="Open navigation" aria-expanded="false" aria-controls="mobile-nav" data-nav-toggle>
      <span></span>
      <span></span>
      <span></span>
    </button>
    <nav class="mobile-nav" id="mobile-nav" aria-label="Mobile navigation" data-mobile-nav>
<?php foreach ($navItems as $label => $href): ?>
      <a href="<?php echo htmlspecialchars($sitePath($href), ENT_QUOTES, 'UTF-8'); ?>"<?php echo basename($href) === $currentPage ? ' class="is-active"' : ''; ?> data-nav-link><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?></a>
<?php endforeach; ?>
    </nav>
  </header>
