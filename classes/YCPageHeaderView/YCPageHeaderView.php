<?php

final class YCPageHeaderView {

    /**
     * @return null
     */
    public static function renderModelAsHTML(stdClass $model) {
        echo '<header class="YCPageHeaderView">';

        CBThemedMenuView::renderModelAsHTML((object)[
            'menuID' => CBStandardModels::CBMenuIDForMainMenu,
            'themeID' => CBStandardModels::CBThemeIDForCBMenuViewForMainMenu,
        ]);

        echo '</header>';
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
