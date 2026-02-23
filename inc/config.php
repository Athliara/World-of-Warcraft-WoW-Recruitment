<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * custom class/ status texts
 * @since 1.2
 */
$awr_defaults = array(
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

$awr_options = get_option('athlios_wow_recruit', array());
if (!is_array($awr_options)) {
    $awr_options = array();
}
$awr_options = wp_parse_args($awr_options, $awr_defaults);

$awr_status = array(
    '0' => $awr_options['status0'],
    '1' => $awr_options['status2'], // legacy Low values are mapped to Medium
    '2' => $awr_options['status2'],
    '3' => $awr_options['status3']
);

$awr_class = array(
    'deathknight' => $awr_options['class0'],
    'druid' => $awr_options['class1'],
    'paladin' => $awr_options['class2'],
    'hunter' => $awr_options['class3'],
    'rogue' => $awr_options['class4'],
    'priest' => $awr_options['class5'],
    'shaman' => $awr_options['class6'],
    'mage' => $awr_options['class7'],
    'warlock' => $awr_options['class8'],
    'warrior' => $awr_options['class9'],
    'monk' => $awr_options['class10'],
    'demonhunter' => $awr_options['class11'],
    'evoker' => $awr_options['class12'],
);

if (!$awr_options['custom_style']) {
    if (!function_exists('athlios_wow_recruit_widget_enqueue_styles')) {
        function athlios_wow_recruit_widget_enqueue_styles()
        {
            global $awr_options;
            wp_enqueue_style('wr_layout', plugins_url('css/style' . (($awr_options['theme'] != '') ? '-' . $awr_options['theme'] : '') . '.css', WR__FILE__), array(), '2.0');
        }
    }

    add_action('init', 'athlios_wow_recruit_widget_enqueue_styles');
}

$awr_display_closed = !empty($awr_options['display_closed']);
$awr_theme = $awr_options['theme'];
