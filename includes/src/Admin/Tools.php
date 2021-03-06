<?php

namespace Miralca\Admin;

use Dalen\Contracts\BootstrapInterface;
use Dalen\Contracts\DI\ServiceProviderInterface;
use Dalen\DI\ServiceProviderTrait;
use function Miralca\view;

/**
 * Class Tools
 *
 * @package Miralca\Admin
 */
class Tools implements BootstrapInterface, ServiceProviderInterface
{
    use ServiceProviderTrait;

    /**
     * @inheritdoc
     */
    public function __bootstrap(): void
    {
        add_action( 'admin_menu', [ $this, 'submenuPage' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueueScripts' ] );
    }

    public function submenuPage()
    {
        add_submenu_page(
            'edit.php?post_type=miralca_element',
            __( 'Tools', 'miralca' ),
            __( 'Tools', 'miralca' ),
            'manage_options',
            'miralca-admin-tools',
            [ $this, 'submenuPageRender' ],
        );
    }

    public function submenuPageRender()
    {
        print view( 'admin/tools' )->render();
    }

    public function enqueueScripts()
    {
        $style = plugins_url( 'resources/assets/css/admin/tools.css', MIRALCA_PLUGIN_FILE );
        wp_enqueue_style( 'miralca-admin-tools', $style );
    }
}
