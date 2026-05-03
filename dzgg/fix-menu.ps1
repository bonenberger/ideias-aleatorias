$themeDir = "c:\Users\rafab\OneDrive\Documentos\ideias\ideias-aleatorias\dzgg\dzgg-theme"

$navHtml = @"
                <?php 
                if(has_nav_menu('header-menu')) {
                    wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => false ) );
                } else {
                    echo '<ul><li><a href="' . admin_url('nav-menus.php') . '" style="color:#d97706; font-weight:bold;">⚠️ Configure seu Menu aqui</a></li></ul>';
                }
                ?>
"@

$index = Get-Content "$themeDir\index.php" -Raw -Encoding UTF8
$index = $index -replace '(?s)<ul>\s*<li><a href="#programacao">.*?</ul>', $navHtml
$index | Set-Content "$themeDir\index.php" -Encoding UTF8

$single = Get-Content "$themeDir\single.php" -Raw -Encoding UTF8
$single = $single -replace '(?s)<ul>\s*<li><a href="index.html#programacao">.*?</ul>', $navHtml
$single | Set-Content "$themeDir\single.php" -Encoding UTF8

$functions = Get-Content "$themeDir\functions.php" -Raw -Encoding UTF8
$menuReg = "`r`nadd_action('after_setup_theme', function() { register_nav_menus(array('header-menu' => 'Menu Principal')); });"
if ($functions -notmatch 'register_nav_menus') {
    $functions += $menuReg
}
$functions | Set-Content "$themeDir\functions.php" -Encoding UTF8

if (Test-Path "c:\Users\rafab\OneDrive\Documentos\ideias\ideias-aleatorias\dzgg\dzgg-theme.zip") {
    Remove-Item "c:\Users\rafab\OneDrive\Documentos\ideias\ideias-aleatorias\dzgg\dzgg-theme.zip" -Force
}
Compress-Archive -Path "$themeDir\*" -DestinationPath "c:\Users\rafab\OneDrive\Documentos\ideias\ideias-aleatorias\dzgg\dzgg-theme.zip" -Force
