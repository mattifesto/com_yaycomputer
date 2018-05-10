<?php

final class YCApplePage {

    /**
     * @return void
     */
    static function CBInstall_install(): void {

        /* page */

        $originalPageSpec = CBModels::fetchSpecByID(YCApplePage::ID());

        if (empty($originalPageSpec)) {
            $pageSpec = (object)[
                'ID' => YCApplePage::ID(),
            ];
        } else {
            $pageSpec = CBModel::clone($originalPageSpec);
        }

        CBModel::merge($pageSpec, (object)[
            'className' => 'CBViewPage',
            'classNameForSettings' => 'YCPageSettingsForResponsivePages',
            'frameClassName' => 'YCPageFrame',
            'isPublished' => true,
            'title' => 'Apple',
            'URI' => 'apple',
        ]);

        if (empty($pageSpec->publicationTimeStamp)) {
            $pageSpec->publicationTimeStamp = time();
        }

        /* title view */

        $viewSpec = CBView::findSubview($pageSpec, 'className', 'CBPageTitleAndDescriptionView');

        if (empty($viewSpec)) {
            $subviews = CBView::getSubviews($pageSpec);
            $viewSpec = (object)[
                'className' => 'CBPageTitleAndDescriptionView',
            ];

            array_unshift($subviews, $viewSpec);

            CBView::setSubviews($pageSpec, $subviews);
        }

        if ($pageSpec != $originalPageSpec) {
            CBDB::transaction(function () use ($pageSpec) {
                CBModels::save($pageSpec);
            });
        }

        /* main menu item */

        $originalMenuSpec = CBModels::fetchSpecByID(YCMainMenu::ID());
        $menuSpec = CBModel::clone($originalMenuSpec);
        $items = CBModel::valueToArray($menuSpec, 'items');
        $appleItem = null;

        foreach ($items as $item) {
            $name = CBModel::valueToString($item, 'name');

            if ($name === 'apple') {
                $appleItem = $item;
                break;
            }
        }

        if (empty($appleItem)) {
            $items[] = (object)[
                'className' => 'CBMenuItem',
                'name' => 'apple',
                'text' => 'Apple',
                'URL' => '/apple/',
            ];

            $menuSpec->items = $items;
        }

        if ($menuSpec != $originalMenuSpec) {
            CBDB::transaction(function () use ($menuSpec) {
                CBModels::save($menuSpec);
            });
        }
    }

    /**
     * @return [string]
     */
    static function CBInstall_requiredClassNames(): array {
        return ['YCMainMenu', 'CBViewPage'];
    }

    /**
     * @return hex160
     */
    static function ID(): string {
        return '95f30b62a9e5d761bbb9cb4c24e0dbc40493d134';
    }
}
