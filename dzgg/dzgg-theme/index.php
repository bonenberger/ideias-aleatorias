<?php wp_head(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Do Zero ao GG | Tecnologia, IA e Café</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
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

    <main>
        <section class="hero">
            <div class="container hero-container">
                <div class="hero-content">
                    <div class="badge-new">✨ Nova Era da Programação</div>
                    <h1>Evolua do <span class="text-accent">Zero ao GG</span> na Tecnologia.</h1>
                    <p class="hero-subtitle">Domine a arte de programar, explore o universo da Inteligência Artificial e descubra ferramentas essenciais. Tudo regado a um excelente café.</p>
                    <div class="hero-actions">
                        <a href="#artigos" class="btn btn-primary btn-large">Explorar Conteúdo</a>
                        <a href="#reviews" class="btn btn-outline btn-large">Últimos Reviews</a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="glass-container">
                        <?php 
                        $hero_mod = get_theme_mod('dzgg_hero_img');
                        $dzgg_img_src = $hero_mod ? $hero_mod : set_url_scheme(get_template_directory_uri(), 'https') . '/assets/hero.png';
                        ?>
                        <img src="<?php echo esc_url($dzgg_img_src); ?>" alt="Ilustração tecnologia e café" class="hero-image">
                        <div class="floating-element lang-js">JS</div>
                        <div class="floating-element lang-py">Py</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content-section container">
            <div class="main-feed">
                <h2 class="section-title">Últimos Artigos</h2>
                <div class="post-grid">
                    <article class="post-card">
                        <div class="post-image skeleton"></div>
                        <div class="post-content">
                            <span class="category-badge badge-ia">Inteligência Artificial</span>
                            <h3>Como a IA está reescrevendo o futuro do código</h3>
                            <p>Descubra como os novos modelos de linguagem estão atuando como engenheiros de software seniores.</p>
                            <span class="post-meta">20 Abr 2026</span>
                        </div>
                    </article>
                    <article class="post-card">
                        <div class="post-image skeleton"></div>
                        <div class="post-content">
                            <span class="category-badge badge-code">Programação</span>
                            <h3>Aprenda React em 2026: Quais os novos padrões?</h3>
                            <p>O ecossistema mudou. Veja o que realmente importa aprender no ecossistema do React agora.</p>
                            <span class="post-meta">18 Abr 2026</span>
                        </div>
                    </article>
                    <article class="post-card">
                        <div class="post-image skeleton"></div>
                        <div class="post-content">
                            <span class="category-badge badge-coffee">Café</span>
                            <h3>O Guia Definitivo do Programador: V60 ou Prensa Francesa?</h3>
                            <p>Analisamos os métodos de preparo que melhor acompanham suas sessões de maratona de código.</p>
                            <span class="post-meta">15 Abr 2026</span>
                        </div>
                    </article>
                    <article class="post-card">
                        <div class="post-image skeleton"></div>
                        <div class="post-content">
                            <span class="category-badge badge-review">Reviews</span>
                            <h3>Review: Teclado Mecânico Keychron Q1 Pro</h3>
                            <p>Vale o investimento para quem passa mais de 8 horas por dia escrevendo código?</p>
                            <span class="post-meta">10 Abr 2026</span>
                        </div>
                    </article>
                </div>
            </div>

            <aside class="sidebar">
                <div class="widget sticky-ad placeholder">
                    <span class="ad-label">Espaço para Anúncio (AdSense)</span>
                </div>
                
                <div class="widget affiliate-widget">
                    <h3>Meu Setup Ideal</h3>
                    <ul class="setup-list">
                        <li>
                            <div class="item-icon">💻</div>
                            <div class="item-info">
                                <h4>MacBook Pro M3</h4>
                                <a href="#" class="affiliate-link">Ver no M. Livre</a>
                            </div>
                        </li>
                        <li>
                            <div class="item-icon">⌨️</div>
                            <div class="item-info">
                                <h4>Keychron Q1 Pro</h4>
                                <a href="#" class="affiliate-link">Ver no M. Livre</a>
                            </div>
                        </li>
                        <li>
                            <div class="item-icon">☕</div>
                            <div class="item-info">
                                <h4>Moedor Timemore C2</h4>
                                <a href="#" class="affiliate-link">Ver no M. Livre</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </aside>
        </section>
    </main>
    <footer class="main-footer">
        <div class="container footer-container">
            <div class="footer-logo">
                <div class="logo">
                    <span class="logo-code">{</span> 
                    <span class="logo-text">DZ<span class="logo-accent">GG</span></span>
                    <span class="logo-code">}</span>
                </div>
                <p>Código, IA e Café © 2026</p>
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
