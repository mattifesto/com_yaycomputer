<?php

final class YCStandardPageLayout {

    /**
     * @param stdClass $layoutModel
     * @param callable $renderContentCallback
     *
     * @return null
     */
    static function render(stdClass $layoutModel, callable $renderContentCallback) {
        CBView::renderModelAsHTML((object)[
            'className' => 'YCPageHeaderView',
        ]);

        echo '<main class="YCStandardPageLayout">';

        if (empty($layoutModel->hidePageTitleAndDescriptionView)) {
            CBView::renderModelAsHTML((object)[
                'className' => 'CBPageTitleAndDescriptionView',
            ]);
        }

        $renderContentCallback();

        echo '</main>';

        CBView::renderModelAsHTML((object)[
            'className' => 'YCPageFooterView',
        ]);
    }

    /**
     * @param stdClass $spec
     *
     * @return stdClass
     */
    public static function specToModel(stdClass $spec) {
        return (object)[
            'className' => __CLASS__,
            'hidePageTitleAndDescriptionView' => CBModel::value($spec, 'hidePageTitleAndDescriptionView', false, 'boolval'),
        ];
    }
}
