<?php

final class YCPageHeaderView {

    /**
     * @return null
     */
    static function CBView_render(stdClass $model) {
        $selectedMainMenuItemName = CBModel::value(CBHTMLOutput::pageInformation(), 'selectedMainMenuItemName');

        ?>

        <header class="YCPageHeaderView CBDarkTheme">
            <div class="ad1" style="margin: 2px 0 3px; overflow: hidden; width: 100%;">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Yay Header -->
                <ins class="adsbygoogle"
                     style="display:flex; justify-content: center;"
                     data-ad-client="ca-pub-7551210095025170"
                     data-ad-slot="7947860531"
                     data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>

            <?php

            CBView::renderModelAsHTML((object)[
                'className' => 'CBMenuView',
                'menuID' => CBWellKnownMenuForMain::ID(),
                'selectedItemName' => $selectedMainMenuItemName,
            ]);

            ?>

        </header>

        <?php
    }

    /**
     * @return [string]
     */
    static function CBHTMLOutput_CSSURLs() {
        return [Colby::flexpath(__CLASS__, 'css', cbsiteurl())];
    }

    /**
     * @param stdClass $spec
     *
     * @return stdClass
     */
    static function CBModel_toModel(stdClass $spec) {
        return (object)[
            'className' => __CLASS__,
        ];
    }
}
