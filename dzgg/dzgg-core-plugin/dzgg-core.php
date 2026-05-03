<?php
/**
 * Plugin Name: DZGG Core & Features (Do Zero ao GG)
 * Description: Plugin customizado exclusivo para adicionar o Custom Post Type de Reviews, taxonomias de Hardware/Software e shortcodes de Afiliados ao WordPress.
 * Version: 1.0.0
 * Author: Rafa
 */

// Proteção para evitar acesso direto ao arquivo
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

/**
 * 1. REGISTRAR O CUSTOM POST TYPE: REVIEW
 * Isso separa os 'Reviews de Produtos' dos 'Artigos normais', perfeito para monetização e Ads limpos.
 */
function dzgg_register_reviews_cpt() {
    $labels = array(
        'name'               => 'Reviews',
        'singular_name'      => 'Review',
        'menu_name'          => 'Reviews',
        'add_new'            => 'Adicionar Novo',
        'add_new_item'       => 'Adicionar Novo Review',
        'edit_item'          => 'Editar Review',
        'all_items'          => 'Todos os Reviews',
        'search_items'       => 'Pesquisar Reviews',
        'not_found'          => 'Nenhum review encontrado.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'reviews'), // A URL ficará seusite.com/reviews/nome-do-produto
        'menu_icon'          => 'dashicons-star-filled', // Ícone de estrela no painel WP
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true, // Habilita o editor de blocos nativo (Gutenberg)
    );

    register_post_type('review', $args);
}
add_action('init', 'dzgg_register_reviews_cpt');

/**
 * 2. REGISTRAR TAXONOMIA CUSTOMIZADA: TIPO DE REVIEW
 * Ex: Hardware, Software, Cursos, Livros, Cafeteiras.
 */
function dzgg_register_review_taxonomies() {
    register_taxonomy(
        'categoria_review',
        'review',
        array(
            'label' => 'Categorias do Review',
            'rewrite' => array('slug' => 'categoria-review'),
            'hierarchical' => true, // Permite categorias pai e filho
            'show_in_rest' => true
        )
    );
}
add_action('init', 'dzgg_register_review_taxonomies');

/**
 * 3. SHORTCODE: BOTÃO DE AFILIADO DE ALTA CONVERSÃO
 * Uso no editor: [botão_afiliado url="https://amzn.to/xxx" texto="Comprar na Amazon"]
 */
function dzgg_affiliate_button_shortcode($atts) {
    $a = shortcode_atts(array(
        'url' => '#',
        'texto' => 'Ver no Mercado Livre'
    ), $atts);

    // Renderiza um botão amarelo focado no visual de conversão do Mercado Livre
    return '<a href="' . esc_url($a['url']) . '" target="_blank" rel="nofollow noopener" style="display:block; text-align:center; background-color:#ffe600; color:#2d3277; padding:16px 32px; border-radius:8px; font-weight:bold; font-size: 1.1rem; text-decoration:none; margin: 24px 0; box-shadow: 0 4px 14px 0 rgba(255, 230, 0, 0.39); transition: all 0.3s ease;">🛒 ' . esc_html($a['texto']) . '</a>';
}
add_shortcode('botão_afiliado', 'dzgg_affiliate_button_shortcode');

/**
 * 4. SHORTCODE: BLOCOS DE VEREDITO RÁPIDO
 * Uso no editor: [dzgg_veredicto nota="9.5" texto="Excelente custo-benefício para programadores."]
 */
function dzgg_verdict_shortcode($atts) {
    $a = shortcode_atts(array(
        'nota' => '10',
        'texto' => ''
    ), $atts);

    return '<div style="display: flex; align-items: center; gap: 20px; padding: 24px; background: #f8fafc; border: 1px solid #e2e8f0; border-left: 5px solid #2563eb; border-radius: 8px; margin: 24px 0;">
                <div style="background: #2563eb; color: white; padding: 16px; border-radius: 8px; text-align: center; font-size: 1.5rem; font-weight: bold;">' . esc_html($a['nota']) . '</div>
                <div style="font-size: 1.05rem; color: #0f172a;">' . esc_html($a['texto']) . '</div>
            </div>';
}
add_shortcode('dzgg_veredicto', 'dzgg_verdict_shortcode');
