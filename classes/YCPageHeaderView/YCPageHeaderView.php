<?php

final class
YCPageHeaderView {

    /* -- CBHTMLOutput interfaces -- -- -- -- -- */

    /**
     * @return [string]
     */
    static function CBHTMLOutput_CSSURLs() {
        return [
            Colby::flexpath(__CLASS__, 'css', cbsiteurl()),
        ];
    }


    /* -- CBInstall interfaces -- -- -- -- -- */

    /**
     * @return void
     */
    static function CBInstall_install(): void {
        CBViewCatalog::installView(
            __CLASS__
        );
    }
    /* CBInstall_install() */


    /**
     * @return [string]
     */
    static function CBInstall_requiredClassNames(): array {
        return [
            'CBViewCatalog',
        ];
    }
    /* CBInstall_requiredClassNames() */


    /* -- CBModel interfaces -- -- -- -- -- */

    /**
     * @param object $spec
     *
     * @return object
     */
    static function CBModel_build(stdClass $spec): stdClass {
        return (object)[];
    }


    /* -- CBView interfaces -- -- -- -- -- */

    /**
     * @param object $model
     *
     * @return void
     */
    static function CBView_render(stdClass $model): void {
        $selectedMainMenuItemName = CBModel::valueToString(
            CBHTMLOutput::pageInformation(),
            'selectedMainMenuItemName'
        );

        ?>

        <header class="YCPageHeaderView CBDarkTheme">
            <div
                class="ad1"
                style="margin: 2px 0 3px; overflow: hidden; width: 100%;"
            >
            <script
                async
                src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7551210095025170"
                crossorigin="anonymous"></script>
                <!-- Yay Header -->
                <ins
                    class="adsbygoogle"
                    style="display:flex; justify-content: center;"
                    data-ad-client="ca-pub-7551210095025170"
                    data-ad-slot="7947860531"
                    data-ad-format="auto"
                ></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>

            <?php

            CBView::render(
                (object)[
                    'className' => 'CBMenuView',
                    'menuID' => YCMainMenu::ID(),
                    'selectedItemName' => $selectedMainMenuItemName,
                ]
            );

            ?>

        </header>

        <?php
    }
}
