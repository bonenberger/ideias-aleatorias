$dir = "c:\Users\rafab\OneDrive\Documentos\ideias\ideias-aleatorias\dzgg"
$themeDir = "$dir\dzgg-theme"
mkdir -Force $themeDir

$styleHeader = "/*`r`nTheme Name: DZGG Custom Theme`r`nAuthor: Rafa`r`nDescription: Tema premium focado em afiliados.`r`nVersion: 1.0.1`r`n*/`r`n"
$styleContent = Get-Content "$dir\style.css" -Raw -Encoding UTF8
$styleHeader + $styleContent | Set-Content "$themeDir\style.css" -Encoding UTF8

Copy-Item "$dir\single.css" "$themeDir\single.css" -Force

$indexHtml = Get-Content "$dir\index.html" -Raw -Encoding UTF8
$indexHtml = $indexHtml -replace 'href="style.css"', 'href="<?php echo get_stylesheet_uri(); ?>"'
$indexHtml = $indexHtml -replace '</head>', "<?php wp_head(); ?>`r`n</head>"
$indexHtml = $indexHtml -replace '</body>', "<?php wp_footer(); ?>`r`n</body>"
$indexHtml = $indexHtml -replace 'assets/hero.png', '/wp-content/themes/dzgg-theme/assets/hero.png'
$indexHtml | Set-Content "$themeDir\index.php" -Encoding UTF8

$singleHtml = Get-Content "$dir\review-post.html" -Raw -Encoding UTF8
$singleHtml = $singleHtml -replace 'href="style.css"', 'href="<?php echo get_stylesheet_uri(); ?>"'
$singleHtml = $singleHtml -replace 'href="single.css"', 'href="<?php echo get_template_directory_uri(); ?>/single.css"'
$singleHtml = $singleHtml -replace '</head>', "<?php wp_head(); ?>`r`n</head>"
$singleHtml = $singleHtml -replace '</body>', "<?php wp_footer(); ?>`r`n</body>"
$singleHtml | Set-Content "$themeDir\single.php" -Encoding UTF8

$functions = "<?php`r`nfunction dzgg_enqueue() { wp_enqueue_style('dzgg-style', get_stylesheet_uri()); }`r`nadd_action('wp_enqueue_scripts', 'dzgg_enqueue');"
$functions | Set-Content "$themeDir\functions.php" -Encoding UTF8

if (!(Test-Path "$themeDir\assets")) {
    mkdir -Force "$themeDir\assets"
}
Copy-Item "$dir\assets\*" "$themeDir\assets" -Recurse -Force

if (Test-Path "$dir\dzgg-theme.zip") { Remove-Item "$dir\dzgg-theme.zip" -Force }
Compress-Archive -Path "$themeDir\*" -DestinationPath "$dir\dzgg-theme.zip" -Force
