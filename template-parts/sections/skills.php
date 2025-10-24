<?php
// Навыки можно вынести в настройки темы или оставить статичными
$skills = array(
    array(
        'name' => 'PHP',
        'level' => 'Продвинутый',
        'level_percent' => 90,
        'experience' => '2 года',
        'projects_count' => 8
    ),
    array(
        'name' => 'Laravel',
        'level' => 'Продвинутый',
        'level_percent' => 85,
        'experience' => '1.5 года',
        'projects_count' => 6
    ),
    // ... остальные навыки из вашего исходного кода
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
                <h3>Технологический стек</h3>
                <div class="tech-categories">
                    <div class="tech-category">
                        <h4>Backend</h4>
                        <div class="tech-icons">
                            <div class="tech-icon">PHP</div>
                            <div class="tech-icon">Laravel</div>
                            <div class="tech-icon">Node.js</div>
                            <div class="tech-icon">MySQL</div>
                            <div class="tech-icon">PostgreSQL</div>
                            <div class="tech-icon">REST API</div>
                        </div>
                    </div>
                    <div class="tech-category">
                        <h4>Frontend</h4>
                        <div class="tech-icons">
                            <div class="tech-icon">JavaScript</div>
                            <div class="tech-icon">React</div>
                            <div class="tech-icon">Vue.js</div>
                            <div class="tech-icon">HTML5</div>
                            <div class="tech-icon">CSS3</div>
                            <div class="tech-icon">TypeScript</div>
                        </div>
                    </div>
                    <div class="tech-category">
                        <h4>Tools</h4>
                        <div class="tech-icons">
                            <div class="tech-icon">Git</div>
                            <div class="tech-icon">Docker</div>
                            <div class="tech-icon">Webpack</div>
                            <div class="tech-icon">Composer</div>
                            <div class="tech-icon">NPM</div>
                            <div class="tech-icon">Linux</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>