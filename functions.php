<?php
/**
 * Portfolio Theme functions and definitions
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function portfolio_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    
    // Регистрируем меню
    register_nav_menus(array(
        'primary' => 'Основное меню',
    ));
}

add_action('after_setup_theme', 'portfolio_theme_setup');

function portfolio_theme_scripts() {
    // Основной стиль темы
    wp_enqueue_style('portfolio-style', get_stylesheet_uri());
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    
    // Основной скрипт
    wp_enqueue_script('portfolio-script', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'portfolio_theme_scripts');

// Кастомные настройки темы
function portfolio_theme_customize_register($wp_customize) {
    // Секция разработчика
    $wp_customize->add_section('developer_section', array(
        'title' => 'Информация разработчика',
        'priority' => 30,
    ));

    // Имя разработчика
    $wp_customize->add_setting('developer_name', array(
        'default' => 'Иван Иванов',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('developer_name', array(
        'label' => 'Имя разработчика',
        'section' => 'developer_section',
        'type' => 'text',
    ));

    // Должность
    $wp_customize->add_setting('developer_position', array(
        'default' => 'Android-разработчик',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('developer_position', array(
        'label' => 'Должность',
        'section' => 'developer_section',
        'type' => 'text',
    ));

    // Описание
    $wp_customize->add_setting('developer_description', array(
        'default' => 'Создаю современные Android-приложения на Java/Kotlin и современных фреймворках',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('developer_description', array(
        'label' => 'Описание',
        'section' => 'developer_section',
        'type' => 'textarea',
    ));

    // Email
    $wp_customize->add_setting('developer_email', array(
        'default' => 'ivan.ivanov@example.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('developer_email', array(
        'label' => 'Email',
        'section' => 'developer_section',
        'type' => 'email',
    ));

    // Телефон
    $wp_customize->add_setting('developer_phone', array(
        'default' => '+7 (999) 123-45-67',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('developer_phone', array(
        'label' => 'Телефон',
        'section' => 'developer_section',
        'type' => 'text',
    ));

    // Местоположение
    $wp_customize->add_setting('developer_location', array(
        'default' => 'Томск, Россия',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('developer_location', array(
        'label' => 'Местоположение',
        'section' => 'developer_section',
        'type' => 'text',
    ));

    // Опыт работы
    $wp_customize->add_setting('developer_experience', array(
        'default' => '2 года',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('developer_experience', array(
        'label' => 'Опыт работы',
        'section' => 'developer_section',
        'type' => 'text',
    ));

    // Аватар
    $wp_customize->add_setting('developer_avatar');

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'developer_avatar', array(
        'label' => 'Аватар',
        'section' => 'developer_section',
    )));
}

add_action('customize_register', 'portfolio_theme_customize_register');

// Создаем Custom Post Type для проектов
function create_portfolio_post_type() {
    register_post_type('portfolio', array(
        'labels' => array(
            'name' => 'Проекты',
            'singular_name' => 'Проект',
            'add_new' => 'Добавить проект',
            'add_new_item' => 'Добавить новый проект',
            'edit_item' => 'Редактировать проект',
            'new_item' => 'Новый проект',
            'view_item' => 'Просмотреть проект',
            'search_items' => 'Найти проект',
            'not_found' => 'Проектов не найдено',
            'not_found_in_trash' => 'В корзине проектов не найдено'
        ),
        'public' => true,
        'has_archive' => false,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-portfolio',
        'rewrite' => array('slug' => 'portfolio'),
    ));
}

add_action('init', 'create_portfolio_post_type');

// Добавляем мета-поля для проектов
function add_portfolio_meta_boxes() {
    add_meta_box(
        'portfolio_details',
        'Детали проекта',
        'portfolio_meta_box_callback',
        'portfolio',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'add_portfolio_meta_boxes');

function portfolio_meta_box_callback($post) {
    wp_nonce_field('portfolio_meta_box', 'portfolio_meta_box_nonce');
    
    $live_url = get_post_meta($post->ID, '_live_url', true);
    $github_url = get_post_meta($post->ID, '_github_url', true);
    $technologies = get_post_meta($post->ID, '_technologies', true);
    $features = get_post_meta($post->ID, '_features', true);
    ?>
    <p>
        <label for="live_url">Live URL:</label>
        <input type="url" id="live_url" name="live_url" value="<?php echo esc_attr($live_url); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="github_url">GitHub URL:</label>
        <input type="url" id="github_url" name="github_url" value="<?php echo esc_attr($github_url); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="technologies">Технологии (через запятую):</label>
        <input type="text" id="technologies" name="technologies" value="<?php echo esc_attr($technologies); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="features">Особенности (каждая с новой строки):</label>
        <textarea id="features" name="features" style="width: 100%; height: 100px;"><?php echo esc_textarea($features); ?></textarea>
    </p>
    <?php
}

function save_portfolio_meta($post_id) {
    if (!isset($_POST['portfolio_meta_box_nonce']) || 
        !wp_verify_nonce($_POST['portfolio_meta_box_nonce'], 'portfolio_meta_box')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    $fields = array('live_url', 'github_url', 'technologies', 'features');
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }
}

add_action('save_post', 'save_portfolio_meta');
?>