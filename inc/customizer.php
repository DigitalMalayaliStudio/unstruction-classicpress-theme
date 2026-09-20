<?php

/**
 * Unstruction CP Theme Customizer.
 *
 * @package Unstruction CP
 */

/**
 * Register Customizer settings and controls.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function unstruction_cp_customize_register($wp_customize)
{

    // Add theme configuration section
    $wp_customize->add_section('unstruction_cp_configuration_section', array(
        'title'    => __('Configuration', 'unstruction-cp'),
        'description' => __('Unstruction CP is super-easy to customize. Here you can find all the theme configuration settings.', 'unstruction-cp'),
        'priority' => 140,
    ));

    // Mode
    $wp_customize->add_setting('unstruction_cp_mode', array(
        'type'              => 'theme_mod',
        'default'           => 'construction',
        'sanitize_callback' => 'sanitize_key',
    ));

    $wp_customize->add_control('unstruction_cp_mode_control', array(
        'type'        => 'radio',
        'section'     => 'unstruction_cp_configuration_section',
        'label'    => __('Mode', 'unstruction-cp'),
        'description' => __('Set whether your site is under construction or undergoing maintenance.', 'unstruction-cp'),
        'settings'    => 'unstruction_cp_mode',
        'choices'     => array(
            'construction' => __('Construction', 'unstruction-cp'),
            'maintenance'  => __('Maintenance', 'unstruction-cp'),
        ),
    ));

    // Image
    $wp_customize->add_setting('unstruction_cp_image', array(
        'default'           => 0,
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'image_control', array(
        'label' => __('Featured Image', 'unstruction-cp'),
        'section' => 'unstruction_cp_configuration_section',
        'mime_type' => 'image',
        'settings'    => 'unstruction_cp_image',
    )));

    // Date & time
    $wp_customize->add_setting('unstruction_cp_date_time', array(
        'type'              => 'theme_mod',
        'default'           => '2100-01-01T00:00',
        'sanitize_callback' => 'unstruction_cp_sanitize_date',
    ));

    $wp_customize->add_control('unstruction_cp_date_time_control', array(
        'type'        => 'datetime-local',
        'section'     => 'unstruction_cp_configuration_section',
        'label'    => __('Date & Time', 'unstruction-cp'),
        'description' => __('Set the planned launch date and time.', 'unstruction-cp'),
        'settings'    => 'unstruction_cp_date_time',
    ));

    // Theme color
    $color_description = sprintf(
        esc_html__('Preferred theme color based on the %s.', 'unstruction-cp'),
        '<a href="' . esc_url('https://shoelace.style/tokens/color#theme-tokens') . '" target="_blank" rel="noopener noreferrer">'
            . esc_html__('Shoelace color tokens', 'unstruction-cp')
            . ' <span class="dashicons dashicons-external" aria-hidden="true" style="font-size:16px;line-height:1.3;text-decoration:none;"></span>'
            . '<span class="screen-reader-text">' . esc_html__('(opens in a new tab)', 'unstruction-cp') . '</span>'
            . '</a>'
    );

    $wp_customize->add_setting('unstruction_cp_color', array(
        'type'              => 'theme_mod',
        'default'           => 'orange',
        'sanitize_callback' => 'sanitize_key',
    ));

    $wp_customize->add_control('unstruction_cp_color_control', array(
        'type'        => 'select',
        'section'     => 'unstruction_cp_configuration_section',
        'label'    => __('Color', 'unstruction-cp'),
        'description' => $color_description,
        'settings'    => 'unstruction_cp_color',
        'choices'     => array(
            'primary' => __('Primary', 'unstruction-cp'),
            'success' => __('Success', 'unstruction-cp'),
            'warning' => __('Warning', 'unstruction-cp'),
            'danger'  => __('Danger', 'unstruction-cp'),
            'neutral' => __('Neutral', 'unstruction-cp'),
            'gray'    => __('Gray', 'unstruction-cp'),
            'red'     => __('Red', 'unstruction-cp'),
            'orange'  => __('Orange', 'unstruction-cp'),
            'amber'   => __('Amber', 'unstruction-cp'),
            'yellow'  => __('Yellow', 'unstruction-cp'),
            'lime'    => __('Lime', 'unstruction-cp'),
            'green'   => __('Green', 'unstruction-cp'),
            'emerald' => __('Emerald', 'unstruction-cp'),
            'teal'    => __('Teal', 'unstruction-cp'),
            'cyan'    => __('Cyan', 'unstruction-cp'),
            'sky'     => __('Sky', 'unstruction-cp'),
            'blue'    => __('Blue', 'unstruction-cp'),
            'indigo'  => __('Indigo', 'unstruction-cp'),
            'violet'  => __('Violet', 'unstruction-cp'),
            'purple'  => __('Purple', 'unstruction-cp'),
            'fuchsia' => __('Fuchsia', 'unstruction-cp'),
            'pink'    => __('Pink', 'unstruction-cp'),
            'rose'    => __('Rose', 'unstruction-cp'),
        ),
    ));

    // Contact details
    $wp_customize->add_setting('unstruction_cp_phone', array(
        'type'              => 'theme_mod',
        'default'           => '#',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('unstruction_cp_phone_control', array(
        'type'        => 'tel',
        'section'     => 'unstruction_cp_configuration_section',
        'label'       => __('Phone No.', 'unstruction-cp'),
        'settings'    => 'unstruction_cp_phone',
    ));

    $wp_customize->add_setting('unstruction_cp_email', array(
        'type'              => 'theme_mod',
        'default'           => '#',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('unstruction_cp_email_control', array(
        'type'        => 'email',
        'section'     => 'unstruction_cp_configuration_section',
        'label'       => __('Email', 'unstruction-cp'),
        'settings'    => 'unstruction_cp_email',
    ));

    $wp_customize->add_setting('unstruction_cp_whatsapp', array(
        'type'              => 'theme_mod',
        'default'           => '#',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('unstruction_cp_whatsapp_control', array(
        'type'        => 'tel',
        'section'     => 'unstruction_cp_configuration_section',
        'label'       => __('WhatsApp', 'unstruction-cp'),
        'settings'    => 'unstruction_cp_whatsapp',
    ));

    $wp_customize->add_setting('unstruction_cp_location', array(
        'type'              => 'theme_mod',
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('unstruction_cp_location_control', array(
        'type'        => 'url',
        'section'     => 'unstruction_cp_configuration_section',
        'label'       => __('Location (URL)', 'unstruction-cp'),
        'settings'    => 'unstruction_cp_location',
    ));
}

add_action('customize_register', 'unstruction_cp_customize_register');

/**
 * Remove unnecessary Customizer sections and panels.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function unstruction_cp_remove_customizer_panels($wp_customize)
{

    $wp_customize->remove_panel('nav_menus');
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('static_front_page');
}

add_action('customize_register', 'unstruction_cp_remove_customizer_panels', 999);

/**
 * Sanitization callback for date & time input.
 *
 * @param string $input Date and time input string.
 * @return string Sanitized date and time string, or empty string if invalid.
 */
function unstruction_cp_sanitize_date($input)
{
    if (empty($input)) {
        return '';
    }

    $date = DateTime::createFromFormat('Y-m-d\TH:i', $input);
    if ($date && $date->format('Y-m-d\TH:i') === $input) {
        return $input;
    }

    $date_sec = DateTime::createFromFormat('Y-m-d\TH:i:s', $input);
    if ($date_sec && $date_sec->format('Y-m-d\TH:i:s') === $input) {
        return $input;
    }

    return '';
}
