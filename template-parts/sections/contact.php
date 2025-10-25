<?php
$developer_email = get_theme_mod('developer_email', 'vlad.deys@mail.ru');
$developer_phone = get_theme_mod('developer_phone', '+7 (983) 219-19-14');
$developer_location = get_theme_mod('developer_location', 'Томск, Россия');

$message_sent = false;
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $subject = sanitize_text_field($_POST['subject'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');
    
    // Валидация
    if (empty($name)) $errors[] = "Имя обязательно для заполнения";
    if (empty($email) || !is_email($email)) $errors[] = "Введите корректный email";
    if (empty($message)) $errors[] = "Сообщение не может быть пустым";
    
    if (empty($errors)) {
        // Отправка email
        $to = get_theme_mod('developer_email', get_option('admin_email'));
        $email_subject = $subject ?: "Сообщение с сайта портфолио";
        $headers = array(
            'From: ' . $name . ' <' . $email . '>',
            'Content-Type: text/html; charset=UTF-8'
        );
        
        $email_message = "
            <h3>Новое сообщение с сайта портфолио</h3>
            <p><strong>Имя:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Тема:</strong> {$subject}</p>
            <p><strong>Сообщение:</strong></p>
            <p>{$message}</p>
        ";
        
        if (wp_mail($to, $email_subject, $email_message, $headers)) {
            $message_sent = true;
        } else {
            $errors[] = "Ошибка при отправке сообщения";
        }
    }
}
?>

<section id="contact" class="contact">
    <div class="container">
        <h2 class="section-title">Контактная информация</h2>
        
        <?php if ($message_sent): ?>
        <div class="alert alert-success">
            <p>✅ Сообщение успешно отправлено! Спасибо за ваше обращение.</p>
        </div>
        <?php endif; ?>
        
        <?php if (!empty($errors)): ?>
        <div class="alert alert-error">
            <ul>
                <?php foreach ($errors as $error): ?>
                <li>❌ <?php echo esc_html($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <div class="contact-content">
            <div class="contact-info">
                <h3>Свяжитесь со мной</h3>
                <div class="contact-item">
                    <strong>Email:</strong>
                    <a href="mailto:<?php echo esc_attr($developer_email); ?>"><?php echo esc_html($developer_email); ?></a>
                </div>
                <div class="contact-item">
                    <strong>Телефон:</strong>
                    <a href="tel:<?php echo esc_attr(str_replace([' ', '(', ')', '-'], '', $developer_phone)); ?>"><?php echo esc_html($developer_phone); ?></a>
                </div>
                <div class="contact-item">
                    <strong>Город:</strong>
                    <span><?php echo esc_html($developer_location); ?></span>
                </div>
                <div class="contact-item">
                    <strong>Готов к:</strong>
                    <span>Удаленной работе, Релокации, Фрилансу</span>
                </div>
                
                <div class="social-links">
                    <h4>Социальные сети:</h4>
                    <div class="social-icons">
                        <a href="https://github.com" class="social-link" target="_blank">GitHub</a>
                        <a href="https://linkedin.com" class="social-link" target="_blank">LinkedIn</a>
                        <a href="https://telegram.org" class="social-link" target="_blank">Telegram</a>
                        <a href="https://vk.com" class="social-link" target="_blank">VK</a>
                    </div>
                </div>
            </div>
            
            <div class="contact-form">
                <h3>Форма обратной связи</h3>
                <form method="POST" action="#contact">
                    <div class="form-group">
                        <label for="name">Имя *</label>
                        <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? esc_attr($_POST['name']) : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Тема</label>
                        <input type="text" id="subject" name="subject" value="<?php echo isset($_POST['subject']) ? esc_attr($_POST['subject']) : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="message">Сообщение *</label>
                        <textarea id="message" name="message" rows="5" required><?php echo isset($_POST['message']) ? esc_textarea($_POST['message']) : ''; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить сообщение</button>
                </form>
            </div>
        </div>
    </div>
</section>