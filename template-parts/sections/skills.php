<?php
// Навыки можно вынести в настройки темы или оставить статичными
$skills = array(
    array(
        'name' => 'Java',
        'level' => 'Средний',
        'level_percent' => 60,
        'experience' => '2 года',
        'projects_count' => 8
    ),
    array(
        'name' => 'Kotlin',
        'level' => 'Низкий',
        'level_percent' => 30,
        'experience' => '0.5 года',
        'projects_count' => 3
    ),
    [
        'name' => 'MySQL',
        'level' => 'Среднего',
        'level_percent' => 57,
        'experience' => '2 года',
        'projects_count' => 3
    ],
    [
        'name' => 'Git/Docker',
        'level' => 'Средний',
        'level_percent' => 46,
        'experience' => '1.5 года',
        'projects_count' => 5
    ]
);
?>

<section id="skills" class="skills">
    <div class="container">
        <h2 class="section-title">Владение современными технологиями</h2>
        
        <div class="skills-content">
            <!-- Таблица навыков -->
            <div class="skills-table">
                <table>
                    <thead>
                        <tr>
                            <th>Технология</th>
                            <th>Уровень владения</th>
                            <th>Опыт</th>
                            <th>Проекты</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($skills as $skill): ?>
                        <tr>
                            <td><?php echo esc_html($skill['name']); ?></td>
                            <td>
                                <div class="skill-level">
                                    <div class="skill-bar" style="width: <?php echo esc_attr($skill['level_percent']); ?>%"></div>
                                </div>
                                <span><?php echo esc_html($skill['level']); ?></span>
                            </td>
                            <td><?php echo esc_html($skill['experience']); ?></td>
                            <td><?php echo esc_html($skill['projects_count']); ?> проектов</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Технологический стек -->
            <div class="tech-stack">
                <h3>Технологический стек Android</h3>
                <div class="tech-categories">
                    <div class="tech-category">
                        <h4>Java</h4>
                        <div class="tech-icons">
                            <div class="tech-icon">Room</div>
                            <div class="tech-icon">Retrofit</div>
                            <div class="tech-icon">Dagger Hilt</div>
                            <div class="tech-icon">FireBase</div>
                            <div class="tech-icon">XML</div>
                            <div class="tech-icon">RxJava</div>
                        </div>
                    </div>
                    <div class="tech-category">
                        <h4>Kotlin</h4>
                        <div class="tech-icons">
                            <div class="tech-icon">Room</div>
                            <div class="tech-icon">Jetpack Compose</div>
                            <div class="tech-icon">Coroutines</div>
                            <div class="tech-icon">SharedPreferences</div>
                            <div class="tech-icon">Dagger Hilt</div>
                        </div>
                    </div>
                    <div class="tech-category">
                        <h4>Tools</h4>
                        <div class="tech-icons">
                            <div class="tech-icon">Git</div>
                            <div class="tech-icon">Docker</div>
                            <div class="tech-icon">Linux</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>