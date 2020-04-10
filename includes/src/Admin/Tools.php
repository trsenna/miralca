<?php

namespace Miralca\Admin;

use Dalen\Contracts\BootstrapInterface;
use Dalen\Contracts\DI\ServiceProviderInterface;
use Dalen\DI\ServiceProviderTrait;

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
        add_action( 'admin_menu', function () {

            add_submenu_page(
                'edit.php?post_type=miralca_element',
                __( 'Tools', 'miralca' ),
                __( 'Tools', 'miralca' ),
                'manage_options',
                'miralca-admin-tools',
                new ToolsRender(),
            );
            
        } );
    }
}