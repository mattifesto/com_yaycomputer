<?php

final class YCPageHeaderView {

    /**
     * @return null
     */
    public static function renderModelAsHTML(stdClass $model) {
        CBHTMLOutput::requireClassName(__CLASS__);

        echo '<header class="YCPageHeaderView">';

        CBThemedMenuView::renderModelAsHTML((object)[
            'menuID' => CBStandardModels::CBMenuIDForMainMenu,
        ]);

        echo '</header>';
    }

    /**
     * @return [string]
     */
    public static function requiredCSSURLs() {
        return [Colby::flexnameForCSSForClass(CBSiteURL, __CLASS__)];
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
