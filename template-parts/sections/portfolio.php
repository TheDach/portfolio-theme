<?php
$portfolio_args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
);

$portfolio_query = new WP_Query($portfolio_args);
?>

<section id="portfolio" class="portfolio">
    <div class="container">
        <h2 class="section-title">Портфолио работ</h2>
        
        <div class="portfolio-grid">
            <?php if ($portfolio_query->have_posts()): ?>
                <?php while ($portfolio_query->have_posts()): $portfolio_query->the_post(); ?>
                    <?php
                    $live_url = get_post_meta(get_the_ID(), '_live_url', true);
                    $github_url = get_post_meta(get_the_ID(), '_github_url', true);
                    $technologies = get_post_meta(get_the_ID(), '_technologies', true);
                    $features = get_post_meta(get_the_ID(), '_features', true);
                    ?>
                    <div class="portfolio-item">
                        <div class="portfolio-image">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project-placeholder.jpg" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <div class="portfolio-overlay">
                                <a href="<?php echo esc_url($live_url ?: '#'); ?>" class="btn btn-outline" target="_blank">Демо</a>
                                <a href="<?php echo esc_url($github_url ?: '#'); ?>" class="btn btn-primary" target="_blank">Код</a>
                            </div>
                        </div>
                        <div class="portfolio-content">
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_excerpt(); ?></p>
                            <div class="tech-tags">
                                <?php if ($technologies): ?>
                                    <?php 
                                    $tech_array = explode(',', $technologies);
                                    foreach ($tech_array as $tech): 
                                    ?>
                                        <span class="tech-tag"><?php echo esc_html(trim($tech)); ?></span>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <?php if ($features): ?>
                            <div class="project-features">
                                <h4>Особенности:</h4>
                                <ul>
                                    <?php 
                                    $feature_array = explode("\n", $features);
                                    foreach ($feature_array as $feature): 
                                        if (trim($feature)):
                                    ?>
                                        <li><?php echo esc_html(trim($feature)); ?></li>
                                    <?php 
                                        endif;
                                    endforeach; 
                                    ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p style="grid-column: 1 / -1; text-align: center;">Проекты пока не добавлены.</p>
            <?php endif; ?>
        </div>
    </div>
</section>