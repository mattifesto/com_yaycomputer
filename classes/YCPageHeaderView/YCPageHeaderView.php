<?php

final class YCPageHeaderView {

    /**
     * @return null
     */
    public static function renderModelAsHTML(stdClass $model) {
        CBHTMLOutput::requireClassName(__CLASS__);

        ?>

        <header class="YCPageHeaderView">
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

        CBThemedMenuView::renderModelAsHTML((object)[
            'menuID' => CBStandardModels::CBMenuIDForMainMenu,
        ]);

        echo '</header>';
    }

    /**
     * @return [string]
     */
    public static function requiredCSSURLs() {
        return [Colby::flexnameForCSSForClass(CBSitePreferences::siteURL(), __CLASS__)];
    }

    /**
     * @param stdClass $spec
     *
     * @return stdClass
     */
    public static function specToModel(stdClass $spec) {
        return (object)[
            'className' => __CLASS__,
        ];
    }
}
