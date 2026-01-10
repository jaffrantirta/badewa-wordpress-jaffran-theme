<?php

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

function smkkesehatan_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption']);
    add_theme_support('custom-logo', [
        'height' => 80,
        'width' => 80,
        'flex-height' => true,
        'flex-width' => true,
    ]);
    register_nav_menus([
        'primary' => __('Primary Menu', 'smkkesehatan'),
    ]);
}

add_action('after_setup_theme', 'smkkesehatan_theme_setup');

function smkkesehatan_assets()
{
    wp_enqueue_style(
        'smkkesehatan-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Source+Sans+3:wght@300;400;500;600;700&display=swap',
        [],
        null
    );
    wp_enqueue_style(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        [],
        '5.3.3'
    );
    wp_enqueue_style(
        'smkkesehatan-style',
        get_stylesheet_uri(),
        ['bootstrap', 'smkkesehatan-fonts'],
        '1.0.0'
    );
    wp_enqueue_script(
        'bootstrap-bundle',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        [],
        '5.3.3',
        true
    );
}

add_action('wp_enqueue_scripts', 'smkkesehatan_assets');

function smkkesehatan_customize_register($wp_customize)
{
    // Header Section
    $wp_customize->add_section('smkkesehatan_header', [
        'title' => __('Header Settings', 'smkkesehatan'),
        'priority' => 29,
    ]);

    $wp_customize->add_setting('smk_header_phone', [
        'default' => '+6282227535136',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('smk_header_phone', [
        'label' => __('Phone Number', 'smkkesehatan'),
        'section' => 'smkkesehatan_header',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('smk_header_email', [
        'default' => 'info@merdeka-tc.id',
        'sanitize_callback' => 'sanitize_email',
    ]);
    $wp_customize->add_control('smk_header_email', [
        'label' => __('Email Address', 'smkkesehatan'),
        'section' => 'smkkesehatan_header',
        'type' => 'email',
    ]);

    $wp_customize->add_setting('smk_header_instagram', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('smk_header_instagram', [
        'label' => __('Instagram URL', 'smkkesehatan'),
        'section' => 'smkkesehatan_header',
        'type' => 'url',
    ]);

    $wp_customize->add_setting('smk_header_facebook', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('smk_header_facebook', [
        'label' => __('Facebook URL', 'smkkesehatan'),
        'section' => 'smkkesehatan_header',
        'type' => 'url',
    ]);

    $wp_customize->add_setting('smk_header_youtube', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('smk_header_youtube', [
        'label' => __('YouTube URL', 'smkkesehatan'),
        'section' => 'smkkesehatan_header',
        'type' => 'url',
    ]);

    $wp_customize->add_setting('smk_header_cta_text', [
        'default' => 'Ayo Daftar !',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('smk_header_cta_text', [
        'label' => __('CTA Button Text', 'smkkesehatan'),
        'section' => 'smkkesehatan_header',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('smk_header_cta_url', [
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('smk_header_cta_url', [
        'label' => __('CTA Button URL', 'smkkesehatan'),
        'section' => 'smkkesehatan_header',
        'type' => 'url',
    ]);

    // Hero Section
    $wp_customize->add_section('smkkesehatan_hero', [
        'title' => __('Hero Section', 'smkkesehatan'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('smk_hero_image', [
        'default' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1600&q=80',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'smk_hero_image',
        [
            'label' => __('Hero Image', 'smkkesehatan'),
            'section' => 'smkkesehatan_hero',
        ]
    ));

    $wp_customize->add_setting('smk_hero_title', [
        'default' => 'Mencetak Tenaga Kesehatan Profesional',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('smk_hero_title', [
        'label' => __('Hero Title', 'smkkesehatan'),
        'section' => 'smkkesehatan_hero',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('smk_hero_text', [
        'default' => 'Kurikulum berbasis industri, guru berpengalaman, dan fasilitas praktik modern.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('smk_hero_text', [
        'label' => __('Hero Text', 'smkkesehatan'),
        'section' => 'smkkesehatan_hero',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('smk_hero_button_text', [
        'default' => 'Daftar Sekarang',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('smk_hero_button_text', [
        'label' => __('Button Text', 'smkkesehatan'),
        'section' => 'smkkesehatan_hero',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('smk_hero_button_url', [
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('smk_hero_button_url', [
        'label' => __('Button URL', 'smkkesehatan'),
        'section' => 'smkkesehatan_hero',
        'type' => 'url',
    ]);

    // Sambutan Section
    $wp_customize->add_section('smkkesehatan_sambutan', [
        'title' => __('Sambutan Kepala Sekolah', 'smkkesehatan'),
        'priority' => 31,
    ]);

    $wp_customize->add_setting('smk_sambutan_kicker', [
        'default' => 'Sambutan',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('smk_sambutan_kicker', [
        'label' => __('Kicker', 'smkkesehatan'),
        'section' => 'smkkesehatan_sambutan',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('smk_sambutan_title', [
        'default' => 'Sambutan Kepala Sekolah',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('smk_sambutan_title', [
        'label' => __('Judul', 'smkkesehatan'),
        'section' => 'smkkesehatan_sambutan',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('smk_sambutan_text', [
        'default' => 'Selamat datang di website SMK Kesehatan Bali Dewata. Kami berkomitmen untuk mencetak tenaga kesehatan profesional yang kompeten dan berakhlak mulia.<br><br>Dengan kurikulum berbasis industri, fasilitas modern, dan tenaga pengajar berpengalaman, kami siap membantu siswa meraih masa depan cerah di bidang kesehatan.',
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control('smk_sambutan_text', [
        'label' => __('Teks Sambutan (HTML allowed)', 'smkkesehatan'),
        'section' => 'smkkesehatan_sambutan',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('smk_sambutan_name', [
        'default' => 'Dr. Ahmad Hidayat, M.Pd',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('smk_sambutan_name', [
        'label' => __('Nama Kepala Sekolah', 'smkkesehatan'),
        'section' => 'smkkesehatan_sambutan',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('smk_sambutan_position', [
        'default' => 'Kepala Sekolah SMK Kesehatan Bali Dewata',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('smk_sambutan_position', [
        'label' => __('Jabatan', 'smkkesehatan'),
        'section' => 'smkkesehatan_sambutan',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('smk_sambutan_image', [
        'default' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=800&q=80',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'smk_sambutan_image',
        [
            'label' => __('Foto Kepala Sekolah', 'smkkesehatan'),
            'section' => 'smkkesehatan_sambutan',
        ]
    ));

    // Kompetensi Section
    $wp_customize->add_section('smkkesehatan_kompetensi', [
        'title' => __('Kompetensi Keahlian', 'smkkesehatan'),
        'priority' => 32,
    ]);

    $wp_customize->add_setting('smk_kompetensi_intro', [
        'default' => 'Jalur pembelajaran spesifik dengan sertifikasi dan praktik industri untuk karier masa depan.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('smk_kompetensi_intro', [
        'label' => __('Deskripsi Section', 'smkkesehatan'),
        'section' => 'smkkesehatan_kompetensi',
        'type' => 'textarea',
    ]);

    $default_kompetensi_titles = [
        1 => 'Asisten Keperawatan',
        2 => 'Farmasi Klinis',
    ];
    $default_kompetensi_texts = [
        1 => 'Memberikan perawatan dasar pasien, membantu dokter dan perawat dalam prosedur medis, serta memastikan kenyamanan dan keselamatan pasien.',
        2 => 'Mengelola dan menyiapkan obat-obatan, memberikan konseling kepada pasien tentang penggunaan obat yang tepat dan aman.',
    ];

    for ($i = 1; $i <= 2; $i++) {
        $wp_customize->add_setting("smk_kompetensi_image_{$i}", [
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ]);
        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            "smk_kompetensi_image_{$i}",
            [
                'label' => sprintf(__('Image Program %d', 'smkkesehatan'), $i),
                'section' => 'smkkesehatan_kompetensi',
            ]
        ));

        $wp_customize->add_setting("smk_kompetensi_title_{$i}", [
            'default' => $default_kompetensi_titles[$i],
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control("smk_kompetensi_title_{$i}", [
            'label' => sprintf(__('Judul Program %d', 'smkkesehatan'), $i),
            'section' => 'smkkesehatan_kompetensi',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("smk_kompetensi_text_{$i}", [
            'default' => $default_kompetensi_texts[$i],
            'sanitize_callback' => 'sanitize_textarea_field',
        ]);
        $wp_customize->add_control("smk_kompetensi_text_{$i}", [
            'label' => sprintf(__('Deskripsi Program %d', 'smkkesehatan'), $i),
            'section' => 'smkkesehatan_kompetensi',
            'type' => 'textarea',
        ]);
    }

    $wp_customize->add_section('smkkesehatan_keunggulan', [
        'title' => __('Keunggulan', 'smkkesehatan'),
        'priority' => 33,
    ]);

    $wp_customize->add_setting('smk_keunggulan_intro', [
        'default' => 'Lingkungan belajar yang formal, profesional, dan adaptif dengan kebutuhan dunia kesehatan.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('smk_keunggulan_intro', [
        'label' => __('Deskripsi Section', 'smkkesehatan'),
        'section' => 'smkkesehatan_keunggulan',
        'type' => 'textarea',
    ]);

    $default_keunggulan_titles = [
        1 => 'Kurikulum Industri',
        2 => 'Fasilitas Modern',
        3 => 'Pengajar Profesional',
        4 => 'Jalur Karier',
    ];
    $default_keunggulan_texts = [
        1 => 'Materi dirancang bersama mitra kesehatan untuk membekali kompetensi nyata.',
        2 => 'Laboratorium praktik dan ruang simulasi yang mendukung pembelajaran aktif.',
        3 => 'Tenaga pendidik berpengalaman di bidang kesehatan dan pendidikan vokasi.',
        4 => 'Program pendampingan alumni dan kerja sama industri untuk penempatan kerja.',
    ];

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("smk_keunggulan_image_{$i}", [
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ]);
        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            "smk_keunggulan_image_{$i}",
            [
                'label' => sprintf(__('Image Keunggulan %d', 'smkkesehatan'), $i),
                'section' => 'smkkesehatan_keunggulan',
            ]
        ));

        $wp_customize->add_setting("smk_keunggulan_title_{$i}", [
            'default' => $default_keunggulan_titles[$i],
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control("smk_keunggulan_title_{$i}", [
            'label' => sprintf(__('Judul %d', 'smkkesehatan'), $i),
            'section' => 'smkkesehatan_keunggulan',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("smk_keunggulan_text_{$i}", [
            'default' => $default_keunggulan_texts[$i],
            'sanitize_callback' => 'sanitize_textarea_field',
        ]);
        $wp_customize->add_control("smk_keunggulan_text_{$i}", [
            'label' => sprintf(__('Deskripsi %d', 'smkkesehatan'), $i),
            'section' => 'smkkesehatan_keunggulan',
            'type' => 'textarea',
        ]);
    }

    $wp_customize->add_section('smkkesehatan_sidebar', [
        'title' => __('Sidebar', 'smkkesehatan'),
        'priority' => 31,
    ]);

    $wp_customize->add_setting('smk_sidebar_location_title', [
        'default' => 'Lokasi Kami',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('smk_sidebar_location_title', [
        'label' => __('Judul Lokasi', 'smkkesehatan'),
        'section' => 'smkkesehatan_sidebar',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('smk_sidebar_map_url', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('smk_sidebar_map_url', [
        'label' => __('URL Embed Google Maps', 'smkkesehatan'),
        'section' => 'smkkesehatan_sidebar',
        'type' => 'url',
    ]);

    $wp_customize->add_setting('smk_sidebar_contact_title', [
        'default' => 'Hubungi Kami',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('smk_sidebar_contact_title', [
        'label' => __('Judul Kontak', 'smkkesehatan'),
        'section' => 'smkkesehatan_sidebar',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('smk_sidebar_phone', [
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('smk_sidebar_phone', [
        'label' => __('Telepon / Fax', 'smkkesehatan'),
        'section' => 'smkkesehatan_sidebar',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('smk_sidebar_email', [
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('smk_sidebar_email', [
        'label' => __('Email', 'smkkesehatan'),
        'section' => 'smkkesehatan_sidebar',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('smk_sidebar_facebook', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('smk_sidebar_facebook', [
        'label' => __('Facebook', 'smkkesehatan'),
        'section' => 'smkkesehatan_sidebar',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('smk_sidebar_instagram', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('smk_sidebar_instagram', [
        'label' => __('Instagram', 'smkkesehatan'),
        'section' => 'smkkesehatan_sidebar',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('smk_sidebar_button_text', [
        'default' => 'Kirim Pesan',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('smk_sidebar_button_text', [
        'label' => __('Teks Tombol', 'smkkesehatan'),
        'section' => 'smkkesehatan_sidebar',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('smk_sidebar_button_url', [
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('smk_sidebar_button_url', [
        'label' => __('URL Tombol', 'smkkesehatan'),
        'section' => 'smkkesehatan_sidebar',
        'type' => 'url',
    ]);

    $wp_customize->add_section('smkkesehatan_footer', [
        'title' => __('Footer', 'smkkesehatan'),
        'priority' => 40,
    ]);

    $wp_customize->add_setting('smk_footer_about', [
        'default' => 'Sekolah vokasi kesehatan yang berfokus pada pendidikan profesional, berintegritas, dan siap kerja.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('smk_footer_about', [
        'label' => __('Deskripsi Sekolah', 'smkkesehatan'),
        'section' => 'smkkesehatan_footer',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('smk_footer_contact', [
        'default' => "Jl. Raya Pendidikan No. 10, Denpasar, Bali\nTelp: (0361) 123-456\nEmail: info@smkkesehatanbd.sch.id",
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('smk_footer_contact', [
        'label' => __('Kontak (1 per baris)', 'smkkesehatan'),
        'section' => 'smkkesehatan_footer',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('smk_footer_links_title', [
        'default' => 'Tautan Cepat',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('smk_footer_links_title', [
        'label' => __('Judul Tautan', 'smkkesehatan'),
        'section' => 'smkkesehatan_footer',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('smk_footer_links', [
        'default' => "Kompetensi Keahlian|#kompetensi\nKeunggulan|#keunggulan\nLatest Blog|#blog",
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('smk_footer_links', [
        'label' => __('Tautan (Label|URL per baris)', 'smkkesehatan'),
        'section' => 'smkkesehatan_footer',
        'type' => 'textarea',
    ]);
}

add_action('customize_register', 'smkkesehatan_customize_register');

function smkkesehatan_nav_menu_css_class($classes, $item, $args, $depth)
{
    if (!isset($args->theme_location) || $args->theme_location !== 'primary') {
        return $classes;
    }

    if ($depth === 0) {
        $classes[] = 'nav-item';
    }

    if (in_array('menu-item-has-children', $classes, true)) {
        $classes[] = 'dropdown';
    }

    return $classes;
}

add_filter('nav_menu_css_class', 'smkkesehatan_nav_menu_css_class', 10, 4);

function smkkesehatan_nav_menu_link_attributes($atts, $item, $args, $depth)
{
    if (!isset($args->theme_location) || $args->theme_location !== 'primary') {
        return $atts;
    }

    if ($depth > 0) {
        $atts['class'] = trim(($atts['class'] ?? '') . ' dropdown-item');
        return $atts;
    }

    $atts['class'] = trim(($atts['class'] ?? '') . ' nav-link');

    if (in_array('menu-item-has-children', $item->classes ?? [], true)) {
        $atts['class'] .= ' dropdown-toggle';
        $atts['data-bs-toggle'] = 'dropdown';
        $atts['role'] = 'button';
        $atts['aria-expanded'] = 'false';
    }

    return $atts;
}

add_filter('nav_menu_link_attributes', 'smkkesehatan_nav_menu_link_attributes', 10, 4);

function smkkesehatan_nav_menu_submenu_css_class($classes, $args, $depth)
{
    if (!isset($args->theme_location) || $args->theme_location !== 'primary') {
        return $classes;
    }

    $classes[] = 'dropdown-menu';
    return $classes;
}

add_filter('nav_menu_submenu_css_class', 'smkkesehatan_nav_menu_submenu_css_class', 10, 3);
