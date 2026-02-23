<?php

/**
 * Register our widget.
 * 'Example_Widget' is the widget class used below.
 *
 * @since 1.0
 */
function athlios_wow_recruit_load_widgets()
{
    register_widget('World_Of_Warcraft_Recruitment_Widget');
}


if (!function_exists('athlios_wow_recruit_widget_install')) {

    function athlios_wow_recruit_widget_install()
    {
        $options = array(
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
            'custom_style' => false,
            'theme' => false,
            'display_closed' => false,
        );


        add_option('athlios_wow_recruit', $options);
    }

}
if (!function_exists('athlios_wow_recruit_widget_deactivate')) {

    function athlios_wow_recruit_widget_deactivate()
    {
        // Intentionally keep saved settings on deactivation.
    }

}

if (!function_exists('athlios_wow_recruit_widget_uninstall')) {

    function athlios_wow_recruit_widget_uninstall()
    {
        // Reserved for optional uninstall workflow.
    }

}