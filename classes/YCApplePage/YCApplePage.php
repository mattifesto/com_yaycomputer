<?php

final class YCApplePage {

    /**
     * @return void
     */
    static function CBInstall_install(
    ): void {

        /* page */

        CBModelUpdater::update(
            (object)[
                'ID' => YCApplePage::ID(),
                'isPublished' => false,
            ]
        );

        /* main menu item */

        $updater = CBModelUpdater::fetch(
            (object)[
                'ID' => YCMainMenu::ID(),
            ]
        );


        $menuItems = CBModel::valueToArray(
            $updater->working,
            'items'
        );

        $updater->working->items = array_filter(
            $menuItems,
            function ($currentMenuItem) {
                $currentMenuItemName = CBModel::valueToString(
                    $currentMenuItem,
                    'name'
                );

                if ($currentMenuItemName === 'apple') {
                    return false;
                } else {
                    return true;
                }
            }
        );

        CBModelUpdater::save(
            $updater
        );
    }
    /* CBInstall_install() */



    /**
     * @return [string]
     */
    static function CBInstall_requiredClassNames(): array {
        return [
            'YCMainMenu',
            'CBViewPage'
        ];
    }
    /* CBInstall_requiredClassNames() */



    /* -- functions -- */



    /**
     * @return CBID
     */
    static function ID(
    ): string {
        return '95f30b62a9e5d761bbb9cb4c24e0dbc40493d134';
    }

}
