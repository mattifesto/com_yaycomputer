<?php

final class YCStandardPageLayout {

    /**
     * @param stdClass $layoutModel
     * @param callable $renderContentCallback
     *
     * @return null
     */
    static function render(stdClass $layoutModel, callable $renderContentCallback) {
        CBView::render((object)[
            'className' => 'YCPageHeaderView',
        ]);

        echo '<main class="YCStandardPageLayout">';

        if (empty($layoutModel->hidePageTitleAndDescriptionView)) {
            CBView::render((object)[
                'className' => 'CBPageTitleAndDescriptionView',
            ]);
        }

        $renderContentCallback();

        echo '</main>';

        CBView::render((object)[
            'className' => 'YCPageFooterView',
        ]);
    }

    /**
     * @param model $spec
     *
     * @return ?model
     */
    static function CBModel_build(stdClass $spec): ?stdClass {
        return (object)[
            'hidePageTitleAndDescriptionView' => CBModel::value($spec, 'hidePageTitleAndDescriptionView', false, 'boolval'),
        ];
    }
}
