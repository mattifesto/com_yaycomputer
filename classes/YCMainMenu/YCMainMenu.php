<?php

final class YCMainMenu {

    /**
     * @return void
     */
    static function CBInstall_install(): void {
        $originalSpec = CBModels::fetchSpecByID(YCMainMenu::ID());

        if (empty($originalSpec)) {
            $spec = (object)[
                'ID' => YCMainMenu::ID(),
                'title' => 'Yay! Computer!',
                'titleURI' => '/',
                'items' => [],
            ];
        } else {
            $spec = CBModel::clone($originalSpec);
        }

        $spec->className = 'CBMenu';

        /* save if modified */

        if ($spec != $originalSpec) {
            CBDB::transaction(function () use ($spec) {
                CBModels::save($spec);
            });
        }
    }

    /**
     * @return [string]
     */
    static function CBInstall_requiredClassNames(): array {
        return ['CBModels'];
    }

    /**
     * @return ID
     */
    static function ID(): string {
        return 'b1ebf1fcd2bea9bd084c24e3174b99866f4c7ea8';
    }
}
