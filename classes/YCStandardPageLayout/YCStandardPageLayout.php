<?php

final class YCStandardPageLayout {

    /**
     * @param stdClass $layoutModel
     * @param callable $renderContentCallback
     *
     * @return null
     */
    public static function render(stdClass $layoutModel, callable $renderContentCallback) {
        YCPageHeaderView::renderModelAsHTML((object)[]);

        echo '<main class="YCStandardPageLayout">';

        if (empty($layoutModel->hidePageTitleAndDescriptionView)) {
            CBPageTitleAndDescriptionView::renderModelAsHTML((object)[]);
        }

        $renderContentCallback();

        echo '</main>';

        YCPageFooterView::renderModelAsHTML((object)[]);
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
