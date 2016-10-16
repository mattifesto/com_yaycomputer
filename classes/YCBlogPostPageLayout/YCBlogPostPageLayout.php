<?php

final class YCBlogPostPageLayout {

    /**
     * @param stdClass $layoutModel
     * @param callable $renderContentCallback
     *
     * @return null
     */
    public static function render(stdClass $layoutModel, callable $renderContentCallback) {
        YCPageHeaderView::renderModelAsHTML((object)[]);

        echo '<main class="YCBlogPostPageLayout" style="flex: 1 1 auto;"><article>';

        if (empty($layoutModel->hidePageTitleAndDescriptionView)) {
            CBPageTitleAndDescriptionView::renderModelAsHTML((object)[
                'showPublicationDate' => true,
            ]);
        }

        $renderContentCallback();

        echo '</article></main>';

        YCPageFooterView::renderModelAsHTML((object)[
            'hideFlexboxFill' => true,
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
