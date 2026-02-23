<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * custom class/ status texts
 * @since 1.2
 */
$wr_defaults = array(
    'class0' => 'Death Knight',
    'class1' => 'Druid',
    'class2' => 'Paladin',
    'class3' => 'Hunter',
    'class4' => 'Rogue',
    'class5' => 'Priest',
    'class6' => 'Shaman',
    'class7' => 'Mage',
    'class8' => 'Warlock',
    'class9' => 'Warrior',
    'class10' => 'Monk',
    'class11' => 'Demon Hunter',
    'class12' => 'Evoker',
    'status0' => 'Closed',
    'status1' => 'Medium',
    'status2' => 'Medium',
    'status3' => 'High',
    'custom_style' => 0,
    'theme' => '',
    'display_closed' => 0,
);

$wr_options = get_option('athlios_wow_recruit', array());
if (!is_array($wr_options)) {
    $wr_options = array();
}
$wr_options = wp_parse_args($wr_options, $wr_defaults);

$wr_status = array(
    '0' => $wr_options['status0'],
    '1' => $wr_options['status2'], // legacy Low values are mapped to Medium
    '2' => $wr_options['status2'],
    '3' => $wr_options['status3']
);

$wr_class = array(
    'deathknight' => $wr_options['class0'],
    'druid' => $wr_options['class1'],
    'paladin' => $wr_options['class2'],
    'hunter' => $wr_options['class3'],
    'rogue' => $wr_options['class4'],
    'priest' => $wr_options['class5'],
    'shaman' => $wr_options['class6'],
    'mage' => $wr_options['class7'],
    'warlock' => $wr_options['class8'],
    'warrior' => $wr_options['class9'],
    'monk' => $wr_options['class10'],
    'demonhunter' => $wr_options['class11'],
    'evoker' => $wr_options['class12'],
);

if (!$wr_options['custom_style']) {
    if (!function_exists('athlios_wow_recruit_widget_enqueue_styles')) {
        function athlios_wow_recruit_widget_enqueue_styles()
        {
            global $wr_options;
            wp_enqueue_style('wr_layout', plugins_url('css/style' . (($wr_options['theme'] != '') ? '-' . $wr_options['theme'] : '') . '.css', WR__FILE__), array(), '2.0');
        }
    }

    add_action('init', 'athlios_wow_recruit_widget_enqueue_styles');
}

$wr_display_closed = !empty($wr_options['display_closed']);
$wr_theme = $wr_options['theme'];
