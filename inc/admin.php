<?php
/**
 * World of Warcraft (WoW) Recruitment Admin Page
 */
if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_init', 'athlios_wow_recruit_options_init');
add_action('admin_menu', 'athlios_wow_recruit_options_add_page');

function athlios_wow_recruit_get_default_options()
{
    return array(
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
}

function athlios_wow_recruit_options_init()
{
    register_setting('athlios_wow_recruit_options_options', 'athlios_wow_recruit', 'athlios_wow_recruit_options_validate');
}

function athlios_wow_recruit_options_add_page()
{
    add_options_page(
        __('World of Warcraft (WoW) Recruitment Options', 'world-of-warcraft-recruitment'),
        __('World of Warcraft (WoW) Recruitment', 'world-of-warcraft-recruitment'),
        'manage_options',
        'athlios_wow_recruit_options',
        'athlios_wow_recruit_options_do_page'
    );
}

function athlios_wow_recruit_options_do_page()
{
    $options = get_option('athlios_wow_recruit', array());
    if (!is_array($options)) {
        $options = array();
    }
    $options = wp_parse_args($options, athlios_wow_recruit_get_default_options());

    $themes = array(
        __('Plugin Default (36px)', 'world-of-warcraft-recruitment') => '',
        __('Small Icons (25px)', 'world-of-warcraft-recruitment') => 'small',
        __('Huge Icons (56px)', 'world-of-warcraft-recruitment') => 'large',
    );
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('World of Warcraft (WoW) Recruitment Options', 'world-of-warcraft-recruitment'); ?></h1>

        <p>
            <a href="<?php echo esc_url(WR_HELP_URL); ?>" target="_blank" rel="noopener noreferrer">
                <img style="vertical-align: middle;" src="<?php echo esc_url(WR_INFO_ICON_URL); ?>" alt="<?php esc_attr_e('View more info', 'world-of-warcraft-recruitment'); ?>" />
                <?php esc_html_e('Plugin Documentation', 'world-of-warcraft-recruitment'); ?>
            </a>
            &nbsp;|
            <a href="<?php echo esc_url(WR_BUG_URL); ?>" target="_blank" rel="noopener noreferrer">
                <img style="vertical-align: middle;" src="<?php echo esc_url(WR_BUG_ICON_URL); ?>" alt="<?php esc_attr_e('Report bugs', 'world-of-warcraft-recruitment'); ?>" />
                <?php esc_html_e('Report Bugs', 'world-of-warcraft-recruitment'); ?>
            </a>
        </p>

        <form method="post" action="options.php">
            <?php settings_fields('athlios_wow_recruit_options_options'); ?>
            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row"><?php esc_html_e('Use Custom Style Sheet', 'world-of-warcraft-recruitment'); ?></th>
                    <td>
                        <input name="athlios_wow_recruit[custom_style]" type="checkbox" value="1" <?php checked(1, (int) $options['custom_style']); ?> />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php esc_html_e('Theme', 'world-of-warcraft-recruitment'); ?></th>
                    <td>
                        <select name="athlios_wow_recruit[theme]">
                            <?php foreach ($themes as $label => $value) : ?>
                                <option value="<?php echo esc_attr($value); ?>" <?php selected($options['theme'], $value); ?>>
                                    <?php echo esc_html($label); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td style="padding:0;"><h2><?php esc_html_e('Status Texts', 'world-of-warcraft-recruitment'); ?></h2></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row"><?php esc_html_e('High', 'world-of-warcraft-recruitment'); ?></th>
                    <td><input type="text" name="athlios_wow_recruit[status3]" value="<?php echo esc_attr($options['status3']); ?>" /></td>
                </tr>
                <tr>
                    <th scope="row"><?php esc_html_e('Medium', 'world-of-warcraft-recruitment'); ?></th>
                    <td><input type="text" name="athlios_wow_recruit[status2]" value="<?php echo esc_attr($options['status2']); ?>" /></td>
                </tr>
                <tr>
                    <th scope="row">
                        <?php esc_html_e('Closed', 'world-of-warcraft-recruitment'); ?>
                        (<?php esc_html_e('Show in widget?', 'world-of-warcraft-recruitment'); ?>
                        <input name="athlios_wow_recruit[display_closed]" type="checkbox" value="1" <?php checked(1, (int) $options['display_closed']); ?> />)
                    </th>
                    <td><input type="text" name="athlios_wow_recruit[status0]" value="<?php echo esc_attr($options['status0']); ?>" /></td>
                </tr>

                <tr>
                    <td style="padding:0;"><h2><?php esc_html_e('Class Texts', 'world-of-warcraft-recruitment'); ?></h2></td>
                    <td></td>
                </tr>
                <tr><th scope="row"><?php esc_html_e('Death Knight', 'world-of-warcraft-recruitment'); ?></th><td><input type="text" name="athlios_wow_recruit[class0]" value="<?php echo esc_attr($options['class0']); ?>" /></td></tr>
                <tr><th scope="row"><?php esc_html_e('Druid', 'world-of-warcraft-recruitment'); ?></th><td><input type="text" name="athlios_wow_recruit[class1]" value="<?php echo esc_attr($options['class1']); ?>" /></td></tr>
                <tr><th scope="row"><?php esc_html_e('Paladin', 'world-of-warcraft-recruitment'); ?></th><td><input type="text" name="athlios_wow_recruit[class2]" value="<?php echo esc_attr($options['class2']); ?>" /></td></tr>
                <tr><th scope="row"><?php esc_html_e('Hunter', 'world-of-warcraft-recruitment'); ?></th><td><input type="text" name="athlios_wow_recruit[class3]" value="<?php echo esc_attr($options['class3']); ?>" /></td></tr>
                <tr><th scope="row"><?php esc_html_e('Rogue', 'world-of-warcraft-recruitment'); ?></th><td><input type="text" name="athlios_wow_recruit[class4]" value="<?php echo esc_attr($options['class4']); ?>" /></td></tr>
                <tr><th scope="row"><?php esc_html_e('Priest', 'world-of-warcraft-recruitment'); ?></th><td><input type="text" name="athlios_wow_recruit[class5]" value="<?php echo esc_attr($options['class5']); ?>" /></td></tr>
                <tr><th scope="row"><?php esc_html_e('Shaman', 'world-of-warcraft-recruitment'); ?></th><td><input type="text" name="athlios_wow_recruit[class6]" value="<?php echo esc_attr($options['class6']); ?>" /></td></tr>
                <tr><th scope="row"><?php esc_html_e('Mage', 'world-of-warcraft-recruitment'); ?></th><td><input type="text" name="athlios_wow_recruit[class7]" value="<?php echo esc_attr($options['class7']); ?>" /></td></tr>
                <tr><th scope="row"><?php esc_html_e('Warlock', 'world-of-warcraft-recruitment'); ?></th><td><input type="text" name="athlios_wow_recruit[class8]" value="<?php echo esc_attr($options['class8']); ?>" /></td></tr>
                <tr><th scope="row"><?php esc_html_e('Warrior', 'world-of-warcraft-recruitment'); ?></th><td><input type="text" name="athlios_wow_recruit[class9]" value="<?php echo esc_attr($options['class9']); ?>" /></td></tr>
                <tr><th scope="row"><?php esc_html_e('Monk', 'world-of-warcraft-recruitment'); ?></th><td><input type="text" name="athlios_wow_recruit[class10]" value="<?php echo esc_attr($options['class10']); ?>" /></td></tr>
                <tr><th scope="row"><?php esc_html_e('Demon Hunter', 'world-of-warcraft-recruitment'); ?></th><td><input type="text" name="athlios_wow_recruit[class11]" value="<?php echo esc_attr($options['class11']); ?>" /></td></tr>
                <tr><th scope="row"><?php esc_html_e('Evoker', 'world-of-warcraft-recruitment'); ?></th><td><input type="text" name="athlios_wow_recruit[class12]" value="<?php echo esc_attr($options['class12']); ?>" /></td></tr>
            </table>

            <?php submit_button(__('Save Changes', 'world-of-warcraft-recruitment')); ?>
        </form>
    </div>
    <?php
}

function athlios_wow_recruit_options_validate($input)
{
    if (!is_array($input)) {
        $input = array();
    }

    $defaults = athlios_wow_recruit_get_default_options();
    $input = wp_parse_args($input, $defaults);

    $text_fields = array(
        'class0', 'class1', 'class2', 'class3', 'class4', 'class5',
        'class6', 'class7', 'class8', 'class9', 'class10', 'class11', 'class12',
        'status0', 'status2', 'status3',
    );

    foreach ($text_fields as $key) {
        $input[$key] = sanitize_text_field($input[$key]);
    }

    $input['status1'] = $input['status2']; // keep legacy key aligned with Medium

    $allowed_themes = array('', 'small', 'large');
    $input['theme'] = in_array($input['theme'], $allowed_themes, true) ? $input['theme'] : '';
    $input['custom_style'] = !empty($input['custom_style']) ? 1 : 0;
    $input['display_closed'] = !empty($input['display_closed']) ? 1 : 0;

    return $input;
}
