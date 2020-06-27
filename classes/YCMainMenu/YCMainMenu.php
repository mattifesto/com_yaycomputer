<?php

final class YCMainMenu {

    /* -- CBInstall interfaces -- -- -- -- -- */



    /**
     * @return void
     */
    static function CBInstall_install(): void {
        $updater = CBModelUpdater::fetch(
            (object)[
                'className' => 'CBMenu',
                'ID' => YCMainMenu::ID(),
                'title' => 'Yay Computer',
                'titleURI' => '/',
            ]
        );

        CBModelUpdater::save($updater);
    }
    /* CBInstall_install() */



    /**
     * @return [string]
     */
    static function CBInstall_requiredClassNames(): array {
        return [
            'CBMenu',
            'CBModelUpdater',
        ];
    }
    /* CBInstall_requiredClassNames() */



    /* -- functions -- -- -- -- -- */



    /**
     * @return ID
     */
    static function ID(): string {
        return 'b1ebf1fcd2bea9bd084c24e3174b99866f4c7ea8';
    }

}
