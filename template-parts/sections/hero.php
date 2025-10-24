<?php
$developer_name = get_theme_mod('developer_name', 'Дейс Владислав');
$developer_position = get_theme_mod('developer_position', 'Android-разработчик');
$developer_description = get_theme_mod('developer_description', 'Создаю современные Android-приложения на Java/Kotlin и современных фреймворках');
$developer_avatar = get_theme_mod('developer_avatar', get_template_directory_uri() . '/assets/images/avatar.jpg');
?>

<section id="home" class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title"><?php echo esc_html($developer_name); ?></h1>
                <p class="hero-subtitle"><?php echo esc_html($developer_position); ?></p>
                <p class="hero-description"><?php echo esc_html($developer_description); ?></p>
                <div class="hero-buttons">
                    <a href="#portfolio" class="btn btn-primary">Смотреть работы</a>
                    <a href="#contact" class="btn btn-outline">Связаться со мной</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="<?php echo esc_url($developer_avatar); ?>" alt="Фото <?php echo esc_attr($developer_name); ?>">
            </div>
        </div>
    </div>
</section>