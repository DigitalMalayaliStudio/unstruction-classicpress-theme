<?php

/**
 * The main and only template file.
 *
 * Displays the 'under construction' or 'undergoing maintenance' page.
 *
 * @package Unstruction CP
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (get_theme_mod('unstruction_cp_mode', 'construction') === 'maintenance') : ?>
        <meta name="description" content="This website is undergoing maintenance. Please check back later.">
        <meta property="og:title" content="<?php bloginfo('name'); ?> - Undergoing Maintenance">
        <meta property="og:description" content="This website is undergoing maintenance. Please check back later.">
    <?php else : ?>
        <meta name="description" content="This website is under construction. Please check back later.">
        <meta property="og:title" content="<?php bloginfo('name'); ?> - Under Construction">
        <meta property="og:description" content="This website is under construction. Please check back later.">
    <?php endif; ?>
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url(get_home_url()); ?>">
    <meta property="og:image" content="<?php echo esc_url(get_template_directory_uri() . '/assets/images/unstruction.webp'); ?>">
    <?php $color = sanitize_key(get_theme_mod('unstruction_cp_color', 'orange')); ?>
    <style>
        :root {
            --theme-color-300: var(--sl-color-<?php echo esc_attr($color); ?>-300);
            --theme-color-500: var(--sl-color-<?php echo esc_attr($color); ?>-500);
            --theme-color-600: var(--sl-color-<?php echo esc_attr($color); ?>-600);
        }
    </style>
    <?php wp_head(); ?>
    <script>
        const colorScheme = window.matchMedia("(prefers-color-scheme: dark)");
        const applyScheme = (e) => document.documentElement.classList.toggle("sl-theme-dark", e.matches);

        applyScheme(colorScheme);
        colorScheme.addEventListener("change", applyScheme);
    </script>
</head>

<body>
    <sl-card class="card-overview">
        <?php
        $image_id  = get_theme_mod('unstruction_cp_image', 0);
        $image_src = wp_get_attachment_image_url($image_id, 'medium_large') ?: get_theme_file_uri('assets/images/unstruction.webp');
        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: get_bloginfo('name') . ' - Under Construction';
        ?>
        <img slot="image" src="<?php echo esc_url($image_src); ?>" alt="<?php echo esc_attr($image_alt); ?>" width="350">
        <strong><?php bloginfo('name'); ?></strong><br>
        <?php if (get_theme_mod('unstruction_cp_mode', 'construction') === 'maintenance') : ?>
            This website is undergoing maintenance.
        <?php else : ?>
            This website is under construction.
        <?php endif; ?>
        <?php if (get_theme_mod('unstruction_cp_date_time', '2100-01-01T00:00')) : ?>
            <br>Please check back later in <sl-badge pill pulse
                class="days"></sl-badge> days, <sl-badge pill pulse class="hr"></sl-badge> hours, <sl-badge
                pill pulse class="min"></sl-badge> minutes and <sl-badge pill pulse
                class="sec"></sl-badge> seconds!
        <?php else : ?>
            <br>Please check back later!
        <?php endif; ?>
        <?php
        $phone    = get_theme_mod('unstruction_cp_phone', '123456789');
        $email    = get_theme_mod('unstruction_cp_email', 'info@example.com');
        $whatsapp = get_theme_mod('unstruction_cp_whatsapp', '123456789');
        $location = get_theme_mod('unstruction_cp_location', 'https://example.com');
        ?>
        <?php if (!empty($phone) || !empty($email) || !empty($whatsapp) || !empty($location)) : ?>
            <br><small>Feel free to reach out to us.</small>
            <div slot="footer">
                <sl-button-group label="Alignment">
                    <?php if (!empty($phone)) : ?>
                        <?php $phone_href = ($phone === '#') ? '#' : 'tel:' . $phone; ?>
                        <sl-button size="medium" circle href="<?php echo esc_attr($phone_href); ?>">
                            <sl-icon name="telephone" label="<?php esc_attr_e('Phone', 'unstruction-cp'); ?>"></sl-icon>
                        </sl-button>
                    <?php endif; ?>
                    <?php if (!empty($email)) : ?>
                        <sl-button size="medium" circle href="<?php echo esc_url('mailto:' . $email); ?>">
                            <sl-icon name="envelope" label="<?php esc_attr_e('Mail', 'unstruction-cp'); ?>"></sl-icon>
                        </sl-button>
                    <?php endif; ?>
                    <?php if (!empty($whatsapp)) : ?>
                        <?php
                        $clean_wa = preg_replace('/[^0-9]/', '', $whatsapp);
                        $wa_href  = ($whatsapp === '#') ? '#' : (strpos($whatsapp, 'http') === 0 ? $whatsapp : 'https://wa.me/' . $clean_wa);
                        ?>
                        <sl-button size="medium" circle href="<?php echo esc_url($wa_href); ?>" <?php if ($whatsapp !== '#') : ?> target="_blank" <?php endif; ?>>
                            <sl-icon name="whatsapp" label="<?php esc_attr_e('WhatsApp', 'unstruction-cp'); ?>"></sl-icon>
                        </sl-button>
                    <?php endif; ?>
                    <?php if (!empty($location)) : ?>
                        <?php $location_href = ($location === '#') ? '#' : $location; ?>
                        <sl-button size="medium" circle href="<?php echo esc_url($location_href); ?>" <?php if ($location !== '#') : ?> target="_blank" <?php endif; ?>>
                            <sl-icon name="geo-alt" label="<?php esc_attr_e('Map', 'unstruction-cp'); ?>"></sl-icon>
                        </sl-button>
                    <?php endif; ?>
                </sl-button-group>
            </div>
        <?php endif; ?>
    </sl-card>

    <small class="copyright">
        <?php if (get_theme_mod('unstruction_cp_credits', false)) : ?>
            <sl-icon-button name="github" label="GitHub" style="font-size: 1.2rem;"
                href="https://github.com/digitalmalayalistudio/unstruction-classicpress-theme/"
                target="_blank"></sl-icon-button><br><?php echo esc_html(wp_get_theme()->get('Name') . ' ' . wp_get_theme()->get('Version')); ?> by
            <a href="<?php echo esc_url('https://studio.digitalmalayali.in/'); ?>" target="_blank" rel="noopener noreferrer">Digital Malayali Studio</a><br>
        <?php else : ?>
            Powered by <?php echo esc_html(wp_get_theme()->get('Name') . ' ' . wp_get_theme()->get('Version')); ?><br>
        <?php endif; ?>
        &copy; <?php echo esc_html(gmdate('Y') . ' ' . get_bloginfo('name')); ?>
    </small>
    <?php wp_footer(); ?>
</body>

</html>