<?php
$developer_experience = get_theme_mod('developer_experience', '2 года');
?>

<section id="about" class="about">
    <div class="container">
        <h2 class="section-title">О себе</h2>
        <div class="about-content">
            <div class="about-text">
                <h3>Привет! Я Android-разработчик</h3>
                <p>Специализируюсь на создании современных Android-приложений с Java/Kotlin и современных фреймворков. Имею <?php echo esc_html($developer_experience); ?> коммерческой разработки.</p>
                
                <div class="about-details">
                    <div class="detail-column">
                        <h4>Образование</h4>
                        <ul>
                            <li>Бакалавр информационные системы и технологии, Университет ТУСУР (2022-2026)</li>
                            <li>It-академия "Исскуственный интелекст и ML"</li>
                        </ul>
                    </div>
                    <div class="detail-column">
                        <h4>Опыт работы</h4>
                        <div class="experience-item">
                            <h5>C++ разработчик - ИФПМ СО РАН (2024-2025)</h5>
                            <p>Разработка алгоритма для решения контактных задач, с трехмерными объектами в пространстве </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="about-stats">
                <div class="stat-card">
                    <h4><?php 
                    $projects_count = wp_count_posts('portfolio');
                    echo $projects_count->publish ?? '0'; 
                    ?>+</h4>
                    <p>Завершенных проектов</p>
                </div>
                <div class="stat-card">
                    <h4><?php echo esc_html($developer_experience); ?></h4>
                    <p>Опыта разработки</p>
                </div>
                <div class="stat-card">
                    <h4>6+</h4>
                    <p>Технологий в стеке</p>
                </div>
            </div>
        </div>
    </div>
</section>