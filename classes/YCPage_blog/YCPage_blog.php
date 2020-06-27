<?php

final class YCPage_blog {

    /* -- CBInstall interfaces -- -- -- -- -- */



    /**
     * @return void
     */
    static function CBInstall_configure(): void {
        YCPage_blog::installPage();
        YCPage_blog::installMenuItem();
    }



    /* -- functions -- -- -- -- -- */



    /**
     * @return ID
     */
    static function ID(): string {
        return 'cbad432d33c6318f998190e7dc52859087ca888e';
    }



    /**
     * @return void
     */
    private static function installMenuItem(): void {
        $updater = CBModelUpdater::fetch(
            (object)[
                'ID' => YCMainMenu::ID(),
            ]
        );

        $menuSpec = $updater->working;

        CBMenu::addOrReplaceItem(
            $menuSpec,
            (object)[
                'className' => 'CBMenuItem',
                'name' => 'blog',
                'text' => 'Blog',
                'URL' => '/blog/',
            ]
        );

        CBModelUpdater::save($updater);
    }
    /* installMenuItem() */



    /**
     * @return void
     */
    private static function installPage(): void {
        $updater = CBModelUpdater::fetch(
            CBModelTemplateCatalog::fetchLivePageTemplate(
                (object)[
                    'ID' => YCPage_blog::ID(),
                    'classNameForKind' => 'YCGeneratePageKind',
                    'isPublished' => true,
                    'selectedMenuItemNames' => 'blog',
                    'title' => 'Blog',
                    'URI' => 'blog',
                ]
            )
        );

        $pageSpec = $updater->working;

        /* publicationTimeStamp */

        if (CBModel::valueAsInt($pageSpec, 'publicationTimeStamp') === null) {
            $pageSpec->publicationTimeStamp = time();
        }

        /* page title and description view */

        $sourceID = '91f66d71801cf52931936b158355a287fa13d134';

        CBSubviewUpdater::unshift(
            $pageSpec,
            'sourceID',
            $sourceID,
            (object)[
                'className' => 'CBPageTitleAndDescriptionView',
                'sourceID' => $sourceID,
            ]
        );

        /* page list view */

        $sourceID = '5e215ea90307d56417ffca72f76b6895c488fd62';

        CBSubviewUpdater::push(
            $pageSpec,
            'sourceID',
            $sourceID,
            (object)[
                'className' => 'CBPageListView2',
                'classNameForKind' => 'YCBlogPostPageKind',
                'sourceID' => $sourceID,
            ]
        );

        /* save */

        CBModelUpdater::save($updater);
    }
    /* installPage() */

}
