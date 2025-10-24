<?php
$developer_experience = get_theme_mod('developer_experience', '2 года');
?>

<section id="about" class="about">
    <div class="container">
        <h2 class="section-title">О себе</h2>
        <div class="about-content">
            <div class="about-text">
                <h3>Привет! Я веб-разработчик</h3>
                <p>Специализируюсь на создании современных веб-приложений с использованием PHP, JavaScript и современных фреймворков. Имею <?php echo esc_html($developer_experience); ?> коммерческой разработки.</p>
                
                <div class="about-details">
                    <div class="detail-column">
                        <h4>Образование</h4>
                        <ul>
                            <li>Бакалавр компьютерных наук, Университет ИТМО (2019-2023)</li>
                            <li>Курс "Full-stack разработка" от Яндекс.Практикум (2022)</li>
                            <li>Сертификация PHP Developer от Zend (2023)</li>
                        </ul>
                    </div>
                    <div class="detail-column">
                        <h4>Опыт работы</h4>
                        <div class="experience-item">
                            <h5>Middle PHP Developer - TechCompany (2023-настоящее время)</h5>
                            <p>Разработка и поддержка высоконагруженных веб-приложений</p>
                        </div>
                        <div class="experience-item">
                            <h5>Junior Web Developer - Startup Inc (2022-2023)</h5>
                            <p>Разработка фронтенда и бэкенда для CRM-системы</p>
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
                    <h4>15+</h4>
                    <p>Довольных клиентов</p>
                </div>
                <div class="stat-card">
                    <h4>6+</h4>
                    <p>Технологий в стеке</p>
                </div>
            </div>
        </div>
    </div>
</section>