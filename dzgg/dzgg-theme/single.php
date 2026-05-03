<?php wp_head(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/single.css">
</head>
<body <?php body_class(); ?>>
    <header class="main-header">
        <div class="container header-container">
            <a href="<?php echo home_url(); ?>" class="logo">
                <span class="logo-code">{</span> 
                <span class="logo-text">DZ<span class="logo-accent">GG</span></span>
                <span class="logo-code">}</span>
            </a>
            <nav class="main-nav">
                <?php 
                if(has_nav_menu('header-menu')) {
                    wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => false ) );
                } else {
                    echo '<ul><li><a href="' . admin_url('nav-menus.php') . '" style="color:#d97706; font-weight:bold;">⚠️ Configure seu Menu aqui</a></li></ul>';
                }
                ?>
            </nav>
            <a href="#newsletter" class="btn btn-primary">Assinar Newsletter</a>
        </div>
    </header>

    <main class="container single-container mt-section">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <nav class="breadcrumbs">
            <a href="<?php echo home_url(); ?>">Home</a> <span class="separator">></span> 
            <?php 
            $category = get_the_category(); 
            if($category) {
                echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a> <span class="separator">></span> ';
            }
            ?>
            <span class="current"><?php the_title(); ?></span>
        </nav>

        <div class="content-section" style="padding-top: 20px;">
            <article class="main-article">
                <header class="post-header">
                    <?php 
                    if($category) {
                        echo '<span class="category-badge badge-code">'.$category[0]->cat_name.'</span>';
                    }
                    ?>
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    
                    <div class="post-meta-data">
                        <div class="author-info">
                            <div class="author-avatar"><?php echo get_avatar( get_the_author_meta('user_email'), 32 ); ?></div>
                            <span>Por <strong><?php the_author(); ?></strong></span>
                        </div>
                        <span class="meta-dot">•</span>
                        <span><?php echo get_the_date(); ?></span>
                    </div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-featured-image" style="margin-bottom: 2rem; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; display: block; object-fit: cover; max-height: 500px;')); ?>
                    </div>
                <?php endif; ?>

                <div class="post-body">
                    <?php 
                    // Renderiza o verdadeiro conteúdo escrito no WordPress
                    the_content(); 
                    ?>
                </div>

                <div class="author-bio-box">
                    <div class="author-avatar-large"><?php echo get_avatar( get_the_author_meta('user_email'), 64 ); ?></div>
                    <div class="bio-content">
                        <h4>Escrito por <?php the_author(); ?></h4>
                        <p><?php 
                            $desc = get_the_author_meta('description'); 
                            echo $desc ? $desc : 'Autor(a) no Do Zero ao GG.'; 
                        ?></p>
                    </div>
                </div>
            </article>

            <aside class="sidebar">
                <div class="widget sticky-ad placeholder">
                    <span class="ad-label">Anúncio Vertical (AdSense)</span>
                </div>
                
                <div class="widget">
                    <h3>Top 3 Teclados para Programar</h3>
                    <ul class="setup-list">
                        <li>
                            <div class="item-icon">1</div>
                            <div class="item-info">
                                <h4>Keychron Q1 Pro</h4>
                                <a href="#" class="affiliate-link">N° 1 em Vendas</a>
                            </div>
                        </li>
                        <li>
                            <div class="item-icon">2</div>
                            <div class="item-info">
                                <h4>MX Mechanical Mini</h4>
                                <a href="#" class="affiliate-link">Ideal para Viagem</a>
                            </div>
                        </li>
                        <li>
                            <div class="item-icon">3</div>
                            <div class="item-info">
                                <h4>HHKB Pro Hybrid</h4>
                                <a href="#" class="affiliate-link">Para puristas</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
        
        <?php endwhile; endif; ?>
    </main>

    <footer class="main-footer">
        <div class="container footer-container">
            <div class="footer-logo">
                <div class="logo">
                    <span class="logo-code">{</span> 
                    <span class="logo-text">DZ<span class="logo-accent">GG</span></span>
                    <span class="logo-code">}</span>
                </div>
                <p>Código, IA e Café © <?php echo date('Y'); ?></p>
            </div>
            <div class="footer-socials">
                <a href="#instagram" class="social-link" target="_blank">Instagram</a>
                <a href="#youtube" class="social-link" target="_blank">YouTube</a>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
